<?php /* Smarty version Smarty-3.1.7, created on 2017-05-08 14:52:03
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/DashBoardWidgetContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114996868659108613e89b11-95824285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd27231f8750b626e3dffcfd18a4b53f8f026fcc' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/DashBoardWidgetContents.tpl',
      1 => 1494253206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114996868659108613e89b11-95824285',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'DATA' => 0,
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_59108613f1be4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59108613f1be4')) {function content_59108613f1be4($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['DATA']->value)>0){?><input class="widgetData" type=hidden value='<?php echo Vtiger_Util_Helper::toSafeHTML(ZEND_JSON::encode($_smarty_tpl->tpl_vars['DATA']->value));?>
' /><div class="widgetChartContainer" style="height:250px;width:85%"></div><?php }else{ ?><span class="noDataMsg"><?php echo vtranslate('LBL_EQ_ZERO');?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 <?php echo vtranslate('LBL_MATCHED_THIS_CRITERIA');?>
</span><?php }?><?php }} ?>