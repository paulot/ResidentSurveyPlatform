<?php 
	require_once 'Person.php';
	require_once 'Form.php';
	require_once '../Database/MySQLDBconnect.php';
	class Patient extends Person{
		//Begin Patient DB storable info
		private $number;
		private $gender;
		private $age;
		private $weight;
		private $height;
		private $extras; 		//Patient additional info (FORM)
		//End Patient DB storable info
		//Begin Resident pertinent info
		private $patientSurvey; //Patient fillable survey (FORM)
		//End Resident pertinent info
		public function getGender(){ return $this->gender; }
		public function getAge(){ return $this->age; }
		public function getWeight(){ return $this->weight; }
		public function getHeight(){ return $this->height; }
		public function getExtras(){ return $this->extras; }
		public function getSurvey(){ return $this->patientSurvey; }
		public function getNumber(){ return $this->number; }
		public function setNumber($number){ $this->number = $number; } 
		public function setMale(){ $this->gender = "Male"; } 
		public function setFemale(){ $this->gender = "Female"; }
		public function setAge($age){ $this->age = $age; }
		public function setWeight($weight){ $this->weight = $weight; }
		public function setHeight($height){ return $this->height = $height; }
		public function setExtras($extras){ return $this->extras = $estras; }
		public function setSurvey($survey){ $this->patientSurvey = $survey; }
		
		public function printSurvey(){ $this->patientSurvey->printForm(); }
		public function printExtras(){ $this->extras->printForm(); }
		
	}
?>