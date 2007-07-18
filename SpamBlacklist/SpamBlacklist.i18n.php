<?php
/**
 * Internationalisation file for SpamBlacklist extension.
 *
 * @addtogroup Extensions
*/

/**
 * Prepare extension messages
 *
 * @return array
 */
function efSpamBlacklistMessages() {
	$messages = array(

'en' => array(
	'spam-blacklist' => '
 # External URLs matching this list will be blocked when added to a page.
 # This list affects only this wiki; refer also to the global blacklist.
 # For documentation see http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- leave this line exactly as it is --> <pre>
#
# Syntax is as follows:
#   * Everything from a "#" character to the end of the line is a comment
#   * Every non-blank line is a regex fragment which will only match hosts inside URLs

 #</pre> <!-- leave this line exactly as it is -->',
	'spam-whitelist' => '
 #<!-- leave this line exactly as it is --> <pre>
# External URLs matching this list will *not* be blocked even if they would
# have been blocked by blacklist entries.
#
# Syntax is as follows:
#   * Everything from a "#" character to the end of the line is a comment
#   * Every non-blank line is a regex fragment which will only match hosts inside URLs

 #</pre> <!-- leave this line exactly as it is -->',
),

'id' => array(
	'spam-blacklist' => '
 # Pranala luar yang cocok dengan daftar ini akan diblok ketika ditambahkan ke suatu halaman.
 # Daftar ini hanya mempengaruhi wiki ini saja; lihat pula daftar hitam global.
 # Untuk dokumentasi lihat http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 # <!-- jangan ubah baris ini --> <pre>
#
# Sintaks:
# * Semua baris yang dimulai dengan sebuah karakter "#" akan dianggap sebagai komentar
# * Semua baris yang tidak kosong adalah sebuah fragmen regex yang hanya cocok dengan host di dalam URL.

 #</pre> <!-- jangan ubah baris ini -->',
	'spam-whitelist' => '
 #<!-- jangan ubah baris ini --> <pre>
# Pranala luar yang cocok dengan daftar ini *tidak* akan diblok walaupun terdaftar dalam daftar hitam.
#
# Sintaks:
#   * Semua baris yang dimulai dengan sebuah karakter "#" akan dianggap sebagai komentar
#   * Semua baris yang tidak kosong adalah sebuah fragmen regex yang hanya cocok dengan host di dalam URL.

 #</pre> <!-- jangan ubah baris ini -->'
),

);

return $messages;
}
