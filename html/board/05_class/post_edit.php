<!DOCTYPE html>
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
	
	require_once 'class.php';
	$conn = db_connect();
?>
	<form name ="write_form1" method = "POST" action = "post_update.php">
	<table>
	<tr>
	<th class="num">번호</th>
	<th>제목</th>
	<th>작성자</th>
	<th>최근작성일</th>
	</tr>

<?php $post = get_post_with_id ($number_confirm); ?>
		
	<tr>
	<td><input type="hidden" name="post_id" value="<?php echo $post->getId(); ?>" readonly><?php echo $post->getId(); ?></td>
	<td><input type="text" name="title" value="<?php echo $post->getTitle(); ?>"></td>
	<td><input type="text" name="author" value="<?php echo $post->getAuthor(); ?>" readonly></td>
<?php $correct_time = convert_time_string($post->getLastUpdate()); ?>
	<td><?php echo $correct_time; ?></td></tr>
	<tr><th colspan="4">내용</th></tr>
	<tr><td colspan="4"><textarea name="content" rows="10" cols="100%"> <?php echo $post->getContent(); ?></textarea></td></tr>
<?php
	printf ("<input type='hidden' name='board_id' value='%s'>", $post->getBoardId());
	if ($board_id == 1) {
		echo '<tr>';
		echo '<th colspan="4">비고</th>';
		echo '<tr><td colspan="4"><textarea name="note" rows="10">'.$post->getNote().'</textarea></td></tr>';
		echo '</tr>';
	}
?>
	</table>
	
	<div style="float:right;margin-top:10px;">
		<input type="submit" value="수정하기"> 
		<a href="index.php"><input type="button" value="목록보기"></a>
	</div>
	</form>


</div>
</body>
</html>
