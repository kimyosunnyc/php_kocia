<?php

	require_once '../../../includes/mylib.php';
	$conn = db_connect();

	// 특정 게시물 반환
	function get_post_with_id($post_id) {
		$conn = db_connect();
		$query = 'SELECT post_id, title, author, content, last_update, note, board_id FROM kimyosunny.post WHERE post_id = ?';
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'i', $post_id);
		if (!mysqli_stmt_execute($stmt)) {
			die('add_post query failure');
		}
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);
		$post = new Post($row['post_id'], $row['title'], $row['author'], $row['content'], $row['last_update'], $row['note'], $row['board_id']);
		mysqli_free_result($result);
		
		mysqli_close($conn);
		return $post;
	}

	function add_post ($title, $content, $author, $note, $board_id) {
		//echo 'Inserting new post, title: '.$title.' author: '.$author.' content: '.$content.' note: '.$note.'<br><br>';
		echo 'Inserting new post, title: '.$title.' author: '.$author.' content: '.htmlspecialchars($content).'<br><br>';
		$conn = db_connect();
		$query = 'INSERT INTO kimyosunny.post (title, content, author, note, board_id) VALUES (?, ?, ?, ?, ?)';
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'ssssi', $title, $content, $author, $note, $board_id);
		if (!mysqli_stmt_execute($stmt)) {
			die('add_post query failure');
		}
		mysqli_close($conn);
	}
	
	function edit_post ($title, $content, $author, $note, $board_id, $post_id) {
		
		$conn = db_connect();
		$post_id = $_POST['post_id'];
		$board_id = $_POST['board_id'];
		$query = 'UPDATE kimyosunny.post SET title =?, content =?, author =?, note =?, board_id = ? WHERE post_id = ?';
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'ssssii', $title, $content, $author, $note, $board_id, $post_id);
		if ($stmt == false) {
			echo mysqli_error($conn);
		}
		if (!mysqli_stmt_execute($stmt)) {
			die('add_post query failure');
		}
		mysqli_close($conn);
		return $stmt;
	}
	
	function delete_post ($post_id) {
		
		$conn = db_connect();
		$post_id = $_POST['post_id'];
		$query = 'DELETE FROM kimyosunny.post WHERE post_id = ?';
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'i', $post_id);
		if ($stmt === false) {
			echo mysqli_error($conn);
			die();
		}
		if (!mysqli_stmt_execute($stmt)) {
			die('add_post query failure');
		}
		mysqli_close($conn);
		return $stmt;
	}
	
	class Post {
		function __construct($post_id, $title, $author, $content, $last_update, $note, $board_id) {
			$this->postId = $post_id;
			$this->title = $title;
			$this->author = $author;
			$this->content = $content;
			$this->lastUpdate = $last_update;
			$this->note = $note;
			$this->boardId = $board_id;
		}
		
		function getId() {
			return $this->postId;
		}
		
		function getTitle() {
			return $this->title;
		}
		
		function getAuthor() {
			return $this->author;
		}
		
		function getContent() {
			return $this->content;
		}
		
		function getLastUpdate() {
			return $this->lastUpdate;
		}
		
		function getNote() {
			return $this->note;
		}
		
		function getBoardId() {
			return $this->boardId;
		}
	}
	
	// 특정 comment 반환
	function get_comment_with_id($comment_id) {
		$conn = db_connect();
		$query = 'SELECT comment_id, comment, visitor, post_id FROM comment WHERE comment_id = ?';
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'i', $comment_id);
		if (!mysqli_stmt_execute($stmt)) {
			die('add_post query failure');
		}
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);
		$comment = new Comment($row['comment_id'], $row['comment'], $row['visitor'], $row['post_id']);
		mysqli_free_result($result);
		
		mysqli_close($conn);
		return $comment;
	}
	
	// 한 게시물에 달린 모든 comment 의 반환
	function get_comments_in_post($post_id) {
		$conn = db_connect();
		$query = 'SELECT comment_id, comment, visitor, post_id FROM kimyosunny.comment WHERE post_id = ?';
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'i', $post_id);
		if (!mysqli_stmt_execute($stmt)) {
			die('add_post query failure');
		}
		$result = mysqli_stmt_get_result($stmt);
		$comments = array();
		while($row = mysqli_fetch_assoc($result)) {
			
			$comments[] = new Comment($row['comment_id'], $row['comment'], $row['visitor'], $row['post_id']);
		}
		
		mysqli_free_result($result);
		mysqli_close($conn);
		return $comments;
	}
	
	function add_comment ($comment, $visitor, $post_id) {
		$conn = db_connect();
		$query = 'INSERT INTO comment (comment, visitor, post_id) VALUES (?, ?, ?)';
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'ssi', $comment, $visitor, $post_id);
		if (!mysqli_stmt_execute($stmt)) {
			die('add_post query failure');
		}
		mysqli_close($conn);
	}
	
	function edit_comment ($comment_id, $comment, $visitor) {
		
		$conn = db_connect();
		$comment_id = $_POST['comment_id'];
		$query = 'UPDATE kimyosunny.comment SET comment = ?, visitor = ? WHERE comment_id = ?';
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'ssi', $comment, $visitor, $comment_id);
		if ($stmt == false) {
			echo mysqli_error($conn);
		}
		if (!mysqli_stmt_execute($stmt)) {
			die('add_post query failure');
		}
		mysqli_close($conn);
		return $stmt;
	}
	
	function delete_comment ($comment_id) {
		
		$conn = db_connect();
		$comment_id = $_POST['comment_id'];
		$query = 'DELETE FROM kimyosunny.comment WHERE comment_id = ?';
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'i', $comment_id);
		
		if ($stmt === false) {
			echo mysqli_error($conn);
			die();
		}
		if (!mysqli_stmt_execute($stmt)) {
			die('add_post query failure');
		}
		mysqli_close($conn);
		return $stmt;
	}
	
	class Comment {
		function __construct($comment_id, $comment, $visitor, $post_id) {
			$this->comment_id = $comment_id;
			$this->comment = $comment;
			$this->visitor = $visitor;
			$this->post_id = $post_id;
		}
		
		function getCommentId() {
			return $this->comment_id;
		}
		
		function getVisitor() {
			return $this->visitor;
		}
		
		function getComment() {
			return $this->comment;
		}
		
		function getPostId() {
			return $this->post_id;
		}

	}
	

?>
