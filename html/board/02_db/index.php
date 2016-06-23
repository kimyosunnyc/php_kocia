<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<style type="text/css">
.wrap { 
	margin:0 auto; 
	width:50%; 
	margin-top:50px;
}
table { 
	width:100%;
	border:0px solid #ededed; 
	border-collapse:collapse;
}
th { 
	background:#ededed;
	width:25%;
}
.num { 
	width:10%;
}
td, th { 
	border:1px solid #ededed; 
	padding:10px; 
	text-align:center;
}
.w_btn { float:right; 
	text-decoration:none; 
	padding:5px 20px; 
	margin-top:10px; 
	background:#ededed; 
	color:#000;
}
</style>

<body>

<div class="wrap">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>
<h1>게시판</h1>

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

	$select_query = 'SELECT id, title, author, last_update FROM board_db_01';
	$result = mysqli_query($conn, $select_query);

	
	while($row = mysqli_fetch_assoc($result)) {
		echo '<tr>';
		echo '<td>'.$row['id'].'</td>';
		echo '<td><a href="view_post.php?id='.$row['id'].'">'.$row['title'].'</a></td>';
		echo '<td>'.$row['author'].'</td>';
		echo '<td>'.$row['last_update'].'</td>';
		echo '</tr>';
	}
	echo '</table>';
	mysqli_free_result($result);
	mysqli_close($conn);

?>

<a class="w_btn" href="write_post.php" target="_self">글쓰기</a>

</div>
</body>
</html>
