<?php /* Smarty version Smarty-3.1.15, created on 2014-04-18 21:06:32
         compiled from "/opt/lbaw/lbaw1346/public_html/proto/templates/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:340182182535185c8bbd552-65236514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd148d0d67534828968ca8c20480335d46513165f' => 
    array (
      0 => '/opt/lbaw/lbaw1346/public_html/proto/templates/common/header.tpl',
      1 => 1397850308,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '340182182535185c8bbd552-65236514',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'USERNAME' => 0,
    'REPUTATION' => 0,
    'PERMISSION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_535185c8c38fb7_26956157',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535185c8c38fb7_26956157')) {function content_535185c8c38fb7_26956157($_smarty_tpl) {?><!DOCTYPE html>
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

  </head>
  <body>
    <div class="navbar navbar-static-top navbar-inverse">

      <div class="container">
        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
" class="navbar-brand">Q&A2014</a>
        <form class="navbar-form navbar-right" role="search">
          <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
        </form>
          <?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {?>
          <ul class="nav navbar-nav navbar-left">
            <li >
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>&#9776;</b>
                  <button class="btn dropdown-toggle sr-only" type="button" id="dropdownMenu1" data-toggle="dropdown">
                    Dropdown
                    <span class="caret"></span>
                  </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">First Notification</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another notification</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another one</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Last Notification</a></li>
                </ul>
              </a>
            </li>
          </ul>
          <?php }?>
          <ul class="nav navbar-nav navbar-right">
            <?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {?>
            <li><a href="#"><?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
 | <?php echo $_smarty_tpl->tpl_vars['REPUTATION']->value;?>
</a></li>
            <?php if ($_smarty_tpl->tpl_vars['PERMISSION']->value=='A') {?>
            <li><a href="#">Flags</a></li>
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
