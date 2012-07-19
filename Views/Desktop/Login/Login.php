<?php 
	require_once '/var/www//ResidentSurveyPlatform/Requires/Submission.php';
	require_once '/var/www//ResidentSurveyPlatform/Requires/Require_Session.php';	
	require_once '/var/www//ResidentSurveyPlatform/Requires/Database.php';
	require_once '/var/www//ResidentSurveyPlatform/Requires/Form.php';
	require_once '/var/www//ResidentSurveyPlatform/Requires/Models/Session/Session.php';
	
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	
	if(isLoggedIn()){
		//Bounce the mothehfuckah
		RedirectTo("Setup.php");
	}
	$message = " ";
	
	$loginForm = new Form();
	if (isset($_POST['submit'])) {
		
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
				RedirectTo("Setup.php");
			}else{
				//Bounce the mothefucka
				$message = "Whoa buddy! Couldn't find'ya. <br>
						Make sure your caps lock key is off and try again.";
			}
		}
	}
		
?>

<html>
	<head>
		<title>
			Login
		</title>
		<meta charset="UTF-8">
		<link href="../Forms/style.css" rel="stylesheet">
		<script type="text/javascript" src="../Forms/func.js"></script>
		<script src="http://code.jquery.com/jquery-latest.js"></script>			
	</head>
	<body>
		<div id="container" class="login">
			<div class="center-form">
			<h1 class="header">Login</h1>
			<hr>
			<form action="Login.php" method="POST">
				<span class="message">
					<?php echo $message;
					?>
				</span>
				<span class="login-input" id="login-span">
					<input id="username" class="login-input" name="Username" type="text" value="Username" maxlength="30">
				</span>
				<span class="login-input" id="login-span">
					<input id="password" class="login-input" name="Password" type="password">
				</span>
				<span class="login-input" id="login-span">
					<input id="submit" class="login-input" name="submit" type="submit" value="Submit">
				</span>
			</form>
			<script>
			    $("form").submit(function() {
			      if ($("#username").val() == "" || $("#password").val() == "") {
			        $(".message").text("Please provide both a Username and a Password").show().fadeOut(5000);
			        return false;
			      }
			     //$(".message").text("A field is empty!").show().fadeOut(5000);
			      return true;
			    });
			</script>

			</div>
		</div>
	</body>

</html>
