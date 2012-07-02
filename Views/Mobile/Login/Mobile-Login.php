<html>
	<head>
		<meta charset="UTF-8" />
		<title>jQTouch &beta;</title>
		<style type="text/css" media="screen">@import "../jqtouch/themes/css/jqtouch.css";</style>
		<script src="../jqtouch/src/lib/zepto.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../jqtouch/src/jqtouch.min.js" type="text/javascript" charset="utf-8"></script>
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
		<form id="myform" action="Mobile-Login_auth.php" method="POST" class="form">
			<div class="toolbar">
				<h1>Log in</h1>
			</div>
			<ul class="rounded">
				<li>
					<input type="text" name="Username" value="" placeholder="Username" />
				</li>
				<li>
					<input type="password" name="Password" value="" placeholder="Password"/>
				</li>
			</ul>
			<a style="margin:0 10px;color:rgba(0,0,0,.9)" href="#" class="submit 
			whiteButton">Submit</a>
		</form>
	</body>
</html>
