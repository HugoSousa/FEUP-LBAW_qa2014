<?php /* Smarty version Smarty-3.1.15, created on 2014-04-28 10:04:50
         compiled from "\wamp\www\proto\templates\users\list_all.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19759534fcf9f4a7319-04291629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cda17b92c0fb3e1451fd191deb01a80c253000cb' => 
    array (
      0 => '\\wamp\\www\\proto\\templates\\users\\list_all.tpl',
      1 => 1398675888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19759534fcf9f4a7319-04291629',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_534fcf9f774f84_79761120',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'order' => 0,
    'page' => 0,
    'search' => 0,
    'users' => 0,
    'counter' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534fcf9f774f84_79761120')) {function content_534fcf9f774f84_79761120($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\proto\\lib\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/topbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/users/list_all.js"></script>

<div class="container" style="width:70%; margin-left:auto; margin-right:auto; padding-left:0px">
	<form class="navbar-form navbar-left" role="search" style="padding-left:0">
		<div class="form-group">
        	<input name="search" type="text" class="form-control" placeholder="Search User">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
    </form>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Order by <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                	<?php if ($_smarty_tpl->tpl_vars['order']->value=='username') {?>
                		<button class="btn btn-default btn-block active" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, 'username', '<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
')">
                	<?php } else { ?>
                		<button class="btn btn-default btn-block" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, 'username', '<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
')">
                	<?php }?>
                		Username</button>
                </li>
                <li>
                	<?php if ($_smarty_tpl->tpl_vars['order']->value=='registry') {?>
                		<button class="btn btn-default btn-block active" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, 'registry', '<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
')">
                	<?php } else { ?>
                		<button class="btn btn-default btn-block" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, 'registry', '<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
')">
                	<?php }?>
                		Registry Date</button>
                </li>
                <li>
                	<?php if ($_smarty_tpl->tpl_vars['order']->value=='reputation') {?>
                		<button class="btn btn-default btn-block active" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, 'reputation', '<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
')">
                	<?php } else { ?>
                		<button class="btn btn-default btn-block" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, 'reputation', '<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
')">
                	<?php }?>
                		Reputation</button>
                </li>
            </ul>
        </li>
    </ul>
</div>


<br>

<div class="panel panel-default" style="width:70%; margin-left:15%; margin-right:auto">
    <table class="table">
        <thead>
          	<tr>
              	<th>#</th>
              	<th>Username</th>
              	<th>Reputation</th>
              	<th>Registered since</th>
            </tr>
        </thead>
        <?php $_smarty_tpl->tpl_vars['counter'] = new Smarty_variable((($_smarty_tpl->tpl_vars['page']->value-1)*30)+1, null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
        	<tr>
	        	<td><?php echo $_smarty_tpl->tpl_vars['counter']->value++;?>
</td>
	            <td><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/show_user.php?username=<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</a></td>
	            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['reputation'];?>
</td>
	            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['registry'],"d/m/Y");?>
</td>
	        </tr>
        <?php } ?>

    </table>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<br><br>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
