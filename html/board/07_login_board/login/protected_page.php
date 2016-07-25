<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>
<div class="wrap">
	<div style="margin:80px;text-align:center;padding:30px;border:1px solid #ededed;">

		<?php
			require_once 'class_login.php';
			$conn = db_connect();
			require_once 'session.php';
			start_session();
			if (check_login()) {
				echo "<h1>로그인 성공!</h1>";
		?>
				<form action="index.php">
					<input type="submit" value="메인메뉴로 돌아가기">
				</form>
		<?php
			} else {
				header("Location: error.php?error_code=3");
			}
		?>
	</div>
</div>
</body>
</html>