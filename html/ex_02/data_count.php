<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<body>

<?php

	require_once "data.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST') { // POST방식으로 데이터를 받는다. (write_post.php에서 작성하는 내용)
		$title = $_POST['title'];
		$name = $_POST['name'];
		$content = $_POST['content'];
	}

	//echo $file_name;
	//echo '<br>';
	
	$file_name = 'data.txt'; // DB
	$file_handle = fopen($file_name, 'r'); // DB를 읽기모드로 열어준다.
	
	$count = 0; // 데이터가 없을 때에는 0
	
	while (($line = fgets($file_handle)) !== false) { // 데이터를 한 줄씩 읽어주기/ 더이상 읽을게 없으면 false

		$board = explode("\t", $line); // board 라는 변수는 line을 tab 단위로 나누어준다.
		if (count($board) === 4) { // board 값이 4개가 맞으면 - 정상적인 게시물의 경우(글번호,제목,내용,작성자)
			
			$count += 1; // 지금까지 내가 읽어낸 게시물이 count 개다.
		}
	}
	//echo $board[0] + 1;
	$count += 1; // user가 작성한 게시물이 등록 될 번호
	//echo '글 번호 '.$count;
	fclose ($file_handle); // 열었던 DB를 닫아준다.
	
	
	$token = "\t";
	$line_arr = array($board[0] + 1, $title, $content, $name); // 어레이를 만들어준다.
	$line_tab = implode($token, $line_arr); // 각 어레이의 index를 탭단위로 합쳐준다.
	//echo join($token, $line_arr);
	//echo $line_tab;
	
	$file_handle = fopen($file_name, 'a'); // 파일을 append 모드로 열어준다. 파일 쓰기 전용(파일이 존재하면 그 파일의 끝에 덧붙여 쓰고, 없으면 새 파일을 만든다)
	
	fwrite ($file_handle, $line_tab); // $file_handle (data.txt)에 $line_tab을 쓰기
	
	fclose ($file_handle); // 파일 닫아준다.
	
?>
<a class="w_btn" href="index.php" target="_self">목록으로</a>


</body>
</html>
