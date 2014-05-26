<?php

  function insertFlag($id, $user, $reason){
    global $conn;

    $query = "INSERT INTO \"Flag\" VALUES(?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->execute(array($id, $user, $reason));
  }

?>