<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/kimyost/style.css">
</head>

<body>
<div class="wrap_tb">
	<div class="board_tb">
		<h1>게시판 A</h1>

		<?php
			require_once '../../../includes/mylib.php';
			$conn = db_connect();

			echo '<table>';
			echo '<tbody>';
			echo '<colgroup><col width="7%"><col width="45%"><col width="20%"><col width="28%"></colgroup>';
			echo '<tr>';
			echo '<th>번호</th>';
			echo '<th>제목</th>';
			echo '<th style="display:none;">비고</th>';
			echo '<th>작성자</th>';
			echo '<th>최근작성일</th>';
			echo '</tr>';
			
			$select_query = 'SELECT post_id, title, note, author, last_update FROM post WHERE board_id = 0 Order By post_id DESC';
			$result = mysqli_query($conn, $select_query);
			
			while($row = mysqli_fetch_assoc($result)) {
				echo '<tr>';
				echo '<td>'.$row['post_id'].'</td>';
				echo '<td><a href="view_post.php?post_id='.$row['post_id'].'&board_id=0">'.$row['title'].'</a></td>';
				echo '<td style="display:none;">'.$row['note'].'</td>';
				echo '<td>'.$row['author'].'</td>';
				$correct_time = convert_time_string($row['last_update']);
				echo '<td>'.$correct_time.'</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
			mysqli_free_result($result);
			mysqli_close($conn);
			
			echo '<div class="board_btn">';
			echo '<a href="write_post.php?board_id=0"><input type="button" value="글쓰기"></a>';
			echo '</div>';
		?>
		
	</div>
	
	<div class="board_tb">
		<div style="float:right;"><a href="../../index.php">홈으로</a></div>
		<h1>게시판 B</h1>

		<?php
			$conn = db_connect();
		
			echo '<table>';
			echo '<tbody>';
			echo '<colgroup><col width="7%"><col width="25%"><col width="25%"><col width="15%"><col width="28%"></colgroup>';
			echo '<tr>';
			echo '<th>번호</th>';
			echo '<th>제목</th>';
			echo '<th>비고</th>';
			echo '<th>작성자</th>';
			echo '<th>최근작성일</th>';
			echo '</tr>';

			$select_query = 'SELECT post_id, title, note, author, last_update FROM post WHERE board_id = 1 Order By post_id DESC';
			$result = mysqli_query($conn, $select_query);

			while($row = mysqli_fetch_assoc($result)) {
				echo '<tr>';
				echo '<td>'.$row['post_id'].'</td>';
				echo '<td><a href="view_post.php?post_id='.$row['post_id'].'&board_id=1">'.$row['title'].'</a></td>';
				echo '<td>'.$row['note'].'</td>';
				echo '<td>'.$row['author'].'</td>';
				$correct_time = convert_time_string($row['last_update']);
				echo '<td>'.$correct_time.'</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
			mysqli_free_result($result);
			mysqli_close($conn);
			
			echo '<div class="board_btn">';
			echo '<a href="write_post.php?board_id=1"><input type="button" value="글쓰기"></a>';
			echo '</div>';
		?>
	</div>
</div>


</body>
</html>
