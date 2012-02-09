/**
 * Transliteration regular expression rules table for Devanagari script for Hindi
 * According to CDAC's "Enhanced InScript Keyboard Layout 5.2"
 * @author Junaid P V ([[user:Junaidpv]])
 * @date 2011-11-20
 * License: GPLv3
 */

 // Normal rules
var rules = [
['क्h', 'c', 'च्'],
['\\\\([A-Za-z\\>_~\\.0-9])', '\\\\', '$1'],

['([क-ह]़?)्a', '', '$1'],
['([क-ह]़?)्A', '', '$1ा'],
['([क-ह]़?)a', '', '$1ा'],
['([क-ह]़?)्i', '', '$1ि'],
['([क-ह]़?)(्I|िi|ॆe)', '', '$1ी'],
['([क-ह]़?)्u', '', '$1ु'],
['([क-ह]़?)(ुu|्U|ॊo)', '', '$1ू'],
['([क-ह]़?)्R', '', '$1ृ'],
['([क-ह]़?)ृR', '', '$1ॄ'],
['([क-ह]़?)्ळ्l', '', '$1ॢ'],
['([क-ह]़?)ॢl', '', '$1ॣ'],
['([क-ह]़?)ॆ\\^', '', '$1ॅ'],
['([क-ह]़?)्e', '', '$1े'],
['([क-ह]़?)्E', '', '$1े'],
['([क-ह]़?)ॊ\\^', '', '$1ॉ'],
['([क-ह]़?)i', '', '$1ै'],
['([क-ह]़?)्o', '', '$1ो'],
['([क-ह]़?)्O', '', '$1ो'],
['([क-ह]़?)u', '', '$1ौ'],
['([क-ह]़?)ृa', '', '$1्ऱ'],
['([क-ह]़?)ृA', '', '$1्ऱा'],
['([क-ह]़?)ृi', '', '$1्ऱि'],
['([क-ह]़?)ृI', '', '$1्ऱी'],
['([क-ह]़?)ृu', '', '$1्ऱु'],
['([क-ह]़?)ृU', '', '$1्ऱू'],
['([क-ह]़?)ृ\\^', '', '$1्ऱॅ'],
['([क-ह]़?)ृe', '', '$1्ऱॆ'],
['([क-ह]़?)ृE', '', '$1्ऱे'],
['([क-ह]़?)ृo', '', '$1्ऱॊ'],
['([क-ह]़?)ृO', '', '$1्ऱो'],
['([क-ह]़?)ृ\\~', '', '$1्ऱ्'],
['([क-ह])्\\`', '', '$1़्'],

['अa', '', 'आ'],
['(ऒo|उu)', '', 'ऊ'],
['ऎ\\^', '', 'ऍ'],
['अi', '', 'ऐ'],
['अ\\^', '', 'ॲ'],
['(इi|ऎe)', '', 'ई'],
['ऒ\\^', '', 'ऑ'],
['अu', '', 'औ'],
['ऋR', '', 'ॠ'],
['ळ्l', '', 'ऌ'],
['ऌl', '', 'ॡ'],
['ं\\^', '', 'ँ'],
['ंm', '', 'ँ'],
['ंM', '', 'ँ'],
['ओM', '', 'ॐ'],

['क्h', '', 'ख्'],
['ग्h', '', 'घ्'],
['न्g', '', 'ङ्'],
['च्h', '', 'छ्'],
['ज्h', '', 'झ्'],
['न्j', '', 'ञ्'],
['ट्h', '', 'ठ्'],
['ड्h', '', 'ढ्'],
['त्h', '', 'थ्'],
['द्h', '', 'ध्'],
['प्h', '', 'फ्'],
['ब्h', '', 'भ्'],
['ऋa', '', 'ऱ'],
['ऋA', '', 'ऱा'],
['ऋi', '', 'ऱि'],
['ऋI', '', 'ऱी'],
['ऋu', '', 'ऱु'],
['ऋU', '', 'ऱू'],
['ऋ\\^', '', 'ऱॅ'],
['ऋe', '', 'ऱे'],
['ऋE', '', 'ऱे'],
['ऋo', '', 'ऱो'],
['ऋO', '', 'ऱो'],
['ऋ\\~', '', 'ऱ्'],

['स्h', '', 'श्'],
['श्h', '', 'ष्'],
['क़्h', '', 'ख़्'],
['ज़्h', '', 'ऴ्'],
['।\\.', '', '॥'],

['a', '', 'अ'],
['b', '', 'ब्'],
['c', '', 'च्'],
['d', '', 'द्'],
['e', '', 'ए'],
['f', '', 'फ्'],
['F', '', 'फ़्'],
['g', '', 'ग्'],
['h', '', 'ह्'],
['i', '', 'इ'],
['j', '', 'ज्'],
['j', '', 'ज़्'],
['k', '', 'क्'],
['l', '', 'ल्'],
['m', '', 'म्'],
['n', '', 'न्'],
['o', '', 'ओ'],
['p', '', 'प्'],
['q', '', '\u0951'],
['r', '', 'र्'],
['s', '', 'स्'],
['t', '', 'त्'],
['u', '', 'उ'],
['(v|w)', '', 'व्'],
['x', '', 'क्ष्'],
['y', '', 'य्'],
['(z|Z)', '', '.'],
['A', '', 'आ'],
['B', '', 'ब्ब्'],
['C', '', 'क्क्'],
['D', '', 'ड्'],
['E', '', 'ऍ'],
//'F', '', 'फ्'],
['G', '', 'ग्ग्'],
['H', '', 'ः'],
['I', '', 'ई'],
['J', '', 'ज्ज्'],
['K', '', 'क्क्'],
['L', '', 'ळ्'],
['M', '', 'ं'],
['N', '', 'ण्'],
['O', '', 'ओ'],
['P', '', 'प्प्'],
//'Q', '', 'अ'],
['R', '', 'ऋ'],
['S', '', 'श्'],
['T', '', 'ट्'],
['U', '', 'ऊ'],
['(V|W)', '', 'व्व्'],
['X', '', 'क्ष्'],
['Y', '', 'ञ्'],
//'z', '', 'अ'
['0', '', '०'],
['1', '', '१'],
['2', '', '२'],
['3', '', '३'],
['4', '', '४'],
['5', '', '५'],
['6', '', '६'],
['7', '', '७'],
['8', '', '८'],
['9', '', '९'],
['~', '', '्'],
['\\.', '', '।'],
['//', '', 'ऽ'],
['\\`', '', '़']
];

jQuery.narayam.addScheme( 'hi', {
	'namemsg': 'narayam-hi',
	'extended_keyboard': false,
	'lookbackLength': 3,
	'keyBufferLength': 1,
	'rules': rules
} );
