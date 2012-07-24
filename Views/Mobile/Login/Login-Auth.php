<?php 
	/*
		* Authenticates mobile logins
		* 'returns' $message, a message with the login error or empty if there were no errors
	*/
	error_reporting(E_ALL);
	ini_set('display_errors','On');
	require_once '../../../Requires/Database.php';
	require_once '../../../Requires/Session.php';
	require_once '../../../Requires/Form.php';
	require_once '../../../Controllers/Submission/SubmitFunctions.php';
			
	
	if(isLoggedIn()){
		//Bounce
		RedirectTo("Mobile-Setup.php");
	}
	$message = " ";
	
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
			RedirectTo("Mobile-Setup.php");
			//echo "<script type="text/javascript" charset="utf-8"> window.location = 'Setup.php'; </script>";
			$message = "Logged in";
		}else{
			//Bounce the mothefucka
			$message = "Whoa buddy! Couldn't find'ya. <br>
					Make sure your caps lock key is off and try again.";
		}
	}
	function getMessage(){
		global $message;
		return $message;
	}

		
?>
