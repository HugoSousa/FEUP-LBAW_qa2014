<?php

	function addVoteQuestion ($userID, $questionID, $isUp){

		global $conn;

		$query = " DELETE FROM \"VoteQuestion\" (\"idUser\", \"idAnswer\", \"isUp\") 
				VALUES (".$userID.",".$answerID."," .$isUp") ";

		$stmt = $conn->prepare($query);

	    $stmt->execute();

	}

?>