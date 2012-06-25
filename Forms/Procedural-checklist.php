<?php 
	require_once '../Requires/Require_ALL.php';
?>
<?php 
	

?>

				<?php 
				
					$proceduralChecklist = new Form("Procedural-Checklist");
					
					$proceduralChecklist->makeHeader("Procedural Checklist", "Spinal Anesthesia Teaching Module: Spinal Anesthesia Procedural Checklist", "Post-Performance-Eval.php", "Procedural_Checklist");
					
					$questions = array(
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
				
				
					$i = 0;
					foreach($questions as $question){
						$proceduralChecklist->makeICRadioQuestion($question, "ProcChck" . $i++);
					}
					
					
					$proceduralChecklist->makeSubmitButton();
				?> 
	 
<?php 
	//makeMenu();
?>