 <?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/content.php');
	include_once($BASE_DIR .'database/answer.php');

	$questionID = $_GET['questionID'];
	$text = $_GET['text'];
	$userID = $_SESSION['userid']; //FIX ME
	$username = $_SESSION['username']; //FIX ME

	$contentID = insertContent($text, $userID, ANSWER);

	$contentID = $contentID[0]['id'];


	insertAnswer($contentID, $questionID );

	$res = array('text' => $text , 'username' => $username , 'answerID' => $contentID);


	echo json_encode($res);

?>