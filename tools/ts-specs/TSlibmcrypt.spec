#
# spec file for package TSlibmcrypt
#
# includes module(s): libmcrypt

%include Solaris.inc

%include arch64.inc
%use libmcrypt64=libmcrypt.spec
%include base.inc
%use libmcrypt=libmcrypt.spec

Name:                    %{libmcrypt.name}
Summary:                 %{libmcrypt.summary}
Version:                 %{libmcrypt.version}
SUNW_BaseDir:            %{_basedir}
BuildRoot:               %{_tmppath}/%{name}-%{version}-build

BuildRequires:	TSautomake
BuildRequires:	TSautoconf

%include default-depend.inc

%package devel
Summary:		 %{summary} - development files
SUNW_BaseDir:            %{_basedir}
%include default-depend.inc
Requires:		 %name

%prep
rm -rf %name-%version
mkdir %name-%version

mkdir %name-%version/%_arch64
%libmcrypt64.prep -d %name-%version/%_arch64

mkdir %name-%version/%{base_arch}
%libmcrypt.prep -d %name-%version/%{base_arch}

%build
CPUS=`/usr/sbin/psrinfo | grep on-line | wc -l | tr -d ' '`
if test "x$CPUS" = "x" -o $CPUS = 0; then
    CPUS=1
fi

export CC="cc"
export CXX="CC"
export CPPFLAGS="-I/usr/sfw/include"
export MSGFMT="/usr/bin/msgfmt"

%include arch64.inc
export CFLAGS="%optflags -m64 -I/usr/sfw/include -DANSICPP -L/usr/sfw/lib/%_arch64"
export RPM_OPT_FLAGS="$CFLAGS"
export LDFLAGS="-m64 -L/usr/sfw/lib/%_arch64 -R/usr/sfw/lib/%_arch64"
%libmcrypt64.build -d %name-%version/%_arch64
%include base.inc
export LDFLAGS="-L/usr/sfw/lib -R/usr/sfw/lib"
export CFLAGS="%optflags -I/usr/sfw/include -DANSICPP -L/usr/sfw/lib"
export RPM_OPT_FLAGS="$CFLAGS"
%libmcrypt.build -d %name-%version/%{base_arch}

%install
%libmcrypt64.install -d %name-%version/%_arch64
rm -f $RPM_BUILD_ROOT%{_libdir}/%_arch64/*.la

%libmcrypt.install -d %name-%version/%{base_arch}
rm -f $RPM_BUILD_ROOT%{_libdir}/*.la
rm -f $RPM_BUILD_ROOT%{_libdir}/*.a
rm -f $RPM_BUILD_ROOT%{_libdir}/libltdl*
rm -f $RPM_BUILD_ROOT%{_libdir}/libmcrypt/*.la
rm -f $RPM_BUILD_ROOT%{_libdir}/%_arch64/*.la
rm -f $RPM_BUILD_ROOT%{_libdir}/%_arch64/*.a
rm -f $RPM_BUILD_ROOT%{_libdir}/%_arch64/libltdl*
rm -f $RPM_BUILD_ROOT%{_libdir}/%_arch64/libmcrypt/*.la
rm -rf $RPM_BUILD_ROOT%{_includedir}/libltdl
rm -rf $RPM_BUILD_ROOT%{_includedir}/ltdl.h
%clean
rm -rf $RPM_BUILD_ROOT

%files
%defattr (-, root, bin)
%dir %attr (0755, root, bin) %{_libdir}
%{_libdir}/lib*.so*
%dir %attr (0755, root, bin) %{_libdir}/libmcrypt
%{_libdir}/libmcrypt/*.so
%dir %attr (0755, root, bin) %{_libdir}/%_arch64/libmcrypt
%{_libdir}/%_arch64/libmcrypt/*.so
%dir %attr(0755, root, sys) %{_datadir}
%dir %attr(0755, root, bin) %{_mandir}
%dir %attr (0755, root, bin) %{_libdir}/%_arch64
%{_libdir}/%_arch64/lib*.so*

%files devel
%defattr (-, root, bin)
%dir %attr (0755, root, bin) %{_bindir}
%{_bindir}/libmcrypt-config
%dir %attr (0755, root, bin) %{_includedir}
%{_includedir}/*
%dir %attr(0755, root, sys) %{_datadir}
%dir %attr(0755, root, other) %{_datadir}/aclocal
%{_datadir}/aclocal/*
%dir %attr(0755, root, bin) %{_mandir}
%dir %attr(0755, root, bin) %{_mandir}/man3
%{_mandir}/man3/*
%{_bindir}/%_arch64/libmcrypt-config

%changelog
* Sun Oct  5 2008 - river@wikimedia.org
- initial spec
