<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<title>JQuery UI Sortable 뽀대나는 버전</title>
<link rel="stylesheet" href="jquery/themes/base/jquery-ui.css" />
<style>
.wrap{width:100%;padding-top:100px;}
.content{margin:0 auto;width:1000px;}
ul li {line-height:1.5em;}
ul li b {color:#2C00B2;}
hr {margin:50px 0;width:1000px;border-top:1px dotted black;border-bottom:none;}
h3{background:url(images/bullet_red_32.png) left center no-repeat;padding-left:35px;}

table {margin:0 auto;width:1000px;border:1px solid #000;border-collapse:collapse;}
td, th {border:1px solid #000;padding:10px;text-align:center;}

</style>
</head>

<?php
	// 정수타입
	$value1_1 = 0;
	$value1_2 = 1;
	
	// float 타입
	$value2_1 = 0.0;
	$value2_2 = 1.9;
	
	// 문자열 타입
	$value3_1 = '';
	$value3_2 = '0';
	$value3_3 = '0.0';
	$value3_4 = '1.9';
	
	// 논리타입
	$value4_1 = true;
	$value4_2 = false;
	
	// 어레이
	$value5_1 = array();
	$value5_2 = array('a');
	
	// ?
	$value6_1 = null;

	// intval()
	//$intval1_1 = intval($value1_1);
	$intval1_2 = intval($value2_2);
	$intval1_3 = intval($value3_4);
	$intval1_4 = intval($value4_1);
	$intval1_5 = intval($value5_2);
	$intval1_6 = intval($value6_1);
	
	// floatval()
	$floatval_1 = floatval($value1_1);
	//$floatval_2 = floatval($value2_1);
	$floatval_3 = floatval($value3_1);
	$floatval_4 = floatval($value4_1);
	$floatval_5 = floatval($value5_2);
	$floatval_6 = floatval($value6_1);
	
	// strval()
	$strval1_1 = strval($value1_1);
	$strval1_2 = strval($value2_2);
	//$strval1_3 = strval($value3_1);
	$strval1_4 = strval($value4_2);
	//$strval1_5 = strval($value5_2);
	$strval1_6 = strval($value6_1);
	
	// boolval()
	$boolval1_1 = boolval($value1_2);
	$boolval1_2 = boolval($value2_1);
	$boolval1_3 = boolval($value3_3);
	//$boolval1_4 = boolval($value4_1);
	$boolval1_5 = boolval($value5_2);
	$boolval1_6 = boolval($value6_1);
	
?>
<body>
<div class="wrap">
<div class="content">
<h3>타입 전환 테이블</h3>
<table cellpadding="0" cellspacing="0">
	<tr style="background:#000;color:#fff;">
		<th>&nbsp;</th>
		<th>정수타입</th>
		<th>float 타입</th>
		<th>문자열타입</th>
		<th>논리타입</th>
		<th>어레이</th>
		<th>?</th>
	</tr>
	<tr style="background:#efefef;">
		<td>예시 값</td>
		<td>0, 1</td>
		<td>0.0, 1.9</td>
		<td>'', '0', '0.0', '1.9'</td>
		<td> true, false</td>
		<td>[], ['a']</td>
		<td>null</td>
	</tr>
	<tr>
		<td>1 : 정수타입</td>
		<td>N/A</td>
		<td><?php var_dump($intval1_2) ?></td>
		<td><?php var_dump($intval1_3) ?></td>
		<td><?php var_dump($intval1_4) ?></td>
		<td><?php var_dump($intval1_5) ?></td>
		<td><?php var_dump($intval1_6) ?></td>
	</tr>
	<tr>
		<td>2 : float 타입</td>
		<td><?php var_dump($floatval_1) ?></td>
		<td>N/A</td>
		<td><?php var_dump($floatval_3) ?></td>
		<td><?php var_dump($floatval_4) ?></td>
		<td><?php var_dump($floatval_5) ?></td>
		<td><?php var_dump($floatval_6) ?></td>
	</tr>
	<tr>
		<td>3 : 문자열타입</td>
		<td><?php var_dump($strval1_1) ?></td>
		<td><?php var_dump($strval1_2) ?></td>
		<td>N/A</td>
		<td><?php var_dump($strval1_4) ?></td>
		<td>&nbsp;</td>
		<td><?php var_dump($strval1_6) ?></td>
	</tr>
	<tr>
		<td>4 : 논리타입</td>
		<td><?php var_dump($boolval1_1) ?></td>
		<td><?php var_dump($boolval1_2) ?></td>
		<td><?php var_dump($boolval1_3) ?></td>
		<td>N/A</td>
		<td><?php var_dump($boolval1_5) ?></td>
		<td><?php var_dump($boolval1_6) ?></td>
	</tr>
</table>
<hr>
<h3>내림, 올림, 반올림</h3>
<ul>
	<li><b>floor (내림)</b> 숫자 1.6을 입력했을 때 : <?php echo floor(1.6); ?></li>
	<li><b>ceil (올림)</b> 숫자 1.2을 입력했을 때 : <?php echo ceil(1.2); ?></li>
	<li><b>round (반올림)</b> 숫자 1.3을 입력했을 때 : <?php echo ceil(1.3); ?></li>
</ul>
<hr>

</div>
</div>
</html>