<?php 

	require_once 'Session_start.php';	
	require_once '../Submission/SubmitFunctions.php';
	require_once '../Classes/Form.php';
	
	
	if(!isLoggedIn()){
		//Bounce the mothehfuckah
		RedirectTo("Login.php");
	}
	
	$greet = "Welcome " . $_SESSION['Username'] . "<br>";
	$message = " ";
	
	$setupForm = new Form();
	if (isset($_POST['Questions'])) {
		
		$Errors = $setupForm->checkNumericFields(array('ResidentID', 'PatientID'), $_POST);
		if(!empty($Errors)){
			//Keep him here, he doesn't wanna talk
			foreach ($Errors as $Error){
				$message .= "Psh... " . $Error . "'s format is wrong, what a bummer...<br>";
			}
		}		
		else{ //Form has been submitted correctly
			$_SESSION['ResidentID'] = $_POST['ResidentID'];
			$_SESSION['PatientID'] = $_POST['PatientID'];
			RedirectTo("../Forms/Patient-Dem-Info.php");
		}
	}
	
		
?>

<html>
	<head>
		<title>
			Setup
		</title>
		<meta charset="UTF-8">
		<link href="../Forms/style.css" rel="stylesheet">
		<script type="text/javascript" src="../Forms/func.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 			
	</head>
	<body>
		<div id="container" class="login">
			<form action="Setup.php" method="POST">
				<span class="setup-menu">
					<ul>
						<li>
							<a href="Logout.php">Logout</a>
						</li>
					</ul>
				</span>
				<span class="message">
					<?php  
					echo $greet;
					echo $message;
					?>
				</span>
				<span class="login-input" id="login-span">
					<input id="ResidentID" class="login-input" name="ResidentID" type="text" value="ResidentID" maxlength="30">
				</span>
				<span class="login-input" id="login-span">
					<input id="PatientID" class="login-input" name="PatientID" type="text" value="PatientID" maxlength="30">
				</span>
				<span class="login-input" id="login-span">
					<input id="submit" class="login-input" name="Questions" type="submit" value="Begin-Questionaire">
				</span>
			</form>
		</div>
	</body>

</html>