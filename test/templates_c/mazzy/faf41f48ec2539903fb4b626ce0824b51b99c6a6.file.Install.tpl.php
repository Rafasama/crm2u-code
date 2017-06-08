<?php /* Smarty version Smarty-3.1.7, created on 2017-05-22 14:51:55
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/Install.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14239514325922fb0bea2363-83994495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'faf41f48ec2539903fb4b626ce0824b51b99c6a6' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/Install.tpl',
      1 => 1495464681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14239514325922fb0bea2363-83994495',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'STEP' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5922fb0bf04fd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5922fb0bf04fd')) {function content_5922fb0bf04fd($_smarty_tpl) {?>
<div class="contentsDiv marginLeftZero" >
<div class="padding1per">
<div class="editContainer" style="padding-left: 3%;padding-right: 3%"><h3><?php echo vtranslate('LBL_MODULE_NAME','EMAILMaker');?>
 <?php echo vtranslate('LBL_INSTALL','EMAILMaker');?>
</h3>    
<hr>
<div id="breadcrumb">             
    <ul class="crumbs marginLeftZero">
        <li class="first step <?php if ($_smarty_tpl->tpl_vars['STEP']->value=="1"){?>active<?php }?>" style="z-index:10;" id="steplabel1"><a><span class="stepNum">1</span><span class="stepText"><?php echo vtranslate('LBL_VALIDATION','EMAILMaker');?>
</span></a></li>
        <li class="step last <?php if ($_smarty_tpl->tpl_vars['STEP']->value=="2"){?>active<?php }?>" style="z-index:7;"  id="steplabel2"><a><span class="stepNum">2</span><span class="stepText"><?php echo vtranslate('LBL_FINISH','EMAILMaker');?>
</span></a></li>
    </ul>
</div>
<div class="clearfix">
</div>
<form name="install" id="editLicense"  method="POST" action="index.php" class="form-horizontal">
<input type="hidden" name="module" value="EMAILMaker"/>
<input type="hidden" name="view" value="install"/>
<div id="step1" class="padding1per" style="border:1px solid #ccc; <?php if ($_smarty_tpl->tpl_vars['STEP']->value!="1"){?>display:none;<?php }?>" >    
    <input type="hidden" name="installtype" value="validate"/>                                       
    <div class="controls">
        <div>
            <strong><?php echo vtranslate('LBL_WELCOME','EMAILMaker');?>
</strong>
        </div>
    </div>
    <div class="controls paddingTop20">
        <div>
           <?php echo vtranslate('LBL_WELCOME_DESC','EMAILMaker');?>
</br><?php echo vtranslate('LBL_WELCOME_FINISH','EMAILMaker');?>

        </div>
    </div>  
        
    <div class="controls paddingTop20">
        <div>
            <strong><?php echo vtranslate('LBL_INSERT_KEY','EMAILMaker');?>
</strong>
        </div>
        <div>
            <?php echo vtranslate('LBL_ONLINE_ASSURE','EMAILMaker');?>

        </div>
    </div> 
        
    <div class="controls paddingTop20">    
        <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('LicenseDetails.tpl','EMAILMaker'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div> 
</div>                                                     
<div id="step2" class="padding1per" style="border:1px solid #ccc;display:none;" >
    <input type="hidden" name="installtype" value="redirect_recalculate" />
    <div class="controls">
        <div><?php echo vtranslate('LBL_INSTALL_SUCCESS','EMAILMaker');?>
</div>
        <div class="clearfix">
        </div>
    </div> 
    <br>
    <div class="controls">
        <button type="submit" id="next_button" class="btn btn-success"/><strong><?php echo vtranslate('LBL_FINISH','EMAILMaker');?>
</strong></button>&nbsp;&nbsp;
    </div>
</div>	
</form> 
</div> 
</div>
</div>
<script language="javascript" type="text/javascript">
jQuery(document).ready(function() {
    EMAILMaker_License_Js.registerInstallEvents();
});
</script>                                   

 				<?php }} ?>