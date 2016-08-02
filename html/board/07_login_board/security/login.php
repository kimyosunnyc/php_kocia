<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>

<?php

require_once 'session.php';
start_session();

if (isset($_POST['id'], $_POST['password'])) {
	$id = $_POST['id'];
	$password = $_POST['password']; 

    if (try_to_login($id, $password) == true) { 
		//echo 'ok'; 
		header('Location: ../index.php'); // 리다이렉팅
    } else {
		//echo 'no'; 
		// 이멜주소 또는 비번이 등록되지 않았거나 틀림
		header('Location: error.php?error_code=1');
    }
} else {
    echo '로그인 폼 에러';
}


?>

</body>
</html>
