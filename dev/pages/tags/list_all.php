<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/tags/tags.php');


    $page = $_GET['page'];

    if(! isset($_GET['page']))
    	$page = 1;

    switch($_GET['order']){
	    case 'number_tags':
	        $order = 'number_tags';
	        break;
	    case 'name':
	        $order = 'name';
	        break;
	}

	try{
		if(! isset($_GET['order']))
			$order = 'number_tags';
		
		if(isset($_GET['search'])){
			$search = $_GET['search'];
			$tags = getTagsBySearch($order, $page, $search);
			$pages = ceil(intval(getTotalTagsBySearch($search))/30);
		}
		else {
			$tags = getTags($order, $page);
			$pages = ceil(intval(getTotalTags())/30);
		}

		if($_SESSION['permission'] == 'A'){
			$notAcceptedTags = getNotAcceptedTags();
		}
	}catch(PDOException $e){
		$smarty->display("common/error.tpl");
		$date = date("r");
		file_put_contents($BASE_DIR.'log.txt', $date." - ".$e."\r\n", FILE_APPEND | LOCK_EX);
		exit;
	}
	
	$smarty->assign('tags', $tags);
	$smarty->assign('page', $page);
	$smarty->assign('pages', $pages);
	$smarty->assign('search', $search);
	$smarty->assign('order', $order);
	$smarty->assign('notAcceptedTags', $notAcceptedTags);
	$smarty->assign('destination', 'pages/tags/list_all.php');
	$smarty->display('tags/list_all.tpl');
?>