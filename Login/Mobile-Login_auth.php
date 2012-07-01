<?php 
	require_once '../Submission/SubmitFunctions.php';
	require_once 'Session_start.php';	
	require_once '../Database/Connect.php';
	require_once '../Classes/Form.php';
	
			
	
	
	if(isLoggedIn()){
		//Bounce the mothehfuckah
		$title = "shit!";
		RedirectTo("Setup.php");
	}
	$message = "shit";
	
	$loginForm = new Form();
	
		
	$Errors = $loginForm->checkFields(array('Username', 'Password'), $_POST);
	if(!empty($Errors)){
		//Keep him here, he doesn't wanna talk
		foreach ($Errors as $Error){
			$message .= "Psh... No " . $Error . " , what a bummer...<br>";
		}
	}
	
	else{ //Form has been submitted correctly
		$username = trim($MySQLDB->prep($_POST['Username']));
		$password = trim($MySQLDB->hash($MySQLDB->prep($_POST['Password'])));
		
		
		$Qresult = $MySQLDB->query("SELECT * FROM Users WHERE Username = '{$username}' and Password = '{$password}' LIMIT 1");
		
		if(!$Qresult){
			die("Database query failed: " . $MySQLDB->getError());
		}
		if($MySQLDB->numRows($Qresult) == 1){
			//He's a player let him trough bouncer
			$Qresult = $MySQLDB->toArray($Qresult);
			//$MySESSION->setUsername($Qresult['Username']);
			$_SESSION['Username'] = $Qresult['Username'];
			//RedirectTo("Setup.php");
			/*echo "		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				// If we have page set, make jQTouch go to that page
				jQT.goTo('Setup.php', 'slide');
			});
		</script>";*/
			$message = "Logged in";
		}else{
			//Bounce the mothefucka
			$message = "Whoa buddy! Couldn't find'ya. <br>
					Make sure your caps lock key is off and try again.";
		}
	}

		
?>
<div>
	<form id="myform" action="Mobile-Login_auth.php" method="POST" class="form">
		<div class="toolbar">
			<h1><?php echo $title . " and " . $message?></h1>
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
		whiteButton">Log in</a>
	</form>
</div>

