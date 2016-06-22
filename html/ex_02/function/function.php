<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<body>


<?php

// 게시글 넘버 중 가장 큰 값을 찾아 다음 게시글의 넘버를 작성한다.
	function file_open_read_count () {
		$file_name = 'data.txt'; // DB
		$file_handle = fopen($file_name, 'r'); // DB를 읽기모드로 열어준다.
				
		while (($line = fgets($file_handle)) !== false) { // 데이터를 한 줄씩 읽어주기/ 더이상 읽을게 없으면 false

			$board = explode("\t", $line); // board 라는 변수는 line을 tab 단위로 나누어준다.
			if (count($board) === 4) { // board 값이 4개가 맞으면 - 정상적인 게시물의 경우(글번호,제목,내용,작성자)
				
			} else { // error
			die('count was'.count($board).' Error occured!');
			}
		}
		fclose ($file_handle); // 열었던 DB를 닫아준다.
	}
	
?>



</body>
</html>
