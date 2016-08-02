<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
<script>
var isEditReplyMode = false;
function editReply(button, replyId, form) {
	var cell = document.getElementById(replyId);
	if (isEditReplyMode == false) {
		var content = cell.innerHTML;
		cell.innerHTML = '';
		var textarea = document.createElement('textarea');
		textarea.id = replyId + 'textarea';
		cell.appendChild(textarea);
		textarea.value = content;
		textarea.cols = 60;
		isEditReplyMode = true;
		button.value = '수정완료';
	} else {
		var textarea = document.getElementById(replyId + 'textarea');
		var content = textarea.value;
		if (content == '') {
			alert('댓글은 빈칸 안됨');
			textarea.focus();
			return false;
		}
		//cell.innerHTML = content;
		isEditReplyMode = false;
		button.value = '수정';
		var element = document.createElement('input');
		form.appendChild(element);
		element.name = 'content';
		element.type = 'hidden';
		element.value = content;
		form.submit();
	}
	return false;
}
</script>
</head>
<body>
<div class="content">
<h1>나의 게시판</h1>
<?php
	require_once 'Post.php';
	require_once 'Reply.php';
	require_once 'security/session.php';
	start_session();

	if (!isset($_SESSION['post_id'])) { // 게시물 화면에 처음 왔다.
		if (!isset($_GET['post_id'])) { // 직전 화면이 메인 화면이 아니었다. 에러
			die('view_post error');
		} else {
			$post_id = $_GET['post_id'];
		}
	} else if (!isset($_GET['post_id'])) { // 직전 화면이 메인 화면이 아님
		$post_id = $_SESSION['post_id'];	
	} else {
		$post_id = $_GET['post_id'];
	}
	
	$_SESSION['post_id'] = $post_id; // 마지막으로 본 게시물 기억
	
	$post = get_post_with_id($post_id);
	$title = $post->getTitle();
	$author = $post->getAuthor();
	$content = $post->getContent();
	echo '제목: '.htmlspecialchars($title).'<br>';
	echo '글쓴이: '.htmlspecialchars($author).'<br>';
	echo '번호: '.$post_id.'<br>';
	echo '내용:<br>';
?>
	<textarea rows="20" cols="100" readonly="true"><?php echo htmlspecialchars($content); ?></textarea>

<?php
	$replies = get_replies($post_id);

	if (check_login() && $_SESSION['id'] === $author) {
?>
		<form action="view_edit_post.php" method="post">
			<input type="submit" value="이 게시물 수정하기"> </input>
			<input type="hidden" name="post_id" value="<?php echo $post_id; ?>"></input>
		</form><br>	
		<form action="delete_post.php" method="post">
			<input type="submit" value="이 게시물 삭제하기"> </input>
			<input type="hidden" name="post_id" value="<?php echo $post_id; ?>"></input>
		</form><br>	
<?php
	}

	if (count($replies) !== 0) {	
?>
	<table class="post-table" style="margin-bottom: 50px;">
	<tr><th width="15%">작성자</th><th>내용</th><th></th><th></th></tr>
<?php
		foreach ($replies as $reply) {
			$reply_author = $reply->getAuthor();
			$reply_content = $reply->getContent();
			$reply_id = $reply->getId();
			echo '<tr><td width="15%">'.$reply_author.'</td><td width="75%" id="'.$reply_id.'">'.htmlspecialchars($reply_content).'</td>';
			if (check_login() && $_SESSION['id'] === $reply_author) {
?>
				<td><form action="edit_reply.php" method="post">
					<input type="button" value="수정" style="width: 50px;" onClick="editReply(this, <?php echo $reply_id; ?>, this.form);"> </input>
					<input type="hidden" name="reply_id" value="<?php echo $reply_id; ?>"></input>
				</form></td>
				<td><form action="delete_reply.php" method="post">
					<input type="submit" value="삭제" style="width: 50px;"> </input>
					<input type="hidden" name="reply_id" value="<?php echo $reply_id; ?>"></input>
				</form></td>
<?php
			}
			echo '</tr>';
		}
	}
?>
	</table>
<?php	
	if (check_login()) { // 로그인된 유저만 댓글작성 가능
?>
	<form action="create_reply.php" method="post">
		<input type="hidden" name="post_id" value="<?php echo $post_id; ?>"></input>
		<textarea name="content" rows="5" cols="100" placeholder="댓글내용을 여기에 입력하세요"></textarea><br>
		<input type="submit" value="댓글 등록"></input>
	</form><br>

<?php
	} 
?>	

	<form action="view_list.php" method="get">
		<input type="submit" value="메인메뉴로가기"> </input>
	</form>
</div>
</body>
</html>