<?php /* Smarty version Smarty-3.1.7, created on 2017-05-08 00:44:21
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/mazzy/modules/Vtiger/GridViewContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:640057294590fbf6570a3f6-32368759%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71be357e48a5ea5afc0bc5c57e039fe02f3628fd' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/mazzy/modules/Vtiger/GridViewContents.tpl',
      1 => 1494194836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '640057294590fbf6570a3f6-32368759',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'VIEW' => 0,
    'PAGING_MODEL' => 0,
    'MODULE_MODEL' => 0,
    'OPERATOR' => 0,
    'ALPHABET_VALUE' => 0,
    'LISTVIEW_COUNT' => 0,
    'PAGE_NUMBER' => 0,
    'LISTVIEW_ENTRIES_COUNT' => 0,
    'ALPHABETS_LABEL' => 0,
    'ALPHABETS' => 0,
    'ALPHABET' => 0,
    'MODULE' => 0,
    'ORDER_BY' => 0,
    'SORT_ORDER' => 0,
    'CURRENT_USER_MODEL' => 0,
    'LISTVIEW_HEADERS' => 0,
    'COLUMN_NAME' => 0,
    'LISTVIEW_HEADER' => 0,
    'NEXT_SORT_ORDER' => 0,
    'SORT_IMAGE' => 0,
    'FIELD_UI_TYPE_MODEL' => 0,
    'MODULE_NAME' => 0,
    'SEARCH_DETAILS' => 0,
    'LISTVIEW_ENTRIES' => 0,
    'LISTVIEW_ENTRY' => 0,
    'NAME_FIELDS' => 0,
    'NAME_FIELD' => 0,
    'IS_MODULE_EDITABLE' => 0,
    'IS_MODULE_DELETABLE' => 0,
    'RELATION_LINKS' => 0,
    'RELATED_LINK' => 0,
    'SELECTED_TAB_LABEL' => 0,
    'DETAILVIEWRELATEDLINKLBL' => 0,
    'WIDTHTYPE' => 0,
    'LISTVIEW_HEADERNAME' => 0,
    'CURRENCY_SYMBOL_PLACEMENT' => 0,
    'PBXMANAGER_MODULE' => 0,
    'MODULEMODEL' => 0,
    'PERMISSION' => 0,
    'PHONE_FIELD_VALUE' => 0,
    'PHONE_NUMBER' => 0,
    'PROGRESS' => 0,
    'PROGRESSCOLOR' => 0,
    'SINGLE_MODULE' => 0,
    'LISTVIEW_LINKS' => 0,
    'PAGE_COUNT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_590fbf65cc96c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590fbf65cc96c')) {function content_590fbf65cc96c($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/home/rz2ac608/public_html/crm2u.com.br/poc/libraries/Smarty/libs/plugins/modifier.regex_replace.php';
if (!is_callable('smarty_modifier_replace')) include '/home/rz2ac608/public_html/crm2u.com.br/poc/libraries/Smarty/libs/plugins/modifier.replace.php';
?>
<input type="hidden" id="view" value="<?php echo $_smarty_tpl->tpl_vars['VIEW']->value;?>
" /><input type="hidden" id="pageStartRange" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordStartRange();?>
" /><input type="hidden" id="pageEndRange" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordEndRange();?>
" /><input type="hidden" id="previousPageExist" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isPrevPageExists();?>
" /><input type="hidden" id="nextPageExist" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isNextPageExists();?>
" /><input type="hidden" id="alphabetSearchKey" value= "<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getAlphabetSearchField();?>
" /><input type="hidden" id="Operator" value="<?php echo $_smarty_tpl->tpl_vars['OPERATOR']->value;?>
" /><input type="hidden" id="alphabetValue" value="<?php echo $_smarty_tpl->tpl_vars['ALPHABET_VALUE']->value;?>
" /><input type="hidden" id="totalCount" value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_COUNT']->value;?>
" /><input type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['PAGE_NUMBER']->value;?>
" id='pageNumber'><input type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getPageLimit();?>
" id='pageLimit'><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value;?>
" id="noOfEntries"><?php $_smarty_tpl->tpl_vars['ALPHABETS_LABEL'] = new Smarty_variable(vtranslate('LBL_ALPHABETS','Vtiger'), null, 0);?><?php $_smarty_tpl->tpl_vars['ALPHABETS'] = new Smarty_variable(explode(',',$_smarty_tpl->tpl_vars['ALPHABETS_LABEL']->value), null, 0);?><div class="alphabetSorting noprint"><div id="alphabettable"><div class="table-responsive"><table width="100%"><tbody><tr><?php  $_smarty_tpl->tpl_vars['ALPHABET'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ALPHABET']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ALPHABETS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ALPHABET']->key => $_smarty_tpl->tpl_vars['ALPHABET']->value){
$_smarty_tpl->tpl_vars['ALPHABET']->_loop = true;
?><td class="alphabetSearch textAlignCenter cursorPointer <?php if ($_smarty_tpl->tpl_vars['ALPHABET_VALUE']->value==$_smarty_tpl->tpl_vars['ALPHABET']->value){?> highlightBackgroundColor <?php }?>" ><a id="<?php echo $_smarty_tpl->tpl_vars['ALPHABET']->value;?>
" href="#"><?php echo $_smarty_tpl->tpl_vars['ALPHABET']->value;?>
</a></td><?php } ?></tr></tbody></table></div></div><!-- alphabetpicklist --><div id="alphabetpicklist"><span class="btn-group pull-right"><button class="btn dropdown-togglealpha span3" style="text-align: center" data-toggle="dropdown" href="javascript:void(0);"><strong> Alphabet</strong>&nbsp;&nbsp;<i class="fa fa-caret-down"></i></button><ul class="dropdown-menu"><?php  $_smarty_tpl->tpl_vars['ALPHABET'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ALPHABET']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ALPHABETS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ALPHABET']->key => $_smarty_tpl->tpl_vars['ALPHABET']->value){
$_smarty_tpl->tpl_vars['ALPHABET']->_loop = true;
?><li class="alphabetSearch textAlignCenter cursorPointer <?php if ($_smarty_tpl->tpl_vars['ALPHABET_VALUE']->value==$_smarty_tpl->tpl_vars['ALPHABET']->value){?> highlightBackgroundColor <?php }?>" style="padding : 0px !important"><a id="<?php echo $_smarty_tpl->tpl_vars['ALPHABET']->value;?>
" href="#"><?php echo $_smarty_tpl->tpl_vars['ALPHABET']->value;?>
</a></li><?php } ?></ul></span></div><!-- alphabetpicklist end --></div><div class="clearfix"></div><div id="selectAllMsgDiv" class="alert-block msgDiv noprint"><strong><a id="selectAllMsg"><?php echo vtranslate('LBL_SELECT_ALL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;(<span id="totalRecordsCount"></span>)</a></strong></div><div id="deSelectAllMsgDiv" class="alert-block msgDiv noprint"><strong><a id="deSelectAllMsg"><?php echo vtranslate('LBL_DESELECT_ALL_RECORDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></strong></div><!--<div class="contents-topscroll noprint"><div class="topscroll-div">&nbsp;</div></div>--><div class="listViewEntriesDiv"><div class="bottomscroll-divs"><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ORDER_BY']->value;?>
" id="orderBy"><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['SORT_ORDER']->value;?>
" id="sortOrder"><span class="listViewLoadingImageBlock hide modal noprint" id="loadingListViewModal"><img class="listViewLoadingImage" src="<?php echo vimage_path('loading.gif');?>
" alt="no-image" title="<?php echo vtranslate('LBL_LOADING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"/><p class="listViewLoadingMsg"><?php echo vtranslate('LBL_LOADING_LISTVIEW_CONTENTS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
........</p></span><?php $_smarty_tpl->tpl_vars['WIDTHTYPE'] = new Smarty_variable($_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('rowheight'), null, 0);?><hr><style>.grid-element{border: 1px solid lightgray;padding: 10px;}.grid-detail-btn{height: 33%;background-color: green;color: white;}.grid-edit-btn{height: 33%;background-color: yellow;color: white;}.grid-delete-btn{height: 33%;background-color: red;color: white;}.listViewEntryValue{padding: 0px !important;}.gridRow{margin-bottom: 15px;}.gridViewEntries{margin:2px!important;vertical-align:top;width: 32.5%;height:100%;display: inline-block;}@media (min-width: 1440px){.gridViewEntries{width: 24.5%;}}@media (min-width: 1920px){.gridViewEntries{width: 19.5%;}}@media (max-width: 800px){.gridViewEntries{width: 49%;}}@media (max-width: 500px){.gridViewEntries{display:block;width: 100%;}}.listViewEntries{position: absolute;width: 0;height: 0;border-left: 25px solid;border-bottom: 25px solid;border-bottom-color: #fff;border-left-color: transparent;}.listViewEntriesTitle{margin-left:30px;}.gridViewEntriesTable{max-width: 100% !important;}</style><div class="listViewEntriesTable gridViewEntriesTable"><div style="padding-bottom:20px;"><div class="listViewHeaders"><div class="btn-group"  style="float:left"><a class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sort"></i>&nbsp;<strong><?php echo vtranslate('LBL_BY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong>&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a><ul class="dropdown-menu"><?php  $_smarty_tpl->tpl_vars['LISTVIEW_HEADER'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->key => $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = true;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration++;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->last = $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration === $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total;
?><li><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="<?php if ($_smarty_tpl->tpl_vars['COLUMN_NAME']->value==$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('column')){?><?php echo $_smarty_tpl->tpl_vars['NEXT_SORT_ORDER']->value;?>
<?php }else{ ?>ASC<?php }?>" data-columnname="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('column');?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['COLUMN_NAME']->value==$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('column')){?><img class="<?php echo $_smarty_tpl->tpl_vars['SORT_IMAGE']->value;?>
 icon-white"><?php }?></a></li><?php } ?></ul></div><div class="btn-group" style="float:left" ><a class="btn" id="listViewEntriesMainCheckBoxTrigger"><i class="fa fa-square-o"></i>&nbsp;<strong><?php echo vtranslate('LBL_SELECT_ALL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></a><input type="checkbox" style="display:none;" class="form-control" id="listViewEntriesMainCheckBox" /></div><?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isQuickSearchEnabled()){?><div class="btn-group"  style="float:left"  ><div style="float:left"><strong style=""><?php echo vtranslate('LBL_SEARCH_IN',$_smarty_tpl->tpl_vars['MODULE']->value);?>
: </strong><select class="chzn-select" id="mycQuickSearchField" ><?php  $_smarty_tpl->tpl_vars['LISTVIEW_HEADER'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->key => $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = true;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration++;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->last = $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration === $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total;
?><option value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getName();?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('label'));?>
</option><?php } ?></select></div><div style="float:right;"><?php  $_smarty_tpl->tpl_vars['LISTVIEW_HEADER'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration=0;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->key => $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = true;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration++;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->index++;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->first = $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->index === 0;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->last = $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration === $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['mycQSFI']['first'] = $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->first;
?><div style="<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['mycQSFI']['first']){?>display:none;<?php }?>float:left; " class="mycQuickSearch" id="mycQuickSearch_<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getName();?>
"><?php $_smarty_tpl->tpl_vars['FIELD_UI_TYPE_MODEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getUITypeModel(), null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path($_smarty_tpl->tpl_vars['FIELD_UI_TYPE_MODEL']->value->getListSearchTemplateName(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('FIELD_MODEL'=>$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value,'SEARCH_INFO'=>$_smarty_tpl->tpl_vars['SEARCH_DETAILS']->value[$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getName()],'USER_MODEL'=>$_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value), 0);?>
</div><?php } ?><button  style="float:right;" class="btn mycQuickSearchBtn" data-trigger="listSearch"><?php echo vtranslate('LBL_SEARCH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button></div></div><?php }?><br></div></div><div class="row-fluid gridRow"><div class="mycQuickSearchFieldsTags" style="width: 100%;display:none"><h5 style="float:left;" id=""><?php echo vtranslate('LBL_FILTER_CONDITIONS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
: &nbsp;&nbsp;&nbsp;</h5><?php  $_smarty_tpl->tpl_vars['LISTVIEW_HEADER'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->key => $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = true;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration++;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->last = $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration === $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total;
?><span class="mycQsFieldLabel" style="display:none" id="mycQsField_<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getName();?>
">&nbsp;<span class="label label-primary"><?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('label'));?>
: <span class="sFieldVal"></span>&nbsp;&nbsp;&nbsp;|&nbsp;<i class="fa fa-times" onclick="$('#mycQuickSearch_<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getName();?>
 input, #mycQuickSearch_<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getName();?>
 select').val(''); $('.mycQuickSearchBtn').trigger('click')"></i></span></span><?php } ?></div></div><div class="row-fluid gridRow"><?php  $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listview']['iteration']=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listview']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->key => $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listview']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listview']['index']++;
?><div class="gridViewEntries" data-id='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId();?>
' data-recordUrl='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getDetailViewUrl();?>
' id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_row_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listview']['index']+1;?>
"><div class="grid-element"><div class="row-fluid"><div class="pull-right"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId();?>
" class="listViewEntriesCheckBox"/></div><div class=""><?php $_smarty_tpl->tpl_vars['NAME_FIELDS'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getNameFields(), null, 0);?><a href="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getDetailViewUrl();?>
"><div class="listViewEntries" data-id='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId();?>
' style=""></div><h3 class="listViewEntriesTitle"> <?php  $_smarty_tpl->tpl_vars['NAME_FIELD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['NAME_FIELDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['NAME_FIELD']->key => $_smarty_tpl->tpl_vars['NAME_FIELD']->value){
$_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value[$_smarty_tpl->tpl_vars['NAME_FIELD']->value]){?><small><?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value[$_smarty_tpl->tpl_vars['NAME_FIELD']->value]->get('label'));?>
: </small><?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['NAME_FIELD']->value);?>
<?php }?><br><?php } ?></h3></a><div style="text-align:center" class="btn-toolbar"><div class="actions btn-group" id="mycactions"><span class="actionImages"><a class="btn btn-xs btn-black tooltips" data-toggle="tooltip" data-placement="bottom" title="<?php echo vtranslate('LBL_SHOW_FULL_DETAILS');?>
" href="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getFullDetailViewUrl();?>
"><i class="fa fa-list"></i></a><?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isCommentEnabled()){?><a class="btn btn-xs btn-cyan tooltips" data-toggle="tooltip" data-placement="bottom" title="<?php echo vtranslate('ModComments');?>
" href="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getFullDetailViewUrl();?>
&mode=showAllComments&tab_label=ModComments"><i class="fa fa-comments"></i></a><?php }?><?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isTrackingEnabled()){?><a class="btn btn-xs btn-peas tooltips" data-toggle="tooltip" data-placement="bottom" title="<?php echo vtranslate('LBL_UPDATES');?>
" href="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getFullDetailViewUrl();?>
&mode=showRecentActivities&page=1&tab_label=LBL_UPDATES"><i class="fa fa-refresh"></i></a><?php }?><?php if ($_smarty_tpl->tpl_vars['IS_MODULE_EDITABLE']->value){?><a class="btn btn-xs btn-yellow tooltips"  data-toggle="tooltip" data-placement="bottom" title="<?php echo vtranslate('LBL_EDIT');?>
" href='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getEditViewUrl();?>
'><i class="fa fa-pencil"></i></a><?php }?><?php if ($_smarty_tpl->tpl_vars['IS_MODULE_DELETABLE']->value){?><a class="btn btn-xs btn-red tooltips deleteRecordButton"  data-toggle="tooltip" data-placement="bottom" title="<?php echo vtranslate('LBL_DELETE');?>
"><i class="fa fa-trash"></i></a><?php }?></span></div><div class="btn-group" ><button type="button" class="btn btn-mazzy btn-xs dropdown-toggle gridrelated" style="width:100%;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-paperclip"></i></button><ul class="dropdown-menu related gridrelatedul" <?php if (!($_smarty_tpl->getVariable('smarty')->value['foreach']['listview']['iteration'] % 3)){?>style="right:0;left:auto;"<?php }?>><?php $_smarty_tpl->tpl_vars["SELECTED_TAB_LABEL"] = new Smarty_variable($_GET['tab_label'], null, 0);?><?php  $_smarty_tpl->tpl_vars['RELATED_LINK'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RELATED_LINK']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['RELATION_LINKS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['RELATED_LINK']->key => $_smarty_tpl->tpl_vars['RELATED_LINK']->value){
$_smarty_tpl->tpl_vars['RELATED_LINK']->_loop = true;
?><?php $_smarty_tpl->tpl_vars["DETAILVIEWRELATEDLINKLBL"] = new Smarty_variable(vtranslate($_smarty_tpl->tpl_vars['RELATED_LINK']->value['linklabel'],$_smarty_tpl->tpl_vars['RELATED_LINK']->value['relatedModuleName']), null, 0);?><li><a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&relatedModule=<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value['relatedModuleName'];?>
&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId();?>
&mode=showRelatedList&tab_label=<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value['linklabel'];?>
" class="mycrelatedtab <?php if ($_smarty_tpl->tpl_vars['RELATED_LINK']->value['linklabel']==$_smarty_tpl->tpl_vars['SELECTED_TAB_LABEL']->value){?>active<?php }?> label-mazzy" data-url="module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&relatedModule=<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value['relatedModuleName'];?>
&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId();?>
&mode=showRelatedList&tab_label=<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value['linklabel'];?>
" class="mycrelatedtab <?php if ($_smarty_tpl->tpl_vars['RELATED_LINK']->value['linklabel']==$_smarty_tpl->tpl_vars['SELECTED_TAB_LABEL']->value){?>active<?php }?>" data-recordid="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId();?>
" data-label-key="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value['linklabel'];?>
" style="width:auto" title="<?php echo $_smarty_tpl->tpl_vars['DETAILVIEWRELATEDLINKLBL']->value;?>
"><strong><?php if (vimage_path(($_smarty_tpl->tpl_vars['RELATED_LINK']->value['relatedModuleName']).('.png'))!=false){?><img  class="alignMiddle" src="<?php echo vimage_path(($_smarty_tpl->tpl_vars['RELATED_LINK']->value['relatedModuleName']).('.png'));?>
" alt="<?php echo vtranslate($_smarty_tpl->tpl_vars['RELATED_LINK']->value['linklabel'],$_smarty_tpl->tpl_vars['RELATED_LINK']->value['linklabel']);?>
" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['RELATED_LINK']->value['linklabel'],$_smarty_tpl->tpl_vars['RELATED_LINK']->value['linklabel']);?>
"/><?php }else{ ?><img  class="alignMiddle" src="<?php echo vimage_path('DefaultModule.png');?>
" alt="<?php echo vtranslate($_smarty_tpl->tpl_vars['RELATED_LINK']->value['linklabel'],$_smarty_tpl->tpl_vars['RELATED_LINK']->value['linklabel']);?>
" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['RELATED_LINK']->value['linklabel'],$_smarty_tpl->tpl_vars['RELATED_LINK']->value['linklabel']);?>
"/><?php }?>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['DETAILVIEWRELATEDLINKLBL']->value;?>
</strong></a></li><?php } ?></ul></div><div id="mycaction" class="btn-group  actionImages actions tooltips"><a class="btn btn-xs dropdown-toggle tooltips actionsdd" data-toggle="dropdown" onclick=""><i class="fa fa-cogs"></i></a><ul class="dropdown-menu"><li><a href="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getFullDetailViewUrl();?>
"><i class="fa fa-list"></i>&nbsp;<?php echo vtranslate('LBL_SHOW_COMPLETE_DETAILS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php if ($_smarty_tpl->tpl_vars['IS_MODULE_EDITABLE']->value){?><li><a href="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getEditViewUrl();?>
"><i class="fa fa-edit"></i>&nbsp;<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }?><?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isTrackingEnabled()){?><li><a href="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getFullDetailViewUrl();?>
&mode=showRecentActivities&page=1&tab_label=LBL_UPDATES"><i class="fa fa-refresh"></i>&nbsp;<?php echo vtranslate('LBL_UPDATES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }?><?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isCommentEnabled()){?><li><a href="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getFullDetailViewUrl();?>
&mode=showAllComments&tab_label=ModComments"><i class="fa fa-comments"></i>&nbsp;<?php echo vtranslate('ModComments',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }?><?php if ($_smarty_tpl->tpl_vars['IS_MODULE_DELETABLE']->value){?><li><a class="deleteRecordButton"><i class="fa fa-trash"></i>&nbsp;<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }?></ul></div></div><div class="clearfix"></div><hr><?php  $_smarty_tpl->tpl_vars['LISTVIEW_HEADER'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->key => $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = true;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration++;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->last = $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration === $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total;
?><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->isNameField()!=true){?><?php $_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('name'), null, 0);?><div class="listViewEntryValue <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" data-field-type="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getFieldDataType();?>
" nowrap><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->isNameField()!=true){?><b><?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE']->value);?>
: </b>&nbsp;<?php }?><?php if (($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->isNameField()==true||$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('uitype')=='4')&&$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isListViewNameFieldNavigationEnabled()==true){?><a href="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getDetailViewUrl();?>
"><?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value);?>
</a><?php }elseif($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('uitype')=='72'){?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('currency_symbol_placement');?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['CURRENCY_SYMBOL_PLACEMENT'] = new Smarty_variable($_tmp1, null, 0);?><?php if ($_smarty_tpl->tpl_vars['CURRENCY_SYMBOL_PLACEMENT']->value=='1.0$'){?><?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value);?>
<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('currencySymbol');?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('currencySymbol');?>
<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value);?>
<?php }?><?php }elseif($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('uitype')=='11'){?><?php $_smarty_tpl->tpl_vars['PBXMANAGER_MODULE'] = new Smarty_variable('PBXManager', null, 0);?><?php $_smarty_tpl->tpl_vars['MODULEMODEL'] = new Smarty_variable(Vtiger_Module_Model::getInstance($_smarty_tpl->tpl_vars['PBXMANAGER_MODULE']->value), null, 0);?><?php if ($_smarty_tpl->tpl_vars['MODULEMODEL']->value){?><?php $_smarty_tpl->tpl_vars['PERMISSION'] = new Smarty_variable(PBXManager_Server_Model::checkPermissionForOutgoingCall(), null, 0);?><?php if ($_smarty_tpl->tpl_vars['PERMISSION']->value){?><?php $_smarty_tpl->tpl_vars['PHONE_FIELD_VALUE'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value), null, 0);?><?php $_smarty_tpl->tpl_vars['PHONE_NUMBER'] = new Smarty_variable(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['PHONE_FIELD_VALUE']->value,"/[-()\s]/",''), null, 0);?><a class="phoneField" data-value="<?php echo $_smarty_tpl->tpl_vars['PHONE_NUMBER']->value;?>
" record="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId();?>
" onclick="Vtiger_PBXManager_Js.registerPBXOutboundCall('<?php echo $_smarty_tpl->tpl_vars['PHONE_NUMBER']->value;?>
',<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId();?>
)"><?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value);?>
</a><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value);?>
<?php }?><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value);?>
<?php }?><?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getFieldDataType()=='double'){?><?php echo decimalFormat($_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value));?>
<?php }elseif($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('uitype')=='9'){?><?php $_smarty_tpl->tpl_vars['PROGRESS'] = new Smarty_variable(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value),"<span align='right'>",''),'</div>',''), null, 0);?><?php if ($_smarty_tpl->tpl_vars['PROGRESS']->value==''){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['PROGRESS']->value;?>
<?php }?>%<?php if ($_smarty_tpl->tpl_vars['PROGRESS']->value==''){?><?php $_smarty_tpl->tpl_vars['PROGRESS'] = new Smarty_variable(0, null, 0);?><?php }elseif($_smarty_tpl->tpl_vars['PROGRESS']->value>=100){?><?php $_smarty_tpl->tpl_vars['PROGRESS'] = new Smarty_variable(100, null, 0);?><?php $_smarty_tpl->tpl_vars['PROGRESSCOLOR'] = new Smarty_variable("green", null, 0);?><?php }elseif($_smarty_tpl->tpl_vars['PROGRESS']->value>60){?><?php $_smarty_tpl->tpl_vars['PROGRESSCOLOR'] = new Smarty_variable("blue", null, 0);?><?php }elseif($_smarty_tpl->tpl_vars['PROGRESS']->value>30){?><?php $_smarty_tpl->tpl_vars['PROGRESSCOLOR'] = new Smarty_variable("orange", null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['PROGRESSCOLOR'] = new Smarty_variable("red", null, 0);?><?php }?><div class="myc-progressbar myc-progressbar-<?php echo $_smarty_tpl->tpl_vars['PROGRESSCOLOR']->value;?>
"><span style="width: <?php echo $_smarty_tpl->tpl_vars['PROGRESS']->value;?>
%"></span></div><p style="height: 5px">&nbsp;</p><?php }else{ ?><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value),"<span align='right'>",''),'</div>','');?>
<?php }?><?php }?><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->last){?><?php }?></div><?php }?><?php } ?></div></div></div></div><!--	<?php if (!($_smarty_tpl->getVariable('smarty')->value['foreach']['listview']['iteration'] % 3)){?></div><div class="row gridRow"><?php }?>--><?php } ?></div></div><hr><!--added this div for Temporarily --><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value=='0'){?><div class="table-responsive"><table class="emptyRecordsDiv"><tbody><tr><td><?php $_smarty_tpl->tpl_vars['SINGLE_MODULE'] = new Smarty_variable("SINGLE_".($_smarty_tpl->tpl_vars['MODULE']->value), null, 0);?><?php echo vtranslate('LBL_NO');?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate('LBL_FOUND');?>
.<?php if ($_smarty_tpl->tpl_vars['IS_MODULE_EDITABLE']->value){?> <?php echo vtranslate('LBL_CREATE');?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getCreateRecordUrl();?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['SINGLE_MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a><?php }?></td></tr></tbody></table></div><?php }?><div class="row-fluid"><div class="span9">&nbsp;</div><div class="span3" style="text-align:right"><div class="listViewActions pull-right"><?php if ((method_exists($_smarty_tpl->tpl_vars['MODULE_MODEL']->value,'isPagingSupported')&&($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isPagingSupported()==true))||!method_exists($_smarty_tpl->tpl_vars['MODULE_MODEL']->value,'isPagingSupported')){?><div class="pageNumbers alignTop <?php if (count($_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEWSETTING'])>0){?><?php }else{ ?><?php }?>"><span><span class="pageNumbersText" style="padding-right:5px"><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value){?><?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordStartRange();?>
 <?php echo vtranslate('LBL_to',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordEndRange();?>
<?php }else{ ?><span>&nbsp;</span><?php }?></span><span class="fa fa-refresh pull-right totalNumberOfRecords cursorPointer<?php if (!$_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value){?> hide<?php }?>"></span></span></div><div class="btn-group alignTop margin0px"><span class="pull-right"><span class="btn-groups"><?php if ($_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isPrevPageExists()){?><a class="btn listViewPreviousPageButton"  ><span class="fa fa-chevron-left"></span></a><?php }?><?php if ($_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isNextPageExists()&&($_smarty_tpl->tpl_vars['PAGE_COUNT']->value!=1)){?><a class="btn listViewNextPageButton"   ><span class="fa fa-chevron-right"></span></a><?php }?></span></span></div><?php }?></div><div class="clearfix"></div>
		
		
		
		
	</div>
</div>



</div>
</div>







<script>
			$(function(){
				$(".listViewContentDiv").ready(function(){
					$(".actionsdd").dropdown();
					$(".actionsdd").bind("click", function(e){
						
						$(this).dropdown();
						return false;						
					});
				});
			});
</script>

<?php }} ?>