<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users/users.php');
  include_once($BASE_DIR .'pages/notifications.php');

  $username = $_GET['username'];

  $user = getUserInfoByUsername($username);
  $topQuestions = getTopQuestionsUser($user['id']);
  $topAnswers = getTopAnswersUser($user['id']);
  
  $smarty->assign('notifications', $notifications);
  $smarty->assign('own', $_SESSION['username']);
  $smarty->assign('user', $user);
  $smarty->assign('topQuestions', $topQuestions);
  $smarty->assign('topAnswers', $topAnswers);
  $smarty->display('users/show_user.tpl');
?>
