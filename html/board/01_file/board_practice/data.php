<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>

<?php

	function get_number () {
		
		$file_name = 'data.txt';
		$file_handle = fopen($file_name, 'r');
		
		$max = 0;
		
		while (($line = fgets($file_handle)) !== false) {
			
			$board = explode ("\t", $line);
			if (count($board) === 4) {
				
				if ($max < $board[0]) {
					$max = $board[0];
				}
			}
		}
		$max += 1;
		fclose ($file_handle);
		return $max;
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$title = $_POST['title'];
		$name = $_POST['name'];
		$content = $_POST['content'];		
	}
	
	$board_number = get_number();
	$token = "\t";
	$line_arr = array ($board_number, $title, $content, $name);
	$line_tab = implode ($token, $line_arr);
	
	function add_line ($line_tab) {
		$file_handle = fopen ($file_name, 'a');
		fwrite ($file_handle, $line_tab);
		fclose ($file_handle);
		return add_line ();
	}


?>


<a href="index.php" target="_self">목록으로</a>
</body>
</html>