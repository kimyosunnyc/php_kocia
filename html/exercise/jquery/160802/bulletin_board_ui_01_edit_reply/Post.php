<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/../includes/my/mylib.php';

	// 생성 시각으로 정렬된 모든 게시물 중 일부 구간을 반환
	function get_posts($search, $begin, $num) {
		$conn = get_db_connection();
		$query1 = sprintf("SELECT * FROM bulletin_board__post ");

		if (isset($search['keyword'])) {
			if ($search['category'] === 'title') {
				$condition = 'title LIKE ? ';
			} else if ($search['category'] === 'content') { 
				$condition = 'content LIKE ? ';
			} else { // title+content
				$condition = 'title LIKE ? OR content LIKE ? ';
			}
			$where_clause = 'WHERE '.$condition;
			$query1 = $query1.$where_clause;
		} 
		
		$query2 = sprintf('ORDER BY post_id DESC LIMIT ?, ?');
		$final_query = $query1.$query2;
		
		//die ($final_query);
		
		$stmt = mysqli_prepare($conn, $final_query);
		if (isset($search['category'])) {
			$expression = '%'.$search['keyword'].'%';
			if ($search['category'] === 'title' || $search['category'] === 'content') {
				mysqli_stmt_bind_param($stmt, 'sii', $expression, $begin, $num);
			} else { // title+content
				mysqli_stmt_bind_param($stmt, 'ssii', $expression, $expression, $begin, $num);
			}
		} else {
			mysqli_stmt_bind_param($stmt, 'ii', $begin, $num);
		}		
		if (!mysqli_stmt_execute($stmt)) {
			die('get_posts query failure: '.$final_query);
		}
		$result = mysqli_stmt_get_result($stmt);
		
		if ($result === false) {
			die('get_posts query failure2: '.$final_query);
		}		
		$posts = array();
		while($row = mysqli_fetch_assoc($result)) {
			$posts[] = new Post($row['post_id'], $row['title'], $row['author'], $row['content'], $row['created']);
		}
		mysqli_free_result($result);
		mysqli_close($conn);
		return $posts;
	}
	
	// 특정 게시물 반환
	function get_post_with_id($id) {
		$conn = get_db_connection();
		$query = sprintf("SELECT * FROM bulletin_board__post WHERE post_id = %s", $id);
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$post = new Post($row['post_id'], $row['title'], $row['author'], $row['content'], $row['created']);
		mysqli_free_result($result);
		mysqli_close($conn);
		return $post;
	}	
	
	function get_num_total_posts() {
		$conn = get_db_connection();
		$query = 'SELECT COUNT(*) AS num FROM bulletin_board__post';
		$result = mysqli_query($conn, $query);
		return mysqli_fetch_assoc($result)['num'];
	}

	function add_post($title, $author, $content) {
		echo 'Inserting new post, title: '.$title.' author: '.$author.' content: '.htmlspecialchars($content).'<br><br>';
		$conn = get_db_connection();
		$query = 'INSERT INTO bulletin_board__post (title, author, content) values(?, ?, ?)';
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'sss', $title, $author, $content);
		if (!mysqli_stmt_execute($stmt)) {
			die('add_post query failure');
		}
		mysqli_close($conn);
	}

	function edit_post($post_id, $new_content) {
		echo 'Editing post id: '.$post_id;
		$conn = get_db_connection();
		$query = 'UPDATE bulletin_board__post SET content=? WHERE post_id=?';
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, 'si', $new_content, $post_id);
		if (!mysqli_stmt_execute($stmt)) {
			die('edit_post query failure');
		}
		mysqli_close($conn);
	}
	
	function delete_post($post_id) {
		echo 'Deleting post id: '.$post_id;
		$conn = get_db_connection();
		$query = sprintf("DELETE FROM bulletin_board__post WHERE post_id='%s'", $post_id);
		$result = mysqli_query($conn, $query);
		if ($result === false) {
			die('delete_post query failure');
		}
		mysqli_close($conn);
	}
	
	class Post {
		function __construct($id, $title, $author, $content, $created) {
			$this->id = $id;
			$this->title = $title;
			$this->author = $author;
			$this->content = $content;
			$this->created = $created;
		}
		
		function getId() {
			return $this->id;
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
		
		function getCreated() {
			return $this->created;
		}
	}