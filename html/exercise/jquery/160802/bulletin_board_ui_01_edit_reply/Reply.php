<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/../includes/my/mylib.php';

	// 해당 게시물에 달린 댓글들을 반환
	function get_replies($post_id) {
		$conn = get_db_connection();
		$query = sprintf("SELECT * FROM bulletin_board__reply WHERE post_id = '%s' ORDER BY reply_id DESC;", $post_id);
		//die($query);
		$result = mysqli_query($conn, $query);
		$replies = array();
		while($row = mysqli_fetch_assoc($result)) {
			$replies[] = new Reply($row['reply_id'], $row['post_id'], $row['author'], $row['content'], $row['created']);
		}
		mysqli_free_result($result);
		mysqli_close($conn);
		return $replies;
	}

	// 해당 게시물의 댓글 수
	function get_num_total_replies($post_id) {
		$conn = get_db_connection();
		$query = sprintf("SELECT COUNT(*) AS num FROM bulletin_board__reply WHERE post_id = '%s';", $post_id);
		$result = mysqli_query($conn, $query);
		mysqli_close($conn);
		return mysqli_fetch_assoc($result)['num'];
	}

	function add_reply($post_id, $author, $content) {
		echo 'Inserting new reply, post_id: '.$post_id.' author: '.$author.' content: '.htmlspecialchars($content).'<br><br>';
		$conn = get_db_connection();
		$query = 'INSERT INTO bulletin_board__reply (post_id, author, content) values(?, ?, ?)';
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'iss', $post_id, $author, $content);
		if (!mysqli_stmt_execute($stmt)) {
			die('add_reply query failure');
		}
		mysqli_close($conn);
	}

	function edit_reply($reply_id, $new_content) {
		echo 'Editing reply id: '.$reply_id;
		$conn = get_db_connection();
		$query = 'UPDATE bulletin_board__reply SET content=? WHERE reply_id=?';
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'si', $new_content, $reply_id);
		if (!mysqli_stmt_execute($stmt)) {
			die('edit_reply query failure');
		}
		mysqli_close($conn);
	}
	
	function delete_reply($reply_id) {
		echo 'Deleting reply, reply_id: '.$reply_id;
		$conn = get_db_connection();	
		$query = sprintf("DELETE FROM bulletin_board__reply WHERE reply_id='%s'", $reply_id);		
		$result = mysqli_query($conn, $query);
		if ($result === false) {
			die('delete_reply query failure');
		}
		mysqli_close($conn);
	}
	
	class Reply {
		function __construct($id, $post_id, $author, $content, $created) {
			$this->id = $id;
			$this->post_id = $post_id;
			$this->author = $author;
			$this->content = $content;
			$this->created = $created;
		}
		
		function getId() {
			return $this->id;
		}
		
		function getPostId() {
			return $this->post_id;
		}
		
		function getAuthor() {
			return $this->author;
		}
		
		function getContent() {
			return $this->content;
		}
		
		function getCreated() {
			return $this->created;
		}
	}