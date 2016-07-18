<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>
 
<?php

	require_once '../../../includes/mylib.php';
	$conn = db_connect();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') { // POST방식으로 데이터를 받는다. (write_post.php에서 작성하는 내용)

		$post_id = $_POST['post_id'];	
	}
	echo $post_id;
	$delete_query = sprintf ("DELETE FROM kimyosunny.post WHERE post_id = %d", $post_id);

	mysqli_query($conn, $delete_query);

	echo '<h1>DB DELETE 성공</h1><br>';
	mysqli_close($conn);

?>

<form method="GET" action = "index.php">
	<input type="submit" value="목록보기">
 </form>

</body>
</html>