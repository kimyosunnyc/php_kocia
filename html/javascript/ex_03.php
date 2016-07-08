<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<script>
	var global = 'global'; // 선언
	function mayFunction() {
		var local = 'local'; // 선언
		local = 'new local'; // 사용 1
		global = 'new global'; // 사용 1
		mistake = 'value'; // 선언인데 var이 없음
		function myFunction2() {
			var local2 = 'local2'; // 선언
			var local3 = local; // 선언과 사용 2
			global = 'new value'; // 사용
		}
	}
</script>
</head>
<body>
<?php
	$number = 5;
	function my_function () {
		$number = 3;
		//global $number;
		echo $number;
	}
	my_function();
	echo '<br>'.$number;
?>