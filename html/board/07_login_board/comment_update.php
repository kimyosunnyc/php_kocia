<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>
 
<?php

	require_once 'class.php';
	$conn = db_connect();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$comment_id = $_POST['comment_id'];
		$comment = $_POST['comment'];
		$visitor = $_POST['visitor'];
	}

	$result = edit_comment ($comment_id, $comment, $visitor);
	
	if ($result == true) {
		echo '<meta http-equiv="Refresh" content="0; URL=comment_edit.php?comment_id='.$comment_id.'">';
	} else {
		echo '수정에 실패 하였습니다.';
	}
	 
?>
</body>
</html>