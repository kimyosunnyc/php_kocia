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

.w_btn {
	float:right;
	text-decoration:
	none;padding:5px 20px;
	margin-top:10px;
	background:#ededed;
	color:#000;
	}
.submit_btn {
	float:right;
	margin-top:15px; 
	}
</style>
</head>
<body>

<div class="wrap">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>
<h1>게시글 수정</h1>

<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$number_confirm = $_GET['id'];
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
	
	$select_query = 'SELECT id, title, content, author, last_update FROM post WHERE id = '.$number_confirm;
	$result = mysqli_query($conn, $select_query);
	
	if($row = mysqli_fetch_assoc($result)) {
		
	}

	mysqli_free_result($result);
	mysqli_close($conn);

?>
	<form name ="write_form" method = "POST" action = "data.php">
		<table>
			<tr>
				<th class="num">번호</th>
				<th>제목</th>
				<th>작성자</th>
				<th>최근작성일</th>
			</tr>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><input type="text" name="title" value="<?php echo $row['title']; ?>"></td>
				<td><?php echo $row['author']; ?></td>
				<td><?php echo $row['last_update']; ?></td>
			</tr>
			<tr>
				<th colspan="4">내용</th>
			</tr>
			<tr>
				<td colspan="4"><textarea name="content" rows="10" cols="100%"><?php echo $row['content']; ?></textarea></td>
			</tr>
		</table>
	</form>
	<div style="float:right;margin-top:5px;"><input type="submit" value="수정확인"></div>

</div>
</body>
</html>
