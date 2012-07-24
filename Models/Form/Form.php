<?php
	//Mobile page form
	require_once 'Question.php';
	class Form {
		private $questions;

		public function __construct($quest = NULL){
			$this->questions = $quest;
		}
		public function __destruct(){}
		public function __clone(){}
		public function getQuestions(){ return $this->questions; }
		public function setQuestions($quest){ $this->questions = $quest; }
		public function render ($questionRenderer, $start, $end){
			for ($start; $start < $end; $start++) { 
				$this->questions[$start]->render($questionRenderer);
			}
			//echo $this->questions[$start]->getQuestion();
		}
	}


?>