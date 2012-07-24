<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL|E_STRICT);

	require_once '/var/www/ResidentSurveyPlatform/Models/Form/Form.php';
	require_once '/var/www/ResidentSurveyPlatform/Models/Form/Question.php';	
	require_once '/var/www/ResidentSurveyPlatform/Controllers/Submission/SubmitFunctions.php';
	require_once '/var/www/ResidentSurveyPlatform/Requires/Session.php';
	

// ------------------------ Create the informed consent form -------------------------------- //

	$ICasking = array(
		"Introduced self and the discussion topic?",
		"Described the indications for the procedure?",
		"Described the benefits of the procedure",
		"Described the procedure itself in clear, simple language?",
		"Paused for questions appropriately?",
		"Described the minor risks of the procedure?",
		"Described the risk of serious complications?",
		"Emphasized that these are rare?",
		"Described alternatives to the procedure?",
		"Teach back: Asked the patient to repeat key items in discussion?",
		"Had the patient verbally agree with the consent form Utilized CI-CARE?"
	);

	$ICanswers = array("Yes" , "No", "Partial");


	// $testQuestion2 = new Question("What is your gender?", Array("Female", "Male"));

	$ICquestions = array();
	$i = 0; 
	foreach ($ICasking as $question) {
		$ICquestions[$i++] = new Question ($question, $ICanswers);
	}

	function ICformRenderer($QuestionAnswerPair) {
		//print_r($QuestionAnswerPair);
		echo	'<form><ul class="rounded">
			<li class="questions"><strong class = "title">' . $QuestionAnswerPair['question'] . '</strong></li>';
		foreach ($QuestionAnswerPair['answer'] as $answer) {
			echo '<label><li><input name="radio" type="radio" value="' . $answer . '">' . $answer . '</li></label>';
		}
		echo "</ul></form>";
	}

// ------------------------ End  of the informed consent form -------------------------------- //
// ------------------------ Begin the pre operative form -------------------------------- //
	
	$PreOpAsking = array(
			"Is it clear who your resident anesthesiologist is today?",
			"Is it clear what your resident anesthesiologist’s role is in your care today?",
			"Did your resident anesthesiologist address you with respect today?",
			"Did your resident anesthesiologist connect with you today?",
			"Did your resident anesthesiologist communicate his/her anesthetic plan with you today?",
			"Do you feel you have received an adequate explanation of your spinal anesthesia?",
			"Do you feel you comfortable proceeding with the proposed anesthetic plan given the information you have received?",
			"Did your resident anesthesiologist ask you for permission to examine you today?",
			"Did your resident anesthesiologist address your questions and concerns today?",
			"Did your resident anesthesiologist exit courteously with an explanation of what will happen next?",
			"Thus far, what is your overall satisfaction with your resident anesthesiologist?"
	);
	$PreOpAns = array( 0 =>1, 1 => 5);
	$PreOpQuestions = array();
	$j = 0;
	foreach ($PreOpAsking as $quest) {
		$PreOpQuestions[$j++] = new Question($quest, $PreOpAns);
	}


	$j = 0;
	function PreOpRenderer($QuestionAnswerPair) {
		//print_r($QuestionAnswerPair);
		echo	'<ul class="rounded">
			<li><strong class = "title">' . $QuestionAnswerPair['question'] . '</strong></li>';
		echo '<li><table><tr>
			<td>
				' . $QuestionAnswerPair['question'][0] . '
			</td><td>
			<input type="range" name="PreOpAns' . $j++ . '" />
			</td><td>
				' . $QuestionAnswerPair['question'][1] . '
			</td></li>';
		echo "</ul>";
	}

	
	


//	$ResidentForm = new Form(array_merge($ICquestions, $PreOpQuestions));
?>