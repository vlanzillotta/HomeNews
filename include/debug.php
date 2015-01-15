<?php
	function decho($text){

		$logh = fopen("logs/log.txt", "a");
		fwrite($logh, $text);
		fclose($logh);
	}

	function dprint_r($array){

		$logh = fopen("logs/log.txt", "a");
		$text = print_r($array, true);
		fwrite($logh, $text);
		fclose($logh);
	}

?>