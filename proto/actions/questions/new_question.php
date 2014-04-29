<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/questions.php');  

  if (!$_POST['title'] || !$_POST['body'] || !$_POST['tags']) {
    $_SESSION['error_messages'][] = 'All fields are mandatory';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/questions/new_question.php');
    exit;
  }

  $title = $_POST['title'];
  $body = $_POST['body'];
  $tags = $_POST['tags'];
  $userID = $_SESSION['userid'];

  try{
  	createQuestion($title, $body, $userID, $tags);
  }catch(PDOException $e){
  	echo 'erro aqui tambem';
  	echo $e->getMessage();
  	//$conn->rollBack();
  	//tags invalidas
  }

  echo 'fim';

?>