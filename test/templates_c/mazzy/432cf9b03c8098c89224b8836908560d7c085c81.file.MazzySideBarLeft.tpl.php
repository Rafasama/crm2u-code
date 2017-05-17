<?php /* Smarty version Smarty-3.1.7, created on 2017-05-07 22:09:18
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/mazzy/modules/Vtiger/MazzySideBarLeft.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1764864026590f9b0eecc0d9-09680771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '432cf9b03c8098c89224b8836908560d7c085c81' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/mazzy/modules/Vtiger/MazzySideBarLeft.tpl',
      1 => 1494194836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1764864026590f9b0eecc0d9-09680771',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENU_STRUCTURE' => 0,
    'CURRENT_USER_MODEL' => 0,
    'MODULE' => 0,
    'MENUS' => 0,
    'moduleModel' => 0,
    'quickCreateModule' => 0,
    'singularLabel' => 0,
    'moduleName' => 0,
    'HOME_MODULE_MODEL' => 0,
    'topMenus' => 0,
    'topmenuClassName' => 0,
    'translatedModuleLabel' => 0,
    'moreMenus' => 0,
    'parent' => 0,
    'moduleList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_590f9b0f1b01d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590f9b0f1b01d')) {function content_590f9b0f1b01d($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars["moreMenus"] = new Smarty_variable($_smarty_tpl->tpl_vars['MENU_STRUCTURE']->value->getMore(), null, 0);?><?php $_smarty_tpl->tpl_vars["topMenus"] = new Smarty_variable($_smarty_tpl->tpl_vars['MENU_STRUCTURE']->value->getTop(), null, 0);?><?php $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL'] = new Smarty_variable(Users_Record_Model::getCurrentUserModel(), null, 0);?><?php $_smarty_tpl->tpl_vars['LEFTPANELHIDE'] = new Smarty_variable($_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('leftpanelhide'), null, 0);?><div id="mazzy-sidebar-left" class=""><div class="mazzy-menu"><div class="clearfix"></div><!-- search mobile--><div class="row-fluid" id ="searchmobile"><div class="searchElement "><h3 style="font-weight:100; color:#fff!important;">Quick Search</h3><div class="input-append "><input id="globalSearchValue_mob" type="text" class="span2 search-query" placeholder="<?php echo vtranslate('LBL_GLOBAL_SEARCH');?>
" results="10">&nbsp;<a id="searchIcon_mob" class="btn btn-success searchbtn pull-left"><i class="fa fa-search"></i></a><span class="dropdown span settingIcons qCreate cursorPointer" style="margin-left:0px;margin-top: -2px;"><a class="btn btn-success mazzy-sidebar-toggle-button" data-toggle="dropdown" ><i class="fa fa-plus"></i></a><ul class="dropdown-menu dropdownStyles pull-right commonActionsButtonDropDown"><li class="title"><strong><?php echo vtranslate('Quick Create',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></li><hr/><li id="compactquickCreate"><div class="CompactQC" id="quickCreateModules"><?php  $_smarty_tpl->tpl_vars['moduleModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['moduleModel']->_loop = false;
 $_smarty_tpl->tpl_vars['moduleName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MENUS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['moduleModel']->key => $_smarty_tpl->tpl_vars['moduleModel']->value){
$_smarty_tpl->tpl_vars['moduleModel']->_loop = true;
 $_smarty_tpl->tpl_vars['moduleName']->value = $_smarty_tpl->tpl_vars['moduleModel']->key;
?><?php if ($_smarty_tpl->tpl_vars['moduleModel']->value->isPermitted('EditView')){?><?php $_smarty_tpl->tpl_vars['quickCreateModule'] = new Smarty_variable($_smarty_tpl->tpl_vars['moduleModel']->value->isQuickCreateSupported(), null, 0);?><?php $_smarty_tpl->tpl_vars['singularLabel'] = new Smarty_variable($_smarty_tpl->tpl_vars['moduleModel']->value->getSingularLabelKey(), null, 0);?><?php if ($_smarty_tpl->tpl_vars['quickCreateModule']->value=='1'){?><a class="quickCreateModule" data-name="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getName();?>
"data-url="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getQuickCreateUrl();?>
" href="javascript:void(0)"><?php echo vtranslate($_smarty_tpl->tpl_vars['singularLabel']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
</a><?php }?><?php }?><?php } ?></div></li></ul></span></div></div><hr></div><!--/ search mobile--><div class="mazzy-menu-cat <?php if ($_smarty_tpl->tpl_vars['MODULE']->value=='Home'){?> selected <?php }?>"><a class="alignMiddle " href="<?php echo $_smarty_tpl->tpl_vars['HOME_MODULE_MODEL']->value->getDefaultUrl();?>
" ><i class="fa fa-home fa-2x"></i><span class="mazzymenutext"><?php echo vtranslate('LBL_HOME',$_smarty_tpl->tpl_vars['moduleName']->value);?>
</span><div class="clearfix"></div></a></div><?php  $_smarty_tpl->tpl_vars['moduleModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['moduleModel']->_loop = false;
 $_smarty_tpl->tpl_vars['moduleName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['topMenus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['moduleModel']->key => $_smarty_tpl->tpl_vars['moduleModel']->value){
$_smarty_tpl->tpl_vars['moduleModel']->_loop = true;
 $_smarty_tpl->tpl_vars['moduleName']->value = $_smarty_tpl->tpl_vars['moduleModel']->key;
?><?php $_smarty_tpl->tpl_vars['translatedModuleLabel'] = new Smarty_variable(vtranslate($_smarty_tpl->tpl_vars['moduleModel']->value->get('label'),$_smarty_tpl->tpl_vars['moduleName']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["topmenuClassName"] = new Smarty_variable("tabs", null, 0);?><?php if ($_smarty_tpl->tpl_vars['MODULE']->value==$_smarty_tpl->tpl_vars['moduleName']->value){?><?php $_smarty_tpl->tpl_vars["topmenuClassName"] = new Smarty_variable("selected", null, 0);?><?php }?><div class="mazzy-menu-cat <?php echo $_smarty_tpl->tpl_vars['topmenuClassName']->value;?>
"><a  <?php if ($_smarty_tpl->tpl_vars['moduleModel']->value->isEntityModule()){?>style="float:left; width:130px!important;"<?php }?> class="alignMiddle <?php echo $_smarty_tpl->tpl_vars['topmenuClassName']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getDefaultUrl();?>
"><?php if (vimage_path(($_smarty_tpl->tpl_vars['moduleName']->value).('.png'))!=false){?><img  class="mazzyiconimg alignMiddle" src="<?php echo vimage_path(($_smarty_tpl->tpl_vars['moduleName']->value).('.png'));?>
" alt="<?php echo vtranslate($_smarty_tpl->tpl_vars['moduleName']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['moduleName']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
"/><?php }else{ ?><img  class="mazzyiconimg alignMiddle" src="<?php echo vimage_path('DefaultModule.png');?>
" alt="<?php echo vtranslate($_smarty_tpl->tpl_vars['moduleName']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['moduleName']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
"/><?php }?><span class="mazzymenutext"><?php echo $_smarty_tpl->tpl_vars['translatedModuleLabel']->value;?>
</span></a><?php if ($_smarty_tpl->tpl_vars['moduleModel']->value->isEntityModule()){?><a class="mycgridsidebarbtn" style="float:left;width:20px;display:none;" href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['moduleName']->value;?>
&view=Grid"><i class="fa fa-th-large" style="font-size:16px;"></i></a><?php }?><div class="clearfix"></div></div><?php } ?><?php  $_smarty_tpl->tpl_vars['moduleList'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['moduleList']->_loop = false;
 $_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['moreMenus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['moduleList']->key => $_smarty_tpl->tpl_vars['moduleList']->value){
$_smarty_tpl->tpl_vars['moduleList']->_loop = true;
 $_smarty_tpl->tpl_vars['parent']->value = $_smarty_tpl->tpl_vars['moduleList']->key;
?><div class="mazzy-menu-cat"><a class="mazzy-show-child-modules" mazzy-childmodules="<?php echo $_smarty_tpl->tpl_vars['parent']->value;?>
"><i class="fa fa-<?php echo $_smarty_tpl->tpl_vars['parent']->value;?>
"></i><span class="mazzymenutext"><?php echo vtranslate("LBL_".($_smarty_tpl->tpl_vars['parent']->value),$_smarty_tpl->tpl_vars['moduleName']->value);?>
</span><div class="clearfix"></div></a></div><div class="mazzy-child-modules hide" id="mazzy-child-modules-<?php echo $_smarty_tpl->tpl_vars['parent']->value;?>
"><?php  $_smarty_tpl->tpl_vars['moduleModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['moduleModel']->_loop = false;
 $_smarty_tpl->tpl_vars['moduleName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['moduleList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['moduleModel']->key => $_smarty_tpl->tpl_vars['moduleModel']->value){
$_smarty_tpl->tpl_vars['moduleModel']->_loop = true;
 $_smarty_tpl->tpl_vars['moduleName']->value = $_smarty_tpl->tpl_vars['moduleModel']->key;
?><?php if (!isset($_smarty_tpl->tpl_vars['topMenus']->value[$_smarty_tpl->tpl_vars['moduleName']->value])){?><?php $_smarty_tpl->tpl_vars['translatedModuleLabel'] = new Smarty_variable(vtranslate($_smarty_tpl->tpl_vars['moduleModel']->value->get('label'),$_smarty_tpl->tpl_vars['moduleName']->value), null, 0);?><div class="mazzy-module-link <?php if ($_smarty_tpl->tpl_vars['MODULE']->value==$_smarty_tpl->tpl_vars['moduleName']->value){?> selected <?php }?>" <?php if ($_smarty_tpl->tpl_vars['moduleModel']->value->isEntityModule()){?>style="float:left; width:85%!important;"<?php }?> ><a id="menubar_item_<?php echo $_smarty_tpl->tpl_vars['moduleName']->value;?>
"   class="alignMiddle <?php echo $_smarty_tpl->tpl_vars['topmenuClassName']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getDefaultUrl();?>
"><?php if (vimage_path(($_smarty_tpl->tpl_vars['moduleName']->value).('.png'))!=false){?><img  class="mazzyiconimg alignMiddle" src="<?php echo vimage_path(($_smarty_tpl->tpl_vars['moduleName']->value).('.png'));?>
" alt="<?php echo vtranslate($_smarty_tpl->tpl_vars['moduleName']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['moduleName']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
"/><?php }else{ ?><img  class="mazzyiconimg alignMiddle" src="<?php echo vimage_path('DefaultModule.png');?>
" alt="<?php echo vtranslate($_smarty_tpl->tpl_vars['moduleName']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['moduleName']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
"/><?php }?><span class="mazzymenutext"><?php echo $_smarty_tpl->tpl_vars['translatedModuleLabel']->value;?>
</span></a></div><?php if ($_smarty_tpl->tpl_vars['moduleModel']->value->isEntityModule()){?><a class="mycgridsidebarbtn" style="float:left;width:15%;height:100%;display:none;text-align:center" href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['moduleName']->value;?>
&view=Grid"><i class="fa fa-th-large"></i></a><?php }?><div class="clearfix"></div><?php }?><?php } ?></div><?php } ?></div></div><style>#mazzy-sidebar-left .mazzy-menu{margin-top: 2px !important;}.mazzyiconimg{max-width: 20px;margin-right: 12px;float: left;}#mazzy-sidebar-left{width: 50px;}.mazzymenutext{display: none;}.mazzy-menu-cat a i{float: left;}.mazzy-module-link img{padding-left: 13px;}</style>
<?php }} ?>