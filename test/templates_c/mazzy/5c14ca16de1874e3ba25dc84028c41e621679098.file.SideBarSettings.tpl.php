<?php /* Smarty version Smarty-3.1.7, created on 2017-05-12 11:28:04
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/mazzy/modules/Vtiger/SideBarSettings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111269038659159c4429d589-72182438%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c14ca16de1874e3ba25dc84028c41e621679098' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/mazzy/modules/Vtiger/SideBarSettings.tpl',
      1 => 1494587708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111269038659159c4429d589-72182438',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'SETTINGS_MENUS' => 0,
    'MENU' => 0,
    'SELECTED_MENU' => 0,
    'SELECTED_FIELDID' => 0,
    'MENUITEM' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_59159c4439b24',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59159c4439b24')) {function content_59159c4439b24($_smarty_tpl) {?>
<div class="sidebarTitleBlock"><h3 class="titlePadding themeTextColor unSelectedQuickLink cursorPointer"><a href="index.php?module=Vtiger&parent=Settings&view=Index"> <?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></h3></div><!--div><input class='input-medium' type='text' name='settingsSearch' placeholder=<?php echo vtranslate("LBL_SEARCH_SETTINGS_PLACEHOLDER",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 ></div--><div class="quickWidgetContainer accordion" id="settingsQuickWidgetContainer"><?php  $_smarty_tpl->tpl_vars['MENU'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MENU']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SETTINGS_MENUS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MENU']->key => $_smarty_tpl->tpl_vars['MENU']->value){
$_smarty_tpl->tpl_vars['MENU']->_loop = true;
?><div class="quickWidget"><div class="accordion-heading accordion-toggle quickWidgetHeader" data-parent="#settingsQuickWidgetContainer" data-target="#Settings_sideBar_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['MENU']->value->getLabel());?>
"data-toggle="collapse" data-parent="#quickWidgets"><h5 class="title paddingLeft10px widgetTextOverflowEllipsis" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['MENU']->value->getLabel(),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['MENU']->value->getLabel(),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h5><div class="clearfix"></div></div><div  style="border-bottom: 1px solid black;" class="widgetContainer accordion-body <?php if ($_smarty_tpl->tpl_vars['SELECTED_MENU']->value->get('blockid')==$_smarty_tpl->tpl_vars['MENU']->value->get('blockid')&&!empty($_smarty_tpl->tpl_vars['SELECTED_FIELDID']->value)){?> in <?php }?> collapse" id="Settings_sideBar_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['MENU']->value->getLabel());?>
"><?php  $_smarty_tpl->tpl_vars['MENUITEM'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MENUITEM']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MENU']->value->getMenuItems(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MENUITEM']->key => $_smarty_tpl->tpl_vars['MENUITEM']->value){
$_smarty_tpl->tpl_vars['MENUITEM']->_loop = true;
?><div class="<?php if ($_smarty_tpl->tpl_vars['MENUITEM']->value->getId()==$_smarty_tpl->tpl_vars['SELECTED_FIELDID']->value){?> selectedMenuItem selectedListItem<?php }?>" style="padding:7px;border-top:0px;"><div class="row-fluid menuItem"  data-actionurl="<?php echo $_smarty_tpl->tpl_vars['MENUITEM']->value->getPinUnpinActionUrl();?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['MENUITEM']->value->getUrl();?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['MENUITEM']->value->getId();?>
" class="span9 menuItemLabel" data-menu-item="true" ><?php echo vtranslate($_smarty_tpl->tpl_vars['MENUITEM']->value->get('name'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a><span class="span1">&nbsp;</span><img style="margin-right: 6%" id="<?php echo $_smarty_tpl->tpl_vars['MENUITEM']->value->getId();?>
_menuItem" data-pintitle="<?php echo vtranslate('LBL_PIN',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" data-unpintitle="<?php echo vtranslate('LBL_UNPIN',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['MENUITEM']->value->getId();?>
" class="pinUnpinShortCut cursorPointer hide pull-right" data-unpinimageurl="<?php ob_start();?><?php echo vimage_path('unpin.png');?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
"  data-pinimageurl="<?php ob_start();?><?php echo vimage_path('pin.png');?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
" <?php if ($_smarty_tpl->tpl_vars['MENUITEM']->value->isPinned()){?> title="<?php echo vtranslate('LBL_UNPIN',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" src="<?php echo vimage_path('unpin.png');?>
" data-action="unpin" <?php }else{ ?> title="<?php echo vtranslate('LBL_PIN',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" src="<?php echo vimage_path('pin.png');?>
" data-action="pin" <?php }?> /><div class="clearfix"></div></div></div><?php } ?></div></div><?php } ?></div><div class="row-fluid"><button type="button" class="row-fluid extensionStorebtn" onclick='window.location.href="index.php?module=ExtensionStore&parent=Settings&view=ExtensionStore"'><i class="fa fa-shopping-cart fa-lg pull-right"></i> <?php echo vtranslate('LBL_EXTENSION_STORE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></div>
<?php }} ?>