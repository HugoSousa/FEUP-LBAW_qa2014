<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/flags/flags.php');

    if($_SESSION['permission'] == 'A'){

	    $page = $_GET['page'];

	    if(! isset($_GET['page']))
	    	$page = 1;

	    $id = $_GET['id'];

	    $content = getContent($id);
	    $content['type'] = strtolower($content['type']);
		$reports = getReports($id, $page);
	    $totalReports = getTotalReports($id);
	    $pages = ceil(floatval($totalReports['total']/10));

	    $smarty->assign('content', $content);
		$smarty->assign('pages', $pages);
		$smarty->assign('reports', $reports);
		$smarty->assign('page', $page);
		$smarty->display('flags/show_flag.tpl');
	}
	else{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

?>