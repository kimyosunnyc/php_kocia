<?php

require_once 'session.php';
require_once 'class_login.php';
$conn = db_connect();
 
if (isset($_POST['user_real_name'], $_POST['id'], $_POST['password'])) {
	$user_real_name = $_POST['user_real_name'];
	$id = $_POST['id'];
	$password = $_POST['password']; 

	// 입력한 ID가 DB에 있는지 확인 필요.
	$stmt = mysqli_prepare($conn, "SELECT hash FROM user_account WHERE id = ?");
	mysqli_stmt_bind_param($stmt, "s", $id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	if (mysqli_num_rows($result) != 0) {// 이미 등록된 아이디
		header('Location: error.php?error_code=4');
		
	} else {
		add_id ($id, $password, $user_real_name);
		header('Location: register_ok.php');
	}

} else {
    echo '회원가입 폼 에러';
}

?>