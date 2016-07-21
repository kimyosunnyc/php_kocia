<?php		
	function get_mysql_conn(){
		$hostname='kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
		$username='SeokMin';
		$password='password';
		$dbname='calvin';
		
		$conn=mysqli_connect($hostname, $username, $password, $dbname);
		mysqli_query($conn, "SET NAMES 'utf8'");
		if (!($conn)) {
			die('Mysql connection failed: '.mysqli_connect_error());
		} 
		return $conn;
	}
	
	// 단어 뭉치에서 상위 $num개 만큼 잘라줌.
	function word_slice($words, $num){
		$selected = array();
		foreach($words as $word => $rank){
			$selected[] = $word;
		}
		$selected = array_slice($selected, 0, $num);
		return $selected;
	}
	
	// 파일에서 단어 가져오기.
	function get_words($input){		
		$file_name = './data/100k_combined.txt';
		$file_handle = fopen($file_name, 'r');
		if (!$file_handle) {
			die('file could not be opened!');
		}
		
		$words = array();
		while(($line = fgets($file_handle)) !== false){
			
			$wordAndRank = explode("\t", $line);
		
			if (count($wordAndRank) === 2) {
				if(strpos($wordAndRank[0], $input) !== false){
					$words[$wordAndRank[0]] = intval($wordAndRank[1]);
				}
			} else if(count($wordAndRank) === 1){
				if(strpos($wordAndRank[0], $input) !== false){
					$words[$wordAndRank[0]] = 9999;
				}
			} else{ // error
				die('count was'.count($wordAndRank).' Error occured!');
			}	
		}
		fclose($file_handle);
		
		asort($words);
		$selected = word_slice($words, 20);
			
//	$words = get_words($input);
/*
	$selected = array();
	foreach($words as $word => $rank){
		if(strpos($word, $input) !== false ){
			$selected[] = $word;
		}
	}
	$selected = implode(" ", array_slice($selected, 0, 20);
	$selected = implode(" ", $selected);
	echo $selected;
*/	
//		return $words;		
		return $selected;
	}
	
	// 디비에서 단어 가져오기.
	function get_words_from_db($input){
	
		$conn = get_mysql_conn();
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

		mysqli_close($conn);
		mysqli_free_result($result);
		
		return $words;		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	