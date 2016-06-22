<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<style type="text/css">

.wrap{margin:0 auto;width:50%;margin-top:50px;}
table{width:100%;border:0px solid #ededed;border-collapse:collapse;}
th{background:#ededed;}
.num{width:10%;}
td, th{border:3px solid #ededed;padding:10px;text-align:center;}
.w_btn{float:right;text-decoration:none;padding:5px 20px;margin-top:10px;background:#ededed;color:#000;}

</style>

<body>

<div class="wrap">
<div style="float:right;"><a href="../index.php">홈으로</a></div>
<h1>게시판</h1>
<?php
	$file_name = 'data.txt';
	$file_handle = fopen($file_name, 'r');

	echo '<table>';
	echo '<tr>';
	echo '<th class="num">번호</th>';
	echo '<th>제목</th>';
	echo '<th>작성자</th>';
	echo '</tr>';
	
	while (($line = fgets($file_handle)) !== false) {
		// fgets는 파일의 다음 한 줄을 읽어서 그 문자열을 리턴한다.
		// 만약 더 이상 읽을 라인이 없다면, false 을 리턴한다.
		
		$board = explode("\t", $line);
		if (count($board) === 4) {
			$number = $board[0];
			$title = $board[1];
			//$cont = $board[2];
			$name = $board[3];
		} else { // error
			die('count was'.count($board).' Error occured!');
		}
		echo '<tr>';
		echo '<td>'.$number.'</td>';
		echo '<td>'.'<a href="view_post.php?number='.$number.'">'.$title.'</a></td>';
		echo '<td>'.$name.'</td>';
		echo '</tr>';
		
	}
	echo '</table>';
	//echo 'END';
	fclose($file_handle);
?>

<a class="w_btn" href="write_post.php" target="_self">글쓰기</a>
<div style="margin-top:20px;width:100%;"><a href="function/index.php">리팩토링</a></div>

</div>

</body>
</html>
