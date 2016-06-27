<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>
 
<?php

	require_once '../../../../includes/mylib.php';
	$conn = db_connect();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') { // POST방식으로 데이터를 받는다. (write_post.php에서 작성하는 내용)

		$student = $_POST['student'];
		$subject = $_POST['subject'];
		$grade = $_POST['grade'];
	}

	$insert_query = sprintf ("INSERT INTO grade (student, subject, grade) VALUES ('%s', '%s', %d);", $student, $subject, $grade);

	if ((mysqli_query($conn, $insert_query)) === false) {
		
		printf ("<div class='wrap' style='border:1px solid #ddd;padding:50px;text-align:center;'><h1>DB INSERT 실패</h1>");
		printf ("<h2>이미 입력하셨습니다.</h2>");
		printf ("<div style='margin-top:10px;'><a href='write.php'><input type='button' value='다시 작성하기'></a></div></div>");
	
	} else {
		printf ("<div class='wrap'><h1>DB INSERT 성공</h1>");
		printf ("<table><tbody>");
		printf ("<tr><th>이름</th><td>$student</td></tr>");
		printf ("<tr><th>과목</th><td>$subject</td></tr>");
		printf ("<tr><th>점수</th><td>$grade</td></tr>");
		printf ("</tbody></table>");
		printf ("<div style='float:right;margin-top:10px;'><a href='index.php'><input type='button' value='목록보기'></a></div></div>");
	}
	mysqli_close($conn);

?>

</body>
</html>