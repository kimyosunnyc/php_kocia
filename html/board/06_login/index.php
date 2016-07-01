<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>

<div class="wrap">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>

<?php
	require_once 'class_login.php';
	$conn = db_connect();
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
	
	<table>
	<tbody>
		<colgroup>
			<col width="30%">
			<col width="55%">
			<col width="15%">
		</colgroup>
		<form action="login.php" method="post">
		<tr>
			<td>ID</td>
			<td><input type="text" name="id"></td>
			<td rowspan="2"><input type="submit" value="로그인"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="text" name="password"></td>
		</tr>
		</form>
		<tr>	
			<td colspan="2">회원이 아니시면 회원가입 해 주세요.</td>
			<td>
				<form action="register_page.php" method="get">
					<input type="submit" value="회원가입">
				</form>
			</td>
		</tr>
	</tbody>
	</table>
	

	
<?php
		
	}
?>

</div>
</body>
</html>
