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
			
			$select_query = 'SELECT post_id, title, note, author, last_update FROM post WHERE board_id = 0';
			$result = mysqli_query($conn, $select_query);

			while($row = mysqli_fetch_assoc($result)) {
				echo '<tr>';
				echo '<td>'.$row['post_id'].'</td>';
				echo '<td><a href="view_post.php?post_id='.$row['post_id'].'">'.$row['title'].'</a></td>';
				echo '<td style="display:none;">'.$row['note'].'</td>';
				echo '<td>'.$row['author'].'</td>';
				echo '<td>'.$row['last_update'].'</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
			mysqli_free_result($result);
			mysqli_close($conn);

		?>
		<div class="board_btn">
			<form name ="write_form1" method = "POST" action = "write_post_v1.php">
			<ul>
				<li><input type="submit" value="글쓰기"></li>
			</ul>
			</form>
		</div>
	</div>
	
	<div class="board_tb">
		<div style="float:right;"><a href="../../index.php">홈으로</a></div>
		<h1>게시판 B</h1>

		<?php
			require_once '../../../includes/mylib.php';
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

			$select_query = 'SELECT post_id, title, note, author, last_update FROM post WHERE board_id = 1';
			$result = mysqli_query($conn, $select_query);

			while($row = mysqli_fetch_assoc($result)) {
				echo '<tr>';
				echo '<td>'.$row['post_id'].'</td>';
				echo '<td><a href="view_post.php?post_id='.$row['post_id'].'">'.$row['title'].'</a></td>';
				echo '<td>'.$row['note'].'</td>';
				echo '<td>'.$row['author'].'</td>';
				echo '<td>'.$row['last_update'].'</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
			mysqli_free_result($result);
			mysqli_close($conn);

		?>
		<div class="board_btn">
			<form name ="write_form1" method = "POST" action = "write_post_v2.php">
			<ul>
				<li><input type="submit" value="글쓰기"></li>
			</ul>
			</form>
		</div>
	</div>
</div>


</body>
</html>
