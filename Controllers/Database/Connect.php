<?php 
	//Actually creates the connection with the database
	require_once 'MySQLDBconnect.php';
	global $MySQLDB;
	$MySQLDB = new MySQLDB();
	$MySQLDB->setUser('root');
	$MySQLDB->setPass('mysql_regnum1');
	$MySQLDB->setServer();
	//$c = $MySQLDB->connect();
	//echo ($c==NULL)?"SHIT its NULL" : "NOT NULL PLAYA";
	if (!$MySQLDB->connect()) die("Could not connect to " . $MySQLDB->getServer() . $MySQLDB->getError() . "</br>");
	$MySQLDB->setName("test");
?>