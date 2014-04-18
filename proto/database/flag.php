<?php

	function flagContent($contentID, $userID, $reason){

		global $conn;

		$query = " INSERT INTO \"Flag \" (\"idContent\", \"idUSer\", \"reason\") 
					VALUES (".$contentID.",".$userID."," .$reason" ) ";

		$stmt = $conn->prepare($query);

	    $stmt->execute();

	}

?>
