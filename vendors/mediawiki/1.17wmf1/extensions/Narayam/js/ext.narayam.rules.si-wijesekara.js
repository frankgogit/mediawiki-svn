/**
 * Standard Wijesekara Keyboard Layout for Sinhala
 * @author Junaid P V ([[user:Junaidpv]])
 * @date 2011-03-01
 * @credits Language Technology Research Laboratory - University of Colombo School of Computing
 * http://www.ucsc.lk/ltrl/services/layout/
 * License: GPLv3
 */

var rules = [
['`', '', '්‍ර'],
['~', '', 'ර්‍'],

['q', '', 'ු'],
['w', '', 'අ'],
['e', '', 'ැ'],
['r', '', 'ර'],
['t', '', 'එ'],
['y', '', 'හ'],
['u', '', 'ම'],
['i', '', 'ස'],
['o', '', 'ද'],
['p', '', 'ච'],
['\\[', '', 'ඤ'],
['\\]', '', ';'],
['a', '', '්'],
['s', '', 'ි'],
['d', '', 'ා'],
['f', '', 'ෙ'],
['g', '', 'ට'],
['h', '', 'ය'],
['j', '', 'ව'],
['k', '', 'න'],
['l', '', 'ක'],
[';', '', 'ත'],
["'", '', '.'],
['z', '', "'"],
['x', '', 'ං'],
['c', '', 'ජ'],
['v', '', 'ඩ'],
['b', '', 'ඉ'],
['n', '', 'බ'],
['m', '', 'ප'],
[',', '', 'ල'],
['\\.', '', 'ග'],

['Q', '', 'ූ'],
['W', '', 'උ'],
['E', '', 'ෑ'],
['R', '', 'ඍ'],
['T', '', 'ඔ'],
['Y', '', 'ශ'],
['U', '', 'ඹ'],
['I', '', 'ෂ'],
['O', '', 'ධ'],
['P', '', 'ඡ'],
['\\{', '', 'ඥ'],
['\\}', '', ':'],
['A', '', 'ෟ'],
['S', '', 'ී'],
['D', '', 'ෘ'],
['F', '', 'ෆ'],
['G', '', 'ඨ'],
['H', '', 'ය'],
['J', '', 'ළ'],
['K', '', 'ණ'],
['L', '', 'ඛ'],
['\\:', '', 'ථ'],
['"', '', ','],
['Z', '', '"'],
['X', '', 'ඃ'],
['C', '', 'ඣ'],
['V', '', 'ඪ'],
['B', '', 'ඊ'],
['N', '', 'භ'],
['M', '', 'ඵ'],
['\\<', '', 'ළ'],
['\\>', '', 'ඝ']
];

var rules_x = [
['o', '', 'ඳ'],
['v', '', 'ඬ'],
["'", '', '෴'],
['a', '', 'ෳ'],
['\\.', '', 'ඟ'],
['x', '', 'ඦ'],
[',', '', 'ඏ']
];

jQuery.narayam.addScheme( 'si-wijesekara', {
	'namemsg': 'narayam-si-wijesekara',
	'extended_keyboard': true,
	'lookbackLength': 0,
	'keyBufferLength': 0,
	'rules': rules,
	'rules_x': rules_x
} );
