<?php /* Smarty version Smarty-3.1.7, created on 2017-04-21 21:02:10
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/Settings/Vtiger/Announcement.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65261631458fa73527a41d7-53147855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '044d53829dae78db7b272f63f62b67eeb41ef16e' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/Settings/Vtiger/Announcement.tpl',
      1 => 1492799778,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65261631458fa73527a41d7-53147855',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'ANNOUNCEMENT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_58fa735283a38',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa735283a38')) {function content_58fa735283a38($_smarty_tpl) {?>
<div class="container-fluid" id="AnnouncementContainer"><div class="widget_header row-fluid"><div class="row-fluid"><h3><?php echo vtranslate('LBL_ANNOUNCEMENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></div></div><hr><div class="contents row-fluid"><textarea class="announcementContent textarea-autosize boxSizingBorderBox" rows="3" placeholder="<?php echo vtranslate('LBL_ENTER_ANNOUNCEMENT_HERE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" style="width:100%"><?php echo $_smarty_tpl->tpl_vars['ANNOUNCEMENT']->value->get('announcement');?>
</textarea><div class="row-fluid textAlignCenter"><br><button class="btn btn-success saveAnnouncement hide"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></div></div></div><?php }} ?>