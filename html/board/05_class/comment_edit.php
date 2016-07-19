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
		$comment_id = $_GET['comment_id'];
	}
	
	require_once 'class.php';
	$conn = db_connect();
	$comment = get_comment_with_id($comment_id);
	/* 댓글 시작 */
	?>

	<div>
		<h2>Comment</h2>
		<form name ="comment_form" method = "POST" action = "comment_update.php">
			<table>
				<tbody>
					<tr>
						<td colspan="3">
							<textarea rows="3" type="text" name="comment"><?php echo $comment->getComment(); ?></textarea>
						</td>
					</tr>
					<tr>
						<colgroup>
							<col width="20%">
							<col width="80%">
						</colgroup>
						<td><input type="hidden" name="comment_id" value="<?php echo $comment->getCommentId(); ?>" readonly><?php echo $comment->getCommentId(); ?></td>
						<td><input type="text" name="visitor" value="<?php echo $comment->getVisitor(); ?>"></td>
					</tr>
				</tbody>
			</table>
			<div style="float:right;margin-top:10px;">
				<input type="submit" value="수정하기">
			</div>
		</form>
		<div style="margin-top:10px;">
		<form action="comment_delete.php" method="POST">
			<a href="index.php"><input type="button" value="목록보기"></a> 
			<input type="hidden" name="comment_id" value="<?php echo $comment->getCommentId(); ?>">
			<input type="submit" value="삭제하기">
		</form>
		</div>
	</div>
</div>
</body>
</html>
