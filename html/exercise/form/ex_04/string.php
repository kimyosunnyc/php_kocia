<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<body>


<?php
	// dictionary.txt 파일의 5,000개 단어 중 알파벳 숫자의 합이 입력한 단어의 합과 같은 단어를 모두 찾아라. 
	// 알파벳에 해당하는 숫자를 구해라.
	
	function get_number ($char) {

		$char = ord($char) - ord('a') + 1;
		return $char;
		
	}
	
	
	// 입력한 단어에 해당하는 알파벳의 합을 구해라.
	$user_word = $_POST['user_word'];
	function get_number_sum ($user_word) {
		
		$sum_1 = 0;
		$length_1 = strlen($user_word);
		
		for($index = 0; $index < $length_1; $index += 1){
					
			$sum_1 += get_number (substr($user_word, $index));

		}
		return $sum_1;
	}
	echo '알파벳에 해당하는 숫자의 합은? '.get_number_sum ($user_word).'<br>';
	
	
	// dictionary.txt 파일의 문자열을 탭으로 분리하여 알파벳만 구분 = explode 활용
	$file_name = 'dictionary.txt';
	$file_handle = fopen($file_name, 'r');
	
	$value_1 = get_number_sum ($user_word); // 아래에서 값과 비교하기 위하여 변수 만들기
	
	while (true) {  // $line = fgets($file_handle)!==false
		$line = fgets($file_handle); // fgets : 파일의 내용을 한줄씩 읽어 들이는 함수
		
		if($line === false) {
			break;
		}
		
		$word_rank = explode("\t", $line);
		if (count($word_rank) === 2) {
			$word = $word_rank[0]; // dictionary.txt 파일에서 탭과 숫자로 구분하여 단어만 읽도록
			
			$value_2 = get_number_sum ($word); // dictionary.txt 파일 단어에 해당하는 알파벳 숫자의 합
			if($value_1 === $value_2) { // 입력한 단어 알파벳 숫자의 합과 dictionary.txt 파일 단어의 알파벳 숫자의 합이 같으면 : 값이 같은 단어를 모두 출력하기
				$words[] = $word;
			}
		}
	}
	
	// 조건에 맞게 출력하기
	// i는 index 
	/*for ($i = 0; $i < count($words); $i++ ) {
		echo $words[$i].'<br>';
	}*/
	
	sort($words);
	foreach ($words as $key => $val) {
			echo 'words [' . ($key+1) . '] = ' . $val.'<br>';
		}
	
	//print_r ($words);
	fclose($file_handle);


?>


</body>
</html>