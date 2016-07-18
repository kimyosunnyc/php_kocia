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
	
	require_once 'class_post.php';
	$conn = db_connect();

	echo '<table>';
	echo '<tr>';
	echo '<th class="num">번호</th>';
	echo '<th>제목</th>';
	echo '<th>작성자</th>';
	echo '<th>최근작성일</th>';
	echo '</tr>';

	$post = get_post_with_id ($number_confirm);
	
	echo '<tr>';
	echo '<td>'.$post->getId().'</td>';
	echo '<td><input type="text" name="title" value="'.$post->getTitle().'" readonly></td>';
	echo '<td><input type="text" name="author" value="'.$post->getAuthor().'" readonly></td>';
	$correct_time = convert_time_string($post->getLastUpdate());
	echo '<td>'.$correct_time.'</td></tr>';
	echo '<tr><th colspan="4">내용</th></tr>';
	echo '<tr><td colspan="4"><textarea name="content" rows="10" cols="100%" readonly> '.$post->getContent().'</textarea></td></tr>';

	printf ("<input type='hidden' name='board_id' value='%s'>", $post->getBoardId());
	if ($board_id == 1) {
		echo '<tr>';
		echo '<th colspan="4">비고</th>';
		echo '<tr><td colspan="4"><textarea name="note" rows="10" readonly>'.$post->getNote().'</textarea></td></tr>';
		echo '</tr>';
	}

	echo '</table>';
	echo '<div style="float:right;margin-top:10px;"><a href="edit_post.php?post_id='.$post->getId().'&board_id=1"><input type="button" value="수정하기"></a> <a href="index.php"><input type="button" value="목록보기"></a></div>';
	echo '<form action="delete_post.php" method="POST"><input type="hidden" name="post_id" value="'.$post->getId().'"><input type="submit" value="삭제하기"></form>';

	
	/* 댓글 시작 */
	
	echo '<div class="comment">';
	echo '<h2>Comment</h2>';
	echo '<form name ="comment_form" method = "POST" action = "comment_insert.php">';
	echo '<table>';
	echo '<tbody>';
	echo '<tr>';
	echo '<td colspan="2"><input type="hidden" name="post_id" value="'.$post->getId().'"><textarea rows="3" type="text" name="comment"></textarea></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<colgroup>';
	echo '<col width="80%">';
	echo '<col width="20%">';
	echo '</colgroup>';
	echo '<td><input type="text" name="visitor"></td>';
	echo '<td><input type="submit" value="댓글쓰기"></td>';
	echo '</tr>';
	echo '</tbody>';
	echo '</table>';
	echo '</form>';
	echo '<div><a href="#">[수정하기]</a> <a href="#">[삭제하기]</a></div>';
	echo '</div>';


	$comments = get_comment_in_post ($number_confirm);

	if (count($comments) == 0) {
				
		echo '<div style="margin:50px 0;padding:40px;border:1px solid #ddd;background:#f2f2f2;">댓글이 존재하지 않습니다. <br>댓글을 적어주세요.</div>';
	} else {
		
		echo '<div class="comment" margin-bottom:150px;>';
		echo '<table>';
		echo '<tbody>';
		echo '<colgroup><col width="7%"><col width="45%"><col width="20%"><col width="28%"></colgroup>';
		echo '<tr>';
		echo '<th>번호</th>';
		echo '<th>내용</th>';
		echo '<th>작성자</th>';
		echo '</tr>';

		foreach ($comments as $key => $comment) {
			echo '<tr>';
			echo '<td>'.$comment->getCommentId().'</td>';
			echo '<td>'.$comment->getComment().'</td>';
			echo '<td>'.$comment->getVisitor().'</td>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
		echo '</div>';
	}
	

?>


</div>
</body>
</html>
