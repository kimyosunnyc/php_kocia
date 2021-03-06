﻿<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>

<div class="wrap">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>
<h1>게시판</h1>

<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$number_confirm = $_GET['post_id'];
		$board_id = $_GET['board_id'];
	}
	
	require_once '../../../includes/mylib.php';
	$conn = db_connect();

	printf ('<table>
				<tr>
					<th class="num">번호</th>
					<th>제목</th>

					<th>작성자</th>
					<th>최근작성일</th>
				</tr>'
			);

	
	$select_query = sprintf ("SELECT post_id, title, content, note, author, last_update FROM post WHERE post_id = '%d';", $number_confirm);
	$result = mysqli_query($conn, $select_query);
	
	if($row = mysqli_fetch_assoc($result)) {
		
		echo '<tr>';
		echo '<td>'.$row['post_id'].'</td>';
		echo '<td><input type="text" name="title" value="'.$row['title'].'" readonly="readonly"></td>';
		echo '<td><input type="text" name="author" value="'.$row['author'].'" readonly="readonly"></td>';
		$correct_time = convert_time_string($row['last_update']);
		echo '<td>'.$correct_time.'</td></tr>';
		echo '<tr><th colspan="4">내용</th></tr>';
		echo '<tr><td colspan="4"><textarea name="content" rows="10" cols="100%" readonly> '.$row['content'].'</textarea></td></tr>';

		printf ("<input type='hidden' name='board_id' value='%s'>", $board_id);
		if ($board_id == 1) {
			echo '<tr>';
			echo '<th colspan="4">비고</th>';
			echo '<tr><td colspan="4"><textarea name="note" rows="10" readonly>'.$row['note'].'</textarea></td></tr>';
			echo '</tr>';
		}
	}
	echo '</table>';
	if ($board_id == 1) {
		echo '<div style="float:right;margin-top:10px;"><a href="edit_post.php?post_id='.$row['post_id'].'&board_id=1"><input type="button" value="수정하기"></a> <a href="index.php"><input type="button" value="목록보기"></a></div>';
		echo '<form action="delete.php" method="POST"><input type="hidden" name="post_id" value="'.$row['post_id'].'"><input type="submit" value="삭제하기"></form>';
	} else {
		echo '<div style="float:right;margin-top:10px;"><a href="edit_post.php?post_id='.$row['post_id'].'&board_id=0"><input type="button" value="수정하기"></a> <a href="index.php"><input type="button" value="목록보기"></a></div>';		
		echo '<form action="delete.php" method="POST"><input type="hidden" name="post_id" value="'.$row['post_id'].'"><input type="submit" value="삭제하기"></form>';
	}
	mysqli_free_result($result);
	mysqli_close($conn);

?>

</div>
</body>
</html>
