<?php /* Smarty version Smarty-3.1.7, created on 2017-05-12 14:43:03
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/vlayout/modules/VGSVisualPipeline/VGSAddNew.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10294240705915c9f78616b1-46970853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f5d40db0b9849eebe5b0d6161c6ab4752171e6b' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/vlayout/modules/VGSVisualPipeline/VGSAddNew.tpl',
      1 => 1494589900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10294240705915c9f78616b1-46970853',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'ENTITY_MODULES' => 0,
    'MODULE1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5915c9f793b1b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5915c9f793b1b')) {function content_5915c9f793b1b($_smarty_tpl) {?>

<div style="width: 65%;margin: auto;margin-top: 2em;padding: 2em;">
    <h3 style="padding-bottom: 1em;text-align: center"><?php echo vtranslate('LBL_MODULE_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3>
    <div>
        <h4 style="margin-top: 1em;margin-bottom: 0.5em;"><?php echo vtranslate('ADD_NEW_PIPELINE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4>
        <p><?php echo vtranslate('ADD_NEW_UPDATE_EXPLAIN',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</p>
        <table class="table table-bordered table-condensed themeTableColor" style="margin-top: 1em;">
            <thead>
                <tr class="blockHeader">
                    <th colspan="4" class="mediumWidthType"><span class="alignMiddle"><?php echo vtranslate('ADD_NEW_PIPELINE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="50%" colspan="2"><label class="muted pull-right marginRight10px"><?php echo vtranslate('SOURCE_MODULE_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></td>
                    <td colspan="2" style="border-left: none;">
                        <select name="module1"  class="chzn-select" id="module1">
                            <option value="-">--</option>
                            <?php  $_smarty_tpl->tpl_vars['MODULE1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MODULE1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ENTITY_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE1']->key => $_smarty_tpl->tpl_vars['MODULE1']->value){
$_smarty_tpl->tpl_vars['MODULE1']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['MODULE1']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE1']->value);?>
</option>
                            <?php } ?>
                        </select>    
                    </td>
                </tr>
                <tr>
                    <td width="50%" colspan="2"><label class="muted pull-right marginRight10px"><?php echo vtranslate('SOURCE_FIELD_LABEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></td>
                    <td colspan="2" style="border-left: none;">
                        <select name="picklist1"  class="picklist chzn-select" id="picklist1">
                            <option value="-">--</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
       
        <br><br>
        <button class="btn pull-right" style="margin-bottom: 0.5em;" id="add_entry"><?php echo vtranslate('SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>
        <a class="pull-right" style="margin-right: 2%;" href="javascript:history.go(-1)"><?php echo vtranslate('Cancel',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
     
    </div>
</div><?php }} ?>