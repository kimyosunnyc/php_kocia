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
	
	if (!isset($_GET['post_id'])) { // 직전 화면이 메인 화면이 아니었다
		if (!isset($_SESSION['post_id'])) { // 게시물 화면에 처음 왔다. 에러
			die('view_post error');
		} else {
			$post_id = $_SESSION['post_id'];
		}
	} else {
		$post_id = $_GET['post_id'];
	}
	
	$post = get_post_with_id($post_id);
	$title = $post->getTitle();
	$author = $post->getAuthor();
	$content = $post->getContent();
	echo '제목: '.$title.'<br>';
	echo '글쓴이: '.$author.'<br>';
	echo '번호: '.$post_id.'<br>';
	echo '내용:<br>';
?>
	<form action="edit_post.php" method="post">
		<textarea name="content" rows="20" cols="100"><?php echo htmlspecialchars($content); ?></textarea>
		<input type="hidden" name="post_id" value="<?php echo $post_id; ?>"></input>
		<input type="submit" value="게시물 수정 완료"> </input>
	</form>
</div>
</body>
</html>