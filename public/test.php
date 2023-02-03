<?php

$text = "Ah setan tinggali ewe tuh ngentot";

$text_dilarang = [
	'ngentot',
	'babi',
	'anjing',
	'anjink',
	'bangsat',
	'ngentot',
	'itil',
	'gblg',
	'kntl',
	'ewe',
	'ewean',
	'kintil',
	'asu',
	'asu',
	'setan'
];
if (preg_match_all("/".implode('|', $text_dilarang)."/", $text, $mats,PREG_SET_ORDER)) {
	echo "Kata kata kotor ".count($mats);
	echo "<pre>";
	print_r($mats);
}
