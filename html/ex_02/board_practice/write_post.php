<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>

<form name ="write_form" method = "POST" action = "data.php">
	<table>
		<tbody>
		<tr>
			<th>제목</th>
			<td><input type="text" name="title" value="제목"></td>
		</tr>
		<tr>
			<th>글쓴이</th>
			<td><input type="text" name="name" value="글쓴이"></td>
		</tr>
		<tr>
			<th>내용 </th>
			<td><textarea name="content" rows="10" cols="100%" value="내용"></textarea></td>
		</tr>
		</tbody>
	</table>
	<div class="submit_btn"><input type="submit" value="제출"></div>
</form>

</body>
</html>