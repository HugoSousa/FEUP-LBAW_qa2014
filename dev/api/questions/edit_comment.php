<?php  
    header('Content-type: application/json');

    include_once('../../config/init.php');
    include_once('../../database/questions/edit_content.php');

    $id = $_POST['id'];
    $text = $_POST['text'];
    if(!isset($id) || !isset($text))
        $return = array("error" => "Missing parameters.");
    else{
        global $conn;

        try{

        	editComment($id, $text);

            $return = array("ok");
        }
        catch(PDOException $e){
            $return = array("error" => "Failed to edit content.");
        }
    }

    echo json_encode($return);
?>