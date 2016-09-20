<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<title>정규표현식 연습문제</title>
<link rel="stylesheet" href="css/style_2.css" />
</head>

<body>
<div class="wrap">
<h1>정규표현식 연습문제</h1>
<div class="content">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>
<div class="tab2">
	<ul>
		<li><a href="exam_ex1.php">PHP 문자열, 어레이 연습</a></li>
		<li class="tab_btn"><a href="exam_ex2.php">정규표현식 연습</a></li>
	</ul>
</div>
<h2 style="background:#f4f4f4;padding:10px;">PHP</h2>
<h2>1. HTML 태그 안의 공백을 없애라.</h2>

<?php
$text = '<span id = "id_score">150</span>';
$pattern = '/\s+=\s+/';
$replacement = '=';
$result = preg_replace ($pattern, $replacement, $text);

//echo "<xmp>$result</xmp><br>";
echo htmlspecialchars($result);
?>

<h2>2. HTML 태그에서 아이디를 찾아라.</h2>
<p class="summary">~에서 -를 찾아라. : 찾고자하는 부분에 괄호</p>
<?php
$text = '<span id = "id_score">150</span>';
$pattern = '/id\s*=\s*[\'\"](\w+)[\'\"]/';
$result = array();

preg_match($pattern, $text, $result);
echo $result[0].'<br>';
echo $result[1];
?>

<hr>

<h2 style="background:#f4f4f4;padding:10px;">Javascript</h2>
<p class="summary pink">※ .value 대신에 .innerHTML 을 사용해도 되지만 하지 않는 것이 좋음.</p>
<h2>1. HTML 태그 안의 공백을 없애라.</h2>
<textarea id="result" rows="5" cols="60"></textarea>
<script>
var text = '<span id = "id_score">150</span>';
var pattern = /\s+=\s+/;
var replacement = '=';
var result = text.replace(pattern, replacement);

document.getElementById('result').value = result;
</script>


<h2>2. HTML 태그에서 아이디를 찾아라.</h2>
<textarea id="result2" rows="5" cols="60"></textarea>
<script>
var text = '<span id = "id_score">150</span>';
var pattern = /id\s*=\s*[\'\"](\w+)[\'\"]/;
var result = text.match(pattern);

document.getElementById('result2').value = 'result[0] : '+result[0]+'\n'+'result[1] : '+result[1];
</script>






</div>
</div>
</div>
</body>
</html>