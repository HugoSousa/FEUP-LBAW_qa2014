<?php
	header('Content-type: application/json');

    include_once('../../config/init.php');
	include_once('../../database/tags/suggest.php');

	$name = $_POST['name'];
    $description = $_POST['description'];

	try{
        suggestTag($name, $description);
        $return = array("ok");        
    }
    catch(PDOException $e){
      
        $return = array("error" => "Unexpected error suggesting tag in database.");  
        
        
    }

    echo json_encode($return);

?>