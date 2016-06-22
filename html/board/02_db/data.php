﻿<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>
 
<?php
 
// 게시글 넘버 중 가장 큰 값을 찾아 다음 게시글의 넘버를 작성한다.
 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') { // POST방식으로 데이터를 받는다. (write_post.php에서 작성하는 내용)

		$title = $_POST['title'];
		$author_name = $_POST['author_name'];
		$content = $_POST['content'];
	}
	
	$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
	$username = 'kimyosunny';
	$password = 'password';
	$dbname = 'kimyosunny';
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	mysqli_query($conn, "SET NAMES 'utf8'");
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}

	$insert_query = 'INSERT INTO board_db_01 (title, content, author_name) VALUES ("'.$title.'","'.$content.'","'.$author_name.'")';
	mysqli_query($conn, $insert_query);

	echo '<h1>DB INSERT 성공</h1><br>';
	echo 'DB INSERT: ',$title,' ',$content,' ',$author_name,'<br>';
	mysqli_close($conn);
	
?>
<a class="w_btn" href="index.php" target="_self">목록으로</a>
 
 
</body>
</html>