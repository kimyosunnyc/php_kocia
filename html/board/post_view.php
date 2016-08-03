<?php
	require_once 'class.php';
	require_once 'security/session.php';
	require_once 'security/class_login.php';
	start_session();
?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<head>
<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
<script language="javascript" src="js/check_form.js"></script>
<script language="javascript" src="js/jquery-1.11.2.js"></script>
<script>
function setDisplay(elems, mode) {
	for (var i = 0; i < elems.length; i++) {
		elems[i].style.display = mode;
	}	
}

function getRowByCommentId(row) {
	return document.getElementById('comment_id' + row);
}

function getCommentButtons() {
	return Array.prototype.slice.call(document.getElementsByClassName('edit_comment_button')).concat(
			Array.prototype.slice.call(document.getElementsByClassName('delete_comment_button')));;
}

function resetCommentButtonDisplay() {
	setDisplay(getCommentButtons(), '');
}

function deleteRowById(table, rowId) {
	for (var i = 0; i < table.rows.length; i++) {
		if (table.rows[i].id === rowId) {
			table.deleteRow(i);
			return;
		}
	}
	alert('deleteRowById not found');
}

function addComment(postId, author, textarea) {
	//alert(comment);
	var comment = textarea.value;
	textarea.value = '';
	if (comment === '') {
		alert('댓글 빈칸안됨');
		return false;
	}
	
	var comment_id = ajaxAddComment(postId, comment);
	//alert(reply_id);
	var table = document.getElementById('comment-table');
	var row = table.insertRow(1);
	row.id = 'comment_id' + comment_id;
	row.innerHTML = document.getElementById('prototype_row').innerHTML;
	row.children[0].innerHTML = author;
	row.children[1].innerHTML = htmlspecialchars(comment);
	//row.children[2].children[0].onclick = function(i) { return function() { editComment(row.children[2].children[0], i); }} (comment_id);
	row.children[2].children[0].onclick = function() { editComment(row.children[2].children[0], comment_id); }
	row.children[3].children[0].onclick = function() { deleteComment(comment_id); }
}

var isEditCommentMode = false;
function editComment(button, commentId) {
	var cell = getRowByCommentId(commentId).children[1];
	if (isEditCommentMode == false) {
		//alert(commentId);
		var comment = cell.innerHTML;
		cell.innerHTML = '';
		var textarea = document.createElement('textarea');
		textarea.id = commentId + 'textarea';
		cell.appendChild(textarea);
		textarea.value = comment;
		textarea.cols = 60;
		isEditCommentMode = true;
		setDisplay(getCommentButtons(), 'none'); // 댓글 수정 중에 다른 댓글 수정 버튼을 누르면...
		button.style.display = '';
		button.value = '수정완료';
	} else {
		var textarea = document.getElementById(commentId + 'textarea');
		var comment = textarea.value;
		if (comment == '') {
			alert('댓글은 빈칸 안됨');
			textarea.focus();
			return false;
		}
		ajaxEditComment(commentId, comment);
		cell.innerHTML = htmlspecialchars(comment);
		isEditCommentMode = false;
		resetCommentButtonDisplay();
		button.value = '수정';
	}
}

function deleteComment(commentId) {	
	if (confirm('정말 삭제하겟습니까?')) {
		ajaxDeleteComment(commentId);
		var table = document.getElementById('comment-table');
		deleteRowById(table, 'comment_id' + commentId);
	} 
}

function ajaxAddComment(postId, comment) {
	var commentId = '';
	$.ajax({ 
		url: 'ajax_add_comment.php',
		type: 'POST',
		async: false,
		data: { post_id: postId, comment: comment },
		success: function(result) {
			//alert('result' + result);
			commentId = result;
		},
		error: function(xhr) {
			alert('ajaxEditComment');
		},
		timeout : 1000
	});	
	return commentId;
}
function ajaxEditComment(commentId, newContent) {
	$.ajax({ 
		url: 'ajax_edit_comment.php',
		type: 'POST',
		async: false,
		data: { comment_id: commentId, comment: newContent },
		success: function(result) {
		},
		error: function(xhr) {
			alert('ajaxEditComment');
		},
		timeout : 1000
	});		
}
function ajaxDeleteComment(commentId) {
	$.ajax({ 
		url: 'ajax_delete_comment.php',
		type: 'POST',
		async: false,
		data: { comment_id: commentId },
		success: function(result) {
		},
		error: function(xhr) {
			alert('ajaxDeleteComment');
		},
		timeout : 1000
	});		
}

var currentDisplayedComments = 0;
var replyBlockSize = 10;
function showMoreComments(button) {
	var table = document.getElementById('comment-table');
	var numTotalComments = table.rows.length;
	//alert(numTotalComments);
	var nextDisplayedComments = Math.min(currentDisplayedComments + commentBlockSize, numTotalComments);
	for (var rownum = 0; rownum < numTotalComments; rownum++) {
		var row = table.rows[rownum];
		if (rownum < nextDisplayedComments) {
			row.style.display = '';
		} else {
			row.style.display = 'none';
		}
	}
	currentDisplayedComments = nextDisplayedComments;
	if (nextDisplayedComments === numTotalComments) {
		button.style.display = 'none';
	}
}
</script>
</head>

<body>
<div class="wrap">
	<div style="float:right;margin-bottom:20px;"><a href="../../index.php">홈으로</a></div>
	<h1>게시판</h1>

    <?php

/*if ($_SERVER['REQUEST_METHOD'] == 'GET') {
$number_confirm = $_GET['post_id'];
$board_id = $_GET['board_id'];
}*/

if (!isset($_SESSION['post_id'])) { // 게시물 화면에 처음 왔다.
    if (!isset($_GET['post_id'])) { // 직전 화면이 메인 화면이 아니었다. 에러
        die('view_post error');
    } else {
        $post_id = $_GET['post_id'];
        $board_id = $_GET['board_id'];
    }
} else if (!isset($_GET['post_id'])) { // 직전 화면이 메인 화면이 아님
    $post_id = $_SESSION['post_id'];
    $board_id = $_SESSION['board_id'];
} else { // 메인화면에서 온 경우
    $post_id = $_GET['post_id'];
    $board_id = $_GET['board_id'];
}

$_SESSION['post_id'] = $post_id; // 마지막으로 본 게시물 기억
$_SESSION['board_id'] = $board_id;

$post = get_post_with_id($post_id);
$title = $post->getTitle();
$author = $post->getAuthor();
$comment = $post->getContent();

?>

	<table>
		<tr>
			<th class="num">번호</th>
			<th>제목</th>
			<th>작성자</th>
			<th>최근작성일</th>
		</tr>
	<?php
		$post = get_post_with_id ($post_id);
	?>
		<tr>
			<td><?php echo $post->getId(); ?></td>
			<td><input type="text" name="title" value="<?php echo $post->getTitle(); ?>" readonly></td>
			<td><input type="text" name="author" value="<?php echo $post->getAuthor(); ?>" readonly></td>
			<?php $correct_time = convert_time_string($post->getLastUpdate());?>
			<td><?php echo $correct_time; ?></td>
		</tr>
		<tr>
			<th colspan="4">내용</th>
		</tr>
		<tr>
			<td colspan="4">
				<textarea name="comment" rows="10" cols="100%" readonly><?php echo $post->getContent(); ?>
				</textarea>
			</td>
		</tr>
	<?php
		printf ("<input type='hidden' name='board_id' value='%s'>", $post->getBoardId());
		if ($board_id == 1) {
	?>
		<tr>
			<th colspan="4">비고</th>
		</tr>
		<tr>
			<td colspan="4">
				<textarea name="note" rows="10" readonly><?php echo $post->getNote(); ?>
				</textarea>
			</td>
		</tr>
	<?php
		}
	?>

	</table>
	<div style="float:left;margin-top:10px;">
		<a href="index.php"><input type="button" value="목록보기"></a>
	</div>

	<?php
		$replies = get_post_with_id($post_id);
		if (check_login() && $_SESSION['id'] === $author) {
	?>
	<div style="float:right;">
		<form action="post_delete.php" method="POST" style="margin-top:10px;">
			<a href="post_edit.php?post_id=<?php echo $post->getId(); ?>&board_id=<?php echo $post->getBoardId(); ?>"><input type="button" value="수정하기"></a>
			<input type="hidden" name="post_id" value="<?php echo $post->getId(); ?>">
			<input type="submit" value="삭제하기">
		</form>
	</div>
	<?php
	}
	?>


          <!-- 댓글 시작 -->

<div class="comment">
	 <h2>Comment</h2>


<?php
$comments = get_comments_in_post ($post_id);
if (count($comments) == 0) {
?>
              <div style="margin:50px 0;padding:40px;border:1px solid #ddd;background:#f2f2f2;">댓글이 존재하지 않습니다.
                <br>댓글을 적어주세요.</div>
<?php
} else {
?>
	<div style="margin:20px 0;">
		<table style="display: none;">
			<tr id="prototype_row">
				<td width="15%">comment_author</td>
				<td width="75%">comment_content</td>
				<td><input class="edit_comment_button" type="button" value="수정" style="width: 70px;"> </input></td>
				<td><input class="delete_comment_button" type="button" value="삭제" style="width: 70px;"> </input></td>
			</tr>
		<table>
		<table id="comment-table" class="post-table">
		<tbody>
			<colgroup>
				<col width="7%">
				<col width="51%">
				<col width="12%">
				<col width="10%">
				<col width="10%">
			</colgroup>
			<tr>
				<th>번호</th>
				<th>내용</th>
				<th>작성자</th>
				<th>수정</th>
				<th>삭제</th>
			</tr>
			<?php
				/*$comment_row_num = 0;
				foreach ($comments as $key => $comment) {
					$comment_id = $comment->getCommentId();
					$comment_content = $comment->getComment();
					$visitor = $comment->getVisitor();*/
					
				for($i = 0; $i < count($comments); $i++) { 
				$comment = $comments[$i];
				$comment_id = $comment->getCommentId();
				$comment_content = $comment->getComment();
				$visitor = $comment->getVisitor();
					
			?>
				<tr id="comment_row_num<?php echo $comment_row_num; ?>">
					<td><?php echo $comment_id; ?></td>
					<td id="<?php echo $comment_id; ?>"><?php echo htmlspecialchars($comment_content); ?></td>
					<td><?php echo $visitor; ?></td>
				<?php

					if (check_login() && $_SESSION['id'] === $visitor) {
				?>
					<td>
						<input  class="edit_comment_button" type="button" value="수정" onclick="editComment(this, <?php echo $comment_id; ?>);"> </input>
					</td>
					<td>
						<input class="delete_comment_button" type="button" value="삭제" onclick="deleteComment(<?php echo $comment_id; ?>);"> </input>
					</td>
				<?php
					} else {
						echo '<td></td>';
						echo '<td></td>';
					}
				echo '</tr>';
				}
				?>
		</tbody>
		</table>
		<p>
			<input type="button" id="show_more_comment_button" value="댓글 더보기" style="float: right;" 
			onClick="showMoreComments(<?php echo count($comments); ?>, this);"> </input><br><br>   
			<script>
				showMoreComments(<?php echo count($comments); ?>, 
				document.getElementById('show_more_comment_button'));
			</script>
		</p>
	</div>
<?php
}
?>
<?php
	if (check_login()) { // 로그인된 유저만 댓글작성 가능
?>
	<div style="margin-bottom:150px;">
		<form name="comment_form" method="POST" action="comment_insert.php">
			<table>
			<tbody>
				<colgroup>
					<col width="80%">
					<col width="20%">
				</colgroup>
				<tr>
					<td>
						<input type="hidden" name="post_id" value="<?php echo $post->getId(); ?>">
						<input type="hidden" name="visitor" value="<?php echo $visitor; ?>">
						<textarea rows="3" type="text" name="comment"></textarea>
					</td>
					<td>
						<input type="submit" value="댓글쓰기">
					</td>
				</tr>
			</tbody>
			</table>
		</form>
	</div>
 </div>
<?php
	}
?>
  </div>
</body>

</html>