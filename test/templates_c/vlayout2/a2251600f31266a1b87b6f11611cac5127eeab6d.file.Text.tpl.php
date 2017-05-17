<?php /* Smarty version Smarty-3.1.7, created on 2017-04-27 00:35:22
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout2/modules/PurchaseOrder/uitypes/Text.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123614857059013cca32c8e7-93489559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2251600f31266a1b87b6f11611cac5127eeab6d' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout2/modules/PurchaseOrder/uitypes/Text.tpl',
      1 => 1493073575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123614857059013cca32c8e7-93489559',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FIELD_MODEL' => 0,
    'FIELD_NAME' => 0,
    'FIELD_INFO' => 0,
    'SPECIAL_VALIDATOR' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_59013cca4a0ad',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59013cca4a0ad')) {function content_59013cca4a0ad($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars["FIELD_INFO"] = new Smarty_variable(Zend_Json::encode($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo()), null, 0);?><?php $_smarty_tpl->tpl_vars["SPECIAL_VALIDATOR"] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getValidator(), null, 0);?><?php $_smarty_tpl->tpl_vars["FIELD_NAME"] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName(), null, 0);?><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype')=='19'||$_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype')=='20'){?><textarea class="row-fluid <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isNameField()){?>nameField<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['FIELD_NAME']->value=="notecontent"){?>id="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
"<?php }?> data-validation-engine="validate[<?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isMandatory()==true){?>required,<?php }?>funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" data-fieldinfo='<?php echo $_smarty_tpl->tpl_vars['FIELD_INFO']->value;?>
' <?php if (!empty($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value)){?>data-validator=<?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value);?>
<?php }?>><?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue');?>
</textarea><?php }else{ ?><textarea class="row-fluid <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isNameField()){?>nameField<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" data-validation-engine="validate[<?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isMandatory()==true){?>required,<?php }?>funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" data-fieldinfo='<?php echo $_smarty_tpl->tpl_vars['FIELD_INFO']->value;?>
' <?php if (!empty($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value)){?>data-validator=<?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value);?>
<?php }?>><?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue');?>
</textarea><?php if ($_REQUEST['view']!='Detail'){?><?php if ($_smarty_tpl->tpl_vars['FIELD_NAME']->value=="bill_street"){?><div><a class="cursorPointer" name="copyAddress" data-target="shipping"><?php echo vtranslate('LBL_COPY_SHIPPING_ADDRESS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a> <br><a class="cursorPointer" name="copyCompanyAddress" data-target="bill"><?php echo vtranslate('LBL_COPY_COMPANY_ADDRESS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></div><?php }elseif($_smarty_tpl->tpl_vars['FIELD_NAME']->value=="ship_street"){?><div><a class="cursorPointer" name="copyAddress" data-target="billing"><?php echo vtranslate('LBL_COPY_BILLING_ADDRESS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a> <br><a class="cursorPointer" name="copyCompanyAddress" data-target="ship"><?php echo vtranslate('LBL_COPY_COMPANY_ADDRESS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></div><?php }?><?php }?><?php }?><?php }} ?>