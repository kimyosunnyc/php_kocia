<?php

class Product {

	public function __construct ($name, $price) {
		$this->name = $name;
		$this->price = $price;
		$this->salesBoost = 0;
	}
	
	public function get_product_class() {
		
		if ($this->price < 5000) {
			return '저급';
		} else {
			return '고급';
		}
	}
	
	public function getSalesBoost () {
		return $this->salesBoost;		
	}
}

$product1 = new Product ('비누A', 4000);
$product2 = new Product ('비누B', 8000);
$product3 = new Product ('비누C', 12000);

$products_arr = array ($product1, $product2, $product3);

// 최근 인기 급상승 상품 순서로 정렬하기 위해 테스트 정의
$product1->salesBoost = 5;
$product2->salesBoost = 7;
$product3->salesBoost = 3;


// 최근 인기 급상승 순서로 정렬하기
function compare_products ($product1, $product2) { // 제품의 가격 비교하기
	
	$best = $product1->getSalesBoost() - $product2->getSalesBoost();
	if ($best > 0) {
		return -1;
	} else if ($best = 0) {
		return 0;
	} else {
		return 1;
	}
}

function sort_salesBoost ($products_arr) {
	usort ($products_arr, 'compare_products');
	return $products_arr;
}
echo '최근 인기 급상승 순서로 정렬하기';
var_dump(sort_salesBoost($products_arr));
echo '<br><br>';


// 어레이를 한눈에 볼 수 있게 출력하는 함수 만들기
function print_product_array ($products_arr) {
	
	$product_arr_len = count($products_arr);
	$line_arr = array();
	$print_arr = array();
	
	for ($i = 0; $i < $product_arr_len; $i += 1) {
		$product_name = $products_arr[$i]->name;
		$product_price = $products_arr[$i]->price;
		$product_sales_boost = $products_arr[$i]->salesBoost;
		$print_arr [] = strval($i+1).'. 제품명 : '.$product_name.', 가격 : '.$product_price.', 인기순서 : '.$product_sales_boost;
	}

	return implode('<br>',$print_arr);
}
echo '어레이를 한눈에 볼 수 있게 출력하는 함수 만들기<br>';
echo print_product_array (sort_salesBoost($products_arr));
echo '<br><br>';



// 제품의 이름 어레이 가져오기
function get_name_arr ($products_arr) {
	
	$product_name_arr = array();
	foreach ($products_arr as $product) {
		$product_name = $product->name;
		$product_name_arr[] = $product_name;
	}
	return $product_name_arr;
}
echo '제품의 이름 어레이 가져오기<br>';
var_dump(get_name_arr($products_arr));
echo '<br><br>';


// 제품의 정보를 key => value 로 어레이 만들기
function get_product_items_arr ($products_arr) {
	
	$product_items_arr = array();
	foreach ($products_arr as $product) {
		$product_name = $product->name;
		$product_price = $product->price;

		$product_items_arr[$product_name] = $product_price;
	}
	return $product_items_arr;
}
echo '제품의 정보를 key => value 로 어레이 만들기<br>';
var_dump(get_product_items_arr($products_arr));
echo '<br><br>';


// 제품의 정보를 가져와 나열하기
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
echo '제품의 정보를 가져와 나열하기<br>';
echo print_product_info($products_arr).'<br><br>';


// 제품 어레이의 제품 가격 총합 구하기
function sum_of_product_price ($products_arr) {
	
	$sum = 0;
	foreach ($products_arr as $product) {
		$product_price = $product->price;
		$sum += $product_price;
	}
	return $sum;
}

echo sum_of_product_price($products_arr).'<br><br>';


// 새로운 class를 만들어서 함수에 적용해도 똑같이 값을 구할 수 있다.
class Car {
	public function __construct ($name, $price) {
		$this->name = $name;
		$this->price = $price;
	}
}

$car1 = new Car ('소나타', 1000);
$car2 = new Car ('그랜저', 1500);

$cars_arr = array($car1, $car2);

// 자동차 어레이의 제품 가격 총합 구하기
function sum_of_car_price ($cars_arr) {
	
	$sum = 0;
	foreach ($cars_arr as $car) {
		$car_price = $car->price;
		$sum += $car_price;
	}
	return $sum;
}
echo '자동차 어레이의 제품 가격 총합 구하기<br>';
echo sum_of_car_price($cars_arr);


















	
	
?>