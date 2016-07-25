﻿<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>
   <div class="wrap">
 <div style="float:right;"><a href="../../index.php">홈으로</a></div>
<?php

	require_once 'class.php';
	$conn = db_connect();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') { // POST방식으로 데이터를 받는다. (write_post.php에서 작성하는 내용)

		$board_id = $_POST['board_id'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$author = $_POST['author'];
		$note = null;
		if ($board_id == 1) {
			$note = $_POST['note'];
		}
		
	}
	//echo $board_id;
	//$insert_query = sprintf ("INSERT INTO post (title, content, author, note, board_id) VALUES ('%s', '%s', '%s', '%s', %d);", $title, $content, $author, $note, $board_id);

	add_post($title, $content, $author, $note, $board_id);

	echo '<h1>DB INSERT 성공</h1><br>';
	echo 'DB INSERT: ',$title,' ',$content,' ',$author,' ',$note,' ',$board_id,'<br>';

?>
<form method="GET" action = "index.php">
	<input type="submit" value="목록보기">
 </form>
</div>
</body>
</html>