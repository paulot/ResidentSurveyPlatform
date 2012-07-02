<?php
	class Session{
		
		public function __construct(){
				//session_start();
		}
		public function start(){ session_start(); }
		public function getUsername(){ return isset($_SESSION['Username']) ? $_SESSION['Username'] : false; }
		public function setPatientID($PatientID){ $_SESSION['PatientID'] = $PatientID; }
		public function setUsername($Username){ $_SESSION['Username'] = $Username; }
		public function setResidentID($ResidentID){ $_SESSION['ResidentID'] = $ResidentID; }
		public function getPatientID(){ return isset($_SESSION['PatientID']) ? $_SESSION['PatientID'] : false; }
		public function getResidentID(){ return isset($_SESSION['ResidentID']) ? $_SESSION['ResidentID'] : false;  }
		public function removeVars(){ session_unset(); }
		public function isSetUp(){ return isset($_SESSION['ResidentID']) && isset($_SESSION['PatientID']) && isset($_SESSION['Username']); }
		public function __destruct(){ session_destroy(); } 
		public function isLoggedIn(){ return isset($_SESSION['Username']); }
	}

?>