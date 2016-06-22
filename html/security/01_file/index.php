<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<title>세션 연습하기</title>
</head>
<body>

<?php
	require_once 'session.php';
	start_session ();
	if (check_login()) {
?>
	<h1>현재 로그인 된 상태입니다.</h1>
	<form action="logout.php" method="get">
		<input type="submit" value="로그아웃">
	</form>

<?php
	} else {
?>
	<h1>로그인하십시오.</h1>
	<form action="login.php" method="post">
		<dl>
			<dt>E-mail : </dt>
			<dd><input type="text" name="id"></dd>
		</dl>
		<dl>
			<dt>Password : </dt>
			<dd><input type="text" name="password"></dd>
		</dl>
		<dl>
			<dt>로그인</dt>
			<dd><input type="submit" value="로그인"></dd>
		</dl>
	</form>
<?php
		
	}
?>
</body>
</html>