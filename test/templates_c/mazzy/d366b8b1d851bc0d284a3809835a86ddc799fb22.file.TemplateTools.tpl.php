<?php /* Smarty version Smarty-3.1.7, created on 2017-05-22 14:52:01
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/TemplateTools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10535845305922fb11121265-92612297%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd366b8b1d851bc0d284a3809835a86ddc799fb22' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/TemplateTools.tpl',
      1 => 1495464681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10535845305922fb11121265-92612297',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ALLOW_SET_AS' => 0,
    'IS_ACTIVE' => 0,
    'TEMPLATEID' => 0,
    'DEFAULT_BUTTON' => 0,
    'ACTIVATE_BUTTON' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5922fb111bfb1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5922fb111bfb1')) {function content_5922fb111bfb1($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['ALLOW_SET_AS']->value=='yes'){?>
    <div class="recordNamesList">
        <div class="row-fluid">
            <div class="span10">
                <ul class="nav nav-list">
                    <?php if ($_smarty_tpl->tpl_vars['ALLOW_SET_AS']->value=='yes'){?>
                    <?php if ($_smarty_tpl->tpl_vars['IS_ACTIVE']->value!=vtranslate('Inactive','EMAILMaker')){?>
                    <li><a href="javascript:void(0);" onClick="EMAILMaker_Detail_Js.changeActiveOrDefault('<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
','default');"><?php echo $_smarty_tpl->tpl_vars['DEFAULT_BUTTON']->value;?>
</a></li>
                    <?php }?>
                    <li><a href="javascript:void(0);" onClick="EMAILMaker_Detail_Js.changeActiveOrDefault('<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
','active');"><?php echo $_smarty_tpl->tpl_vars['ACTIVATE_BUTTON']->value;?>
</a></li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
<?php }?><?php }} ?>