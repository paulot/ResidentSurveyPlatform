<?php 
	function makeHeader($title){
		echo "<!DOCTYPE html>
				<html>
				<head>
				<meta charset=\"UTF-8\">
				<link href=\"style.css\" rel=\"stylesheet\">
				<!-- JavaScript -->
				<script type=\"text/javascript\" src=\"func.js\"></script>
				<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js\"></script> 
				<title>" . $title . "</title></head>";
	}

?>