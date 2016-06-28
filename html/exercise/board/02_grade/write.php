<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>

<div class="wrap">
	<div style='float:right;margin-bottom:10px;'>
		<a href='../../../../index.php'><input type='button' value='홈으로'></a>
	</div>

	<form name="grade_form" method="POST" action="insert.php">
	<table>
		<tbody>
			<tr>
				<th>이름</th>
				<td><input type="text" name="student" value="김효선"></td>
			</tr>
			<tr>
				<th>과목</th>
				<td><input type="text" name="subject" value="수학"></td>
			</tr>
			<tr>
				<th>점수</th>
				<td><input type="text" name="grade" value="20"></td>
			</tr>
		</tbody>
	</table>
	<div style="float:right;margin-top:10px;"><input type="submit" value="제출"> <a href="index.php"><input type="button" value="목록보기" style="padding:5px;"></a></div>
	</form>

</div>
</div>

</body>
</html>