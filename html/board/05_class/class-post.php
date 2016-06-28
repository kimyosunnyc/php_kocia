<?php

	require_once '../../../includes/mylib.php';
	$conn = db_connect();

	// 특정 게시물 반환
	function get_post_with_id($post_id) {
		$conn = db_connect();
		$query = sprintf("SELECT post_id, title, author, content, last_update, note, board_id FROM post WHERE post_id = %s", $post_id);
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
	
	function delete_post ($post_id) {
		
		$conn = db_connect();
		$post_id = $_GET['post_id'];
		$query = sprintf("delete from bbs where post_id = %s;",$post_id);
		$result = mysqli_query($conn, $query);
		mysqli_free_result($result);
		mysqli_close($conn);
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

?>
