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
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$board_id = $_GET['board_id'];
	}
?>
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
			<?php
				printf ("<input type='hidden' name='board_id' value='%s'>", $board_id);
				if ($board_id == 1) {
					echo '<tr>';
					echo '<th>비고</th>';
					echo '<td><textarea name="note" rows="10"></textarea></td>';
					echo '</tr>';
				}
			?>
			</tbody>
		</table>
		<div style="float:right;margin-top:10px;"><input type="submit" value="제출"></div>
	</form>
</div>
</div>
</body>
</html>
