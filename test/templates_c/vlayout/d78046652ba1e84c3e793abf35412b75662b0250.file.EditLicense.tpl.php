<?php /* Smarty version Smarty-3.1.7, created on 2017-04-21 20:10:18
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/MultiCompany4you/EditLicense.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19566205358fa672adac898-09422004%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd78046652ba1e84c3e793abf35412b75662b0250' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/MultiCompany4you/EditLicense.tpl',
      1 => 1492800609,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19566205358fa672adac898-09422004',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TYPE' => 0,
    'LICENSEKEY' => 0,
    'LABELID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_58fa672ae31c4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa672ae31c4')) {function content_58fa672ae31c4($_smarty_tpl) {?>
<div class="CustomLabelModalContainer"><div class="modal-header"><button class="close vtButton" data-dismiss="modal">×</button><?php if ($_smarty_tpl->tpl_vars['TYPE']->value=="reactivate"){?><h3><?php echo vtranslate('LBL_REACTIVATE','MultiCompany4you');?>
</h3><?php }else{ ?><h3><?php echo vtranslate('LBL_ACTIVATE_KEY','MultiCompany4you');?>
</h3><?php }?></div><form id="editLicense" class="form-horizontal contentsBackground" method="post"><input type="hidden" name="module" value="MultiCompany4you"><input type="hidden" name="action" value="License"><input type="hidden" name="mode" value="editLicense"><input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['TYPE']->value;?>
"><div class="modal-body"><div class="row-fluid"><div class="control-group"><label class="muted control-label"><?php echo vtranslate('LBL_LICENSE_KEY','MultiCompany4you');?>
</label><div class="controls"><input type="text" name="licensekey" value="<?php echo $_smarty_tpl->tpl_vars['LICENSEKEY']->value;?>
" data-validation-engine='validate[required]' /></div></div></div></div><?php if ($_smarty_tpl->tpl_vars['LABELID']->value==''){?><input type="hidden" class="addCustomLabelView" value="true" /><?php }?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ModalFooter.tpl','Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form></div><?php }} ?>