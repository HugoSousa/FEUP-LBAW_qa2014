<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/notifications/notifications.php');
	include_once($BASE_DIR .'database/questions.php');

	if(isset($_SESSION['permission'])){
    	$notifications = getNotifications($_SESSION['userid']);
    	//print_r($notifications);

    	for($i=0; $i < count($notifications); $i++){
    		$type = $notifications[$i]['type'];

    		if($type == "ACCEPT" || $type == "ANSWER"){
    			//ir buscar questão associada ao idContent(answer)
    			$question = getQuestionOfAnswer($notifications[$i]['idContent']);
    			$notifications[$i]['link'] = $question['idQuestion'];
    		}
    		else if($type == "VOTE"){
    			//pode ser uma questão ou resposta. tentar ir buscar questão, se vier vazia, já é uma questão
    			$question = getQuestionOfAnswer($notifications[$i]['idContent']);
    			$question = $question['idQuestion'];
    			if(empty($question)){
    				$question = $notifications[$i]['idContent'];
    			}
    			
    			$notifications[$i]['link'] = $question;
    		}
    		else if($type == "COMMENT"){
    			$question = getQuestionOfCommentQuestion($notifications[$i]['idContent']);
				if(empty($question['idQuestion'])){
					$question = getQuestionOfCommentAnswer($notifications[$i]['idContent']);
				}
				$notifications[$i]['link'] = $question['idQuestion'];
    		}

    		//print_r ($notifications[$i] . '<br>');
    		$content = getContent($notifications[$i]['idContent']);
    		$notifications[$i]['content'] = $content['contentText'];

    		//username do idContent
    	}
    }