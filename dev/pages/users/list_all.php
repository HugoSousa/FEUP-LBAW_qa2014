<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users/users.php');
    include_once($BASE_DIR .'pages/notifications.php');

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

	try{
		if(! isset($_GET['order']))
			$order = 'reputation';

		if(isset($_GET['search'])){
			$search = $_GET['search'];
			$users = getUsersBySearch($order, $page, $search);
			$pages = ceil(getTotalUsersBySearch($search)/30);
		}
		else{
			$users = getUsers($order, $page);
			$pages = ceil(getTotalUsers()/30);
		}
	}catch(PDOException $e){
		$smarty->display("common/error.tpl");
		$date = date("r");
		file_put_contents($BASE_DIR.'log.txt', $date." - ".$e."\r\n", FILE_APPEND | LOCK_EX);
		exit;
	}

	$smarty->assign('notifications', $notifications);
	$smarty->assign('search', $search);
	$smarty->assign('users', $users);
	$smarty->assign('page', $page);
	$smarty->assign('pages', $pages);
	$smarty->assign('destination', 'pages/users/list_all.php');
	$smarty->assign('order', $order);
	$smarty->display('users/list_all.tpl');
?>