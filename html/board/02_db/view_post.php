<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="wrap">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>
<h1>게시판</h1>

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

	printf ('<table>
				<tr>
					<th class="num">번호</th>
					<th>제목</th>
					<th>작성자</th>
					<th>최근작성일</th>
				</tr>'
			);

	
	$select_query = 'SELECT id, title, content, author, last_update FROM post WHERE id = '.$number_confirm;
	$result = mysqli_query($conn, $select_query);
	
	if($row = mysqli_fetch_assoc($result)) {
		
		echo '<tr>';
		echo '<td>'.$row['id'].'</td>';
		echo '<td><input type="text" name="title" value="'.$row['title'].'" readonly="readonly"></td>';
		echo '<td><input type="text" name="title" value="'.$row['author'].'" readonly="readonly"></td>';
		echo '<td>'.$row['last_update'].'</td></tr>';
		echo '<tr><th colspan="4">내용</th></tr>';
		echo '<tr><td colspan="4"><textarea name="content" rows="10" cols="100%" readonly="readonly">'.$row['content'].'</textarea></td></tr>';
	}
	echo '</table>';
	mysqli_free_result($result);
	mysqli_close($conn);

?>

	<div style="float:right;">
		<form name ="write_form" method = "POST" action = "edit_post.php">
		<ul style="display:inline;padding:0;margin:10px 0;">
			<li style="list-style:none;float:left;margin-right:5px;"><input type="submit" value="수정하기"></li>
			<li style="list-style:none;float:left;"><a href="index.php" target="_self"><input type="submit" value="목록보기"></a></li>
		</ul>
		</form>
	</div>
</div>
</body>
</html>
