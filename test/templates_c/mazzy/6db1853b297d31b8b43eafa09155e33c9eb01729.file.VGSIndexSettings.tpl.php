<?php /* Smarty version Smarty-3.1.7, created on 2017-05-12 14:42:50
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/vlayout/modules/VGSVisualPipeline/VGSIndexSettings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2163774365915c9ead6f605-92050340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6db1853b297d31b8b43eafa09155e33c9eb01729' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/vlayout/modules/VGSVisualPipeline/VGSIndexSettings.tpl',
      1 => 1494589900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2163774365915c9ead6f605-92050340',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'RMU_FIELDS_ARRAY' => 0,
    'RMU_FIELDS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5915c9eae8385',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5915c9eae8385')) {function content_5915c9eae8385($_smarty_tpl) {?>

<div>
    <div style="width: 65%;margin: auto;margin-top: 2em;padding: 2em;">
        <h3 style="padding-bottom: 1em;text-align: center"><?php echo vtranslate('LBL_MODULE_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3>
        <div class="row" style="margin: 1em;">


            <div class="alert alert-warning" style="float: left;margin-left:1em !important; margin-bottom: 0px !important;margin-top: 0px !important;width: 80%; display:none;">
                <?php echo vtranslate('notice',$_smarty_tpl->tpl_vars['MODULE']->value);?>

            </div>

        </div>

    </div>
    <div>

        <div style="width: 80%;margin: auto;margin-top: 2%;">
            <div style="width:100%; height: 1%;margin-bottom: 2%;"><button class="btn pull-right" style="margin-bottom: 0.5em;" id="Contacts_detailView_basicAction_LBL_EDIT" onclick="window.location.href = 'index.php?module=VGSVisualPipeline&view=VGSAddNew&parent=Settings'"><?php echo vtranslate('ADD_NEW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button></div>

            <table class="table table-bordered listViewEntriesTable">
                <thead>
                    <tr class="listViewHeaders">
                        <th> <?php echo vtranslate('SOURCE_MODULE_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </th>
                        <th> <?php echo vtranslate('SOURCE_FIELD_LABEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </th>
                        <th> <?php echo vtranslate('ACTIONS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </th>

                    </tr>
                </thead>
                <?php  $_smarty_tpl->tpl_vars['RMU_FIELDS'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RMU_FIELDS']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['RMU_FIELDS_ARRAY']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['RMU_FIELDS']->key => $_smarty_tpl->tpl_vars['RMU_FIELDS']->value){
$_smarty_tpl->tpl_vars['RMU_FIELDS']->_loop = true;
?>
                    <tr class="listViewEntries">

                        <td class="listViewEntryValue" nowrap> <?php echo $_smarty_tpl->tpl_vars['RMU_FIELDS']->value['source_module'];?>
</td>
                        <td class="listViewEntryValue" nowrap> <?php echo $_smarty_tpl->tpl_vars['RMU_FIELDS']->value['source_field_name'];?>
 </td>
                        <td class="listViewEntryValue" nowrap> <a class="deleteRecordButton" id="<?php echo $_smarty_tpl->tpl_vars['RMU_FIELDS']->value['id'];?>
" data-sourcemodule="<?php echo $_smarty_tpl->tpl_vars['RMU_FIELDS']->value['source_module'];?>
"><i title="Delete" class="icon-trash alignMiddle"></i></a></td>

                    </tr>
                <?php } ?>
            </table>
        </div>      
    </div>
</div>
<?php }} ?>