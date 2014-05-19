<?php
	header('Content-type: application/json');

    include_once('../../config/init.php');
	include_once('../../database/tags/admin_tags.php');

	$id = $_POST['id'];

	try{
        acceptTag($id);
        $return = array("ok");        
    }
    catch(PDOException $e){
      
        $return = array("error" => "Unexpected error updating tag in database.");  
        
        
    }

    echo json_encode($return);

?>