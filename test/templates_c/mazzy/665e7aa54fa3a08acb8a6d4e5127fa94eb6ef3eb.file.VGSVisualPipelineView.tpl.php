<?php /* Smarty version Smarty-3.1.7, created on 2017-05-12 14:44:20
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/vlayout/modules/VGSVisualPipeline/VGSVisualPipelineView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16211115495915ca443fdd79-50433176%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '665e7aa54fa3a08acb8a6d4e5127fa94eb6ef3eb' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/vlayout/modules/VGSVisualPipeline/VGSVisualPipelineView.tpl',
      1 => 1494589900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16211115495915ca443fdd79-50433176',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'COLUMNA' => 0,
    'MODULENAME' => 0,
    'NOT_IN_FILTER' => 0,
    'RECORDS_ARRAY' => 0,
    'RECORDS' => 0,
    'llave' => 0,
    'otro' => 0,
    'RECORD_INFO' => 0,
    'FIELD_MODEL' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5915ca445ce86',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5915ca445ce86')) {function content_5915ca445ce86($_smarty_tpl) {?>
<style>
    .tilt.right {
        transform: rotate(3deg);
        -moz-transform: rotate(3deg);
        -webkit-transform: rotate(3deg);
    }
    .tilt.left {
        transform: rotate(-3deg);
        -moz-transform: rotate(-3deg);
        -webkit-transform: rotate(-3deg);
    }
    body {
        min-width: 520px;
    }
    .vgs-visual-pipeline{
        width: 100%;
        margin: 0 auto;
        height: 500px;
        min-height: 500px;
        white-space: nowrap;
        overflow-x: scroll;
        overflow-y: hidden;
    }

    .columnTitle{
        text-align: center;
        margin-bottom: 5%;
        word-wrap: break-word;


    }    
    .vgs-visual-pipeline .column {
        width: 250px;
        padding-bottom: 100px;
        display: inline-block;
        height: 500px;
        margin-right: 5.7px;
    }

    .vgs-visual-pipeline .column-list {
        overflow-y: scroll;
        width: 250px;
        padding-bottom: 100px;
        display: inline-block;
        height: 80%;
        margin-right: 5.7px;
    }


    .vgs-visual-pipeline .quickLinksDiv p.selectedQuickLink a:after{
        border-bottom: 20px solid rgba(0, 0, 0, 0);
    }
    .vgs-visual-pipeline .quickLinksDiv {
        margin: 10px auto 10px 1%;
        width: 90%;
    }

    .vgs-visual-pipeline  .quickLinksDiv p {
        font-size: 1em;
        padding: 5% 0 0 2%;

    }

    .vgs-visual-pipeline .table th, .table td {
        padding: 3%;   
        font-size: 80%;
        word-wrap: break-word;
        white-space: normal; 
    }

    .vgs-visual-pipeline .table {
    }
    .arrow-right {
        width: 0; 
        height: 0; 
        border-top: 60px solid transparent;
        border-bottom: 60px solid transparent;

        border-left: 60px solid green;
    }
    .portlet {
        margin: 0 1em 1em 0;
        padding: 0.3em;
    }
    .portlet-header {
        padding: 0.2em 0.3em;
        margin-bottom: 0.5em;
        position: relative;
        background-color: rgb(245, 245, 245);
        background-image: -webkit-linear-gradient(top, rgb(246, 246, 246), rgb(243, 243, 244));
        background-repeat: repeat-x;
        border-bottom-color: rgb(221, 221, 221);
        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-collapse: separate;
        border-left-color: rgb(68, 68, 68);
        border-left-style: none;
        border-left-width: 0px;
        border-right-color: rgba(0, 0, 0, 0.0980392);
        border-top-color: rgb(255, 255, 255);
        border-top-style: solid;
        border-top-width: 1px;
        color: rgb(68, 68, 68);
    }
    .portlet-toggle {
        position: absolute;
        top: 50%;
        right: 0;
        margin-top: -8px;
        display: none;
    }
    .portlet-content {
        padding: 0.4em;
    }
    .portlet-placeholder {
        border: 1px dotted black;
        margin: 0 1em 1em 0;
        height: 50px;
    }
    .portlet.ui-widget.ui-widget-content.ui-helper-clearfix.ui-corner-all{
        height: auto;
    }

    .ui-widget-content {
        border-radius: 1px;
        border-color: #ffffff;
        box-shadow: 0 0 3px -1px inset;
        margin-top: 2px;
        margin-left: 5px;
        height: 12px;
    }

</style>

<input type="hidden" id="columna_filtro" value="<?php echo $_smarty_tpl->tpl_vars['COLUMNA']->value;?>
">
<input type="hidden" id="modulo" value="<?php echo $_smarty_tpl->tpl_vars['MODULENAME']->value;?>
">

<?php if ($_smarty_tpl->tpl_vars['NOT_IN_FILTER']->value=='true'){?>

    <div class="vgs-visual-pipeline">
        <?php  $_smarty_tpl->tpl_vars['RECORDS'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RECORDS']->_loop = false;
 $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['RECORDS_ARRAY']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['RECORDS']->key => $_smarty_tpl->tpl_vars['RECORDS']->value){
$_smarty_tpl->tpl_vars['RECORDS']->_loop = true;
 $_smarty_tpl->tpl_vars['order']->value = $_smarty_tpl->tpl_vars['RECORDS']->key;
?>

            <?php  $_smarty_tpl->tpl_vars['otro'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['otro']->_loop = false;
 $_smarty_tpl->tpl_vars['llave'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['RECORDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['otro']->key => $_smarty_tpl->tpl_vars['otro']->value){
$_smarty_tpl->tpl_vars['otro']->_loop = true;
 $_smarty_tpl->tpl_vars['llave']->value = $_smarty_tpl->tpl_vars['otro']->key;
?>
                <div class="column">
                    <?php if ($_smarty_tpl->tpl_vars['llave']->value!=''){?>
                        <div class="quickLinksDiv"><p class="columnTitle selectedQuickLink "><a class="quickLinks"><strong><?php echo vtranslate($_smarty_tpl->tpl_vars['llave']->value,$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</strong></a></p></div>
                                    <?php }else{ ?>
                        <h4 class="columnTitle">None</h4>
                    <?php }?>
                    <div class="column-list" id="<?php echo $_smarty_tpl->tpl_vars['llave']->value;?>
">
                        <?php if (count($_smarty_tpl->tpl_vars['otro']->value)>0){?>
                            <?php  $_smarty_tpl->tpl_vars['RECORD_INFO'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RECORD_INFO']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['otro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['RECORD_INFO']->key => $_smarty_tpl->tpl_vars['RECORD_INFO']->value){
$_smarty_tpl->tpl_vars['RECORD_INFO']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['RECORD_INFO']->key;
?>
                                <div class="portlet" id="<?php echo $_smarty_tpl->tpl_vars['RECORD_INFO']->value['RECORD'];?>
" data-key="<?php echo $_smarty_tpl->tpl_vars['llave']->value;?>
">
                                    <div class="portlet-header"><a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULENAME']->value;?>
&record=<?php echo $_smarty_tpl->tpl_vars['RECORD_INFO']->value['RECORD_MODEL']->get('id');?>
&view=Detail" target="_blank"><?php echo $_smarty_tpl->tpl_vars['RECORD_INFO']->value['RECORD_LABEL'];?>
</a></div>
                                    <div class="portlet-content">
                                        <div class="detailViewInfo">
                                            <table class="table table-bordered equalSplit detailview-table">
                                                <?php  $_smarty_tpl->tpl_vars['FIELD_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FIELD_MODEL']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['RECORD_INFO']->value['TOOLTIP_FIELDS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['fieldsCount']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_MODEL']->key => $_smarty_tpl->tpl_vars['FIELD_MODEL']->value){
$_smarty_tpl->tpl_vars['FIELD_MODEL']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['fieldsCount']['index']++;
?>
                                                    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['fieldsCount']['index']<4){?>
                                                        <tr>
                                                            <td class="fieldLabel narrowWidthType" nowrap>
                                                                <label style="font-size: 80%;" class="muted"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label>
                                                            </td>
                                                            <td class="fieldValue narrowWidthType">
                                                                <span class="value">
                                                                    <?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getDisplayValue($_smarty_tpl->tpl_vars['RECORD_INFO']->value['RECORD_MODEL']->get($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name')),$_smarty_tpl->tpl_vars['RECORD_INFO']->value['RECORD_MODEL']->get('id'));?>
   
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    <?php }?>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php }?>
                    </div>
                </div>
            <?php } ?>

        <?php } ?>

    </div>

<?php }else{ ?>
    <div style="margin: 10% auto; width: 50%; font-size: 125%; font-weight: 700; color: red;">
        <?php echo vtranslate('The selected filter does not include the field: ',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
  <?php echo vtranslate($_smarty_tpl->tpl_vars['COLUMNA']->value,$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 <br><br>
        <?php echo vtranslate('Please choose another filter or add the column to this one ',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
 
    </div>
<?php }?>

<script>
    
        jQuery(document).ready(function() {
            jQuery('.vgs-visual-pipeline').height(jQuery(window).height()-jQuery('.navbar-fixed-top').height())
        });

        
</script><?php }} ?>