<?php 
	require_once '../Requires/Require_ALL.php';
?>
<?php 
	//makeHeader("Informed Consent", "Spinal Anesthesia Teaching Module:
///Informed Consent Checklist");

?>
				<?php 
					$questions = array(
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
				
				
					
					$informedConsentForm = new Form("Spinal Anesthesia Teaching Module: Informed Consent Checklist");
					
					$informedConsentForm->makeHeader("Informed Consent", "Spinal Anesthesia Teaching Module: Informed Consent Checklist", "Pre-op-survey.php", "Informed_Consent_Checklist");
					
					//"Additional Comments:";
					$i = 0;
					foreach ($questions as $question){
						$informedConsentForm->makeICRadioQuestion($question, "ICForm" . $i++);
					}
					$informedConsentForm->makeBigTextQuestion("Additional Comments:", "ICForm" . $i++);
					print_r($_POST);
					
					echo "<br>";
					
					//$informedConsentForm->submit($MySQLDB, "Informed_Consent_Checklist");
					
					$informedConsentForm->makeSubmitButton();
				?>	 
<?php 
	//makeMenu();
?>
