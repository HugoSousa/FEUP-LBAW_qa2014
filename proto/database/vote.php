<?php

	function addVoteAnswer($userID, $answerID, $isUP){

		global $conn;

		$query = " INSERT INTO \"VoteAnswer \" (\"idUser\", \"idAnswer\", \"isUp\") 
					VALUES (".$userID.",".$answerID."," .$isUp" ) ";

		$stmt = $conn->prepare($query);

	    $stmt->execute();

	}

	function addVoteQuestion ($userID, questionID, isUp){

		global $conn;

		$query = " INSERT INTO \"VoteQuestion \" (\"idUser\", \"idAnswer\", \"isUp\") 
					VALUES (".$userID.",".$answerID."," .$isUp" ) ";

		$stmt = $conn->prepare($query);

	    $stmt->execute();

	}

?>