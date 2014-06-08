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

  //echo $body . "<br>";
  $body = str_replace(array("\r\n\r\n", "\n\n"), '<br>', $body, $i);
  $body = str_replace(array("\r\n", "\n"), ' ', $body, $i);
  //echo $i ."<br>";
  //echo $body;
  
  try{
  	$questionID = createQuestion($title, $body, $userID, $tags);

    //retornar o id da questão criada
    header("Location: $BASE_URL" . 'pages/questions/show_question.php?id=' . $questionID);
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
    } 
  }
  

?>