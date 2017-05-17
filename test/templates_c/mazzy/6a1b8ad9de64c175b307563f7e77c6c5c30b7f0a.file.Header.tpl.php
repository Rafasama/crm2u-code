<?php /* Smarty version Smarty-3.1.7, created on 2017-05-12 11:17:45
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/mazzy/modules/Vtiger/Header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1896280342591599d9c1f140-92936267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a1b8ad9de64c175b307563f7e77c6c5c30b7f0a' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/mazzy/modules/Vtiger/Header.tpl',
      1 => 1494587708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1896280342591599d9c1f140-92936267',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PAGETITLE' => 0,
    'MODULE_NAME' => 0,
    'STYLES' => 0,
    'cssModel' => 0,
    'SKIN_PATH' => 0,
    'LANGUAGE' => 0,
    'COMPANY_LOGO' => 0,
    'LANGUAGE_STRINGS' => 0,
    'CURRENT_USER_MODEL' => 0,
    'MODULE' => 0,
    'LEFTPANELHIDE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_591599d9d034a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591599d9d034a')) {function content_591599d9d034a($_smarty_tpl) {?>
<!DOCTYPE html><html><head><title><?php echo vtranslate($_smarty_tpl->tpl_vars['PAGETITLE']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</title><link REL="SHORTCUT ICON" HREF="layouts/vlayout/skins/images/favicon.ico"><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0," /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta name="apple-mobile-web-app-capable" content="yes" /><link rel="stylesheet" href="libraries/jquery/chosen/chosen.css" type="text/css" media="screen" /><link rel="stylesheet" href="libraries/jquery/jquery-ui/css/custom-theme/jquery-ui-1.8.16.custom.css" type="text/css" media="screen" /><link rel="stylesheet" href="libraries/jquery/select2/select2.css" type="text/css" media="screen" /><link rel="stylesheet" href="libraries/bootstrap/css/bootstrap.css" type="text/css" media="screen" /><link rel="stylesheet" href="libraries/bootstrap/css/jqueryBxslider.css" type="text/css" media="screen" /><link rel="stylesheet" href="resources/styles.css" type="text/css" media="screen" /><link rel="stylesheet" href="libraries/jquery/posabsolute-jQuery-Validation-Engine/css/validationEngine.jquery.css" /><link rel="stylesheet" href="libraries/jquery/select2/select2.css" /><link rel="stylesheet" href="libraries/guidersjs/guiders-1.2.6.css"/><link rel="stylesheet" href="libraries/jquery/pnotify/jquery.pnotify.default.css"/><link rel="stylesheet" href="libraries/jquery/pnotify/use for pines style icons/jquery.pnotify.default.icons.css"/><link rel="stylesheet" media="screen" type="text/css" href="libraries/jquery/datepicker/css/datepicker.css" /><?php  $_smarty_tpl->tpl_vars['cssModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cssModel']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['STYLES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cssModel']->key => $_smarty_tpl->tpl_vars['cssModel']->value){
$_smarty_tpl->tpl_vars['cssModel']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['cssModel']->key;
?><link rel="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getRel();?>
" href="<?php echo vresource_url($_smarty_tpl->tpl_vars['cssModel']->value->getHref());?>
" type="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getType();?>
" media="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getMedia();?>
" /><?php } ?><link rel="stylesheet" href="layouts/mazzy/skins/mycstyle.css"/><style type="text/css">@media print {.noprint { display:none; }.mycloaderbg { display:none; }}</style><script type="text/javascript" src="libraries/jquery/jquery.min.js"></script><!--[if IE]><script type="text/javascript" src="libraries/html5shim/html5.js"></script><script type="text/javascript" src="libraries/html5shim/respond.js"></script><![endif]--><script type="text/javascript" src="https://www.google.com/jsapi"></script><link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"><script type="text/javascript" src="layouts/mazzy/modules/Vtiger/resources/Mazzy.js"></script><link href="layouts/mazzy/modules/Vtiger/resources/responsive-tables/responsive-tables.css" rel="stylesheet"><script type="text/javascript" src="layouts/mazzy/modules/Vtiger/resources/responsive-tables/responsive-tables.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.min.css"><script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.min.js" type="text/javascript"></script><script type="text/javascript">$(function(){if($.browser.mozilla){$(window).load(function(){$("#mazzy-sidebar-left, #mazzy-sidebar-right").mCustomScrollbar({scrollbarPosition: "outside",});$(".mCSB_outside + .mCSB_scrollTools").attr("style","right:-8px;");});}});</script><script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCT3UxU2Fi-q0QozSrAbcdhwY5e42ZqqY0"></script></head><body data-skinpath="<?php echo $_smarty_tpl->tpl_vars['SKIN_PATH']->value;?>
" data-language="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
"><div class="mycloaderbg"><div class="mycloadingcontent" style="margin-top:10%; text-align:center"><?php if (isset($_smarty_tpl->tpl_vars['COMPANY_LOGO']->value)){?><img src="<?php echo $_smarty_tpl->tpl_vars['COMPANY_LOGO']->value->get('imagepath');?>
" title="<?php echo $_smarty_tpl->tpl_vars['COMPANY_LOGO']->value->get('title');?>
" alt="<?php echo $_smarty_tpl->tpl_vars['COMPANY_LOGO']->value->get('alt');?>
" style="max-width:50%" /><?php }else{ ?><h2>Loading...</h2><?php }?><br><i class="fa fa-spin fa-star"></i></div></div><div id="js_strings" class="hide noprint"><?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['LANGUAGE_STRINGS']->value);?>
</div><?php $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL'] = new Smarty_variable(Users_Record_Model::getCurrentUserModel(), null, 0);?><input type="hidden" id="start_day" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('dayoftheweek');?>
" /><input type="hidden" id="row_type" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('rowheight');?>
" /><input type="hidden" id="current_user_id" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('id');?>
" /><?php if ($_smarty_tpl->tpl_vars['MODULE']->value!=''){?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('MazzySideBarLeft.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['MODULE']->value!=''){?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('MazzySideBarRight.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?><?php $_smarty_tpl->tpl_vars['LEFTPANELHIDE'] = new Smarty_variable($_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('leftpanelhide'), null, 0);?><div id="page" style="<?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value=='0'){?>margin-right: 0px;<?php }else{ ?>margin-right:200px;<?php }?>"><!-- container which holds data temporarly for pjax calls --><div id="pjaxContainer" class="hide noprint"></div>
<?php }} ?>