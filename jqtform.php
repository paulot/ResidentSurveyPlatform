<?php
$title = "Wrong username or password";
if ($_POST["username"] && $_POST["password"]) {
if ($_POST["username"] =="jqtouch" && $_POST["password"] == "jqtouch") { 
$title = "Success";
}
}
?>
<div>
	<form id="myform" action="jqtform.php" method="POST" class="form">
		<div class="toolbar">
			<h1><?php echo $title ?></h1>
		</div>
		<ul class="rounded">
			<li>
				<input type="text" name="username" value="" placeholder="Username" />
			</li>
			<li>
				<input type="password" name="password" value="" placeholder="Password"/>
			</li>
		</ul>
		<a style="margin:0 10px;color:rgba(0,0,0,.9)" href="#" class="submit 
		whiteButton">Log in</a>
	</form>
	<?php if ($title == "Success"){ ?>
		<div id="Success">Success</div>
	<?php } ?>
</div>

