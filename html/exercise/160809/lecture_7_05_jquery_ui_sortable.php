<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<title>jQuery UI Sortable - Default functionality</title>
<link rel="stylesheet" href="jquery/themes/base/jquery-ui.css" />

<style>
#sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
#sortable li span { position: absolute; margin-left: -1.3em; }
</style>
<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery-ui.js"></script>
<script>
	$(function() {
		$("#sortable").sortable();
		$("#sortable").disableSelection();
	});
</script>
</head>
<body>
<div style="width:800px; margin:auto; margin-top:100px;">
	<ul id="sortable">
		<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</li>
		<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</li>
		<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</li>
		<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 4</li>
		<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 5</li>
		<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 6</li>
		<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 7</li>
	</ul>
</div>
 
</body>
</html>