<?php
	// DB에서 단어를 불러오기
	require_once 'mylib.php';
	
	function get_words_2($input) {
		$conn = db_connect();
		$input = "%$input%";
	
		/*$stmt = mysqli_prepare($conn, " SELECT word, 
											   CASE WHEN rank is null THEN 9999 ELSE rank END as rank
										FROM dictionary2
										WHERE word LIKE ?
										ORDER BY rank
										LIMIT 20;");*/
										// 쿼리문을 이렇게 사용하면 아래의 asort가 필요한데, asort를 하면 key 값이 있는 array가 출력된다. >> DB에서 가져오는 단어는 사실 asort를 할 필요 없이 그냥 sort를 하면된다.
										// 그럴때 array_values 라는 함수를 사용하여 key 값이 없는 array로 다시 출력해주면 된다.
										// 이 때 return 값은 $all_words 가 된다.
												
		$stmt = mysqli_prepare($conn, "SELECT word
									FROM (SELECT word,
										CASE WHEN rank is null THEN 9999 ELSE rank END as rank
										FROM dictionary2
										WHERE word LIKE ?
										ORDER BY rank) as wordAndRank
									ORDER BY word
									LIMIT 20;");
									
		mysqli_stmt_bind_param($stmt, "s", $input);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		
		$words = array();
		$wordAndRank = array();
		$i = 0;
		while($wordAndRank = mysqli_fetch_assoc($result)){
			
			$words[$i++] = $wordAndRank['word'];
		}
		
		//asort ($words);
		//$all_words = array_values($words);
		mysqli_free_result($result);
		mysqli_close($conn);
		return $words;
	}	
	
	$input = $_GET['input'];
	$words = get_words_2($input);
	//echo implode (' ', $words);
	echo json_encode($words);

/*
	// 파일에서 단어를 불러오기
	function get_words() {
		$words = array();
		$file_name = '100k_combined.txt';
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
				
			} else if (count($wordAndRank) === 1){
				$word = $wordAndRank[0];
				
				$words[$word] = 5001;
				
			} else { // error
				die('count was'.count($wordAndRank).' Error occured!');
			}
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

	*/
	