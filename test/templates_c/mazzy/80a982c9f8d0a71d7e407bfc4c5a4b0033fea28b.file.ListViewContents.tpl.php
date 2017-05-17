<?php /* Smarty version Smarty-3.1.7, created on 2017-05-08 00:46:50
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/mazzy/modules/Users/ListViewContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1250799154590fbffad88a62-14025271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80a982c9f8d0a71d7e407bfc4c5a4b0033fea28b' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/mazzy/modules/Users/ListViewContents.tpl',
      1 => 1494194836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1250799154590fbffad88a62-14025271',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LISTVIEW_ENTRIES_COUNT' => 0,
    'PAGING_MODEL' => 0,
    'PAGE_NUMBER' => 0,
    'MODULE_MODEL' => 0,
    'OPERATOR' => 0,
    'ALPHABET_VALUE' => 0,
    'LISTVIEW_COUNT' => 0,
    'ALPHABETS_LABEL' => 0,
    'ALPHABETS' => 0,
    'ALPHABET' => 0,
    'MODULE' => 0,
    'ORDER_BY' => 0,
    'SORT_ORDER' => 0,
    'USER_MODEL' => 0,
    'LISTVIEW_HEADERS' => 0,
    'LISTVIEW_HEADER' => 0,
    'COLUMN_NAME' => 0,
    'NEXT_SORT_ORDER' => 0,
    'SORT_IMAGE' => 0,
    'LISTVIEW_ENTRIES' => 0,
    'LISTVIEW_ENTRY' => 0,
    'WIDTHTYPE' => 0,
    'IMAGE_DETAILS' => 0,
    'IMAGE_INFO' => 0,
    'LISTVIEW_HEADERNAME' => 0,
    'IS_MODULE_EDITABLE' => 0,
    'IS_MODULE_DELETABLE' => 0,
    'SINGLE_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_590fbffb07c04',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590fbffb07c04')) {function content_590fbffb07c04($_smarty_tpl) {?>
<input type="hidden" id="listViewEntriesCount" value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value;?>
" /><input type="hidden" id="pageStartRange" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordStartRange();?>
" /><input type="hidden" id="pageEndRange" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordEndRange();?>
" /><input type="hidden" id="previousPageExist" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isPrevPageExists();?>
" /><input type="hidden" id="nextPageExist" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isNextPageExists();?>
" /><input type="hidden" id="pageNumberValue" value= "<?php echo $_smarty_tpl->tpl_vars['PAGE_NUMBER']->value;?>
"/><input type="hidden" id="pageLimitValue" value= "<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getPageLimit();?>
" /><input type="hidden" id="numberOfEntries" value= "<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value;?>
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
</a></strong></div><div class="contents-topscroll noprint"><div class="topscroll-div">&nbsp;</div></div><div class="listViewEntriesDiv contents-bottomscroll"><div class="bottomscroll-div"><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ORDER_BY']->value;?>
" id="orderBy"><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['SORT_ORDER']->value;?>
" id="sortOrder"><span class="listViewLoadingImageBlock hide modal" id="loadingListViewModal"><img class="listViewLoadingImage" src="<?php echo vimage_path('loading.gif');?>
" alt="no-image" title="<?php echo vtranslate('LBL_LOADING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"/><p class="listViewLoadingMsg"><?php echo vtranslate('LBL_LOADING_LISTVIEW_CONTENTS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
........</p></span><?php $_smarty_tpl->tpl_vars['WIDTHTYPE'] = new Smarty_variable($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('rowheight'), null, 0);?><div class="table-responsive"><table class="table table-bordered listViewEntriesTable"><thead><tr class="listViewHeaders"><?php  $_smarty_tpl->tpl_vars['LISTVIEW_HEADER'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->key => $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = true;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration++;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->last = $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration === $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total;
?><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getName()=='first_name'){?><th nowrap><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="<?php if ($_smarty_tpl->tpl_vars['COLUMN_NAME']->value==$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('column')){?><?php echo $_smarty_tpl->tpl_vars['NEXT_SORT_ORDER']->value;?>
<?php }else{ ?>ASC<?php }?>" data-columnname="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('column');?>
"><?php echo vtranslate('LBL_USER_LIST_DETAILS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['COLUMN_NAME']->value==$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('column')){?><img class="<?php echo $_smarty_tpl->tpl_vars['SORT_IMAGE']->value;?>
 icon-white"><?php }?></a></th><?php }elseif($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getName()!='last_name'&&$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getName()!='email1'){?><th nowrap><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="<?php if ($_smarty_tpl->tpl_vars['COLUMN_NAME']->value==$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('column')){?><?php echo $_smarty_tpl->tpl_vars['NEXT_SORT_ORDER']->value;?>
<?php }else{ ?>ASC<?php }?>" data-columnname="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('column');?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['COLUMN_NAME']->value==$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('column')){?><img class="<?php echo $_smarty_tpl->tpl_vars['SORT_IMAGE']->value;?>
 icon-white"><?php }?></a></th><?php }?><?php } ?></tr></thead><?php  $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listview']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->key => $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listview']['index']++;
?><tr class="listViewEntries" data-id='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId();?>
' data-recordUrl='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getDetailViewUrl();?>
' id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_row_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listview']['index']+1;?>
"><?php  $_smarty_tpl->tpl_vars['LISTVIEW_HEADER'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->key => $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = true;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration++;
 $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->last = $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->iteration === $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->total;
?><?php $_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('name'), null, 0);?><input type="hidden" name="deleteActionUrl" value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getDeleteUrl();?>
"><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getName()=='first_name'){?><td class="listViewEntryValue <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><div class='row-fluid'><div class='span6'><?php $_smarty_tpl->tpl_vars['IMAGE_DETAILS'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getImageDetails(), null, 0);?><?php  $_smarty_tpl->tpl_vars['IMAGE_INFO'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['IMAGE_INFO']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['IMAGE_INFO']->key => $_smarty_tpl->tpl_vars['IMAGE_INFO']->value){
$_smarty_tpl->tpl_vars['IMAGE_INFO']->_loop = true;
?><div class='span2'><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
<?php $_tmp1=ob_get_clean();?><?php if (!empty($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['path'])&&!empty($_tmp1)){?><img class="mazzy-profile" src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['path'];?>
_<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
"><?php }?></div><?php } ?><?php if ($_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value[0]['id']==null){?><div class='span2'><img class="mazzy-profile" src="layouts/mazzy/skins/images/DefaultUserIcon.png"></div><?php }?></div><div class='span6'><div><strong><a href="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getDetailViewUrl();?>
"><?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value);?>
 <?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('last_name');?>
</a></strong></div><div><?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('email1');?>
</div></div></div></td><?php }elseif($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getName()!='last_name'&&$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getName()!='email1'){?><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" nowrap><?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value);?>
<?php if (!$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->last){?></td><?php }?><?php }?><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->last){?><div class="pull-right actions"><span class="actionImages"><?php if ($_smarty_tpl->tpl_vars['IS_MODULE_EDITABLE']->value&&$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('status')=='Active'){?><a class="btn btn-xs btn-yellow"  id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_LISTVIEW_ROW_<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId();?>
_EDIT" href='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getEditViewUrl();?>
'><i title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="fa fa-pencil alignMiddle"></i></a>&nbsp;<?php }?><?php if ($_smarty_tpl->tpl_vars['IS_MODULE_DELETABLE']->value&&$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId()!=$_smarty_tpl->tpl_vars['USER_MODEL']->value->getId()){?><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('status')=='Active'){?><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_LISTVIEW_ROW_<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId();?>
_DELETE" class="btn btn-xs btn-red deleteRecordButton"><i title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="fa fa-trash alignMiddle"></i></a><?php }else{ ?><a class="btn btn-xs btn-peas" onclick="Settings_Users_List_Js.restoreUser(<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId();?>
, event);"><i title="<?php echo vtranslate('LBL_RESTORE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="fa fa-refresh alignMiddle"></i></a>&nbsp;<a class="btn btn-xs btn-red" onclick="Settings_Users_List_Js.deleteUserPermanently(<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId();?>
, event);"><i title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="fa fa-trash alignMiddle"></i></a><?php }?><?php }?></span></div><?php }?><?php } ?></tr><?php } ?></table></div><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value=='0'){?><div class="table-responsive"><table class="emptyRecordsDiv"><tbody><tr><td><?php $_smarty_tpl->tpl_vars['SINGLE_MODULE'] = new Smarty_variable("SINGLE_".($_smarty_tpl->tpl_vars['MODULE']->value), null, 0);?><?php echo vtranslate('LBL_NO');?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate('LBL_FOUND');?>
.<!--<?php if ($_smarty_tpl->tpl_vars['IS_MODULE_EDITABLE']->value){?> <?php echo vtranslate('LBL_CREATE');?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getCreateRecordUrl();?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['SINGLE_MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>--><?php }?></td></tr></tbody></table></div><?php }?></div></div><?php }} ?>