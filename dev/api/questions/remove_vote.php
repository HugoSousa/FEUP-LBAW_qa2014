<?php
    header('Content-type: application/json');

    include_once('../../config/init.php');
    include_once('../../database/questions/vote.php');

    global $conn;
    $id = $_POST['id'];
    $user = $_POST['user'];
    $type = $_POST['type'];

    if(!isset($id) || !isset($user) || !isset($type)){
        $return = array("error" => "Parameters missing.");
    }
    else{
    	
        try{
            if($type == 'answer'){
                deleteVoteAnswer($id, $user);
            }
            else if($type == 'question'){
                deleteVoteQuestion($id, $user);
            }
            $return = array("ok");
        } 
        catch(PDOException $e){
            $return = array("error" => "Failed to insert the vote.");
        }
    }

    echo json_encode($return);
?>