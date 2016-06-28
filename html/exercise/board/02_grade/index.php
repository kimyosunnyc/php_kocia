<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>

<div class="wrap_tb">

<?php
	require_once '../../../../includes/mylib.php';
	$conn = db_connect();

	
	$select_query = sprintf ("SELECT student, subject, grade FROM grade");
	$result = mysqli_query($conn, $select_query);

	while($row = mysqli_fetch_assoc($result)) {
		$score1 [$row['student']][$row['subject']] = $row['grade']; // array 로 만들기
		$score2 [$row['subject']][$row['student']] = $row['grade']; // array 로 만들기
	}

	echo '<div class="board_tb">';
	echo '<h1>Student</h1>';
	echo '<table><tbody>';
	foreach ($score1 as $student => $stu_grade ) {
		$rowspan1 = count($stu_grade);
		echo '<tr>';
		echo '<td rowspan ="'.$rowspan1.'">'.$student.'</td>';
		
		foreach ($stu_grade as $subject => $stu_score) {
			
			echo '<td>'.$subject.'</td>';
			echo '<td>'.$stu_score.'</td>';
			echo '</tr>';
			echo '<tr>';
		}
		echo '</tr>';
	}
	echo '</tbody></table>';
	echo '</div>';
	
	echo '<div class="board_tb">';
	echo '<h1>Subject</h1>';
	echo '<table><tbody>';
	foreach ($score2 as $subject => $stu_grade ) {
		$rowspan2 = count($stu_grade);
		echo '<tr>';
		echo '<td rowspan ="'.$rowspan2.'">'.$subject.'</td>';
		
		foreach ($stu_grade as $student => $stu_score) {
			
			echo '<td>'.$student.'</td>';
			echo '<td>'.$stu_score.'</td>';
			echo '</tr>';
			echo '<tr>';
		}
		echo '</tr>';
	}
	echo '</tbody></table>';
	echo '</div>';

?>
<div style="width:100%;text-align:center;">
	<a href="write.php"><input type="button" value="글쓰기"></a> <a href='../../../../index.php'><input type='button' value='홈으로'></a>
</div>
</div>
</body>
</html>