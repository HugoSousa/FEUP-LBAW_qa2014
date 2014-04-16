<?php /* Smarty version Smarty-3.1.15, created on 2014-04-16 19:38:28
         compiled from "\wamp\www\proto\templates\users\show_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15562534e6bbb997cc5-45849048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8081f5b05c60c78f56681b9b3678eb7c6c44b5e3' => 
    array (
      0 => '\\wamp\\www\\proto\\templates\\users\\show_user.tpl',
      1 => 1397673507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15562534e6bbb997cc5-45849048',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_534e6bbb9dd915_77981758',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'user' => 0,
    'own' => 0,
    'topQuestions' => 0,
    'question' => 0,
    'topAnswers' => 0,
    'answer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534e6bbb9dd915_77981758')) {function content_534e6bbb9dd915_77981758($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\proto\\lib\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/topbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/users/user.js"></script>

    <div class="page-header" style="width:70%; margin-left:auto; margin-right:auto" >
      <h1 id="username"><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</h1>
    </div>

    <div style="text-align:center">
      <small>Reputation</small>
      <br>
      <h2><?php echo $_smarty_tpl->tpl_vars['user']->value['reputation'];?>
</h2>
    </div>

    <br><br>

    <div class="row container" style="width:70%; margin-left:auto; margin-right:auto">
      <div class="col-md-4">
        <i>Real Name</i>
      </div>
      <div class="col-md-8"  id="realname">
        <span><?php if (empty($_smarty_tpl->tpl_vars['user']->value['realName'])) {?>---------------<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['user']->value['realName'];?>
<?php }?></span>
        <?php if ($_smarty_tpl->tpl_vars['own']->value==$_smarty_tpl->tpl_vars['user']->value['username']) {?>
        <a class="pull-right edit" href="javascript:undefined">Edit</a>
        <?php }?>
      </div>
    </div>  
    <div class="row container" style="width:70%; margin-left:auto; margin-right:auto">
      <div class="col-md-4">
        <i>Location</i>
      </div>
      <div class="col-md-8" id="location">
        <span><?php if (empty($_smarty_tpl->tpl_vars['user']->value['location'])) {?>---------------<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['user']->value['location'];?>
<?php }?></span>
        <?php if ($_smarty_tpl->tpl_vars['own']->value==$_smarty_tpl->tpl_vars['user']->value['username']) {?>
        <a class="pull-right edit" href="#" >Edit</a>
        <?php }?>
      </div>
    </div>    
    <div class="row container" style="width:70%; margin-left:auto; margin-right:auto;">
      <div class="col-md-4">
        <i>Email</i>
      </div>
      <div class="col-md-8" id="email">
        <span><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</span>
      </div>
    </div>
    <div class="row container" style="width:70%; margin-left:auto; margin-right:auto;">
      <div class="col-md-4">
        <i>Registered since</i>
      </div>
      <div class="col-md-8">
        <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['registry'],"d/m/Y");?>
</span>
      </div>
    </div>

    <br>
    <div style="width:70%; margin-left:auto; margin-right:auto;"> 
      <small>Biography</small>
      <?php if ($_smarty_tpl->tpl_vars['own']->value==$_smarty_tpl->tpl_vars['user']->value['username']) {?>
        <a class="pull-right" id="edit_biography" href="#">Edit</a>
      <?php }?>
    </div>
    <div class="well" style="width:70%; margin-left:auto; margin-right:auto;">
    	<?php echo $_smarty_tpl->tpl_vars['user']->value['biography'];?>

    </div>

    <hr>


    <div class="row" style="width:70%; margin-left:auto; margin-right:auto">
      <div class="col-md-6" style="padding-left:0">
        <div class="panel panel-default">
          <div class="panel-heading">
            Top Questions
          </div>
          <div class="panel-body">
            <table class="table" style="margin-bottom:0px">
              <?php  $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['topQuestions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->_loop = true;
?>
	              <tr>
	              	<td style="width:5%; border:0; height:55px">
	              	<?php if ($_smarty_tpl->tpl_vars['question']->value['total']>0) {?>
	                	<span style="font-size:125%; color:green">
	                <?php } elseif ($_smarty_tpl->tpl_vars['question']->value['total']==0) {?>
	                	<span style="font-size:125%; color:grey">
	                <?php } else { ?>
	                	<span style="font-size:125%; color:red">
	                <?php }?>
	    
	                <?php echo $_smarty_tpl->tpl_vars['question']->value['total'];?>
</span></td>
	                <td style="border:0"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/questions/show_question.php?id=<?php echo $_smarty_tpl->tpl_vars['question']->value['idQuestion'];?>
">
	                <?php if (strlen($_smarty_tpl->tpl_vars['question']->value['title'])>140) {?> 
	                	<?php echo substr($_smarty_tpl->tpl_vars['question']->value['title'],0,137);?>

	                	...
	                <?php } else { ?>
	                	<?php echo $_smarty_tpl->tpl_vars['question']->value['title'];?>

	                <?php }?>
	            	</a></td>
	              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-6" style="padding-right:0">
        <div class="panel panel-default">
          <div class="panel-heading">
            Top Answers
          </div>
          <div class="panel-body">
            <table class="table" style="margin-bottom:0px">
              <?php  $_smarty_tpl->tpl_vars['answer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['answer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['topAnswers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['answer']->key => $_smarty_tpl->tpl_vars['answer']->value) {
$_smarty_tpl->tpl_vars['answer']->_loop = true;
?>
	              <tr>
	                <td style="width:5%; border:0; height:55px">
	                <?php if ($_smarty_tpl->tpl_vars['answer']->value['total']>0) {?>
	                	<span style="font-size:125%; color:green">
	                <?php } elseif ($_smarty_tpl->tpl_vars['answer']->value['total']==0) {?>
	                	<span style="font-size:125%; color:grey">
	                <?php } else { ?>
	                	<span style="font-size:125%; color:red">
	                <?php }?>
	                <?php echo $_smarty_tpl->tpl_vars['answer']->value['total'];?>
</span></td>
	                <td style="border:0"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/questions/show_question.php?id=<?php echo $_smarty_tpl->tpl_vars['answer']->value['idQuestion'];?>
">
	                <?php if (strlen($_smarty_tpl->tpl_vars['answer']->value['contentText'])>140) {?> 
	                	<?php echo substr($_smarty_tpl->tpl_vars['answer']->value['contentText'],0,137);?>

	                	...
	                <?php } else { ?>
	                	<?php echo $_smarty_tpl->tpl_vars['answer']->value['contentText'];?>

	                <?php }?>
	            	</a></td>
	              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>


    </div>


<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
