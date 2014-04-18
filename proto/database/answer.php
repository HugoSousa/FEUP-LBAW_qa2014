<?php

	function insertAnswer($answerID, $questionID){

		global $conn;

		$query = " INSERT INTO \"Answer\" (\"idAnswer\", \"idQuestion\") 
					VALUES (".$answerID.",".$questionID.") ";

		$stmt = $conn->prepare($query);

	    $stmt->execute();

	}

?>