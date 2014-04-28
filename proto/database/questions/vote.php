<?php

  function insertVoteAnswer($user, $id, $isup){
    global $conn;

    $query = "INSERT INTO \"VoteAnswer\" VALUES(?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->execute(array($user, $id, $isup));
  }

  function updateVoteAnswer($isup, $user, $id){
    global $conn;

    $query = "UPDATE \"VoteAnswer\" SET \"isUp\" = ? WHERE \"idUser\" = ? AND \"idAnswer\" = ?";

    $stmt = $conn->prepare($query);
    $stmt->execute(array($isup, $user, $id));
  }

  function insertVoteQuestion($user, $id, $isup){
      global $conn;

      $query = "INSERT INTO \"VoteQuestion\" VALUES(?, ?, ?)";

      $stmt = $conn->prepare($query);
      $stmt->execute(array($user, $id, $isup));    
  }

  function updateVoteQuestion($isup, $user, $id){
    global $conn;

    $query = "UPDATE \"VoteQuestion\" SET \"isUp\" = ? WHERE \"idUser\" = ? AND \"idQuestion\" = ?";

    $stmt = $conn->prepare($query);
    $stmt->execute(array($isup, $user, $id));
  }

  function deleteVoteAnswer($id, $user){
    global $conn;

    $query = "DELETE FROM \"VoteAnswer\" WHERE \"idAnswer\" = ? AND \"idUser\" = ?";
   
    $stmt = $conn->prepare($query);
    $stmt->execute(array($id, $user));
  }

  function deleteVoteQuestion($id, $user){
    global $conn;
    
    $query = "DELETE FROM \"VoteQuestion\" WHERE \"idQuestion\" = ? AND \"idUser\" = ?";

    $stmt = $conn->prepare($query);
    $stmt->execute(array($id, $user));
  }

?>