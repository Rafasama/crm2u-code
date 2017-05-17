<?php /* Smarty version Smarty-3.1.7, created on 2017-05-06 15:20:14
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout2/modules/MultiCompany4you/Numbering.tpl" */ ?>
<?php /*%%SmartyHeaderCode:267114716590de9aed34395-31134720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c5e8ce2b4ca9f3bf0afbb31a765350bb188aff0' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout2/modules/MultiCompany4you/Numbering.tpl',
      1 => 1494014341,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '267114716590de9aed34395-31134720',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'DESCRIPTION' => 0,
    'SUPPORTED_MODULES_COUNT' => 0,
    'DEFAULT_MODULE_MODEL' => 0,
    'SUPPORTED_MODULES' => 0,
    'MODULE_MODEL' => 0,
    'MODULE_NAME' => 0,
    'DEFAULT_MODULE_NAME' => 0,
    'DEFAULT_MODULE_DATA' => 0,
    'JS_LANG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_590de9aeecf7c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590de9aeecf7c')) {function content_590de9aeecf7c($_smarty_tpl) {?>
<input type="hidden" id="supportedImageFormats" value='<?php echo ZEND_JSON::encode(MultiCompany4you_CompanyDetails_Model::$logoSupportedFormats);?>
' /><div class="padding-left1per"><div class="row-fluid widget_header"><div class="span8"><h3><a href="index.php?parent=Settings&module=MultiCompany4you&view=CompanyList&block=<?php echo $_REQUEST['block'];?>
&fieldid=<?php echo $_REQUEST['fieldid'];?>
"><?php echo vtranslate('LBL_MODULE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a><?php if ($_smarty_tpl->tpl_vars['DESCRIPTION']->value){?><span style="font-size:12px;color: black;"> - &nbsp;<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['DESCRIPTION']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo vtranslate($_tmp1,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span><?php }?></h3></div><div class="span4"><button id="NumberingSettings" class="btn pull-right" onclick="window.location.href = 'index.php?parent=Settings&module=MultiCompany4you&view=NumberingModules&block=<?php echo $_REQUEST['block'];?>
&fieldid=<?php echo $_REQUEST['fieldid'];?>
&companyid=<?php echo $_REQUEST['companyid'];?>
';" title="<?php echo vtranslate('LBL_CONFIGURE_MODULES_FOR_CN',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><img class="alignMiddle" src="<?php echo vimage_path('tools.png');?>
" alt="<?php echo vtranslate($_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /></button></div></div><hr><div class="contents tabbable ui-sortable"><ul class="nav nav-tabs layoutTabs massEditTabs"><li class="relatedListTab"><a href="index.php?parent=Settings&module=MultiCompany4you&view=Detail&companyid=<?php echo $_REQUEST['companyid'];?>
&block=<?php echo $_REQUEST['block'];?>
&fieldid=<?php echo $_REQUEST['fieldid'];?>
"><strong><?php echo vtranslate('LBL_COMPANY_DETAILS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li><li class="active"><a href=""><strong><?php echo vtranslate('LBL_NUMBERING',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li></ul><div class="tab-content layoutContent padding20 themeTableColor overflowVisible"></div></div><div  id="CompanyDetailsContainer"><div class="row-fluid"><form id="EditView" method="post"><input type="hidden" id="companyid" name="companyid" value="<?php echo $_REQUEST['companyid'];?>
"><div class="row-fluid"><div class="span12"><table id="customRecordNumbering" class="table table-bordered"><thead><tr><th width="30%"><strong><?php echo vtranslate('LBL_CUSTOMIZE_RECORD_NUMBERING',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th><th width="70%"><span class="pull-right"><button type="button" class="btn" name="updateRecordWithSequenceNumber"><b><?php echo vtranslate('LBL_UPDATE_MISSING_RECORD_SEQUENCE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b></button></span></th></tr></thead><tbody><?php if ($_smarty_tpl->tpl_vars['SUPPORTED_MODULES_COUNT']->value>0){?><?php $_smarty_tpl->tpl_vars['DEFAULT_MODULE_DATA'] = new Smarty_variable($_smarty_tpl->tpl_vars['DEFAULT_MODULE_MODEL']->value->getModuleCustomNumberingData($_REQUEST['companyid']), null, 0);?><?php $_smarty_tpl->tpl_vars['DEFAULT_MODULE_NAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['DEFAULT_MODULE_MODEL']->value->getName(), null, 0);?><tr><td class="fieldLabel"><label class="pull-right marginRight10px"><b><?php echo vtranslate('LBL_SELECT_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b></label></td><td class="fieldValue"><select class="chzn-select" name="sourceModule"><?php  $_smarty_tpl->tpl_vars['MODULE_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SUPPORTED_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_MODEL']->key => $_smarty_tpl->tpl_vars['MODULE_MODEL']->value){
$_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['MODULE_MODEL']->key;
?><?php $_smarty_tpl->tpl_vars['MODULE_NAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'), null, 0);?><option value=<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value==$_smarty_tpl->tpl_vars['DEFAULT_MODULE_NAME']->value){?> selected <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</option><?php } ?></select></td></tr><tr><td class="fieldLabel"><label class="pull-right marginRight10px"><b><?php echo vtranslate('LBL_USE_PREFIX',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b></label></td><td class="fieldValue"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['DEFAULT_MODULE_DATA']->value['prefix'];?>
" data-old-prefix="<?php echo $_smarty_tpl->tpl_vars['DEFAULT_MODULE_DATA']->value['prefix'];?>
" name="prefix" data-validation-engine="validate[funcCall[MultiCompany_AlphaNumeric_Validator_Js.invokeValidation]]"/>&nbsp;<select name="special_values" onchange="if (this.value != 0) this.form.prefix.value += this.value" class="chzn-select"><option value="0"><?php echo vtranslate('LBL_CHOOSE_ONCE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<option value="$year$"><?php echo vtranslate('LBL_YEAR',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<option value="$month$"><?php echo vtranslate('LBL_MONTH',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<option value="$week$"><?php echo vtranslate('LBL_WEEK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<option value="$day$"><?php echo vtranslate('LBL_DAY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</select></td></tr><tr><td class="fieldLabel"><label class="pull-right marginRight10px"><b><?php echo vtranslate('LBL_START_SEQUENCE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b><span class="redColor">*</span></label></td><td class="fieldValue"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['DEFAULT_MODULE_DATA']->value['cur_id'];?>
"data-old-sequence-number="<?php echo $_smarty_tpl->tpl_vars['DEFAULT_MODULE_DATA']->value['sequenceNumber'];?>
" name="sequenceNumber"data-validation-engine="validate[required,funcCall[Vtiger_WholeNumber_Validator_Js.invokeValidation]]"/></td></tr><?php }else{ ?><tr><td><?php echo vtranslate('no_supported_module_info',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td></tr><?php }?></tbody></table></div></div><br><div class="row-fluid"><div class="span12"><span class="pull-right"><button class="btn btn-success saveButton" type="submit" disabled="disabled"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button><a class="cancelLink" type="reset" onclick="javascript:window.history.back();"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></span></div></div></form></div></div>
    <script type="text/javascript">
        jQuery('#js_strings').html('<?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['JS_LANG']->value);?>
');
    </script><?php }} ?>