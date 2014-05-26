<?php
    header('Content-type: application/json');

    include_once('../../config/init.php');
    include_once('../../database/flags/flags.php');

    if($_SESSION['permission'] != 'A')
        $return = array("error" => "No permissions.");
    else{
        if(! isset($_POST['id']))
            $return = array("error" => "Missing parameters.");
        else{
            $id = $_POST['id'];

            try{
                deleteFlag($id);

                $return = array("ok");
            }
            catch(PDOException $e){
                $return = array("error" => "Failed to solve flag.");
            }
        }
    }

    echo json_encode($return);

?>