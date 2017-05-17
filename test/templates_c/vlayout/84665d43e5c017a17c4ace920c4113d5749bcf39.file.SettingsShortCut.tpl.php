<?php /* Smarty version Smarty-3.1.7, created on 2017-04-21 18:32:53
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/referencia/includes/runtime/../../layouts/vlayout/modules/Settings/Vtiger/SettingsShortCut.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42196950758fa50554a8db3-47649578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84665d43e5c017a17c4ace920c4113d5749bcf39' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/referencia/includes/runtime/../../layouts/vlayout/modules/Settings/Vtiger/SettingsShortCut.tpl',
      1 => 1492795467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42196950758fa50554a8db3-47649578',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SETTINGS_SHORTCUT' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_58fa50554fd2f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa50554fd2f')) {function content_58fa50554fd2f($_smarty_tpl) {?>
<span id="shortcut_<?php echo $_smarty_tpl->tpl_vars['SETTINGS_SHORTCUT']->value->getId();?>
" data-actionurl="<?php echo $_smarty_tpl->tpl_vars['SETTINGS_SHORTCUT']->value->getPinUnpinActionUrl();?>
" class="span3 contentsBackground well cursorPointer moduleBlock" data-url="<?php echo $_smarty_tpl->tpl_vars['SETTINGS_SHORTCUT']->value->getUrl();?>
"><button data-id="<?php echo $_smarty_tpl->tpl_vars['SETTINGS_SHORTCUT']->value->getId();?>
" title="<?php echo vtranslate('LBL_REMOVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" style="margin-right: -2%;margin-top: -5%;" title="Close" type="button" class="unpin close hide">x</button><h5 class="themeTextColor"><?php echo vtranslate($_smarty_tpl->tpl_vars['SETTINGS_SHORTCUT']->value->get('name'),$_smarty_tpl->tpl_vars['SETTINGS_SHORTCUT']->value->getModuleNameFromUrl($_smarty_tpl->tpl_vars['SETTINGS_SHORTCUT']->value->get('linkto')));?>
</h5><div><?php echo vtranslate($_smarty_tpl->tpl_vars['SETTINGS_SHORTCUT']->value->get('description'),$_smarty_tpl->tpl_vars['SETTINGS_SHORTCUT']->value->getModuleNameFromUrl($_smarty_tpl->tpl_vars['SETTINGS_SHORTCUT']->value->get('linkto')));?>
</div></span>	<?php }} ?>