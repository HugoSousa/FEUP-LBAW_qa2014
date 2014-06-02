<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users/users.php');  

  if (!$_POST['name'] || !$_POST['login'] || !$_POST['email'] || !$_POST['password1'] || !$_POST['password2']) {
    $_SESSION['error_messages'][] = 'All fields are mandatory';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/register.php');
    exit;
  }

  $name = strip_tags($_POST['name']);
  $login = strip_tags($_POST['login']);
  $email = strip_tags($_POST['email']);
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];

  if($password1 != $password2){
    $_SESSION['error_messages'][] = 'Wrong password confirmation';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/register.php');
    exit;
  }

  $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/';
  if(preg_match($pattern, $password1) == 0){
    $_SESSION['error_messages'][] = 'Wrong password format';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/register.php');
    exit;
  }

  try {
    createUser($email, $login, $password1, $name);
  } catch (PDOException $e) {
    $exception = false;

    if (strpos($e->getMessage(), 'User_username_key') !== false) {
      $_SESSION['error_messages'][] = 'Duplicate username';
      $_SESSION['field_errors']['name'] = 'Username already exists';
      $exception = true;
    } 
    if (strpos($e->getMessage(), 'User_email_key') !== false) {
      $_SESSION['error_messages'][] = 'Duplicate email';
      $_SESSION['field_errors']['email'] = 'Email already exists';
      $exception = true;
    } 
    if (strpos($e->getMessage(), 'User_login_key') !== false) {
      $_SESSION['error_messages'][] = 'Duplicate login';
      $_SESSION['field_errors']['login'] = 'Login already exists';
      $exception = true;
    } 

    if(! $exception)
      $_SESSION['error_messages'][] = 'Error creating user';

    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/register.php');
    exit;
  }
  $_SESSION['success_messages'][] = 'User registered successfully';  
  header("Location: $BASE_URL");
?>
