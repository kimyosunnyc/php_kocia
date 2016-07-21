<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<header>
<script language="javascript" src="/jquery/jquery-1.11.2.js"></script>
<script language="javascript" src="/jquery/jquery-ui.js"></script>
<link rel="stylesheet" href="/jquery/jquery-ui.css" />
<script>

function getAutocompleteSource(userInput){
	
	var words = '';
	$.ajax({
		url: 'wordList.php',
		async: false,
		data: {input: userInput},
		success: function (result){
			words = result.split(" ");
			alert(words);
		},
		erorr: function(xhr){
			alert('Error');
		},
		
		timeout : 3000
	});
	return words;
}

$(document).ready(function(){
    $("#searchWord").autocomplete({
        source: getAutocompleteSource($('#searchWord').val()),
		search: function(){		// 'a' -> keyboard event -> [  search function  ] -> autocomplete
			var input = $("#searchWord").val();
			$("#searchWord").autocomplete('option', 'source', getAutocompleteSource(input));
			$("#searchWord").autocomplete('option', 'delay', 50);
		},
		minLength: 1,
    });
});

</script>
</header>

<body>
<h3>검색어 자동완성</h3>
<input type='text' id='searchWord'>
</body>
</html>