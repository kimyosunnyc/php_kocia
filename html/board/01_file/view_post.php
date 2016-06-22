<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<style type="text/css">

.wrap{margin:0 auto;width:50%;margin-top:50px;}
table{width:100%;border:1px solid #ededed;border-collapse:collapse;}
th{background:#ededed;}
.num{width:10%;}
td, th{border:1px solid #ededed;padding:10px;text-align:center;}
.w_btn{float:right;text-decoration:none;padding:5px 20px;margin-top:10px;background:#ededed;color:#000;}

</style>

<body>

<div class="wrap">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>
<h1>게시판</h1>

<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$number_confirm = $_GET['number'];
	}
	
	$file_name = 'data.txt';

	//echo $file_name;
	//echo '<br>';
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
			
			if ($number == $number_confirm) {
				
				$title = $board[1];
				$cont = $board[2];
				$name = $board[3];
				break;
			}
		} else { // error
			die('count was'.count($board).' Error occured!');
		}
	}
	echo '<tr>';
	echo '<td>'.$number.'</td>';
	echo '<td>'.$title.'</td>';
	echo '<td>'.$name.'</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td colspan="3">'.$cont.'</td>';
	echo '</tr>';
	echo '</table>';
	//echo 'END';
	fclose($file_handle);

?>

<a class="w_btn" href="index.php" target="_self">목록으로</a>

</div>

</body>
</html>
