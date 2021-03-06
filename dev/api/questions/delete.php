<?php  
    header('Content-type: application/json');

    include_once('../../config/init.php');
    include_once('../../database/questions/delete.php');

    $id = $_POST['id'];
    if(!isset($id))
        $return = array("error" => "Missing parameters.");
    else{
        global $conn;

        try{

        	deleteContent($id);

            $return = array("ok");
        }
        catch(PDOException $e){
            $return = array("error" => "Failed to delete the content.");
        }
    }

    echo json_encode($return);
?>