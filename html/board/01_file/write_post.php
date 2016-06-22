<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<style type="text/css">

.wrap{margin:0 auto;width:50%;margin-top:50px;}
table{width:100%;border:1px solid #ededed;border-collapse:collapse;}
th{background:#ededed;width:20%;}
.num{width:10%;}
td, th{border:1px solid #ededed;padding:10px;}
input, textarea{border:1px solid #ededed;}
input{padding:7px;}
.w_btn{float:right;text-decoration:none;padding:5px 20px;margin-top:10px;background:#ededed;color:#000;}
.submit_btn{float:right;margin-top:15px; }
</style>
<body>



<div class="wrap">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>

<h1>게시판 글쓰기</h1>
	<form name ="write_form" method = "POST" action = "data.php">
		<table>
			<tbody>
			<tr>
				<th>제목</th>
				<td><input type="text" name="title"></td>
			</tr>
			<tr>
				<th>글쓴이</th>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<th>내용 </th>
				<td><textarea name="content" rows="10" cols="100%"></textarea></td>
			</tr>
			</tbody>
		</table>
		<div class="submit_btn"><input type="submit" value="제출"></div>
	</form>
</div>
</div>
</body>
</html>
