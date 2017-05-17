<?php /* Smarty version Smarty-3.1.7, created on 2017-05-04 00:32:16
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout2/modules/Settings/PickListDependency/ListViewActions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1121499291590a7690e0d8d9-10562141%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be3e4cbdafb6e16cdc9185d8400673eec60c1eb3' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout2/modules/Settings/PickListDependency/ListViewActions.tpl',
      1 => 1493073575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1121499291590a7690e0d8d9-10562141',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'PICKLIST_MODULES_LIST' => 0,
    'MODULE_MODEL' => 0,
    'MODULE_NAME' => 0,
    'FOR_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_590a7690ed673',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590a7690ed673')) {function content_590a7690ed673($_smarty_tpl) {?>
<span class="pull-right listViewActions"><select class="chzn-select span3 pickListSupportedModules"><option value=""><?php echo vtranslate('LBL_ALL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php  $_smarty_tpl->tpl_vars['MODULE_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PICKLIST_MODULES_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_MODEL']->key => $_smarty_tpl->tpl_vars['MODULE_MODEL']->value){
$_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['MODULE_NAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'), null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value==$_smarty_tpl->tpl_vars['FOR_MODULE']->value){?> selected <?php }?>><?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('label')=='Calendar'){?><?php echo vtranslate('LBL_TASK',$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('label'));?>
<?php }else{ ?><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('label'));?>
<?php }?></option><?php } ?></select></span><?php }} ?>