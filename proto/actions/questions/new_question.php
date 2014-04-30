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
    $exception = false;

    global $conn;
    $conn->rollBack();

  	echo $e->getMessage();

     if (strpos($e->getMessage(), '"idTag" violates not-null constraint') !== false) {
      $_SESSION['error_messages'][] = 'Invalid tag';
      $_SESSION['field_errors']['tags'] = 'This tag doesn\'t exist.';
      $exception = true;
      echo 'Entrei aqui';
    } 
  }

  echo 'fim';

?>