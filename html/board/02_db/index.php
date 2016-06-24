<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>

<body>

<div class="wrap">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>
<h1>자유게시판</h1>

<?php
	$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
	$username = 'kimyosunny';
	$password = 'password';
	$dbname = 'kimyosunny';
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	mysqli_query($conn, "SET NAMES 'utf8'");
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}
	echo '<table>';
	echo '<tr>';
	echo '<th class="num">번호</th>';
	echo '<th>제목</th>';
	echo '<th>작성자</th>';
	echo '<th>최근작성일</th>';
	echo '</tr>';

	$select_query = 'SELECT post_id, title, author, last_update FROM post';
	$result = mysqli_query($conn, $select_query);

	
	while($row = mysqli_fetch_assoc($result)) {
		echo '<tr>';
		echo '<td>'.$row['post_id'].'</td>';
		echo '<td><a href="view_post.php?post_id='.$row['post_id'].'">'.$row['title'].'</a></td>';
		echo '<td>'.$row['author'].'</td>';
		echo '<td>'.$row['last_update'].'</td>';
		echo '</tr>';
	}
	echo '</table>';
	mysqli_free_result($result);
	mysqli_close($conn);

?>
<div style="float:right;">
	<form name ="write_form" method = "POST" action = "write_post.php">
	<ul style="display:inline;padding:0;margin:10px 0;">
		<li style="list-style:none;float:left;"><a href="write_post.php" target="_self"><input type="submit" value="글쓰기"></a></li>
	</ul>
	</form>
</div>

</div>


</body>
</html>
