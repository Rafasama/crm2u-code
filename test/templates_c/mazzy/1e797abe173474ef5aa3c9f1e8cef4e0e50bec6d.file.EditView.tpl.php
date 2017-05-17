<?php /* Smarty version Smarty-3.1.7, created on 2017-05-08 13:21:12
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/mazzy/modules/Users/EditView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:869937390591070c8688067-73524718%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e797abe173474ef5aa3c9f1e8cef4e0e50bec6d' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/mazzy/modules/Users/EditView.tpl',
      1 => 1494194836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '869937390591070c8688067-73524718',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'RECORD_ID' => 0,
    'IS_PREFERENCE' => 0,
    'DAY_STARTS' => 0,
    'IS_RELATION_OPERATION' => 0,
    'SOURCE_MODULE' => 0,
    'SOURCE_RECORD' => 0,
    'USER_MODEL' => 0,
    'SINGLE_MODULE_NAME' => 0,
    'RECORD_STRUCTURE_MODEL' => 0,
    'RECORD_STRUCTURE' => 0,
    'BLOCK_FIELDS' => 0,
    'BLOCK_LABEL' => 0,
    'FIELD_MODEL' => 0,
    'refrenceList' => 0,
    'COUNTER' => 0,
    'isReferenceField' => 0,
    'refrenceListCount' => 0,
    'value' => 0,
    'WIDTHTYPE' => 0,
    'TAG_CLOUD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_591070c889ddc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591070c889ddc')) {function content_591070c889ddc($_smarty_tpl) {?>
<div class="container-fluid editViewContainer"><form class="form-horizontal recordEditView detailViewInfo equalSplit" id="EditView" name="EditView" method="post" enctype="multipart/form-data" action="index.php"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="action" value="Save" /><input type="hidden" name="record" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
" /><input type="hidden" name="isPreference" value="<?php echo $_smarty_tpl->tpl_vars['IS_PREFERENCE']->value;?>
" /><input type=hidden name="timeFormatOptions" data-value='<?php echo $_smarty_tpl->tpl_vars['DAY_STARTS']->value;?>
' /><?php if ($_smarty_tpl->tpl_vars['IS_RELATION_OPERATION']->value){?><input type="hidden" name="sourceModule" value="<?php echo $_smarty_tpl->tpl_vars['SOURCE_MODULE']->value;?>
" /><input type="hidden" name="sourceRecord" value="<?php echo $_smarty_tpl->tpl_vars['SOURCE_RECORD']->value;?>
" /><input type="hidden" name="relationOperation" value="<?php echo $_smarty_tpl->tpl_vars['IS_RELATION_OPERATION']->value;?>
" /><?php }?><?php $_smarty_tpl->tpl_vars['WIDTHTYPE'] = new Smarty_variable($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('rowheight'), null, 0);?><div class="contentHeader row-fluid"><?php $_smarty_tpl->tpl_vars['SINGLE_MODULE_NAME'] = new Smarty_variable(('Single_').($_smarty_tpl->tpl_vars['MODULE']->value), null, 0);?><?php if ($_smarty_tpl->tpl_vars['RECORD_ID']->value!=''){?><h3 class="span8 textOverflowEllipsis marginLeftZero" title='<?php echo vtranslate('LBL_EDITING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['SINGLE_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 "<?php echo $_smarty_tpl->tpl_vars['RECORD_STRUCTURE_MODEL']->value->getRecordName();?>
"'><?php echo vtranslate('LBL_EDITING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['SINGLE_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 "<?php echo $_smarty_tpl->tpl_vars['RECORD_STRUCTURE_MODEL']->value->getRecordName();?>
"</h3><?php }else{ ?><h3 class="span8 textOverflowEllipsis marginLeftZero" title="<?php echo vtranslate('LBL_CREATING_NEW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['SINGLE_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><?php echo vtranslate('LBL_CREATING_NEW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['SINGLE_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3><?php }?><span class="pull-right"><button class="btn btn-success" type="submit"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button><a class="cancelLink btn btn-danger" type="reset" onclick="javascript:window.history.back();"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></span></div><div><?php  $_smarty_tpl->tpl_vars['BLOCK_FIELDS'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->_loop = false;
 $_smarty_tpl->tpl_vars['BLOCK_LABEL'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->key => $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value){
$_smarty_tpl->tpl_vars['BLOCK_FIELDS']->_loop = true;
 $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value = $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->key;
?><div class="contents"><?php if (count($_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value)>0){?><div class="row-fluid"><div class="span12 mycdivtitle"><?php echo vtranslate($_smarty_tpl->tpl_vars['BLOCK_LABEL']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</div></div><div class="row-fluid mycfluid"><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable(0, null, 0);?><?php  $_smarty_tpl->tpl_vars['FIELD_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FIELD_MODEL']->_loop = false;
 $_smarty_tpl->tpl_vars['FIELD_NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_MODEL']->key => $_smarty_tpl->tpl_vars['FIELD_MODEL']->value){
$_smarty_tpl->tpl_vars['FIELD_MODEL']->_loop = true;
 $_smarty_tpl->tpl_vars['FIELD_NAME']->value = $_smarty_tpl->tpl_vars['FIELD_MODEL']->key;
?><?php $_smarty_tpl->tpl_vars["isReferenceField"] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType(), null, 0);?><?php $_smarty_tpl->tpl_vars["refrenceList"] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getReferenceList(), null, 0);?><?php $_smarty_tpl->tpl_vars["refrenceListCount"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['refrenceList']->value), null, 0);?><?php if ($_smarty_tpl->tpl_vars['COUNTER']->value==2){?></div><div class="row-fluid mycfluid"><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable(1, null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable($_smarty_tpl->tpl_vars['COUNTER']->value+1, null, 0);?><?php }?><div class="span2 mycdivlabel"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['isReferenceField']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1=="reference"){?><?php if ($_smarty_tpl->tpl_vars['refrenceListCount']->value>1){?><select style="width: 150px;" class="chzn-select" id="referenceModulesList"><optgroup><?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['refrenceList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['value']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</option><?php } ?></optgroup></select><?php }?><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }else{ ?><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isMandatory()==true){?> <span class="redColor">*</span> <?php }?></div><div class="span<?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype')=='19'){?>10<?php }else{ ?>4<?php }?> mycdivfield" <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype')=='19'){?> colspan="3" <?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable($_smarty_tpl->tpl_vars['COUNTER']->value+1, null, 0);?> <?php }?>><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getUITypeModel()->getTemplateName(),$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php } ?></div><?php }?></div><br><?php } ?><div class="contents"><div class="row-fluid"><div class="span12 mycdivtitle"><?php echo vtranslate('LBL_TAG_CLOUD_DISPLAY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</div></div><div class="row-fluid mycfluid"><div class="span2 mycdivlabel"><?php echo vtranslate('LBL_TAG_CLOUD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</div><div class="span8 <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><label><input type="checkbox" name="tagcloudview" <?php if ($_smarty_tpl->tpl_vars['TAG_CLOUD']->value){?> checked <?php }?> /></label></div></div></div><br><div class='pull-right'><button class="btn btn-success" type="submit"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button><a class="cancelLink btn btn-danger" type="reset" onclick="javascript:window.history.back();"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></div><br><br><br><br><br></div></form></div><?php }} ?>