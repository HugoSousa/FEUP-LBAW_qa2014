<?php

	function insertContent($text, $userID, $type){
		global $conn;

		$query = " INSERT INTO \"Content\" (\"contentText\", \"userID\", \"type\") 
					VALUES ('".$text."',".$userID.", '".$type."')
					RETURNING \"Content\".\"id\"  ";

		$stmt = $conn->prepare($query);

	    $stmt->execute();

	    return $stmt->fetchAll();


	}

?>