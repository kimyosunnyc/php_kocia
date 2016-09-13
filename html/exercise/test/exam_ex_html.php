<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<title>학원시험 예상문제 - HTML</title>
<link rel="stylesheet" href="css/style_2.css" />
</head>

<body>
<div class="wrap">
<h1>학원시험 예상문제 - HTML</h1>
<div class="content">
<div style="float:right;"><a href="../../index.php">홈으로</a></div>

<div class="tab">
	<ul>
		<li><a href="exam_ex_php.php">PHP</a></li>
		<li><a href="exam_ex_javascript.php">Javascript</a></li>
		<li><a href="exam_ex_mysql.php">MySQL</a></li>
		<li class="tab_btn"><a href="exam_ex_html.php">HTML</a></li>
	</ul>
</div>

<h2>1. 다음은 로그인 폼의 아이디와 비밀번호 입력을 위한 HTML 입니다. 제출 버튼을 클릭했을 때, 'login.php' 라는 파일에서 폼을 처리하고 싶고, POST 방식으로 HTTP Request 를 보내려고 합니다. 또한 PHP 파일에서 $_POST['user_id']와 $_POST['user_password']를 사용해서 유저가 폼에 입력한 아이디와 비밀번호를 가져오려고 합니다. HTML의 빈 칸을 알맞게 채워보세요.</h2>
<dl class="php_box_1">
	<dt><b>조건</b></dt>
	<dd>< form method = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" action = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></dd>
	<dd>아이디 : < input type = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" name = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"> < br></dd>
	<dd>비밀번호 : < input type = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" name = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></dd>
	<dd>< / form></dd>
</dl>
<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd>< form method = "<span class="answer">POST</span>" action = "<span class="answer">login.php</span>"></dd>
	<dd>아이디 : < input type = "<span class="answer">text</span>" name = "<span class="answer">user_id</span>"> < br></dd>
	<dd>비밀번호 : < input type = "<span class="answer">password</span>" name = "<span class="answer">user_password</span>"></dd>
	<dd>< / form></dd>
</dl>


<h2>2. div 태그를 이용해서, 텍스트를 테두리로 둘러싸고 싶습니다. 테두리의 두께는 5px로 하고, 테두리와 글자영역과의 거리를 10px로 하려고 합니다. 그런데 페이지 전체 구성을 고려해 보니, 테두리의 최외곽까지를 포함한 크기가 가로 200px리 되어야 합니다. (세로는 텍스트의 양에 따라서 자동으로 조절됩니다.) 이 조건에 맞게 표시되기 위해서, HTML의 빈 칸을 채워보세요.</h2>
<dl class="php_box_1">
	<dt><b>조건</b></dt>
	<dd>< div style="border:&nbsp;px solid; padding:&nbsp;px; width:&nbsp;px; margin:0 aurto;"></dd>
	<dd>내용 텍스트</dd>
	<dd>< / div></dd>
</dl>
<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd>< div style="border:<span class="answer">5</span>px solid; padding:<span class="answer">10</span>px; width:<span class="answer">200</span>px; margin:0 aurto;"></dd>
	<dd>내용 텍스트</dd>
	<dd>< / div></dd>
</dl>


<h2>3. 아래와 같은 HTML 구조가 있습니다. 각각의 CSS 실렉터들을 사용했을 때, A ~ H 중 정확히 어느 영역들이 선택되는지를 쓰세요. 물론 복수의 영역이 선택될 수 있습니다. 그러나, 하나의 영역의 내부에 포함되는 영역은 중복으로 적지 않아야 합니다. 예를 들어서, B가 선택되었다면 D나 F는 쓰지 마세요.</h2>
<dl class="php_box_1">
	<dt><b>조건</b></dt>
	<dd>< div class="container"> <b>A</b> </dd>
	<dd>&nbsp;&nbsp;&nbsp;< div class="widget" id="widget1"> <b>B</b> </dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;< div class="button"> <b>D</b> </dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;< span> <b>F</b> < / span></dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;< / div></dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;< div class="icon"> <b>E</b> </dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;< span> <b>G</b> < / span></dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;< / div></dd>
	<dd>&nbsp;&nbsp;&nbsp;< / div></dd>
	<dd>&nbsp;&nbsp;&nbsp;< div class="widget" id="widget2"> <b>C</b> </dd>
	<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;< span> <b>H</b> < / span></dd>
	<dd>&nbsp;&nbsp;&nbsp;< / div></dd>
	<dd>< / div></dd>
</dl>
<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd>1) div div : <span class="answer">B, C</span></dd>
	<dd>2) div div div : <span class="answer">D, E</span></dd>
	<dd>3) div span : <span class="answer">F, G, H</span></dd>
	<dd>4) #widget1 span : <span class="answer">F, G</span></dd>
	<dd>5) #widget1 > span : <span class="answer">F, G</span></dd>
	<dd>6) #widget2 > span : <span class="answer">H</span></dd>
	<dd>7) .button, .span : <span class="answer"></span></dd>
	<dd>8) div.widget span : <span class="answer">F, H</span></dd>
	<dd>9) div.widget div span : <span class="answer">F</span></dd>
</dl>


</div>
</div>
</body>
</html>