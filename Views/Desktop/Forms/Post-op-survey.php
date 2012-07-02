<?php 
	require_once '../Assets/Functions/Form/Form.php';
?>

				<?php 
				
					$postOpSurvey = new Form("Post Operative Survey");
					
					$postOpSurvey->makeHeader("Post Operative Survey", "Spinal Anesthesia Teaching Module: Post Operative Survey", "#", "Post_Op_Survey");
					
					
				
					$questions = array(
							"Is it clear to you who your resident anesthesiologist was during your surgery?",
							"Is it clear what your resident anesthesiologist’s role was in your care during surgery?",
							"Did your resident anesthesiologist address you with respect throughout your operative care?",
							"Did your resident anesthesiologist ask you for permission to examine you throughout your operative care?",
							"Did your resident anesthesiologist address your questions and concerns throughout your operative care?",
							"Did your resident anesthesiologist provide explanations of what will happen next throughout your operative care?",
							"Was your pain well controlled post-operatively?",
							"During your operative care, what is your overall satisfaction with your resident anesthesiologist?"
					);
				
				
					$i = 0;
					foreach($questions as $question){
						$postOpSurvey->makeSliderQuestion($question, 1, 5, "PostOp" . $i++, "PostOpAns" . $i);
					}
					
					
					$postOpSurvey->makeSubmitButton();
				?>
	 
<?php 
	makeMenu();
?>
