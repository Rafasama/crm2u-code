<?php /* Smarty version Smarty-3.1.7, created on 2017-05-07 21:57:58
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/VTENotepad/NotepadEditor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:576871943590f9866e90c58-93357658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee2659bc26c611c39aa37a7c9d6a91c545714684' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/VTENotepad/NotepadEditor.tpl',
      1 => 1493861345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '576871943590f9866e90c58-93357658',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RECORD' => 0,
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_590f986702d83',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590f986702d83')) {function content_590f986702d83($_smarty_tpl) {?>

<div class="pull-right commonActionsButtonContainer"><div class="btn-group dropdown mega-dropdown"><a href="javascript:;" class="dropdown-toggle"><img src="layouts/vlayout/modules/VTENotepad/resources/favicon.png"id="vtiger_vtenotepad-icon" class="alignMiddle"alt="VTENotepad" title="VTENotepad"></a><ul class="dropdown-menu dropdownStyles commonActionsButtonDropDown mega-dropdown-menu"><li id="vtiger_vtenotepad-container"><div class="row-fluid"><div class="span12"><textarea name="" id="vtiger_vtenotepad-content" cols="30" rows="15"data-id="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['RECORD']->value ? $_smarty_tpl->tpl_vars['RECORD']->value->getId() : 0;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['RECORD']->value ? $_smarty_tpl->tpl_vars['RECORD']->value->get('content') : '';?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
</textarea></div></div><div class="row-fluid"><div class="span12"><span class="vtiger_vtenotepad-updated"><span class="vtiger_vtenotepad-updated-label"><?php echo vtranslate('Last saved',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</span>:&nbsp;<span class="vtiger_vtenotepad-updated-time"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['RECORD']->value ? $_smarty_tpl->tpl_vars['RECORD']->value->get('updated') : '';?>
<?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>
</span></span><button class="btn btn-success btn-save" type="button"><?php echo vtranslate('Save',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</button></div></div></li></ul></div></div>
<?php }} ?>