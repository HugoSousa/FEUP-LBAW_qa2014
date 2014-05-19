<?php

function acceptTag($id){
	global $conn;

	$stmt = $conn->prepare("UPDATE \"Tag\" SET \"isAccepted\" = TRUE WHERE \"idTag\" = ? ");

	return $stmt->execute(array($id));
}

function rejectTag($id){
	global $conn;

	$stmt = $conn->prepare("DELETE FROM \"Tag\" WHERE \"idTag\" = ? ");

	return $stmt->execute(array($id));
}


?>