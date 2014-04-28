<?php
    header('Content-type: application/json');

    include_once('../../config/init.php');
    include_once('../../database/questions/vote.php');


    $id = $_POST['id'];
    $user = $_POST['user'];
    $isup = $_POST['isup'];
    $type = $_POST['type'];
    $update = $_POST['update'];


	global $conn;

    try{
        if($type == 'answer'){

            if($update == 'false'){
                insertVoteAnswer($user, $id, $isup);
            }   

            else{
                updateVoteAnswer($isup, $user, $id);
            }
        }
        else if($type == 'question'){

            if($update == 'false'){
                insertVoteQuestion($user, $id, $isup);
            }   

            else{
                updateVoteQuestion($isup, $user, $id);
            }
        }

        $return = array("ok");
    }
    catch(PDOException $e){
        $return = array("error" => "Failed to insert the vote.");
    }

    echo json_encode($return);

?>