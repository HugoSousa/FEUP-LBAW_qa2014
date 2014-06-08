<?php  
    header('Content-type: application/json');

    include_once('../../config/init.php');
    include_once('../../database/notifications/notifications.php');

    $id = $_POST['id'];
    if(!isset($id))
        $return = array("error" => "Missing parameters.");
    else{

        global $conn;

        try{

        	seeNotification($id);

            $return = array("ok");
        }
        catch(PDOException $e){
            $return = array("error" => "Failed to update notification.");
        }
    }

    echo json_encode($return);
?>