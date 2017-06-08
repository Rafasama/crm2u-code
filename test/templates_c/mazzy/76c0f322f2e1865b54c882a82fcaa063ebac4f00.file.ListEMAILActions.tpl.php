<?php /* Smarty version Smarty-3.1.7, created on 2017-05-22 14:52:24
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/ListEMAILActions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14708329985922fb28796249-03891280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76c0f322f2e1865b54c882a82fcaa063ebac4f00' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/ListEMAILActions.tpl',
      1 => 1495464681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14708329985922fb28796249-03891280',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LISTVIEW_LINKS' => 0,
    'MODULE' => 0,
    'LISTVIEW_SETTING' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5922fb287d28e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5922fb287d28e')) {function content_5922fb287d28e($_smarty_tpl) {?>
<span class="listViewActions"><?php if (count($_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEWSETTING'])>0){?><span class="btn-toolbar"><span class="btn-group pull-right" style='background-color: green;'><button class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="alignMiddle" src="<?php echo vimage_path('tools.png');?>
" alt="<?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" title="<?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
">&nbsp;&nbsp;<i class="caret"></i></button><ul class="listViewSetting dropdown-menu"><?php  $_smarty_tpl->tpl_vars['LISTVIEW_SETTING'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEWSETTING']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->key => $_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->_loop = true;
?><li><a href=<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->value->getUrl();?>
><?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php } ?></ul></span></span><?php }?></span><div class="clearfix"></div><input type="hidden" id="recordsCount" value=""/><input type="hidden" id="selectedIds" name="selectedIds" /><input type="hidden" id="excludedIds" name="excludedIds" /><?php }} ?>