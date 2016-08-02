<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<script language="javascript" src="/jquery/jquery-1.11.2.js"></script>
<script language="javascript" src="/jquery/jquery-ui.js"></script>
<link rel="stylesheet" href="/jquery/jquery-ui.css" />

<script>
function getAutocompleteSource(userInput) {

	// 서버에서 목록을 요청
	var source = '';
	$.ajax({
		url:'word.php',
		async: false,
		data: {input: userInput}, // 서버에서 클라이언트로 $_GET['input']으로 가는 것
		//dataType : 'json', // 서버에서 받을 때 어레이 그대로 출력
		//dataType : 'text', // 만약 dataType 이 text 이면 함수 안에서 JSON.parse(객체) 기능을 활용하여 문자열의 어레이만 가져올 수 있다.
		// JSON.parse(객체) 와 반대 : JSON.stringify(객체)
		// a, b, c <=> ["a", "b", "c"]
		
		success : function(result) {
			//source = result.split(' ');
			source = result
			//source = JSON.parse(result); // 일 때 결과값 테스트 하는경우 : alert(source)
			//alert(result);
		},
		error: function(xhr) { // xml http request 약자
			alert('Error');
		}
	});
	
	return source;
}


$(document).ready(function(){
    $("#autocomplete-input").autocomplete({
        //source : getAutocompleteSource($('#autocomplete-input').val()),
		//delay : 0,
		search : function () {
			//alert($('#autocomplete-input').val());
			var input = $('#autocomplete-input').val();
			//alert (input);
			$('#autocomplete-input').autocomplete('option', 'source', getAutocompleteSource(input));
		},
		minLength: 1,
    });
});
</script>

</head>
<body>
<div style="margin-left:500px;">
	<p>자동완성이 되는 입력 창입니다 </p>
	<input type="text" id="autocomplete-input">
</div>
</body>
</html>