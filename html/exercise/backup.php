<?php


// 제품명 길이 제한 (단어)
// Automatically shortens WooCommerce product titles on the main shop, category, and tag pages 
// to a specific number of words
function short_woocommerce_product_titles_words( $title, $id ) {
  if ( ( is_shop() || is_product_tag() || is_product_category() ) && get_post_type( $id ) === 'product' ) {
    $title_words = title_tokenize($title, " _");
    if ( count($title_words) > 4 ) { // Kicks in if the product title is longer than 5 words
      // Shortens the title to 2 words and adds ellipsis at the end
      return implode(" ", array_slice($title_words, 0, 4)) . '...';
    } else {
      return $title; // If the title isn't longer than 5 words, it will be returned in its full length without the ellipsis
    }
  } else {
    return $title;
  }
}
add_filter( 'the_title', 'short_woocommerce_product_titles_words', 10, 5 );


//$title = '가/방 신발  구두 모자__바지_ /티셔츠';
//$tokens = ' _/';
function title_tokenize ($title, $tokens){
	$token = strtok ($title, $tokens);
	$result[] = $token;
	while ($token !== false) {
		$token = strtok ($tokens);
		$result[] = $token;
	}
	return $result;
}

//$result = title_tokenize($title, $tokens);
//echo implode (',', $result);

?>