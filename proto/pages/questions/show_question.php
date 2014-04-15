<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/questions.php');

    $questionid = $_GET['id'];
    $viewer = $_SESSION['userid'];
    $question = getQuestion($viewer, $questionid);
    $questionComments = getQuestionComments($questionid);
    $answers = getAnswers($viewer, $questionid);

    //var_dump($answers);

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

    //print_r($answers);

    $smarty->assign('own', $_SESSION['username']);
	$smarty->assign('question', $question);
	$smarty->assign('questionComments', $questionComments);
	$smarty->assign('answersAndComments', $answers);
	$smarty->display('questions/show_question.tpl');
?>