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
		data: {input: userInput}, // 서버에서 $_GET['input']으로 가는 것
		success : function(result) {
			source = result.split(' ');
			alert(source);
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