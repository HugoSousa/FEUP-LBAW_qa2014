<?php /* Smarty version Smarty-3.1.15, created on 2014-04-18 21:08:39
         compiled from "/opt/lbaw/lbaw1346/public_html/proto/templates/users/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131685296453518647360672-37895524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd07ab501210ed465314dcf7984a5071fa8e7d9d7' => 
    array (
      0 => '/opt/lbaw/lbaw1346/public_html/proto/templates/users/register.tpl',
      1 => 1397850308,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131685296453518647360672-37895524',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'FIELD_ERRORS' => 0,
    'FORM_VALUES' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53518647485000_10848364',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53518647485000_10848364')) {function content_53518647485000_10848364($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="page-header">
  <h1 style="text-align:center">Q&A2014<br><small>Registration</small></h1>
</div>

<div class="container">
  <form class="form-horizontal" style="text-align:center" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/register.php" method="post" enctype="multipart/form-data">
    <fieldset>
      <?php if ($_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['name']) {?>
      <div class="form-group has-error">
      <?php } else { ?>
      <div class="form-group">
      <?php }?>
        <label class="control-label" for="inputError">Name:</label>
        <div class="controls">
          <input type="text" id="inputError" name="name" class="form-control" style="width:15%; margin-left:auto; margin-right:auto" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['name'];?>
">
          <p class="help-block"><?php echo $_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['name'];?>
</p>
        </div>
      </div>
      <?php if ($_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['login']) {?>
      <div class="form-group has-error">
      <?php } else { ?>
      <div class="form-group">
      <?php }?>
        <label class="control-label">Login:</label>
        <div class="controls">
          <input type="text" id="login" name="login" class="form-control" style="width:15%; margin-left:auto; margin-right:auto" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['login'];?>
">
          <span class="field_error"><?php echo $_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['login'];?>
</span>
        </div>
      </div>
      <?php if ($_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['email']) {?>
      <div class="form-group has-error">
      <?php } else { ?>
      <div class="form-group">
      <?php }?>
        <label class="control-label">Email:</label>
        <div class="controls">
          <input type="text" id="email" name="email" class="form-control" style="width:15%; margin-left:auto; margin-right:auto" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['email'];?>
">
          <span class="field_error"><?php echo $_smarty_tpl->tpl_vars['FIELD_ERRORS']->value['email'];?>
</span>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label">Password:</label>
        <div class="controls">
          <input type="password" id="password1" name="password1" class="form-control" style="width:15%; margin-left:auto; margin-right:auto">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label">Confirm Password:</label>
        <div class="controls">
          <input type="password" id="password2" name="password2" class="form-control" style="width:15%; margin-left:auto; margin-right:auto">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label"></label>
        <div class="controls">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
    </fieldset>
  </form>
</div>


<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>












<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
