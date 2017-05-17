<?php /* Smarty version Smarty-3.1.7, created on 2017-05-08 14:52:04
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/mazzy/modules/Vtiger/dashboards/WidgetHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1999063678591086148729c8-88435323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fc0ec152a432bf38f5e5ee075eb752067deac70' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/mazzy/modules/Vtiger/dashboards/WidgetHeader.tpl',
      1 => 1494253200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1999063678591086148729c8-88435323',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'STYLES' => 0,
    'cssModel' => 0,
    'SCRIPTS' => 0,
    'jsModel' => 0,
    'WIDGET' => 0,
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5910861491627',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5910861491627')) {function content_5910861491627($_smarty_tpl) {?>

<?php  $_smarty_tpl->tpl_vars['cssModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cssModel']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['STYLES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cssModel']->key => $_smarty_tpl->tpl_vars['cssModel']->value){
$_smarty_tpl->tpl_vars['cssModel']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['cssModel']->key;
?>
	<link rel="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getRel();?>
" href="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getHref();?>
" type="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getType();?>
" media="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getMedia();?>
" />
<?php } ?>
<?php  $_smarty_tpl->tpl_vars['jsModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['jsModel']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SCRIPTS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['jsModel']->key => $_smarty_tpl->tpl_vars['jsModel']->value){
$_smarty_tpl->tpl_vars['jsModel']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['jsModel']->key;
?>
	<script type="<?php echo $_smarty_tpl->tpl_vars['jsModel']->value->getType();?>
" src="<?php echo $_smarty_tpl->tpl_vars['jsModel']->value->getSrc();?>
"></script>
<?php } ?>

<div class="row">
		<div class="row-fluid">
			<div class="span8">
				<div class="dashboardTitle textOverflowEllipsis" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['WIDGET']->value->getTitle(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
" style="width: 15em;"><b>&nbsp;&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['WIDGET']->value->getTitle(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</b></div>
			</div>
			<!--<div class="refresh span2" align="right">
				<span style="position:relative;">&nbsp;</span>
			</div>-->
			<div class="span4" align="right" style="visibility:visible !important;">
				<div class="box pull-right">
					<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/DashboardHeaderIcons.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				</div>
			</div>
		</div>
	</div>
<?php }} ?>