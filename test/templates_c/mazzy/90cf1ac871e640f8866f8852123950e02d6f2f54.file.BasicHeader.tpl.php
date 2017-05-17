<?php /* Smarty version Smarty-3.1.7, created on 2017-05-12 11:17:46
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/mazzy/modules/Vtiger/BasicHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1184654355591599da680bb3-69027117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90cf1ac871e640f8866f8852123950e02d6f2f54' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/mazzy/modules/Vtiger/BasicHeader.tpl',
      1 => 1494587708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1184654355591599da680bb3-69027117',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CURRENT_USER_MODEL' => 0,
    'LEFTPANELHIDE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_591599da6a4de',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591599da6a4de')) {function content_591599da6a4de($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL'] = new Smarty_variable(Users_Record_Model::getCurrentUserModel(), null, 0);?><?php $_smarty_tpl->tpl_vars['LEFTPANELHIDE'] = new Smarty_variable($_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('leftpanelhide'), null, 0);?><div class="navbar navbar-fixed-top mazzy-nav navbar-inverse noprint" style="<?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value=='1'){?> margin-right:200px;<?php }?>" ><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('MenuBar.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>