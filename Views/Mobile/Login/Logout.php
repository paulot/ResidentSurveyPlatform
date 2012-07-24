<?php
	//include '../../../Controllers/Login/Logout.php';
	
	require_once '../../../Controllers/Submission/SubmitFunctions.php';
	session_start();
	session_destroy();
	setcookie('Username', '', time() - 1*24*60*60);
	setcookie('Password', '', time() - 1*24*60*60);
	echo 'shit';
	RedirectTo("Login.php");
	
?>