<?php /* Smarty version Smarty-3.1.7, created on 2017-05-12 11:28:03
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/mazzy/modules/Settings/Vtiger/SettingsMenuStart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154338348159159c43eb9504-77713166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0af5e3656404ea70ae6be336b6eb60f853c8f78e' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/mazzy/modules/Settings/Vtiger/SettingsMenuStart.tpl',
      1 => 1494587708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154338348159159c43eb9504-77713166',
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
  'unifunc' => 'content_59159c43f2a19',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59159c43f2a19')) {function content_59159c43f2a19($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("Header.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("BasicHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['LOAD_OLD']->value){?><div class="bodyContents"><div class="mainContainer row-fluid"><div class="span12"><iframe id="ui5frame" src="<?php echo $_smarty_tpl->tpl_vars['UI5_URL']->value;?>
" width="100%" height="650px" style="border:0;"></iframe></div><?php }else{ ?><div class="bodyContents"><div class="mainContainer row-fluid"><div class="contentsDiv span12 marginLeftZero"><?php }?><?php }} ?>