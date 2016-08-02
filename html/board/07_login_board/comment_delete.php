<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>
<body>
  <div class="wrap">
 <div style="float:right;"><a href="../../index.php">홈으로</a></div>
<?php

	require_once 'class.php';
	$conn = db_connect();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$comment_id = $_POST['comment_id'];
	}
	$result = delete_comment ($comment_id);
	
	if ($result == true) {
		echo '<h1>DB DELETE 성공</h1><br>';
		echo '댓글이 삭제되었습니다.<br>';
		echo '<meta http-equiv="refresh" content="2; url=index.php">';
		
	} else {
		echo "삭제 실패 하였습니다.";
	}
	 
?>
<form method="GET" action = "index.php">
	<a href="index.php"><input type="button" value="홈으로"></a>
	<input type="submit" value="목록보기">
 </form>
</div>
</body>
</html>