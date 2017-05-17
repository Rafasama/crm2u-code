<?php /* Smarty version Smarty-3.1.7, created on 2017-05-12 12:33:15
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/vlayout/modules/MultiCompany4you/Edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14740060735915ab8bc52992-86844185%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '344fde7264404157420175e12e03bf13f0dcfc3a' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/vlayout/modules/MultiCompany4you/Edit.tpl',
      1 => 1494591710,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14740060735915ab8bc52992-86844185',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'DESCRIPTION' => 0,
    'ERROR_MESSAGE' => 0,
    'MODULE_MODEL' => 0,
    'FIELD' => 0,
    'APP' => 0,
    'AVAILABLEROLES' => 0,
    'roleinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5915ab8bdfee3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5915ab8bdfee3')) {function content_5915ab8bdfee3($_smarty_tpl) {?>
<input type="hidden" id="supportedImageFormats" value='<?php echo ZEND_JSON::encode(MultiCompany4you_CompanyDetails_Model::$logoSupportedFormats);?>
' /><div class="padding-left1per"><div class="row-fluid widget_header"><h3><a href="index.php?parent=Settings&module=MultiCompany4you&view=CompanyList&block=<?php echo $_REQUEST['block'];?>
&fieldid=<?php echo $_REQUEST['fieldid'];?>
"><?php echo vtranslate('LBL_MODULE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a> &nbsp;&gt; &nbsp;<?php echo vtranslate('LBL_EDIT_COMPANY_DETAILS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php if ($_smarty_tpl->tpl_vars['DESCRIPTION']->value){?><span style="font-size:12px;color: black;"> - &nbsp;<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['DESCRIPTION']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo vtranslate($_tmp1,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span><?php }?></h3></div><hr><form class="form-horizontal"  id="updateCompanyDetailsForm" method="post" action="index.php" enctype="multipart/form-data"><input type="hidden" name="module" value="MultiCompany4you" /><input type="hidden" name="action" value="Save" /><input type="hidden" name="companyid" value="<?php echo $_REQUEST['companyid'];?>
" /><input type="hidden" name="block" value="<?php echo $_REQUEST['block'];?>
" /><input type="hidden" name="fieldid" value="<?php echo $_REQUEST['fieldid'];?>
" /><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModalFooter.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<table class="table table-bordered"><thead><tr class="blockHeader"><th><strong><?php echo vtranslate('LBL_COMPANY_LOGO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th></tr></thead><tbody><tr><td><input type="file" name="logo" id="logoFile" />&nbsp;&nbsp;<span class="alert alert-info"><?php echo vtranslate('LBL_LOGO_RECOMMENDED_MESSAGE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span><?php if (!empty($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value)){?><br><br><div class="marginLeftZero span9 alert alert-error"><?php echo vtranslate($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><?php }?><div class="companyLogo"><img src="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getLogoPath();?>
" class="alignMiddle" style="max-height:60px;" /></div></td></tr></tbody></table><table class="table table-bordered"><thead><tr class="blockHeader"><th colspan="2"><strong><?php echo vtranslate('LBL_COMPANY_INFORMATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['FIELD_TYPE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FIELD_TYPE']->_loop = false;
 $_smarty_tpl->tpl_vars['FIELD'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getFields(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_TYPE']->key => $_smarty_tpl->tpl_vars['FIELD_TYPE']->value){
$_smarty_tpl->tpl_vars['FIELD_TYPE']->_loop = true;
 $_smarty_tpl->tpl_vars['FIELD']->value = $_smarty_tpl->tpl_vars['FIELD_TYPE']->key;
?><?php if ($_smarty_tpl->tpl_vars['FIELD']->value!='logoname'&&$_smarty_tpl->tpl_vars['FIELD']->value!='logo'&&$_smarty_tpl->tpl_vars['FIELD']->value!='stampname'&&$_smarty_tpl->tpl_vars['FIELD']->value!='stamp'){?><tr><td width="30%"><strong><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php if ($_smarty_tpl->tpl_vars['FIELD']->value=='companyname'){?><span class="redColor">*</span><?php }?></strong></td><td><?php if ($_smarty_tpl->tpl_vars['FIELD']->value=='street'||$_smarty_tpl->tpl_vars['FIELD']->value=='additionalinformations'){?><textarea name="<?php echo $_smarty_tpl->tpl_vars['FIELD']->value;?>
" style="width: 30.5%"><?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get($_smarty_tpl->tpl_vars['FIELD']->value);?>
</textarea><?php }elseif($_smarty_tpl->tpl_vars['FIELD']->value=='role'){?><select id="role" name="role" class="small"><option value="0"><?php echo $_smarty_tpl->tpl_vars['APP']->value['LBL_NONE'];?>
</option><?php  $_smarty_tpl->tpl_vars["roleinfo"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["roleinfo"]->_loop = false;
 $_smarty_tpl->tpl_vars["iter"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['AVAILABLEROLES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["roleinfo"]->key => $_smarty_tpl->tpl_vars["roleinfo"]->value){
$_smarty_tpl->tpl_vars["roleinfo"]->_loop = true;
 $_smarty_tpl->tpl_vars["iter"]->value = $_smarty_tpl->tpl_vars["roleinfo"]->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['roleinfo']->value['roleid'];?>
"<?php if ($_smarty_tpl->tpl_vars['roleinfo']->value['roleid']==$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get($_smarty_tpl->tpl_vars['FIELD']->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['roleinfo']->value['rolename'];?>
</option><?php } ?></select><?php }else{ ?><input type="text" <?php if ($_smarty_tpl->tpl_vars['FIELD']->value=='companyname'){?> data-validation-engine="validate[required]" <?php }?> class="input-xlarge" name="<?php echo $_smarty_tpl->tpl_vars['FIELD']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['FIELD']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get($_smarty_tpl->tpl_vars['FIELD']->value);?>
"/><?php }?></td></tr><?php }?><?php } ?></tbody></table><table class="table table-bordered"><thead><tr class="blockHeader"><th><strong><?php echo vtranslate('LBL_COMPANY_STAMP',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th></tr></thead><tbody><tr><td><input type="file" name="stamp" id="stampFile" />&nbsp;&nbsp;<span class="alert alert-info"><?php echo vtranslate('LBL_STAMP_RECOMMENDED_MESSAGE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span><?php if (!empty($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value)){?><br><br><div class="marginLeftZero span9 alert alert-error"><?php echo vtranslate($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><?php }?><div class="companyLogo"><img src="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getStampPath();?>
" class="alignMiddle" style="max-height:60px;" /></div></td></tr></tbody></table><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModalFooter.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form><?php }} ?>