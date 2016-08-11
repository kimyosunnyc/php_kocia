<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<title>PHP, HTML, MySQL, JavaScript 요약 정리 테스트</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
<div class="wrap">
<h1 style="text-align:center;margin-bottom:50px;">PHP, HTML, MySQL, JavaScript 요약 정리 테스트</h1>
<div class="content">
<h3>타입 전환 테이블</h3>
<iframe src="type_table.php" frameborder="0" width="100%" height="550" marginwidth="0" marginheight="0" scrolling="no"></iframe>
<hr>
<h3>내림, 올림, 반올림</h3>
<ul>
	<li><b class="pcolor1">floor() / 내림</b> - 숫자 1.6을 입력했을 때 : <b class="pcolor2"><?php echo floor(1.6); ?></b></li>
	<li><b class="pcolor1">ceil() / 올림</b> - 숫자 1.2을 입력했을 때 : <b class="pcolor2"><?php echo ceil(1.2); ?></b></li>
	<li><b class="pcolor1">round() / 반올림</b> - 숫자 1.3을 입력했을 때 : <b class="pcolor2"><?php echo ceil(1.3); ?></b></li>
</ul>
<hr>
<h3>문자열을 나타내는 '홑따옴표'와 "쌍따옴표"</h3>
<p class="summary">- 아래의 예제를 보면 홑따옴표 안의 내용은 문자열 그대로 출력되고, 쌍따옴표 안의 특수문자와 변수는 값으로 전환하여 출력되는 것을 알 수 있다.</p>
<?php
	$number1 = '1';
	$number2 = '2';
	$text1 = '동해물과 백두산이 마르고 닳도록';
	$text2 = '남산 위에 저 소나무, 철갑을 두른 듯';
	$text3 = '가을 하늘 공활한데 높고 구름 없이';
	$text4 = '이 기상과 이 맘으로 충성을 다하여';
?>
<dl style="border:1px solid #ddd;border-radius:5px;padding:20px;">
	<dt style="padding-bottom:10px;"><b>php 할당문</b></dt>
	<dd>$number1 = '1';</dd>
	<dd>$number2 = '2';</dd>
	<dd>$text1 = '동해물과 백두산이 마르고 닳도록';</dd>
	<dd>$text2 = '남산 위에 저 소나무, 철갑을 두른 듯';</dd>
	<dd>$text3 = '가을 하늘 공활한데 높고 구름 없이';</dd>
	<dd>$text4 = '이 기상과 이 맘으로 충성을 다하여';</dd>
</dl>
<ul>
	<li><b class="pcolor3">echo</b> <span class="pcolor5">$number1</span>.<span class="pcolor4">' 절 : '</span>.<span class="pcolor5">$text1</span>; <br>
	출력값 - <?php echo $number1.' 절 : '.$text1; ?><br><br>
	
	</li>
	<li><b class="pcolor3">echo</b> <span class="pcolor6">"<b>$number2</b> 절 : <b>$text2</b>"</span>; <br>
	출력값 - <?php echo "$number2 절: $text2"; ?><br><br>
	</li>
	<li><b class="pcolor3">echo</b> <span class="pcolor4">'$number1\n+\n$number2'</span>.<span class="pcolor4">' 절 \t: '</span>.<span class="pcolor5">$text3</span>;<br>
	출력값 - <?php echo '$number1\n+\n$number2'.' 절\t: '.$text3; ?><br><br>
	</li>
	<li><b class="pcolor3">echo</b> <span class="pcolor6">"<b>$number2\n+\n$number2</b> 절 \t: <b>$text4</b>"</span>; <br>
	출력값 - <?php echo "$number2\n+\n$number2 절\t: $text4"; ?>
	</li>
</ul>
<hr>
<h3>PHP 문자열 함수</h3>






</div>
</div>
</body>
</html>