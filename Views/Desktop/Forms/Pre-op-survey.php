<?php 
	require_once '../Assets/Functions/Form/Form.php';
?>


				<?php 
				
						$preOpSurvey = new Form("Pre Operative Survey");
				
						$preOpSurvey->makeHeader("Pre-operative Survey", "Spinal Anesthesia Teaching Module: Spinal Anesthesia Procedural Checklist", "Procedural-checklist.php", "Pre_Op_Survey");
						
						
					$questions = array(
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
				
				
					$i = 0;
					foreach($questions as $question){
						$preOpSurvey->makeSliderQuestion($question, 1, 5, "PreOp" . $i++, "PreOpAns" . $i);
					}
					
					
					$preOpSurvey->makeSubmitButton();
				?>
	 
<?php 
	//makeMenu();
?>
