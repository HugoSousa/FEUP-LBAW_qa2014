<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users/users.php');

  $username = $_POST['username'];
  
  if (!$username) {
    $result = array(error => "parameters missing");

    echo json_encode($result);
    exit;
  }

  $result = banUser($username);

  if($result)
  	$return = array(ok);
  else
  	$return = array(error => "error on update");
  
  echo json_encode($return);
?>
