<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/content.php');
    include_once($BASE_DIR .'database/questions.php');
    include_once($BASE_DIR .'database/answer.php');


    $id = $_GET['id'];
    $viewer = $_SESSION['userid'];
    $content = getContentByID($id);

    if($viewer == $content['userID'])
    {
        

        switch ($content['type']) {
            case 'ANSWER':
                $answer = getAnswer($id);

                $question = getQuestion($viewer, $answer['idQuestion']);
                $tags = getTagsQuestion($answer['idQuestion']);


                $smarty->assign('own', $_SESSION['username']);
                $smarty->assign('type', 'ANSWER');
                $smarty->assign('content', $content);
                $smarty->assign('question', $question);
                $smarty->assign('tags', $tags);
                $smarty->assign('userid', $_SESSION['userid']);
                $smarty->display('questions/edit_content.tpl'); 

                break;

            case 'QUESTION':
                
                $question = getQuestion($viewer, $id);
                $tags = getTagsQuestion($id);

                $smarty->assign('own', $_SESSION['username']);
                $smarty->assign('type', 'QUESTION');
                $smarty->assign('question', $question);
                $smarty->assign('tags', $tags);
                $smarty->assign('userid', $_SESSION['userid']);
                $smarty->display('questions/edit_content.tpl'); 
                
                break;

            default:
                
                header("Location: $BASE_URL" . 'pages/questions/list_all.php');  //Redirect browser 
                exit();
                
                break;
        }
    }
    else
    {
        header("Location: $BASE_URL" . 'pages/questions/list_all.php');  //Redirect browser 
        exit();
    }
    
?>