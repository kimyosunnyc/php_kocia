<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>

<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		
		$number_confirm = $_GET['number'];
	}

	$file_name = 'data.txt';
	$file_handle = fopen($file_name, 'r');

	echo '<table>';
	echo '<tr>';
	echo '<th>번호</th>';
	echo '<th>제목</th>';
	echo '<th>작성자</th>';
	echo '</tr>';
	
	while (($line = fgets ($file_handle)) !== false) {
		
		$board = explode ("\t", $line);
		if (count($board) === 4) {
			$number = $board [0];
			
			if ($number == $number_confirm) {
				
				$title = $board [1];
				$cont = $board [2];
				$name = $board [3];
				
				break; // while문 안에 있어서 계속 반복되기 때문에 break를 걸어줘야 한다.????
			} else {
				die ('count was'.count($board).'Error occured!');
			}
		}		
	}
	echo '<tr>';
	echo '<td>'.$number.'</td>';
	echo '<td>'.$title.'</td>';
	echo '<td>'.$name.'</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td colspan="3">'.$cont.'</td>';
	echo '</td>';
	echo '</table>';
	echo '</table>';
	
	fclose($file_handle);

?>

</body>
</html>