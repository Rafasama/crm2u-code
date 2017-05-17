<?php /* Smarty version Smarty-3.1.7, created on 2017-04-21 19:02:26
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/Settings/Vtiger/TermsAndConditions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86878861358fa5742e68f63-86736554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd452fdf5b24f1fe33a52f39022914e11e15b4df3' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/Settings/Vtiger/TermsAndConditions.tpl',
      1 => 1492799778,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86878861358fa5742e68f63-86736554',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'CONDITION_TEXT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_58fa5742ebf5e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa5742ebf5e')) {function content_58fa5742ebf5e($_smarty_tpl) {?>
<div class="container-fluid" id="TermsAndConditionsContainer"><div class="widget_header row-fluid"><div class="row-fluid"><h3><?php echo vtranslate('LBL_TERMS_AND_CONDITIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></div></div><hr><div class="contents row-fluid"><br><textarea class="input-xxlarge TCContent textarea-autosize" rows="3" placeholder="<?php echo vtranslate('LBL_SPECIFY_TERMS_AND_CONDITIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" style="width:100%;" ><?php echo $_smarty_tpl->tpl_vars['CONDITION_TEXT']->value;?>
</textarea><div class="row-fluid textAlignCenter"><br><button class="btn btn-success saveTC hide"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></div></div></div><?php }} ?>