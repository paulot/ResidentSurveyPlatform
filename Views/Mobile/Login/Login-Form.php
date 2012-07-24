<?php
	require_once 'Login-Auth.php';
	function makeLoginForm(){
		
		echo	'<div>
				<form id="myform" action="Login-Helper.php" method="POST" class="form">
					<div class="toolbar">
						<h1>Log In</h1>
					</div>
					<div class="info">
						<strong> ' . getMessage() . '</strong>
					</div>	
					<ul class="rounded">
						<li>
							<input type="text" name="Username" value="" placeholder="Username" />
						</li>
						<li>
							<input type="password" name="Password" value="" placeholder="Password"/>
						</li>
					</ul>
					<a style="margin:0 10px;color:rgba(0,0,0,.9)" href="#" class="submit whiteButton">Log in</a>
				</form>
			</div>';
	}
?>
