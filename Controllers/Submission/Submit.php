<?php 
	require_once '../Requires/Require_ALL.php';
	require_once '../Login/Session_start.php';
	//print_r($_GET);
	
	
	
	if(!isFormReady()){
		//Bounce the mothehfuckah
		RedirectTo("../Login/Login.php");
	}
	//echo gettype($_GET['formName']) . "<br>";
	//echo gettype($form);
	
	//print_r($_POST);

	
	$values = $_SESSION['ResidentID'] . ", " . $_SESSION['PatientID'] . ", ";
	$columns = "PatientID, ResidentId, ";
	foreach ($_POST as $ans){
		$values .=  "'".$MySQLDB->prep($ans)."'".',';
		$columns .=  $MySQLDB->prep(key($_POST)).',';
		next($_POST);
	}

	$values = substr($values, 0, -1);
	$columns = substr($columns, 0, -1);

	//echo $values . "<br>";
	//echo $columns . "<br>";
	
	
	$MySQLDB->insert($columns, 
					$values
					 ,$MySQLDB->prep($_GET['tableName']));
	
	if($MySQLDB->getErrorNo() != 0){
		echo "Noo, we had an error num: " . $MySQLDB->getErrorNo() . "<br>";
		echo "Error was : " . $MySQLDB->getError() . "<br>";
		die("Contact the sysadmin");
	} else {
		redirectTo("../Forms/" . $_GET['nextPage']);
	}
	
	
?>