<?php
	session_start();
	
	function isLoggedIn(){
		return isset($_SESSION['Username']);
	}
	
	function  isFormReady(){
		return isset($_SESSION['Username']) && isset($_SESSION['ResidentID']) && isset($_SESSION['PatientID']);
	}
	
?>