<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'pages/notifications.php');

    $smarty->assign('notifications', $notifications);
    $smarty->display('questions/new_question.tpl');  
?>