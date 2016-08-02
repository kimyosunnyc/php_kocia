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
	require_once 'Post.php';
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
	// post 리퀘스트이면 게시물 등록이다
	if (isset($_POST['fill_data'])) { // 테스트
		$number_of_posts = 300;
		$number_of_authors = 20;
		for ($index = 0; $index < $number_of_posts; $index++) {
			$title = sprintf('%d 번째 게시물', $index);
			$author = sprintf('%d 번째 저자', $index % $number_of_authors);
			$content = sprintf('%d 번째 글의 내용', $index);			
			add_post($title, $author, $content);
		}		
	} else { // 실사용
		$title = $_POST['title'];
		$author = $_SESSION['id'];
		$content = $_POST['content'];
		if ($title === '' || $author === '' || $content === '') {
			// 빈칸 허용하지 않음	 
			echo '빈 칸 금지입니다.';
		} else {
			add_post($title, $author, $content);
			echo '게시물 작성 성공! <br>';
			echo '<a href = view_list.php>메인메뉴로 돌아가기</a>';
		}
	}
?>
</div>
</body>
</html>