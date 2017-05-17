<?php /* Smarty version Smarty-3.1.7, created on 2017-05-16 18:55:53
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/mazzy/modules/Vtiger/MazzySideBarRight.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1831978700591b4b39f0b563-68224234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd8fb5985779ea6aff94b924e5846c849e4eb730' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/mazzy/modules/Vtiger/MazzySideBarRight.tpl',
      1 => 1494618022,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1831978700591b4b39f0b563-68224234',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CURRENT_USER_MODEL' => 0,
    'LEFTPANELHIDE' => 0,
    'HEADER_LINKS' => 0,
    'obj' => 0,
    'src' => 0,
    'title' => 0,
    'MODULE' => 0,
    'USER_MODEL' => 0,
    'IMAGE_INFO' => 0,
    'userelastname' => 0,
    'useremail' => 0,
    'childLinks' => 0,
    'href' => 0,
    'moduleName' => 0,
    'label' => 0,
    'onclick' => 0,
    'THEMES_LIST' => 0,
    'SKIN_NAME' => 0,
    'SEPARATOR' => 0,
    'SKIN_COLOR' => 0,
    'MAILBOX' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_591b4b3a30d40',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591b4b3a30d40')) {function content_591b4b3a30d40($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['LEFTPANELHIDE'] = new Smarty_variable($_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('leftpanelhide'), null, 0);?><div id="mazzy-sidebar-right" class="<?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value!='1'&&$_GET['parent']!="Settings"){?>hide<?php }?>"><div class="mazzy-info"><?php  $_smarty_tpl->tpl_vars['obj'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['obj']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = array_reverse($_smarty_tpl->tpl_vars['HEADER_LINKS']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['obj']->key => $_smarty_tpl->tpl_vars['obj']->value){
$_smarty_tpl->tpl_vars['obj']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['obj']->key;
?><?php $_smarty_tpl->tpl_vars["src"] = new Smarty_variable($_smarty_tpl->tpl_vars['obj']->value->getIconPath(), null, 0);?><?php $_smarty_tpl->tpl_vars["icon"] = new Smarty_variable($_smarty_tpl->tpl_vars['obj']->value->getIcon(), null, 0);?><?php $_smarty_tpl->tpl_vars["title"] = new Smarty_variable($_smarty_tpl->tpl_vars['obj']->value->getLabel(), null, 0);?><?php $_smarty_tpl->tpl_vars["childLinks"] = new Smarty_variable($_smarty_tpl->tpl_vars['obj']->value->getChildLinks(), null, 0);?><?php if (!empty($_smarty_tpl->tpl_vars['src']->value)){?><div class="smartbtn"><div class="mazzy-menu-cat"><a id="menubar_item_right_<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" class="mazzy-show-child-modules btn-profile" mazzy-childmodules="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" href="#"><i style="color: #fff;" class="fa fa-<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
"></i><?php echo vtranslate($_smarty_tpl->tpl_vars['title']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a><?php }else{ ?><div class="mazzy-menu-cat rx"><?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('first_name'), null, 0);?><?php $_smarty_tpl->tpl_vars['useremail'] = new Smarty_variable($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('email1'), null, 0);?><?php $_smarty_tpl->tpl_vars['userelastname'] = new Smarty_variable($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('last_name'), null, 0);?><?php if (empty($_smarty_tpl->tpl_vars['title']->value)){?><?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('last_name'), null, 0);?><?php }?><a id="menubar_item_right_<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
"  class="userName textOverflowEllipsis mazzy-show-child-modules" mazzy-childmodules="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
"  title="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
"><?php  $_smarty_tpl->tpl_vars['IMAGE_INFO'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['IMAGE_INFO']->_loop = false;
 $_smarty_tpl->tpl_vars['ITER'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['USER_MODEL']->value->getImageDetails(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['IMAGE_INFO']->key => $_smarty_tpl->tpl_vars['IMAGE_INFO']->value){
$_smarty_tpl->tpl_vars['IMAGE_INFO']->_loop = true;
 $_smarty_tpl->tpl_vars['ITER']->value = $_smarty_tpl->tpl_vars['IMAGE_INFO']->key;
?><?php if (!empty($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['path'])&&!empty($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'])){?><img class="mazzy-profile pull-left" src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['path'];?>
_<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" data-image-id="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['id'];?>
"><?php }?><?php } ?><span  style="font-size:13px;"><b><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['userelastname']->value;?>
</b><br><?php echo $_smarty_tpl->tpl_vars['useremail']->value;?>
</span></a><?php }?></div><?php if (!empty($_smarty_tpl->tpl_vars['childLinks']->value)){?><div class="mazzy-child-modules <?php if ($_smarty_tpl->tpl_vars['title']->value=="LBL_CRM_SETTINGS"||$_smarty_tpl->tpl_vars['title']->value=="LBL_FEEDBACK"||$_smarty_tpl->tpl_vars['title']->value=="themeroller"){?>hide<?php }?>"  style="width:100%" id="mazzy-child-modules-<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
"><?php  $_smarty_tpl->tpl_vars['obj'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['obj']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['childLinks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['obj']->key => $_smarty_tpl->tpl_vars['obj']->value){
$_smarty_tpl->tpl_vars['obj']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['obj']->key;
?><?php if ($_smarty_tpl->tpl_vars['obj']->value->getLabel()==null){?><?php }else{ ?><?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable($_smarty_tpl->tpl_vars['obj']->value->getId(), null, 0);?><?php $_smarty_tpl->tpl_vars["href"] = new Smarty_variable($_smarty_tpl->tpl_vars['obj']->value->getUrl(), null, 0);?><?php $_smarty_tpl->tpl_vars["label"] = new Smarty_variable($_smarty_tpl->tpl_vars['obj']->value->getLabel(), null, 0);?><?php $_smarty_tpl->tpl_vars["onclick"] = new Smarty_variable('', null, 0);?><?php if (stripos($_smarty_tpl->tpl_vars['obj']->value->getUrl(),'javascript:')===0){?><?php $_smarty_tpl->tpl_vars["onclick"] = new Smarty_variable(("onclick=").($_smarty_tpl->tpl_vars['href']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["href"] = new Smarty_variable("javascript:;", null, 0);?><?php }?><div class="mazzy-module-link <?php if ($_smarty_tpl->tpl_vars['MODULE']->value==$_smarty_tpl->tpl_vars['moduleName']->value){?> selected <?php }?>" ><a target="<?php echo $_smarty_tpl->tpl_vars['obj']->value->target;?>
" id="menubar_item_right_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['label']->value);?>
" <?php if ($_smarty_tpl->tpl_vars['label']->value=='Switch to old look'){?>switchLook<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" <?php echo $_smarty_tpl->tpl_vars['onclick']->value;?>
><i class="fa fa-<?php echo $_smarty_tpl->tpl_vars['moduleName']->value;?>
"></i><?php echo vtranslate($_smarty_tpl->tpl_vars['label']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></div><?php }?><?php } ?><?php if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->isAdminUser()&&$_smarty_tpl->tpl_vars['title']->value=="LBL_CRM_SETTINGS"){?><a id="menubar_item_moduleManager" href="index.php?module=MenuEditor&parent=Settings&view=Index"><i style="margin-left:20px;" class="mazzy-ico fa fa-dot-circle-o"></i> <?php echo vtranslate('LBL_CUSTOMIZE_MAIN_MENU',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a><a id="menubar_item_moduleManager" href="index.php?module=ModuleManager&parent=Settings&view=List"><i style="margin-left:20px;" class="mazzy-ico fa fa-dot-circle-o"></i> <?php echo vtranslate('LBL_ADD_MANAGE_MODULES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a><?php }?></div><?php }?><?php if (!empty($_smarty_tpl->tpl_vars['src']->value)){?></div><?php }?><?php } ?><div class="smartbtn"><div class="mazzy-menu-cat"><a class="mazzy-show-child-modules btn-profile" mazzy-childmodules="themeroller"  href="#"><i style="color: #fff;" class="fa fa-paint-brush"></i><?php echo vtranslate("Skins",$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></div><div class="mazzy-child-modules hide" style="position: relative; width: 100%;" id="mazzy-child-modules-themeroller"><hr><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable(0, null, 0);?><?php $_smarty_tpl->tpl_vars['SEPARATOR'] = new Smarty_variable(0, null, 0);?><?php $_smarty_tpl->tpl_vars['THEMES_LIST'] = new Smarty_variable(Vtiger_Theme::getAllSkins(), null, 0);?><?php  $_smarty_tpl->tpl_vars['SKIN_COLOR'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['SKIN_COLOR']->_loop = false;
 $_smarty_tpl->tpl_vars['SKIN_NAME'] = new Smarty_Variable;
 $_from = array_reverse($_smarty_tpl->tpl_vars['THEMES_LIST']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['SKIN_COLOR']->key => $_smarty_tpl->tpl_vars['SKIN_COLOR']->value){
$_smarty_tpl->tpl_vars['SKIN_COLOR']->_loop = true;
 $_smarty_tpl->tpl_vars['SKIN_NAME']->value = $_smarty_tpl->tpl_vars['SKIN_COLOR']->key;
?><?php if (strstr($_smarty_tpl->tpl_vars['SKIN_NAME']->value,"dandy")||strstr($_smarty_tpl->tpl_vars['SKIN_NAME']->value,"mazzy")){?><?php }elseif($_smarty_tpl->tpl_vars['SEPARATOR']->value==0){?><h4 style="color:#fff!important; margin-left:10px;">Skins</h4><?php $_smarty_tpl->tpl_vars['SEPARATOR'] = new Smarty_variable(1, null, 0);?><?php }?><div class="  <?php if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('theme')==$_smarty_tpl->tpl_vars['SKIN_NAME']->value){?>themeSelected<?php }?>" title="<?php echo ucfirst($_smarty_tpl->tpl_vars['SKIN_NAME']->value);?>
" style="width:100%; cursor:pointer;" ><div class="themeElement" style="background:<?php echo $_smarty_tpl->tpl_vars['SKIN_COLOR']->value;?>
;padding:5px;margin:5px;" data-skin-name="<?php echo $_smarty_tpl->tpl_vars['SKIN_NAME']->value;?>
"><span style="color: #fff; " ><?php echo $_smarty_tpl->tpl_vars['SKIN_NAME']->value;?>
</span><?php if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('theme')==$_smarty_tpl->tpl_vars['SKIN_NAME']->value){?><i style="color: #fff;margin:3px" class="fa fa-check pull-right"></i><?php }?></div></div><?php } ?><hr><div id="progressDiv"></div></div></div></div><div class="clearfix" style="border-bottom:1px solid #ddd;"></div><?php if ($_GET['parent']!="Settings"&&$_smarty_tpl->tpl_vars['MODULE']->value!="Home"){?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SideBarLinks.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="clearfix"></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SideBarWidgets.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?><?php if ($_GET['parent']=="Settings"){?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SideBarSettings.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['MODULE']->value=="MailManager"){?><div id="_quicklinks_mainuidiv_" class="quickWidgetContainer accordion"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("MainuiQuickLinks.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="clearfix">&nbsp;<input type="hidden" id="isMailBoxExists" value="<?php if ($_smarty_tpl->tpl_vars['MAILBOX']->value->exists()){?>1<?php }else{ ?>0<?php }?>"/></div><div class="quickWidget"><div class="accordion-heading accordion-toggle quickWidgetHeader" onclick="MailManager.getFoldersList();"><span class="pull-left"><img class="imageElement" data-rightimage="<?php echo vimage_path('rightArrowWhite.png');?>
" data-downimage="<?php echo vimage_path('downArrowWhite.png');?>
" src="<?php echo vimage_path('rightArrowWhite.png');?>
" /></span>&nbsp;<h5 class="title widgetTextOverflowEllipsis pull-right"><?php echo vtranslate('LBL_Folders',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h5></div><div class="widgetContainer accordion-body collapse in" id="folders"><input type=hidden name="mm_selected_folder" id="mm_selected_folder"><input type="hidden" name="_folder" id="mailbox_folder"></div></div><div id="_mainfolderdiv_" class="quickWidgetContainer accordion"></div></div><?php }?><div class="clearfix"></div><div class="mazzy-menu-cat" ><a class="mazzy-show-child-modules" ><b style="text-transform: capitalize!important;">Keep Sidebar Open</b><br><div class="slideThree"><input type="checkbox" class="slideThreeChk" value="None" id="slideThree" name="check" <?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value=='1'){?>checked<?php }?>/><label for="slideThree"></label></div></a></div></div><?php }} ?>