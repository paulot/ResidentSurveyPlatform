<?php 
	require_once '../Requires/Require_ALL.php';
?>

<?php 
	
	$patientDemInfo = new Form("Patient Demographic Information");
	
	$patientDemInfo->makeHeader("Patient Demographic Info", "Spinal Anesthesia Teaching Module: Patient Demographic Info", "Informed-consent.php", "Patient_Dem_Info");
	
	$name = "PatDem";
	$i = 0;
	
	$choices = array("Male", "Female");
	$patientDemInfo->makeRadioQuestion("What is the Patient's gender?", $choices, $name . $i++);
	
	
	$smallTextQuestions = array(
								"What is the Patient's First Name?",
								"What is the Patient's Last Name?"
					);
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
	
	
	$patientDemInfo->makeSubmitButton();
?>	 
<?php 
	//makeMenu();
?>
