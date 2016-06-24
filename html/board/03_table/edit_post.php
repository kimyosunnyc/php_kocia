<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>

<div class="wrap">
	<div style="float:right;"><a href="../../index.php">홈으로</a></div>
	<h1>게시글 수정</h1>

<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$number_confirm = $_GET['post_id'];
		$board_id = $_GET['board_id'];
	}
	
	require_once '../../../includes/mylib.php';
	$conn = db_connect();

	$board_edit = 'update board_id set title='$title', content='$content' where post_id = $post_id'; 
	
	$select_query = 'SELECT post_id, title, content, note, author, last_update FROM post WHERE post_id = '.$number_confirm;
	$result = mysqli_query($conn, $select_query);
	
	if($row = mysqli_fetch_assoc($result)) {
		
	}

	mysqli_free_result($result);
	mysqli_close($conn);

?>
	<table>
		<tr>
			<th class="num">번호</th>
			<th>제목</th>
			<th>작성자</th>
			<th>최근작성일</th>
		</tr>
		<tr>
			<td><?php echo $row['post_id']; ?></td>
			<td><input type="text" name="title" value="<?php echo $row['title']; ?>"></td>
			<td><?php echo $row['author']; ?></td>
			<td><?php echo $row['last_update']; ?></td>
		</tr>
		<tr>
			<th colspan="4">내용</th>
		</tr>
		<tr>
			<td colspan="4"><textarea name="content" rows="10" cols="100%"><?php echo $row['content']; ?></textarea></td>
		</tr>
	</table>
	
	<div style="float:right;">
		<form name ="write_form" method = "POST" action = "edit_post.php">
		<ul style="display:inline;padding:0;margin:10px 0;">
			<li style="list-style:none;float:left;margin-right:5px;"><input type="submit" value="확인"></li>
			<li style="list-style:none;float:left;"><a href="index.php" target="_self"><input type="submit" value="취소"></a></li>
		</ul>
		</form>
	</div>
</div>
	
</div>
</body>
</html>
