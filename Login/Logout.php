<?php
	require_once '../Submission/SubmitFunctions.php';
	session_start();
	session_destroy();
	setcookie('username', '', time() - 1*24*60*60);
	setcookie('password', '', time() - 1*24*60*60);
	RedirectTo("Login.php");
?>