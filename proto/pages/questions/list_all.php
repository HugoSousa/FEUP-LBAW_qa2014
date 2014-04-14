<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/questions.php');

    $page = $_GET['page'];


    switch($_GET['order']){
	    case 'old':
	        $order = 'old';
	        break;
	    default :
	        $order = 'new';
	        break;
	}

	switch($_GET['filter_ans']){
	    case 'y':
	        $filter_ans = 'y';
	        break;
	    case 'n' :
	        $filter_ans = 'n';
	        break;
	    default:
	    	$filter_ans = 'all';
	    	break;
	}

	switch($_GET['filter_acc']){
	    case 'y':
	        $filter_acc = 'y';
	        break;
	    case 'n' :
	        $filter_acc = 'n';
	        break;
	    default:
	    	$filter_acc = 'all';
	    	break;
	}

    $questions = getQuestions($page, $order, $filter_ans, $filter_acc);  
    $pages = ceil(intval(getTotalResults($filter_ans, $filter_acc))/30);

	$smarty->assign('filter_acc', $filter_acc);
	$smarty->assign('filter_ans', $filter_ans);
	$smarty->assign('order', $order);
	$smarty->assign('pages', $pages);
	$smarty->assign('questions', $questions);
	$smarty->assign('page', $page);
	$smarty->display('questions/list_all.tpl');
?>