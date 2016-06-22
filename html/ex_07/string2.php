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
	
	function do_Highlight($body_text, $user_word){

		$length= strlen($body_text);
		$pos = strpos($body_text, $user_word); // strpos : 문자열이 처음 나타나는 위치를 찾습니다
		$lword = strlen($user_word); // strlen : 문자열 길이를 얻습니다
		$split_search = $pos + $lword; 
		$string0 = substr($body_text, 0, $pos); // substr : 문자열을 나눌 때 사용
		$string1 = substr($body_text, $pos, $lword);
		$string2 = substr($body_text, $split_search, $length);
		$body = $string0."<font style='color:#FF0000;'>$string1</font>".$string2;
		return $body;
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