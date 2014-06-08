<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/flags/flags.php');
    include_once($BASE_DIR .'pages/notifications.php');

    if($_SESSION['permission'] == 'A'){

	    $page = $_GET['page'];

	    if(! isset($_GET['page']))
	    	$page = 1;

	    $id = $_GET['id'];

	    try{
		    $content = getContent($id);
		    $content['type'] = strtolower($content['type']);
			$reports = getReports($id, $page);
		    $totalReports = getTotalReports($id);
		    $pages = ceil(floatval($totalReports['total']/10));


			if($content['type'] == 'answer'){
				$question = getQuestionOfAnswer($content['id']);
				$content['link'] = $question['idQuestion'];
			}

			else if($content['type'] == 'comment'){
				$question = getQuestionOfCommentQuestion($content['id']);
				if(empty($question['idQuestion'])){
					$question = getQuestionOfCommentAnswer($content['id']);
				}
				$content['link'] = $question['idQuestion'];
			}

			else if($content['type'] == 'question'){
				$content['link'] = $content['id'];
			}

		}catch(PDOException $e){
			$smarty->display("common/error.tpl");
			$date = date("r");
			file_put_contents($BASE_DIR.'log.txt', $date." - ".$e."\r\n", FILE_APPEND | LOCK_EX);
			exit;
		}

	    $smarty->assign('notifications', $notifications);
	    $smarty->assign('content', $content);
		$smarty->assign('pages', $pages);
		$smarty->assign('reports', $reports);
		$smarty->assign('page', $page);
		$smarty->display('flags/show_flag.tpl');
	}
	else{
		header('Location: ' . $BASE_URL);
	}

?>