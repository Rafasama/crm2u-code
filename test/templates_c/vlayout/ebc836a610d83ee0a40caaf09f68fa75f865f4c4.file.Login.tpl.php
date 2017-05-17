<?php /* Smarty version Smarty-3.1.7, created on 2017-04-21 18:31:46
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/referencia/includes/runtime/../../layouts/vlayout/modules/Users/Login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19171819358fa5012ad55d5-93607676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebc836a610d83ee0a40caaf09f68fa75f865f4c4' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/referencia/includes/runtime/../../layouts/vlayout/modules/Users/Login.tpl',
      1 => 1492794518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19171819358fa5012ad55d5-93607676',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_CustomLoginTemplateFullPath' => 0,
    '_CustomLoginTemplate' => 0,
    '_DefaultLoginTemplate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_58fa5012b53d9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa5012b53d9')) {function content_58fa5012b53d9($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars["_DefaultLoginTemplate"] = new Smarty_variable(vtemplate_path('Login.Default.tpl','Users'), null, 0);?>
<?php $_smarty_tpl->tpl_vars["_CustomLoginTemplate"] = new Smarty_variable(vtemplate_path('Login.Custom.tpl','Users'), null, 0);?>
<?php $_smarty_tpl->tpl_vars["_CustomLoginTemplateFullPath"] = new Smarty_variable("layouts/vlayout/".($_smarty_tpl->tpl_vars['_CustomLoginTemplate']->value), null, 0);?>

<?php if (file_exists($_smarty_tpl->tpl_vars['_CustomLoginTemplateFullPath']->value)){?>
	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_CustomLoginTemplate']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_DefaultLoginTemplate']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?><?php }} ?>