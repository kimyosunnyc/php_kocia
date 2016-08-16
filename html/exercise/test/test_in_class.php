<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<title>PHP, JavaScript 테스트</title>
<link rel="stylesheet" href="css/style.css" />
<script language="javascript" src="../jquery/jquery-1.11.2.js"></script>
</head>

<body>
<div class="wrap">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>
<h1>PHP, JavaScript 테스트</h1>
<div class="content">
<div class="tab">
	<ul>
		<li><a href="summary_table.php">요약정리 파일 테스트 - 개인</a></li>
		<li><a href="test_in_class.php">어레이 php, javascript 테스트</a></li>
	</ul>
</div>
<h2>어레이 테스트 - 복사가 되는 것인가? 이름만 가져다 사용하는 것인가?</h2>
<h3 class="h_green">php</h3>
<p class="summary">shallow_copy : 얕은 복사 (이름만) / deep_copy : 깊은 복사<br>
복사가 되는 것이다.
</p>
<?php
	$arr = array(1, 2, 3);
	$arr2 = $arr;
	$arr [2] = 4;
?>
<dl class="php_box_2">
	<dt><b>php</b></dt>
	<dd>$arr = array(1, 2, 3);</dd>
	<dd>$arr2 = $arr; <span class="pcolor7">// 복사가 일어났다고 할 수 있음 : shallow_copy</span></dd>
	<dd>$arr [2] = 4;</dd>
	<dd><b class="pcolor3">print_r</b> ($arr);</dd>
	<dd><b class="pcolor3">print_r</b> ($arr2);</dd>
</dl>
<ul>
	<li>
	출력값 : <br>
	<?php print_r ($arr); ?><br>
	<?php print_r ($arr2); ?>
	</li>
</ul>

<h3 class="h_blue">javascript</h3>
<p class="summary">복사가 되는 것이 아니라 하나의 어레이를 이름만 다르게 사용하는 것이다.</p>
<dl class="php_box_2">
	<dt><b>javascript</b></dt>
	<dd>var arr = [1, 2, 3];</dd>
	<dd>var arr2 = arr;</dd>
	<dd>$arr [2] = 4;</dd>
	<dd>arr [2] = 4;</dd>
	<dd>alert(arr2);</dd>
</dl>
<ul>
	<li>출력값 : <br>
<script>
	var arr = [1, 2, 3];
	var arr2 = arr;
	arr [2] = 4;
	// alert(arr2);
	document.write(arr2);
</script>
	</li>
</ul>


<hr>
<h2>1부터 20까지의 어레이를 만들어라.</h2>
<p class="summary">php 에서의 <span class="pcolor2">array_push</span>, javascript 에서의 arr.<span class="pcolor2">push</span></p>
<h3 class="h_green">php </h3>
<?php
$array = array ();
$length = 20;

for ($i = 1; $i <= $length; $i += 1) {
	array_push ($array, $i);
}
?>
<dl class="php_box_2">
	<dt><b>php</b></dt>
	<dd>$array = array ();</dd>
	<dd>$length = 20;</dd>
	<dd><b class="pcolor3">for</b> ($i = 1; $i <= $length; $i += 1) {</dd>
	<dd><b class="pcolor3">array_push</b> ($array, $i);</dd>
	<dd>}</dd>
</dl>
<ul>
	<li>
	출력값 : <br>
	<?php print_r($array); ?><br>
	</li>
</ul>
<h3 class="h_blue">javascript </h3>
<dl class="php_box_2">
	<dt><b>javascript</b></dt>
	<dd><b class="pcolor8">var</b> arr = [];</dd>
	<dd><b class="pcolor8">for</b> (<b class="pcolor8">var</b> i = 1; i <= 20; i ++){</dd>
	<dd>arr.push(i);</dd>
	<dd>}</dd>
</dl>
<ul>
	<li>
	출력값 : <br>
		<script>
			var arr = [];
			for (var i = 1; i <= 20; i ++){
				arr.push(i);
			}
			document.write(arr);
		</script>
	</li>
</ul>


<hr>
<h2>기존의 어레이에서 짝수를 찾아 새로운 어레이를 만들어라.</h2>
<h3 class="h_green"> php </h3>
<dl class="php_box_2">
	<dt><b>php</b></dt>
	<dd>$array2 = array(); <span class="pcolor7">// array2 라는 어레이를 만들어라.</span></dd>
	<dd>$length2 = count(<span class="pcolor2">$array</span>);  <span class="pcolor7">기존의 어레이를 활용하여 길이 구하기</span></dd>
	<dd><b class="pcolor3">for</b> ($i = 0; $i < $length2; $i += 1){</dd>
	<dd><b class="pcolor3">if </b>(<span class="pcolor2">$array[$i]</span> % 2 === 0){  <span class="pcolor7">// 기존의 어레이 index 값을 2로 나누어 나머지가 0인 index를 찾아라.</span></dd>
	<dd><b class="pcolor3">array_push</b> ($array2, <span class="pcolor2">$array[$i]</span>);  <span class="pcolor7">// 찾은 index 값을 새로운 어레이 array2에 넣어라.</span></dd>
	<dd>}</dd>
	<dd>}</dd>
	<dd><b class="pcolor3">print_r</b>($array2);</dd>
</dl>
<ul>
	<li>
	출력값 : <br>
	<?php
	$array2 = array();
	$length2 = count($array);
	
	for ($i = 0; $i < $length2; $i += 1){
		
		if ($array[$i] % 2 === 0){
			array_push ($array2, $array[$i]);
		}
	}
	print_r($array2);
	?>
	</li>
</ul>
<h3 class="h_blue">javascript </h3>
<dl class="php_box_2">
	<dt><b>javascript</b></dt>
	<dd><b class="pcolor8">var</b> arr2 = [];</dd>
	<dd><b class="pcolor8">for</b> (var i = 1; i < arr.length; i ++){</dd>
	<dd><b class="pcolor8">if</b> (<span class="pcolor2">arr[i]</span> % 2 === 0){</dd>
	<dd>arr2.push(<span class="pcolor2">arr[i]</span>);</dd>
	<dd>}</dd>
	<dd>}</dd>
</dl>
<ul>
	<li>
	출력값 : <br>
		<script>
			var arr2 = [];
			for (var i = 1; i < arr.length; i ++){
				if (arr[i] % 2 === 0){
					arr2.push(arr[i]);
				}
			}
			document.write(arr2);
		</script>
	</li>
</ul>


<hr>
<h2>array_filter($arr, 함수); 를 사용하여 기존의 어레이에서 짝수를 찾아 새로운 어레이를 만들어라.</h2>
<p class="summary">php에서의  <span class="pcolor2">array_filter</span>, javascript에서의 arr. <span class="pcolor2">filter</span></p>
<h3 class="h_green">php</h3>
<dl class="php_box_2">
	<dt><b>php</b></dt>
	<dd><b class="pcolor3">function</b> <span class="pcolor2">testEven</span>($num){</dd>
	<dd><b class="pcolor3">return</b> $num % 2 === 0;</dd>
	<dd>}</dd>
	<dd>$array2 = <b class="pcolor3">array_filter</b>($array, <span class="pcolor2">'testEven'</span>);</dd>
	<dd><b class="pcolor3">print_r</b>($array2);</dd>
</dl>
<ul>
	<li>
	출력값 : <br>
	<?php
		function testEven($num){
			return $num % 2 === 0;
		}
		$array2 = array_filter($array, 'testEven');
		print_r($array2);
		
	?>
	</li>
</ul>
<h3 class="h_blue">javascript</h3>
<dl class="php_box_2">
	<dt><b>javascript</b></dt>
	<dd><b class="pcolor8">var</b> arr2 = arr.filter(<b class="pcolor8">function</b>(value, index, array){ <br><span class="pcolor7">// value : 값, index : 위치, array : 어레이</span></dd>
	<dd><b class="pcolor8">return</b> value % 2 === 0;</dd>
	<dd>});</dd>
</dl>
<ul>
	<li>
	출력값 : <br>
		<script>
			var arr2 = arr.filter(function(value, index, array){
				return value % 2 === 0;
			});
			document.write(arr2);
		</script>
	</li>
</ul>


<hr>
<h2>map 함수를 사용하여 각각의 원소에 작업하기</h2>
<h3 class="h_blue">javascript</h3>
<dl class="php_box_2">
	<dt><b>javascript</b></dt>
	<dd><b class="pcolor8">var</b> arr3 = arr.map(<b class="pcolor8">function</b>(value, index, array) {</dd>
	<dd><b class="pcolor8">return</b> value*2;</dd>
	<dd>});</dd>
</dl>
<ul>
	<li>
	출력값 : <br>
		<script>
		var arr3 = arr.map(function(value, index, array) {
			return value*2;
		});
		document.write(arr3);
		</script>
	</li>
</ul>
<hr>


<h2>forEach 함수</h2>
<h3 class="h_blue">javascript</h3>
<dl class="php_box_2">
	<dt><b>javascript</b></dt>
	<dd><b class="pcolor8">var</b> arr4 = [];</dd>
	<dd>arr.forEach(<b class="pcolor8">function</b>(value, index, array) {</dd>
	<dd><b class="pcolor8">if </b>(value % 2 === 0){</dd>
	<dd>arr4.push(value);</dd>
	<dd>}</dd>
	<dd>});</dd>
</dl>
<ul>
	<li>
	출력값 : <br>
		<script>
		var arr4 = [];
		arr.forEach(function(value, index, array) {
			if (value % 2 === 0){
				arr4.push(value);
			}
		});
		document.write(arr4);
		</script>
	</li>
</ul>
<hr>




</div>
</div>
</body>
</html>