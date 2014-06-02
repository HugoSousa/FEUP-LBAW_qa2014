<?php
    header('Content-type: application/json');

    include_once('../../config/init.php');
    include_once('../../database/tags/tags.php');


    $value = $_POST['value'];

    try{
        $tags = getTagsOnlyBySearch($value);

        $return = $tags;
    }
    catch(PDOException $e){
        $return = array("error" => "Failed to insert the vote.");
    }

    echo json_encode($return);

?>