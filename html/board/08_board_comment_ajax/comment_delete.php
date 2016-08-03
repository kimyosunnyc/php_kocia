<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
</head>
<body>
<div class="content">
<h1>댓글 삭제</h1>
<?php
	require_once 'class.php';
	require_once 'security/session.php';
	
	start_session();
	if (!check_login()) {
		die('부정한 접근!');
	}
	if (!isset($_SESSION['id'])) {
		die('세션에 id가 설정되어 잇지 안음');
	}
	if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
		die('post가 아님');
	}

	$comment_id = $_POST['comment_id'];
	delete_comment($comment_id);
?>
	댓글 삭제 성공! <br>;
	<a href="post_view.php">게시물로 돌아가기</a>
</div>
</body>
</html>