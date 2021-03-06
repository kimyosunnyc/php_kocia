<?php
	function get_words() {
		$words = array();
		$file_name = '5k_ansi.txt';
		$number_of_total_lines = 1000;
		//echo $file_name;
		//echo '<br>';
		$file_handle = fopen($file_name, 'r');
		
		if (!$file_handle) {
			die('file could not be opened!');
		}
		
		for ($line_number = 1; $line_number <= $number_of_total_lines; $line_number += 1) {
			// fgets는 파일의 다음 한 줄을 읽어서 그 문자열을 리턴한다.
			// 만약 더 이상 읽을 라인이 없다면, false 을 리턴한다.
			$line = fgets($file_handle);
			if ($line === false) {
				break;
			}
			
			$wordAndRank = explode("\t", $line);
			if (count($wordAndRank) === 2) {
				$word = $wordAndRank[0];
				$rank = intval($wordAndRank[1]);
				
				$words[$word] = $rank;
			} else { // error
				die('count was'.count($wordAndRank).' Error occured!');
			}
				//echo '단어: '.$word.' 순위: '.$rank,'<br>';
		}
		//echo 'END';
		asort ($words);
		
		$input = $_GET['input'];
		$selected = array();
		foreach ($words as $word => $rank){	
			if(strpos ($word, $input) !== false){
				
				$selected[] = $word;
			}
		}
		fclose($file_handle);
		return $selected;
	}

	echo implode (' ', array_slice(get_words(), 0 , 20));

	
	
	
	
	
	
	