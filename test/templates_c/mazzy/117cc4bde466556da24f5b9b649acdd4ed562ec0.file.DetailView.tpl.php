<?php /* Smarty version Smarty-3.1.7, created on 2017-05-22 14:58:02
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/DetailView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20226744925922fc7a1be576-18547131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '117cc4bde466556da24f5b9b649acdd4ed562ec0' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/DetailView.tpl',
      1 => 1495464681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20226744925922fc7a1be576-18547131',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'IS_MASSEMAIL' => 0,
    'TEMPLATENAME' => 0,
    'DESCRIPTION' => 0,
    'MODULENAME' => 0,
    'IS_ACTIVE' => 0,
    'IS_DEFAULT' => 0,
    'SUBJECT' => 0,
    'MASSEMAILRECORDMODEL' => 0,
    'CHARTDATA1' => 0,
    'CHARTDATA2' => 0,
    'TOTAL_ENTRIES' => 0,
    'chdata' => 0,
    'BODY' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5922fc7a30d6b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5922fc7a30d6b')) {function content_5922fc7a30d6b($_smarty_tpl) {?>
<div style="position: relative;">
        <table class="table table-bordered equalSplit detailview-table">
            <thead>
                <tr>
                    <th class="blockHeader" colspan=" <?php if ($_smarty_tpl->tpl_vars['IS_MASSEMAIL']->value=="yes"){?>4<?php }else{ ?>2<?php }?>"><?php echo vtranslate('LBL_PROPERTIES','EMAILMaker');?>
</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($_smarty_tpl->tpl_vars['IS_MASSEMAIL']->value!="yes"){?>
                    <tr>
                        <td class="fieldLabel narrowWidthType" style="width:25%;"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_EMAIL_NAME','EMAILMaker');?>
</label></td>
                        <td class="fieldValue narrowWidthType" style="width:75%;"><?php echo $_smarty_tpl->tpl_vars['TEMPLATENAME']->value;?>
</td>
                    </tr>
                    <tr>
                        <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_DESCRIPTION','EMAILMaker');?>
</label></td>
                        <td class="fieldValue narrowWidthType" valign=top><?php echo $_smarty_tpl->tpl_vars['DESCRIPTION']->value;?>
</td>
                    </tr>
                    <?php if ($_smarty_tpl->tpl_vars['MODULENAME']->value!=''){?>
                        <tr>
                            <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_MODULENAMES','EMAILMaker');?>
</label></td>
                            <td class="fieldValue narrowWidthType" valign=top><?php echo $_smarty_tpl->tpl_vars['MODULENAME']->value;?>
</td>
                        </tr>
                    <?php }?>
                    <tr>
                        <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Status');?>
</label></td>
                        <td class="fieldValue narrowWidthType" valign=top><?php echo $_smarty_tpl->tpl_vars['IS_ACTIVE']->value;?>
</td>
                    </tr>
                    <tr>
                        <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_SETASDEFAULT','EMAILMaker');?>
</label></td>
                        <td class="fieldValue narrowWidthType" valign=top><?php echo $_smarty_tpl->tpl_vars['IS_DEFAULT']->value;?>
</td>
                    </tr>
                    <tr>
                        <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_EMAIL_SUBJECT','EMAILMaker');?>
</label></td>
                        <td class="fieldValue narrowWidthType" valign=top><?php echo $_smarty_tpl->tpl_vars['SUBJECT']->value;?>
</td>
                    </tr>
                <?php }?> 
                
                <?php if ($_smarty_tpl->tpl_vars['IS_MASSEMAIL']->value=="yes"){?>
                    <tr>
                        <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_EMAIL_SUBJECT','EMAILMaker');?>
</label></td>
                        <td class="fieldValue narrowWidthType"><?php echo $_smarty_tpl->tpl_vars['MASSEMAILRECORDMODEL']->value->get("me_subject");?>
</td>
                        <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_LIST_NAME','EMAILMaker');?>
</label></td>
                        <td class="fieldValue narrowWidthType"><?php echo $_smarty_tpl->tpl_vars['MASSEMAILRECORDMODEL']->value->getFilterLink();?>
</td>                    
                    </tr>
                    <tr>
                        <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_FROM_NAME','EMAILMaker');?>
</label></td>
                        <td class="fieldValue narrowWidthType"><?php echo $_smarty_tpl->tpl_vars['MASSEMAILRECORDMODEL']->value->get("from_name");?>
</td>
                        <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_COLUMN','EMAILMaker');?>
</label></td>
                        <td class="fieldValue narrowWidthType"><?php echo $_smarty_tpl->tpl_vars['MASSEMAILRECORDMODEL']->value->get("email_fieldname_label");?>
</td>
                    </tr>
                    <tr>
                        <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_FROM_EMAIL','EMAILMaker');?>
</label></td>
                        <td class="fieldValue narrowWidthType"><?php echo $_smarty_tpl->tpl_vars['MASSEMAILRECORDMODEL']->value->get("from_email");?>
</td>
                        <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Status','EMAILMaker');?>
</label></td>
                        <td class="fieldValue narrowWidthType"><?php echo vtranslate($_smarty_tpl->tpl_vars['MASSEMAILRECORDMODEL']->value->get("status"),'EMAILMaker');?>
</td>
                    </tr>
                    <tr>
                        <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_EMAIL_LANGUAGE','EMAILMaker');?>
</label></td>
                        <td class="fieldValue narrowWidthType"><?php echo $_smarty_tpl->tpl_vars['MASSEMAILRECORDMODEL']->value->get("language_label");?>
</td>
                        <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_START_OF','EMAILMaker');?>
</label></td>
                        <td class="fieldValue narrowWidthType"><?php echo $_smarty_tpl->tpl_vars['MASSEMAILRECORDMODEL']->value->get("start_of");?>
</td>
                    </tr>
                    <tr>
                        <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_EMAIL_NAME','EMAILMaker');?>
</label></td>
                        <td class="fieldValue narrowWidthType"><?php echo $_smarty_tpl->tpl_vars['MASSEMAILRECORDMODEL']->value->getTemplateName();?>
</td>
                        <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_LIMIT','EMAILMaker');?>
</label></td>
                        <td class="fieldValue narrowWidthType"><?php echo $_smarty_tpl->tpl_vars['MASSEMAILRECORDMODEL']->value->get("max_limit");?>
</td>
                    </tr>
                    <tr>
                        <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_DESCRIPTION','EMAILMaker');?>
</label></td>
                        <td class="fieldValue narrowWidthType" colspan="3"><?php echo $_smarty_tpl->tpl_vars['MASSEMAILRECORDMODEL']->value->get("description");?>
</td>
                    </tr>
                <?php }?>    
            </tbody>
        </table>
        <?php if ($_smarty_tpl->tpl_vars['IS_MASSEMAIL']->value=="yes"){?>
            <?php if ($_smarty_tpl->tpl_vars['CHARTDATA1']->value!=''){?>
                <br><br>
                <div id="EmailCampaignCharts" class="row-fluid">
                    <input class="chartData1" type=hidden value='<?php echo Vtiger_Util_Helper::toSafeHTML(ZEND_JSON::encode($_smarty_tpl->tpl_vars['CHARTDATA1']->value));?>
' />
                    <input class="chartData2" type=hidden value='<?php echo Vtiger_Util_Helper::toSafeHTML(ZEND_JSON::encode($_smarty_tpl->tpl_vars['CHARTDATA2']->value));?>
' />
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="row-fluid">
                                <table class="table table-bordered equalSplit detailview-table">
                                    <thead>
                                        <tr>
                                            <th class="blockHeader" colspan="2"><?php echo vtranslate("LBL_GRAPH1_TITLE","EMAILMaker");?>
 <?php echo $_smarty_tpl->tpl_vars['TOTAL_ENTRIES']->value;?>
</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $_smarty_tpl->tpl_vars['chdata'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['chdata']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['CHARTDATA1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['chdata']->key => $_smarty_tpl->tpl_vars['chdata']->value){
$_smarty_tpl->tpl_vars['chdata']->_loop = true;
?>
                                            <tr>
                                                <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate($_smarty_tpl->tpl_vars['chdata']->value['label'],'EMAILMaker');?>
</label></td>
                                                <td class="fieldValue narrowWidthType"><?php echo $_smarty_tpl->tpl_vars['chdata']->value['value'];?>
</td>                    
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="row-fluid">
                                <?php if ($_smarty_tpl->tpl_vars['CHARTDATA2']->value!=''){?>
                                    <table class="table table-bordered equalSplit detailview-table">
                                        <thead>
                                            <tr>
                                                <th class="blockHeader" colspan="2"><?php echo vtranslate("LBL_OPEN_EMAILS_TITLE","EMAILMaker");?>
</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  $_smarty_tpl->tpl_vars['chdata'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['chdata']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['CHARTDATA2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['chdata']->key => $_smarty_tpl->tpl_vars['chdata']->value){
$_smarty_tpl->tpl_vars['chdata']->_loop = true;
?>
                                                <tr>
                                                    <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate($_smarty_tpl->tpl_vars['chdata']->value['label'],'EMAILMaker');?>
</label></td>
                                                    <td class="fieldValue narrowWidthType"><?php echo $_smarty_tpl->tpl_vars['chdata']->value['value'];?>
</td>                    
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php }?>    
                            </div>
                        </div> 
                    </div>
                </div>
            <?php }?>   
        <?php }else{ ?>    
            <table class="table table-bordered equalSplit detailview-table">
                <thead>
                    <tr>
                        <th class="blockHeader"><?php echo vtranslate('LBL_EMAIL_TEMPLATE','EMAILMaker');?>
</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><div id="previewcontent" class="hide"><?php echo $_smarty_tpl->tpl_vars['BODY']->value;?>
</div>           
                        <iframe id="preview" class="row-fluid" style="height:1200px;"></iframe>
                        <script type="text/javascript">
                        //var previewcontent =  document.getElementById('previewcontent').innerHTML;
                        var previewcontent =  jQuery('#previewcontent').html();
                        var previewFrame = document.getElementById('preview');
                        var preview =  previewFrame.contentDocument ||  previewFrame.contentWindow.document;
                        preview.open();
                        preview.write(previewcontent);
                        preview.close(); 
                        jQuery('#previewcontent').html('');
                        </script>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php }?>
        
</div><?php }} ?>