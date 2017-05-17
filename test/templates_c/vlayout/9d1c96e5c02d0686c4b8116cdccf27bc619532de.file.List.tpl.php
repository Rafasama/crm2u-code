<?php /* Smarty version Smarty-3.1.7, created on 2017-04-21 20:05:45
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/MultiCompany4you/List.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173721955558fa6619a1c336-29472240%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d1c96e5c02d0686c4b8116cdccf27bc619532de' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/MultiCompany4you/List.tpl',
      1 => 1492800609,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173721955558fa6619a1c336-29472240',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'DESCRIPTION' => 0,
    'COMPANIES' => 0,
    'company' => 0,
    'ERROR_MESSAGE' => 0,
    'MODULE_MODEL' => 0,
    'FIELD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_58fa6619baf03',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa6619baf03')) {function content_58fa6619baf03($_smarty_tpl) {?>
<div class="padding-left1per"><div class="row-fluid widget_header"><div class="span8"><h3><?php echo vtranslate('LBL_COMPANY_LIST',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php if ($_smarty_tpl->tpl_vars['DESCRIPTION']->value){?><span style="font-size:12px;color: black;"> - &nbsp;<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['DESCRIPTION']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo vtranslate($_tmp1,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span><?php }?></h3></div><div class="span4"><button id="NumberingSettings" class="btn pull-right" onclick="window.location.href = 'index.php?parent=Settings&module=MultiCompany4you&view=License&block=<?php echo $_REQUEST['block'];?>
&fieldid=<?php echo $_REQUEST['fieldid'];?>
';" title="<?php echo vtranslate('LICENSE_SETTINGS_INFO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><img class="alignMiddle" src="<?php echo vimage_path('tools.png');?>
" alt="<?php echo vtranslate('LICENSE_SETTINGS_INFO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /></button></div></div><hr><div class="row-fluid"><span class="span6 btn-toolbar"><button class="btn addButton" onclick="window.location.href='index.php?parent=Settings&module=MultiCompany4you&view=Edit&companyid=&block=<?php echo $_REQUEST['block'];?>
&fieldid=<?php echo $_REQUEST['fieldid'];?>
';"><i class="icon-plus icon-white"></i>&nbsp;<strong><?php echo vtranslate('LBL_NEW_COMPANY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></span><div class="clearfix"></div></div><div class="listViewContentDiv" id="listViewContents"><div class="listViewEntriesDiv contents-bottomscroll"><div class="bottomscroll-div"><table border=0 cellspacing=0 cellpadding=5 width=100% class="table table-bordered listViewEntriesTable"><thead><tr class="listViewHeaders"><th width="2%" class="narrowWidthType">#</th><th width="20%" class="narrowWidthType"><?php echo vtranslate("LBL_COMPANY_NAME",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th width="20%" class="narrowWidthType"><?php echo vtranslate("email",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th width="20%" class="narrowWidthType"><?php echo vtranslate("phone",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th width="20%" class="narrowWidthType"><?php echo vtranslate("role",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th width="10%" class="narrowWidthType"><?php echo vtranslate('LBL_ACTIONS');?>
</th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['company']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['COMPANIES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['companiesforeach']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
$_smarty_tpl->tpl_vars['company']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['companiesforeach']['iteration']++;
?><tr class="listViewEntries" data-id="<?php echo $_smarty_tpl->tpl_vars['company']->value['companyid'];?>
" data-recordurl="index.php?parent=Settings&module=MultiCompany4you&view=Detail&block=<?php echo $_REQUEST['block'];?>
&fieldid=<?php echo $_REQUEST['fieldid'];?>
&companyid=<?php echo $_smarty_tpl->tpl_vars['company']->value['companyid'];?>
" id="MultiCompany_List_row_<?php echo $_smarty_tpl->tpl_vars['company']->value['companyid'];?>
"><td class="narrowWidthType"><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['companiesforeach']['iteration'];?>
</td><td class="narrowWidthType"><a href="index.php?parent=Settings&module=MultiCompany4you&view=Detail&block=<?php echo $_REQUEST['block'];?>
&fieldid=<?php echo $_REQUEST['fieldid'];?>
&companyid=<?php echo $_smarty_tpl->tpl_vars['company']->value['companyid'];?>
"><?php echo $_smarty_tpl->tpl_vars['company']->value['companyname'];?>
</a></td><td class="narrowWidthType"><a href="index.php?parent=Settings&module=MultiCompany4you&view=Detail&block=<?php echo $_REQUEST['block'];?>
&fieldid=<?php echo $_REQUEST['fieldid'];?>
&companyid=<?php echo $_smarty_tpl->tpl_vars['company']->value['companyid'];?>
"><?php echo $_smarty_tpl->tpl_vars['company']->value['email'];?>
</a></td><td class="narrowWidthType"><a href="index.php?parent=Settings&module=MultiCompany4you&view=Detail&block=<?php echo $_REQUEST['block'];?>
&fieldid=<?php echo $_REQUEST['fieldid'];?>
&companyid=<?php echo $_smarty_tpl->tpl_vars['company']->value['companyid'];?>
"><?php echo $_smarty_tpl->tpl_vars['company']->value['phone'];?>
</a></td><td class="narrowWidthType"><?php echo $_smarty_tpl->tpl_vars['company']->value['rolename'];?>
</td><td class="narrowWidthType"><div class="pull-right actions"><a class="editTax cursorPointer" href="index.php?parent=Settings&module=MultiCompany4you&view=Edit&block=<?php echo $_REQUEST['block'];?>
&fieldid=<?php echo $_REQUEST['fieldid'];?>
&companyid=<?php echo $_smarty_tpl->tpl_vars['company']->value['companyid'];?>
"><i title="<?php echo vtranslate('LBL_EDIT');?>
" class="icon-pencil alignMiddle"></i></a>&nbsp;&nbsp;<a class="editTax cursorPointer" onclick="MultiCompany4you_List_Js.getInstance();MultiCompany4you_List_Js.deleteRecord(<?php echo $_smarty_tpl->tpl_vars['company']->value['companyid'];?>
);"><i title="<?php echo vtranslate('LBL_DELETE');?>
" class="icon-trash alignMiddle"></i></a>&nbsp;&nbsp;</div></td></tr><?php } ?></tbody></table></div></div></div><form class="form-horizontal <?php if (empty($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value)){?>hide<?php }?>"  id="updateCompanyDetailsForm" method="post" action="index.php" enctype="multipart/form-data"><input type="hidden" name="module" value="Vtiger" /><input type="hidden" name="parent" value="Settings" /><input type="hidden" name="action" value="CompanyDetailsSave" /><div class="control-group"><div class="control-label"><?php echo vtranslate('LBL_COMPANY_LOGO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><div class="controls"><div class="companyLogo"><img src="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getLogoPath();?>
" class="alignMiddle" /></div><input type="file" name="logo" id="logoFile" />&nbsp;&nbsp;<span class="alert alert-info"><?php echo vtranslate('LBL_LOGO_RECOMMENDED_MESSAGE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span><?php if (!empty($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value)){?><br><br><div class="marginLeftZero span9 alert alert-error"><?php echo vtranslate($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><?php }?></div></div><?php  $_smarty_tpl->tpl_vars['FIELD_TYPE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FIELD_TYPE']->_loop = false;
 $_smarty_tpl->tpl_vars['FIELD'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getFields(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_TYPE']->key => $_smarty_tpl->tpl_vars['FIELD_TYPE']->value){
$_smarty_tpl->tpl_vars['FIELD_TYPE']->_loop = true;
 $_smarty_tpl->tpl_vars['FIELD']->value = $_smarty_tpl->tpl_vars['FIELD_TYPE']->key;
?><?php if ($_smarty_tpl->tpl_vars['FIELD']->value!='logoname'&&$_smarty_tpl->tpl_vars['FIELD']->value!='logo'){?><div class="control-group"><div class="control-label"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php if ($_smarty_tpl->tpl_vars['FIELD']->value=='organizationname'){?><span class="redColor">*</span><?php }?></div><div class="controls"><?php if ($_smarty_tpl->tpl_vars['FIELD']->value=='address'){?><textarea name="<?php echo $_smarty_tpl->tpl_vars['FIELD']->value;?>
" style="width: 30.5%"><?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get($_smarty_tpl->tpl_vars['FIELD']->value);?>
</textarea><?php }else{ ?><input type="text" <?php if ($_smarty_tpl->tpl_vars['FIELD']->value=='organizationname'){?> data-validation-engine="validate[required]" <?php }?> class="input-xlarge" name="<?php echo $_smarty_tpl->tpl_vars['FIELD']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get($_smarty_tpl->tpl_vars['FIELD']->value);?>
"/><?php }?></div></div><?php }?><?php } ?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModalFooter.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form></div>
<?php }} ?>