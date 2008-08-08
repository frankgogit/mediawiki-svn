#include	<boost/optional.hpp>

#include	"request.h"

namespace afp {

/* Perhaps, these should be configurable */
static const int MAX_FILTER_LEN = 1024 * 10; /* 10 KB */
static const int MAX_VARNAME_LEN = 255;
static const int MAX_VALUE_LEN = 1024 * 256; /* 256 KB */

// Protocol:
// code NULL <key> NULL <value> NULL ... <value> NULL NULL

template<typename charT, typename Traits>
struct basic_nul_terminated_string_reader {
	typedef std::istream_iterator<charT> iterator_t;
	typedef std::basic_istream<charT, Traits> stream_t;
	typedef std::basic_string<charT, Traits> string_t;

	basic_nul_terminated_string_reader(stream_t &stream)
		: stream_(stream)
		, it_(stream)
		, first_(true)
	{
	}

	boost::optional<string_t> read(std::size_t max_len = 0) {
		string_t ret;

		if (first_)
			first_ = false;
		else
			++it_;

		for (; it_ != end_; ++it_) {
			if (*it_ == stream_.widen('\0')) {
				return ret;
			}

			if (max_len && (ret.size() > max_len))
				return boost::optional<string_t>();

			ret += *it_;
		}

		return boost::optional<string_t>();
	}

private:
	stream_t &stream_;
	iterator_t it_, end_;
	bool first_;
};

typedef basic_nul_terminated_string_reader<char, std::char_traits<char> > 
	nul_terminated_string_reader;

bool 
request::load(std::istream &inp) {
	inp.unsetf(std::ios_base::skipws);

	nul_terminated_string_reader reader(inp);
	boost::optional<std::string> str;

	if (!(str = reader.read(MAX_FILTER_LEN)))
		return false;
	filter = *str;

	for (;;) {
		std::string key, value;

		/* read the key */
		if (!(str = reader.read(MAX_VARNAME_LEN)))
			return false;
		key = *str;

		if (key.empty()) 
			/*  empty string means end of input */
			return true;

		/* read the value */
		if (!(str = reader.read(MAX_VALUE_LEN)))
			return false;
		value = *str;

		f.add_variable(key, datum(value));
	}
	
	return true;
}

bool
request::evaluate()
{
	return f.evaluate(filter);
}

} // namespace afp
