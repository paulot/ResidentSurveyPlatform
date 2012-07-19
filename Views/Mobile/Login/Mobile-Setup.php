<?php 
	ini_set('display_errors',1);
	error_reporting(E_ALL|E_STRICT);
	session_start();

	require_once '/var/www/ResidentSurveyPlatform/Models/Form/Form.php';
	require_once '/var/www/ResidentSurveyPlatform/Models/Form/Question.php';	
	require_once '/var/www/ResidentSurveyPlatform/Controllers/Submission/SubmitFunctions.php';
	require_once '/var/www/ResidentSurveyPlatform/Requires/Session.php';
	
	
	if(!isLoggedIn()){
		//Bounce the mothehfuckah
		RedirectTo("Login.php");
	}
	
	$greet = "Welcome " . $_SESSION['Username'];
	$Username = $_SESSION['Username'];


	// $testQuestion1 = new Question("What is your name?", Array("Paulo", "Alice", "George"));
	// $testQuestion2 = new Question("What is your gender?", Array("Female", "Male"));

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
	foreach ($PreOpAsking as $question) {
		$PreOpQuestions[$j++] = new Question ($question, $PreOpAns);
	}


	//$j = 0;
	

// ------------------------ End of the pre operative form -------------------------------- //
// ------------------------ Begin the Post operative form -------------------------------- //	

	$PostOpAsking = array(
			"Is it clear to you who your resident anesthesiologist was during your surgery?",
			"Is it clear what your resident anesthesiologist’s role was in your care during surgery?",
			"Did your resident anesthesiologist address you with respect throughout your operative care?",
			"Did your resident anesthesiologist ask you for permission to examine you throughout your operative care?",
			"Did your resident anesthesiologist address your questions and concerns throughout your operative care?",
			"Did your resident anesthesiologist provide explanations of what will happen next throughout your operative care?",
			"Was your pain well controlled post-operatively?",
			"During your operative care, what is your overall satisfaction with your resident anesthesiologist?"
	);
	$PostOpQuestions = array();
	$j = 0;
	foreach ($PostOpAsking as $question) {
		$PostOpQuestions[$j++] = new Question ($question, $PreOpAns);
	}
	
// ------------------------ End of the Post operative form -------------------------------- //
// ------------------------ Begin Procedural Cheklist form -------------------------------- //

	$ProcCheckAsking = array(
		"Took a ‘time out’ to verify: the patient’s identity?",
		"Took a ‘time out’ to verify: the procedure that is being done?",
		"Took a ‘time out’ to verify: whether consent has been obtained?",
		"Took a ‘time out’ to verify: the site?",
		"Took a ‘time out’ to verify: pulse oximeter and NIBP cuff on patient?",
		"Verify that spinal kit tray, nonsterile and sterile gloves (correct size), and cleansing solution are present",
		"Palpate the superior aspects of the iliac crests and identify the intersection at the L4 spinous process. Use skin-indentation to indicate the proper position at the L3/L4 or L4/L5 interspace.",
		"Clean the overlying skin with chlorhexidine in widening concentric circles (note: American Society of Regional Anesthesia currently recommends chlorhexidine for skin antisepsis prior to regional anesthesia procedures)", 
		"Open the spinal tray before placing sterile gloves on.",
		"Put on sterile gloves with proper technique (remove jewelry, ID badge, wash hands, etc.)",
		"Apply sterile drapes.",
		"Verify the content of the anesthetics before drawing it up. Draw up lidocaine in the 3cc syringe and bupivacaine in the 5cc syringe. Warn the patient you are about to administer local anesthesia. Re-identify the intended interspace after the patient is prepared and draped. Using the smallest provided needle, make a wheal of local anesthesia at the previously marked site Ask assistant to add morphine to bupivacaine syringe",
		"Inject anesthetic in the correct location and angle: superior aspect of the inferior spinous process, in the midline, approximately 15 degrees cephalad, as if aiming at the umbilicus); horizontal plane perpendicular to patient’s back (eg. maintaining needle in midline position)",
		"Insert the introducer needle in the middle of the interspace with a slight cephalad angulation of 10 to 15 degree. The bevel of the spinal needle should be in the sagittal plane and advance in the orientation as described above.",
		"Advance through the anatomic structures until the subarachnoid space is reached. May experience a popping sensation as the ligamentum flavum is crossed.",
		"Withdraw the stylet each time you feel a pop to assess for CSF flow.", 
		"If attempt is unsuccessful (bone encountered, no CSF flow, etc), withdraw the introducer needle and spinal needle to the subcutaneous tissue (without exiting the skin) and redirect the introducer needle.",
		"Confirms CSF flow by aspiration before and after injecting anesthetic"	,
		"Remove the spinal and introducer needle together once completed."	, 
		"Apply pressure with the provided 2x2 gauze, assess for good hemostasis, and apply a bandage.",
		"Remove the draping. Lay the patient and observe vitals. Dispose of all sharps and biohazard material appropriately."			
	);
	
	$ProcCheckQuestions = array();
	$j = 0;
	foreach ($ProcCheckAsking as $question) {
		$ProcCheckQuestions[$j++] = new Question ($question, $ICanswers);
	}
			
// ------------------------ End of Procedural Cheklist form -------------------------------- //
// ------------------------ Begin Post Performance Eval Form -------------------------------- //

	$PostPerQuestions = array();

	$smallTextAsking = array(
		"Was the spinal level checked after delivery of spinal anesthetic appropriate for surgical anesthesia?",
		"What needle was used?",
		"What needle gauge was used?",
		"What spinal level was used?",
		"What patient position was used?",
		"What anatomical approach was used?  (midline, paramedian)",
		"How many redirections with the finder needle were used?",
		"How much blood was lost during the procedure?",
	);
	$j = 0;
	foreach ($smallTextAsking as $question){	
		$PostPerQuestions[$j++] = new Question ($question, null);
	}			
	$numSmallText = $j;

	$checkBoxValues = array(
		"Paresthesia",
		"Inappropriate Glove Size",
		"Finder needle inserted into different area from local anesthesia",
		"Bent needle",
		"Poor positioning",
		"Same exact needle maneuver more than two consecutive times",
		"Medication injected without CSF confirmation",
		"Possible breaks in aseptic technique",
		"Angle inconsistent with obtaining CSF",
		"Needle insertion at high-lumbar or low-thoracic interspace",
		"CSF during removal of needle"
	);

	$PostPerQuestions[$j++] = new Question ("Please select any of the following complications if they occurred: ", $checkBoxValues);
					
	$PostPerQuestions[$j++] = new Question ("What is your global assessment of the resident’s performance of this spinal block? (1: Poor, 5: Exellent)", array(1 , 5));

// ------------------------ End of Post Performance Eval Form -------------------------------- //
// ------------------------ Begin Patient Dem Info Form -------------------------------- //
	
	$PatDemInfoQuestions = array();
	$j = 0; 
	$PostPerQuestions[$j++] = new Question("What is the Patient's gender?", array("Male", "Female"))

		
	$smallTextQuestions = array("What is the Patient's First Name?", "What is the Patient's Last Name?");
	foreach ($smallTextQuestions as $question){
		$patientDemInfo->makeSmallTextQuestion($question, $name . $i++, 30);
	}

	$patientDemInfo->makeSliderQuestion("What is the Patient's Age?", 0, 100, $name . $i++, $name . $i . "ans");
	
	
	$choiceArr = array("kg", "lb");
	
	$patientDemInfo->makeConvertibleSliderQuestion("What is the Patient's weight?", 1, 300, $name . $i++, $name . $i . "ans", $choiceArr);
	
	$choiceArr = array("cm", "in");
	
	$patientDemInfo->makeConvertibleSliderQuestion("What is the Patient's height?", 1, 250, $name . $i++, $name . $i . "ans", $choiceArr);
	

	$choices = array("Good: easily palpable spinal dorsal process", "Poor: difficult to palpate", "None: unable to positively identify spinous process");
	$patientDemInfo->makeRadioQuestion("How are the patient’s anatomical landmarks?", $choices, $name . $i++);
	
	$choices = array("Good: able to flex spine adequately", "Poor: unable to flex spine");
	$patientDemInfo->makeRadioQuestion("How is the patient able to position?", $choices, $name . $i++);
	
	
	$patientDemInfo->makeBigTextQuestion("Does the patient have any of the following co-morbidities: back deformities, previous back surgeries? Please list.", $name . $i++);
	
	$patientDemInfo->makeBigTextQuestion("What sedation, if any, is planned for spinal anesthetic procedure?", $name . $i++);














	$nameCounter = 0;

	function TextAreaQuestion($QuestionAnswerPair){
		echo	'<ul><li><strong>' . $QuestionAnswerPair['question'] . '</strong></li>
			<li><textarea name="" placeholder="Insert Text Here"></textarea></li></ul>';
	}


	function CheckBoxRenderer($QuestionAnswerPair) {
		//print_r($QuestionAnswerPair);
		echo	'<ul class="rounded">
			<li class="questions"><strong>' . $QuestionAnswerPair['question'] . '</strong></li>';
		foreach ($QuestionAnswerPair['answer'] as $answer) {
			echo '<label><li><input name="" type="checkbox" value="' . $answer . '">' . $answer . '</li></label>';
		}
		echo "</ul>";
	}


	function InlineTextRenderer($QuestionAnswerPair) {
		global $nameCounter;
		echo	'<ul class="rounded">
			<li><strong class = "title">' . $QuestionAnswerPair['question'] . '</strong></li>';
		echo	'<li><input type="text" name="PosPer' . $nameCounter++ . '" placeholder="Enter Text"/></li></ul>';
	}

	function SliderRenderer($QuestionAnswerPair) {
		//print_r($QuestionAnswerPair);
		global $nameCounter;
		echo	'<ul class="rounded">
			<li><strong class = "title">' . $QuestionAnswerPair['question'] . '</strong></li>';
		echo '<li><table><tr>
			<td>
				' . $QuestionAnswerPair['question'][0] . '
			</td><td>
			<input type="range" name="PreOpAns' . $nameCounter++ . '" />
			</td><td>
				' . $QuestionAnswerPair['question'][1] . '
			</td></table></li>';
		echo "</ul>";
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













	$ResidentForm = new Form(array_merge($ICquestions, $PreOpQuestions, $PostOpQuestions, $ProcCheckQuestions, $PostPerQuestions));

	
		
?>

<div class="current" id="1">
	<div class="toolbar">
		<a href="#" class="back">Back</a>
		<h1>Set-up</h1>
		<a href="#settings" class="button rightButton flip" style="">Settings</a>
	</div>
	<ul>
		<li>
			<?php  echo $greet; ?> <a href="Logout.php" >logout</a>
		</li>
	</ul>
	<ul class="edit rounded">
		<li>
			<input id="ResidentID" class="login-input" name="ResidentID" type="text" placeholder="ResidentID" maxlength="30">
		</li>
		<li>
			<input id="PatientID" class="login-input" name="PatientID" type="text" placeholder="PatientID" maxlength="30">
		</li>
	</ul>
	<a style="margin:0 10px;color:rgba(0,0,0,.9)" href="#2" class="whiteButton">Submit</a>
</div>
<div id="2">
	<div class="toolbar">
		<a href="#" class="back">Back</a>
		<h1>Set-up</h1>
		<a href="#settings" class="button rightButton flip" style="">Settings</a>
	</div>
	<ul>
		<li>
			<?php  echo $Username; ?> <a href="Logout.php" >logout</a>
		</li>
	</ul>
	<?php
		$begin = 0;
		$end = count($ICasking);
		$ResidentForm->render('ICformRenderer', $begin, $end);
		$nameCounter = 0;
	?>
	<a style="margin:0 10px;color:rgba(0,0,0,.9)" href="#3" class="whiteButton">Submit</a>
</div>
<div id="3">
	<div class="toolbar">
		<a href="#" class="back">Back</a>
		<h1>Set-up</h1>
		<a href="#settings" class="button rightButton flip" style="">Settings</a>
	</div>
	<ul>
		<li>
			<?php  echo $Username; ?> <a href="Logout.php" >logout</a>
		</li>
	</ul>
	<?php
		$begin = $end;
		$end += count($PreOpQuestions);
		$ResidentForm->render('SliderRenderer', $begin, $end);
		$nameCounter = 0;
	?>
	<a style="margin:0 10px;color:rgba(0,0,0,.9)" href="#4" class="whiteButton">Submit</a>
</div>
<div id="4">
	<div class="toolbar">
		<a href="#" class="back">Back</a>
		<h1>Set-up</h1>
		<a href="#settings" class="button rightButton flip" style="">Settings</a>
	</div>
	<ul>
		<li>
			<?php  echo $Username; ?> <a href="Logout.php" >logout</a>
		</li>
	</ul>
	<?php
		$begin = $end;
		$end += count($PostOpQuestions);
		$ResidentForm->render('SliderRenderer', $begin, $end);
		$nameCounter = 0;
	?>
	<a style="margin:0 10px;color:rgba(0,0,0,.9)" href="#5" class="whiteButton">Submit</a>
</div>
<div id="5">
	<div class="toolbar">
		<a href="#" class="back">Back</a>
		<h1>Set-up</h1>
		<a href="#settings" class="button rightButton flip" style="">Settings</a>
	</div>
	<ul>
		<li>
			<?php  echo $Username; ?> <a href="Logout.php" >logout</a>
		</li>
	</ul>
	<?php
		$begin = $end;
		$end += count($ProcCheckQuestions);
		$ResidentForm->render('ICformRenderer', $begin, $end);
		$nameCounter = 0;
	?>
	<a style="margin:0 10px;color:rgba(0,0,0,.9)" href="#6" class="whiteButton">Submit</a>
</div>

<div id="6">
	<div class="toolbar">
		<a href="#" class="back">Back</a>
		<h1>Set-up</h1>
		<a href="#settings" class="button rightButton flip" style="">Settings</a>
	</div>
	<ul>
		<li>
			<?php  echo $Username; ?> <a href="Logout.php" >logout</a>
		</li>
	</ul>
	<?php
		$begin = $end;
		// $end += $numSmallText;
		$end += 8;
		$ResidentForm->render('InlineTextRenderer', $begin, $end);
		$ResidentForm->render('CheckBoxRenderer', $end, $end + 1);
		$end++;
		$ResidentForm->render('SliderRenderer', $end, $end + 1);
		$end++;
		$nameCounter = 0;
	?>
	<a style="margin:0 10px;color:rgba(0,0,0,.9)" href="#3" class="whiteButton">Submit</a>
</div>



<div id="settings">
	<div class="toolbar">
		<a href="#" class="back">Back</a>
		<h1>Settings</h1>
		<a href="#" class="button rightButton flip" style="">Settings</a>
	</div>
	<ul class="rounded">
		<li>
			<input type="range"/>
		</li>
	</ul>
</div>




