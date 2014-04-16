<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');  

  if (!$_POST['login'] || !$_POST['password']) {
    $_SESSION['error_messages'][] = 'Invalid login';
    $_SESSION['form_values'] = $_POST;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }

  $login = $_POST['login'];
  $password = $_POST['password'];

  if (isLoginCorrect($login, $password)) {

    $user = getUserInfoByLogin($login);

    $_SESSION['username'] = $user['username']; 
    $_SESSION['reputation'] = $user['reputation'];
    $_SESSION['permission'] = $user['permission'];
    $_SESSION['userid'] = $user['id'];
    $_SESSION['success_messages'][] = 'Login successful';  
  } else {
    $_SESSION['error_messages'][] = 'Login failed';  
  }
  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
