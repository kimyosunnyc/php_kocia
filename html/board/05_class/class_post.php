<?php

	require_once '../../../includes/mylib.php';
	$conn = db_connect();

	// 특정 게시물 반환
	function get_post_with_id($post_id) {
		$conn = db_connect();
		$query = sprintf("SELECT post_id, title, author, content, last_update, note, board_id FROM post WHERE post_id = %d", $post_id);
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$post = new Post($row['post_id'], $row['title'], $row['author'], $row['content'], $row['last_update'], $row['note'], $row['board_id']);
		mysqli_free_result($result);
		
		mysqli_close($conn);
		return $post;
	}
	
	function add_post ($title, $content, $author, $note, $board_id) {
		//echo 'Inserting new post, title: '.$title.' author: '.$author.' content: '.$content.' note: '.$note.'<br><br>';
		$conn = db_connect();
		$query = sprintf("INSERT INTO post (title, content, author, note, board_id) VALUES ('%s', '%s', '%s', '%s', %d);", $title, $content, $author, $note, $board_id);
		mysqli_query($conn, $query);
		mysqli_close($conn);
	}
	
	function edit_post ($title, $content, $note, $post_id, $board_id) {
		
		$conn = db_connect();
		$post_id = $_POST['post_id'];
		$board_id = $_POST['board_id'];
		$query = sprintf("UPDATE post SET title='%s', content='%s', note='%s' WHERE post_id = %d AND board_id = %d;", $title, $content, $note, $post_id, $board_id);
		$result = mysqli_query($conn, $query);
		if ($result == false) {
			echo mysqli_error($conn);
		}
		mysqli_close($conn);
		return $result;
	}
	
	function delete_post ($post_id) {
		
		$conn = db_connect();
		$post_id = $_GET['post_id'];
		$query = sprintf("DELETE FROM post WHERE post_id = %d;", $post_id);
		$result = mysqli_query($conn, $query);
		mysqli_close($conn);
		return $result;
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
		$query = sprintf("SELECT comment_id, comment, visitor, post_id FROM comment WHERE comment_id = %d", $comment_id);
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$comment = new Comment($row['commnet_id'], $row['comment'], $row['visitor'], $row['post_id']);
		mysqli_free_result($result);
		
		mysqli_close($conn);
		return $comment;
	}
	
	// 한 게시물에 달린 모든 comment 의 반환
	function get_comment_in_post($post_id) {
		$conn = db_connect();
		$query = sprintf("SELECT comment_id, comment, visitor, post_id FROM comment WHERE post_id = %d", $post_id);
		$result = mysqli_query($conn, $query);
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
		$query = sprintf("INSERT INTO comment (comment, visitor, post_id) VALUES ('%s', '%s', %d);", $comment, $visitor, $post_id);
		mysqli_query($conn, $query);
		mysqli_close($conn);
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
