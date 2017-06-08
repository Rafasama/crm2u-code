<?php /* Smarty version Smarty-3.1.7, created on 2017-05-22 14:58:09
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/ListMEContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5188100835922fc810fd1d4-62728810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cd922896ac5caba376c6e1986de38b8b39955a6' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/ListMEContents.tpl',
      1 => 1495464681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5188100835922fc810fd1d4-62728810',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SORT_ORDER' => 0,
    'PAGING_MODEL' => 0,
    'LISTVIEW_COUNT' => 0,
    'ORDER_BY' => 0,
    'PAGE_NUMBER' => 0,
    'LISTVIEW_ENTIRES_COUNT' => 0,
    'TEMPLATEID' => 0,
    'HEADER_VALUES' => 0,
    'header_type' => 0,
    'name_sortorder' => 0,
    'header_lang' => 0,
    'sortorder_img' => 0,
    'MASSEMAILS' => 0,
    'LISTVIEW_ENTRY' => 0,
    'EDIT' => 0,
    'MODULE' => 0,
    'DELETE' => 0,
    'IS_DELAY_ACTIVE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5922fc8123c8e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5922fc8123c8e')) {function content_5922fc8123c8e($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['SORT_ORDER']->value=='asc'){?>
    <?php $_smarty_tpl->tpl_vars["name_sortorder"] = new Smarty_variable("desc", null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["name_sortorder"] = new Smarty_variable("asc", null, 0);?>
<?php }?>
<input type="hidden" id="pageStartRange" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordStartRange();?>
" />
<input type="hidden" id="pageEndRange" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordEndRange();?>
" />
<input type="hidden" id="previousPageExist" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isPrevPageExists();?>
" />
<input type="hidden" id="nextPageExist" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isNextPageExists();?>
" />
<input type="hidden" id="totalCount" value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_COUNT']->value;?>
" />
<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ORDER_BY']->value;?>
" id="orderBy">
<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['SORT_ORDER']->value;?>
" id="sortOrder">
<input type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['PAGE_NUMBER']->value;?>
" id='pageNumber'>
<input type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getPageLimit();?>
" id='pageLimit'>
<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTIRES_COUNT']->value;?>
" id="noOfEntries">
<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
" id="templateid">
<?php if ($_smarty_tpl->tpl_vars['SORT_ORDER']->value=='asc'){?>
    <?php $_smarty_tpl->tpl_vars["sortorder_img"] = new Smarty_variable('&nbsp;&nbsp;<img class="icon-chevron-down icon-white" />', null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["sortorder_img"] = new Smarty_variable('&nbsp;&nbsp;<img class="icon-chevron-up icon-white" />', null, 0);?>
<?php }?>
<div class="listViewEntriesDiv contents-bottomscroll">
    <div class="bottomscroll-div">
        <table class="table table-bordered listViewEntriesTable">
            <thead>
                <tr class="listViewHeaders">
                    <?php  $_smarty_tpl->tpl_vars['header_lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['header_lang']->_loop = false;
 $_smarty_tpl->tpl_vars['header_type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['HEADER_VALUES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['header_lang']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['header_lang']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['header_lang']->key => $_smarty_tpl->tpl_vars['header_lang']->value){
$_smarty_tpl->tpl_vars['header_lang']->_loop = true;
 $_smarty_tpl->tpl_vars['header_type']->value = $_smarty_tpl->tpl_vars['header_lang']->key;
 $_smarty_tpl->tpl_vars['header_lang']->iteration++;
 $_smarty_tpl->tpl_vars['header_lang']->last = $_smarty_tpl->tpl_vars['header_lang']->iteration === $_smarty_tpl->tpl_vars['header_lang']->total;
?>
                        <?php if ($_smarty_tpl->tpl_vars['header_type']->value=="list_name"||$_smarty_tpl->tpl_vars['header_type']->value=="status"){?>
                            <th class="narrowWidthType listViewHeader" data-sort="no">
                        <?php }else{ ?>
                            <th class="narrowWidthType listViewHeader cursorPointer" data-orderby="<?php echo $_smarty_tpl->tpl_vars['header_type']->value;?>
" data-sortorder="<?php echo $_smarty_tpl->tpl_vars['name_sortorder']->value;?>
" data-sort="yes">    
                        <?php }?>    
                            <?php echo vtranslate($_smarty_tpl->tpl_vars['header_lang']->value,"EMAILMaker");?>

                            <?php if ($_smarty_tpl->tpl_vars['ORDER_BY']->value==$_smarty_tpl->tpl_vars['header_type']->value){?><?php echo $_smarty_tpl->tpl_vars['sortorder_img']->value;?>
<?php }?>
                        </th>
                    <?php } ?>
                    <th width="10%" class="narrowWidthType"></th>
                </tr>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MASSEMAILS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->key => $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->_loop = true;
?>
                <tr class="listViewEntries" data-id="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get("meid");?>
" data-recordmeurl="index.php?module=EMAILMaker&view=DetailME&record=<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get("meid");?>
" id="EMAILMaker_listView_row_<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get("meid");?>
">
                    <?php  $_smarty_tpl->tpl_vars['header_lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['header_lang']->_loop = false;
 $_smarty_tpl->tpl_vars['header_type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['HEADER_VALUES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['header_lang']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['header_lang']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['header_lang']->key => $_smarty_tpl->tpl_vars['header_lang']->value){
$_smarty_tpl->tpl_vars['header_lang']->_loop = true;
 $_smarty_tpl->tpl_vars['header_type']->value = $_smarty_tpl->tpl_vars['header_lang']->key;
 $_smarty_tpl->tpl_vars['header_lang']->iteration++;
 $_smarty_tpl->tpl_vars['header_lang']->last = $_smarty_tpl->tpl_vars['header_lang']->iteration === $_smarty_tpl->tpl_vars['header_lang']->total;
?>
                    <td class="listViewEntryValue medium" <?php if ($_smarty_tpl->tpl_vars['header_type']->value=="me_subject"){?>title="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get("description");?>
"<?php }?>>
                        <?php if ($_smarty_tpl->tpl_vars['header_type']->value=="list_name"){?>
                            <?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getFilterLink();?>
 
                        <?php }else{ ?>    
                            <?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['header_type']->value),'EMAILMaker');?>

                        <?php }?>                        
                        <?php if ($_smarty_tpl->tpl_vars['header_lang']->last){?>
				</td><td nowrap>
				<div class="actions pull-right">
					<span class="actionImages">
						<?php if ($_smarty_tpl->tpl_vars['EDIT']->value=="permitted"){?>
							<a href='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getEditViewUrl();?>
'><i title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="icon-pencil alignMiddle"></i></a>&nbsp;
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['DELETE']->value=="permitted"){?>
							<a class="deleteRecordButton"><i title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="icon-trash alignMiddle"></i></a>
						<?php }?>
					</span>
				</div></td>
				<?php }?>
			</td>
                    <?php } ?>
                </tr>
            <?php }
if (!$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->_loop) {
?>   
            </tbody>
        </table>    
        <table class="emptyRecordsDiv">
         <tbody>
            <tr>
                <td>
                    <?php echo vtranslate("LBL_NO");?>
 <?php echo vtranslate("LBL_EMAIL_CAMPAIGNS_LIST","EMAILMaker");?>
 <?php echo vtranslate("LBL_FOUND","EMAILMaker");?>

                    <?php if ($_smarty_tpl->tpl_vars['EDIT']->value=='permitted'&&$_smarty_tpl->tpl_vars['IS_DELAY_ACTIVE']->value=="1"){?>
                    &nbsp;&nbsp;-<a href="index.php?module=EMAILMaker&view=EditME"><?php echo vtranslate("LBL_NEW_EMAIL_CAMPAIGN","EMAILMaker");?>
</a><br>
                    <?php }?>
                </td>
            </tr>  
            <?php } ?>
            </tbody>
        </table>
     </div> 
</div> 
<?php }} ?>