<?php /* Smarty version Smarty-3.1.7, created on 2017-05-12 13:29:41
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/vlayout/modules/MultiCompany4you/Detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17849684605915b8c55af872-34624261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd527983abff6a5249c0662e527e91a0378fb961b' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/vlayout/modules/MultiCompany4you/Detail.tpl',
      1 => 1494591710,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17849684605915b8c55af872-34624261',
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5915b8c574081',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5915b8c574081')) {function content_5915b8c574081($_smarty_tpl) {?>
<input type="hidden" id="supportedImageFormats" value='<?php echo ZEND_JSON::encode(MultiCompany4you_CompanyDetails_Model::$logoSupportedFormats);?>
' /><div class="padding-left1per"><div class="row-fluid widget_header"><div class="span8"><h3><a href="index.php?parent=Settings&module=MultiCompany4you&view=CompanyList&block=<?php echo $_REQUEST['block'];?>
&fieldid=<?php echo $_REQUEST['fieldid'];?>
"><?php echo vtranslate('LBL_MODULE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a><?php if ($_smarty_tpl->tpl_vars['DESCRIPTION']->value){?><span style="font-size:12px;color: black;"> - &nbsp;<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['DESCRIPTION']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo vtranslate($_tmp1,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span><?php }?></h3></div><div class="span4"><button id="updateCompanyDetails" class="btn pull-right" onclick="window.location.href = 'index.php?parent=Settings&module=MultiCompany4you&view=Edit&block=<?php echo $_REQUEST['block'];?>
&fieldid=<?php echo $_REQUEST['fieldid'];?>
&companyid=<?php echo $_REQUEST['companyid'];?>
';"><?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></div></div><hr><div class="contents tabbable ui-sortable"><ul class="nav nav-tabs layoutTabs massEditTabs"><li class="active"><a href=""><strong><?php echo vtranslate('LBL_COMPANY_DETAILS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li><li class="relatedListTab"><a href="index.php?parent=Settings&module=MultiCompany4you&view=Numbering&companyid=<?php echo $_REQUEST['companyid'];?>
&block=<?php echo $_REQUEST['block'];?>
&fieldid=<?php echo $_REQUEST['fieldid'];?>
"><strong><?php echo vtranslate('LBL_NUMBERING',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li></ul><div class="tab-content layoutContent padding20 themeTableColor overflowVisible"></div></div><div  id="CompanyDetailsContainer" class="<?php if (!empty($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value)){?>hide<?php }?>"><div class="row-fluid"><table class="table table-bordered"><thead><tr class="blockHeader"><th><strong><?php echo vtranslate('LBL_COMPANY_LOGO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th></tr></thead><tbody><tr><td><div class="companyLogo"><img src="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getLogoPath();?>
" class="padding10 alignMiddle" style="max-height:60px;" /></div></td></tr></tbody></table><table class="table table-bordered"><thead><tr class="blockHeader"><th colspan="2"><strong><?php echo vtranslate('LBL_COMPANY_INFORMATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['FIELD_TYPE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FIELD_TYPE']->_loop = false;
 $_smarty_tpl->tpl_vars['FIELD'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getFields(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_TYPE']->key => $_smarty_tpl->tpl_vars['FIELD_TYPE']->value){
$_smarty_tpl->tpl_vars['FIELD_TYPE']->_loop = true;
 $_smarty_tpl->tpl_vars['FIELD']->value = $_smarty_tpl->tpl_vars['FIELD_TYPE']->key;
?><?php if ($_smarty_tpl->tpl_vars['FIELD']->value!='logoname'&&$_smarty_tpl->tpl_vars['FIELD']->value!='logo'&&$_smarty_tpl->tpl_vars['FIELD']->value!='stampname'&&$_smarty_tpl->tpl_vars['FIELD']->value!='stamp'&&$_smarty_tpl->tpl_vars['FIELD']->value!='role'){?><tr><td width="30%"><strong><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></td><td><?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get($_smarty_tpl->tpl_vars['FIELD']->value);?>
</td></tr><?php }?><?php if ($_smarty_tpl->tpl_vars['FIELD']->value=='role'){?><tr><td width="30%"><strong><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></td><td><?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('rolename');?>
</td></tr><?php }?><?php } ?></tbody></table><table class="table table-bordered"><thead><tr class="blockHeader"><th><strong><?php echo vtranslate('LBL_COMPANY_STAMP',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th></tr></thead><tbody><tr><td><div class="companyLogo"><img src="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getStampPath();?>
" class="padding10 alignMiddle" style="max-height:60px;" /></div></td></tr></tbody></table></div></div><?php }} ?>