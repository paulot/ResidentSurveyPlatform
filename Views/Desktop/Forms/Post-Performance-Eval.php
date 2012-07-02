<?php 
	require_once '../Assets/Functions/Form/Form.php';
?>


				<?php 
					
					$postPerfEval = new Form("Post Performance Eval");
				
					$postPerfEval->makeHeader("Pre-operative Survey", "Spinal Anesthesia Teaching Module: Spinal Anesthesia Procedural Checklist", "Post-op-survey.php", "Post_Perf_Eval");
				
					$smallTextQuestions = array(
						"Was the spinal level checked after delivery of spinal anesthetic appropriate for surgical anesthesia?",
						"What needle was used?",
						"What needle gauge was used?",
						"What spinal level was used?",
						"What patient position was used?",
						"What anatomical approach was used?  (midline, paramedian)",
						"How many redirections with the finder needle were used?",
						"How much blood was lost during the procedure?",
					);
					$i = 0;
					foreach ($smallTextQuestions as $question){	
						$postPerfEval->makeSmallTextQuestion($question, "PosPer" . $i++, 100);
					}
				
				
				
				
				
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
					
					echo '<li class="questions">
							<strong class = "title">' . "Please circle any of the following complications if they occurred: " . '</strong>';
				
					foreach ($checkBoxValues as $question){	
						$postPerfEval->makeCheckboxQuestion($question, "PosPer" . $i++);
					}
					
					$postPerfEval->makeOtherCheckbox("PosPer" . $i++);
					
					echo '</li>';
					
					$postPerfEval->makeSliderQuestion("What is your global assessment of the resident’s performance of this spinal block? Please circle."
					, 1, 5, "PosPer" . $i++, "PosPer" . $i . "Ans");
					
					$postPerfEval->makeSubmitButton();
				?> 
<?php 
	//makeMenu();
?>
