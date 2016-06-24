<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>



<div class="wrap">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>

<h1>게시판 글쓰기</h1>
	<form name ="write_form1" method = "POST" action = "data.php">
		<table class="board_write">
			<tbody>
			<tr>
				<th>제목</th>
				<td><input type="text" name="title"></td>
			</tr>
			<tr>
				<th>글쓴이</th>
				<td><input type="text" name="author"></td>
			</tr>
			<tr>
				<th>내용 </th>
				<td><textarea name="content" rows="10" cols="100%"></textarea></td>
			</tr>
			<tr>
				<th>비고 </th>
				<td><textarea name="note" rows="10" cols="100%"></textarea></td>
			</tr>
			</tbody>
		</table>
		<div style="float:right;margin-top:10px;"><input type="hidden" name="board_id" value="1"><input type="submit" value="제출"></div>
	</form>
</div>
</div>

</body>
</html>
