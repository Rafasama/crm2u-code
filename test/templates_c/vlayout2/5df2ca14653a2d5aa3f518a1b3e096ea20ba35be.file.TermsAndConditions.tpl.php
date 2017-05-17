<?php /* Smarty version Smarty-3.1.7, created on 2017-05-04 01:42:01
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout2/modules/Settings/Vtiger/TermsAndConditions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1452662812590a86e9e022f7-03571117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5df2ca14653a2d5aa3f518a1b3e096ea20ba35be' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout2/modules/Settings/Vtiger/TermsAndConditions.tpl',
      1 => 1493073575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1452662812590a86e9e022f7-03571117',
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
  'unifunc' => 'content_590a86e9eb75c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590a86e9eb75c')) {function content_590a86e9eb75c($_smarty_tpl) {?>
<div class="container-fluid" id="TermsAndConditionsContainer"><div class="widget_header row-fluid"><div class="row-fluid"><h3><?php echo vtranslate('LBL_TERMS_AND_CONDITIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></div></div><hr><div class="contents row-fluid"><br><textarea class="input-xxlarge TCContent textarea-autosize" rows="3" placeholder="<?php echo vtranslate('LBL_SPECIFY_TERMS_AND_CONDITIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" style="width:100%;" ><?php echo $_smarty_tpl->tpl_vars['CONDITION_TEXT']->value;?>
</textarea><div class="row-fluid textAlignCenter"><br><button class="btn btn-success saveTC hide"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></div></div></div><?php }} ?>