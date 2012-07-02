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
