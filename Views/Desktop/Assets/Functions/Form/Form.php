<?php 
	//XXX: DEPRECATED!!! This file is deprecated it's gross and horrible don't use it!
	//require_once 'Question.php';
	class Form{
			private $questions;	//Keeps an array of question-answer pairs
			
			private $name;
			public function __construct($name = "Default Form"){
				$this->name = $name;
				$question = array();
			}
			public function getQuestions(){ return $this->questions; }
			public function setQuestions($arr){ $this->questions = $arr; }
			
			public function getName(){ return $this->name; }
			public function setName($name){ $this->name = $name; }
			
			
			public function makeHeader($title, $subtitle, $nextPage, $tableName){
				echo "<!DOCTYPE html>
					<html>
					<head>
					<meta charset=\"UTF-8\">
					<link href=\"../Assets/CSS/form-style.css\" rel=\"stylesheet\">
					<!-- JavaScript -->
					<script type=\"text/javascript\" src=\"../../Assets/Javascript/func.js\"></script>
					<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js\"></script> 
					<title>" . $title . "</title></head>";
				echo
					'<body>
						<div id="container">
							<form action="../Submission/Submit.php?nextPage=' . urlencode($nextPage) . '&tableName=' . urlencode($tableName) .'" method="post">
								<h1 class="header">' . $subtitle .'</h1>
								<hr>
								<ul class="question-list">
									<!-- Each question is a li -->';
			}
			
			
			public function makeICRadioQuestion($question, $name){
				echo	'<li class="questions">
							<strong class = "title">' . $question . '</strong>
							<span class="answer"><input type="radio" name="' . $name . '" class="radioButtons" value = "Yes" checked="checked"><label>Yes</label></span>
							<span class="answer"><input type="radio" name="' . $name . '" class="radioButtons" value = "No"><label>No</label></span>
							<span class="answer"><input type="radio" name="' . $name . '" class="radioButtons" value = "Partial"><label>Partial</label></span>
						</li>';
				$this->questions[$question] = $name;
			}
			
			
			public function makeBigTextQuestion($question, $name){
				echo	'<li class="questions">
							<strong class = "title">' . $question . '</strong>
							<span class="answer">
								<textarea id="groupText"  name="' . $name . '" class="bigText" onclick="this.innerHTML=\'\'"
								onfocus="this.select()" onblur="this.innerHTML=!this.innerHTML?\'Insert Text Here\':this.innerHTML;">Insert Text Here</textarea>
							</span>
						</li>';
				$this->questions[$question] = $name;
			}
			
			public function makeSubmitButton(){
				echo '<li class="button">
						<input id="submitbutton" class="submitButtons" type="submit" value="Submit"/>
					</li>';
			}
			
			public 	function makeRadioQuestion($question, $choices, $name){ //The question to be asked, an array of choice names and the name identifier of the question
				echo '<li class="questions">';
				echo '<strong class = "title">' . $question . '</strong>';
				$first = ' checked = "checked"';
				foreach($choices as $choice){
					echo '<label class="answer-label"><span class="answer"><input type="radio" ' . $first .  ' name="' . $name . '" class="radioButtons" value = "' . $choice . '">' . $choice . '</span></label>';
					$first = " ";
				}
				echo '</li>';
				
				$this->questions[$question] = $name;
			}
			
			public function makeSliderQuestion($question, $min, $max, $name, $ansID){
				echo '<li class="questions"><strong class = "title">' . $question . '</strong>
							<span class="answer">
								<table class="sliderTable">
									<tr class="sliderTable">
										<td></td>
										<td class="sliderLabel"><label id="' . $ansID . '" class="sliderLabel">
											' . ceil(($max+$min)/2) . '
										</label> </td>
										<td></td>
									</tr>
									<tr class="sliderTable">
										<td class="sliderTable">' . $min . '</td>
										<td><input type="range" name="' . $name . '" class="rangeSlider" min="' . $min . '" max="' . $max . '" onchange="updateElementHTML(\'' . $ansID . '\', ' . "this" . '.value)"></td>
										<td class="sliderTable">' . $max . '</td>
									</tr>
								</table>
							</span></li>';
				$this->questions[$question] = $name;
			}
			
			
			public function makeConvertibleSliderQuestion($question, $min, $max, $name, $ansID, $choiceArr){
				echo '<li class="questions"><strong class = "title">' . $question . '</strong>
							<span class="answer">
								<table class="sliderTable">
									<tr class="sliderTable">
										<td></td>
										<td class="sliderLabel">
											<input id="' . $ansID . '" value="' . ceil(($max+$min)/2) . '" type="text" class="tinyTextBox" onchange="updateElement(\''. $name . "deadMau5" .'\', this.value);
																																						convertValue(document.getElementById(\''. $name . "DropTheBeatDown" .'\').value, document.getElementById(\''. $ansID .'\').value, ' . $name . ');" maxlength="4">
											<select id="'. $name . "DropTheBeatDown" .'" class="dropdown" onchange="convertValue(document.getElementById(\''. $name . "DropTheBeatDown" .'\').value, document.getElementById(\''. $ansID .'\').value, ' . $name . ');">';
											
											foreach($choiceArr as $choice){
												echo '<option value="' . $choice . '">' . $choice . '</option>';									
											}
  										
											
											
											
				echo					'</select>
										<input value = "' . ceil(($max+$min)/2) . '"type="hidden" name=' . $name . ' id = ' . $name . ' onsubmit="convertValue(document.getElementById(\''. $name . "DropTheBeatDown" .'\').value, document.getElementById(\''. $ansID .'\').value, ' . $name . ');">
										</td>
										<td></td>
									</tr>
									<tr class="sliderTable">
										<td class="sliderTable">' . $min . '</td>
										<td><input type="range" id="' . $name . "deadMau5" . '" class="rangeSlider" min="' . $min . '" max="' . $max . '" onchange="updateElement(\'' . $ansID . '\', this.value);
																																							convertValue(document.getElementById(\''. $name . "DropTheBeatDown" .'\').value, document.getElementById(\''. $ansID .'\').value, ' . $name . ');"></td>
										<td class="sliderTable">' . $max . '</td>
									</tr>
								</table>
							</span></li>';
			}
			
			
			public function makeSmallTextQuestion($question, $name, $length){
				echo	'<li class="questions">
							<strong class = "title">' . $question . '</strong>
							<span class="answer">
								<input type="text" name="' . $name .'" class="mediumText" maxlength="' . $length . '
								onclick="this.value=\'\';" onfocus="this.select();" onblur="this.value=!this.value?\'Enter Text\':this.value;" value="Enter Text">
							</span>
						</li>';
				$this->questions[$question] = $name;
			}
			
			
			public function makeCheckboxQuestion($value, $name){
		
				

				echo '<label class="answer-label"><span class="answer"><input type="checkbox" name="' . $name . '" class="radioButtons" value = "1">' . $value . '</span></label>';
				
				
				$this->questions[$value] = $name;
			}
			
			public function makeOtherCheckbox($name){
				echo '<label class="answer-label"><span class="answer"><input type="checkbox" name="' . $name . '" class="radioButtons" value = "1" onchange="openCloseOther(document.getElementById(\'' . $name . "OtherBox" . '\'), this);">Other</span></label>';
				echo '<input id="' . $name . "OtherBox" . '" name="' . $name . "Text" . '" type="text" class="mediumTextOther" maxlength="100">';
			}
			
			
			
			public function checkFields($fields, $toCheck){
				$field_errors = array();
				$i = 0;
				foreach($fields as $field) {
					if (!isset($toCheck[$field]) || empty($toCheck[$field])) { 
						$field_errors[$i++] = $field; 
					}
				} return $field_errors;
			}
			public function checkNumericFields($fields, $toCheck){
				$field_errors = array();
				$i = 0;
				foreach($fields as $field) {
					if (!isset($toCheck[$field]) || empty($toCheck[$field]) || !is_numeric($toCheck[$field])) { 
						$field_errors[$i++] = $field; 
					}
				} return $field_errors;
			}
	}

?>
