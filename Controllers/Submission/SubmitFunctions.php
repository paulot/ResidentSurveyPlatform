<?php 
	function RedirectTo($location) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
?>