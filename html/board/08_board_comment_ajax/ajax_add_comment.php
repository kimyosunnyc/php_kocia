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
	if (!isset($_POST['post_id'], $_POST['content'])) {
		die('post_id가 설정되어 잇지 안음');
	}
	
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$post_id = $_POST['post_id'];
		$visitor = $_SESSION['id'];
	}
	
	$result = add_comment($content, $visitor, $post_id);
	echo $result;
	
	
	if (isset($_POST['fill_data'])) { // 테스트
		$number_of_comments = 300;
		for ($index = 0; $index < $number_of_posts; $index++) {
			$content = sprintf('%d 번째 댓글의 내용', $index);			
			add_comment($content, $visitor, $post_id);
		}		
	} else { // 실사용
		$content = $_POST['content'];
		if ($content === '') {	 
			die('빈 칸 금지입니다.');
		} else {
			echo add_comment($content, $visitor, $post_id);
		}
	}
