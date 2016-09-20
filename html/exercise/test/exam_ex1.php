<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<title>PHP 문자열, 어레이 연습문제</title>
<link rel="stylesheet" href="css/style_2.css" />
</head>

<body>
<div class="wrap">
<h1>PHP 문자열, 어레이 연습문제</h1>
<div class="content">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>
<div class="tab2">
	<ul>
		<li><a href="exam_ex1.php">PHP 문자열, 어레이 연습</a></li>
		<li class="tab_btn"><a href="exam_ex2.php">정규표현식 연습</a></li>
	</ul>
</div>

<h2>1. 긴 문자열의 길이만큼 짧은 문자열 뒤에 * 를 붙여라.</h2>
<?php
function fill_short ($string1, $string2) {

	$len = mb_strlen($string1) - mb_strlen($string2);
	if ($len > 0) {
		$longer = $string1;	
		$shorter = $string2;
	} else {
		$longer = $string2;	
		$shorter = $string1;
	}
	return array($longer, $shorter.get_star_string (abs($len)));
}

function get_star_string ($len) {
	
	for ($i = 0; $i < $len; $i += 1) {
		$arr[] = '*';
	}
	$star = implode ('', $arr);
	return $star;
}
?>

<dl class="answer_box_1">
	<dt><b>문제 풀이1</b></dt>
	<dd>function fill_short ($string1, $string2) { </dd>
	<dd><span class="grey">// 긴 문자열과 짧은 문자열의 길이를 비교하여 별 붙이기 / 긴 문자, 짧은 문자 순서대로 반환</span></dd>
	<dd>&nbsp;&nbsp;&nbsp;if (mb_strlen($string1) > mb_strlen($string2)) {</dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$len = mb_strlen($string1) - mb_strlen($string2);</dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return array($string1, $string2.get_star_string ($len));</dd>
	<dd>&nbsp;&nbsp;&nbsp;} else {</dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$len = mb_strlen($string2) - mb_strlen($string1);</dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return array($string2, $string1.get_star_string ($len));</dd>
	<dd>&nbsp;&nbsp;&nbsp;}</dd>
	<dd>}</dd>
	<dd>&nbsp;</dd>
	<dd>function get_star_string ($len) { <span class="grey">// 문자열 길이만큼 * 붙이기</span></dd>
	<dd>&nbsp;&nbsp;&nbsp;for ($i = 0; $i < $len; $i += 1) {</dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arr[] = '*';</dd>
	<dd>&nbsp;&nbsp;&nbsp;}</dd>
	<dd>&nbsp;&nbsp;&nbsp;$star = implode ('', $arr);</dd>
	<dd>&nbsp;&nbsp;&nbsp;return $star;</dd>
	<dd>}</dd>
	<dd>&nbsp;</dd>
	<dd>fill_short ('강산에', '강') 일 때 출력값 : <span class="answer"><?php var_dump (fill_short ('강산에', '강')); ?></span></dd>
	<dd>fill_short ('강', '강산에') 일 때 출력값 : <span class="answer"><?php var_dump (fill_short ('강', '강산에')); ?></span></dd>
	<dd>&nbsp;</dd>
</dl>

<dl class="answer_box_1">
	<dt><b>문제 풀이2 - 코드를 간결하게 변경</b></dt>
	<dd>function fill_short ($string1, $string2) { </dd>
	<dd><span class="grey">// 긴 문자열과 짧은 문자열의 길이를 비교하여 별 붙이기 / 긴 문자, 짧은 문자 순서대로 반환</span></dd>
	<dd>&nbsp;&nbsp;&nbsp;$len = mb_strlen($string1) - mb_strlen($string2);</dd>
	<dd>&nbsp;&nbsp;&nbsp;if ($len > 0) {</dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$longer = $string1;</dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$shorter = $string2;	</dd>
	<dd>&nbsp;&nbsp;&nbsp;} else {</dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$longer = $string2;</dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$shorter = $string1;</dd>
	<dd>&nbsp;&nbsp;&nbsp;}</dd>
	<dd>return array($longer, $shorter.get_star_string (abs($len)));</dd>
	<dd>}</dd>
	<dd>&nbsp;</dd>
	<dd>function get_star_string ($len) { <span class="grey">// 문자열 길이만큼 * 붙이기</span></dd>
	<dd>&nbsp;&nbsp;&nbsp;for ($i = 0; $i < $len; $i += 1) {</dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$arr[] = '*';</dd>
	<dd>&nbsp;&nbsp;&nbsp;}</dd>
	<dd>&nbsp;&nbsp;&nbsp;$star = implode ('', $arr);</dd>
	<dd>&nbsp;&nbsp;&nbsp;return $star;</dd>
	<dd>}</dd>
	<dd>&nbsp;</dd>
	<dd>fill_short ('강산에', '강') 일 때 출력값 : <span class="answer"><?php var_dump (fill_short ('강산에', '강')); ?></span></dd>
	<dd>fill_short ('강', '강산에') 일 때 출력값 : <span class="answer"><?php var_dump (fill_short ('강', '강산에')); ?></span></dd>
	<dd>&nbsp;</dd>
</dl>


<h2>2. 긴 문자열과 짧은 문자열을 비교하여 짧은 문자열 길이 뒤에 긴 문자열 값을 붙이기</h2>
<dl class="php_box_1">
	<dt><b>예시</b></dt>
	<dd>"남기웅", "김구" => "남기웅", "김구<span class="pink">웅</span>"</dd>
</dl>

<?php
function fill_short2 ($string1, $string2) {
	$len = mb_strlen($string1) - mb_strlen($string2);
	
	$arr = array($string1, $string2);
	$arr = sort_str ($arr);
	
	$shorter = $arr [0];
	$longer = $arr [1];
	
	$get_str = mb_substr($longer, -abs($len));
	return array($longer, $shorter.$get_str);
}
?>
<?php var_dump (fill_short2 ('남기웅', '김구')); ?>
<?php var_dump (fill_short2 ('김구', '남기웅')); ?>



<h2>3. 어레이 원소를 ㄱ, ㄴ 순서대로 정렬</h2>
<?php
function sort_str ($arr) {
	
	sort($arr);
	return $arr;
}
?>
<?php var_dump (sort_str (array('기차','라면','가지','과자','호두'))); ?>


<h2>4. 어레이 원소(단어) 길이순으로 정렬</h2>
<?php
function compare_string_by_length ($string1, $string2) {
	$len = mb_strlen($string1) - mb_strlen($string2);
	
	if ($len > 0) {
		return -1;
	} else if ($len === 0) {
		return 0;
	} else {
		return 1;
	}
}
?>
<?php
function sort_str2 ($arr) {
	
	usort ($arr, 'compare_string_by_length');
	return $arr;
}
?>
<?php var_dump (sort_str2 (array('기차','차돌박이','이발소','원','우리동네마트','다함께차차차','돌'))); ?>













</div>
</div>
</div>
</body>
</html>