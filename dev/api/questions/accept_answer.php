<?php
    header('Content-type: application/json');

    include_once('../../config/init.php');
    include_once('../../database/questions/accept_answer.php');

    $id = $_POST['id'];
    $accept = $_POST['accept'];

    if(!isset($id) || !isset($accept))
        $return = array("error" => "Missing parameters.");
    else{
        try{
        	if($accept === 'y'){
        		acceptAnswer($id);
        		$return = array("ok");
        	}
        	else if($accept === 'n'){
        		removeAcceptedAnswer($id);
      			$return = array("ok");
        	}
            else{
            	$return = array("error" => "Invalid accept parameter.");
            }
        }
        catch(PDOException $e){
            $return = array("error" => "Failed to insert the vote.");
        }
    }

    echo json_encode($return);

?>
