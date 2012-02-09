/**
 * Transliteration rules table for the Hebrew keyboard
 * according to Israeli Standard 1452 for users who already use
 * a Hebrew layout on their system. This layout only includes
 * characters added in the new draft of the standard:
 * http://www.lingnu.com/he/howto/78-si1452.html
 * @author Amir E. Aharoni (אָמִיר אֱלִישָׁע אַהֲרוֹנִי, [[User:Amire80]])
 * @date 2012-01-03
 * License: GPLv3
 */

 // Normal rules
var rules = [
	// Empty, because the assumption is that the user is using a Hebrew keyboard already
];

// Your text editor may show the resulting characters in
// the next lines as empty. These are diacritics.
var rules_x = [
['\u05E9', '', 'ְ'],       // Sheva, ש

['\u05E7', '', 'ָ'],       // Qamats, ק
['\u05E8', '', 'ֳ'],       // Hataf qamats, ר
['\u05E4', '', 'ַ'],       // Patah, פ
['\\]', '', 'ֲ'],          // Hataf patah, ]

['\u05E6', '', 'ֵ'],       // Tsere, צ
['\u05E1', '', 'ֶ'],       // Segol, ס
['\u05D1', '', 'ֱ'],       // Hataf segol, ב

['\u05D7', '', 'ִ'],       // Hiriq, ח

['\u05D5', '', 'ֹ'],       // Holam, ו

['\\\\', '', 'ֻ'],         // Qubuts, \

['\u05D3', '', 'ּ'],       // Dagesh, ד

['/', '', 'ׂ'],            // Sin dot
['\'', '', 'ׁ'],           // Shin dot

['-', '', '\u05BE'],      // Maqaf
['=', '', '–'],           // Qav mafrid - en dash
['\\[', '', 'ֿ'],          // Rafe
['1', '', 'ֽ'],            // Meteg
['3', '', '€'],           // Euro sign
['4', '', '₪'],           // Sheqel sign
['5', '', '°'],           // Degree
['6', '', '֫'],           // Ole
['8', '', '×'],           // Multiplication
['\\.', '', '÷'],         // Division

['\u05D8', '', 'װ'],      // Double vav, ט
['\u05D9', '', 'ײ'],      // Double yod, י
['\u05E2', '', 'ױ'],      // Vav-yod, ע

// Simply writing ';' and ',' breaks some source code editors
// because of auto-directionality.
['\u003B', '', '׳'],      // Geresh, ;
['\u002C', '', '״'],      // Gershayim, ,
['\u05E3', '', '„'],      // Opening double quote, ף
['\u05DA', '', '”'],      // Closing double quote, ך
['\u05E5', '', '‚'],      // Opening single quote, ץ
['\u05EA', '', '’']       // Closing single quote, ת
];

jQuery.narayam.addScheme( 'he-standard-2011-extonly', {
	'namemsg': 'narayam-he-standard-2011-extonly',
	'extended_keyboard': true,
	'lookbackLength': 0,
	'keyBufferLength': 0,
	'rules': rules,
	'rules_x': rules_x
} );
