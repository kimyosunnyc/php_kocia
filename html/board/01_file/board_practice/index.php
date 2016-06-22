<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>

<?php

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
			$title = $board [1];
			$name = $board [3];
		} else {
			die ('count was'.count($board).'Error occured!');
		}
		echo '<tr>';
		echo '<td>'.$number.'</td>';
		echo '<td><a href="view_post.php?number='.$number.'">'.$title.'</a></td>';
		echo '<td>'.$name.'</td>';
		echo '</tr>';
	}
	echo '</table>';
	fclose($file_handle);

?>
<a href="write_post.php">글쓰기</a>
</body>
</html>