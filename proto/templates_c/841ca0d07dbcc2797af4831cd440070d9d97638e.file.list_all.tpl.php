<?php /* Smarty version Smarty-3.1.15, created on 2014-04-23 19:12:46
         compiled from "/opt/lbaw/lbaw1346/public_html/proto/templates/questions/list_all.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1988660416535185c8752ea3-42910662%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '841ca0d07dbcc2797af4831cd440070d9d97638e' => 
    array (
      0 => '/opt/lbaw/lbaw1346/public_html/proto/templates/questions/list_all.tpl',
      1 => 1398276763,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1988660416535185c8752ea3-42910662',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_535185c8bb1ea2_60943003',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'order' => 0,
    'page' => 0,
    'filter_ans' => 0,
    'filter_acc' => 0,
    'pages' => 0,
    'questions' => 0,
    'question' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535185c8bb1ea2_60943003')) {function content_535185c8bb1ea2_60943003($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/opt/lbaw/lbaw1346/public_html/proto/lib/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/questions/list_all.js"></script>

<div class="container" style="width:70%; margin-left:auto; margin-right:auto; padding-left:0px; margin-bottom:20px">
  <ul class="nav navbar-nav navbar-left">
    <li> <a href="#" ><b>Ask a Question</b></a></li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li> <a href="#">Users</a></li>
    <li> <a href="#">Tags</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Order<b class="caret"></b></a>
      <ul class="dropdown-menu" style="padding:0px" id="order_dropdown">
        <?php if ($_smarty_tpl->tpl_vars['order']->value=='new') {?>
          <li><button class="btn btn-default btn-block active" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, 'new', '<?php echo $_smarty_tpl->tpl_vars['filter_ans']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['filter_acc']->value;?>
')">Newest First</button></li>
          <li><button class="btn btn-default btn-block " style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, 'old', '<?php echo $_smarty_tpl->tpl_vars['filter_ans']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['filter_acc']->value;?>
')">Oldest First</button></li>
        <?php } else { ?>
          <li><button class="btn btn-default btn-block" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, 'new', '<?php echo $_smarty_tpl->tpl_vars['filter_ans']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['filter_acc']->value;?>
')">Newest First</button></li>
          <li><button class="btn btn-default btn-block active" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, 'old', '<?php echo $_smarty_tpl->tpl_vars['filter_ans']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['filter_acc']->value;?>
')">Oldest First</button></li>
        <?php }?>
      </ul>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search Options<b class="caret"></b></a>
      <ul class="dropdown-menu" style="padding:0px" id="filter_dropdown">
        <li>
          <div class="row" style="width: 400px;">
            <ul class="list-unstyled col-md-6">
              <li>
                <?php if ($_smarty_tpl->tpl_vars['filter_ans']->value=='n') {?>
                  <button class="btn btn-default btn-block active" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
', 'n', '<?php echo $_smarty_tpl->tpl_vars['filter_acc']->value;?>
')">
                <?php } else { ?>
                  <button class="btn btn-default btn-block" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
', 'n', '<?php echo $_smarty_tpl->tpl_vars['filter_acc']->value;?>
')">
                <?php }?>
                Non-Answered</button>
              </li>
              <li>
                <?php if ($_smarty_tpl->tpl_vars['filter_ans']->value=='y') {?>
                  <button class="btn btn-default btn-block active" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
', 'y', '<?php echo $_smarty_tpl->tpl_vars['filter_acc']->value;?>
')">
                <?php } else { ?>
                  <button class="btn btn-default btn-block" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
', 'y', '<?php echo $_smarty_tpl->tpl_vars['filter_acc']->value;?>
')">
                <?php }?>
              Answered</button>
              </li>
              <li>
                <?php if ($_smarty_tpl->tpl_vars['filter_ans']->value=='all') {?>
                  <button class="btn btn-default btn-block active" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
', 'all', '<?php echo $_smarty_tpl->tpl_vars['filter_acc']->value;?>
')">
                <?php } else { ?>
                  <button class="btn btn-default btn-block" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
', 'all', '<?php echo $_smarty_tpl->tpl_vars['filter_acc']->value;?>
')">
                <?php }?>
                All</button>
              </li>
            </ul>
            <ul class="list-unstyled col-md-6">
                <li>
                  <?php if ($_smarty_tpl->tpl_vars['filter_ans']->value=='n') {?>
                      <button class="btn btn-default btn-block disabled" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['filter_ans']->value;?>
', 'n')">
                  <?php } else { ?>
                    <?php if ($_smarty_tpl->tpl_vars['filter_acc']->value=='n') {?>
                      <button class="btn btn-default btn-block active" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['filter_ans']->value;?>
', 'n')">
                    <?php } else { ?>
                    <button class="btn btn-default btn-block" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['filter_ans']->value;?>
', 'n')">
                    <?php }?>
                  <?php }?>
                  Non-Accepted</button>
                </li>
                <li>
                  <?php if ($_smarty_tpl->tpl_vars['filter_ans']->value=='n') {?>
                      <button class="btn btn-default btn-block disabled" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['filter_ans']->value;?>
', 'y')">
                  <?php } else { ?>
                    <?php if ($_smarty_tpl->tpl_vars['filter_acc']->value=='y') {?>
                      <button class="btn btn-default btn-block active" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['filter_ans']->value;?>
', 'y')">
                    <?php } else { ?>
                    <button class="btn btn-default btn-block" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['filter_ans']->value;?>
', 'y')">
                    <?php }?>
                  <?php }?>
                  Accepted</button>
                </li>
                <li>
                  <?php if ($_smarty_tpl->tpl_vars['filter_acc']->value=='all') {?>
                    <button class="btn btn-default btn-block active" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['filter_ans']->value;?>
', 'all')">
                  <?php } else { ?>
                    <button class="btn btn-default btn-block" style="border-radius: 0;" onclick="dropdownClick(<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
, '<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['filter_ans']->value;?>
', 'all')">
                  <?php }?>
                  All</button>
                </li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
  </ul>
</div>

<?php if ($_smarty_tpl->tpl_vars['page']->value>$_smarty_tpl->tpl_vars['pages']->value) {?>
  <h1 style="text-align:center; margin-top:15%"> Unknown page! </h1> 

<?php } else { ?>


<?php  $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['questions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->_loop = true;
?>
    <div class="panel panel-default" style="width:70%; margin-left:auto; margin-right:auto">
      <div class="panel-heading">

        <span class="pull-right"> Asked <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['question']->value['contentDate'],"M d 'Y");?>
 at <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['question']->value['contentDate'],"H:i");?>
  by 
          <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/user.php?username=<?php echo $_smarty_tpl->tpl_vars['question']->value['user'];?>
"><?php echo $_smarty_tpl->tpl_vars['question']->value['user'];?>
</a></span> <!--link para o user -->
        <!-- so se for aceite -->
        <h3 class="panel-title">

          <?php if (($_smarty_tpl->tpl_vars['question']->value['upvotes']-$_smarty_tpl->tpl_vars['question']->value['downvotes'])>0) {?>
          <b style="font-size:125%; color:green">
          <?php } elseif (($_smarty_tpl->tpl_vars['question']->value['upvotes']-$_smarty_tpl->tpl_vars['question']->value['downvotes'])==0) {?>
          <b style="font-size:125%; color:grey">
          <?php } else { ?>
          <b style="font-size:125%; color:red">
          <?php }?>
          <?php echo $_smarty_tpl->tpl_vars['question']->value['upvotes']-$_smarty_tpl->tpl_vars['question']->value['downvotes'];?>
</b>

          <?php if ($_smarty_tpl->tpl_vars['question']->value['accepted']) {?>
          <span class="glyphicon glyphicon-ok" style="color:green; margin-left:1em"> </span>
          <?php }?>
        </h3>
        <span class="pull-right" ><?php echo $_smarty_tpl->tpl_vars['question']->value['answers'];?>
 Answers</span>
        <h3 class="panel-title" id=<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
 style="word-wrap: break-word;"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/questions/show_question.php?id=<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
"><b><?php echo $_smarty_tpl->tpl_vars['question']->value['title'];?>
</b></a></h3>
      </div>
      <div class="panel-body" style="word-wrap: break-word;">
        <?php echo substr($_smarty_tpl->tpl_vars['question']->value['contentText'],0,400);?>

      </div>
    </div>
<?php } ?>

 
<?php echo $_smarty_tpl->getSubTemplate ('common/pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <br><br>

<?php }?>


<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>