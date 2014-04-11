<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/questions.php');

  $page = $_GET['page'];
  $questions = getQuestions($page);  
  $pages = ceil(intval(getTotalQuestions())/30);

  $smarty->assign('pages', $pages);
  $smarty->assign('questions', $questions);
  $smarty->assign('page', $page);
  $smarty->display('questions/list_all.tpl');
?>