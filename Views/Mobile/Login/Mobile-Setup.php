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
<div>
	<div class="toolbar">
		<a href="#" class="back">Back</a>
		<h1>Set-up</h1>
		<a href="#" class="button rightButton flip" style="">Settings</a>
	</div>
	<ul>
		<li>
			<?php  
				echo $greet;
				echo $message;
			?>
		</li>
	</ul>
	<form action="Setup.php" method="POST" class="current">
		<ul class="edit rounded">
			<li>
				<input id="ResidentID" class="login-input" name="ResidentID" type="text" placeholder="ResidentID" maxlength="30">
			</li>
			<li>
				<input id="PatientID" class="login-input" name="PatientID" type="text" placeholder="PatientID" maxlength="30">
			</li>
		</ul>
		<a style="margin:0 10px;color:rgba(0,0,0,.9)" href="#" class="submit whiteButton">Submit</a>
	</form>
</div>