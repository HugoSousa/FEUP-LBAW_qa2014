<?php /* Smarty version Smarty-3.1.15, created on 2014-05-07 16:21:36
         compiled from "/opt/lbaw/lbaw1346/public_html/dev/templates/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:982225080536a4f80ce1710-38206888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10c13d62b49d61995a7d263a0d2772698ccf95fc' => 
    array (
      0 => '/opt/lbaw/lbaw1346/public_html/dev/templates/common/header.tpl',
      1 => 1399475590,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '982225080536a4f80ce1710-38206888',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'USERNAME' => 0,
    'notifications' => 0,
    'notification' => 0,
    'REPUTATION' => 0,
    'PERMISSION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_536a4f80da85a1_98376275',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536a4f80da85a1_98376275')) {function content_536a4f80da85a1_98376275($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/opt/lbaw/lbaw1346/public_html/dev/lib/smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Q&A2014</title>

    <!-- Bootstrap -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/bootstrap.min.js"></script>
    
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/notifications/notifications.js"></script>
    
    <style>
      span.username{color:#0000FF;}

      span.username:hover {opacity: 0.3;}
    </style>
    

  </head>
  <body>
    <div class="navbar navbar-static-top navbar-inverse">

      <div class="container">
        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
" class="navbar-brand">Q&A2014</a>
        <form class="navbar-form navbar-right" role="search" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/questions/list_all.php" method="GET">
          <input name="search" type="text" class="form-control" placeholder="Search">
          <button id="search_questions" type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </form>
          <?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {?>

          <ul class="nav navbar-nav navbar-left">
            <li > 

              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>&#9776;</b><span id="notification-counter"class="badge alert-success nav nabar-nav" style="margin-left:10px"><?php echo count($_smarty_tpl->tpl_vars['notifications']->value);?>
</span>
                  <button class="btn dropdown-toggle sr-only" type="button" id="dropdownMenu1" data-toggle="dropdown">
                    Dropdown
                    <span class="caret"></span>
                  </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="height:auto; max-height:300px; overflow-x:hidden;">
                  <?php  $_smarty_tpl->tpl_vars['notification'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notification']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notification']->key => $_smarty_tpl->tpl_vars['notification']->value) {
$_smarty_tpl->tpl_vars['notification']->_loop = true;
?>
                    <li role="presentation">
                      <a id="<?php echo $_smarty_tpl->tpl_vars['notification']->value['idNotification'];?>
"role="menuitem" tabindex="-1" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/questions/show_question.php?id=<?php echo $_smarty_tpl->tpl_vars['notification']->value['link'];?>
" target="_blank" class="notification">
                        <?php if ($_smarty_tpl->tpl_vars['notification']->value['type']=='COMMENT') {?>
                          <small><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['notification']->value['notificationDate'],"M d 'Y H:i");?>
</small><br>
                          <span onclick="document.location.href = '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/show_user.php?username=<?php echo $_smarty_tpl->tpl_vars['notification']->value['username'];?>
'; return false" class="username"><?php echo $_smarty_tpl->tpl_vars['notification']->value['username'];?>
</span> commented your content<br>
                          <medium>"<?php echo substr($_smarty_tpl->tpl_vars['notification']->value['content'],0,100);?>
"</medium>
                        <?php } elseif ($_smarty_tpl->tpl_vars['notification']->value['type']=='VOTE') {?>
                          <small><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['notification']->value['notificationDate'],"M d 'Y H:i");?>
</small><br>
                          Your content was voted<br>
                          <?php echo substr($_smarty_tpl->tpl_vars['notification']->value['content'],0,100);?>

                        <?php } elseif ($_smarty_tpl->tpl_vars['notification']->value['type']=='ANSWER') {?>
                          <small><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['notification']->value['notificationDate'],"M d 'Y H:i");?>
</small><br>
                          <span onclick="document.location.href = '<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/show_user.php?username=<?php echo $_smarty_tpl->tpl_vars['notification']->value['username'];?>
'; return false" class="username"><?php echo $_smarty_tpl->tpl_vars['notification']->value['username'];?>
</span> answered your question<br>
                          <?php echo substr($_smarty_tpl->tpl_vars['notification']->value['content'],0,100);?>

                        <?php } elseif ($_smarty_tpl->tpl_vars['notification']->value['type']=='ACCEPT') {?>
                          <small><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['notification']->value['notificationDate'],"M d 'Y H:i");?>
</small><br>
                          Your answer was accepted<br>
                          <?php echo substr($_smarty_tpl->tpl_vars['notification']->value['content'],0,100);?>

                        <?php }?>
                      </a></li>
                  <?php } ?>
                </ul>
              </a>
            </li>
          </ul>
          <?php }?>
          <ul class="nav navbar-nav navbar-right">
            <?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/show_user.php?username=<?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
 | <?php echo $_smarty_tpl->tpl_vars['REPUTATION']->value;?>
</a></li>
            <?php if ($_smarty_tpl->tpl_vars['PERMISSION']->value=='A') {?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/flags/list_all.php">Flags</a></li>
            <?php }?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/logout.php">Log out</a></li>
            <?php } else { ?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/register.php">Register</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Log in <b class="caret"></b></a>  
              <div class="dropdown-menu" style="padding: 15px; width:200px">
                <form class="form" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/login.php" method="post">
                  <input name="login" id="login" type="text" placeholder="Username" size="30" style="margin-bottom: 15px;" class="form-control"> 
                  <input name="password" id="password" type="password" placeholder="Password" size="30" style="margin-bottom: 15px;" class="form-control"><br>
                  <input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px" type="submit" name="commit" value="Sign In" />
                </form>
              </div>
            </li>
            <?php }?>
          </ul>
            
        </div>
      </div>
    </div>
<?php }} ?>
