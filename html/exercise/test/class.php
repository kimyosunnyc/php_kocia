<?php

class Product {

	public function __construct ($name, $price) {
		$this->name = $name;
		$this->price = $price;
	}
	
	public function get_product_class() {
		
		if ($this->price < 5000) {
			return '저급';
		} else {
			return '고급';
		}
	}
}

$product1 = new Product ('비누A', 4000);
$product2 = new Product ('비누B', 8000);
$product3 = new Product ('비누C', 12000);

$products_arr = array ($product1, $product2, $product3);


function get_name_arr ($products_arr) {
	
	$product_name_arr = array();
	foreach ($products_arr as $product) {
		$product_name = $product->name;
		$product_name_arr[] = $product_name;
	}
	return $product_name_arr;
}

var_dump(get_name_arr($products_arr));
echo '<br>';


function print_product_info ($products_arr) {
	
	$result = array();
	foreach ($products_arr as $product) {
		$product_name = $product->name;
		$product_price = $product->price;
		
		$product_info = '이름:'.$product_name.', '.'가격:'.$product_price;
		$result[] = $product_info;
	}
	return implode('<br>',$result);
}

echo print_product_info($products_arr);
//$product = new Product ('비누', 5000);
//echo $product->name;
//echo $product->price;

	
	
?>