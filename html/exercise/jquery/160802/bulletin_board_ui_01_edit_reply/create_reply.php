<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
</head>
<body>
<div class="content">
<h1>나의 게시판</h1>
<?php
	require_once 'Reply.php';
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
	if (!isset($_POST['post_id'])) {
		die('post_id가 설정되어 잇지 안음');
	}
	
	$post_id = $_POST['post_id'];
	$author = $_SESSION['id'];
	if (isset($_POST['fill_data'])) { // 테스트
		$number_of_replies = 300;
		for ($index = 0; $index < $number_of_posts; $index++) {
			$content = sprintf('%d 번째 댓글의 내용', $index);			
			add_reply($post_id, $author, $content);
		}		
	} else { // 실사용
		$content = $_POST['content'];
		if ($content === '') {
			// 빈칸 허용하지 않음	 
			echo '빈 칸 금지입니다.';
		} else {
			add_reply($post_id, $author, $content);
			echo '댓글 작성 성공! <br>';
			echo sprintf("<a href = view_post.php?post_id=%s>게시물로 돌아가기</a>", $post_id);
		}
	}
?>
</div>
</body>
</html>