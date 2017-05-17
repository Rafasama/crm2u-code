<?php /* Smarty version Smarty-3.1.7, created on 2017-05-16 18:55:54
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/mazzy/modules/Vtiger/MenuBar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1932895435591b4b3a914609-14033499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b06fb2236c6b11b5995b9d03ff759f12d32fc1e2' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/mazzy/modules/Vtiger/MenuBar.tpl',
      1 => 1494618022,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1932895435591b4b3a914609-14033499',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENU_STRUCTURE' => 0,
    'moreMenus' => 0,
    'CURRENT_USER_MODEL' => 0,
    'COMPANY_LOGO' => 0,
    'MODULE_NAME' => 0,
    'SEARCHABLE_MODULES' => 0,
    'SEARCHED_MODULE' => 0,
    'ANNOUNCEMENT' => 0,
    'announcement' => 0,
    'MODULE' => 0,
    'MENUS' => 0,
    'moduleModel' => 0,
    'quickCreateModule' => 0,
    'singularLabel' => 0,
    'moduleName' => 0,
    'LEFTPANELHIDE' => 0,
    'PARENT_MODULE' => 0,
    'VIEW' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_591b4b3ab041c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591b4b3ab041c')) {function content_591b4b3ab041c($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars["topMenus"] = new Smarty_variable($_smarty_tpl->tpl_vars['MENU_STRUCTURE']->value->getTop(), null, 0);?><?php $_smarty_tpl->tpl_vars["moreMenus"] = new Smarty_variable($_smarty_tpl->tpl_vars['MENU_STRUCTURE']->value->getMore(), null, 0);?><?php $_smarty_tpl->tpl_vars['NUMBER_OF_PARENT_TABS'] = new Smarty_variable(count(array_keys($_smarty_tpl->tpl_vars['moreMenus']->value)), null, 0);?><?php $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL'] = new Smarty_variable(Users_Record_Model::getCurrentUserModel(), null, 0);?><?php $_smarty_tpl->tpl_vars['LEFTPANELHIDE'] = new Smarty_variable($_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('leftpanelhide'), null, 0);?><div class="navbar-inner" ><ul class="nav span1"><li class="active"><span class="dropdown span settingIcons"><a class="dropdown-toggle btn-navbar mazzy-hide-left-sidebar mazzy-sidebar-toggle-button" style='display:none;' href="#"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a><a class="dropdown-toggle btn-navbar mazzy-show-left-sidebar mazzy-sidebar-toggle-button" href="#"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a></span></li></ul><div class="span2"><span class="companyLogo"><img src="<?php echo $_smarty_tpl->tpl_vars['COMPANY_LOGO']->value->get('imagepath');?>
" title="<?php echo $_smarty_tpl->tpl_vars['COMPANY_LOGO']->value->get('title');?>
" alt="<?php echo $_smarty_tpl->tpl_vars['COMPANY_LOGO']->value->get('alt');?>
"/>&nbsp;</span></div><div class="span8 searchElementContainer"><div class="row-fluid"><div class="searchElement span7"><div class="select-search pull-left"><select class="chzn-select" id="basicSearchModulesList" style="width:120px;"><option value="" class="globalSearch_module_All"><?php echo vtranslate('LBL_ALL_RECORDS',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</option><?php  $_smarty_tpl->tpl_vars['fieldObject'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fieldObject']->_loop = false;
 $_smarty_tpl->tpl_vars['MODULE_NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SEARCHABLE_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fieldObject']->key => $_smarty_tpl->tpl_vars['fieldObject']->value){
$_smarty_tpl->tpl_vars['fieldObject']->_loop = true;
 $_smarty_tpl->tpl_vars['MODULE_NAME']->value = $_smarty_tpl->tpl_vars['fieldObject']->key;
?><?php if (isset($_smarty_tpl->tpl_vars['SEARCHED_MODULE']->value)&&$_smarty_tpl->tpl_vars['SEARCHED_MODULE']->value==$_smarty_tpl->tpl_vars['MODULE_NAME']->value&&$_smarty_tpl->tpl_vars['SEARCHED_MODULE']->value!=='All'){?><option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" class="globalSearch_module_<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" selected><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</option><?php }else{ ?><option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" class="globalSearch_module_<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</option><?php }?><?php } ?></select></div><div class="input-append searchBar"><input type="text" class="" id="globalSearchValue" placeholder="<?php echo vtranslate('LBL_GLOBAL_SEARCH');?>
" results="10" /><span style="background-color:#fff" id="searchIcon" class="add-on search-icon"><i class="fa fa-search"></i></span><span style="background-color:#fff" class="adv-search  pull-left add-on search-icon"><a id="globalSearch"><i class="fa fa-search"></i>&nbsp;<i class="fa fa-plus"></i></a></span></div></div><?php $_smarty_tpl->tpl_vars["announcement"] = new Smarty_variable($_smarty_tpl->tpl_vars['ANNOUNCEMENT']->value->get('announcement'), null, 0);?><?php if (!empty($_smarty_tpl->tpl_vars['announcement']->value)){?><div class="myctopannouncement span4" id="" style="display:block;" style="width:100px;"><marquee direction="left" scrolldelay="10" scrollamount="3" behavior="scroll" class="marStyle" onmouseover="javascript:stop();" onmouseout="javascript:start();"><?php if (!empty($_smarty_tpl->tpl_vars['announcement']->value)){?><?php echo $_smarty_tpl->tpl_vars['announcement']->value;?>
<?php }else{ ?><?php echo vtranslate('LBL_NO_ANNOUNCEMENTS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }?></marquee></div><?php }?></div></div><div class="span3 marginLeftZero pull-right" id="headerLinks" style="max-width:20%;"><span id="headerLinksBig" class="pull-right headerLinksContainer"><span class="dropdown span settingIcons qCreate cursorPointer"><i class="fa fa-plus btn-navbar mazzy-sidebar-toggle-button" data-toggle="dropdown"/></i><ul class="dropdown-menu dropdownStyles pull-right commonActionsButtonDropDown"><li class="title"><strong><?php echo vtranslate('Quick Create',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></li><hr/><li id="compactquickCreate"><div class="CompactQC" id="quickCreateModules"><?php  $_smarty_tpl->tpl_vars['moduleModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['moduleModel']->_loop = false;
 $_smarty_tpl->tpl_vars['moduleName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MENUS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['moduleModel']->key => $_smarty_tpl->tpl_vars['moduleModel']->value){
$_smarty_tpl->tpl_vars['moduleModel']->_loop = true;
 $_smarty_tpl->tpl_vars['moduleName']->value = $_smarty_tpl->tpl_vars['moduleModel']->key;
?><?php if ($_smarty_tpl->tpl_vars['moduleModel']->value->isPermitted('EditView')){?><?php $_smarty_tpl->tpl_vars['quickCreateModule'] = new Smarty_variable($_smarty_tpl->tpl_vars['moduleModel']->value->isQuickCreateSupported(), null, 0);?><?php $_smarty_tpl->tpl_vars['singularLabel'] = new Smarty_variable($_smarty_tpl->tpl_vars['moduleModel']->value->getSingularLabelKey(), null, 0);?><?php if ($_smarty_tpl->tpl_vars['quickCreateModule']->value=='1'){?><a class="quickCreateModule" data-name="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getName();?>
"data-url="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getQuickCreateUrl();?>
" href="javascript:void(0)"><?php echo vtranslate($_smarty_tpl->tpl_vars['singularLabel']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
</a><?php }?><?php }?><?php } ?></div></li></ul></span><span class="dropdown span settingIcons"><a class="dropdown-toggle btn-navbar mazzy-show-right-sidebar mazzy-sidebar-toggle-button" href="#"  <?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value=='1'){?>style='display:none;'<?php }?>><i class="fa fa-bars"></i></a><a class="dropdown-toggle btn-navbar mazzy-hide-right-sidebar mazzy-sidebar-toggle-button" href="#"  <?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value!='1'){?>style='display:none;'<?php }?>><i class="fa fa-bars"></i></a></span></span><div id="headerLinksCompact" ><span class="btn-group dropdown qCreate cursorPointer" style="display:none"><img style="width:13px;" src="<?php echo vimage_path('btnAdd_white.png');?>
" class="btn-navbar mazzy-sidebar-toggle-button" alt="<?php echo vtranslate('LBL_QUICK_CREATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" title="<?php echo vtranslate('LBL_QUICK_CREATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" data-toggle="dropdown"/><ul class="dropdown-menu dropdownStyles pull-right commonActionsButtonDropDown"><li class="title"><strong><?php echo vtranslate('Quick Create',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></li><hr/><li id="compactquickCreate"><div class="CompactQC"  id="quickCreateModules"><?php  $_smarty_tpl->tpl_vars['moduleModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['moduleModel']->_loop = false;
 $_smarty_tpl->tpl_vars['moduleName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MENUS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['moduleModel']->key => $_smarty_tpl->tpl_vars['moduleModel']->value){
$_smarty_tpl->tpl_vars['moduleModel']->_loop = true;
 $_smarty_tpl->tpl_vars['moduleName']->value = $_smarty_tpl->tpl_vars['moduleModel']->key;
?><?php if ($_smarty_tpl->tpl_vars['moduleModel']->value->isPermitted('EditView')){?><?php $_smarty_tpl->tpl_vars['quickCreateModule'] = new Smarty_variable($_smarty_tpl->tpl_vars['moduleModel']->value->isQuickCreateSupported(), null, 0);?><?php $_smarty_tpl->tpl_vars['singularLabel'] = new Smarty_variable($_smarty_tpl->tpl_vars['moduleModel']->value->getSingularLabelKey(), null, 0);?><?php if ($_smarty_tpl->tpl_vars['quickCreateModule']->value=='1'){?><a class="quickCreateModule" data-name="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getName();?>
"data-url="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getQuickCreateUrl();?>
" href="javascript:void(0)"><?php echo vtranslate($_smarty_tpl->tpl_vars['singularLabel']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
</a><?php }?><?php }?><?php } ?></div></li></ul></span><span  class="dropdown"><a class="dropdown-toggle btn-navbar mazzy-show-right-sidebar mazzy-sidebar-toggle-button" href="#" style="display:none;"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a><a class="dropdown-toggle btn-navbar mazzy-hide-right-sidebar mazzy-sidebar-toggle-button" href="#"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a></span></div><div class="notificationMessageHolder span12"></div><!-- <?php if (!empty($_smarty_tpl->tpl_vars['announcement']->value)){?><div class="btn-group cursorPointer"><img class='alignMiddle' src="<?php echo vimage_path('btnAnnounceOff.png');?>
" alt="<?php echo vtranslate('LBL_ANNOUNCEMENT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" title="<?php echo vtranslate('LBL_ANNOUNCEMENT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" id="announcementBtn" /></div>&nbsp;<?php }?> --><?php $_smarty_tpl->tpl_vars["announcement"] = new Smarty_variable($_smarty_tpl->tpl_vars['ANNOUNCEMENT']->value->get('announcement'), null, 0);?><input type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" id='module' name='module'/><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['PARENT_MODULE']->value;?>
" id="parent" name='parent' /><input type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['VIEW']->value;?>
" id='view' name='view'/></div></div><div class="clearfix"></div><?php if (!empty($_smarty_tpl->tpl_vars['announcement']->value)){?><div class="announcement noprint mycmobileannouncement" ><marquee direction="left" scrolldelay="10" scrollamount="3" behavior="scroll" class="marStyle" onmouseover="javascript:stop();" onmouseout="javascript:start();"><?php if (!empty($_smarty_tpl->tpl_vars['announcement']->value)){?><?php echo $_smarty_tpl->tpl_vars['announcement']->value;?>
<?php }else{ ?><?php echo vtranslate('LBL_NO_ANNOUNCEMENTS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }?></marquee></div><?php }?>
<?php }} ?>