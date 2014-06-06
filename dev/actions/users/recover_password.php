<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users/users.php');  

  if (!$_POST['login'] || !$_POST['email']) {
    $_SESSION['error_messages'][] = 'All fields are mandatory';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/recover_password.php');
    exit;
  }

  $login = strip_tags($_POST['login']);
  $email = strip_tags($_POST['email']);
  
  //verificar se o login e o email sao da mesma pessoa
  $info = getUserInfoByLogin($login);
  if($info['email'] == $email){
    //mandar email para o utilizador com uma pagina
    //gerar password aleatoria
    //modificar na BD

    $username = $info['username'];
    $new_password = generateRandomString();

    try{
      editUser($username, 'password', hash("sha256", $new_password));
    }catch(PDOException $e){
      $smarty->display("common/error.tpl");
      $date = date("r");
      file_put_contents($BASE_DIR.'log.txt', $date." - ".$e."\r\n", FILE_APPEND | LOCK_EX);
      exit;
    }

    $message = "Hello ". $username . ".<br> Your new password is: <strong>"  . $new_password . "</strong><br>. We recommend you to change it as soon as possible in <a href=\"gnomo.fe.up.pt/dev\">our website</a>.<br><br> Thanks.";

    ini_set('SMTP', "smtp.fe.up.pt");
    $headers = 'From: qa2014_noreply@fe.up.pt' . "\r\n" . 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    //cuidado a testar isto para nao enviar mails aleatorios
    mail($email, 'Q&A2014 - Password Recovery', $message, $headers);
    $_SESSION['success_messages'][] = 'An email has been sent with a new password. Please check it!';
    header("Location: $BASE_URL" . 'pages/questions/list_all.php');
  }
  else{
    $_SESSION['error_messages'][] = 'The referred email isn\'t associated with the login.';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/recover_password.php');
    exit;
  }


  function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}


?>
