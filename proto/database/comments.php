<?php

	function insertCommentAnswer($contentID, $answerID){

		global $conn;

		$query = " INSERT INTO \"CommentAnswer\" (\"idComment\", \"idAnswer\") 
					VALUES (".$contentID.",".$answerID.") ";

		$stmt = $conn->prepare($query);

	    $stmt->execute();

	}

	function insertCommentQuestion($contentID, $questionID){

		global $conn;

		$query = " INSERT INTO \"CommentQuestion\" (\"idComment\", \"idQuestion\") 
					VALUES (".$contentID.",".$questionID.") ";

		$stmt = $conn->prepare($query);

	    $stmt->execute();

	}



	



?>