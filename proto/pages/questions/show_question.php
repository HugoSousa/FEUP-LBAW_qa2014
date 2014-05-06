<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/questions.php');
    include_once($BASE_DIR .'pages/notifications.php');

    $questionid = $_GET['id'];
    $viewer = $_SESSION['userid'];
    $question = getQuestion($viewer, $questionid);
    $questionComments = getQuestionComments($questionid);
    $answers = getAnswers($viewer, $questionid);
    $tags = getTagsQuestion($questionid);

    for($i=0; $i < sizeof($answers); $i++){
		$answer = $answers[$i];

    	$commentsAux = getCommentsAnswer($answer['idAnswer']);
    	$comments = array('comments' => $commentsAux);

    	if(! empty($commentsAux)){
    		$answer = array_merge($answer, $comments);

    		//replace in the original array
    		$answers[$i] = $answer;
    	}
    }

    $smarty->assign('notifications', $notifications);
    $smarty->assign('own', $_SESSION['username']);
	$smarty->assign('question', $question);
    $smarty->assign('tags', $tags);
	$smarty->assign('questionComments', $questionComments);
	$smarty->assign('answersAndComments', $answers);
    $smarty->assign('userid', $_SESSION['userid']);
	$smarty->display('questions/show_question.tpl');  
?>