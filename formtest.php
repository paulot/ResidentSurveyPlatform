<?php 
	require_once 'Form.php';
	require_once 'Question.php';
	$questions = array();
	for($i = 0; $i < 10; $i++){
		$questions[$i] = new Question("Question number " . $i, "Answer number " . $i);
		//$questions[$i]->setQuestion("Question number " . $i);
		//$questions[$i]->setAnswer("Answer number " . $i);
		//echo $questions[$i]->getQuestion() . " " . $questions[$i]->getAnswer() . "</br>";
	}
	$form = new Form("New Form",$questions);
	$form->printForm();
?>