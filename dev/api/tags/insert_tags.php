 <?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/content.php');
	include_once($BASE_DIR .'database/tags/tags.php');

	$name = $_POST['name'];
	$description = $_POST['description'];

	if(!isset($name) || !isset($description))
        $return = array("error" => "Missing parameters.");
    else{

		insertTag($name, $description);

		$res = array('name' => $name , 'description' => $description);
	}

	echo json_encode($res);

?>