<?php /* Smarty version Smarty-3.1.7, created on 2017-05-12 11:13:09
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/vlayout/modules/Vtiger/uitypes/StringDetailView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:967813961591598c56bd9f0-51283630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69693da6f925392e83f17e34b7f546a3994d62dc' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/vlayout/modules/Vtiger/uitypes/StringDetailView.tpl',
      1 => 1468487982,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '967813961591598c56bd9f0-51283630',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FIELD_MODEL' => 0,
    'RECORD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_591598c56dbd5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591598c56dbd5')) {function content_591598c56dbd5($_smarty_tpl) {?>



<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getDisplayValue($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'),$_smarty_tpl->tpl_vars['RECORD']->value->getId(),$_smarty_tpl->tpl_vars['RECORD']->value);?>

<?php }} ?>