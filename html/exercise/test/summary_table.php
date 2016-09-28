<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<title>PHP, HTML, MySQL, JavaScript 요약 정리 테스트</title>
<link rel="stylesheet" href="css/style.css" />
<script language="javascript" src="../jquery/jquery-1.11.2.js"></script>
</head>

<body>
<div class="wrap">

<h1>PHP, HTML, MySQL, JavaScript 요약 정리 테스트</h1>
<div class="content">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>
<div class="tab">
	<ul>
		<li><a href="summary_table.php">요약정리 파일 테스트 - 개인</a></li>
		<li class="tab_btn"><a href="test_in_class.php">어레이 php, javascript 테스트</a></li>
	</ul>
</div>
<h2 class="top_title">타입 전환 테이블</h2>
<iframe src="type_table.php" frameborder="0" marginwidth="0" marginheight="0" ></iframe>
<hr>
<h2>내림, 올림, 반올림</h2>
<div class="cont_box">
	<div class="inner_box">
		<h3>floor() / 내림</h3>
		<ul>
			<li><b class="pcolor3">echo floor</b>(1.3);<br>
			출력값 : <b style="text-decoration:underline;" class="pcolor2"><?php echo floor(1.3); ?></b><br><br>
			</li>
			<li><b class="pcolor3">echo floor</b>(1.6);<br>
			출력값 : <b style="text-decoration:underline;" class="pcolor2"><?php echo floor(1.6); ?></b><br>
			</li>
		</ul>
	</div>
	<div class="inner_box">
		<h3>ceil() / 올림</h3>
		<ul>
			<li><b class="pcolor3">echo ceil</b>(1.3);<br>
			출력값 : <b style="text-decoration:underline;" class="pcolor2"><?php echo ceil(1.3); ?></b><br><br>
			</li>
			<li><b class="pcolor3">echo ceil</b>(1.6);<br>
			출력값 : <b style="text-decoration:underline;" class="pcolor2"><?php echo ceil(1.6); ?></b><br>
			</li>
		</ul>
	</div>
	<div class="inner_box">
		<h3>round() / 반올림</h3>
		<ul>
			<li><b class="pcolor3">echo round</b>(1.3);<br>
			출력값 : <b style="text-decoration:underline;" class="pcolor2"><?php echo round(1.3); ?></b><br><br>
			</li>
			<li><b class="pcolor3">echo round</b>(1.6);<br>
			출력값 : <b style="text-decoration:underline;" class="pcolor2"><?php echo round(1.6); ?></b><br>
			</li>
		</ul>
	</div>
</div>
<hr>
<h2>문자열을 나타내는 '홑따옴표'와 "쌍따옴표"</h2>
<p class="summary">아래의 예제를 보면 홑따옴표 안의 내용은 문자열 그대로 출력되고, 쌍따옴표 안의 특수문자와 변수는 값으로 전환하여 출력되는 것을 알 수 있다.</p>
<?php
	$number1 = '1';
	$number2 = '2';
	$text1 = '동해물과 백두산이 마르고 닳도록';
	$text2 = '남산 위에 저 소나무, 철갑을 두른 듯';
	$text3 = '가을 하늘 공활한데 높고 구름 없이';
	$text4 = '이 기상과 이 맘으로 충성을 다하여';
?>
<dl class="php_box_1">
	<dt><b>php 할당문</b></dt>
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
<dl class="php_box_1">
	<dt><b>php 할당문</b></dt>
	<dd>$word = "This is the way you left me I'm not pretending No hope, no love, no glory No happy ending 동해물과 백두산이 마르고 닳도록";</dd>
	<dd>$word_en = "This is the way you left me I'm not pretending No hope, no love, no glory No happy ending";</dd>
	<dd>$word_ko = '동해물과 백두산이 마르고 닳도록';</dd>
	<dd>$limit = 22;</dd>
	<dd>$token = '과 ';</dd>
	<dd>$days = '월요일과 화요일과 수요일과 목요일과 금요일과 토요일과 일요일';</dd>
</dl>
<h3 class="head_3">substr(string, start[, length])</h3>
<p class="summary">string 을 start 인덱스부터 끝까지 잘라서 새로 만들어진 문자열을 반환한다. length 가 제시되었을 경우는 최대 그 길이까지만 자른다. </p>
<ul>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">substr</b>(<span class="pcolor5">$word_en</span>, 0, <span class="pcolor5">$limit</span>));<br>
	출력값 : <?php var_dump(substr($word_en, 0, $limit)); ?><br>
	</li>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">substr</b>(<span class="pcolor5">$word_ko</span>, 0, <span class="pcolor5">$limit</span>));<br>
	출력값 : <?php var_dump(substr($word_ko, 0, $limit)); ?>
	</li>
</ul>
<h3 class="head_3">strlen(string) / mb_strlen(string)</h3>
<p class="summary">string 의 길이를 반환한다. mb_ 가 붙으면 multi byte, 즉 한글 등의 문자를 포함한 string 도 올바르게 처리할 수 있다.</p>
<ul>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">strlen</b>(<span class="pcolor5">$word_en</span>));<br>
	출력값 : <?php var_dump(strlen($word_en)); ?><br>
	</li>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">strlen</b>(<span class="pcolor5">$word_ko</span>));<br>
	출력값 : <?php var_dump(strlen($word_ko)); ?><br>
	</li>
	<li><b class="pcolor3">echo mb_strlen</b>(<span class="pcolor5">$word</span>)<br>
	출력값 : <?php var_dump(mb_strlen($word)); ?><br>
	</li>
</ul>
<h3 class="head_3">strpos(string, word)</h3>
<p class="summary">string 에서 word 라는 다른 문자열이 처음 등장하는 인덱스를 반환한다. 찾지 못했을 경우는 false 를 반환한다.</p>
<ul>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">strpos</b>(<span class="pcolor5">$word</span>, 'hope'));<br>
	출력값 : <?php var_dump(strpos($word, 'hope')); ?><br>
	</li>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">strpos</b>(<span class="pcolor5">$word</span>, 'word'));<br>
	출력값 : <?php var_dump(strpos($word, 'word')); ?><br>
	</li>
</ul>
<h3 class="head_3">explode(delimiter, string)</h3>
<p class="summary">delimiter 문자열이 나오는 모든 위치를 기준으로 string 을 분할하여 어레이로 반환한다.</p>
<ul>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">explode</b>(<span class="pcolor5">$token, $days</span>));<br>
	출력값 : <?php var_dump(explode($token, $days)); ?><br>
	</li>
</ul>
<h3 class="head_3">str_replace(search, replace, string)</h3>
<p class="summary">string 에서 search 문자열을 찾아서 모두 replace 로 바꾼 문자열을 반환한다.</p>
<ul>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">str_replace</b>(<span class="pcolor5">$token, <span  class="pcolor6"><?php echo '"< span style="color:#ff0000;"><b>$token</b>< /span>"'; ?></span>, $days</span>));<br>
	출력값 : <?php var_dump(str_replace($token, "<span style='color:#ff0000;'>$token</span>" , $days)); ?><br>
	</li>
</ul>
<hr>
<h2>PHP 어레이 함수</h2>
<?php
	$token = '과 ';
	$array1 = array('월요일', '화요일', '수요일', '목요일', '금요일', '토요일');
	$array2 = array('1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월');
?>
<dl class="php_box_1">
	<dt><b>php 할당문</b></dt>
	<dd>$token = '과 ';</dd>
	<dd>$array1 = array('월요일', '화요일', '수요일', '목요일', '금요일', '토요일');</dd>
	<dd>$array2 = array('1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월');</dd>
</dl>
<h3 class="head_3">array_push(array, elem) </h3>
<p class="summary">어레이의 맨 뒤에 원소를 추가한다. $array[] = elem; 으로도 같은 일을 할 수 있다.</p>
<ul>
	<li><b class="pcolor3">array_push</b>(<span class="pcolor5">$array1</span>, '일요일');<span class="pcolor7"> // '일요일'을 어레이에 추가</span><br>
	<b class="pcolor3">var_dump</b>(<span class="pcolor5">$array1</span>); <span class="pcolor7">// 추가된 결과 어레이를 출력</span><br>
	출력값 : <?php array_push($array1, '일요일'); 
	var_dump($array1);
	?><br>
	</li>
</ul>
<h3 class="head_3">count(array)</h3>
<ul>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">count</b>(<span class="pcolor5">$array1</span>));<br>
	출력값 : <?php var_dump(count($array1)); ?><br>
	</li>
</ul>
<h3 class="head_3">array_values(array)</h3>
<p class="summary">키/값 짝에서 값만으로 새로운 어레이를 만들어서 반환.</p>
<ul>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">array_values</b>(<span class="pcolor5">$array1</span>)); <br>
	출력값 : <?php var_dump(array_values($array1)); ?><br>
	</li>
</ul>
<h3 class="head_3">array_keys(array)</h3>
<p class="summary">키만으로 새로운 어레이를 만들어서 반환.</p>
<ul>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">array_keys</b>(<span class="pcolor5">$array1</span>)); <br>
	출력값 : <?php var_dump(array_keys($array1)); ?><br>
	</li>
</ul>
<h3 class="head_3">array_merge(array1, array2, …) </h3>
<p class="summary">여러 개의 어레이를 다 합친 어레이를 반환.</p>
<ul>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">array_merge</b>(<span class="pcolor5">$array1, $array2</span>)); <br>
	출력값 : <?php var_dump(array_merge($array1, $array2)); ?><br>
	</li>
</ul>
<h3 class="head_3">shuffle(array)  </h3>
<p class="summary">어레이의 원소들의 순서를 랜덤하게 섞음.</p>
<ul>
	<li><b class="pcolor3">shuffle</b>(<span class="pcolor5">$array1</span>);  <span class="pcolor7"> // 어레이를 랜덤하게 섞음</span><br>
	<b class="pcolor3">var_dump</b>(<span class="pcolor5">$array1</span>);  <span class="pcolor7">// 결과 어레이를 출력</span><br>
	출력값 : <?php shuffle($array1); 
	var_dump($array1);
	?><br>
	</li>
</ul>
<h3 class="head_3">implode(glue, array) </h3>
<p class="summary">array 에 있는 모든 문자열들을 이어붙이되, 문자열 사이사이에 glue 문자열을 넣어준다. 만들어진 문자열을 반환한다.</p>
<ul>
	<li><b class="pcolor3">var_dump</b>(<b class="pcolor3">implode</b>(<span class="pcolor5">$token, $array1</span>)); <br>
	출력값 : <?php var_dump(implode($token, $array1)); ?><br>
	</li>
</ul>
<hr>
<h2>PHP 정규표현식</h2>
<?php
	$regex = '/<([^>]+)>([^<]+)<\/\1>/';
	$text = '<span>elem1</span><span>elem2</span>';
	$matches = array();
	preg_match($regex, $text, $matches);
	$match_all = htmlspecialchars($matches[0]);
	$match_1 = htmlspecialchars($matches[1]);
	$match_2 = htmlspecialchars($matches[2]);
	
	preg_match_all($regex, $text, $matches);
	$match_01 = htmlspecialchars($matches[0][0]);
	$match_02 = htmlspecialchars($matches[0][1]);
	$match_03 = htmlspecialchars($matches[1][0]);
	$match_04 = htmlspecialchars($matches[1][1]);
	$match_05 = htmlspecialchars($matches[2][0]);
	$match_06 = htmlspecialchars($matches[2][1]);
?>
<dl class="php_box_1">
	<dt><b>php 할당문</b></dt>
	<dd>$regex = '/<([^>]+)>([^<]+)<\/\1>/';</dd>
	<dd>$text = '< span>elem1< /span>< span>elem2< /span>';</dd>
	<dd>$matches = array();</dd>
</dl>
<h3 class="head_3">preg_match(pattern, string[, matches]) </h3>
<p class="summary">string 안에서 정규표현식 pattern 을 찾아서 있으면 1, 없으면 0 을 반환한다. matches 가 주어졌을 경우, matches[0]에 매칭된 문자열 전체가, matches[1]부터는 괄호로 지정된 부분패턴이 저장된다. </p>
<dl class="php_box_2">
	<dt><b>preg_match 사용</b></dt>
	<dd><b class="pcolor3">preg_match</b>($regex, $text, $matches);</dd>
	<dd>$match_all = <b class="pcolor3">htmlspecialchars</b>($matches[0]);</dd>
	<dd>$match_1 = <b class="pcolor3">htmlspecialchars</b>($matches[1]);</dd>
	<dd>$match_2 = <b class="pcolor3">htmlspecialchars</b>($matches[2]);</dd>
</dl>
<ul>
	<li>
	<b class="pcolor3">echo </b><span class="pcolor5">$match_all</span>; <br>
	(전체매칭) 출력값 : <?php echo $match_all; ?><br>
	<b class="pcolor3">echo </b><span class="pcolor5">$match_1</span>; <br>
	(괄호 1) 출력값 : <?php echo $match_1; ?><br>
	<b class="pcolor3">echo </b><span class="pcolor5">$match_2</span>; <br>
	(괄호 2) 출력값 : <?php echo $match_2; ?>
	</li>
</ul>
<h3 class="head_3">preg_match_all(pattern, string, matches)</h3>
<p class="summary">preg_match 와 비슷하나 첫번째 매칭으로 그치지 않고 string 전체를 다 검색한다. 총 매칭의 개수를 반환한다. matches[0] 에는 매칭된 문자열 전체들이 어레이로 저장되고, matches[1] 부터는 괄호로 지정된 부분패턴이 어레이로 저장된다. </p>
<dl class="php_box_2">
	<dt><b>preg_match_all 사용</b></dt>
	<dd><b class="pcolor3">preg_match_all</b>($regex, $text, $matches);</dd>
	<dd>$match_01 = <b class="pcolor3">htmlspecialchars</b>($matches[0][0]);</dd>
	<dd>$match_02 = <b class="pcolor3">htmlspecialchars</b>($matches[0][1]);</dd>
	<dd>$match_03 = <b class="pcolor3">htmlspecialchars</b>($matches[1][0]);</dd>
	<dd>$match_04 = <b class="pcolor3">htmlspecialchars</b>($matches[1][1]);</dd>
	<dd>$match_05 = <b class="pcolor3">htmlspecialchars</b>($matches[2][0]);</dd>
	<dd>$match_06 = <b class="pcolor3">htmlspecialchars</b>($matches[2][1]);</dd>
</dl>
<ul>
	<li>
	<b class="pcolor3">echo </b><span class="pcolor5">$match_01</span>; <br>
	(첫번째 - 전체매칭) 출력값 : <?php echo $match_01; ?><br>
	<b class="pcolor3">echo </b><span class="pcolor5">$match_02</span>; <br>
	(두번째 - 전체매칭) 출력값 : <?php echo $match_02; ?><br>
	<b class="pcolor3">echo </b><span class="pcolor5">$match_03</span>; <br>
	(첫번째 - 괄호 1) 출력값 : <?php echo $match_03; ?><br>
	<b class="pcolor3">echo </b><span class="pcolor5">$match_04</span>; <br>
	(두번째 - 괄호 1) 출력값 : <?php echo $match_04; ?><br>
	<b class="pcolor3">echo </b><span class="pcolor5">$match_05</span>; <br>
	(첫번째 - 괄호 2) 출력값 : <?php echo $match_05; ?><br>
	<b class="pcolor3">echo </b><span class="pcolor5">$match_06</span>; <br>
	(두번째 - 괄호 2) 출력값 : <?php echo $match_06; ?>
	</li>
</ul>
<h3 class="head_3">preg_replace(pattern, replacement, string) </h3>
<p class="summary">string 에서 정규표현식 pattern 을 찾아서 모두 replacement 로 치환한다. 이 때 pattern 에 괄호로 지정된 부분패턴을 replacement 에서 $1, $2 등으로 이용할 수 있다. string 에 변환이 적용된 후의 문자열을 반환한다. </p>
<?php
	$regex = '/([\w-]+)\s*/';
	$text = '<span  class = "my-class"  id ="a1" >동해물과 백두산이 마르고 닳도록</span >';
	
	$replace1 = preg_replace($regex, '\1 ', $text);
	$replace2 = preg_replace('/<\s*/', '<', $replace1);
	$replace3 = preg_replace('/\s*>/', '>', $replace2);
	$replace4 = preg_replace('/\s*=\s*/', '=', $replace3);
	$replace5 = preg_replace('/\s*\"/', '"', $replace4);
	
	$result = htmlspecialchars($replace5);
?>
<dl class="php_box_2">
	<dt><b>php 할당문</b></dt>
	<dd>$regex = '/([\w-]+)\s*/';</dd>
	<dd>$text = '< span&nbsp;&nbsp;class = "my-class"&nbsp;&nbsp;id ="a1" >동해물과 백두산이 마르고 닳도록< /span >';</dd>
	<dd>$replace1 = <b class="pcolor3">preg_replace</b>($regex, '\1 ', $text);</dd>
	<dd>$replace2 = <b class="pcolor3">preg_replace</b>('/<\s*/', '<', $replace1);</dd>
	<dd>$replace3 = <b class="pcolor3">preg_replace</b>('/\s*>/', '>', $replace2);</dd>
	<dd>$replace4 = <b class="pcolor3">preg_replace</b>('/\s*=\s*/', '=', $replace3);</dd>
	<dd>$replace5 = <b class="pcolor3">preg_replace</b>('/\s*\"/', '"', $replace4);</dd>
</dl>
<ul>
	<li>
		출력값 : <?php echo $result; ?>
	</li>
</ul>
<h3 class="head_3">preg_split(pattern, string)</h3>
<p class="summary">string 을 정규표현식 pattern 을 delimiter 로 사용해서 explode 처럼 어레이로 만들어서 반환한다.</p>
<?php
	$regex = '/[-:]+/';
	$text = '01 0  - 6 605: 19 17';
	$result = implode('-', preg_split($regex, $text));
?>
<dl class="php_box_2">
	<dt><b>php 할당문</b></dt>
	<dd>$regex = '/[-:]+/';</dd>
	<dd>$text = '01 0  - 6 605: 19 17';</dd>
	<dd>$result = <b class="pcolor3">implode</b>('-', <b class="pcolor3">preg_split</b>($regex, $text));</dd>
</dl>
<ul>
	<li>
	<b class="pcolor3">echo </b> <span class="pcolor4">'원래 값 : '</span>.<span class="pcolor5">$text</span>; <br>
	출력값 : <?php echo '원래 값: '.$text; ?><br><br>
	<b class="pcolor3">echo </b> <span class="pcolor4">'split 하고 implode 한 결과 : '</span>.<span class="pcolor5">$result</span>; <br>
	split 하고 implode 한 결과 : <?php echo $result; ?><br><br>
	<b class="pcolor3">echo </b> <span class="pcolor4">'최종 replace 결과 : '</span>.<b class="pcolor3">preg_replace</b>('/\s+/', '', <span class="pcolor5">$result</span>); <br>
	최종 replace 결과 : <?php echo preg_replace('/\s+/', '', $result); ?>
	</li>
</ul>
<hr>
<h2>정렬(sorting)</h2>
<p class="summary"><span class="pcolor2">※ ksort, asort, sort 앞에 ‘r’을 붙이면 내림차순 정렬이 된다</span></p>
<h3 class="head_3">ksort</h3>
<p class="summary">키에 의한 배열 정렬</p>
<?php
	$fruits = array ("d"=>"lemon", "a"=>"orange", "b"=>"banana", "c"=>"apple");
	ksort($fruits);
?>
<dl class="php_box_2">
	<dt><b>php</b></dt>
	<dd>$fruits = array ("d"=>"lemon", "a"=>"orange", "b"=>"banana", "c"=>"apple");</dd>
	<dd><b class="pcolor3">ksort</b>($fruits);</dd>
	<dd>foreach ($fruits as $key => $val) {</dd>
	<dd>echo "$key = $val\n"; <span class="pcolor7">// \n은 줄바꿈</span></dd>
	<dd>}</dd>
</dl>
<ul>
	<li>
	<b class="pcolor3">foreach</b> (<span class="pcolor5">$fruits</span> as <span class="pcolor5">$key</span> => <span class="pcolor5">$val</span>) {<br>
	&nbsp;&nbsp;&nbsp;&nbsp;<b class="pcolor3">echo </b> <span class="pcolor6">"$key = $val\n"</span>; <br>
	}
	<br>
	출력값 : 
	<?php 
		foreach ($fruits as $key => $val) {
			echo "$key = $val\n";
		}
	?>
	</li>
</ul>
<h3 class="head_3">asort</h3>
<p class="summary">배열을 정렬하고 인덱스 상관 관계를 유지</p>
<?php
	$fruits = array ("d"=>"lemon", "a"=>"orange", "b"=>"banana", "c"=>"apple");
	asort($fruits);
?>
<dl class="php_box_2">
	<dt><b>php</b></dt>
	<dd>$fruits = array ("d"=>"lemon", "a"=>"orange", "b"=>"banana", "c"=>"apple");</dd>
	<dd><b class="pcolor3">asort</b>($fruits);</dd>
	<dd>foreach ($fruits as $key => $val) {</dd>
	<dd>echo "$key = $val\n"; <span class="pcolor7">// \n은 줄바꿈</span></dd>
	<dd>}</dd>
</dl>
<ul>
	<li>
	<b class="pcolor3">foreach</b> (<span class="pcolor5">$fruits</span> as <span class="pcolor5">$key</span> => <span class="pcolor5">$val</span>) {<br>
	&nbsp;&nbsp;&nbsp;&nbsp;<b class="pcolor3">echo </b> <span class="pcolor6">"$key = $val\n"</span>; <br>
	}
	<br>
	출력값 : 
	<?php 
		foreach ($fruits as $key => $val) {
			echo "$key = $val\n";
		}
	?>
	</li>
</ul>






</div>
</div>
</body>
</html>