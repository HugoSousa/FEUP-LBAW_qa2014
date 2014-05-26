 <?php

 	header('Content-type: application/json');

    include_once('../../config/init.php');
    include_once('../../database/questions/flag.php');

    $id = $_POST['id'];
    $user = $_POST['user'];
    $reason = $_POST['reason'];

    try{
        insertFlag($id, $user, $reason);
        $return = array("ok");        
    }
    catch(PDOException $e){
        if (strpos($e->getMessage(), 'Flag_pkey') !== false) {
          $_SESSION['error_messages'][] = 'Already flagged this content';
          //$_SESSION['field_errors']['name'] = 'Username already exists';
          $return = array("error" => "Already flagged this content.");
        }
        else{
          $return = array("error" => "Unexpected error inserting flag in database.");  
        } 
        
    }

    echo json_encode($return);

?>