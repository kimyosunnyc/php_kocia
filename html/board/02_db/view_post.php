<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<style type="text/css">
body{font-size:14px;}
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
input{
width:90%;
border:none;
}

</style>
</head>
<body>

<div class="wrap">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>
<h1>게시판</h1>

<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$number_confirm = $_GET['number'];
	}
	
	$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
	$username = 'kimyosunny';
	$password = 'password';
	$dbname = 'kimyosunny';
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	mysqli_query($conn, "SET NAMES 'utf8'");
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}

	printf ('<table>
				<tr>
					<th class="num">번호</th>
					<th>제목</th>
					<th>작성자</th>
					<th>최근작성일</th>
				</tr>'
			);

	
	$select_query = 'SELECT number, title, content, author_name, date_recent FROM board_db_01 WHERE number = '.$number_confirm;
	$result = mysqli_query($conn, $select_query);
	
	if($row = mysqli_fetch_assoc($result)) {
		
		echo '<tr>';
		echo '<td>'.$row['number'].'</td>';
		echo '<td><input type="text" name="title" value="'.$row['title'].'" readonly="readonly"></td>';
		echo '<td><input type="text" name="title" value="'.$row['author_name'].'" readonly="readonly"></td>';
		echo '<td>'.$row['date_recent'].'</td></tr>';
		echo '<tr><th colspan="4">내용</th></tr>';
		echo '<tr><td colspan="4"><textarea name="content" rows="10" cols="100%" readonly="readonly">'.$row['content'].'</textarea></td></tr>';
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
