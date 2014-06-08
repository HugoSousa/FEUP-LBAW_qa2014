<?php
	function editQuestion($id, $body, $title, $tags){

		editQuestionBody($id, $body);

		editQuestionTitle($id, $title);

  }

	function editQuestionBody($id, $body){
	    global $conn;

	    $query = "UPDATE \"Content\" SET \"contentText\" = ? WHERE \"id\" = ?";

	    $stmt = $conn->prepare($query);
	    $stmt->execute(array($body, $id));
  }

  	function editQuestionTitle($id, $title){
	    global $conn;

	    $query = "UPDATE \"Question\" SET \"title\" = ? WHERE \"idQuestion\" = ?";

	    $stmt = $conn->prepare($query);
	    $stmt->execute(array($title, $id));
  }

	function editAnswer($id, $body){
	    global $conn;

	    $query = "UPDATE \"Content\" SET \"contentText\" = ? WHERE \"id\" = ?";

	    $stmt = $conn->prepare($query);
	    $stmt->execute(array($body, $id));
  }

  function editComment($id, $body){
	    global $conn;

	    $query = "UPDATE \"Content\" SET \"contentText\" = ? WHERE \"id\" = ?";

	    $stmt = $conn->prepare($query);
	    $stmt->execute(array($body, $id));
  }

?>