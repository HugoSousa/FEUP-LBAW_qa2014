<?php
  session_set_cookie_params(3600); //FIXME
  session_start();

  $BASE_DIR = '/wamp/www/dev/'; //FIXME
  $BASE_URL = '/dev/'; //FIXME
  try{
    $conn = new PDO('pgsql:host=localhost;dbname=lbaw1346', 'postgres', 'root'); //FIXME
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec('SET SCHEMA \'public\''); //FIXME
  }catch(PDOException $e){
    //mostrar uma pagina de erro
    include_once($BASE_DIR . 'lib/smarty/Smarty.class.php');
    $smarty = new Smarty;
    $smarty->template_dir = $BASE_DIR . 'templates/';
    $smarty->compile_dir = $BASE_DIR . 'templates_c/';
    $smarty->assign('BASE_URL', $BASE_URL);
    $smarty->display("common/error.tpl");
    $date = date("r");
    file_put_contents($BASE_DIR.'log.txt', $date." - ".$e."\r\n", FILE_APPEND | LOCK_EX);
    exit;
  }

  include_once($BASE_DIR . 'lib/smarty/Smarty.class.php');
  
  $smarty = new Smarty;
  $smarty->template_dir = $BASE_DIR . 'templates/';
  $smarty->compile_dir = $BASE_DIR . 'templates_c/';
  $smarty->assign('BASE_URL', $BASE_URL);

  
  $smarty->assign('ERROR_MESSAGES', $_SESSION['error_messages']);  
  $smarty->assign('FIELD_ERRORS', $_SESSION['field_errors']);
  $smarty->assign('SUCCESS_MESSAGES', $_SESSION['success_messages']);
  $smarty->assign('FORM_VALUES', $_SESSION['form_values']);
  $smarty->assign('USERNAME', $_SESSION['username']);
  $smarty->assign('REPUTATION', $_SESSION['reputation']);
  $smarty->assign('USERID', $_SESSION['userid']);
  $smarty->assign('PERMISSION', $_SESSION['permission']);
  
  unset($_SESSION['success_messages']);
  unset($_SESSION['error_messages']);  
  unset($_SESSION['field_errors']);
  unset($_SESSION['form_values']);
?>
