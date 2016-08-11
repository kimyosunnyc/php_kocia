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
<h2>타입 전환 테이블</h2>
<iframe src="type_table.php" frameborder="0" width="100%" height="550" marginwidth="0" marginheight="0" scrolling="no"></iframe>
<hr>
<h2>내림, 올림, 반올림</h2>
<ul>
	<li><b class="pcolor1">floor() / 내림</b> - 숫자 1.6을 입력했을 때 : <b class="pcolor2"><?php echo floor(1.6); ?></b></li>
	<li><b class="pcolor1">ceil() / 올림</b> - 숫자 1.2을 입력했을 때 : <b class="pcolor2"><?php echo ceil(1.2); ?></b></li>
	<li><b class="pcolor1">round() / 반올림</b> - 숫자 1.3을 입력했을 때 : <b class="pcolor2"><?php echo ceil(1.3); ?></b></li>
</ul>
<hr>
<h2>문자열을 나타내는 '홑따옴표'와 "쌍따옴표"</h2>
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
	<li><b class="pcolor3">echo</b> <span class="pcolor5">$number1</span>.<span class="pcolor4">' 절 - '</span>.<span class="pcolor5">$text1</span>; <br>
	출력값 : <?php echo $number1.' 절 - '.$text1; ?><br><br>
	
	</li>
	<li><b class="pcolor3">echo</b> <span class="pcolor6">"<b>$number2</b> 절 - <b>$text2</b>"</span>; <br>
	출력값 : <?php echo "$number2 절- $text2"; ?><br><br>
	</li>
	<li><b class="pcolor3">echo</b> <span class="pcolor4">'$number1\n+\n$number2'</span>.<span class="pcolor4">' 절 \t- '</span>.<span class="pcolor5">$text3</span>;<br>
	출력값 : <?php echo '$number1\n+\n$number2'.' 절\t- '.$text3; ?><br><br>
	</li>
	<li><b class="pcolor3">echo</b> <span class="pcolor6">"<b>$number2\n+\n$number2</b> 절 \t- <b>$text4</b>"</span>; <br>
	출력값 : <?php echo "$number2\n+\n$number2 절\t- $text4"; ?>
	</li>
</ul>
<hr>
<h2>PHP 문자열 함수</h2>
<?php 
	$word = "This is the way you left me I'm not pretending No hope, no love, no glory No happy ending 동해물과 백두산이 마르고 닳도록";
	$word_en = "This is the way you left me I'm not pretending No hope, no love, no glory No happy ending";
	$word_ko = '동해물과 백두산이 마르고 닳도록';
	$limit = 22;
	
	$token = '과 ';
	$days = '월요일과 화요일과 수요일과 목요일과 금요일과 토요일과 일요일';
	
?>
<dl style="border:1px solid #ddd;border-radius:5px;padding:20px;">
	<dt style="padding-bottom:10px;"><b>php 할당문</b></dt>
	<dd>$word = "This is the way you left me I'm not pretending No hope, no love, no glory No happy ending 동해물과 백두산이 마르고 닳도록";</dd>
	<dd>$word_en = "This is the way you left me I'm not pretending No hope, no love, no glory No happy ending";</dd>
	<dd>$word_ko = '동해물과 백두산이 마르고 닳도록';</dd>
	<dd>$limit = 22;</dd>
	<dd>$token = '과 ';</dd>
	<dd>$days = '월요일과 화요일과 수요일과 목요일과 금요일과 토요일과 일요일';</dd>
</dl>
<h3>substr(string, start[, length])</h3>
<p class="summary" style="padding-left:35px;">string 을 start 인덱스부터 끝까지 잘라서 새로 만들어진 
문자열을 반환한다. length 가 제시되었을 경우는 최대 그 
길이까지만 자른다. </p>
<ul>
	<li><b class="pcolor3">echo substr</b>(<span class="pcolor5">$word_en</span>, 0, <span class="pcolor5">$limit</span>)<br>
	출력값 : <?php echo substr($word_en, 0, $limit); ?><br>
	</li>
	<li><b class="pcolor3">echo substr</b>(<span class="pcolor5">$word_ko</span>, 0, <span class="pcolor5">$limit</span>)<br>
	출력값 : <?php echo substr($word_ko, 0, $limit); ?>
	</li>
</ul>
<h3 style="margin-top:40px;">strlen(string) / mb_strlen(string)</h3>
<p class="summary" style="padding-left:35px;">string 의 길이를 반환한다. mb_ 가 붙으면 multi byte, 즉 한글 등의 문자를 포함한 string 도 올바르게 처리할 수 있다</p>
<ul>
	<li><b class="pcolor3">echo strlen</b>(<span class="pcolor5">$word_en</span>)<br>
	출력값 : <?php echo strlen($word_en); ?><br>
	</li>
	<li><b class="pcolor3">echo strlen</b>(<span class="pcolor5">$word_ko</span>)<br>
	출력값 : <?php echo strlen($word_ko); ?><br>
	</li>
	<li><b class="pcolor3">echo mb_strlen</b>(<span class="pcolor5">$word</span>)<br>
	출력값 : <?php //echo mb_strlen($word); ?><br>
	</li>
</ul>
<h3 style="margin-top:40px;">strpos(string, word)</h3>
<p class="summary" style="padding-left:35px;">string 에서 word 라는 다른 문자열이 처음 등장하는 인덱스를 반환한다. 찾지 못했을 경우는 false 를 반환한다.</p>
<ul>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">strpos</b>(<span class="pcolor5">$word</span>, 'hope'))<br>
	출력값 : <?php var_dump(strpos($word, 'hope')); ?><br>
	</li>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">strpos</b>(<span class="pcolor5">$word</span>, 'word'))<br>
	출력값 : <?php var_dump(strpos($word, 'word')); ?><br>
	</li>
</ul>
<h3 style="margin-top:40px;">explode(delimiter, string)</h3>
<p class="summary" style="padding-left:35px;">delimiter 문자열이 나오는 모든 위치를 기준으로 string 을 분할하여 어레이로 반환한다.</p>
<ul>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">strpos</b>(<span class="pcolor5">$word</span>, 'hope'))<br>
	출력값 : <?php var_dump(strpos($word, 'hope')); ?><br>
	</li>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">explode</b>(<span class="pcolor5">$token, $days</span>))<br>
	출력값 : <?php var_dump(explode($token, $days)); ?><br>
	</li>
</ul>
<h3 style="margin-top:40px;">str_replace</h3>
<p class="summary" style="padding-left:35px;">str_replace(search, replace, string) <br>string 에서 search 문자열을 찾아서 모두 replace 로 바꾼 문자열을 반환한다.</p>
<ul>
	<li><b class="pcolor3">echo str_replace</b>(<span class="pcolor5">$token, <span  class="pcolor6"><?php echo '"< span style="color:#ff0000;"><b>$token</b>< /span>"'; ?></span>, $days</span>)<br>
	출력값 : <?php echo str_replace($token, "<span style='color:#ff0000;'>$token</span>" , $days); ?><br>
	</li>
</ul>
<hr>
<h2>PHP 어레이 함수</h2>
<?php
	$token = '과 ';
	$array1 = array('월요일', '화요일', '수요일', '목요일', '금요일', '토요일');
	$array2 = array('1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월');
?>
<dl style="border:1px solid #ddd;border-radius:5px;padding:20px;">
	<dt style="padding-bottom:10px;"><b>php 할당문</b></dt>
	<dd>$token = '과 ';</dd>
	<dd>$array1 = array('월요일', '화요일', '수요일', '목요일', '금요일', '토요일');</dd>
	<dd>$array2 = array('1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월');</dd>
</dl>
<h3 style="margin-top:40px;">array_push(elem) </h3>
<p class="summary" style="padding-left:35px;">어레이의 맨 뒤에 원소를 추가한다. $array[] = elem; 으로도 같은 일을 할 수 있다.</p>
<ul>
	<li><b class="pcolor3">array_push</b>(<span class="pcolor5">$array1</span>, '일요일');<span class="pcolor7"> // '일요일'을 어레이에 추가</span><br>
	<b class="pcolor3">var_dump</b>(<span class="pcolor5">$array1</span>); <span class="pcolor7">// 추가된 결과 어레이를 출력</span><br>
	출력값 : <?php array_push($array1, '일요일'); 
	var_dump($array1);
	?><br>
	</li>
</ul>
<h3 style="margin-top:40px;">count(array)</h3>
<p class="summary" style="padding-left:35px;">어레이의 맨 뒤에 원소를 추가한다. $array[] = elem; 으로도 같은 일을 할 수 있다.</p>
<ul>
	<li><b class="pcolor3">echo count</b>(<span class="pcolor5">$array1</span>);<br>
	출력값 : <?php echo count($array1); ?><br>
	</li>
</ul>
<h3 style="margin-top:40px;">array_values(array)</h3>
<p class="summary" style="padding-left:35px;">키/값 짝에서 값만으로 새로운 어레이를 만들어서 반환.</p>
<ul>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">array_values</b>(<span class="pcolor5">$array1</span>)); <br>
	출력값 : <?php var_dump(array_values($array1)); ?><br>
	</li>
</ul>
<h3 style="margin-top:40px;">array_keys(array)</h3>
<p class="summary" style="padding-left:35px;">키만으로 새로운 어레이를 만들어서 반환.</p>
<ul>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">array_key</b>(<span class="pcolor5">$array1</span>)); <br>
	출력값 : <?php var_dump(array_keys($array1)); ?><br>
	</li>
</ul>
<h3 style="margin-top:40px;">array_merge(array1, array2, …) </h3>
<p class="summary" style="padding-left:35px;">여러 개의 어레이를 다 합친 어레이를 반환.</p>
<ul>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">array_merge</b>(<span class="pcolor5">$array1, $array2</span>)); <br>
	출력값 : <?php var_dump(array_merge($array1, $array2)); ?><br>
	</li>
</ul>
<h3 style="margin-top:40px;">shuffle(array)  </h3>
<p class="summary" style="padding-left:35px;">어레이의 원소들의 순서를 랜덤하게 섞음.</p>
<ul>
	<li><b class="pcolor3">shuffle</b>(<span class="pcolor5">$array1</span>);  <span class="pcolor7"> // 어레이를 랜덤하게 섞음</span><br>
	<b class="pcolor3">var_dump</b>(<span class="pcolor5">$array1</span>);  <span class="pcolor7">// 결과 어레이를 출력</span><br>
	출력값 : <?php shuffle($array1); 
	var_dump($array1);
	?><br>
	</li>
</ul>
<h3 style="margin-top:40px;">implode(glue, array) </h3>
<p class="summary" style="padding-left:35px;">array 에 있는 모든 문자열들을 이어붙이되, 문자열 사이사이에 glue 문자열을 넣어준다. 만들어진 문자열을 반환한다.</p>
<ul>
	<li><b class="pcolor3">echo implode</b>(<span class="pcolor5">$token, $array1</span>); <br>
	출력값 : <?php echo implode($token, $array1); ?><br>
	</li>
</ul>
<hr>

</div>
</div>
</body>
</html>