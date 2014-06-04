<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/questions.php');

    if(! isset($_GET['idTag']))
		header('Location: ' . $BASE_URL);

	$page = $_GET['page'];

    if(! isset($_GET['page']))
    	$page = 1;

	$idTag = $_GET['idTag'];

	try{
		$questions = getQuestionsByTag($idTag, $page);

		$totalResults = getTotalQuestionsByTag($idTag);
	   	$pages = ceil($totalResults/30);
	}catch(PDOException $e){
		$smarty->display("common/error.tpl");
		$date = date("r");
		file_put_contents($BASE_DIR.'log.txt', $date." - ".$e."\r\n", FILE_APPEND | LOCK_EX);
		exit;
	}


    $smarty->assign('own', $_SESSION['username']);
	$smarty->assign('pages', $pages);
	$smarty->assign('destination', 'pages/questions/list_by_tag.php');
	$smarty->assign('questions', $questions);
	$smarty->assign('page', $page);
	$smarty->assign('idTag', $idTag);
	$smarty->display('questions/list_by_tag.tpl');
?>