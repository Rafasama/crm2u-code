<?php /* Smarty version Smarty-3.1.7, created on 2017-04-21 20:10:10
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/MultiCompany4you/License.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69882175958fa6722db2732-74485532%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5280f1a72e4fb4023f651586997f5aba01ad2b9b' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/MultiCompany4you/License.tpl',
      1 => 1492800609,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69882175958fa6722db2732-74485532',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LICENSE' => 0,
    'VERSION_TYPE' => 0,
    'MODE' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_58fa6722e6dee',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa6722e6dee')) {function content_58fa6722e6dee($_smarty_tpl) {?>
<script type="text/javascript" src="layouts/vlayout/modules/MultiCompany4you/resources/License.js"></script>
<div class="container-fluid" id="licenseContainer">
    
    <form name="profiles_privilegies" action="index.php" method="post" class="form-horizontal">
    <br>
    <label class="pull-left themeTextColor font-x-x-large"><a href="index.php?parent=Settings&module=MultiCompany4you&view=CompanyList&block=<?php echo $_REQUEST['block'];?>
&fieldid=<?php echo $_REQUEST['fieldid'];?>
"><?php echo vtranslate('MultiCompany4you','MultiCompany4you');?>
</a> > <?php echo vtranslate('LICENSE_SETTINGS','MultiCompany4you');?>
</label>
    <br clear="all">
    <hr>

    <input type="hidden" name="module" value="MultiCompany4you" />
    <input type="hidden" name="view" value="" />
    <input type="hidden" name="license_key_val" id="license_key_val" value="<?php echo $_smarty_tpl->tpl_vars['LICENSE']->value;?>
" />
     <br />
    <div class="row-fluid">
        <label class="fieldLabel"><strong><?php echo vtranslate('LICENSE_SETTINGS_INFO','MultiCompany4you');?>
:</strong></label><br>

        <table class="table table-bordered table-condensed themeTableColor">
            <thead>
                    <tr class="blockHeader">
                            <th colspan="2" class="mediumWidthType">
                                    <span class="alignMiddle"><?php echo vtranslate('LBL_LICENCEKEY','MultiCompany4you');?>
</span>
                            </th>
                    </tr>
            </thead>
            <tbody>
                    <tr>
                        <td width="25%"><label  class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_LICENCEKEY','MultiCompany4you');?>
:</label></td>
                        <td style="border-left: none;">
                            <div class="pull-left" id="license_key_label"><?php echo $_smarty_tpl->tpl_vars['LICENSE']->value;?>
</div>
                            <div id="divgroup1" class="btn-group pull-left paddingLeft10px" <?php if ($_smarty_tpl->tpl_vars['VERSION_TYPE']->value=="professional"){?>style="display:none"<?php }?>>
                                <button id="activate_license_btn"  class="btn addButton" title="<?php echo vtranslate('LBL_ACTIVATE_KEY_TITLE','MultiCompany4you');?>
" type="button"><strong><?php echo vtranslate('LBL_ACTIVATE_KEY','MultiCompany4you');?>
</strong></button>
                            </div>
                            <div id="divgroup2" class="pull-left paddingLeft10px" <?php if ($_smarty_tpl->tpl_vars['VERSION_TYPE']->value!="professional"){?>style="display:none"<?php }?>>
                                <button id="reactivate_license_btn"  class="btn btn-success" title="<?php echo vtranslate('LBL_REACTIVATE_DESC','MultiCompany4you');?>
" type="button"><?php echo vtranslate('LBL_REACTIVATE','MultiCompany4you');?>
</button>
                                <button id="deactivate_license_btn" type="button" class="btn btn-danger marginLeftZero"><?php echo vtranslate('LBL_DEACTIVATE','MultiCompany4you');?>
</button>
                            </div>
                        </td>
                    </tr>
             </tbody>
        </table>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['MODE']->value=="edit"){?>        
        <div class="pull-right">
            <button class="btn btn-success" type="submit"><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>
            <a class="cancelLink" onclick="javascript:window.history.back();" type="reset">Cancel</a>
        </div> 
    <?php }?>
    </form>        

</div>
      

<script language="javascript" type="text/javascript">
MultiCompany4you_License_Js.registerEvents();
</script>
    <?php }} ?>