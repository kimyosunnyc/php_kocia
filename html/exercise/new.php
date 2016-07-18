<?php

// 제품명 길이 제한 함수 정의
function shorten_title($title, $length, $charset = NULL) {     
	if ($charset == NULL) {
        $charset = 'UTF-8';
	}	//정확한 문자열의 길이를 계산하기 위해, mb_strlen 함수를 이용
	$str_len = mb_strlen($title, 'UTF-8'); 
	if ($str_len > $length) {	// mb_substr  PHP 4.0 이상, iconv_substr PHP 5.0 이상
        $title = mb_substr($title, 0, $length, 'UTF-8');   
        $title.= "...";
	}         
	return $title;             
}
// $title = '동해물과 백두산이 마르고 닳도록 하느님이 보우하사 우리 나라 만세 무궁화 삼천리 화려강산';
// echo shorten_title ($title, 10);


// Automatically shortens WooCommerce product titles on the main shop, category, and tag pages 
// to a specific number of words
function short_woocommerce_product_titles_words( $title, $id ) {
	
	$max_length = 26; // 최대 출력 글자수 지정
	if ( ( is_shop() || is_product() || is_product_tag() || is_product_category() ) && get_post_type( $id ) === 'product' ) {
		
		return shorten_title ($title, $max_length);
		
	} else {
		return $title; // 아니면 원래 title 을 출력해라.
	}
}
add_filter( 'the_title', 'short_woocommerce_product_titles_words', 10, 2 );

?>