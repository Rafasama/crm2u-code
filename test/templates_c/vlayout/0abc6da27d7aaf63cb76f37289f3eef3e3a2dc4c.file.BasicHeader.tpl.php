<?php /* Smarty version Smarty-3.1.7, created on 2017-04-21 18:41:26
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/Vtiger/BasicHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34537524958fa5256dda666-75569995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0abc6da27d7aaf63cb76f37289f3eef3e3a2dc4c' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/Vtiger/BasicHeader.tpl',
      1 => 1492799777,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34537524958fa5256dda666-75569995',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_58fa5256deb03',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa5256deb03')) {function content_58fa5256deb03($_smarty_tpl) {?>
<div class="navbar navbar-fixed-top  navbar-inverse noprint"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('MenuBar.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('CommonActions.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>