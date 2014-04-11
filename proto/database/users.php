<?php
  
  function createUser($email, $login, $password, $username) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO \"User\" VALUES (DEFAULT, NULL, ?, NULL, ?, ?, NULL, DEFAULT, ?, DEFAULT, DEFAULT)");
    $stmt->execute(array($email, $login, hash("sha256", $password), $username));
  }


  function isLoginCorrect($username, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM \"User\"
                            WHERE login = ? AND password = ?");
    $stmt->execute(array($username, hash("sha256", $password)));
    return $stmt->fetch() == true;
  }

  function getReputation($username, $password){
    global $conn;
    $stmt = $conn->prepare("SELECT reputation 
                            FROM \"User\"
                            WHERE login = ? AND password = ?");
    $stmt->execute(array($username, hash("sha256", $password)));
    
    $reputation = $stmt->fetch();
    return $reputation['reputation'];

  } 
  
?>
