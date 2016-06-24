﻿<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>
 
<?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST') { // POST방식으로 데이터를 받는다. (write_post.php에서 작성하는 내용)

		$customer_name = $_POST['customer_name'];
		$customer_age = $_POST['customer_age'];
		$customer_phone = $_POST['customer_phone'];
		$customer_email = $_POST['customer_email'];
	}
	
	require_once '../../../includes/mylib.php';
	$conn = db_connect();

	$insert_query = 'INSERT INTO post (customer_name, customer_age, customer_phone, customer_email) VALUES ("'.$customer_name.'","'.$customer_age.'","'.$customer_phone.'","'.$customer_email.'")';
	mysqli_query($conn, $insert_query);

	echo '<h1>DB INSERT 성공</h1><br>';
	echo 'DB INSERT: ',$customer_name,' ',$customer_age,' ',$customer_phone,' ',$customer_email,'<br>';
	mysqli_close($conn);

?>

<form name ="write_form">
	<a href="index.php" target="_self"><input type="submit" value="목록보기"></a>
 </form>

</body>
</html>