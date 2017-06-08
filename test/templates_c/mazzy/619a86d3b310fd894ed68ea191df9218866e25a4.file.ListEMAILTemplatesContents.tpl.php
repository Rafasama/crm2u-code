<?php /* Smarty version Smarty-3.1.7, created on 2017-05-22 14:52:24
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/ListEMAILTemplatesContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19764616705922fb28838cb3-56392481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '619a86d3b310fd894ed68ea191df9218866e25a4' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/ListEMAILTemplatesContents.tpl',
      1 => 1495464681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19764616705922fb28838cb3-56392481',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'DIR' => 0,
    'ORDERBY' => 0,
    'name_dir' => 0,
    'dir_img' => 0,
    'module_dir' => 0,
    'category_dir' => 0,
    'description_dir' => 0,
    'sharingtype_dir' => 0,
    'VERSION_TYPE' => 0,
    'SEARCHTEMPLATENAMEVAL' => 0,
    'SEARCHSELECTBOXDATA' => 0,
    'SEARCHMODULEVAL' => 0,
    'SEARCHCATEGORYVAL' => 0,
    'SEARCHDESCRIPTIONVAL' => 0,
    'SHARINGTYPES' => 0,
    'SEARCHSHARINGTYPEVAL' => 0,
    'SEARCHOWNERVAL' => 0,
    'WFOPTIONS' => 0,
    'SEARCHWORKFLOWVAL' => 0,
    'STATUSOPTIONS' => 0,
    'SEARCHSTATUSVAL' => 0,
    'EMAILTEMPLATES' => 0,
    'template' => 0,
    'WTEMPLATESIDS' => 0,
    'VERSION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5922fb28c0fe9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5922fb28c0fe9')) {function content_5922fb28c0fe9($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/rz2ac608/public_html/crm2u.com.br/matriz/libraries/Smarty/libs/plugins/function.html_options.php';
?>
<?php if ($_smarty_tpl->tpl_vars['DIR']->value=='asc'){?>
    <?php $_smarty_tpl->tpl_vars["dir_img"] = new Smarty_variable('<img src="layouts/vlayout/skins/images/upArrowSmall.png" border="0" />', null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["dir_img"] = new Smarty_variable('<img src="layouts/vlayout/skins/images/downArrowSmall.png" border="0" />', null, 0);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars["name_dir"] = new Smarty_variable("asc", null, 0);?>
<?php $_smarty_tpl->tpl_vars["module_dir"] = new Smarty_variable("asc", null, 0);?>
<?php $_smarty_tpl->tpl_vars["description_dir"] = new Smarty_variable("asc", null, 0);?>
<?php $_smarty_tpl->tpl_vars["order_dir"] = new Smarty_variable("asc", null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['ORDERBY']->value=='templatename'&&$_smarty_tpl->tpl_vars['DIR']->value=='asc'){?>
    <?php $_smarty_tpl->tpl_vars["name_dir"] = new Smarty_variable("desc", null, 0);?>
<?php }elseif($_smarty_tpl->tpl_vars['ORDERBY']->value=='module'&&$_smarty_tpl->tpl_vars['DIR']->value=='asc'){?>
    <?php $_smarty_tpl->tpl_vars["module_dir"] = new Smarty_variable("desc", null, 0);?>
<?php }elseif($_smarty_tpl->tpl_vars['ORDERBY']->value=='description'&&$_smarty_tpl->tpl_vars['DIR']->value=='asc'){?>
    <?php $_smarty_tpl->tpl_vars["description_dir"] = new Smarty_variable("desc", null, 0);?>
<?php }elseif($_smarty_tpl->tpl_vars['ORDERBY']->value=='order'&&$_smarty_tpl->tpl_vars['DIR']->value=='asc'){?>
    <?php $_smarty_tpl->tpl_vars["order_dir"] = new Smarty_variable("desc", null, 0);?>
<?php }elseif($_smarty_tpl->tpl_vars['ORDERBY']->value=='sharingtype'&&$_smarty_tpl->tpl_vars['DIR']->value=='asc'){?>
    <?php $_smarty_tpl->tpl_vars["sharingtype_dir"] = new Smarty_variable("desc", null, 0);?>  
<?php }elseif($_smarty_tpl->tpl_vars['ORDERBY']->value=='category'&&$_smarty_tpl->tpl_vars['DIR']->value=='asc'){?>
    <?php $_smarty_tpl->tpl_vars["category_dir"] = new Smarty_variable("desc", null, 0);?>  
<?php }?>

<div class="listViewEntriesDiv">
        <table border=0 cellspacing=0 cellpadding=5 width=100% class="table table-bordered listViewEntriesTable">
            <thead>
                <tr class="listViewHeaders">
                    <th width="2%" class="narrowWidthType">#</th>
                    <th width="3%" class="narrowWidthType"><?php echo vtranslate("LBL_LIST_SELECT","EMAILMaker");?>
</th>
                    <th width="20%" class="narrowWidthType"><a href="index.php?module=EMAILMaker&view=List&orderby=name&dir=<?php echo $_smarty_tpl->tpl_vars['name_dir']->value;?>
"><?php echo vtranslate("LBL_EMAIL_NAME","EMAILMaker");?>
<?php if ($_smarty_tpl->tpl_vars['ORDERBY']->value=='templatename'){?><?php echo $_smarty_tpl->tpl_vars['dir_img']->value;?>
<?php }?></a></th>
                    
                    <th width="10%" class="narrowWidthType"><a href="index.php?module=EMAILMaker&view=List&orderby=module&dir=<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
"><?php echo vtranslate("LBL_MODULENAMES","EMAILMaker");?>
<?php if ($_smarty_tpl->tpl_vars['ORDERBY']->value=='module'){?><?php echo $_smarty_tpl->tpl_vars['dir_img']->value;?>
<?php }?></a></th>
                    <th width="10%" class="narrowWidthType"><a href="index.php?module=EMAILMaker&view=List&orderby=category&dir=<?php echo $_smarty_tpl->tpl_vars['category_dir']->value;?>
"><?php echo vtranslate("Category","EMAILMaker");?>
<?php if ($_smarty_tpl->tpl_vars['ORDERBY']->value=='category'){?><?php echo $_smarty_tpl->tpl_vars['dir_img']->value;?>
<?php }?></a></th>
                    <th width="20%" class="narrowWidthType"><a href="index.php?module=EMAILMaker&view=List&orderby=description&dir=<?php echo $_smarty_tpl->tpl_vars['description_dir']->value;?>
"><?php echo vtranslate("LBL_DESCRIPTION","EMAILMaker");?>
<?php if ($_smarty_tpl->tpl_vars['ORDERBY']->value=='description'){?><?php echo $_smarty_tpl->tpl_vars['dir_img']->value;?>
<?php }?></a></th>
                    
                    <th width="5%" class="narrowWidthType"><a href="index.php?module=EMAILMaker&view=List&orderby=sharingtype&dir=<?php echo $_smarty_tpl->tpl_vars['sharingtype_dir']->value;?>
"><?php echo vtranslate("LBL_SHARING_TAB","EMAILMaker");?>
<?php if ($_smarty_tpl->tpl_vars['ORDERBY']->value=='sharingtype'){?><?php echo $_smarty_tpl->tpl_vars['dir_img']->value;?>
<?php }?></a></th>
                    <th width="5%" class="narrowWidthType" nowrap><?php echo vtranslate("LBL_TEMPLATE_OWNER","EMAILMaker");?>
</th>
                    <th width="5%" class="narrowWidthType"><?php echo vtranslate("LBL_WORKFLOW","EMAILMaker");?>
</th>
                    <?php if ($_smarty_tpl->tpl_vars['VERSION_TYPE']->value!='deactivate'){?><th width="5%" class="narrowWidthType"><?php echo vtranslate("Status");?>
</th>
                    <th width="11%" class="narrowWidthType"><?php echo vtranslate("LBL_ACTION","EMAILMaker");?>
</th><?php }?>
                </tr>
            </thead>
            <tr>
                <td></td>
                <td></td>
                <td><input type="text" class="listSearchContributor" name="search_templatename" value="<?php echo $_smarty_tpl->tpl_vars['SEARCHTEMPLATENAMEVAL']->value;?>
"></td>
                <td>
                    <select class="chzn-select span2 listSearchContributor" name="search_module">
                        <option value=""></option>
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SEARCHSELECTBOXDATA']->value['modules'],'selected'=>$_smarty_tpl->tpl_vars['SEARCHMODULEVAL']->value),$_smarty_tpl);?>

                    </select>
                </td>
                <td><input type="text" class="listSearchContributor span2" name="search_category" value="<?php echo $_smarty_tpl->tpl_vars['SEARCHCATEGORYVAL']->value;?>
"></td>
                <td><input type="text" class="listSearchContributor" name="search_description" value="<?php echo $_smarty_tpl->tpl_vars['SEARCHDESCRIPTIONVAL']->value;?>
"></td>
                <td>
                    <select class="chzn-select span1 listSearchContributor" name="search_sharingtype">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SHARINGTYPES']->value,'selected'=>$_smarty_tpl->tpl_vars['SEARCHSHARINGTYPEVAL']->value),$_smarty_tpl);?>

                    </select>
                </td>
                <td>
                    <select class="chzn-select listSearchContributor" name="search_owner">
                        <option value=""></option>
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SEARCHSELECTBOXDATA']->value['owners'],'selected'=>$_smarty_tpl->tpl_vars['SEARCHOWNERVAL']->value),$_smarty_tpl);?>

                    </select>
                </td>
                <td>
                    <select class="chzn-select span1 listSearchContributor" name="search_workflow">
                        <option value=""></option>
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['WFOPTIONS']->value,'selected'=>$_smarty_tpl->tpl_vars['SEARCHWORKFLOWVAL']->value),$_smarty_tpl);?>

                    </select>
                </td>
                <td>
                    <select class="chzn-select span1 listSearchContributor" name="search_status">
                        <option value=""></option>
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['STATUSOPTIONS']->value,'selected'=>$_smarty_tpl->tpl_vars['SEARCHSTATUSVAL']->value),$_smarty_tpl);?>

                    </select>
                </td>
                <td>
                    <button class="btn" data-trigger="listSearch"><?php echo vtranslate('LBL_SEARCH',"EMAILMaker");?>
</button>
                </td>
            </tr>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['template'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['template']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['EMAILTEMPLATES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['mailmerge']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['template']->key => $_smarty_tpl->tpl_vars['template']->value){
$_smarty_tpl->tpl_vars['template']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['mailmerge']['iteration']++;
?>
                <tr class="listViewEntries" <?php if ($_smarty_tpl->tpl_vars['template']->value['status']==0){?> style="font-style:italic;" <?php }?> data-id="<?php echo $_smarty_tpl->tpl_vars['template']->value['templateid'];?>
" data-recordurl="index.php?module=EMAILMaker&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['template']->value['templateid'];?>
" id="EMAILMaker_listView_row_<?php echo $_smarty_tpl->tpl_vars['template']->value['templateid'];?>
">
                    <td class="narrowWidthType" valign=top><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['mailmerge']['iteration'];?>
</td>
                    <td class="narrowWidthType" valign=top><input type="checkbox" class=small name="selected_id" value="<?php echo $_smarty_tpl->tpl_vars['template']->value['templateid'];?>
"></td>
                    <td class="narrowWidthType" valign=top><?php echo $_smarty_tpl->tpl_vars['template']->value['templatename'];?>
</td>
                    
                    
                    <td class="narrowWidthType" valign=top <?php if ($_smarty_tpl->tpl_vars['template']->value['status']==0){?> style="color:#888;" <?php }?>><?php echo $_smarty_tpl->tpl_vars['template']->value['module'];?>
</a></td>
                    <td class="narrowWidthType" valign=top <?php if ($_smarty_tpl->tpl_vars['template']->value['status']==0){?> style="color:#888;" <?php }?>><?php echo $_smarty_tpl->tpl_vars['template']->value['category'];?>
</a></td>
                    <td class="narrowWidthType" valign=top <?php if ($_smarty_tpl->tpl_vars['template']->value['status']==0){?> style="color:#888;" <?php }?>><?php echo $_smarty_tpl->tpl_vars['template']->value['description'];?>
&nbsp;</td>
                    <td class="narrowWidthType" valign=top <?php if ($_smarty_tpl->tpl_vars['template']->value['status']==0){?> style="color:#888;" <?php }?>><?php echo $_smarty_tpl->tpl_vars['template']->value['sharingtype'];?>
&nbsp;</td>
                    <td class="narrowWidthType" valign=top <?php if ($_smarty_tpl->tpl_vars['template']->value['status']==0){?> style="color:#888;" <?php }?> nowrap><?php echo $_smarty_tpl->tpl_vars['template']->value['owner'];?>
&nbsp;</td>                    
                    
                    <td class="narrowWidthType" valign=top <?php if ($_smarty_tpl->tpl_vars['template']->value['status']==0){?> style="color:#888;" <?php }?>><?php if (in_array($_smarty_tpl->tpl_vars['template']->value['templateid'],$_smarty_tpl->tpl_vars['WTEMPLATESIDS']->value)){?><?php echo vtranslate("LBL_YES");?>
<?php }else{ ?><?php echo vtranslate("LBL_NO");?>
<?php }?></td>
                    <?php if ($_smarty_tpl->tpl_vars['VERSION_TYPE']->value!='deactivate'){?><td class="narrowWidthType" valign=top <?php if ($_smarty_tpl->tpl_vars['template']->value['status']==0){?> style="color:#888;" <?php }?>><?php echo $_smarty_tpl->tpl_vars['template']->value['status_lbl'];?>
&nbsp;</td>
                    <td class="narrowWidthType" valign=top nowrap><?php echo $_smarty_tpl->tpl_vars['template']->value['edit'];?>
</td><?php }?>
                </tr>
            <?php }
if (!$_smarty_tpl->tpl_vars['template']->_loop) {
?>   
            </tbody>
        </table>    
        <table class="emptyRecordsDiv">
         <tbody>
            <tr>
            <td>
                <?php echo vtranslate("LBL_NO");?>
 <?php echo vtranslate("LBL_TEMPLATE","EMAILMaker");?>
 <?php echo vtranslate("LBL_FOUND","EMAILMaker");?>

                &nbsp;&nbsp;-<a href="index.php?module=EMAILMaker&view=Select"><?php echo vtranslate("LBL_CREATE_NEW");?>
 <?php echo vtranslate("LBL_TEMPLATE","EMAILMaker");?>
</a><br>
            </td>
        </tr>  
            <?php } ?>
            </tbody>
        </table>
</div> 
<br>
<div align="center" class="small" style="color: rgb(153, 153, 153);"><?php echo vtranslate("EMAIL_MAKER","EMAILMaker");?>
 <?php echo $_smarty_tpl->tpl_vars['VERSION']->value;?>
 <?php echo vtranslate("COPYRIGHT","EMAILMaker");?>
</div><?php }} ?>