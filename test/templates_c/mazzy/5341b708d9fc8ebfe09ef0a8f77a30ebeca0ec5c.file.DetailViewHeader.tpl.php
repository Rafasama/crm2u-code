<?php /* Smarty version Smarty-3.1.7, created on 2017-05-12 11:18:19
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/mazzy/modules/Vtiger/DetailViewHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1355402707591599fb6bab63-00106740%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5341b708d9fc8ebfe09ef0a8f77a30ebeca0ec5c' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/mazzy/modules/Vtiger/DetailViewHeader.tpl',
      1 => 1494587708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1355402707591599fb6bab63-00106740',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_MODEL' => 0,
    'RECORD' => 0,
    'NO_PAGINATION' => 0,
    'MODULE' => 0,
    'DETAILVIEW_LINKS' => 0,
    'MODULE_NAME' => 0,
    'DETAIL_VIEW_BASIC_LINK' => 0,
    'DETAIL_VIEW_LINK' => 0,
    'DETAILVIEW_SETTING' => 0,
    'PREVIOUS_RECORD_URL' => 0,
    'NEXT_RECORD_URL' => 0,
    'RELATED_LINK' => 0,
    'SELECTED_TAB_LABEL' => 0,
    'DETAILVIEWRELATEDLINKLBL' => 0,
    'PICKLIST_DEPENDENCY_DATASOURCE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_591599fb9257f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591599fb9257f')) {function content_591599fb9257f($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars["MODULE_NAME"] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'), null, 0);?><input id="recordId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
" /><div class="detailViewContainer"><div class="row-fluid detailViewTitle"><div class="<?php if ($_smarty_tpl->tpl_vars['NO_PAGINATION']->value){?> span12 <?php }else{ ?> span10 <?php }?>"><div class="row"><div class="span4"><div class="row-fluid"><div class="span1"><a class="btn btn-mazzy btn-xs" onclick="window.history.back();"><i class="fa fa-arrow-left"></i></a></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("DetailViewHeaderTitle.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div><div class="span5"><div class="pull-right detailViewButtoncontainer"><div class="btn-toolbar"><?php  $_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEWBASIC']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->key => $_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value){
$_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->_loop = true;
?><span class="btn-group"><button class="btn btn-mazzy" id="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
_detailView_basicAction_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value->getLabel());?>
"<?php if ($_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value->isPageLoadLink()){?>onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value->getUrl();?>
'"<?php }else{ ?>onclick=<?php echo $_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value->getUrl();?>
<?php }?>><?php if (Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value->getLabel())=="LBL_EDIT"){?><i class="fa fa-pencil"></i>&nbsp;<?php }?><?php if (Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value->getLabel())=="LBL_SEND_EMAIL"){?><i class="fa fa-envelope"></i>&nbsp;<?php }?><strong><?php echo vtranslate($_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong></button></span><?php } ?><?php if (count($_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEW'])>0){?><span class="btn-group"><button class="btn dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);"><i class="fa fa-th-list"></i>&nbsp;<strong><?php echo vtranslate('LBL_MORE',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong>&nbsp;&nbsp;<i class="fa fa-caret-down"></i></button><ul class="dropdown-menu pull-left"><?php  $_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEW']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->key => $_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->value){
$_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->value->getLabel()==''){?><li class="divider"></li><?php }else{ ?><li id="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
_detailView_moreAction_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->value->getLabel());?>
"><a href=<?php echo $_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->value->getUrl();?>
 ><?php echo vtranslate($_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a></li><?php }?><?php } ?></ul></span><?php }?><?php if (count($_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEWSETTING'])>0){?><span class="btn-group"><button class="btn dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-cog" alt="<?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
" title="<?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
"></i>&nbsp;&nbsp;<i class="fa fa-caret-down"></i></button><ul class="dropdown-menu pull-left"><?php  $_smarty_tpl->tpl_vars['DETAILVIEW_SETTING'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['DETAILVIEW_SETTING']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEWSETTING']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['DETAILVIEW_SETTING']->key => $_smarty_tpl->tpl_vars['DETAILVIEW_SETTING']->value){
$_smarty_tpl->tpl_vars['DETAILVIEW_SETTING']->_loop = true;
?><li><a href=<?php echo $_smarty_tpl->tpl_vars['DETAILVIEW_SETTING']->value->getUrl();?>
><?php echo vtranslate($_smarty_tpl->tpl_vars['DETAILVIEW_SETTING']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a></li><?php } ?></ul></span><?php }?></div></div></div></div></div><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['NO_PAGINATION']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if (!$_tmp1){?><div class="span2 detailViewPagingButton"><span class="btn-group pull-right"><button class="btn" id="detailViewPreviousRecordButton" <?php if (empty($_smarty_tpl->tpl_vars['PREVIOUS_RECORD_URL']->value)){?> disabled="disabled" <?php }else{ ?> onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['PREVIOUS_RECORD_URL']->value;?>
'" <?php }?>><i class="fa fa-chevron-left"></i></button><button class="btn" id="detailViewNextRecordButton" <?php if (empty($_smarty_tpl->tpl_vars['NEXT_RECORD_URL']->value)){?> disabled="disabled" <?php }else{ ?> onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['NEXT_RECORD_URL']->value;?>
'" <?php }?>><i class="fa fa-chevron-right"></i></button></span></div><?php }?><div class="clearfix"></div><div class="mycrelated" style="    margin: 20px 0px;"><div class="related" style="margin-left: -10px!important; margin-top: 10px; margin-bottom:10px;"><?php $_smarty_tpl->tpl_vars["SELECTED_TAB_LABEL"] = new Smarty_variable($_GET['tab_label'], null, 0);?><?php  $_smarty_tpl->tpl_vars['RELATED_LINK'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RELATED_LINK']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEWTAB']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["detlink"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['RELATED_LINK']->key => $_smarty_tpl->tpl_vars['RELATED_LINK']->value){
$_smarty_tpl->tpl_vars['RELATED_LINK']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["detlink"]['iteration']++;
?><a href="javascript:void(0);" class="label label-mazzy <?php if ($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel()==$_smarty_tpl->tpl_vars['SELECTED_TAB_LABEL']->value||($_smarty_tpl->tpl_vars['SELECTED_TAB_LABEL']->value==''&&$_smarty_tpl->getVariable('smarty')->value['foreach']['detlink']['iteration']==1)){?>active<?php }?>" data-url="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getUrl();?>
&tab_label=<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel();?>
" data-label-key="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel();?>
" data-link-key="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->get('linkKey');?>
" style="width:auto" title="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
<?php $_tmp2=ob_get_clean();?><?php echo vtranslate($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel(),$_tmp2);?>
"><strong><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
<?php $_tmp3=ob_get_clean();?><?php echo vtranslate($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel(),$_tmp3);?>
</strong></a>&nbsp;<?php } ?><hr><?php  $_smarty_tpl->tpl_vars['RELATED_LINK'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RELATED_LINK']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEWRELATED']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['RELATED_LINK']->key => $_smarty_tpl->tpl_vars['RELATED_LINK']->value){
$_smarty_tpl->tpl_vars['RELATED_LINK']->_loop = true;
?><?php $_smarty_tpl->tpl_vars["DETAILVIEWRELATEDLINKLBL"] = new Smarty_variable(vtranslate($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['RELATED_LINK']->value->getRelatedModuleName()), null, 0);?><a href="javascript:void(0);" class="label label-mazzy <?php if ($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel()==$_smarty_tpl->tpl_vars['SELECTED_TAB_LABEL']->value){?>active<?php }?>" data-url="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getUrl();?>
&tab_label=<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel();?>
" data-label-key="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel();?>
" style="width:auto" title="<?php echo $_smarty_tpl->tpl_vars['DETAILVIEWRELATEDLINKLBL']->value;?>
" data-toggle="tooltip" data-placement="top" ><strong><?php if (vimage_path(($_smarty_tpl->tpl_vars['RELATED_LINK']->value->get("relatedModuleName")).('.png'))!=false){?><img  class="alignMiddle" src="<?php echo vimage_path(($_smarty_tpl->tpl_vars['RELATED_LINK']->value->get("relatedModuleName")).('.png'));?>
" alt="<?php echo vtranslate($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel());?>
" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel());?>
"/><?php }else{ ?><img  class="alignMiddle" src="<?php echo vimage_path('DefaultModule.png');?>
" alt="<?php echo vtranslate($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel());?>
" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel());?>
"/><?php }?></strong></a>&nbsp;&nbsp;&nbsp;<?php } ?></div></div><!-- Related mobile --><div class="mycrelatedmobile"><div class="span4" style=" margin-top: 10px; margin-bottom:10px;"><div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" style="width:200px!important;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-paperclip"></i>Related Module <i class="fa fa-caret-down"></i></button><ul class="dropdown-menu related"><?php $_smarty_tpl->tpl_vars["SELECTED_TAB_LABEL"] = new Smarty_variable($_GET['tab_label'], null, 0);?><?php  $_smarty_tpl->tpl_vars['RELATED_LINK'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RELATED_LINK']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEWTAB']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["detlink"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['RELATED_LINK']->key => $_smarty_tpl->tpl_vars['RELATED_LINK']->value){
$_smarty_tpl->tpl_vars['RELATED_LINK']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["detlink"]['iteration']++;
?><li href="javascript:void(0);" class="mycrelatedtab <?php if ($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel()==$_smarty_tpl->tpl_vars['SELECTED_TAB_LABEL']->value||($_smarty_tpl->tpl_vars['SELECTED_TAB_LABEL']->value==''&&$_smarty_tpl->getVariable('smarty')->value['foreach']['detlink']['iteration']==1)){?>active<?php }?>" data-url="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getUrl();?>
&tab_label=<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel();?>
" data-label-key="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel();?>
" data-link-key="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->get('linkKey');?>
" style="width:auto" title="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
<?php $_tmp4=ob_get_clean();?><?php echo vtranslate($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel(),$_tmp4);?>
"><strong><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
<?php $_tmp5=ob_get_clean();?><?php echo vtranslate($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel(),$_tmp5);?>
</strong></li><?php } ?><?php  $_smarty_tpl->tpl_vars['RELATED_LINK'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RELATED_LINK']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEWRELATED']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['RELATED_LINK']->key => $_smarty_tpl->tpl_vars['RELATED_LINK']->value){
$_smarty_tpl->tpl_vars['RELATED_LINK']->_loop = true;
?><?php $_smarty_tpl->tpl_vars["DETAILVIEWRELATEDLINKLBL"] = new Smarty_variable(vtranslate($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['RELATED_LINK']->value->getRelatedModuleName()), null, 0);?><li href="javascript:void(0);" class="mycrelatedtab <?php if ($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel()==$_smarty_tpl->tpl_vars['SELECTED_TAB_LABEL']->value){?>active<?php }?>" data-url="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getUrl();?>
&tab_label=<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel();?>
" data-label-key="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel();?>
" style="width:auto" title="<?php echo $_smarty_tpl->tpl_vars['DETAILVIEWRELATEDLINKLBL']->value;?>
"><strong><?php echo $_smarty_tpl->tpl_vars['DETAILVIEWRELATEDLINKLBL']->value;?>
</strong></li><?php } ?></ul></div></div></div><!-- / Related mobile --></div><div class="detailViewInfo row-fluid"><div class="<?php if ($_smarty_tpl->tpl_vars['NO_PAGINATION']->value){?> span12 <?php }else{ ?> span12 <?php }?> <?php if (!empty($_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEWTAB'])||!empty($_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEWRELATED'])){?> details <?php }?>"><form id="detailView" data-name-fields='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getNameFields());?>
' method="POST"><?php if (!empty($_smarty_tpl->tpl_vars['PICKLIST_DEPENDENCY_DATASOURCE']->value)){?><input type="hidden" name="picklistDependency" value="<?php echo Vtiger_Util_Helper::toSafeHTML($_smarty_tpl->tpl_vars['PICKLIST_DEPENDENCY_DATASOURCE']->value);?>
"><?php }?><div class="relcontents"></div><div class="contents"><script>$(document).ready(function(){$('[data-toggle="tooltip"]').tooltip();});</script>
<?php }} ?>