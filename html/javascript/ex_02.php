<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<script>
	var global = 'global'; // ����
	function mayFunction() {
		var local = 'local'; // ����
		local = 'new local'; // ��� 1
		global = 'new global'; // ��� 1
		mistake = 'value'; // �����ε� var�� ����
		function myFunction2() {
			var local2 = 'local2'; // ����
			var local3 = local; // ����� ��� 2
			global = 'new value'; // ���
		}
	}
</script>
</head>
<body>
<?php
	// ���� �ڹٽ�ũ��Ʈ �ڵ�� ���ϸ鼭 ��������
	$global = 'global';
	function = my_function() {
		$local = 'local';
		$local = 'new local';
		$global = 'new global'; // ���������ΰ�, ���������ΰ�?
	}
?>