<head>
	<script src="jquery-min.js" type="application/x-javascript" charset="utf-8"></script> 
</head>


<body>
	<div id="form">
		<?php
			ini_set('display_errors',1);
			error_reporting(E_ALL|E_STRICT);
			//echo "shit";
			require_once '/var/www/ResidentSurveyPlatform/Models/Form/Form.php';
			require_once '/var/www/ResidentSurveyPlatform/Models/Form/Question.php';;
			$testQuestion1 = new Question("What is your name?", Array("Paulo", "Alice", "George"));
			$testQuestion2 = new Question("What is your gender?", Array("Female", "Male"));
			$testForm  = new Form(array($testQuestion1, $testQuestion2));

			function testFormRenderer($QuestionAnswerPair) {
				//print_r($QuestionAnswerPair);
				echo	'<form><ul><li class="questions"><strong class = "title">' . $QuestionAnswerPair['question'] . '</strong></li>';
				foreach ( $QuestionAnswerPair['answer'] as $answer) {
					echo '<li><input type="checkbox" name="' . $answer . '" class="radioButtons" value = "' . $answer . '"><label>' . $answer . '</label></li>';
				}
				echo "</ul></form>";
			}
			$testForm->render('testFormRenderer', 0, 2);


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

			$ICform = new Form($ICquestions);


			function ICformRenderer($QuestionAnswerPair) {
				//print_r($QuestionAnswerPair);
				echo	'<form><ul class="rounded">
					<li class="questions"><strong class = "title">' . $QuestionAnswerPair['question'] . '</strong></li>';
				foreach ($QuestionAnswerPair['answer'] as $answer) {
					echo '<li><label><input name="radio" type="radio" value="' . $answer . '">' . $answer . '</label></li>';
				}
				echo "</ul></form>";
			}

			$ICform->render('ICformRenderer', 0, count($ICasking));

			//-------------------------------------------------------------------------------

			





		?>
		<script type="text/javascript">

			function dump(arr,level) {
				var dumped_text = "";
				if(!level) level = 0;
				
				//The padding given at the beginning of the line.
				var level_padding = "";
				for(var j=0;j<level+1;j++) level_padding += "    ";
				
				if(typeof(arr) == 'object') { //Array/Hashes/Objects 
					for(var item in arr) {
						var value = arr[item];
						
						if(typeof(value) == 'object') { //If it is an array,
							dumped_text += level_padding + "'" + item + "' ...\n";
							dumped_text += dump(value,level+1);
						} else {
							dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
						}
					}
				} else { //Stings/Chars/Numbers etc.
					dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
				}
				return dumped_text;
			}



			$.fn.serializeObject = function()
			{
			   var o = {};
			   var a = this.serializeArray();
			   $.each(a, function() {
			       if (o[this.name]) {
			           if (!o[this.name].push) {
			               o[this.name] = [o[this.name]];
			           }
			           o[this.name].push(this.value || '');
			       } else {
			           o[this.name] = this.value || '';
			       }
			   });
			   return o;
			};
			//var formArray = $("#form").serializeObject();

			// $.fn.serializeForm = function(){
			// 	var o = {};
			// 	$('input').each(function(index) { o.push($(this)); });
			// 	return o;
			// };

			var elems = document.getElementsByTagName("input"); // returns a nodeList
    			var arr = jQuery.makeArray(elems);
    			//arr = arr.serializeArray();
    			//JSON.stringify(arr);
   //  			$.ajax({        
			// 	type: "POST",
			// 	url: "ajaxTest.php",
			// 	data: { inputArray : arr }
			// 	// success: function() {
			// 	// 	$("#lengthQuestion").fadeOut('slow');        
			// 	// }
			// }); 
    			//$.each(arr, function(index) { alert($(this).is(':checked')); });
    			//arr.reverse(); // use an Array method on list of dom elements
    			//$(arr).appendTo(document.body);

			
		</script>
	<div>
<body>