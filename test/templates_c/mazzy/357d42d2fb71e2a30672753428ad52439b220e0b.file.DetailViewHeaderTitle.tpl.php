<?php /* Smarty version Smarty-3.1.7, created on 2017-05-12 12:37:46
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/mazzy/modules/Accounts/DetailViewHeaderTitle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1222071505915ac9aef4a18-60982436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '357d42d2fb71e2a30672753428ad52439b220e0b' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/mazzy/modules/Accounts/DetailViewHeaderTitle.tpl',
      1 => 1494587708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1222071505915ac9aef4a18-60982436',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_MODEL' => 0,
    'moduleName' => 0,
    'RECORD' => 0,
    'NAME_FIELD' => 0,
    'FIELD_MODEL' => 0,
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5915ac9b12888',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5915ac9b12888')) {function content_5915ac9b12888($_smarty_tpl) {?>
<span class="span1"><?php $_smarty_tpl->tpl_vars['moduleName'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getName(), null, 0);?><?php if (vimage_path(($_smarty_tpl->tpl_vars['moduleName']->value).('_big.png'))!=false){?><img  class="mazzyiconimg alignMiddle" src="<?php echo vimage_path(($_smarty_tpl->tpl_vars['moduleName']->value).('_big.png'));?>
" alt="<?php echo vtranslate($_smarty_tpl->tpl_vars['moduleName']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['moduleName']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
"/><?php }elseif(vimage_path(($_smarty_tpl->tpl_vars['moduleName']->value).('.png'))!=false){?><img  class="mazzyiconimg alignMiddle" src="<?php echo vimage_path(($_smarty_tpl->tpl_vars['moduleName']->value).('.png'));?>
" alt="<?php echo vtranslate($_smarty_tpl->tpl_vars['moduleName']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['moduleName']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
"/><?php }else{ ?><img  class="mazzyiconimg alignMiddle" src="<?php echo vimage_path('DefaultModule.png');?>
" alt="<?php echo vtranslate($_smarty_tpl->tpl_vars['moduleName']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['moduleName']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
"/><?php }?></span><span class="span8"><span class="row-fluid"><span class="recordLabel font-x-x-large span8" title="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getName();?>
"><?php  $_smarty_tpl->tpl_vars['NAME_FIELD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getNameFields(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['NAME_FIELD']->key => $_smarty_tpl->tpl_vars['NAME_FIELD']->value){
$_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['FIELD_MODEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getField($_smarty_tpl->tpl_vars['NAME_FIELD']->value), null, 0);?><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getPermissions()){?><span class="<?php echo $_smarty_tpl->tpl_vars['NAME_FIELD']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->get($_smarty_tpl->tpl_vars['NAME_FIELD']->value);?>
</span><?php }?><?php } ?></span><span class=" span8"><a onclick="mycShowMap()" class="btn"><i class="fa fa-globe fa-lg"></i> Show Map</a></span></span></span><div class="myc-map-modal" style="display:none"><a onclick="$('.myc-map-modal').hide()" class="btn btn-mazzy" style="margin-top:10px;margin-bottom:10px;"><i class="fa fa-times"></i> Close</a><a href="" target="_blank" class="btn btn-mazzy myc-map-directions" style="margin-top:10px;margin-bottom:10px;"><i class="fa fa-globe"></i> Get Directions</a><br><div id="myc-map" style="height:75%;width:90%"></div><br><a onclick="$('.myc-map-modal').hide()" class="btn btn-mazzy" ><i class="fa fa-times"></i> Close</a></div><script>var mapviewurl="index.php?module=Google&action=MapAjax&mode=getLocation";var record="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
";var module="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
";mapviewurl+='&recordid='+record+'&source_module='+module;jQuery.ajax({url:mapviewurl}).done(function(res){var result=JSON.parse(res);var address=result["address"];google.maps.event.addDomListener(window, 'load', initialize(address));});</script><script type="text/javascript">var geocoder;var map;function initialize(mapaddress) {geocoder = new google.maps.Geocoder();var mapOptions = {zoom: 10};map = new google.maps.Map(document.getElementById('myc-map'),mapOptions);setAddress(mapaddress,map);var styles = [{"featureType": "water","stylers": [{"color": "#19a0d8"}]},{"featureType": "administrative","elementType": "labels.text.stroke","stylers": [{"color": "#ffffff"},{"weight": 6}]},{"featureType": "administrative","elementType": "labels.text.fill","stylers": [{"color": "#e85113"}]},{"featureType": "road.highway","elementType": "geometry.stroke","stylers": [{"color": "#efe9e4"},{"lightness": -40}]},{"featureType": "road.arterial","elementType": "geometry.stroke","stylers": [{"color": "#efe9e4"},{"lightness": -20}]},{"featureType": "road","elementType": "labels.text.stroke","stylers": [{"lightness": 100}]},{"featureType": "road","elementType": "labels.text.fill","stylers": [{"lightness": -100}]},{"featureType": "road.highway","elementType": "labels.icon"},{"featureType": "landscape","elementType": "labels","stylers": [{"visibility": "off"}]},{"featureType": "landscape","stylers": [{"lightness": 20},{"color": "#efe9e4"}]},{"featureType": "landscape.man_made","stylers": [{"visibility": "off"}]},{"featureType": "water","elementType": "labels.text.stroke","stylers": [{"lightness": 100}]},{"featureType": "water","elementType": "labels.text.fill","stylers": [{"lightness": -100}]},{"featureType": "poi","elementType": "labels.text.fill","stylers": [{"hue": "#11ff00"}]},{"featureType": "poi","elementType": "labels.text.stroke","stylers": [{"lightness": 100}]},{"featureType": "poi","elementType": "labels.icon","stylers": [{"hue": "#4cff00"},{"saturation": 58}]},{"featureType": "poi","elementType": "geometry","stylers": [{"visibility": "on"},{"color": "#f0e4d3"}]},{"featureType": "road.highway","elementType": "geometry.fill","stylers": [{"color": "#efe9e4"},{"lightness": -25}]},{"featureType": "road.arterial","elementType": "geometry.fill","stylers": [{"color": "#efe9e4"},{"lightness": -10}]},{"featureType": "poi","elementType": "labels","stylers": [{"visibility": "simplified"}]}];map.setOptions( { styles: styles } );}function mycShowMap(){var currCenter = map.getCenter();$('.myc-map-modal').show();google.maps.event.trigger($("#myc-map")[0], 'resize');map.setCenter(currCenter);}function setAddress(address,mapobj) {geocoder.geocode( { 'address': address}, function(results, status) {if (status == google.maps.GeocoderStatus.OK) {mapobj.setCenter(results[0].geometry.location);$(".myc-map-directions").attr("href","https://maps.google.com?daddr="+address).show();var contentString = '<div id="content">'+'<div id="siteNotice">'+'</div>'+'<h4 id="firstHeading" class="firstHeading">'+address+'</h4>';var infowindow = new google.maps.InfoWindow({content: contentString});<?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value=="Accounts"){?>var image = 'layouts/mazzy/skins/images/summary_organizations_marker.png';<?php }?><?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value=="Contacts"){?>var image = 'layouts/mazzy/skins/images/DefaultUserIcon_marker.png';<?php }?>var marker = new google.maps.Marker({map: mapobj,icon: image,position: results[0].geometry.location,});google.maps.event.addListener(marker, 'click', function() {infowindow.open(mapobj,marker);});} else {$(".myc-map").html("Address not found..."+address);}});}</script><?php }} ?>