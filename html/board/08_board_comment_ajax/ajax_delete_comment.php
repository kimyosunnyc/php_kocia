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
