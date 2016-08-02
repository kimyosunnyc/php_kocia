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
	require_once 'security/session.php';
	start_session();
	if (check_login()) {
?>
	<form action="create_post.php" method="post">
		제목:<input type="text" name="title"></input><br>
		내용:<br><textarea rows="10" cols="100" name="content"></textarea><br>
		<input type="submit"></input>
	</form>
<?php		
	} else {
?>
	글을 쓰려면 로그인된 상태여만 합니다.
	<form action="view_list.php">
		<input type="submit" value="메인 화면으로 돌아가기">
	</form>
<?php
	}
?>

</div>
</body>
</html>