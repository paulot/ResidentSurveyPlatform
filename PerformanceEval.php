<?php 
	require_once 'Forms.php';
	class PerformanceEval extends Form{
			public function __construct($name = "Performance Eval", $arr = NULL){
				$this->name = $name;
				$this->questions = $arr;
			}
			
	}
?>