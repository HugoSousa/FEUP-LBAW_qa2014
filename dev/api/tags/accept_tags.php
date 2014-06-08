<?php
    header('Content-type: application/json');

    include_once('../../config/init.php');
    include_once('../../database/questions/accept_tag.php');

    $id = $_POST['id'];
    $decision = $_POST['accept'];
    $permission = $_SESSION['permission']

    if(!isset($id) || !isset($decision) || !isset($permission))
        $return = array("error" => "Missing parameters.");
    else{
        if ($permission == 'A'){
    	   $return = array("error" => "You don't have permission");
        } 
        else {
        	try{
        		if($decision === 'y'){
        			acceptTag($id);
        			$return = array("ok");
        		}
        		else if($decision === 'n'){
        			removeTag($id);
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
    }

    echo json_encode($return);

?>