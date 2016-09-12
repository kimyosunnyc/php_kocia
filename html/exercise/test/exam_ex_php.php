<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<title>학원시험 예상문제 - PHP</title>
<link rel="stylesheet" href="css/style_2.css" />
</head>

<body>
<div class="wrap">
<h1>학원시험 예상문제 - PHP</h1>
<div class="content">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>

<div class="tab">
	<ul>
		<li><a href="exam_ex_php.php">PHP</a></li>
		<li><a href="exam_ex_javascript.php">Javascript</a></li>
		<li class="tab_btn"><a href="exam_ex_mysql.php">MySQL</a></li>
	</ul>
</div>

<h2>1. 다음의 값들을 bool 타입으로 전환했을 때, true가 되는지 false가 되는지 쓰세요.</h2>
<div class="cont_box">
	<dl>
		<dt class="h_green">문자열 타입의 값</dt>
		<dd>'' - <span class="answer"><?php var_dump(boolval('')); ?></span></dd>
		<dd>'0' - <span class="answer"><?php var_dump(boolval('0')); ?></span></dd>
		<dd>'00' - <span class="answer"><?php var_dump(boolval('00')); ?></span></dd>
		<dd>'false' - <span class="answer"><?php var_dump(boolval('false')); ?></span></dd>
	</dl>
	<dl>
		<dt class="h_green">정수 타입의 값</dt>
		<dd>1 - <span class="answer"><?php var_dump(boolval(1)); ?></span></dd>
		<dd>0 - <span class="answer"><?php var_dump(boolval(0)); ?></span></dd>
	</dl>
	<dl>
		<dt class="h_green">어레이 타입의 값</dt>
		<dd>array() - <span class="answer"><?php var_dump(boolval(array())); ?></span></dd>
		<dd>array(false)- <span class="answer"><?php var_dump(boolval(array(false))); ?></span></dd>
		<dd>array('false')- <span class="answer"><?php var_dump(boolval(array('false'))); ?></span></dd>
	</dl>
</div>

<h2>2. 다음 코드를 실행하면 브라우저에 무엇이 출력되는지 쓰세요.<span class="description">($x = 5; 일 때)</span></h2>
<?php $x = 5; ?>
<div class="cont_box">
	<dl>
		<dt class="h_green">홑따옴표 > echo '$x';</dt>
		<dd>출력값 - <span class="answer"><?php echo '$x'; ?></span></dd>
	</dl>
	<dl>
		<dt class="h_green">쌍따옴표 > echo "$x";</dt>
		<dd>출력값 - <span class="answer"><?php echo "$x"; ?></span></dd>
	</dl>
</div>

<h2>3. 다음 코드를 실행한 결과로 '애플과 삼성과 LG'가 브라우저에 출력되었으면 좋겠습니다. 아래의 코드 이후에 어떤 코드를 넣어야 좋을지 쓰세요.</h2>
<dl class="php_box_1">
	<dt><b>조건</b></dt>
	<dd>$phone_makers = array(array('애플', '삼성', 'LG');</dd>
	<dd>// 이 밑에 와야 할 코드를 쓰세요.</dd>
</dl>
<?php
    $token = '과 ';
    $phone_makers = array('애플', '삼성', 'LG');
    $implode = implode ($token, $phone_makers);
    $explode = explode ($token, $implode);
   
    //explode ($token, $implode);
    //print_r($explode);
?>
<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd>$token = '과 ';</dd>
	<dd>$phone_makers = array(array('애플', '삼성', 'LG');</dd>
	<dd>$implode = implode ($token, $phone_makers);</dd>
	<dd>$explode = explode ($token, $implode);</dd>
	<dd>print_r($implode);</dd>
	<dd>&nbsp;</dd>
	<dd>출력값 : <span class="answer"><?php print_r($implode); ?></span></dd>
</dl>


<h2>4. 다음 코드의 실행 결과로 화면에 출력되는 문자열은 무엇인가요?</h2>
<dl class="php_box_1">
	<dt><b>조건</b></dt>
	<dd>function print($input = 'I love ') {</dd>
	<dd>echo $input;</dd>
	<dd>}</dd>
	<dd>print();</dd>
	<dd>print('PHP.');</dd>
</dl>
출력값 : 
<span class="answer">
	<?php
		function test_print($input = 'I love ') {
			echo $input;
		}
		test_print();
		test_print('PHP.');
	?>
</span>

<h2>5. 다음 코드에서 변수 $pi 의 값은 원주율의 근사값입니다. 이 값을 소수 둘째자리까지 반올림해서 브라우저에 출력하는 코드를 작성하세요.</h2>
<dl class="php_box_1">
	<dt><b>조건</b></dt>
	<dd>$pi = 3.14149265;</dd>
</dl>
<?php $pi = 3.14149265; ?>
<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd>echo round($pi, 2);</dd>
	<dd>&nbsp;</dd>
	<dd>출력값 : <span class="answer"><?php echo round($pi, 2); ?></span></dd>
</dl>

<h2>6. 아래의 함수 is_suffix를, 문자열 A와 B를 받아서 A가 B의 접미어이면 true를, 그렇지 않으면 false를 반환하도록 작성해 보세요. </h2>
<p>
<span class="description">※ 어떤 문자열 A가 다른 문자열 B의 <span style="text-decoration:underline;">맨 뒷부분</span>에 쏙 들어있을 때, "A는 B의 접미어(suffix)"라고 합니다.<br>
&nbsp;&nbsp;&nbsp;&nbsp;예를 들어서, 문자열 "od"는 "food"의 접미어 입니다. 물론 "food"도 "food"의 접미어 입니다. 하지만 "fo", "foo", "oo" 등은 접미어가 아닙니다.<br>
※ php의 대소문자 규칙상 변수 이름은 소문자로 합니다. strlen() 함수와 strpos() 함수를 이용하세요.</span>
</p>
<dl class="php_box_1">
	<dt><b>조건</b></dt>
	<dd>function is_suffix($a, $b)</dd>
</dl>

<?php
	function is_suffix ($a, $b) {
		$alen = strlen($a);
		$c = substr ($b, -$alen);
		
		return $c === $a;
	}
?>
<dl class="answer_box_1">
	<dt>문제풀이</dt>
	<dd>function is_suffix ($a, $b) {</dd>
	<dd>$alen = strlen($a);</dd>
	<dd>$c = substr ($b, -$alen);</dd>
	<dd>&nbsp;</dd>
	<dd>return $c === $a;</dd>
	<dd>&nbsp;</dd>
	<dd>출력값 ($a = 'c', $b = 'abc' 일 때) : <span class="answer"><?php var_dump (is_suffix ('c', 'abc')); ?></span></dd>
	<dd>출력값 ($a = 'b', $b = 'abc' 일 때) : <span class="answer"><?php var_dump (is_suffix ('b', 'abc')); ?></span></dd>
	<dd>출력값 ($a = 'bc', $b = 'abc' 일 때) : <span class="answer"><?php var_dump (is_suffix ('bc', 'abc')); ?></span></dd>
</dl>



<h2>7. 아래의 코드를 실행했을 때, 브라우저에 출력되는 결과를 최대한 정확히 맞춰보세요.</h2>
<span class="description">참고로, 사전 순서로 정렬하면 숫자가 알파벳보다 먼저 나타나고, 대문자는 모든 소문자보다 먼저 나타납니다.<br>
그리고 implode 함수는 키/값 짝에서 값만을 취해서 문자열을 만듭니다.<span>
<dl class="php_box_1">
	<dt><b>조건</b></dt>
	<dd>$person_info = array('name' => 'Calvin', 'age'=>34, 'sex'=>'male');</dd>
	<dd>&nbsp;</dd>
	<dd>$result = ksort($person_info);</dd>
	<dd>echo $result.'< br>';</dd>
	<dd>echo implode(', ', $person_info).'< br>';</dd>
	<dd>&nbsp;</dd>
	<dd>$result = asort($person_info);</dd>
	<dd>echo $result.'< br>';</dd>
	<dd>echo implode(', ', $person_info).'< br>';</dd>
</dl>
출력값 : <br>
<span class="answer">
<?php
	$person_info = array('name'=>'Calvin', 'age'=>34, 'sex'=>'male');
	
	$result = ksort ($person_info);
	echo $result.'<br>';
	echo implode(', ', $person_info).'<br>';
	
	$result = asort ($person_info);
	echo $result.'<br>';
	echo implode(', ', $person_info).'<br>';
?>
</span>


<h2>8. 5! = 5*4*3*2*1 = 120 입니다. 이러한 팩토리얼 함수를 구현해 보세요. 함수의 인자로 5가 오면 반환값은 120이 되어야 하는 식입니다.</h2>
<span class="description">$number에 5을 넣었을 때</span>
<dl class="php_box_1">
	<dt><b>조건</b></dt>
	<dd>function factorial($number)</dd>
</dl>

<?php
	function factorial($number) {
		$result = 1;
		
		while(true){
			if ($number !== 0) {
				$result *= $number;
				$number -= 1;
			} else {
				break;
			}
        }
		return $result;
	}
?>
<dl class="answer_box_1">
	<dt><b>문제 풀이 1 : while 문 사용</b></dt>
	<dd>function factorial($number) {</dd>
	<dd>$result = 1;</dd>
	<dd>&nbsp;</dd>
	<dd>while(true){</dd>
	<dd>if ($number !== 0) {</dd>
	<dd>$result *= $number;</dd>
	<dd>$number -= 1;</dd>
	<dd>} else {</dd>
	<dd>break;</dd>
	<dd>}</dd>
	<dd>return $result;</dd>
	<dd>}</dd>
	<dd>echo factorial (5);</dd>
	<dd>&nbsp;</dd>
	<dd>출력값 : <span class="answer"><?php echo factorial (5); ?></span></dd>
</dl>

<?php
	function factorial2($number) {
		$result = 1;
		
		for($i = 1; $i <= $number; $i += 1){
			$result *= $i;
        }
		return $result;
	}
?>
<dl class="answer_box_1">
	<dt><b>문제 풀이 2 : for 문 사용</b></dt>
	<dd>function factorial2($number) {</dd>
	<dd>$result = 1;</dd>
	<dd>&nbsp;</dd>
	<dd>for($i = 1; $i <= $number; $i += 1){</dd>
	<dd>$result *= $i;</dd>
	<dd>}</dd>
	<dd>return $result;</dd>
	<dd>}</dd>
	<dd>echo factorial2 (5);</dd>
	<dd>&nbsp;</dd>
	<dd>출력값 : <span class="answer"><?php echo factorial2 (5); ?></span></dd>
</dl>



<h2>9. 정수 또는 float이 들어있는 어레이를 인자로 받아서 값들의 평균을 반환하는 함수를 구현해 보세요.</h2>
<span class="description">average(array(1,2,3))은 2를 반환하는 식입니다.</span>
<dl class="php_box_1">
	<dt><b>조건</b></dt>
	<dd>function average($numbers)</dd>
</dl>
<?php
	function average($numbers) {
		$result = 0;
		$length = count($numbers);
		
		for($i = 0; $i < $length; $i += 1){
			$result += $numbers[$i];
		}
		$result /= $length;
		return $result;
	}
?>

<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd>function average($numbers) {</dd>
	<dd>$result = 0;</dd>
	<dd>$length = count($numbers);</dd>
	<dd>for($i = 0; $i < $length; $i += 1){</dd>
	<dd>$result += $numbers[$i];</dd>
	<dd>}</dd>
	<dd>$result /= $length;</dd>
	<dd>return $result;</dd>
	<dd>}</dd>
	<dd>&nbsp;</dd>
	<dd>echo average(array(1, 2, 3));</dd>
	<dd>&nbsp;</dd>
	<dd>출력값 : <span class="answer"><?php echo average(array(1, 2, 3)); ?></span></dd>
</dl>


<h2>10. 1에서 100까지의 정수들 중에서 3으로 나눈 나머지가 1인 정수들만의 총합을 브라우저에 출력하는 코드를 작성해 보세요.</h2>
<span class="description">즉 1+4+7+...100 을 구하면 됩니다.</span>
<?php
	$total = 0;
	for ($i = 0; $i <= 100; $i += 1) {
		
		if ($i % 3 === 1) {
			$total += $i;
		}
	}
?>
<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd>$total = 0;</dd>
	<dd>for ($i = 0; $i <= 100; $i += 1) {</dd>
	<dd>if ($i % 3 === 1) {</dd>
	<dd>$total += $i;</dd>
	<dd>}</dd>
	<dd>}</dd>
	<dd>&nbsp;</dd>
	<dd>출력값 : <span class="answer"><?php echo $total; ?></span></dd>
</dl>








</div>
</div>
</div>
</body>
</html>