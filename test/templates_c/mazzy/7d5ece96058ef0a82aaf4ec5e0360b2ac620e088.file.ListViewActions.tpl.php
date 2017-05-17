<?php /* Smarty version Smarty-3.1.7, created on 2017-05-12 11:17:58
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/mazzy/modules/Vtiger/ListViewActions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1069745625591599e6ee3dc9-27126072%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d5ece96058ef0a82aaf4ec5e0360b2ac620e088' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/mazzy/modules/Vtiger/ListViewActions.tpl',
      1 => 1494587708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1069745625591599e6ee3dc9-27126072',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_MODEL' => 0,
    'LISTVIEW_LINKS' => 0,
    'LISTVIEW_ENTRIES_COUNT' => 0,
    'PAGING_MODEL' => 0,
    'MODULE' => 0,
    'PAGE_COUNT' => 0,
    'moduleName' => 0,
    'PAGE_NUMBER' => 0,
    'LISTVIEW_SETTING' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_591599e704b82',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591599e704b82')) {function content_591599e704b82($_smarty_tpl) {?>
<div class="listViewActions pull-right"><?php if ((method_exists($_smarty_tpl->tpl_vars['MODULE_MODEL']->value,'isPagingSupported')&&($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isPagingSupported()==true))||!method_exists($_smarty_tpl->tpl_vars['MODULE_MODEL']->value,'isPagingSupported')){?><div class="pageNumbers alignTop <?php if (count($_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEWSETTING'])>0){?><?php }else{ ?><?php }?>"><span><span class="pageNumbersText" style="padding-right:5px"><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value){?><?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordStartRange();?>
 <?php echo vtranslate('LBL_to',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordEndRange();?>
<?php }else{ ?><span>&nbsp;</span><?php }?></span><span class="fa fa-refresh pull-right totalNumberOfRecords cursorPointer<?php if (!$_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value){?> hide<?php }?>"></span></span></div><div class="btn-group alignTop margin0px"><span class="pull-right"><span class="btn-group"><button class="btn" id="listViewPreviousPageButton" <?php if (!$_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isPrevPageExists()){?> disabled <?php }?> type="button"><span class="fa fa-chevron-left"></span></button><button class="btn dropdown-toggle" type="button" id="listViewPageJump" data-toggle="dropdown" <?php if ($_smarty_tpl->tpl_vars['PAGE_COUNT']->value==1){?> disabled <?php }?>><i class="vtGlyph vticon-pageJump" title="<?php echo vtranslate('LBL_LISTVIEW_PAGE_JUMP',$_smarty_tpl->tpl_vars['moduleName']->value);?>
"></i></button><ul class="listViewBasicAction dropdown-menu" id="listViewPageJumpDropDown"><li><span class="row-fluid"><span class="span3 pushUpandDown2per"><span class="pull-right"><?php echo vtranslate('LBL_PAGE',$_smarty_tpl->tpl_vars['moduleName']->value);?>
</span></span><span class="span4"><input type="text" id="pageToJump" class="listViewPagingInput" value="<?php echo $_smarty_tpl->tpl_vars['PAGE_NUMBER']->value;?>
"/></span><span class="span2 textAlignCenter pushUpandDown2per"><?php echo vtranslate('LBL_OF',$_smarty_tpl->tpl_vars['moduleName']->value);?>
&nbsp;</span><span class="span2 pushUpandDown2per" id="totalPageCount"><?php echo $_smarty_tpl->tpl_vars['PAGE_COUNT']->value;?>
</span></span></li></ul><button class="btn" id="listViewNextPageButton" <?php if ((!$_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isNextPageExists())||($_smarty_tpl->tpl_vars['PAGE_COUNT']->value==1)){?> disabled <?php }?> type="button"><span class="fa fa-chevron-right"></span></button></span></span></div><?php }?><?php if (count($_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEWSETTING'])>0){?><div class="settingsIcon"><span class="pull-right btn-group"><button class="btn dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-cog" alt="<?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" title="<?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></i> <i class="fa fa-caret-down"></i></button><ul class="listViewSetting dropdown-menu"><?php  $_smarty_tpl->tpl_vars['LISTVIEW_SETTING'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEWSETTING']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->key => $_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->_loop = true;
?><li><a href=<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->value->getUrl();?>
><?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php } ?></ul></span></div><?php }?></div><div class="clearfix"></div><input type="hidden" id="recordsCount" value=""/><input type="hidden" id="selectedIds" name="selectedIds" /><input type="hidden" id="excludedIds" name="excludedIds" /><?php }} ?>