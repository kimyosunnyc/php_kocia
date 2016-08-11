<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<title>타입 전환 테이블</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
<table cellpadding="0" cellspacing="0" class="tb01">
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
		<td><span class="pcolor1">N/A</span></td>
		<td>
			<ul>
				<li><?php var_dump(intval(0.0)); ?></li>
				<li><?php var_dump(intval(1.9)); ?></li>
			</ul>
		</td>
		<td>
			<ul>
				<li><?php var_dump(intval('')); ?></li>
				<li><?php var_dump(intval('0')); ?></li>
				<li><?php var_dump(intval('0.0')); ?></li>
				<li><?php var_dump(intval('1.9')); ?></li>
			</ul>
		</td>
		<td>
			<ul>
				<li><?php var_dump(intval(true)); ?></li>
				<li><?php var_dump(intval(false)); ?></li>
			</ul>
		</td>
		<td>
			<ul>
				<li><?php var_dump(intval(array())); ?></li>
				<li><?php var_dump(intval(array('a'))); ?></li>
			</ul>
		</td>
		<td>
			<ul>
				<li><?php var_dump(intval(null)); ?></li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>2 : float 타입</td>
		<td>
			<ul>
				<li><?php var_dump(floatval(0)); ?></li>
				<li><?php var_dump(floatval(1)); ?></li>
			</ul>
		</td>
		<td><span class="pcolor1">N/A</span></td>
		<td>
			<ul>
				<li><?php var_dump(floatval('')); ?></li>
				<li><?php var_dump(floatval('0')); ?></li>
				<li><?php var_dump(floatval('0.0')); ?></li>
				<li><?php var_dump(floatval('1.9')); ?></li>
			</ul>
		</td>
		<td>
			<ul>
				<li><?php var_dump(floatval(true)); ?></li>
				<li><?php var_dump(floatval(false)); ?></li>
			</ul>
		</td>
		<td>
			<ul>
				<li><?php var_dump(floatval(array())); ?></li>
				<li><?php var_dump(floatval(array('a'))); ?></li>
			</ul>
		</td>
		<td>
			<ul>
				<li><?php var_dump(floatval(null)); ?></li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>3 : 문자열타입</td>
		<td>
			<ul>
				<li><?php var_dump(strval(0)); ?></li>
				<li><?php var_dump(strval(1)); ?></li>
			</ul>
		</td>
		<td>
			<ul>
				<li><?php var_dump(strval(0.0)); ?></li>
				<li><?php var_dump(strval(1.9)); ?></li>
			</ul>
		</td>
		<td><span class="pcolor1">N/A</span></td>
		<td>
			<ul>
				<li><?php var_dump(strval(true)); ?></li>
				<li><?php var_dump(strval(false)); ?></li>
			</ul>
		</td>
		<td>
			<ul>
				<li><span style="text-decoration:line-through;">array()</span><?php //var_dump(strval(array())); ?></li>
				<li><span style="text-decoration:line-through;">array('a')</span><?php //var_dump(strval(array('a'))); ?></li>
			</ul>
		</td>
		<td>
			<ul>
				<li><?php var_dump(strval(null)); ?></li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>4 : 논리타입</td>
		<td>
			<ul>
				<li><?php var_dump(boolval(0)); ?></li>
				<li><?php var_dump(boolval(1)); ?></li>
			</ul>
		</td>
		<td>
			<ul>
				<li><?php var_dump(boolval(0.0)); ?></li>
				<li><?php var_dump(boolval(1.9)); ?></li>
			</ul>
		</td>
		<td>
			<ul>
				<li><?php var_dump(boolval('')); ?></li>
				<li><?php var_dump(boolval('0')); ?></li>
				<li><?php var_dump(boolval('0.0')); ?></li>
				<li><?php var_dump(boolval('1.9')); ?></li>
			</ul>
		</td>
		<td><span class="pcolor1">N/A</span></td>
		<td>
			<ul>
				<li><?php var_dump(boolval(array())); ?></li>
				<li><?php var_dump(boolval(array('a'))); ?></li>
			</ul>
		</td>
		<td>
			<ul>
				<li><?php var_dump(boolval(null)); ?></li>
			</ul>
		</td>
	</tr>
</table>

</body>
</html>


