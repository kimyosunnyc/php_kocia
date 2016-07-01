<?php

	require_once '../../../includes/mylib.php';
	$conn = db_connect();

	// 특정 게시물 반환
	function get_user_account($id, $password) {
		$conn = db_connect();
		
		$stmt = mysqli_prepare($conn, "SELECT id, password FROM user_account WHERE id = ? Order By id DESC");
		mysqli_stmt_bind_param($stmt, "s", $id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);
		$account = new Account($row['id'], $row['password']);
		mysqli_free_result($result);
		mysqli_close($conn);
		return $account;
	}
	
	function add_id ($id, $password) {
		$conn = db_connect();
		$query = sprintf("INSERT INTO user_account VALUES (?, ?)");

		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, "ss", $id, password_hash($password, PASSWORD_DEFAULT));
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
	}
	
	class Account {
		function __construct($id, $password) {
			$this->accountID = $id;
			$this->accountPW = $password;
		}
		
		function getId() {
			return $this->accountID;
		}
		
		function getTitle() {
			return $this->accountPW;
		}

	}


?>
