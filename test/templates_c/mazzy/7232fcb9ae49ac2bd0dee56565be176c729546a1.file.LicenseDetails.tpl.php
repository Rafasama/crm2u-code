<?php /* Smarty version Smarty-3.1.7, created on 2017-05-22 14:51:55
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/LicenseDetails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16994762335922fb0bf227e1-12641852%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7232fcb9ae49ac2bd0dee56565be176c729546a1' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/LicenseDetails.tpl',
      1 => 1495464681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16994762335922fb0bf227e1-12641852',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'COMPANY_DETAILS' => 0,
    'STEP' => 0,
    'URL' => 0,
    'LICENSE' => 0,
    'VERSION_TYPE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5922fb0c0f893',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5922fb0c0f893')) {function content_5922fb0c0f893($_smarty_tpl) {?>
<table class="table table-bordered table-condensed themeTableColor">
    <thead>
        <tr class="blockHeader">
            <th class="mediumWidthType">
                <span class="alignMiddle"><?php echo vtranslate('LBL_COMPANY_LICENSE_INFO','EMAILMaker');?>
</span>
            </th>
            <th class="mediumWidthType" style="border-left: none; text-align: right;">
                <button type="button" id="company_button" class="btn btn-info" onclick="window.location.href='index.php?module=Vtiger&parent=Settings&view=CompanyDetails&block=3&fieldid=14'"/><?php echo vtranslate('LBL_CHANGE_COMPANY_INFORMATION','EMAILMaker');?>
</button>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td width="25%"><label  class="muted pull-right marginRight10px"><?php echo vtranslate('organizationname','Settings:Vtiger');?>
:</label></td>
            <td style="border-left: none;"><div class="pull-left" id="organizationname_label"><?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILS']->value->get("organizationname");?>
</div></td>
        </tr>
        <tr>
            <td width="25%"><label  class="muted pull-right marginRight10px"><?php echo vtranslate('address','Settings:Vtiger');?>
:</label></td>
            <td style="border-left: none;"><div class="pull-left" id="address_label"><?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILS']->value->get("address");?>
</div></td>
        </tr>
        <tr>
            <td width="25%"><label  class="muted pull-right marginRight10px"><?php echo vtranslate('city','Settings:Vtiger');?>
:</label></td>
            <td style="border-left: none;"><div class="pull-left" id="city_label"><?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILS']->value->get("city");?>
</div></td>
        </tr>
        <tr>
            <td width="25%"><label  class="muted pull-right marginRight10px"><?php echo vtranslate('state','Settings:Vtiger');?>
:</label></td>
            <td style="border-left: none;"><div class="pull-left" id="state_label"><?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILS']->value->get("state");?>
</div></td>
        </tr>
        <tr>
            <td width="25%"><label  class="muted pull-right marginRight10px"><?php echo vtranslate('country','Settings:Vtiger');?>
:</label></td>
            <td style="border-left: none;"><div class="pull-left" id="country_label"><?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILS']->value->get("country");?>
</div></td>
        </tr>
        <tr>
            <td width="25%"><label  class="muted pull-right marginRight10px"><?php echo vtranslate('code','Settings:Vtiger');?>
:</label></td>
            <td style="border-left: none;"><div class="pull-left" id="code_label"><?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILS']->value->get("code");?>
</div></td>
        </tr>
        <tr>
            <td width="25%"><label  class="muted pull-right marginRight10px"><?php echo vtranslate('vatid','Settings:Vtiger');?>
:</label></td>
            <td style="border-left: none;"><div class="pull-left" id="vatid_label"><?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILS']->value->get("vatid");?>
</div></td>
        </tr>
  </tbody>
</table><br>
<?php if ($_smarty_tpl->tpl_vars['STEP']->value==''){?><label class="fieldLabel"><strong><?php echo vtranslate('LICENSE_SETTINGS_INFO','EMAILMaker');?>
:</strong></label><br><?php }?>
<table class="table table-bordered table-condensed themeTableColor">
    <thead>
        <tr class="blockHeader">
            <th colspan="2" class="mediumWidthType"><span class="alignMiddle"><?php echo vtranslate('LICENSE_SETTINGS','EMAILMaker');?>
</span></th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td width="25%"><label  class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_URL','EMAILMaker');?>
:</label></td>
                <td style="border-left: none;"><div class="pull-left" id="vatid_label"><?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
</div></td>
            </tr>
            <tr>
                <td width="25%"><label  class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_LICENCEKEY','EMAILMaker');?>
:</label></td>
                <td style="border-left: none;">
                    
                    <?php if ($_smarty_tpl->tpl_vars['STEP']->value!=''){?>
                        <input type="text" class="input-large" id="licensekey" name="licensekey" data-validation-engine="validate[required]"/>
                        <button type="subbmit" id="validate_button" class="btn btn-success"/><strong><?php echo vtranslate('LBL_VALIDATE','EMAILMaker');?>
</strong></button>&nbsp;&nbsp;
                        <button type="button" id="order_button" class="btn btn-info" onclick="window.location.href='http://www.its4you.sk/en/vtiger-shop.html'"/><?php echo vtranslate('LBL_ORDER_NOW','EMAILMaker');?>
</button>
                    <?php }else{ ?>
                        <div class="pull-left" id="license_key_label"><?php echo $_smarty_tpl->tpl_vars['LICENSE']->value;?>
&nbsp;&nbsp;</div>
                        <div id="divgroup1" class="btn-group pull-left paddingLeft10px" <?php if ($_smarty_tpl->tpl_vars['VERSION_TYPE']->value=="basic"||$_smarty_tpl->tpl_vars['VERSION_TYPE']->value=="professional"){?>style="display:none"<?php }?>>
                            <button id="activate_license_btn"  class="btn addButton" title="<?php echo vtranslate('LBL_ACTIVATE_KEY_TITLE','EMAILMaker');?>
" type="button"><strong><?php echo vtranslate('LBL_ACTIVATE_KEY','EMAILMaker');?>
</strong></button>
                        </div>
                        <div id="divgroup2" class="pull-left paddingLeft10px" <?php if ($_smarty_tpl->tpl_vars['VERSION_TYPE']->value!="basic"&&$_smarty_tpl->tpl_vars['VERSION_TYPE']->value!="professional"){?>style="display:none"<?php }?>>
                            <button id="reactivate_license_btn"  class="btn btn-success" title="<?php echo vtranslate('LBL_REACTIVATE_DESC','EMAILMaker');?>
" type="button"><?php echo vtranslate('LBL_REACTIVATE','EMAILMaker');?>
</button>
                            <button id="deactivate_license_btn" type="button" class="btn btn-danger marginLeftZero"><?php echo vtranslate('LBL_DEACTIVATE','EMAILMaker');?>
</button>
                        </div>
                    <?php }?>
                </td>
            </tr>
     </tbody>
</table><?php }} ?>