<?php
	require_once 'class.php';
	require_once 'security/session.php';
	
	start_session();
	$conn = db_connect();
	
	
	if (!check_login()) {
		die('부정한 접근!');
	}
	if (!isset($_SESSION['id'])) {
		die('세션에 id가 설정되어 잇지 안음');
	}
	if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
		die('post가 아님');
	}

	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$comment_id = $_POST['comment_id'];
		$content = $_POST['content'];
	}
	
	$result = edit_comment ($comment_id, $content);
	echo $result;

