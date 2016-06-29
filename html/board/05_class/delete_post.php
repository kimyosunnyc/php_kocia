<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>
 
<?php

	require_once 'class-post.php';
	$conn = db_connect();
	
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {

		$post_id = $_GET['post_id'];		
	}
	$result = delete_post ($post_id);
	
	if ($result == true) {
		echo '<meta http-equiv="refresh" content="0; url=index.php">';
		
	} else {
		echo "삭제 실패 하였습니다.";
	}
	 
?>
</body>
</html>