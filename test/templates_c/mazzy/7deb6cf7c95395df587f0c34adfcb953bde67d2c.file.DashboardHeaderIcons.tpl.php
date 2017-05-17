<?php /* Smarty version Smarty-3.1.7, created on 2017-05-07 22:09:40
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/mazzy/modules/Vtiger/dashboards/DashboardHeaderIcons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:330237158590f9b248e9742-34484175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7deb6cf7c95395df587f0c34adfcb953bde67d2c' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/mazzy/modules/Vtiger/dashboards/DashboardHeaderIcons.tpl',
      1 => 1494194836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '330237158590f9b248e9742-34484175',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SETTING_EXIST' => 0,
    'WIDGET' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_590f9b2492381',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590f9b2492381')) {function content_590f9b2492381($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['SETTING_EXIST']->value){?>
<a name="dfilter" class="btn btn-cyan btn-xs">
	<i class='fa fa-cog' border='0' align="absmiddle" title="<?php echo vtranslate('LBL_FILTER');?>
" alt="<?php echo vtranslate('LBL_FILTER');?>
"/>
</a>
<?php }?>
<a class="btn btn-peas btn-xs" href="javascript:void(0);" name="drefresh" data-url="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getUrl();?>
&linkid=<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->get('linkid');?>
&content=data">
	<i class="fa fa-refresh" hspace="2" border="0" align="absmiddle" title="<?php echo vtranslate('LBL_REFRESH');?>
" alt="<?php echo vtranslate('LBL_REFRESH');?>
"></i>
</a>
<?php if (!$_smarty_tpl->tpl_vars['WIDGET']->value->isDefault()){?>
	<a class="btn btn-red btn-xs" name="dclose" class="widget" data-url="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getDeleteUrl();?>
">
		<i class="fa fa-remove" hspace="2" border="0" align="absmiddle" title="<?php echo vtranslate('LBL_REMOVE');?>
" alt="<?php echo vtranslate('LBL_REMOVE');?>
"></i>
	</a>
<?php }?><?php }} ?>