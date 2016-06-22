<html>

<div><a href="../index.php">홈으로</a></div>

<?php

//date_default_timezone_set("Asia/Seoul");
// Prints the day, date, month, year, time, AM or PM
echo date("l jS \of F Y h:i:s A") . "<br>";

?>


<h1>제목입니다.</h1>

<p>
여기가 하나의 문단 
<b>강조하고싶다</b>
</p>



<?php
echo 'php 뒷부분<br>';
?>
여기는 문단이 끝난 곳

<div class="content">
	<h1>폼 예시</h1>
	<form action="lecture_2_02.php" method="post">
		<span style="font=굴림;">이름</span>: <input type="text" name="name"><br>
		E-mail: <input type="text" name="email"><br>
		Website: <input type="text" name="website"><br>
		Comment: <textarea name="comment" rows="5" cols="40"></textarea><br>
		성별:<br>
		Female<input type="radio" name="gender" value="female"><br>
		Male<input type="radio" name="gender" value="male"><br>
		<input type="submit" value="제출">
	</form>
</div>




</html>