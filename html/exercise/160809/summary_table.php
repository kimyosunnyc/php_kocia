<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<title>JQuery UI Sortable 뽀대나는 버전</title>
<link rel="stylesheet" href="jquery/themes/base/jquery-ui.css" />
<style>
div{width:100%;padding-top:100px;}
table {margin:0 auto;width:800px;border:1px solid #000;border-collapse:collapse;}
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
	
	// boolval()
	
	// intval()
	
	// floatval()
	$floatval_1 = floatval($value1_1);
	// strval()
	
	
	
?>
<body>
<div>
<table cellpadding="0" cellspacing="0">
	<tr>
		<th>&nbsp;</th>
		<th>정수타입</th>
		<th>float 타입</th>
		<th>문자열타입</th>
		<th>논리타입</th>
		<th>어레이</th>
		<th>?</th>
	</tr>
	<tr>
		<td>예시 값</td>
		<td>0, 1</td>
		<td>0.0, 1.9</td>
		<td>'', '0', '0.0', '1.9'</td>
		<td> true, false</td>
		<td>[], ['a']</td>
		<td>null</td>
	</tr>
	<tr>
		<td>To : 정수타입</td>
		<td>N/A</td>
		<td><?php var_dump($floatval_1) ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>To : float 타입</td>
		<td>&nbsp;</td>
		<td>N/A</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>To : 문자열타입</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>N/A</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>To : 논리타입</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>N/A</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>
</div>
</html>