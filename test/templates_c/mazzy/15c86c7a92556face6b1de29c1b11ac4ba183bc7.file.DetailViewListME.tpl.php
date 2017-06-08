<?php /* Smarty version Smarty-3.1.7, created on 2017-05-22 14:58:08
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/DetailViewListME.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18307370815922fc80e61c24-13430805%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15c86c7a92556face6b1de29c1b11ac4ba183bc7' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/matriz/includes/runtime/../../layouts/vlayout/modules/EMAILMaker/DetailViewListME.tpl',
      1 => 1495464681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18307370815922fc80e61c24-13430805',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5922fc80ebf02',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5922fc80ebf02')) {function content_5922fc80ebf02($_smarty_tpl) {?>
<div class="relatedContainer">
        <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ListMEHeader.tpl','EMAILMaker'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="listViewContentDiv" id="listViewContents">
            <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ListMEContents.tpl','EMAILMaker'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

         </div>
</div><?php }} ?>