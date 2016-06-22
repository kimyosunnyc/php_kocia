<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>

<?php

	$user_word = $_POST['user_word'];

	$file_name = 'dictionary.txt';
	$file_handle = fopen($file_name, 'r');

	while (true) {  // $line = fgets($file_handle)!==false
		$line = fgets($file_handle); // fgets : 파일의 내용을 한줄씩 읽어 들이는 함수
		
		if($line === false) {
			break;
		}
		
		$word_rank = explode("\t", $line);
		if (count($word_rank) === 2) {
			$word = $word_rank[0]; // dictionary.txt 파일에서 탭과 숫자로 구분하여 단어만 읽도록
			
			$alphabet = strpos($word, $user_word);
			if($alphabet === true) { 
				$words[] = $word;
			} else {
				//echo $user_word.'문자열을'.$word.'에서 찾지 못하였습니다.';
				
			}
		}
	}

	sort($words);
	$length = count($words);
	
	for ($i=0; $i<$length; $i++) {
		
		echo 'words [' .$i. '] = '.$words[$i].'<br>';
	}
	
	fclose($file_handle);

?>
</body>
</html>