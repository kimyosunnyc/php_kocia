<?php
	require $_SERVER['DOCUMENT_ROOT'].'/../includes/my/mylib.php';

	// 생성 시각으로 정렬된 모든 게시물 중 일부 구간을 반환
	function get_posts($begin, $num) {
		$conn = get_db_connection();
		$query = sprintf("SELECT * FROM bulletin_board__post ORDER BY post_id DESC LIMIT %s, %s", $begin, $num);
		$result = mysqli_query($conn, $query);
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
		echo 'Inserting new post, title: '.$title.' author: '.$author.' content: '.$content.'<br><br>';
		$conn = get_db_connection();
		$query = sprintf("INSERT INTO bulletin_board__post (title, author, content) values('%s','%s','%s');", $title, $author, $content);
		mysqli_query($conn, $query);
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