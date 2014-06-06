<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users/users.php');  


  if (!$_POST['old_password'] || !$_POST['new_password'] || !$_POST['new_password2'] || !$_POST['user_id']) {
    $_SESSION['error_messages'][] = 'All fields are mandatory';
    $_SESSION['form_values'] = $_POST;
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
  }

  $old_password = strip_tags($_POST['old_password']);
  $new_password = strip_tags($_POST['new_password']);
  $new_password2 = strip_tags($_POST['new_password2']);
  $user_id = $_POST['user_id'];

  $user = getUserInfoById($user_id);

  if(isLoginCorrect($user['login'], $old_password)){
    if($new_password == $new_password2){
      editUser($user['username'], 'password', hash("sha256", $new_password));
      $_SESSION['success_messages'][] = 'Password changed succesfully.';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }
    else{
      $_SESSION['error_messages'][] = 'Wrong new password confirmation.';
      $_SESSION['form_values'] = $_POST;
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit;
    }
  }
  else{
    $_SESSION['error_messages'][] = 'Wrong password.';
    $_SESSION['form_values'] = $_POST;
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
  }

?>
