<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>
<?php
require_once 'session.php';
 
start_session();
 
if (isset($_POST['id'], $_POST['hash'])) { // 들어오는 값은 이미 클라이언트에서 해쉬로 된 것
    $id = $_POST['id'];
    $password1 = $_POST['hash']; 
	echo "login.php";
	echo 'password was: '.$_POST['password'].'<br>';
	echo 'hash was: '.$_POST['hash'];
    if (try_to_login($id, $password1) === true) {
		header('Location: ../view_list.php');
    } else {
		// 이멜주소 또는 비번이 등록되지 않았거나 틀림
       header('Location: error.php?error_code=1');
    }
} else {
    echo '로그인 폼 에러';
}
?>
</body>
</html>