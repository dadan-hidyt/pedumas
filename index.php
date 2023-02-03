<?php

$text = "Ahh anjing bangsat goblog setan sakarat";

$text_dilarang = [
	'ngentot',
	'babi',
	'anjing',
	'anjink',
	'bangsat',
	'asu',
	'setan'
];
if (preg_match_all($text_dilarang, $text_dilarang, $mats)) {
	var_dump($mats);
}