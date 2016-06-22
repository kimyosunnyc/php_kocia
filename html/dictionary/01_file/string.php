<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>

<?php

	$user_word = $_POST['user_word'];

	$file_name = 'dictionary.txt';
	$file_handle = fopen($file_name, 'r');

	while (true) {
		$line = fgets($file_handle); // fgets : 파일의 내용을 한줄씩 읽어 들이는 함수
		
		if($line === false) {
			break;
		}
		
		$word_rank = explode("\t", $line);
		if (count($word_rank) === 2) {
			$word = $word_rank[0]; // dictionary.txt 파일에서 탭과 숫자로 구분하여 단어만 읽도록
			
			$alphabet = strpos($word, $user_word);
			if($alphabet === false) { 
				//echo $user_word.'문자열을'.$word.'에서 찾지 못하였습니다.';
			} else {
				$words[] = $word;
			}
		}
	}
	
	function do_Highlight($body_text,$user_word){

		$new = str_replace($user_word, "<font style='color:#FF0000;'>$user_word</font>", $body_text);
		return $new;
	}

	sort($words);
	$length = count($words);
	for ($i=0; $i<$length; $i++) {
		$body_text = $words[$i];
		$result_body = do_Highlight($body_text,$user_word);
		echo 'words [' .$i. '] = '.$result_body.'<br>';
	}
	
	fclose($file_handle);

?>
</body>
</html>