<?php /* Smarty version Smarty-3.1.7, created on 2017-04-24 23:25:17
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout2/modules/Users/Login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212784494658fe895d5b0cb8-50854447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52a92bf816210833a96609c3d74eaab7c6f43a08' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout2/modules/Users/Login.tpl',
      1 => 1493073575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212784494658fe895d5b0cb8-50854447',
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
  'unifunc' => 'content_58fe895d62f0e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fe895d62f0e')) {function content_58fe895d62f0e($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars["_DefaultLoginTemplate"] = new Smarty_variable(vtemplate_path('Login.Default.tpl','Users'), null, 0);?>
<?php $_smarty_tpl->tpl_vars["_CustomLoginTemplate"] = new Smarty_variable(vtemplate_path('Login.Custom.tpl','Users'), null, 0);?>
<?php $_smarty_tpl->tpl_vars["_CustomLoginTemplateFullPath"] = new Smarty_variable("layouts/vlayout/".($_smarty_tpl->tpl_vars['_CustomLoginTemplate']->value), null, 0);?>

<?php if (file_exists($_smarty_tpl->tpl_vars['_CustomLoginTemplateFullPath']->value)){?>
	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_CustomLoginTemplate']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_DefaultLoginTemplate']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?><?php }} ?>