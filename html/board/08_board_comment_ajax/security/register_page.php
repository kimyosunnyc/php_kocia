<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
	<script language="javascript" src="../js/sha512.js"></script>
	<script language="javascript" src="../js/check_form.js"></script>
</head>
<body>

<div class="wrap">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>
<h1>가입할 회원 정보를 입력하시오</h1>
<form action="register.php" method="post">
	<table>
		<colgroup>
			<col width="30%">
			<col width="55%">
			<col width="15%">
		</colgroup>
		<tr>
			<td>이름</td>
			<td><input type="text" name="user_real_name"></td>
			<td rowspan="4"><input type="button" value="가입하기" onclick="checkRegisterForm(this.form, this.form.id, this.form.password, this.form.password2);"></td>
		</tr>
		<tr>
			<td>ID</td>
			<td><input type="text" name="id"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td>Password Confirm</td>
			<td><input type="password" name="password2"></td>
		</tr>
	</table>
	
</form>
</div>
</body>
</html>