<?php

require_once 'session.php';
require_once 'class_login.php';
$conn = db_connect();
 
if (isset($_POST['id'], $_POST['password'])) {
    $id = $_POST['id'];
    $password = $_POST['password']; 

	$account = get_user_account ($id);
	if (mysqli_num_rows($result) != 0) { // 이미 등록된 아이디
		header('Location: error.php?error_code=4');
		
	} else {
		add_id ($id, $password);
		header('Location: register_ok.php');
	}

} else {
    echo '회원가입 폼 에러';
}

?>