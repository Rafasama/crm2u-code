<?php /* Smarty version Smarty-3.1.7, created on 2017-05-16 18:56:24
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/mazzy/modules/Settings/Vtiger/SettingsMenuStart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1452863205591b4b584a9e18-61750215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e154cef3bd9a442ae69a48b9da3b7b317dca6aa' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/mazzy/modules/Settings/Vtiger/SettingsMenuStart.tpl',
      1 => 1494618022,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1452863205591b4b584a9e18-61750215',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'LOAD_OLD' => 0,
    'UI5_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_591b4b585e7db',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591b4b585e7db')) {function content_591b4b585e7db($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("Header.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("BasicHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['LOAD_OLD']->value){?><div class="bodyContents"><div class="mainContainer row-fluid"><div class="span12"><iframe id="ui5frame" src="<?php echo $_smarty_tpl->tpl_vars['UI5_URL']->value;?>
" width="100%" height="650px" style="border:0;"></iframe></div><?php }else{ ?><div class="bodyContents"><div class="mainContainer row-fluid"><div class="contentsDiv span12 marginLeftZero"><?php }?><?php }} ?>