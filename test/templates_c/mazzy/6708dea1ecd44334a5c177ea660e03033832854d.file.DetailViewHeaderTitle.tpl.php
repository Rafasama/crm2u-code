<?php /* Smarty version Smarty-3.1.7, created on 2017-05-12 11:18:39
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/mazzy/modules/Contacts/DetailViewHeaderTitle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61936827659159a0f6df9e7-97049799%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6708dea1ecd44334a5c177ea660e03033832854d' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/teste/includes/runtime/../../layouts/mazzy/modules/Contacts/DetailViewHeaderTitle.tpl',
      1 => 1494587708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61936827659159a0f6df9e7-97049799',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RECORD' => 0,
    'IMAGE_DETAILS' => 0,
    'IMAGE_INFO' => 0,
    'MODULE_MODEL' => 0,
    'NAME_FIELD' => 0,
    'FIELD_MODEL' => 0,
    'COUNTER' => 0,
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_59159a0f848c7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59159a0f848c7')) {function content_59159a0f848c7($_smarty_tpl) {?>
<span class=" span4"><div class="imageContainer" style="width:90px; margin-left:5px"><?php $_smarty_tpl->tpl_vars['IMAGE_DETAILS'] = new Smarty_variable($_smarty_tpl->tpl_vars['RECORD']->value->getImageDetails(), null, 0);?><?php  $_smarty_tpl->tpl_vars['IMAGE_INFO'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['IMAGE_INFO']->_loop = false;
 $_smarty_tpl->tpl_vars['ITER'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['IMAGE_INFO']->key => $_smarty_tpl->tpl_vars['IMAGE_INFO']->value){
$_smarty_tpl->tpl_vars['IMAGE_INFO']->_loop = true;
 $_smarty_tpl->tpl_vars['ITER']->value = $_smarty_tpl->tpl_vars['IMAGE_INFO']->key;
?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
<?php $_tmp1=ob_get_clean();?><?php if (!empty($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['path'])&&!empty($_tmp1)){?><img src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['path'];?>
_<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" style="width:90px;height:90px"><?php }else{ ?><img src="layouts/mazzy/skins/images/DefaultUserIcon.png" style="width:90px;height:90px"><?php }?><?php } ?><?php if (empty($_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value)){?><img src="layouts/mazzy/skins/images/DefaultUserIcon.png" style="width:90px;height:90px"><?php }?></div></span><span class="span7"><span class="row-fluid"><h4 class="recordLabel" title="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('salutationtype');?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getName();?>
"><?php if ($_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('salutationtype')){?><span class="salutation"><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('salutationtype');?>
</span>&nbsp;<?php }?><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable(0, null, 0);?><?php  $_smarty_tpl->tpl_vars['NAME_FIELD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getNameFields(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['NAME_FIELD']->key => $_smarty_tpl->tpl_vars['NAME_FIELD']->value){
$_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['FIELD_MODEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getField($_smarty_tpl->tpl_vars['NAME_FIELD']->value), null, 0);?><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getPermissions()){?><span class="<?php echo $_smarty_tpl->tpl_vars['NAME_FIELD']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->get($_smarty_tpl->tpl_vars['NAME_FIELD']->value);?>
</span><?php if ($_smarty_tpl->tpl_vars['COUNTER']->value==0&&($_smarty_tpl->tpl_vars['RECORD']->value->get($_smarty_tpl->tpl_vars['NAME_FIELD']->value))){?><br/><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable($_smarty_tpl->tpl_vars['COUNTER']->value+1, null, 0);?><?php }?><?php }?><?php } ?></h4></span><span class="row-fluid"><span class="title_label"><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('title');?>
<?php if ($_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('account_id')&&$_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('title')){?>&nbsp;<?php echo vtranslate('LBL_AT');?>
&nbsp;<?php }?><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('account_id');?>
</span><br><a style="margin-left:5px" onclick="mycShowMap()" class="btn"><i class="fa fa-globe fa-lg"></i> Show Map</a></span></span><div class="myc-map-modal" style="display:none"><a href="" target="_blank" class="btn btn-mazzy myc-map-directions" style="margin-top:10px;margin-bottom:10px;"><i class="fa fa-globe"></i> Get Directions</a><a onclick="$('.myc-map-modal').hide()" class="btn btn-mazzy" style="margin-top:10px;margin-bottom:10px;"><i class="fa fa-times"></i> Close</a><br><div id="myc-map" style="height:75%;width:90%"></div><br><a href="" target="_blank" class="btn btn-mazzy myc-map-directions" style="margin-top:10px;margin-bottom:10px;"><i class="fa fa-globe"></i> Get Directions</a><a onclick="$('.myc-map-modal').hide()" class="btn btn-mazzy" ><i class="fa fa-times"></i> Close</a></div><script>var mapviewurl="index.php?module=Google&action=MapAjax&mode=getLocation";var record="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
";var module="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
";mapviewurl+='&recordid='+record+'&source_module='+module;jQuery.ajax({url:mapviewurl}).done(function(res){var result=JSON.parse(res);var address=result["address"];google.maps.event.addDomListener(window, 'load', initialize(address));});</script><script type="text/javascript">var geocoder;var map;function initialize(mapaddress) {geocoder = new google.maps.Geocoder();var mapOptions = {zoom: 13};map = new google.maps.Map(document.getElementById('myc-map'),mapOptions);setAddress(mapaddress,map);var styles = [{"featureType": "water","stylers": [{"color": "#19a0d8"}]},{"featureType": "administrative","elementType": "labels.text.stroke","stylers": [{"color": "#ffffff"},{"weight": 6}]},{"featureType": "administrative","elementType": "labels.text.fill","stylers": [{"color": "#e85113"}]},{"featureType": "road.highway","elementType": "geometry.stroke","stylers": [{"color": "#efe9e4"},{"lightness": -40}]},{"featureType": "road.arterial","elementType": "geometry.stroke","stylers": [{"color": "#efe9e4"},{"lightness": -20}]},{"featureType": "road","elementType": "labels.text.stroke","stylers": [{"lightness": 100}]},{"featureType": "road","elementType": "labels.text.fill","stylers": [{"lightness": -100}]},{"featureType": "road.highway","elementType": "labels.icon"},{"featureType": "landscape","elementType": "labels","stylers": [{"visibility": "off"}]},{"featureType": "landscape","stylers": [{"lightness": 20},{"color": "#efe9e4"}]},{"featureType": "landscape.man_made","stylers": [{"visibility": "off"}]},{"featureType": "water","elementType": "labels.text.stroke","stylers": [{"lightness": 100}]},{"featureType": "water","elementType": "labels.text.fill","stylers": [{"lightness": -100}]},{"featureType": "poi","elementType": "labels.text.fill","stylers": [{"hue": "#11ff00"}]},{"featureType": "poi","elementType": "labels.text.stroke","stylers": [{"lightness": 100}]},{"featureType": "poi","elementType": "labels.icon","stylers": [{"hue": "#4cff00"},{"saturation": 58}]},{"featureType": "poi","elementType": "geometry","stylers": [{"visibility": "on"},{"color": "#f0e4d3"}]},{"featureType": "road.highway","elementType": "geometry.fill","stylers": [{"color": "#efe9e4"},{"lightness": -25}]},{"featureType": "road.arterial","elementType": "geometry.fill","stylers": [{"color": "#efe9e4"},{"lightness": -10}]},{"featureType": "poi","elementType": "labels","stylers": [{"visibility": "simplified"}]}];map.setOptions( { styles: styles } );}var markerPos;function mycShowMap(){var currCenter = map.getCenter();$('.myc-map-modal').show();google.maps.event.trigger($("#myc-map")[0], 'resize');map.setCenter(currCenter);}function setAddress(address,mapobj) {geocoder.geocode( { 'address': address}, function(results, status) {if (status == google.maps.GeocoderStatus.OK) {mapobj.setCenter(results[0].geometry.location);$(".myc-map-directions").attr("href","https://maps.google.com?daddr="+address).show();markerPos = results[0].geometry.location;var contentString = '<div id="content">'+'<div id="siteNotice">'+'</div>'+'<h4 id="firstHeading" class="firstHeading">'+address+'</h4>';var infowindow = new google.maps.InfoWindow({content: contentString});<?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value=="Accounts"){?>var image = 'layouts/mazzy/skins/images/summary_organizations_marker.png';<?php }?><?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value=="Contacts"){?>var image = 'layouts/mazzy/skins/images/DefaultUserIcon_marker.png';<?php }?>var marker = new google.maps.Marker({map: mapobj,icon: image,position: results[0].geometry.location,});google.maps.event.addListener(marker, 'click', function() {infowindow.open(mapobj,marker);});} else {$(".myc-map").html("Address not found..."+address);}});}</script><?php }} ?>