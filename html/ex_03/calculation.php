<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<body>

<?php

	echo '<h2>결과값은 아래와 같습니다.</h2>';

	$num1 = $_POST['num1'];

	$token = '+';
	$numbers = explode ($token, $num1);

	//print_r($numbers);
	
	// 문자열 어레이 => 총합
	
	function get_arr_sum ($numbers) {
		
		$arr_sum = 0;
		$length = count($numbers);
		
		for($index = 0; $index < $length; $index += 1){
			$arr_sum += $numbers[$index];
		}
		return $arr_sum;
	}
	echo '답은? '.get_arr_sum($numbers);
	
?>

<div><a href="../index.php">홈으로</a></div>



</body>
</html>
