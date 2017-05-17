<?php /* Smarty version Smarty-3.1.7, created on 2017-04-21 19:17:05
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/referencia/includes/runtime/../../layouts/vlayout/modules/Install/InstallPreProcess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20966385258fa4ca1c1dea4-27359521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9eb5aefe6cf510fd4e4440e5ba903ab63998a28' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/referencia/includes/runtime/../../layouts/vlayout/modules/Install/InstallPreProcess.tpl',
      1 => 1492794473,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20966385258fa4ca1c1dea4-27359521',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_58fa4ca1c3e22',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa4ca1c3e22')) {function content_58fa4ca1c3e22($_smarty_tpl) {?>
<input type="hidden" id="module" value="Install" />
<input type="hidden" id="view" value="Index" />
<div class="container-fluid page-container">
	<div class="row-fluid">
		<div class="span6">
			<div class="logo">
				<img src="<?php echo vimage_path('logo.png');?>
"/>
			</div>
		</div>
		<div class="span6">
			<div class="head pull-right">
				<h3><?php echo vtranslate('LBL_INSTALLATION_WIZARD','Install');?>
</h3>
			</div>
		</div>
	</div>
<?php }} ?>