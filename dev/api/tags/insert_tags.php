 <?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/content.php');
	include_once($BASE_DIR .'database/tags/tags.php');

	$nmae = $_POST['name'];
	$description = $_POST['description'];

	insertTag($name, $description);

	$res = array('name' => $name , 'description' => $description);


	echo json_encode($res);

?>