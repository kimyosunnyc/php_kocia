<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<body>


<?php

	// lecture_1_20.php 파일 참조
	$user_word = $_POST['user_word'];
	
	$file_name = 'dictionary.txt';
	//$number_of_total_lines = 100;  >> 아래에 for문으로 조건을 넣을 때 사용한다.
	//echo $file_name;
	//echo '<br>';
	
	
	$file_handle = fopen($file_name, 'r');
		
	if (!$file_handle) {
		die('file could not be opened!');
	}

	while (true) {
		// data 값이 한정되어있지 않고 엄청 많은 데이터를 가지고 있을 때 계속해서 data 값을 확인해야 하므로 아래와 같이 작성해도 되지만 while문을 true 조건으로 놓고 작성하는 것이 좋다.
		// while (($line = fgets($file_handle) !== false)  
		// for ($line_number = 1; $line_number <= $number_of_total_lines; $line_number += 1) {
		// fgets는 파일의 다음 한 줄을 읽어서 그 문자열을 리턴한다.
		// 만약 더 이상 읽을 라인이 없다면, false 을 리턴한다.
		$line = fgets($file_handle);
		if ($line === false) {
			break;
		}
		
		// 탭으로 구분 된 두 문자열을 구분한다.
		$word_rank = explode("\t", $line);
		if (count($word_rank) === 2) {
			$word = $word_rank[0];
			$rank = intval($word_rank[1]);
			
			// 파일 전체를 읽어서
			// 어레이를 저장하기
			
			$array[$word] = $rank;			
			
			
		} else { // error
			die('count was'.count($word_rank).' Error occured!');
		}

		
		
	}
	echo $array[$user_word].'번째 단어입니다.'.'<br>';
	//echo 'END';
	fclose($file_handle);
		
?>


<h1><?php echo $array[$user_word]; ?> 번째 단어입니다.</h1>


</body>
</html>
