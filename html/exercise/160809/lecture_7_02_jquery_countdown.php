<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
.timer {
	display: block; 
	width: 800px; 
	margin:0 auto; 
	margin-top: 100px; 
	font-size:100px;
	text-align: center;
}

@keyframes example {
    from {color: red;}
    to {color: black;}
}

.mytimer {
	animation-name: example; 
	animation-duration: 1.5s; 	
}

.temp {
	font-size:200px;
	background:#000;
	color:#fff;
	border-radius:15px;
}

</style>
<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery.countdown.js"></script>
<script type="text/javascript" src="jquery/jquery-ui.js"></script>
<link rel="stylesheet" href="jquery/themes/humanity/jquery-ui.css" />
<script>


$(document).ready(function(){
	
	/*window.onbeforeunload = function() {
		return "게임을 마치지 않고 나가면 징계를 먹습니다.";
	};
	
	window.onunload = function() {
		// 만약 게임중이면 징계먹이기
		return;
	};
	
	// disable F5 key
	function disableF5(e) { 
		if ((e.which || e.keyCode) == 116) {
			e.preventDefault(); 
		}
	}
	$(document).on("keydown", disableF5);*/
	
	function flick() {	
		//alert (1);
		//var els = document.getElementsByClassName('mytimer');
		//var flash = els[0];		
		//var newNode = flash.cloneNode(true);
		//newNode.id = flash.id + '1';
		//flash.parentNode.replaceChild(newNode, flash);
		//newNode.className = 'timer mytimer';
		
		//flash.style.color = 'red';
		//setTimeout(function() { flash.style.color = 'black'; }, 100);	
		
		//$('#flash').addClass('temp', 700); // temp class 스타일이 한번 적용됨
		
		$('#flash').addClass('temp', 1500, callBack);
		function callBack() {
			$('#flash').removeClass('temp');
		}
		$('#flash').animate({color:"red"}, 1200);
	}
	
	$('#timer').countdown(Date.now() + 10000, function(event) { 
		var remainingSecondsString =  event.strftime('%-S');
		$(this).text(remainingSecondsString); 
		if (parseInt(remainingSecondsString) == 0) {
			$(this).text('Time Over');
		} else if (parseInt(remainingSecondsString) % 2 == 0) {
			$(this).css('color', 'red');
		} else {
			$(this).css('color', 'blue');
		}
	});
	
	$('#dummy').countdown(Date.now() + 10000, function(event) { 
		flick();
	});
	
	
	
});
</script>
</head>
<body>

<span id="timer" class="timer">Timer not started yet</span>
<span id="flash" class="timer">Flash</span>
<span id="dummy"></span>
</div>
</body>
</html>