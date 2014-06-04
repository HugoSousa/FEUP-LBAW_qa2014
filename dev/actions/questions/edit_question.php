<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/questions/edit_content.php');  

  if (!$_POST['id'] || !$_POST['title'] || !$_POST['body'] || !$_POST['tags']) {
    $_SESSION['error_messages'][] = 'All fields are mandatory';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/questions/list_all.php');
    exit;
  }

  $id = $_POST['id'];
  $title = $_POST['title'];
  $body = $_POST['body'];
  $tags = $_POST['tags'];
  $userID = $_SESSION['userid'];

  $body = str_replace(array("\r\n\r\n", "\n\n"), '<br>', $body, $i);
  
  try{
  	editQuestion($id, $body, $title, $tags);
   
    header("Location: $BASE_URL" . 'pages/questions/show_question.php?id=' . $id);
  }catch(PDOException $e){
  	
    $exception = false;

    global $conn;
    $conn->rollBack();

  	echo $e->getMessage();
  }

?>