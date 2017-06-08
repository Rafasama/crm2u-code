<?php /* Smarty version Smarty-3.1.7, created on 2017-05-22 14:58:08
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/ListMEHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6807230355922fc80ee0277-16290784%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e53cc51729d53424ec198d1b01931bd4e16a2e1' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/ListMEHeader.tpl',
      1 => 1495464681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6807230355922fc80ee0277-16290784',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'EDIT' => 0,
    'IS_DELAY_ACTIVE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5922fc80f1eb4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5922fc80f1eb4')) {function content_5922fc80f1eb4($_smarty_tpl) {?>
<div class="listViewTopMenuDiv">
    <div class="listViewActionsDiv row-fluid">
        <span class="btn-toolbar span8">
            <?php if ($_smarty_tpl->tpl_vars['EDIT']->value=='permitted'){?>
                <?php if ($_smarty_tpl->tpl_vars['IS_DELAY_ACTIVE']->value!="1"){?>
                    <span class="redColor "><?php echo vtranslate("LBL_WORKFLOW_NOTE_CRON_CONFIG","EMAILMaker");?>
</span><br>
                        <a href="https://wiki.vtiger.com/index.php/Cron" class="btn" target="_new" style="margin-top:10px;"><?php echo vtranslate("LBL_SETUP_CRON_JOB_INSTRUCTIONS","EMAILMaker");?>
</a>
                <?php }else{ ?>    
                    <span class="btn-group"><button class="btn addButton createEmailCampaign" type="button"><i class="icon-plus icon-white"></i>&nbsp;<strong><?php echo vtranslate("LBL_NEW_EMAIL_CAMPAIGN","EMAILMaker");?>
</strong></button></span>
                <?php }?>
            <?php }?>
        </span>
        <span class="span4 btn-toolbar">
                <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ListMEActions.tpl','EMAILMaker'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </span>
    </div>
</div><?php }} ?>