<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<script>

	var words = ['you', 'apple', 'php', 'javascript'];
	
	function buttonClicked() {
		words.push (document.getElementById('input_txt').value);
		words.sort();
		document.getElementById('result').innerHTML = words.join(', ');
    }	

</script>
</head>

<body>
<textarea id="result" rows="10" cols="30" name="words" disabled>

</textarea>
<p> 
<input id="input_txt" type = "text" value=""> 
<button onclick="buttonClicked();">확인</button>
</p>

</body>
</html>
