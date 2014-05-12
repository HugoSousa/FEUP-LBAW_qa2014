<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/questions/edit_content.php');  

  if (!$_POST['idAnswer'] || !$_POST['idQuestion'] || !$_POST['body']) {
    $_SESSION['error_messages'][] = 'All fields are mandatory';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/questions/list_all.php');
    exit;
  }

  $idAnswer = $_POST['idAnswer'];
  $idQuestion = $_POST['idQuestion'];
  $body = $_POST['body'];
  $userID = $_SESSION['userid'];

  $body = str_replace(array("\r\n\r\n", "\n\n"), '<br>', $body, $i);
  
  try{
  	
    editAnswer($idAnswer,$body);
   
    header("Location: $BASE_URL" . 'pages/questions/show_question.php?id=' . $idQuestion.'#'.$idAnswer);
  }catch(PDOException $e){
  	
    $exception = false;

    global $conn;
    $conn->rollBack();

  	echo $e->getMessage();

     /*if (strpos($e->getMessage(), '"idTag" violates not-null constraint') !== false) {
      $_SESSION['error_messages'][] = 'Invalid tag';
      $_SESSION['field_errors']['tags'] = 'This tag doesn\'t exist.';
      $exception = true;
      //echo 'Entrei aqui';
    } */
  }
  
  //echo 'fim';

?>