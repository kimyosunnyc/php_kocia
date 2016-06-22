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

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$number_confirm = $_GET['number'];
	}
	
	$hostname = 'localhost';
	$username = 'root';
	$password = 'rlaytjslTl';
	$dbname = 'kimyosunny';
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
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
	
	$select_query = 'SELECT number, title, content, author_name, date_recent FROM board_db_01 WHERE number = '.$number_confirm;
	$result = mysqli_query($conn, $select_query);
	
	if($row = mysqli_fetch_assoc($result)) {
		
		echo '<tr>';
		echo '<td>'.$row['number'].'</td>';
		echo '<td>'.$row['title'].'</td>';
		echo '<td>'.$row['author_name'].'</td>';
		echo '<td>'.$row['date_recent'].'</td></tr>';
		echo '<tr><th colspan="4">내용</th></tr>';
		echo '<tr><td colspan="4">'.$row['content'].'</td></tr>';
	}
	echo '</table>';
	mysqli_free_result($result);
	mysqli_close($conn);

?>

<div style="float:right;">
	<ul style="display:inline;padding:0;margin:0;">
		<li style="list-style:none;float:left;margin-right:5px;"><a class="w_btn" href="edit_post.php" target="_self">수정하기</a></li>
		<li style="list-style:none;float:left;"><a class="w_btn" href="index.php" target="_self">목록으로</a></li>
	</ul>
</div>


</div>
</body>
</html>
