<?php  
    header('Content-type: application/json');

    include_once('../../config/init.php');
    include_once('../../database/notifications/notifications.php');

    $id = $_POST['id'];

    global $conn;

    try{

    	seeNotification($id);

        $return = array("ok");
    }
    catch(PDOException $e){
        $return = array("error" => "Failed to update notification.");
    }

    echo json_encode($return);
?>