<?php
	require_once '../Submission/SubmitFunctions.php';
	session_start();
	session_destroy();
	setcookie('Username', '', time() - 1*24*60*60);
	setcookie('Password', '', time() - 1*24*60*60);
	RedirectTo("Login.php");
?>