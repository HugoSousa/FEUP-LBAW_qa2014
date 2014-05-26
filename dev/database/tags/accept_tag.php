<?php
	
function acceptAnswer($id){
	global $conn;
	$stmt = $conn->prepare("UPDATE \"Tag\" SET \"isAccepted\" = TRUE WHERE \"idTag\" = ?");
	$stmt->execute(array($id));
}

function removeAcceptedAnswer($id){
	global $conn;
	$stmt = $conn->prepare("UPDATE \"Tag\" SET \"isAccepted\" = FALSE WHERE \"idTag\" = ?");
	$stmt->execute(array($id));
}	

?>