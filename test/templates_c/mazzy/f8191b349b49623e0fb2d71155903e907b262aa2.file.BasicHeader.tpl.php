<?php /* Smarty version Smarty-3.1.7, created on 2017-05-07 22:09:19
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/mazzy/modules/Vtiger/BasicHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1955181498590f9b0f992bd9-49302072%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8191b349b49623e0fb2d71155903e907b262aa2' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/mazzy/modules/Vtiger/BasicHeader.tpl',
      1 => 1494194836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1955181498590f9b0f992bd9-49302072',
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
  'unifunc' => 'content_590f9b0f9afa3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590f9b0f9afa3')) {function content_590f9b0f9afa3($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL'] = new Smarty_variable(Users_Record_Model::getCurrentUserModel(), null, 0);?><?php $_smarty_tpl->tpl_vars['LEFTPANELHIDE'] = new Smarty_variable($_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('leftpanelhide'), null, 0);?><div class="navbar navbar-fixed-top mazzy-nav navbar-inverse noprint" style="<?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value=='1'){?> margin-right:200px;<?php }?>" ><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('MenuBar.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>