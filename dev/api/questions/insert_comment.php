<?php

	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/comments.php');
	include_once($BASE_DIR .'database/content.php');

	$answerID = $_GET['answerID'];
	$questionID = $_GET['questionID'];
	$text = $_GET['text'];
	$type = $_GET['type'];
	$userID = $_SESSION['userid']; 
	$username = $_SESSION['username'];

	if(!isset($answerID) || !isset($questionID) || !isset($text) || !isset($type) || !isset($userID) || !isset($username))
        $return = array("error" => "Missing parameters.");
    else{

		$contentID = insertContent($text, $userID, COMMENT);

		$contentID = $contentID[0]['id'];

		if($type == 'Answer'){
			insertCommentAnswer($contentID, $answerID);

		}else if($type == 'Question'){
			insertCommentQuestion($contentID, $questionID);
		}

		$res = array('text' => $text , 'username' => $username , 'answerID' => $answerID, 'questionID' => $questionID);
	}

	echo json_encode($res);

?>