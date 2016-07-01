<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
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
			<td>ID</td>
			<td><input type="text" name="id"></td>
			<td rowspan="2"><input type="submit" value="가입하기"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="text" name="password"></td>
		</tr>
	</table>
	
</form>
</div>
</body>
</html>