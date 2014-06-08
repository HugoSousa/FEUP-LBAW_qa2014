<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users/users.php');
  include_once($BASE_DIR .'pages/notifications.php');

  $user_name = $_GET['username'];

  try{
    $user = getUserInfoByUsername($user_name);
    $topQuestions = getTopQuestionsUser($user['id']);
    $topAnswers = getTopAnswersUser($user['id']);
  }catch(PDOException $e){
    $smarty->display("common/error.tpl");
    $date = date("r");
    file_put_contents($BASE_DIR.'log.txt', $date." - ".$e."\r\n", FILE_APPEND | LOCK_EX);
    exit;
  }
  
  $smarty->assign('notifications', $notifications);
  $smarty->assign('own', $_SESSION['username']);
  $smarty->assign('user', $user);
  $smarty->assign('topQuestions', $topQuestions);
  $smarty->assign('topAnswers', $topAnswers);
  $smarty->display('users/show_user.tpl');
?>
