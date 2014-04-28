<?php

	function deleteContent($id){
	    global $conn;

	    $query = "DELETE FROM \"Content\" WHERE \"id\" = ?";

	    $stmt = $conn->prepare($query);
	    $stmt->execute(array($id));
  }

?>