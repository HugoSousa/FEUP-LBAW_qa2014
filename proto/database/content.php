<?php

	function insertContent($text, $userID, $type){
		global $conn;

		$query = " INSERT INTO \"Content\" (\"contentText\", \"userID\", \"type\") 
					VALUES (?, ?, ?)
					RETURNING \"Content\".\"id\"  ";

		$stmt = $conn->prepare($query);

	    $stmt->execute(array($text, $userID, $type));

	    return $stmt->fetchAll();


	}

	function getContentByID($id){
		global $conn;

		$query = " SELECT * FROM \"Content\" WHERE \"id\" = ".$id;

		$stmt = $conn->prepare($query);

	    $stmt->execute();

	    return $stmt->fetch();


	}

?>