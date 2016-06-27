<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>

<div class="wrap_tb">
	<div class="board_tb">
		<h1>Student</h1>
<?php
	require_once '../../../../includes/mylib.php';
	$conn = db_connect();

	
	$select_query = sprintf ("SELECT student, subject, grade FROM grade");
	$result = mysqli_query($conn, $select_query);

	while($row = mysqli_fetch_assoc($result)) {
		$score [$row['student']][$row['subject']] = $row['grade'];

		//printf ("<table><tbody>");
		//printf ("<tr><th>$row['student']</th></tr>");		
	}
	foreach ($score as $student => $stu_grade ) {
		
		foreach ($stu_grade as $subject => $subject_score) {
			printf ("$student");
			printf ("$subject");
			printf ("$subject_score");
			echo '<br>';

		}
	}
	
	printf ("</tbody></table>");
?>

</body>
</html>