 <?php

 	header('Content-type: application/json');

    include_once('../../config/init.php');
    include_once('../../database/questions/flag.php');

    $id = $_POST['id'];
    $user = $_POST['user'];
    $reason = $_POST['reason'];

    try{
        insertFlag($id, $user, $reason);
        $return = array("ok");        
    }
    catch(PDOException $e){
        $return = array("error" => "Failed to insert the flag.");
    }

    echo json_encode($return);

?>