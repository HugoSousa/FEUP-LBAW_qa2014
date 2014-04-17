<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');

    $page = $_GET['page'];

    if(! isset($_GET['page']))
    	$page = 1;

    switch($_GET['order']){
	    case 'username':
	        $order = 'username';
	        break;
	    case 'reputation':
	        $order = 'reputation';
	        break;
	    case 'registry':
	        $order = 'registry';
	        break;
	}

	if(! isset($_GET['order']))
		$order = 'reputation';

	$users = getUsers($order, $page);
	$pages = ceil(intval(getTotalUsers())/30);

	$smarty->assign('users', $users);
	$smarty->assign('page', $page);
	$smarty->assign('pages', $pages);
	$smarty->assign('order', $order);
	$smarty->display('users/list_all.tpl');
?>