<?php /* Smarty version Smarty-3.1.7, created on 2017-04-28 15:13:29
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout2/modules/Vtiger/uitypes/PhoneDetailView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67388152959035c19a49df3-22218358%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f320487c3a1e91ec6a8f7851dbb7175a374350b' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout2/modules/Vtiger/uitypes/PhoneDetailView.tpl',
      1 => 1493073575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67388152959035c19a49df3-22218358',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'FIELD_MODEL' => 0,
    'MODULEMODEL' => 0,
    'FIELD_VALUE' => 0,
    'PERMISSION' => 0,
    'PHONE_FIELD_VALUE' => 0,
    'PHONE_NUMBER' => 0,
    'RECORD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_59035c19ac61d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59035c19ac61d')) {function content_59035c19ac61d($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/home/rz2ac608/public_html/crm2u.com.br/poc/libraries/Smarty/libs/plugins/modifier.regex_replace.php';
?>


<?php $_smarty_tpl->tpl_vars['MODULE'] = new Smarty_variable('PBXManager', null, 0);?>
<?php $_smarty_tpl->tpl_vars['MODULEMODEL'] = new Smarty_variable(Vtiger_Module_Model::getInstance($_smarty_tpl->tpl_vars['MODULE']->value), null, 0);?>
<?php $_smarty_tpl->tpl_vars['FIELD_VALUE'] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['MODULEMODEL']->value&&$_smarty_tpl->tpl_vars['MODULEMODEL']->value->isActive()&&$_smarty_tpl->tpl_vars['FIELD_VALUE']->value){?>
    <?php $_smarty_tpl->tpl_vars['PERMISSION'] = new Smarty_variable(PBXManager_Server_Model::checkPermissionForOutgoingCall(), null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['PERMISSION']->value){?>
        <?php $_smarty_tpl->tpl_vars['PHONE_FIELD_VALUE'] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_VALUE']->value, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['PHONE_NUMBER'] = new Smarty_variable(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['PHONE_FIELD_VALUE']->value,"/[-()\s]/",''), null, 0);?>
        <a class="phoneField" data-value="<?php echo $_smarty_tpl->tpl_vars['PHONE_NUMBER']->value;?>
" record="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
" onclick="Vtiger_PBXManager_Js.registerPBXOutboundCall('<?php echo $_smarty_tpl->tpl_vars['PHONE_NUMBER']->value;?>
',<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
)"><?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue');?>
</a>
    <?php }else{ ?>
		<a class="phoneField" data-value="<?php echo $_smarty_tpl->tpl_vars['PHONE_NUMBER']->value;?>
" record="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
" href="tel:<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue');?>
"><?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue');?>
</a>
    <?php }?>
<?php }else{ ?>
   <a class="phoneField" data-value="<?php echo $_smarty_tpl->tpl_vars['PHONE_NUMBER']->value;?>
" record="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
" href="tel:<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue');?>
"><?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue');?>
</a>
<?php }?>
<?php }} ?>