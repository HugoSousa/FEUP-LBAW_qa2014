<?php /* Smarty version Smarty-3.1.15, created on 2014-05-09 00:22:18
         compiled from "/opt/lbaw/lbaw1346/public_html/dev/templates/tags/list_all.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1869288860536a5351348fe7-96690315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '997e44f10eada72712fe1878efd8dba55752d35a' => 
    array (
      0 => '/opt/lbaw/lbaw1346/public_html/dev/templates/tags/list_all.tpl',
      1 => 1399591316,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1869288860536a5351348fe7-96690315',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_536a53513d3038_72173630',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'order' => 0,
    'page' => 0,
    'search' => 0,
    'tags' => 0,
    'counter' => 0,
    'tag' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536a53513d3038_72173630')) {function content_536a53513d3038_72173630($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/topbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/tags/list_all.js"></script>

<div class="container" style="width:70%; margin-left:auto; margin-right:auto; padding-left:0px">
	

    <div class="container" style="width:70%; margin-left:auto; margin-right:auto; padding-left:0px">
	<form class="navbar-form navbar-left" role="search" style="padding-left:0">
		<div class="form-group">
        		<input name="search" type="text" class="form-control" placeholder="Search Tag">
       		</div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
    </form>


    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Order by <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                	<?php if ($_smarty_tpl->tpl_vars['order']->value=='number_tags') {?>
                		<button class="btn btn-default btn-block active" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, 'number_tags',  '<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
')">
                	<?php } else { ?>
                		<button class="btn btn-default btn-block" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, 'number_tags', '<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
')">
                	<?php }?>
                		Tags</button>
                </li>
                <li>
                	<?php if ($_smarty_tpl->tpl_vars['order']->value=='name') {?>
                		<button class="btn btn-default btn-block active" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, 'name', '<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
')">
                	<?php } else { ?>
                		<button class="btn btn-default btn-block" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, 'name',  '<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
')">
                	<?php }?>
                		Name</button>
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
              	<th>Name</th>
              	<th>Tags</th>
            </tr>
        </thead>
        <?php $_smarty_tpl->tpl_vars['counter'] = new Smarty_variable((($_smarty_tpl->tpl_vars['page']->value-1)*30)+1, null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
        	<tr>
	            <td><?php echo $_smarty_tpl->tpl_vars['counter']->value++;?>
</td>
	            <td><a href="#"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</a></td>
	            <td><?php echo $_smarty_tpl->tpl_vars['tag']->value['total'];?>
</td>
	        </tr>
        <?php } ?>

    </table>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<br><br>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
