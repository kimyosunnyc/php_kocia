<?php

	require_once $_SERVER["DOCUMENT_ROOT"].'/../includes/mylib.php';
	$conn = db_connect();


	function get_user_account($id) {
		$conn = db_connect();
		$stmt = mysqli_prepare($conn, "SELECT id, password, user_real_name FROM user_account WHERE id = ? Order By id DESC");
		mysqli_stmt_bind_param($stmt, "s", $user_name, $id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);
		$account = new Account($row['id'], $row['password'], $row['user_real_name']);
		mysqli_free_result($result);
		mysqli_close($conn);
		return $account;
	}
	
	function add_id ($id, $password, $user_real_name) {
		$conn = db_connect();
		$query = sprintf("INSERT INTO user_account(id, user_real_name, hash) VALUES (?, ?, ?)");
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, "sss", $id, $user_real_name, password_hash($password, PASSWORD_DEFAULT));
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);		
	}
	
	class Account {
		function __construct($id, $password, $user_real_name) {
			$this->accountName = $user_real_name;
			$this->accountID = $id;
			$this->accountPW = $password;
		}
		
		function getName() {
			return $this->accountName;
		}
		
		function getId() {
			return $this->accountID;
		}
		
		function getTitle() {
			return $this->accountPW;
		}

	}


?>
