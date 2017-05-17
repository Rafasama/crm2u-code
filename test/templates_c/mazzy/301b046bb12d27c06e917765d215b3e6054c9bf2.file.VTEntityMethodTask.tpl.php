<?php /* Smarty version Smarty-3.1.7, created on 2017-05-08 01:20:21
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/Settings/Workflows/Tasks/VTEntityMethodTask.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1438495887590fc7d58aac19-55957422%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '301b046bb12d27c06e917765d215b3e6054c9bf2' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/Settings/Workflows/Tasks/VTEntityMethodTask.tpl',
      1 => 1492799778,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1438495887590fc7d58aac19-55957422',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'WORKFLOW_MODEL' => 0,
    'ENTITY_METHODS' => 0,
    'TASK_OBJECT' => 0,
    'METHOD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_590fc7d592092',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590fc7d592092')) {function content_590fc7d592092($_smarty_tpl) {?>
<div class="row-fluid"><div class="span2"><?php echo vtranslate('LBL_METHOD_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 :</div><div class="span8"><?php $_smarty_tpl->tpl_vars['ENTITY_METHODS'] = new Smarty_variable($_smarty_tpl->tpl_vars['WORKFLOW_MODEL']->value->getEntityMethods(), null, 0);?><?php if (empty($_smarty_tpl->tpl_vars['ENTITY_METHODS']->value)){?><div class="alert alert-info"><?php echo vtranslate('LBL_NO_METHOD_IS_AVAILABLE_FOR_THIS_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><?php }else{ ?><select name="methodName" class="chzn-select"><?php  $_smarty_tpl->tpl_vars['METHOD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['METHOD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ENTITY_METHODS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['METHOD']->key => $_smarty_tpl->tpl_vars['METHOD']->value){
$_smarty_tpl->tpl_vars['METHOD']->_loop = true;
?><option <?php if ($_smarty_tpl->tpl_vars['TASK_OBJECT']->value->methodName==$_smarty_tpl->tpl_vars['METHOD']->value){?>selected="" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['METHOD']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['METHOD']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php } ?></select><?php }?></div></div>	<?php }} ?>