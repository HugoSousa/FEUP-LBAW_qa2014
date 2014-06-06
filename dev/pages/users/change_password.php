<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users/users.php');

  if($_SESSION['userid'] != $_GET['id'] || !isset($_GET['id']) || !isset($_SESSION['userid'])) {
  	header('Location: ' . $BASE_URL);
  	exit;
  }

  $smarty->assign('id', $_GET['id']);
  $smarty->display('users/change_password.tpl');
?>