<?php 
	class Person{
		private $ID;
		private $fName;
		private $lName;
		private $Timestamp;
		public function __construct($connection, $fname = NULL, $lname = NULL, $time = NULL, $id = NULL){
			$this->DBconnection = $connection;
			$this->ID = $id;
			$this->fName = $fname;
			$this->lName = $lname;
			$this->Timestamp = $time;
		}
		public function getlName(){ return $this->lName; }
		public function getfName(){ return $this->fName; }
		public function getID(){ return $this->ID; }
		public function getTimestamp(){ return $this->Timestamp; }
		public function setlName($name){ $this->lName = $name; }
		public function setfName($name){ $this->fName = $name; }
		public function setID($id){ $this->ID = $id; }
		public function setTimestamp($time){ $this->Timestamp = time; }		
	}
?>