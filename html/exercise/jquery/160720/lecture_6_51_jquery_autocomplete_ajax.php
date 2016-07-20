<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>

<script language="javascript" src="/jquery/jquery-1.11.2.js"></script>
<script language="javascript" src="/jquery/jquery-ui.js"></script>
<link rel="stylesheet" href="/jquery/jquery-ui.css" />

<script>

function getAutocompleteSource() {
	//return (['남기웅', '윤석민', '김혜관', '김효선', '김종찬', '진두환', '김덕현']);
	
	// 서버에서 목록을 요청
	var source = '';
	$.ajax({
		url:'lecture_6_41_jquery_ajax_server_side.php',
		async: false,
		success : function(result) {
			source = result.split(' ');
		},
		error: function(xhr) {
			alert('Error');
		}
	});
	
	return source;
}


$(document).ready(function(){
    $("#autocomplete-input").autocomplete({
        source: getAutocompleteSource(),
		minLength: 1
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

