<?php

function db_connect() {

		$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
		$username = 'kimyosunny';
		$password = 'password';
		$dbname = 'calvin';
		$conn = mysqli_connect($hostname, $username, $password, $dbname);
		mysqli_query($conn, "SET NAMES 'utf8'");
		if (!$conn) {
			die('Mysql connection failed: '.mysqli_connect_error());
		}
		return $conn;
	}
	
function get_words_2($input) {
		$conn = db_connect();
		$input = "%$input%";
	
		$stmt = mysqli_prepare($conn, " SELECT word, 
											   CASE WHEN rank is null THEN 9999 ELSE rank END as rank
										FROM dictionary2
										WHERE word LIKE ?
										ORDER BY rank
										LIMIT 20;");
		mysqli_stmt_bind_param($stmt, "s", $input);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		
		$i=0;
		$words = array();
		$wordAndRank = array();
		while($wordAndRank = mysqli_fetch_assoc($result)){
			$words[$i++] = $wordAndRank['word'];
		}
		
		mysqli_free_result($result);
		mysqli_close($conn);
		return $words;
	}
	
?>