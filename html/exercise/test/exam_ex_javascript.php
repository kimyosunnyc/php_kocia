<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<title>학원시험 예상문제 - Javascript</title>
<link rel="stylesheet" href="css/style_2.css" />
</head>

<body>
<div class="wrap">
<h1>학원시험 예상문제 - Javascript</h1>
<div class="content">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>

<div class="tab">
	<ul>
		<li><a href="exam_ex_php.php">PHP</a></li>
		<li><a href="exam_ex_javascript.php">Javascript</a></li>
		<li class="tab_btn"><a href="exam_ex_mysql.php">MySQL</a></li>
	</ul>
</div>

<h2>1. ['애플', '삼성', 'LG']를 '애플과 삼성과 LG'로 만들고 싶습니다. 어떻게 해야 할까요? 그 반대의 과정은 어떻게 해야 할까요?</h2>
<script>
var word = '애플과 삼성과 LG';
var charArray = word.split('과 '); // PHP의 explode와 같은 기능 / 인자에는 구분자를 넣는다.

var newWord = ['애플', '삼성', 'LG'].join('과 '); // PHP의 implode와 같은 기능 / 인자에는 접착제를 넣는다.
</script>

<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd>< script></dd>
	<dd>var word = '애플과 삼성과 LG';</dd>
	<dd>var charArray = word.split('과 '); // PHP의 explode와 같은 기능 / 인자에는 구분자를 넣는다.</dd>
	<dd>&nbsp;</dd>
	<dd>var newWord = ['애플', '삼성', 'LG'].join('과 '); // PHP의 implode와 같은 기능 / 인자에는 접착제를 넣는다.</dd>
	<dd>< / script></dd>
	<dd>&nbsp;</dd>
	<dd>문자열에서 어레이로 변환 결과 : < button onclick = "alert('charArray is : ' + charArray);">문자열 -> 어레이결과< / button></dd>
	<dd>어레이에서 문자열로 변환 결과 : < button onclick="alert('newWord is : ' + newWord);">어레이 -> 문자열 결과< / button></dd>
	<dd>&nbsp;</dd>
	<dd><hr></dd>
	<dd>&nbsp;</dd>
	<dd>문자열에서 어레이로 변환 결과 : <button onclick = "alert('charArray is : ' + charArray);">문자열 -> 어레이결과</button> | 어레이에서 문자열로 변환 결과 : <button onclick="alert('newWord is : ' + newWord);">어레이 -> 문자열 결과</button></dd>
</dl>


<h2>2. 현재의 HTML 문서에서 id 가 'user_password'인 요소를 가져오는 자바스크립트 코드를 써 보세요. 또한, 클래스가 'my_class'인 모든 요소들의 어레이를 가져오는 코드도 써 보세요.</h2>
<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd>HTML 문서에서 id가 'user_password'인 요소를 가져오는 자바스크립트 코드 : <span class="answer">document.getElementById('user_password').innerHTML</span></dd>
	<dd>클래스가 'my_class'인 모든 요소들의 어레이를 가져오는 코드 : <span class="answer">document.getElementsByClassName('my_class')</span></dd>
	<dd>&nbsp;</dd>
</dl>


<h2>3. 다음의 자바스크립트가 모두 실행되고 난 후, 4번의 alert 창에서 각각 어떤 값이 보여지는지 쓰세요.</h2>
<dl class="php_box_1">
	<dt><b>조건</b></dt>
	<dd>< script></dd>
	<dd>var a = 1;</dd>
	<dd>var b = 2;</dd>
	<dd>&nbsp;</dd>
	<dd>function myFunc() {</dd>
	<dd>a = 5;</dd>
	<dd>var b = 5;</dd>
	<dd>var c = 5;</dd>
	<dd>d = 5;</dd>
	<dd>}</dd>
	<dd>&nbsp;</dd>
	<dd>myFunc();</dd>
	<dd>alert(a);</dd>
	<dd>alert(b);</dd>
	<dd>alert(c);</dd>
	<dd>alert(d);</dd>
	<dd>< / script></dd>
</dl>
<script>
	var a = 1;
	var b = 2;
	
	function myFunc() {
		a = 5;
		var b = 5;
		var c = 5;
		d = 5;
	}

	myFunc();
	alert(c);

</script>
<dl class="answer_box_1">
	<dt><b>출력값</b></dt>
	<dd>alert(a); - <span class="answer">5</span></dd>
	<dd>alert(b); - <span class="answer">2</span></dd>
	<dd>alert(c); - <span class="answer">오류</span></dd>
	<dd>alert(d); - <span class="answer">5</span></dd>
</dl>







</div>
</div>
</body>
</html>