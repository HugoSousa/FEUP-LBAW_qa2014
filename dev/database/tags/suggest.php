<?php

function suggestTag($name,$description){
	global $conn;

	$stmt = $conn->prepare("INSERT INTO \"Tag\"(name,description) VALUES(?,?) ");

	return $stmt->execute(array($name,$description));
}

?>