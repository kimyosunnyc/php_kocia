<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>
 
<?php

	require_once 'class_post.php';
	$conn = db_connect();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') { // POST방식으로 데이터를 받는다. (write_post.php에서 작성하는 내용)

		$comment = $_POST['comment'];
		$visitor = $_POST['visitor'];
		$post_id = $_POST['post_id'];
	}
	//echo $board_id;
	//$insert_query = sprintf ("INSERT INTO post (title, content, author, note, board_id) VALUES ('%s', '%s', '%s', '%s', %d);", $title, $content, $author, $note, $board_id);

	add_comment($comment, $visitor, $post_id);

	echo '<h1>DB INSERT 성공</h1><br>';
	echo 'DB INSERT: ',$comment,' ',$visitor,' ',$post_id,'<br>';

?>


</body>
</html>