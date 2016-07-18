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
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$post_id = $_POST['post_id'];	
		$title = $_POST['title'];
		$content = $_POST['content'];
		$author = $_POST['author'];
		$board_id = $_POST['board_id'];
		$note = null;
		if ($board_id == 1) {
			$note = $_POST['note'];
		}
		
	}

	$result = edit_post ($title, $content, $author, $note, $board_id, $post_id);
	
	if ($result == true) {
		if ($board_id == 1) {
			echo '<meta http-equiv="Refresh" content="0; URL=view_post.php?post_id='.$post_id.'&board_id=1">';
		} else {
			echo '<meta http-equiv="Refresh" content="0; URL=view_post.php?post_id='.$post_id.'&board_id=0">';
		}
		
	} else {
		echo "수정에 실패 하였습니다.";
	}
	 
?>
</body>
</html>