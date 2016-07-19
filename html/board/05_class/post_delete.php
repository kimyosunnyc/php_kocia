<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>
 
<?php

	require_once 'class.php';
	$conn = db_connect();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$post_id = $_POST['post_id'];
	}
	$result = delete_post ($post_id);
	
	if ($result == true) {
		echo '게시글이 삭제되었습니다.<br>';
		echo '<a href="index.php"><input type="button" value="홈으로"></a>';
		echo '<meta http-equiv="refresh" content="2" url="index.php">';
		
	} else {
		echo "삭제 실패 하였습니다.";
	}
	 
?>
</body>
</html>