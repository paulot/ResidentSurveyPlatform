<?php 
	class Question{
			private $question;
			private $answer;
			public function __construct($quest = NULL, $ans = NULL){
				$this->question = $quest;
				$this->answer = $ans;
			}
			public function __destruct(){}
			public function __clone(){}
			public function getQuestion(){ return $this->question; }
			public function getAnswer(){ return $this->answer; }
			public function setQuestion($quest){ $this->question = $quest; }
			public function setAnswer($ans){ $this->answer = $ans; }
	}
?>