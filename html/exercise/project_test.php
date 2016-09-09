<?php

	echo '<div style="width:100%;"><div style="width:80%;margin:0 auto;padding:30px;">';
	
	
	echo '<h3>01. 워드프레스 쿠폰 어레이 연습</h3>';
	$array = array('vip', 'new');
	$output = '';

	foreach ($array as $coupon_code) {
		$output = $output.$coupon_code.' : '.'1000';
	}
	echo $output;

	
	echo '<h3>02. 어레이 - 문자열로 만들기 연습</h3>';
	$array_group = array(array('카테고리','지성','건성'), array('타입','심플','복잡'));

	$output = '';
	$outputs = array();
	foreach ($array_group as $taxonomy_and_terms){
		$taxonomy = $taxonomy_and_terms[0];
		$terms_array = array_slice($taxonomy_and_terms, 1);
		$terms_string = implode(', ', $terms_array);
		$taxonomy_and_terms_string = $taxonomy.': '.$terms_string;
		$outputs[] = $taxonomy_and_terms_string;
	}
	$output = implode ('. ', $outputs);
	echo $output;

	
	echo '<h3>03. 문자열 - 어레이로 만들기 연습</h3>';
	$string = '카테고리: 지성, 건성. 타입: 심플, 복잡';
	
	$array_group = explode('. ', $string); // array(array('카테고리: 지성, 건성'), array('타입: 심플, 복잡'));
	$array_group2 = str_replace(': ', ', ', $array_group); // array('카테고리, 지성, 건성');

	$result = array();
	foreach ($array_group2 as $taxonomy_and_terms){
		$result[] = explode(', ', $taxonomy_and_terms);
	}
	print_r($result);
	
	
	echo '<h3>04. 함수를 활용한 어레이 > 문자열 만들기 연습</h3>';
	
	function print_taxonomy_terms_string ($array_group) {
		
		$output = '';
		$outputs = array();
		foreach ($array_group as $taxonomy_and_terms){
			$taxonomy = $taxonomy_and_terms[0];
			$terms_array = array_slice($taxonomy_and_terms, 1);
			$terms_string = implode(', ', $terms_array);
			$taxonomy_and_terms_string = $taxonomy.': '.$terms_string;
			$outputs[] = $taxonomy_and_terms_string;
		}
		$output = implode ('. ', $outputs);
		return $output;
	}
	
	$array_group = array(array('카테고리','지성','건성','복합성'), array('타입','심플','복잡'));
	$output_string = print_taxonomy_terms_string ($array_group);
	
	echo print_taxonomy_terms_string ($array_group);
	
	
	echo '<h3>05. 함수를 활용한 문자열 > 어레이 만들기 연습</h3>';

	$string = '카테고리: 지성, 건성. 타입: 심플, 복잡';
	function make_array_from_taxonomy_terms ($string) {
		
		$array_group = explode('. ', $string); // array(array('카테고리: 지성, 건성'), array('타입: 심플, 복잡'));
		$array_group2 = str_replace(': ', ', ', $array_group); // array('카테고리, 지성, 건성');

		$result = array();
		foreach ($array_group2 as $taxonomy_and_terms){
			$result[] = explode(', ', $taxonomy_and_terms);
		}
		return $result;
	}
	print_r(make_array_from_taxonomy_terms($string));
	echo '<br>';
	var_dump(make_array_from_taxonomy_terms ($output_string) == $array_group);
	
	
	echo '<h3>06. 함수를 활용한 문자열 > 어레이(키=>값) 만들기 연습</h3>';
	
	function get_array_from_taxonomy_terms () {
		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	echo '</div></div>';
?>