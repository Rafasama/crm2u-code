<?php /* Smarty version Smarty-3.1.7, created on 2017-05-22 14:57:28
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/Select.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1462068105922fc58d896c2-04827219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36489f0d27eba01bc605c12125ded573e9852788' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/Select.tpl',
      1 => 1495464681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1462068105922fc58d896c2-04827219',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PARENTTAB' => 0,
    'SAVETEMPLATEID' => 0,
    'EMAILTEMPLATES' => 0,
    'templatename' => 0,
    'EMAILTHEMES' => 0,
    'theme' => 0,
    'VERSION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5922fc58e556d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5922fc58e556d')) {function content_5922fc58e556d($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('JSResources.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class='editViewContainer'>
    <form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="index.php" enctype="multipart/form-data">
    <input type="hidden" name="module" value="EMAILMaker">
    <input type="hidden" name="parenttab" value="<?php echo $_smarty_tpl->tpl_vars['PARENTTAB']->value;?>
">
    <input type="hidden" name="templateid" value="<?php echo $_smarty_tpl->tpl_vars['SAVETEMPLATEID']->value;?>
">
    <input type="hidden" name="action" value="SaveEMAILTemplate">
    <input type="hidden" name="redirect" value="true">
    <br>
    <label class="pull-left themeTextColor font-x-x-large"><?php echo vtranslate('LBL_THEME_LIST','EMAILMaker');?>
</label>
    <br clear="all">
    <hr>
    <div class="row-fluid">
        <label class="fieldLabel"><strong><?php echo vtranslate('LBL_THEME_GENERATOR_DESCRIPTION','EMAILMaker');?>
</strong></label><br>
    </div>
<br>
<table border=0 cellspacing=0 cellpadding=10 width=100% >
    <tr>
        <td>
            <table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
            <tr>
                <td class="big"><strong><?php echo vtranslate('LBL_SELECT_THEME','EMAILMaker');?>
</strong></td>
                <td class="small" align=right>&nbsp;</td>
            </tr>
            </table>

            <div style="float:left;margin:5px;">
                <div style="float:left;border:1px solid #000000;width:140px;height:185px;">
                    <div class="tableHeading" style="border-bottom:1px solid #000000;padding:5px;text-align:center;font-weight:bold">
                    <a href="index.php?module=EMAILMaker&view=Edit&return_module=EMAILMaker&return_view=Select">Blank</a>
                    </div>
                    <a href="index.php?module=EMAILMaker&view=Edit&return_module=EMAILMaker&return_view=Select"><img src="modules/EMAILMaker/templates/blank.png" border="0"></a>
            	</div>
            </div>
            <?php  $_smarty_tpl->tpl_vars['templatename'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['templatename']->_loop = false;
 $_smarty_tpl->tpl_vars['templatenameid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['EMAILTEMPLATES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['templatename']->key => $_smarty_tpl->tpl_vars['templatename']->value){
$_smarty_tpl->tpl_vars['templatename']->_loop = true;
 $_smarty_tpl->tpl_vars['templatenameid']->value = $_smarty_tpl->tpl_vars['templatename']->key;
?>
                <div style="float:left;margin:5px;">
                    <div style="float:left;border:1px solid #000000;width:140px;height:185px;">
                	<div class="tableHeading" style="border-bottom:1px solid #000000;padding:5px;text-align:center;font-weight:bold" border="1">
                    <a href="index.php?module=EMAILMaker&view=Edit&theme=<?php echo $_smarty_tpl->tpl_vars['templatename']->value;?>
&return_module=EMAILMaker&return_view=Select"><?php echo $_smarty_tpl->tpl_vars['templatename']->value;?>
</a>
                    </div>
                    <a href="index.php?module=EMAILMaker&view=Edit&theme=<?php echo $_smarty_tpl->tpl_vars['templatename']->value;?>
&return_module=EMAILMaker&return_view=Select"><img src="modules/EMAILMaker/templates/<?php echo $_smarty_tpl->tpl_vars['templatename']->value;?>
/image.png" border="0"></a>
                	</div>
                </div>
            <?php } ?>             
            <?php  $_smarty_tpl->tpl_vars['theme'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['theme']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['EMAILTHEMES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['theme']->key => $_smarty_tpl->tpl_vars['theme']->value){
$_smarty_tpl->tpl_vars['theme']->_loop = true;
?>
                <div style="float:left;margin:5px;" >
                    <div style="float:left;border:1px solid #000000;width:140px;height:185px;" class="">
                    	<div style="height:1<?php if ($_smarty_tpl->tpl_vars['theme']->value['edit']!=''){?>6<?php }else{ ?>8<?php }?>0px;overflow:auto;">
                            <div class="tableHeading cursorPointer" style="border-bottom:1px solid #000000;" border="1">
                                <div style="padding:5px;text-align:center;font-weight:bold;">
                                <a href="index.php?module=EMAILMaker&view=Edit&themeid=<?php echo $_smarty_tpl->tpl_vars['theme']->value['themeid'];?>
&return_module=EMAILMaker&return_view=Select" title="<?php echo $_smarty_tpl->tpl_vars['theme']->value['themename'];?>
"><?php echo $_smarty_tpl->tpl_vars['theme']->value['themename'];?>
</a>
                                </div>
                            </div>
                            <div style="padding:2px"><?php echo $_smarty_tpl->tpl_vars['theme']->value['description'];?>
</div>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['theme']->value['edit']!=''){?>
                        <center>
                        <div class="actions">
                            <span class="textAlignCenter"><?php echo $_smarty_tpl->tpl_vars['theme']->value['edit'];?>
</span>
                        </div>
                        </center>
                        <?php }?>   
                	</div>
                </div>
            <?php } ?>
            <div style="float:left;margin:5px;" onClick="window.location.href = 'index.php?module=EMAILMaker&view=Edit&theme=new&mode=EditTheme&return_module=EMAILMaker&return_view=Select';">
                <div style="float:left;border:1px solid #000000;width:140px;height:185px;" class="contentsBackground cursorPointer">
                <div class="addButton" style="border-bottom:1px solid #000000;padding:5px;text-align:center;font-weight:bold">
                <i class="icon-plus icon-white"></i><?php echo vtranslate('LBL_ADD_THEME','EMAILMaker');?>

                </div>
                <div class="padding5per"><?php echo vtranslate('LBL_ADD_THEME_INFO','EMAILMaker');?>
</div>
                </div>
            </div>  
        </td>
    </tr>
</table>
<div align="center" class="small" style="color: rgb(153, 153, 153);"><?php echo vtranslate('EMAIL_MAKER','EMAILMaker');?>
 <?php echo $_smarty_tpl->tpl_vars['VERSION']->value;?>
 <?php echo vtranslate('COPYRIGHT','EMAILMaker');?>
</div>
</form>
</div><?php }} ?>