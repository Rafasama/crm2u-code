<?php /* Smarty version Smarty-3.1.7, created on 2017-05-12 12:22:10
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/vlayout/modules/MultiCompany4you/Install.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13169194015915a8f20d4952-14828401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '815c787ccc3c69a30a32ad75dbcd620192d611c1' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/vlayout/modules/MultiCompany4you/Install.tpl',
      1 => 1494591710,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13169194015915a8f20d4952-14828401',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'STEP' => 0,
    'TOTAL_STEPS' => 0,
    'CURRENT_STEP' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5915a8f21df98',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5915a8f21df98')) {function content_5915a8f21df98($_smarty_tpl) {?>
<div class="contentsDiv marginLeftZero" >
            
<div class="padding1per">

<div class="editContainer" style="padding-left: 3%;padding-right: 3%"><h3><?php echo vtranslate('LBL_MODULE_NAME','MultiCompany4you');?>
 <?php echo vtranslate('LBL_INSTALL','MultiCompany4you');?>
</h3>    
<hr>
<div id="breadcrumb">             
    <ul class="crumbs marginLeftZero">
        <li class="first step <?php if ($_smarty_tpl->tpl_vars['STEP']->value=="1"){?>active<?php }?>" style="z-index:10;" id="steplabel1"><a><span class="stepNum">1</span><span class="stepText"><?php echo vtranslate('LBL_VALIDATION','MultiCompany4you');?>
</span></a></li>
        <?php if ($_smarty_tpl->tpl_vars['TOTAL_STEPS']->value=="3"){?>
        <li class="step <?php if ($_smarty_tpl->tpl_vars['STEP']->value=="2"){?>active<?php }?>" style="z-index:9;"  id="steplabel2"><a><span class="stepNum">2</span><span class="stepText"><?php echo vtranslate('LBL_DOWNLOAD','MultiCompany4you');?>
</span></a></li>    
        <?php }?>    
        <li class="step last <?php if ($_smarty_tpl->tpl_vars['CURRENT_STEP']->value==$_smarty_tpl->tpl_vars['TOTAL_STEPS']->value){?>active<?php }?>" style="z-index:7;"  id="steplabel<?php echo $_smarty_tpl->tpl_vars['TOTAL_STEPS']->value;?>
"><a><span class="stepNum"><?php echo $_smarty_tpl->tpl_vars['TOTAL_STEPS']->value;?>
</span><span class="stepText"><?php echo vtranslate('LBL_FINISH','MultiCompany4you');?>
</span></a></li>
    </ul>
</div>
<div class="clearfix">
</div>
<form name="install" id="editLicense"  method="POST" action="index.php" class="form-horizontal">
<input type="hidden" name="module" value="MultiCompany4you"/>
<input type="hidden" name="view" value="install"/>
  
<div id="step1" class="padding1per" style="border:1px solid #ccc; <?php if ($_smarty_tpl->tpl_vars['STEP']->value!="1"){?>display:none;<?php }?>" >     
    <input type="hidden" name="installtype" value="validate"/>                                       
    <div class="controls">
        <div>
            <strong><?php echo vtranslate('LBL_WELCOME','MultiCompany4you');?>
</strong>
        </div>
        <br>
        <div class="clearfix">
        </div>
    </div>

    <div class="controls">
        <div>
           <?php echo vtranslate('LBL_WELCOME_DESC','MultiCompany4you');?>
</br>

            <?php echo vtranslate('LBL_WELCOME_FINISH','MultiCompany4you');?>


        </div>
        <br>
        <div class="clearfix">
        </div>
    </div>   

    <div class="controls">
        <div>
            <strong><?php echo vtranslate('LBL_INSERT_KEY','MultiCompany4you');?>
</strong>
        </div>
        <div>
            <?php echo vtranslate('LBL_ONLINE_ASSURE','MultiCompany4you');?>

        </div>
        <div class="clearfix">
        </div>
    </div> 
     <br>                                    
    <div class="controls">
        <div>
            <?php echo vtranslate('LBL_LICENSE_KEY','MultiCompany4you');?>
:&nbsp;<input type="text" class="input-large" id="licensekey" name="licensekey" data-validation-engine="validate[required]"/>
            <button type="submit" id="validate_button" class="btn btn-success"/><strong><?php echo vtranslate('LBL_VALIDATE','MultiCompany4you');?>
</strong></button>&nbsp;&nbsp;
            <button type="button" id="order_button" class="btn btn-info" onclick="window.location.href='http://www.its4you.sk/en/vtiger-shop.html'"/><?php echo vtranslate('LBL_ORDER_NOW','MultiCompany4you');?>
</button>
        </div>

        <div class="clearfix">
        </div>
    </div>
</div>    

<?php if ($_smarty_tpl->tpl_vars['TOTAL_STEPS']->value=="3"){?>        
<div id="step2" class="padding1per" style="border:1px solid #ccc;  <?php if ($_smarty_tpl->tpl_vars['STEP']->value!="2"){?>display:none;<?php }?>">

    <input type="hidden" name="installtype" value="download_src"/>
    <div class="controls">
        <div>
            <strong><?php echo vtranslate('LBL_DOWNLOAD_SRC','MultiCompany4you');?>
</strong>
        </div>
        <br>
        <div class="clearfix">
        </div>
    </div>

    <div class="controls">
        <div>
            <?php echo vtranslate('LBL_DOWNLOAD_SRC_DESC','MultiCompany4you');?>

        </div>
        <br>
        <div class="clearfix">
        </div>
    </div>          
    <div class="controls">
        <button type="button" id="download_button" class="btn btn-success"/><strong><?php echo vtranslate('LBL_DOWNLOAD','MultiCompany4you');?>
</strong></button>&nbsp;&nbsp;  
    </div>
</div>
<?php }?>                                                        
<div id="step<?php echo $_smarty_tpl->tpl_vars['TOTAL_STEPS']->value;?>
" class="padding1per" style="border:1px solid #ccc; <?php if ($_smarty_tpl->tpl_vars['STEP']->value!="3"){?>display:none;<?php }?>" >
    <input type="hidden" name="installtype" value="redirect_recalculate" />
    <div class="controls">
        <div><?php echo vtranslate('LBL_INSTALL_SUCCESS','MultiCompany4you');?>
</div>
        <div class="clearfix">
        </div>
    </div> 
    <br>
    <div class="controls">
        <button type="submit" id="next_button" class="btn btn-success"/><strong><?php echo vtranslate('LBL_FINISH','MultiCompany4you');?>
</strong></button>&nbsp;&nbsp;
    </div>
</div>
	
</form> 
</div> 
</div>
</div>
<script language="javascript" type="text/javascript">

jQuery(document).ready(function() {
    MultiCompany4you_License_Js.registerInstallEvents();
});
</script>                                   
<?php }} ?>