<?php /* Smarty version Smarty-3.1.7, created on 2017-05-22 14:58:00
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/DetailViewHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17798875115922fc78e3a777-79981274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1174d7d88107423271e2c658b1c484fb033a6e68' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/DetailViewHeader.tpl',
      1 => 1495464681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17798875115922fc78e3a777-79981274',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TEMPLATEID' => 0,
    'TEMPLATENAME' => 0,
    'MODULENAME' => 0,
    'EDIT' => 0,
    'MODULE' => 0,
    'IS_EMAIL_CAMPAIGN' => 0,
    'RECORDID' => 0,
    'DELETE' => 0,
    'PARENTTAB' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5922fc78eba62',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5922fc78eba62')) {function content_5922fc78eba62($_smarty_tpl) {?>
<script>function ExportTemplates() {window.location.href = "index.php?module=EMAILMaker&action=ExportEMAILTemplate&templates=<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
";}</script><div class="detailViewContainer"><div class="row-fluid detailViewTitle"><div class="row-fluid"><div class="span7"><div class="row-fluid"><span class="span2"></span><span class="span8 margin0px"><span class="row-fluid"><span class="recordLabel font-x-x-large textOverflowEllipsis pushDown span" title="<?php echo $_smarty_tpl->tpl_vars['TEMPLATENAME']->value;?>
"><span class="templatename"><?php echo $_smarty_tpl->tpl_vars['TEMPLATENAME']->value;?>
</span></span></span><span class="row-fluid"><span class="modulename_label"><?php echo vtranslate('LBL_MODULENAMES','EMAILMaker');?>
:</span>&nbsp;<?php echo $_smarty_tpl->tpl_vars['MODULENAME']->value;?>
</span></span></div></div><div class="span5"><div class="pull-right detailViewButtoncontainer"><div class="btn-toolbar"><?php if ($_smarty_tpl->tpl_vars['EDIT']->value=='permitted'){?><span class="btn-group"><button class="btn" id="EMAILMaker_detailView_basicAction_LBL_EDIT" onclick="window.location.href = 'index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&view=Edit<?php if ($_smarty_tpl->tpl_vars['IS_EMAIL_CAMPAIGN']->value=="yes"){?>ME&record=<?php echo $_smarty_tpl->tpl_vars['RECORDID']->value;?>
<?php }else{ ?>&record=<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
<?php }?>&return_module=EMAILMaker&return_view=Detail';return false;"><strong><?php echo vtranslate('LBL_EDIT');?>
</strong></button></span><?php if ($_smarty_tpl->tpl_vars['IS_EMAIL_CAMPAIGN']->value!="yes"){?><span class="btn-group"><button class="btn" id="EMAILMaker_detailView_basicAction_LBL_DUPLICATE" onclick="window.location.href = 'index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&view=Edit&record=<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
&isDuplicate=true&return_module=EMAILMaker&return_view=Detail'; return false;"><strong><?php echo vtranslate('LBL_DUPLICATE');?>
</strong></button></span><?php }?><?php }?><?php if ($_smarty_tpl->tpl_vars['DELETE']->value=='permitted'){?><span class="btn-group"><button class="btn" id="EMAILMaker_detailView_basicAction_Delete" onclick="Vtiger_Detail_Js.deleteRecord('index.php?module=EMAILMaker&action=IndexAjax&mode=Delete<?php if ($_smarty_tpl->tpl_vars['IS_EMAIL_CAMPAIGN']->value=="yes"){?>ME&record=<?php echo $_smarty_tpl->tpl_vars['RECORDID']->value;?>
<?php }else{ ?>Template&templateid=<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
<?php }?>'); return false;" style="font-weight:bold" ><strong><?php echo vtranslate('LBL_DELETE');?>
</strong></button></span><?php }?></div></div></div></div></div><div class="detailViewInfo row-fluid"><div class="span10 details"><form id="detailView" method="post" action="index.php" name="etemplatedetailview" onsubmit="VtigerJS_DialogBox.block();"><div class="contents"><input type="hidden" name="action" value=""><input type="hidden" name="view" value=""><input type="hidden" name="module" value="EMAILMaker"><input type="hidden" name="retur_module" value="EMAILMaker"><input type="hidden" name="return_action" value="EMAILMaker"><input type="hidden" name="return_view" value="Detail"><input type="hidden" name="templateid" id="templateid" value="<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
"><input type="hidden" name="record" value="<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
"><input type="hidden" name="parenttab" value="<?php echo $_smarty_tpl->tpl_vars['PARENTTAB']->value;?>
"><input type="hidden" name="isDuplicate" value="false"><input type="hidden" name="subjectChanged" value=""><input id="recordId" value="<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
" type="hidden"><?php }} ?>