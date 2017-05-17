<?php /* Smarty version Smarty-3.1.7, created on 2017-04-27 01:00:24
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout2/modules/Calendar/Export.tpl" */ ?>
<?php /*%%SmartyHeaderCode:996093378590142a8c08a56-63988506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e8dcff8b2386e97b0f66b10a461d0410f35b755' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout2/modules/Calendar/Export.tpl',
      1 => 1493073575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '996093378590142a8c08a56-63988506',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'VIEWID' => 0,
    'SELECTED_IDS' => 0,
    'EXCLUDED_IDS' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_590142a8ca145',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590142a8ca145')) {function content_590142a8ca145($_smarty_tpl) {?>
<div id="exportContainer" class='modelContainer'><div class="modal-header"><button data-dismiss="modal" class="close" title="<?php echo vtranslate('LBL_CLOSE');?>
">x</button><h3 id="exportCalendarHeader"><?php echo vtranslate('LBL_EXPORT_RECORDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3></div><form id="exportForm" class="form-horizontal row-fluid" method="post" action="index.php"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="action" value="ExportData" /><input type="hidden" name="viewname" value="<?php echo $_smarty_tpl->tpl_vars['VIEWID']->value;?>
" /><input type="hidden" name="selected_ids" value=<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['SELECTED_IDS']->value);?>
><input type="hidden" name="excluded_ids" value=<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['EXCLUDED_IDS']->value);?>
><input type="hidden" id="page" name="page" value="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value;?>
" /><div name='exportCalendar'><input type="hidden" value="export" name="view"><div class="modal-body tabbable"><div class="tab-content massEditContent"><table class="massEditTable table table-bordered"><tr><td class="fieldLabel alignMiddle"><input type='radio' name='exportCalendar' value = 'iCal' checked /> <?php echo vtranslate('ICAL_FORMAT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td><td class="fieldValue"><input type='text' name='filename' id='filename' size='25' value='vtiger.calendar'/></td></tr></table></div></div></div><div class="modal-footer"><button class="btn btn-success" type="submit" name="saveButton" onclick="app.hideModalWindow();" ><strong><?php echo vtranslate('LBL_EXPORT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></div></form></div>
<?php }} ?>