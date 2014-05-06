<?php

	function insertAnswer($answerID, $questionID){

		global $conn;

		$query = " INSERT INTO \"Answer\" (\"idAnswer\", \"idQuestion\") 
					VALUES (".$answerID.",".$questionID.") ";

		$stmt = $conn->prepare($query);

	    $stmt->execute();

	}

	function getAnswer($id){
		global $conn;

		$query = " SELECT * FROM \"Answer\" WHERE \"idAnswer\" = ".$id;

		$stmt = $conn->prepare($query);

	    $stmt->execute();

	    return $stmt->fetch();


	}

?>