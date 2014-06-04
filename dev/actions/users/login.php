<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users/users.php');  

  if (!$_POST['login'] || !$_POST['password']) {
    $_SESSION['error_messages'][] = 'Invalid login';
    $_SESSION['form_values'] = $_POST;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }

  $login = $_POST['login'];
  $password = $_POST['password'];

  try{
    if (isLoginCorrect($login, $password)) {

      $user = getUserInfoByLogin($login);

      if(!$user['banned']){
        $_SESSION['username'] = $user['username']; 
        $_SESSION['reputation'] = $user['reputation'];
        $_SESSION['permission'] = $user['permission'];
        $_SESSION['userid'] = $user['id'];
        $_SESSION['success_messages'][] = 'Login successful';
      }
      else{
        $_SESSION['error_messages'][] = 'This account has been banned!';
      }
    } else {
      $_SESSION['error_messages'][] = 'Login failed';  
    }
  }catch(PDOException $e){
    $_SESSION['error_messages'][] = 'Your action wasn\'t successfully completed because an internal error ocurred. The system administrator bas been notified. Sorry for the incovenience.';
    file_put_contents($BASE_DIR.'log.txt', $e->getMessage(), FILE_APPEND | LOCK_EX);
  }
  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
