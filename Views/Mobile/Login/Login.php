<?php 
	require_once 'Login-Form.php';
?>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>jQTouch &beta;</title>
		<style type="text/css" media="screen">@import "../../../Libraries/jqtouch/themes/css/jqtouch.css";</style>
		<script src="../../../Libraries/jqtouch/src/lib/zepto.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../../../Libraries/jqtouch/src/jqtouch.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" charset="utf-8">
			//var page = (location.hash) ? location.hash : '';
			var jQT = new $.jQTouch({});

			//$(document).ready(function() {
				// If we have page set, make jQTouch go to that page
				//if (page) jQT.goTo(page, 'slide');
			//});
		</script>
	</head>
	<body>
		<?php
			makeLoginForm();
		?>
	</body>
</html>
