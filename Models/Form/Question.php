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
			// @param: $renderer: a function that describes how the form should be rendered, it should take an array of the form 
			//         [question, answer]
			public function render($renderer) { 
				//call_user_func_array($renderer, array('question' => $this->getQuestion(), 'answer' => $this->getAnswer())); 
				$shit = array('question' => $this->getQuestion(), 'answer' => $this->getAnswer());
				//print_r($shit);
				call_user_func($renderer, $shit); 
			}
	}
?>