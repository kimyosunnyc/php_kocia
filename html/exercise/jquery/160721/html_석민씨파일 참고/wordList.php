<?php
	require_once('ajax_lib.php');
	
	$input = $_GET['input'];
	$words = get_words_from_db($input);

	sort($words);
	$words = implode(" ", $words);
	
	echo $words;