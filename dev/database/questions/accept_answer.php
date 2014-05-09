<?php
	
	function acceptAnswer($id){
		global $conn;

	     $stmt = $conn->prepare("
	        UPDATE \"Answer\" SET \"isAccepted\" = TRUE WHERE \"idAnswer\" = ?
	      ");

	    $stmt->execute(array($id));

	}

	function removeAcceptedAnswer($id){
		global $conn;

	     $stmt = $conn->prepare("
	        UPDATE \"Answer\" SET \"isAccepted\" = FALSE WHERE \"idAnswer\" = ?
	      ");

	    $stmt->execute(array($id));

	}
	

?>