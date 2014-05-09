<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/questions.php');
    include_once($BASE_DIR .'pages/notifications.php');

    $page = $_GET['page'];

    if(! isset($_GET['page']))
    	$page = 1;

    switch($_GET['order']){
	    case 'old':
	        $order = 'old';
	        break;
	    case 'new' :
	        $order = 'new';
	        break;
	}

	if(! isset($_GET['order']))
		$order = 'new';

	switch($_GET['filter_ans']){
	    case 'y':
	        $filter_ans = 'y';
	        break;
	    case 'n' :
	        $filter_ans = 'n';
	        break;
	    case 'all':
	    	$filter_ans = 'all';
	    	break;
	}

	if(! isset($_GET['filter_ans']))
		$filter_ans = 'all';

	switch($_GET['filter_acc']){
	    case 'y':
	        $filter_acc = 'y';
	        break;
	    case 'n' :
	        $filter_acc = 'n';
	        break;
	    case 'all':
	    	$filter_acc = 'all';
	    	break;
	}

	if(! isset($_GET['filter_acc']))
		$filter_acc = 'all';

	if(isset($_GET['search'])){
		$search = $_GET['search'];
		$questions = searchQuestions($page, $order, $filter_ans, $filter_acc, $search);
	}
	else
    	$questions = getQuestions($page, $order, $filter_ans, $filter_acc);  

    $totalQuestions = getTotalQuestions();
    $pages = ceil($totalQuestions['total']/30);

    //print_r($notifications);

    $smarty->assign('notifications', $notifications);
    $smarty->assign('own', $_SESSION['username']);
    $smarty->assign('search', $search);
	$smarty->assign('filter_acc', $filter_acc);
	$smarty->assign('filter_ans', $filter_ans);
	$smarty->assign('order', $order);
	$smarty->assign('pages', $pages);
	$smarty->assign('questions', $questions);
	$smarty->assign('page', $page);
	$smarty->display('questions/list_all.tpl');
?>