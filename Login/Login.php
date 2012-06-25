<?php 
	require_once '../Submission/SubmitFunctions.php';
	require_once 'Session_start.php';	
	require_once '../Database/Connect.php';
	require_once '../Classes/Form.php';
	
	
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
		<script type="text/javascript" src=https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 			
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
			</div>
		</div>
	</body>

</html>