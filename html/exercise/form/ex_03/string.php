<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<body>


<?php
	// a부터 z 까지의 알파벳이 있다.
	// 각 알파벳에 대응하는 숫자가 있다.
	// a =1, b = 2,.....z = 26
	// apple 이라는 단어를 입력하면 각 알파벳에 해당하는 숫자가 모두 더해져 결과값을 만든다.
	
	function get_number ($char) {

		$char = ord($char) - ord('a') + 1;
		return $char;
		
	}
	
	$user_word = $_POST['user_word'];
	
	function get_number_sum ($user_word) {
		
		$sum = 0;
		$length = strlen($user_word);
		
		for($index = 0; $index < $length; $index += 1){
					
			$sum += get_number (substr($user_word, $index));

		}
		return $sum;
		
	}
	echo '알파벳에 해당하는 숫자의 합은? '.get_number_sum ($user_word);

?>


</body>
</html>
