<?php /* Smarty version Smarty-3.1.7, created on 2017-05-08 01:06:45
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/mazzy/modules/Settings/Workflows/TasksList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1387014174590fc4a5253327-77280927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95d5b40a7d0d4da0b900e095899b8a3eebc4d314' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/mazzy/modules/Settings/Workflows/TasksList.tpl',
      1 => 1494194836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1387014174590fc4a5253327-77280927',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'TASK_LIST' => 0,
    'TASK' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_590fc4a52d059',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590fc4a52d059')) {function content_590fc4a52d059($_smarty_tpl) {?>
<br><div class="row-fluid"><table class="table table-bordered table-condensed listViewEntriesTable"><thead><tr class="listViewHeaders"><th width="10%"><?php echo vtranslate('LBL_ACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th width="30%"><?php echo vtranslate('LBL_TASK_TYPE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_TASK_TITLE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['TASK'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['TASK']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['TASK_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['TASK']->key => $_smarty_tpl->tpl_vars['TASK']->value){
$_smarty_tpl->tpl_vars['TASK']->_loop = true;
?><tr class="listViewEntries"><td><input type="checkbox" class="taskStatus" data-statusurl="<?php echo $_smarty_tpl->tpl_vars['TASK']->value->getChangeStatusUrl();?>
" <?php if ($_smarty_tpl->tpl_vars['TASK']->value->isActive()){?> checked="" <?php }?> /></td><td><?php echo vtranslate($_smarty_tpl->tpl_vars['TASK']->value->getTaskType()->getLabel(),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td><?php echo $_smarty_tpl->tpl_vars['TASK']->value->getName();?>
<div class="pull-right actions"><span class="actionImages"><a class="btn btn-xs btn-blue" data-url="<?php echo $_smarty_tpl->tpl_vars['TASK']->value->getEditViewUrl();?>
"><i class="fa fa-pencil " title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></i></a>&nbsp;&nbsp;<a class="btn btn-xs btn-red deleteTask" data-deleteurl="<?php echo $_smarty_tpl->tpl_vars['TASK']->value->getDeleteActionUrl();?>
"><i class="fa fa-trash " title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></i></a></span></div></td><tr><?php } ?></tbody></table><?php if (empty($_smarty_tpl->tpl_vars['TASK_LIST']->value)){?><table class="emptyRecordsDiv"><tbody><tr><td><?php echo vtranslate('LBL_NO_TASKS_ADDED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td></tr></tbody></table><?php }?></div><?php }} ?>