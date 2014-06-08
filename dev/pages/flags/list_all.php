<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/flags/flags.php');
    include_once($BASE_DIR .'database/questions.php');
    include_once($BASE_DIR .'pages/notifications.php');

    try{
	  	if($_SESSION['permission'] == 'A'){

		    $page = $_GET['page'];

		    if(! isset($_GET['page']))
		    	$page = 1;

		    switch($_GET['order']){
			    case 'date_new':
			        $order = 'date_new';
			        break;
			    case 'date_old' :
			        $order = 'date_old';
			        break;
			    case 'flags_more':
			    	$order = 'flags_more';
			    	break;
			    case 'flags_less':
			    	$order = 'flags_less';
			    	break;
			}

			if(! isset($_GET['order']))
				$order = 'flags_more';

			$flags = getFlags($page, $order);

			//print_r($flags);
			for($i=0; $i < count($flags); $i++){

				if($flags[$i]['type'] == 'ANSWER'){
					$question = getQuestionOfAnswer($flags[$i]['idContent']);
					$flags[$i]['link'] = $question['idQuestion'];
				}

				else if($flags[$i]['type'] == 'COMMENT'){
					$question = getQuestionOfCommentQuestion($flags[$i]['idContent']);
					if(empty($question['idQuestion'])){
						$question = getQuestionOfCommentAnswer($flags[$i]['idContent']);
					}
					$flags[$i]['link'] = $question['idQuestion'];
				}

				else if($flags[$i]['type'] == 'QUESTION'){
					$flags[$i]['link'] = $flags[$i]['idContent'];
				}
			}

		    $totalFlags = getTotalFlags();
		    $pages = ceil(floatval($totalFlags['total']/30));

		    $smarty->assign('notifications', $notifications);
			$smarty->assign('pages', $pages);
			$smarty->assign('flags', $flags);
			$smarty->assign('page', $page);
			$smarty->assign('order', $order);
			$smarty->display('flags/list_all.tpl');
		}
		else{
			header('Location: ' . $BASE_URL);
		}
	}catch(PDOException $e){
		$smarty->display("common/error.tpl");
		$date = date("r");
		file_put_contents($BASE_DIR.'log.txt', $date." - ".$e."\r\n", FILE_APPEND | LOCK_EX);
		exit;
	}

?>