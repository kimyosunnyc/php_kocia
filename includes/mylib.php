<?php

	/* DB 열기 */
	function db_connect() {

		$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
		$username = 'kimyosunny';
		$password = 'password';
		$dbname = 'kimyosunny';
		$conn = mysqli_connect($hostname, $username, $password, $dbname);
		mysqli_query($conn, "SET NAMES 'utf8'");
		if (!$conn) {
			die('Mysql connection failed: '.mysqli_connect_error());
		}
		return $conn;
	}
	
	/* 게시물 시간 -> 한국시간으로 변경 */
	function convert_time_string($time_string_from_db ) {
		$datetime = date_create($time_string_from_db , timezone_open('UTC'));
		$datetime = date_timezone_set($datetime, timezone_open('Asia/Seoul'));
		return date_format($datetime, 'Y-m-d H:i:s');
	}
	
?>
