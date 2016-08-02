<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
	<script language="javascript" src="sha512.js"></script>
	<script language="javascript" src="check_form.js"></script>
	<script>
	function tryLogin(form, password) {
		var hash = document.createElement('input');
		form.appendChild(hash);
		hash.name = 'hash';
		hash.type = 'hidden';
		hash.value = hex_sha512(password.value);
		password.value = '';
		form.submit();
		return true;
	}
	</script>
</head>
<body>

<div class="wrap">
<div style="float:right;margin-bottom:20px;"><a href="../../index.php">홈으로</a></div>
<?php
	require_once 'class_login.php';
	$conn = db_connect();
	require_once 'session.php';
	start_session ();
	if (check_login()) {
?>
	<table>
	<tbody>
		<colgroup>
			<col width="90%">
			<col width="10%">
		</colgroup>
		<tr>
			<td>현재 로그인 된 상태입니다.</td>
			<td>
				<form action="logout.php" method="get">
					<input type="submit" value="로그아웃">
				</form>
			</td>
		</tr>
	</tbody>
	</table>

<?php
	} else {
?>
	<table>
	<tbody>
		<colgroup>
			<col width="10%">
			<col width="30%">
			<col width="10%">
			<col width="30%">
			<col width="10%">
			<col width="10%">
		</colgroup>
		<tr>
		<form action="login.php" method="post">
			<td>ID</td>
			<td><input type="text" name="id"></td>
			<td>Password</td>
			<td><input type="password" name="password"></td>
			<td><input type="button" value="로그인" onclick="tryLogin(this.form, this.form.password);"></td>
		</form>
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
