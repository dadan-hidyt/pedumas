<?php 
function cariKataDilarang(array $dataset = [], string $text){
	if (preg_match_all("/".implode('|', $dataset)."/", $text, $matches,PREG_SET_ORDER)) {
		return count($matches ?? []);
	}
	return 0;
}
?>