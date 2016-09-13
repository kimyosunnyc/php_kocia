<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<title>학원시험 예상문제 - MySQL</title>
<link rel="stylesheet" href="css/style_2.css" />
</head>

<body>
<div class="wrap">
<h1>학원시험 예상문제 - MySQL</h1>
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

<h2>1. MySQL에는 다음과 같은 요소들이 있습니다. 이것들을 범위가 넓은 것부터 순서대로 정리해서 쓰세요.</h2>
<dl class="php_box_1">
	<dt><b>조건</b></dt>
	<dd>- 컬럼</dd>
	<dd>- 인스턴스</dd>
	<dd>- 테이블</dd>
	<dd>- 스키마</dd>
</dl>
<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd>정답 : <span class="answer">스키마 > 테이블 > 컬럼 > 인스턴스</span></dd>
</dl>


<h2>2. MySQL에서 스키마(schema)의 동의어는 다음 중 무엇인지 쓰세요.</h2>
<dl class="php_box_1">
	<dt><b>조건</b></dt>
	<dd>- 인스턴스 (instance)</dd>
	<dd>- 데이터베이스 (database)</dd>
	<dd>- 유저</dd>
	<dd>- 테이블</dd>
</dl>
<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd>정답 : <span class="answer">데이터베이스 (database)</span></dd>
</dl>


<h2>3. 초등학교에서 이름이 student 인 테이블을 사용하고 있다고 합시다. 이 테이블에는 다음과 같은 컬럼들이 있습니다. 나이가 12세 이상(12세 포함)인 모든 학생들의 이름을 이름 순서대로 오름차순 정렬해서 가져오는 Select 문을 작성해 보세요.</h2>
<dl class="php_box_1">
	<dt><b>조건</b></dt>
	<dd>- student_id (INT, PK)</dd>
	<dd>- age (INT) 나이</dd>
	<dd>- height (INT) 신장</dd>
	<dd>- full_name (varchar(20)) 이름</dd>
</dl>
<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd><span class="answer">SELECT student_id, full_name FROM student WHERE age >= 12 ORDER BY ASC</span></dd>
</dl>


<h2>4. 성이 김씨인 학생들의 평균 나이를 출력하는 Select 문을 작성해 보세요.</h2>
<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd><span class="answer">SELECT sum(age)/count(student_id) FROM student WHERE full_name LIKE '김%'</span></dd>
</dl>


<h2>5. 학생들을 나이별로 묶어서, 나이별로 몇 명의 학생들이 있는지 출력하는 Select 문을 작성해 보세요.</h2>
<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd><span class="answer">SELECT count(student_id) FROM student GROUP BY age</span></dd>
</dl>


<h2>6. 신장이 제일 큰 10명의 학생들의 이름과 신장을 출력하는 Select 문을 작성해 보세요.</h2>
<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd><span class="answer">SELECT full_name, height FROM student WHERE </span></dd>
</dl>


<h2>7. 위의 student 테이블을 잘 사용하고 있던 학교에서, 학생들의 정신건강을 위해서 심리치료사를 배치하기로 하였습니다. 모든 학생마다 1명씩 심리치료사가 배정되도록 규칙을 정했습니다. 그래서 therapist 테이블을 만들고, 이미 존재하던 student 테이블과 외래 키 (foreign key)로 연관관계를 규정하게 되었습니다. 이 때 어떤 테이블에 외래 키를 추가해야 하는지를 쓰세요. 또한, 외래 키를 추가하는 과정에서 SQL 오류가 일어났다면, 어떤 이유에서인지 설명하세요.</h2>
<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd><span class="answer">테이블 : therapist</span></dd>
	<dd><span class="answer">이유 : 연관관계를 규정하려는 student 테이블의 PK에 해당하는 column(ex. student_id) 이 therapist 테이블에는 존재하지 않으므로</span></dd>
</dl>


<h2>8. 위의 therapist 테이블에도 full_name (varchar(20) 컬럼이 있다고 합니다. Select와 Join 쿼리를 사용해서 모든 학생의 명단을 출력하되, 학생이름-나이-담당 심리치료사 이름 순서로 출력하세요.</h2>
<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd><span class="answer">SELECT  </span></dd>
</dl>


<h2>9. 심리치료사 1명이 급사하여, 해당 심리치료사에 배정되어 있던 학생들은 어쩔 수 없이 담당 심리치료사를 null 값으로 변경하였습니다. 이 때, 위의 5번 쿼리문을 그대로 사용하면 담당 심리치료사가 죽은 학생들은 결과에 포함될까요? 만약 포함되지 않는다면, 포함시키기 위해서는 어떻게 해야 할까요? 포함시키고 나면 죽은 담당 심리치료사 이름 칸에는 어떤 값이 출력되나요?</h2>
<dl class="answer_box_1">
	<dt><b>문제 풀이</b></dt>
	<dd><span class="answer">&nbsp;</span></dd>
</dl>



</div>
</div>
</body>
</html>