<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users/users.php');

  $username = $_GET['username'];
  $field = $_GET['field'];
  $value = $_GET['value'];
  
  if (!$username || !$field || !$value) {
    $_SESSION['form_values'] = $_GET;

    $result = array(error => "parameters missing");

    echo json_encode($result);
    exit;
  }

  if($field != 'realname' && $field != 'location' && $field != 'biography'){
  	$result = array(error => "wrong field");

    echo json_encode($result);
    exit;
  }

  $result = editUser($username, $field, $value);

  if($result)
  	$return = array(ok);
  else
  	$return = $result = array(error => "error on update");
  
  echo json_encode($return);
?>
