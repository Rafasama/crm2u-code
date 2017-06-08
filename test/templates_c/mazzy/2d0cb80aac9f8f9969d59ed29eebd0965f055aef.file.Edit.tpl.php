<?php /* Smarty version Smarty-3.1.7, created on 2017-05-22 14:57:36
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/Edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19532043585922fc60bcc990-09635875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d0cb80aac9f8f9969d59ed29eebd0965f055aef' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/Edit.tpl',
      1 => 1495464681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19532043585922fc60bcc990-09635875',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PARENTTAB' => 0,
    'SAVETEMPLATEID' => 0,
    'THEME_MODE' => 0,
    'EMODE' => 0,
    'DUPLICATE_TEMPLATENAME' => 0,
    'TEMPLATENAME' => 0,
    'MODULE' => 0,
    'TYPE' => 0,
    'SELECTMODULE' => 0,
    'EMAIL_TEMPLATE_RESULT' => 0,
    'RECIPIENTMODULENAMES' => 0,
    'SUBJECT_FIELDS' => 0,
    'TEMPLATEID' => 0,
    'SELECT_MODULE_FIELD_SUBJECT' => 0,
    'MODULENAMES' => 0,
    'SELECT_MODULE_FIELD' => 0,
    'RELATED_MODULES' => 0,
    'RelMod' => 0,
    'RELATED_BLOCKS' => 0,
    'IS_LISTVIEW_CHECKED' => 0,
    'LISTVIEW_BLOCK_TPL' => 0,
    'GLOBAL_LANG_LABELS' => 0,
    'MODULE_LANG_LABELS' => 0,
    'CUSTOM_LANG_LABELS' => 0,
    'CUI_BLOCKS' => 0,
    'ACCOUNTINFORMATIONS' => 0,
    'USERINFORMATIONS' => 0,
    'MULTICOMPANYINFORMATIONS' => 0,
    'LBL_MULTICOMPANY' => 0,
    'INVENTORYTERMSANDCONDITIONS' => 0,
    'DATE_VARS' => 0,
    'CUSTOM_FUNCTIONS' => 0,
    'PRODUCT_BLOC_TPL' => 0,
    'ARTICLE_STRINGS' => 0,
    'SELECT_PRODUCT_FIELD' => 0,
    'PRODUCTS_FIELDS' => 0,
    'SERVICES_FIELDS' => 0,
    'EMAIL_CATEGORY' => 0,
    'DEFAULT_FROM_OPTIONS' => 0,
    'SELECTED_DEFAULT_FROM' => 0,
    'IGNORE_PICKLIST_VALUES' => 0,
    'STATUS' => 0,
    'IS_ACTIVE' => 0,
    'DECIMALS' => 0,
    'margin_input_width' => 0,
    'IS_DEFAULT_DV_CHECKED' => 0,
    'IS_DEFAULT_LV_CHECKED' => 0,
    'ORDER' => 0,
    'TEMPLATE_OWNERS' => 0,
    'TEMPLATE_OWNER' => 0,
    'SHARINGTYPES' => 0,
    'SHARINGTYPE' => 0,
    'APP' => 0,
    'GROUPNAME' => 0,
    'MEMBER' => 0,
    'element' => 0,
    'RECORD_STRUCTURE' => 0,
    'ITS4YOUSTYLE_FILES' => 0,
    'STYLES_CONTENT' => 0,
    'STYLE_DATA' => 0,
    'VERSION' => 0,
    'COMPANY_STAMP_SIGNATURE' => 0,
    'COMPANYLOGO' => 0,
    'COMPANY_HEADER_SIGNATURE' => 0,
    'VATBLOCK_TABLE' => 0,
    'ROLEIDSTR' => 0,
    'ROLENAMESTR' => 0,
    'USERIDSTR' => 0,
    'USERNAMESTR' => 0,
    'GROUPIDSTR' => 0,
    'GROUPNAMESTR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5922fc611f18c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5922fc611f18c')) {function content_5922fc611f18c($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/rz2ac608/public_html/crm2u.com.br/matriz/libraries/Smarty/libs/plugins/function.html_options.php';
?>
<div class='editViewContainer'>
    <form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="index.php" enctype="multipart/form-data">
        <input type="hidden" name="module" value="EMAILMaker">
        <input type="hidden" name="parenttab" value="<?php echo $_smarty_tpl->tpl_vars['PARENTTAB']->value;?>
">
        <input type="hidden" name="templateid" value="<?php echo $_smarty_tpl->tpl_vars['SAVETEMPLATEID']->value;?>
">
        <input type="hidden" name="action" value="SaveEMAILTemplate">
        <input type="hidden" name="redirect" value="true">
        <input type="hidden" name="return_module" value="<?php echo $_REQUEST['return_module'];?>
">
        <input type="hidden" name="return_view" value="<?php echo $_REQUEST['return_view'];?>
">
        <input type="hidden" name="is_theme" value="<?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?>1<?php }else{ ?>0<?php }?>">
        <input type="hidden" name="selectedTab" id="selectedTab" value="properties">
        <input type="hidden" name="selectedTab2" id="selectedTab2" value="body">
        <div class="contentHeader row-fluid">
            <?php if ($_smarty_tpl->tpl_vars['EMODE']->value=='edit'){?>
                <?php if ($_smarty_tpl->tpl_vars['DUPLICATE_TEMPLATENAME']->value==''){?>
                    <span class="span8 font-x-x-large textOverflowEllipsis" title="<?php echo vtranslate('LBL_EDIT','EMAILMaker');?>
 &quot;<?php echo $_smarty_tpl->tpl_vars['TEMPLATENAME']->value;?>
&quot;"><?php echo vtranslate('LBL_EDIT','EMAILMaker');?>
 &quot;<?php echo $_smarty_tpl->tpl_vars['TEMPLATENAME']->value;?>
&quot;</span>
                <?php }else{ ?>
                    <span class="span8 font-x-x-large textOverflowEllipsis" title="<?php echo vtranslate('LBL_DUPLICATE','EMAILMaker');?>
 &quot;<?php echo $_smarty_tpl->tpl_vars['DUPLICATE_TEMPLATENAME']->value;?>
&quot;"><?php echo vtranslate('LBL_DUPLICATE','EMAILMaker');?>
 &quot;<?php echo $_smarty_tpl->tpl_vars['DUPLICATE_TEMPLATENAME']->value;?>
&quot;</span>
                <?php }?>
            <?php }else{ ?>
                <span class="span8 font-x-x-large textOverflowEllipsis">
                    <?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_NEW_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_NEW_TEMPLATE','EMAILMaker');?>
<?php }?>
                </span>
            <?php }?>
            <span class="pull-right">
                <button class="btn" type="submit" onclick="document.EditView.redirect.value = 'false';" ><strong><?php echo vtranslate('LBL_APPLY','EMAILMaker');?>
</strong></button>&nbsp;&nbsp;
                <button class="btn btn-success" type="submit"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>
                <?php if ($_REQUEST['return_view']!=''){?>
                    <a class="cancelLink" type="reset" onclick="window.location.href = 'index.php?module=<?php if ($_REQUEST['return_module']!=''){?><?php echo $_REQUEST['return_module'];?>
<?php }else{ ?>EMAILMaker<?php }?>&view=<?php echo $_REQUEST['return_view'];?>
<?php if ($_REQUEST['record']!=''){?>&record=<?php echo $_REQUEST['record'];?>
<?php }?>';"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
                <?php }else{ ?>
                    <a class="cancelLink" type="reset" onclick="javascript:window.history.back();"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
                <?php }?>
            </span>
        </div>
       <div class="modal-body tabbable" style="padding:0px;">
            <ul class="nav nav-pills" style="margin-bottom:0px; padding-left:5px;">
                <li class="active" id="properties_tab" onclick="EMAILMaker_EditJs.showHideTab('properties');"><a data-toggle="tab" href="javascript:void(0);"><?php echo vtranslate('LBL_PROPERTIES_TAB','EMAILMaker');?>
</a></li>
                <?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value!="true"){?>
                    <li id="module_tab" onclick="EMAILMaker_EditJs.showHideTab('module');"><a data-toggle="tab" href="javascript:void(0);"><?php echo vtranslate('LBL_MODULE_INFO','EMAILMaker');?>
</a></li>
                <?php }?>
                <li id="company_tab" onclick="EMAILMaker_EditJs.showHideTab('company');"><a data-toggle="tab" href="javascript:void(0);"><?php echo vtranslate('LBL_OTHER_INFO','EMAILMaker');?>
</a></li>
                <li id="labels_tab" onclick="EMAILMaker_EditJs.showHideTab('labels');"><a data-toggle="tab" href="javascript:void(0);"><?php echo vtranslate('LBL_LABELS','EMAILMaker');?>
</a></li>
                <?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value!="true"){?>
                    <li id="products_tab" onclick="EMAILMaker_EditJs.showHideTab('products');"><a data-toggle="tab" href="javascript:void(0);"><?php echo vtranslate('LBL_ARTICLE','EMAILMaker');?>
</a></li>
                    <li id="settings_tab" onclick="EMAILMaker_EditJs.showHideTab('settings');"><a data-toggle="tab" href="javascript:void(0);"><?php echo vtranslate('LBL_SETTINGS_TAB','EMAILMaker');?>
</a></li>
                    <li id="sharing_tab" onclick="EMAILMaker_EditJs.showHideTab('sharing');"><a data-toggle="tab" href="javascript:void(0);"><?php echo vtranslate('LBL_SHARING_TAB','EMAILMaker');?>
</a></li>
                    <?php if ($_smarty_tpl->tpl_vars['TYPE']->value=="professional"){?>
                        <li id="display_tab" onclick="EMAILMaker_EditJs.showHideTab('display');" <?php if ($_smarty_tpl->tpl_vars['SELECTMODULE']->value==''){?>style="display:none"<?php }?>><a data-toggle="tab" href="javascript:void(0);"><?php echo vtranslate('LBL_DISPLAY_TAB','EMAILMaker');?>
</a></li>
                    <?php }?>
                <?php }?>
            </ul>
        </div>     
        
        <table class="table table-bordered blockContainer ">
            <tbody id="properties_div">
                
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><span class="redColor">*</span><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_THEME_NAME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_EMAIL_NAME','EMAILMaker');?>
<?php }?>:</label></td>
                    <td class="fieldValue" colspan="3"><input name="templatename" id="templatename" type="text" value="<?php echo $_smarty_tpl->tpl_vars['TEMPLATENAME']->value;?>
" class="detailedViewTextBox" tabindex="1">&nbsp;
                    <span class="muted">&nbsp;&nbsp;&nbsp;<?php echo vtranslate('LBL_DESCRIPTION','EMAILMaker');?>
:&nbsp;</span>
                    <span class="small cellText">
                        <input name="description" type="text" value="<?php echo $_smarty_tpl->tpl_vars['EMAIL_TEMPLATE_RESULT']->value['description'];?>
" class="detailedViewTextBox span5" tabindex="2">
                    </span>
                    </td>
                </tr>     					
                
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_RECIPIENT_FIELDS','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue row-fluid" colspan="3">
                        <select name="r_modulename" id="r_modulename" class="chzn-select span4"> 
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['RECIPIENTMODULENAMES']->value),$_smarty_tpl);?>

                        </select>
                        &nbsp;&nbsp;
                        <select name="recipientmodulefields" id="recipientmodulefields" class="chzn-select span4">
                            <option value=""><?php echo vtranslate('LBL_SELECT_MODULE_FIELD','EMAILMaker');?>
</option>
                        </select>
                        <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('recipientmodulefields');" ><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                    </td>      						
                </tr> 
                
                <?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value!="true"){?> 
                    <tr>
                        <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_EMAIL_SUBJECT','EMAILMaker');?>
:</label></td>
                        <td class="fieldValue" colspan="3"><input name="subject" id="subject" type="text" value="<?php echo $_smarty_tpl->tpl_vars['EMAIL_TEMPLATE_RESULT']->value['subject'];?>
" class="detailedViewTextBox span8" tabindex="1">&nbsp;
                        <span class="muted">
                            <select name="subject_fields" id="subject_fields" class="chzn-select span4" onchange="insertFieldIntoSubject(this.value);">
                                <option value=""><?php echo vtranslate('LBL_SELECT_MODULE_FIELD','EMAILMaker');?>
</option>
                                <optgroup label="<?php echo vtranslate('LBL_COMMON_EMAILINFO','EMAILMaker');?>
">
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SUBJECT_FIELDS']->value),$_smarty_tpl);?>

                                </optgroup>
                                <?php if ($_smarty_tpl->tpl_vars['TEMPLATEID']->value!=''||$_smarty_tpl->tpl_vars['SELECTMODULE']->value!=''){?>
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SELECT_MODULE_FIELD_SUBJECT']->value),$_smarty_tpl);?>

                                <?php }?>
                            </select>
                        </span>
                        </td>
                    </tr>
                <?php }?>     
            </tbody>  
            <?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value!="true"){?>   
                <tbody id="module_div" style="display:none;">    
                    <tr>
                        <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_MODULENAMES','EMAILMaker');?>
:</label></td>
                        <td class="fieldValue" colspan="3">
                            <select name="modulename" id="modulename" class="chzn-select span4" > 
                                <?php if ($_smarty_tpl->tpl_vars['TEMPLATEID']->value!=''||$_smarty_tpl->tpl_vars['SELECTMODULE']->value!=''){?>
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['MODULENAMES']->value,'selected'=>$_smarty_tpl->tpl_vars['SELECTMODULE']->value),$_smarty_tpl);?>

                                <?php }else{ ?>
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['MODULENAMES']->value),$_smarty_tpl);?>

                                <?php }?>
                            </select>
                            &nbsp;&nbsp;
                            <select name="modulefields" id="modulefields" class="chzn-select span5">
                                <?php if ($_smarty_tpl->tpl_vars['TEMPLATEID']->value==''&&$_smarty_tpl->tpl_vars['SELECTMODULE']->value==''){?>
                                    <option value=""><?php echo vtranslate('LBL_SELECT_MODULE_FIELD','EMAILMaker');?>
</option>
                                <?php }else{ ?>
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SELECT_MODULE_FIELD']->value),$_smarty_tpl);?>

                                <?php }?>
                            </select>
                            <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('modulefields');" ><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                        </td>      						
                    </tr>    					
                                    					
                    <tr id="body_variables">
                        <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_RELATED_MODULES','EMAILMaker');?>
:</label></td>
      <td class="fieldValue row-fluid" colspan="3">

                        <select name="relatedmodulesorce" id="relatedmodulesorce" class="chzn-select span4">
                            <option value=""><?php echo vtranslate('LBL_SELECT_MODULE','EMAILMaker');?>
</option>
                            <?php  $_smarty_tpl->tpl_vars['RelMod'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RelMod']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['RELATED_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['RelMod']->key => $_smarty_tpl->tpl_vars['RelMod']->value){
$_smarty_tpl->tpl_vars['RelMod']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['RelMod']->value[0];?>
" data-module="<?php echo $_smarty_tpl->tpl_vars['RelMod']->value[3];?>
"><?php echo $_smarty_tpl->tpl_vars['RelMod']->value[1];?>
 (<?php echo $_smarty_tpl->tpl_vars['RelMod']->value[2];?>
)</option>
                            <?php } ?>
                        </select>
                        &nbsp;&nbsp;

                        <select name="relatedmodulefields" id="relatedmodulefields" class="chzn-select span5">
                            <option value=""><?php echo vtranslate('LBL_SELECT_MODULE_FIELD','EMAILMaker');?>
</option>
                        </select>
                        <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('relatedmodulefields');"><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
</button>
                    </td> 
                    </tr>
                    
                    <tr id="related_block_tpl_row">
                        <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_RELATED_BLOCK_TPL','EMAILMaker');?>
:</label></td>
                        <td class="fieldValue row-fluid" colspan="3">
                            <select name="related_block" id="related_block" class="chzn-select span4" >
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['RELATED_BLOCKS']->value),$_smarty_tpl);?>

                            </select>
                            <button type="button" class="btn btn-success marginLeftZero" onclick="EMAILMaker_EditJs.InsertRelatedBlock();"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                            <button type="button" class="btn addButton marginLeftZero" onclick="EMAILMaker_EditJs.CreateRelatedBlock();"><i class="icon-plus icon-white"></i>&nbsp;<strong><?php echo vtranslate('LBL_CREATE');?>
</strong></button>
                            <button type="button" class="btn marginLeftZero" onclick="EMAILMaker_EditJs.EditRelatedBlock();"><?php echo vtranslate('LBL_EDIT');?>
</button>
                            <button class="btn btn-danger marginLeftZero" class="crmButton small delete" onclick="EMAILMaker_EditJs.DeleteRelatedBlock();"><?php echo vtranslate('LBL_DELETE');?>
</button>
                        </td>
                    </tr>
                    <tr id="listview_block_tpl_row">
                        <td class="fieldLabel">
                            <label class="muted pull-right marginRight10px"><input type="checkbox" name="is_listview" id="isListViewTmpl" <?php echo $_smarty_tpl->tpl_vars['IS_LISTVIEW_CHECKED']->value;?>
 onclick="EMAILMaker_EditJs.isLvTmplClicked();" title="<?php echo vtranslate('LBL_LISTVIEW_TEMPLATE','EMAILMaker');?>
" />
                            <?php echo vtranslate('LBL_LISTVIEWBLOCK','EMAILMaker');?>
:</label>
                        </td>
                    <td class="fieldValue" colspan="3">
                        <span>
                        <select name="listviewblocktpl" id="listviewblocktpl" class="chzn-select">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['LISTVIEW_BLOCK_TPL']->value),$_smarty_tpl);?>

                            </select>
                         </span>
                            <button type="button" id="listviewblocktpl_butt" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('listviewblocktpl');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                        </td>
                    </tr>
            </tbody>
            <?php }?>
            
            <tbody id="labels_div" style="display:none;">
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_GLOBAL_LANG','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3">
                        <select name="global_lang" id="global_lang" class="chzn-select span9">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['GLOBAL_LANG_LABELS']->value),$_smarty_tpl);?>

                        </select>
                        <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('global_lang');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                    </td>
                </tr>
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_MODULE_LANG','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3">
                        <select name="module_lang" id="module_lang" class="chzn-select span9">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['MODULE_LANG_LABELS']->value),$_smarty_tpl);?>

                        </select>
                        <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('module_lang');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                    </td>
                </tr>
                <?php if ($_smarty_tpl->tpl_vars['TYPE']->value=="professional"){?>
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_CUSTOM_LABELS','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3">
                        <select name="custom_lang" id="custom_lang" class="chzn-select span9">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['CUSTOM_LANG_LABELS']->value),$_smarty_tpl);?>

                        </select>
                        <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('custom_lang');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                    </td>
                </tr>
                <?php }?>
            </tbody>
             
            <tbody id="company_div" style="display:none;">
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_COMPANY_USER_INFO','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3">
                        <select name="acc_info_type" id="acc_info_type" class="chzn-select span4" onChange="EMAILMaker_EditJs.change_acc_info(this)">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['CUI_BLOCKS']->value),$_smarty_tpl);?>

                        </select>
                        <div id="acc_info_div" class="au_info_div" style="display:inline;">
                            <select name="acc_info" id="acc_info" class="chzn-select span5">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ACCOUNTINFORMATIONS']->value),$_smarty_tpl);?>

                            </select>
                            <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('acc_info');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                        </div>
                        <div id="user_info_div" class="au_info_div" style="display:none;">
                            <select name="user_info" id="user_info" class="chzn-select span5">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['USERINFORMATIONS']->value['s']),$_smarty_tpl);?>

                            </select>
                            <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('user_info');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                        </div>
                        <div id="logged_user_info_div" class="au_info_div"  style="display:none;">
                            <select name="logged_user_info" id="logged_user_info" class="chzn-select span5">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['USERINFORMATIONS']->value['l']),$_smarty_tpl);?>

                            </select>
                            <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('logged_user_info');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                        </div>
                        <div id="modifiedby_user_info_div" class="au_info_div" style="display:none;">
                            <select name="modifiedby_user_info" id="modifiedby_user_info" class="chzn-select span5">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['USERINFORMATIONS']->value['m']),$_smarty_tpl);?>

                            </select>
                            <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('modifiedby_user_info');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                        </div>
                        <div id="smcreator_user_info_div" class="au_info_div" style="display:none;">
                            <select name="smcreator_user_info" id="smcreator_user_info" class="chzn-select span5">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['USERINFORMATIONS']->value['c']),$_smarty_tpl);?>

                            </select>
                            <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('smcreator_user_info');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                        </div>
                    </td>
                </tr>
                <?php if ($_smarty_tpl->tpl_vars['MULTICOMPANYINFORMATIONS']->value!=''){?>
                    <tr>
                        <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo $_smarty_tpl->tpl_vars['LBL_MULTICOMPANY']->value;?>
:</label></td>
                        <td class="fieldValue" colspan="3">
                            <select name="multicomapny" id="multicomapny" class="chzn-select span4">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['MULTICOMPANYINFORMATIONS']->value),$_smarty_tpl);?>

                            </select>
                            <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('multicomapny');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                        </td>
                    </tr>
                <?php }?>
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('TERMS_AND_CONDITIONS','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3">
                        <select name="invterandcon" id="invterandcon" class="chzn-select span4">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['INVENTORYTERMSANDCONDITIONS']->value),$_smarty_tpl);?>

                        </select>
                        <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('invterandcon');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                    </td>
                </tr>
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_CURRENT_DATE','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3">
                        <select name="dateval" id="dateval" class="chzn-select span4">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['DATE_VARS']->value),$_smarty_tpl);?>

                        </select>
                        <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('dateval');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                    </td>
                </tr>
               
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('CUSTOM_FUNCTIONS','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3">
                        <select name="custom_function_type" id="custom_function_type" class="chzn-select span4">
                            <option value="before"><?php echo vtranslate('LBL_BEFORE','EMAILMaker');?>
</option>
                            <option value="after"><?php echo vtranslate('LBL_AFTER','EMAILMaker');?>
</option>
                        </select>
                        <select name="customfunction" id="customfunction" class="chzn-select span4">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['CUSTOM_FUNCTIONS']->value),$_smarty_tpl);?>

                        </select>
                        <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('customfunction');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                    </td>
                </tr>
            </tbody>
            
            <tbody id="products_div" style="display:none;">
                
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_PRODUCT_BLOC_TPL','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3">
                        <select name="productbloctpl2" id="productbloctpl2" class="chzn-select span4">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['PRODUCT_BLOC_TPL']->value),$_smarty_tpl);?>

                        </select>
                        <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('productbloctpl2');"/><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                    </td>
                </tr>
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_ARTICLE','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3">
                        <select name="articelvar" id="articelvar" class="chzn-select span4">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ARTICLE_STRINGS']->value),$_smarty_tpl);?>

                        </select>
                        <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('articelvar');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>
                    </td>
                </tr>
                
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">*<?php echo vtranslate('LBL_PRODUCTS_AVLBL','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3">
                        <select name="psfields" id="psfields" class="chzn-select span4">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SELECT_PRODUCT_FIELD']->value),$_smarty_tpl);?>

                        </select>
                        <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('psfields');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>            						
                    </td>
                </tr>
                                                
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">*<?php echo vtranslate('LBL_PRODUCTS_FIELDS','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3">
                        <select name="productfields" id="productfields" class="chzn-select span4">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['PRODUCTS_FIELDS']->value),$_smarty_tpl);?>

                        </select>
                        <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('productfields');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>            						
                    </td>
                </tr>
                                                
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">*<?php echo vtranslate('LBL_SERVICES_FIELDS','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3">
                        <select name="servicesfields" id="servicesfields" class="chzn-select span4">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SERVICES_FIELDS']->value),$_smarty_tpl);?>

                        </select>
                        <button type="button" class="btn btn-success marginLeftZero" onclick="InsertIntoTemplate('servicesfields');"><?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value=="true"){?><?php echo vtranslate('LBL_INSERT_TO_THEME','EMAILMaker');?>
<?php }else{ ?><?php echo vtranslate('LBL_INSERT_TO_TEXT','EMAILMaker');?>
<?php }?></button>            						
                    </td>
                </tr>
                <tr>
                    <td class="fieldLabel" colspan="4"><label class="muted marginRight10px"><small><?php echo vtranslate('LBL_PRODUCT_FIELD_INFO','EMAILMaker');?>
</small></label></td>
                </tr>
            </tbody>
            
            <tbody id="settings_div" style="display:none;">
                
                <tr>
                    <td class="fieldLabel" title="<?php echo vtranslate('Category');?>
"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Category');?>
:</label></td>
                    <td class="fieldValue" colspan="3"><input type="text" name="email_category" value="<?php echo $_smarty_tpl->tpl_vars['EMAIL_CATEGORY']->value;?>
" class="detailedViewTextBox span6"/></td>
                </tr>
                
                <tr>
                    <td class="fieldLabel" title="<?php echo vtranslate('LBL_DEFAULT_FROM','EMAILMaker');?>
"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_DEFAULT_FROM','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3">
                    <select name="default_from_email" class="chzn-select span6">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['DEFAULT_FROM_OPTIONS']->value,'selected'=>$_smarty_tpl->tpl_vars['SELECTED_DEFAULT_FROM']->value),$_smarty_tpl);?>

                    </select>
                    </td>
                </tr>
                
                <tr>
                    <td class="fieldLabel" title="<?php echo vtranslate('LBL_IGNORE_PICKLIST_VALUES_DESC','EMAILMaker');?>
"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_IGNORE_PICKLIST_VALUES','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3" title="<?php echo vtranslate('LBL_IGNORE_PICKLIST_VALUES_DESC','EMAILMaker');?>
"><input type="text" name="ignore_picklist_values" value="<?php echo $_smarty_tpl->tpl_vars['IGNORE_PICKLIST_VALUES']->value;?>
" class="detailedViewTextBox span6"/></td>
                </tr>
                
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Status');?>
:</label></td>    					   
                    <td class="fieldValue" colspan="3">
                        <select name="is_active" id="is_active" class="chzn-select span4" onchange="EMAILMaker_EditJs.templateActiveChanged(this);">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['STATUS']->value,'selected'=>$_smarty_tpl->tpl_vars['IS_ACTIVE']->value),$_smarty_tpl);?>
   
                        </select>
                    </td>
                </tr>
                    					
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_DECIMALS','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3">
                        <table>
                            <tr>
                                <td align="right" nowrap><?php echo vtranslate('LBL_DEC_POINT','EMAILMaker');?>
</td>
                                <td><input type="text" maxlength="2" name="dec_point" class="detailedViewTextBox" value="<?php echo $_smarty_tpl->tpl_vars['DECIMALS']->value['point'];?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['margin_input_width']->value;?>
"/></td>

                                <td align="right" nowrap><?php echo vtranslate('LBL_DEC_DECIMALS','EMAILMaker');?>
</td>
                                <td><input type="text" maxlength="2" name="dec_decimals" class="detailedViewTextBox" value="<?php echo $_smarty_tpl->tpl_vars['DECIMALS']->value['decimals'];?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['margin_input_width']->value;?>
"/></td>

                                <td align="right" nowrap><?php echo vtranslate('LBL_DEC_THOUSANDS','EMAILMaker');?>
</td>
                                <td><input type="text" maxlength="2" name="dec_thousands"  class="detailedViewTextBox" value="<?php echo $_smarty_tpl->tpl_vars['DECIMALS']->value['thousands'];?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['margin_input_width']->value;?>
"/></td>                                       
                            </tr>
                        </table>
                    </td>
                </tr>    
                
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_SETASDEFAULT','EMAILMaker');?>
:</label></td>    					   
                    <td class="fieldValue" colspan="3">
                        <?php echo vtranslate('LBL_FOR_DV','EMAILMaker');?>
&nbsp;&nbsp;<input type="checkbox" id="is_default_dv" name="is_default_dv" <?php echo $_smarty_tpl->tpl_vars['IS_DEFAULT_DV_CHECKED']->value;?>
/>
                        &nbsp;&nbsp;
                        <?php echo vtranslate('LBL_FOR_LV','EMAILMaker');?>
&nbsp;&nbsp;<input type="checkbox" id="is_default_lv" name="is_default_lv" <?php echo $_smarty_tpl->tpl_vars['IS_DEFAULT_LV_CHECKED']->value;?>
/>
                        
                        <input type="hidden" name="tmpl_order" value="<?php echo $_smarty_tpl->tpl_vars['ORDER']->value;?>
" />
                    </td>
                </tr>
            </tbody>
            
            <tbody id="sharing_div" style="display:none;">
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_TEMPLATE_OWNER','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3">
                        <select name="template_owner" id="template_owner" class="chzn-select span4">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['TEMPLATE_OWNERS']->value,'selected'=>$_smarty_tpl->tpl_vars['TEMPLATE_OWNER']->value),$_smarty_tpl);?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_SHARING_TAB','EMAILMaker');?>
:</label></td>
                    <td class="fieldValue" colspan="3">
                        <select name="sharing" id="sharing" class="classname" onchange="EMAILMaker_EditJs.sharing_changed();">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SHARINGTYPES']->value,'selected'=>$_smarty_tpl->tpl_vars['SHARINGTYPE']->value),$_smarty_tpl);?>

                        </select>

                        <div id="sharing_share_div" style="display:none; border-top:2px dotted #DADADA; margin-top:10px; width:100%;">
                            <table width="100%"  border="0" align="center" cellpadding="5" cellspacing="0">
                                <tr>
                                    <td width="40%" valign=top class="cellBottomDotLinePlain small"><strong><?php echo vtranslate('LBL_MEMBER_AVLBL','EMAILMaker');?>
</strong></td>
                                    <td width="10%">&nbsp;</td>
                                    <td width="40%" class="cellBottomDotLinePlain small"><strong><?php echo vtranslate('LBL_MEMBER_SELECTED','EMAILMaker');?>
</strong></td>
                                </tr>
                                <tr>
                                    <td valign=top class="small">
                                        <?php echo vtranslate('LBL_ENTITY','EMAILMaker');?>
:&nbsp;
                                        <select id="sharingMemberType" name="sharingMemberType" class="small" onchange="EMAILMaker_EditJs.showSharingMemberTypes()">
                                            <option value="groups" selected><?php echo $_smarty_tpl->tpl_vars['APP']->value['LBL_GROUPS'];?>
</option>
                                            <option value="roles"><?php echo vtranslate('LBL_ROLES','EMAILMaker');?>
</option>
                                            <option value="rs"><?php echo vtranslate('LBL_ROLES_SUBORDINATES','EMAILMaker');?>
</option>
                                            <option value="users"><?php echo $_smarty_tpl->tpl_vars['APP']->value['LBL_USERS'];?>
</option>
                                        </select>
                                        <input type="hidden" name="sharingFindStr" id="sharingFindStr">&nbsp;
                                    </td>
                                    <td width="50">&nbsp;</td>
                                    <td class="small">&nbsp;</td>
                                </tr>
                                <tr class="small">
                                    <td valign=top><?php echo vtranslate('LBL_MEMBER_OF','EMAILMaker');?>
 <?php echo vtranslate('LBL_ENTITY','EMAILMaker');?>
<br>
                                        <select id="sharingAvailList" name="sharingAvailList" multiple size="10" class="small crmFormList"></select>
                                    </td>
                                    <td width="50">
                                        <div align="center">
                                            <input type="button" name="sharingAddButt" value="&nbsp;&rsaquo;&rsaquo;&nbsp;" onClick="EMAILMaker_EditJs.sharingAddColumn()" class="crmButton small"/><br /><br />
                                            <input type="button" name="sharingDelButt" value="&nbsp;&lsaquo;&lsaquo;&nbsp;" onClick="EMAILMaker_EditJs.sharingDelColumn()" class="crmButton small"/>
                                        </div>
                                    </td>
                                    <td class="small" style="background-color:#ddFFdd" valign=top><?php echo vtranslate('LBL_MEMBER_OF','EMAILMaker');?>
 &quot;<?php echo $_smarty_tpl->tpl_vars['GROUPNAME']->value;?>
&quot; <br>
                                        <select id="sharingSelectedColumns" name="sharingSelectedColumns" multiple size="10" class="small crmFormList">
                                            <?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MEMBER']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value){
$_smarty_tpl->tpl_vars['element']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['element']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['element']->value[1];?>
</option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" name="sharingSelectedColumnsString" id="sharingSelectedColumnsString" value="" />
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
            <?php if ($_smarty_tpl->tpl_vars['TYPE']->value=="professional"&&$_smarty_tpl->tpl_vars['THEME_MODE']->value!="true"){?>
                
                <tbody id="display_div">
                    <tr>
                        <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_DISPLAYED','EMAILMaker');?>
:</label></td>
                        <td class="fieldValue" colspan="3">
                            <select id="displayedValue" name="displayedValue" class="small">
                                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['EMAIL_TEMPLATE_RESULT']->value['displayed']!="1"){?>selected<?php }?>><?php echo vtranslate('LBL_YES','EMAILMaker');?>
</option>
                                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['EMAIL_TEMPLATE_RESULT']->value['displayed']=="1"){?>selected<?php }?>><?php echo vtranslate('LBL_NO','EMAILMaker');?>
</option>
                            </select>
                            &nbsp;<?php echo vtranslate('LBL_IF','EMAILMaker');?>
:
                        </td>
                    </tr>
                    <tr>
                        <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_CONDITIONS','EMAILMaker');?>
:</label></td>
                        <td class="fieldValue" colspan="3">
                            <input type="hidden" name="display_conditions" id="advanced_filter" value='' />
                            <div id="advanceFilterContainer" class="conditionsContainer">
                                <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('AdvanceFilter.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value), 0);?>

                                
                                
                            </div>
                        </td>
                    </tr>
                </tbody>
            <?php }?>            
        </table>
        <?php if ($_smarty_tpl->tpl_vars['ITS4YOUSTYLE_FILES']->value!=''){?>
            <div class="row-fluid paddingTop20">
                <div class="modal-body tabbable" style="padding:0px;">
                    <ul class="nav nav-pills" style="margin-bottom:0px; padding-left:5px;">
                        <li class="active" id="body_tab2" onclick="EMAILMaker_EditJs.showHideTab2('body');"><a data-toggle="tab2" href="javascript:void(0);"><?php echo vtranslate('LBL_BODY_TAB','EMAILMaker');?>
</a></li>
                        <li id="css_style_tab2" onclick="EMAILMaker_EditJs.showHideTab2('css_style');"><a data-toggle="tab2" href="javascript:void(0);"><?php echo vtranslate('LBL_CSS_STYLE_TAB','EMAILMaker');?>
</a></li>
                    </ul>
                </div>    
            </div>
        <?php }else{ ?>
            <br><br>
        <?php }?>
        
        
        <div style="display:block;" id="body_div2">
            <textarea name="body" id="body" style="width:90%;height:700px" class=small tabindex="5"><?php echo $_smarty_tpl->tpl_vars['EMAIL_TEMPLATE_RESULT']->value['body'];?>
</textarea>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['ITS4YOUSTYLE_FILES']->value!=''){?>
        <div class="border" style="display:none; border: 1px solid silver" id="css_style_div2">
            <?php  $_smarty_tpl->tpl_vars['STYLE_DATA'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['STYLE_DATA']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['STYLES_CONTENT']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['STYLE_DATA']->key => $_smarty_tpl->tpl_vars['STYLE_DATA']->value){
$_smarty_tpl->tpl_vars['STYLE_DATA']->_loop = true;
?>
                <table class="table table-bordered">
                    <thead>
                        <tr class="listViewHeaders">
                            <th>
                                <div class="pull-left">
                                <a href="index.php?module=ITS4YouStyles&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['STYLE_DATA']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['STYLE_DATA']->value['name'];?>
</a>
                                </div>
                                <div class="pull-right actions">
                                        <a href="index.php?module=ITS4YouStyles&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['STYLE_DATA']->value['id'];?>
" target="_blank"><i title="<?php echo vtranslate('LBL_SHOW_COMPLETE_DETAILS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="icon-th-list alignMiddle"></i></a>&nbsp;
                                        <?php if ($_smarty_tpl->tpl_vars['STYLE_DATA']->value['iseditable']=="yes"){?>
                                            <a href="index.php?module=ITS4YouStyles&view=Edit&record=<?php echo $_smarty_tpl->tpl_vars['STYLE_DATA']->value['id'];?>
" target="_blank" class="cursorPointer"><i class="icon-pencil alignMiddle" title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></i></a>
                                        <?php }?>
                                </div>
                            </th>
                        </tr>
                    </thead> 
                    <tbody>
                        <tr>
                            <td>
                                <textarea name="css_style" id="css_style<?php echo $_smarty_tpl->tpl_vars['STYLE_DATA']->value['id'];?>
" style="border: 1px solid black; " class="CodeMirror" tabindex="5"><?php echo $_smarty_tpl->tpl_vars['STYLE_DATA']->value['stylecontent'];?>
</textarea>
                            </td>
                        </tr>
                    </tbody>  
                </table>
                <br>
            <?php } ?>            
        </div>
        <?php }?>
        <script type="text/javascript">
            jQuery(document).ready(function(){ 
            <?php if ($_smarty_tpl->tpl_vars['ITS4YOUSTYLE_FILES']->value!=''){?> CKEDITOR.config.contentsCss = [<?php echo $_smarty_tpl->tpl_vars['ITS4YOUSTYLE_FILES']->value;?>
];<?php }?>
                 
                CKEDITOR.replace('body', {height: '1000'}); 
            })                        
        </script>
        
        <div class="contentHeader row-fluid">
            <span class="pull-right">
                <button class="btn" type="submit" onclick="document.EditView.redirect.value = 'false';" ><strong><?php echo vtranslate('LBL_APPLY','EMAILMaker');?>
</strong></button>&nbsp;&nbsp;
                <button class="btn btn-success" type="submit"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>
                <?php if ($_REQUEST['return_view']!=''){?>
                    <a class="cancelLink" type="reset" onclick="window.location.href = 'index.php?module=<?php if ($_REQUEST['return_module']!=''){?><?php echo $_REQUEST['return_module'];?>
<?php }else{ ?>EMAILMaker<?php }?>&view=<?php echo $_REQUEST['return_view'];?>
<?php if ($_REQUEST['record']!=''){?>&record=<?php echo $_REQUEST['record'];?>
<?php }?>';"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
                <?php }else{ ?>
                    <a class="cancelLink" type="reset" onclick="javascript:window.history.back();"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
                <?php }?>
            </span>
        </div>
    <div align="center" class="small" style="color: rgb(153, 153, 153);"><?php echo vtranslate('EMAIL_MAKER','EMAILMaker');?>
 <?php echo $_smarty_tpl->tpl_vars['VERSION']->value;?>
 <?php echo vtranslate('COPYRIGHT','EMAILMaker');?>
</div>
    </form>
</div>
<script type="text/javascript">
    var selectedTab = 'properties';
    var selectedTab2 = 'body';    
    var module_blocks = new Array();

    var invarray = ['SUBTOTAL', 'TOTALWITHOUTVAT', 'TOTALDISCOUNT', 'TOTALDISCOUNTPERCENT', 'TOTALAFTERDISCOUNT', 
                'VAT', 'VATPERCENT', 'VATBLOCK', 'TOTALWITHVAT', 'ADJUSTMENT', 'TOTAL', 'SHTAXTOTAL', 'SHTAXAMOUNT',
                'CURRENCYNAME', 'CURRENCYSYMBOL', 'CURRENCYCODE'];  


    var selected_module = '<?php echo $_smarty_tpl->tpl_vars['SELECTMODULE']->value;?>
';
    
    function InsertIntoTemplate(element){    
    selectField = document.getElementById(element).value;            
    var oEditor = CKEDITOR.instances.body;           
    if (element != 'header_var' && element != 'footer_var' && element != 'hmodulefields' && element != 'fmodulefields' && element != 'dateval'){
    if (selectField != ''){
        if (selectField == 'ORGANIZATION_STAMP_SIGNATURE')
                insert_value = '<?php echo $_smarty_tpl->tpl_vars['COMPANY_STAMP_SIGNATURE']->value;?>
';
        else if (selectField == 'COMPANY_LOGO')
                insert_value = '<?php echo $_smarty_tpl->tpl_vars['COMPANYLOGO']->value;?>
';
        else if (selectField == 'ORGANIZATION_HEADER_SIGNATURE')
                insert_value = '<?php echo $_smarty_tpl->tpl_vars['COMPANY_HEADER_SIGNATURE']->value;?>
';
        else if (selectField == 'VATBLOCK')
                insert_value = '<?php echo $_smarty_tpl->tpl_vars['VATBLOCK_TABLE']->value;?>
';
        else {
            if (element == "articelvar" || selectField == "LISTVIEWBLOCK_START" || selectField == "LISTVIEWBLOCK_END")
                insert_value = '#' + selectField + '#';
            else if (element == "relatedmodulefields") {                                                  
                rel_module_sorce = document.getElementById('relatedmodulesorce').value; 
                //rel_module_data = rel_module_sorce.split("|");                                    
                insert_value = '$r-'+ selectField+'$';   
            }  
            else if (element == "productbloctpl" || element == "productbloctpl2")
                insert_value = selectField;
            else if (element == "global_lang")
                insert_value = '%G_' + selectField + '%';
            else if (element == "module_lang")
                insert_value = '%M_' + selectField + '%';
            else if (element == "custom_lang")
                insert_value = '%' + selectField + '%';
            else if(element == "modulefields") {           
               if(inArray(selectField, invarray))
                   insert_value = '$'+selectField+'$';  
               else
                   insert_value = '$s-'+selectField+'$';      
           }
            else if (element == "customfunction") { 
                var cft = jQuery("#custom_function_type").val();
                if(cft == "after")
                    insert_value = '[CUSTOMFUNCTION_AFTER|'+selectField+'|CUSTOMFUNCTION_AFTER]'; 
                else
                    insert_value = '[CUSTOMFUNCTION|'+selectField+'|CUSTOMFUNCTION]'; 
            }
            else
                insert_value = '$' + selectField + '$';
        }
        oEditor.insertHtml(insert_value);
    }
    } else {
    if (selectField != ''){
    if (element == 'hmodulefields' || element == 'fmodulefields')
            oEditor.insertHtml('$' + selectField + '$');
            else
            oEditor.insertHtml(selectField);
    }
    }
    }    
    
    function arrayCompare(a1, a2){
        if (a1.length != a2.length) return false;
        var length = a2.length;
        for (var i = 0; i < length; i++){
            if (a1[i] !== a2[i]) return false;
        }
        return true;
    }    
    function inArray(needle, haystack){
        var length = haystack.length;
        for(var i = 0; i < length; i++){
            if(typeof haystack[i] == 'object'){
                if(arrayCompare(haystack[i], needle)) return true;
            } else {
                if(haystack[i] == needle) return true;
            }
        }
        return false;
    }    
    function insertFieldIntoSubject(val){
        if(val!=''){
            if(val=='##DD.MM.YYYY##' || val=='##DD-MM-YYYY##' || val=='##DD/MM/YYYY##' || val=='##MM-DD-YYYY##' || val=='##MM/DD/YYYY##' || val=='##YYYY-MM-DD##')
                document.getElementById('subject').value+= val;
            else
                document.getElementById('subject').value+='$s-'+val+'$'; 
        }               
    }
        
    var constructedOptionValue;
    var constructedOptionName;
    <?php if ($_smarty_tpl->tpl_vars['THEME_MODE']->value!="true"){?>
    var roleIdArr = new Array(<?php echo $_smarty_tpl->tpl_vars['ROLEIDSTR']->value;?>
);
    var roleNameArr = new Array(<?php echo $_smarty_tpl->tpl_vars['ROLENAMESTR']->value;?>
);
    var userIdArr = new Array(<?php echo $_smarty_tpl->tpl_vars['USERIDSTR']->value;?>
);
    var userNameArr = new Array(<?php echo $_smarty_tpl->tpl_vars['USERNAMESTR']->value;?>
);
    var grpIdArr = new Array(<?php echo $_smarty_tpl->tpl_vars['GROUPIDSTR']->value;?>
);
    var grpNameArr = new Array(<?php echo $_smarty_tpl->tpl_vars['GROUPNAMESTR']->value;?>
);
   
    jQuery(document).ready(function(){
        EMAILMaker_EditJs.isLvTmplClicked('init');
        EMAILMaker_EditJs.sharing_changed();
    });
    <?php }?>
</script><?php }} ?>