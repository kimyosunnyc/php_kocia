<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>
<?php
	$regex = '/\D/';
	$text = 'a13-678';
	echo '<span style="color:blue;">Q1. a13-678 에서 숫자만 남기자.</span><br>';
	echo htmlspecialchars('A1. '.preg_replace($regex, '', $text));
	echo '<br><br>';
?>
<?php
	$regex = '/(\d)/';
	$text = 'a123b45';
	echo '<span style="color:blue;">Q2. a123b45 에서 숫자에만 <> 안에 넣어보자.</span><br>';
	echo htmlspecialchars('A2. '.preg_replace($regex, '<\1>', $text));
	echo '<br><br>';
?>
<?php
	$regex = '/([a-zA-Z]+(\s+[a-zA-Z]+)+\.)/';
	$text = 'I am a boy. She is a girl.';
	echo '<span style="color:blue;">Q3. I am a boy. She is a girl. 문장을 <>안에 넣어보자.</span><br>';
	echo htmlspecialchars('A3. '.preg_replace($regex, '<\1>', $text));
	echo '<br><br><hr><br>';
?>
<?php
	$regex = '/<([^>]+)>([^<]+)<\/\1>/';
	$text = '<span>elem1</span><span>elem2</span>';
	
	$matches = array();
	preg_match($regex, $text, $matches);
	echo '전체 매칭: '.htmlspecialchars($matches[0]).'<br>';
	echo '괄호 1: '.htmlspecialchars($matches[1]).'<br>';
	echo '괄호 2: '.htmlspecialchars($matches[2]).'<br><br>';
		
	preg_match_all($regex, $text, $matches);
	echo '첫놈 전체매칭: '.htmlspecialchars($matches[0][0]).'<br>';
	echo '둘째놈 전체매칭: '.htmlspecialchars($matches[0][1]).'<br>';
	echo '첫놈 괄호 1: '.htmlspecialchars($matches[1][0]).'<br>';
	echo '둘째놈 괄호 1: '.htmlspecialchars($matches[1][1]).'<br>';		
	echo '첫놈 괄호 2: '.htmlspecialchars($matches[2][0]).'<br>';
	echo '둘째놈 괄호 2: '.htmlspecialchars($matches[2][1]).'<br><br>';
	
	echo htmlspecialchars('치환 결과: '.preg_replace($regex, '<\1 style="color:red;">\2</\1>', $text));
	echo '<br><br><hr><br>';
	
	$regex = '/[-:]+/';
	$text = '01 0  - 6 605: 19 17';
	$result = implode('-', preg_split($regex, $text));
	echo '원래 값: '.$text.'<br>';
	echo 'split 하고 implode 한 결과: '.$result.'<br>';
	echo '최종 replace 결과: '.preg_replace('/\s+/', '', $result);
	echo '<br><br><hr><br>';
?>

<?php
	$regex = '/([\w-]+)\s*/';
	$text = '<span  class = "my-class"  id ="a1" >동해물과 백두산이 마르고 닳도록</span >';
	
	$replace1 = preg_replace($regex, '\1 ', $text);
	$replace2 = preg_replace('/<\s*/', '<', $replace1);
	$replace3 = preg_replace('/\s*>/', '>', $replace2);
	$replace4 = preg_replace('/\s*=\s*/', '=', $replace3);
	$replace5 = preg_replace('/\s*\"/', '"', $replace4);

	echo $replace5;

	echo "<script>alert('세번째 : ".$replace5."');</script>";
	echo '<br><br><hr><br>';
?>

<?php
/*
	$regex = '[^$ \s*]([a-z\d-]+)\s*=\s*\"\s*([^"]*)\s*\"\s*(?=[a-z>])';
	echo '<span class="my-class" id="my-id">텍스트</span>';
	a = " ";
	$a = " ";
	
	b = 5;
	$b = 5;
	var cvs = "abc";
	$c = "abc";
*/
?>








</body>
</html>