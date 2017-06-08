<?php /* Smarty version Smarty-3.1.7, created on 2017-05-22 14:58:08
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/ListMEActions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14874084035922fc81001c36-83428515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e63222aa0ac083c2798ed74f4a2814165d66bc9d' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/ListMEActions.tpl',
      1 => 1495464681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14874084035922fc81001c36-83428515',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LISTVIEW_ENTIRES_COUNT' => 0,
    'PAGING_MODEL' => 0,
    'MODULE' => 0,
    'PAGE_COUNT' => 0,
    'moduleName' => 0,
    'PAGE_NUMBER' => 0,
    'IS_ADMIN' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5922fc810a7be',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5922fc810a7be')) {function content_5922fc810a7be($_smarty_tpl) {?>
<span class="pull-right listViewActions"><span class="pageNumbers alignTop" data-placement="bottom" ><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTIRES_COUNT']->value){?><?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordStartRange();?>
 <?php echo vtranslate('LBL_to',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordEndRange();?>
<?php }?></span><span class="btn-group alignTop"><span class="btn-group"><button class="btn" id="listViewPreviousPageButton" <?php if (!$_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isPrevPageExists()){?> disabled <?php }?> type="button"><span class="icon-chevron-left"></span></button><button class="btn dropdown-toggle" type="button" id="listViewPageJump" data-toggle="dropdown" <?php if ($_smarty_tpl->tpl_vars['PAGE_COUNT']->value==1){?> disabled <?php }?>><i class="vtGlyph vticon-pageJump" title="<?php echo vtranslate('LBL_LISTVIEW_PAGE_JUMP',$_smarty_tpl->tpl_vars['moduleName']->value);?>
"></i></button><ul class="listViewBasicAction dropdown-menu" id="listViewPageJumpDropDown"><li><span class="row-fluid"><span class="span3 pushUpandDown2per"><span class="pull-right"><?php echo vtranslate('LBL_PAGE',$_smarty_tpl->tpl_vars['moduleName']->value);?>
</span></span><span class="span4"><input type="text" id="pageToJump" class="listViewPagingInput" value="<?php echo $_smarty_tpl->tpl_vars['PAGE_NUMBER']->value;?>
"/></span><span class="span2 textAlignCenter pushUpandDown2per"><?php echo vtranslate('LBL_OF',$_smarty_tpl->tpl_vars['moduleName']->value);?>
&nbsp;</span><span class="span2 pushUpandDown2per" id="totalPageCount"><?php echo $_smarty_tpl->tpl_vars['PAGE_COUNT']->value;?>
</span></span></li></ul><button class="btn" id="listViewNextPageButton" <?php if ((!$_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isNextPageExists())||($_smarty_tpl->tpl_vars['PAGE_COUNT']->value==1)){?> disabled <?php }?> type="button"><span class="icon-chevron-right"></span></button></span></span><?php if ($_smarty_tpl->tpl_vars['IS_ADMIN']->value=='1'){?><span class="btn-group"><span class="pull-right listViewActions"><span class="btn-group"><button class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="alignMiddle" src="<?php echo vimage_path('tools.png');?>
" alt="<?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" title="<?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
">&nbsp;&nbsp;<i class="caret"></i></button><ul class="listViewSetting dropdown-menu"><li><a href="index.php?module=CronTasks&parent=Settings&view=List&block=4&fieldid=26"><?php echo vtranslate("Scheduler","Settings");?>
</a></li></ul></span></span></span><?php }?></span><div class="clearfix"></div><input type="hidden" id="recordsCount" value=""/><input type="hidden" id="selectedIds" name="selectedIds" /><input type="hidden" id="excludedIds" name="excludedIds" /><?php }} ?>