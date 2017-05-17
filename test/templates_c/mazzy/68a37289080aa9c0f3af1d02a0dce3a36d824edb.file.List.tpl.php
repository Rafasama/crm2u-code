<?php /* Smarty version Smarty-3.1.7, created on 2017-05-07 22:09:19
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/MYCThemeSwitcher/List.tpl" */ ?>
<?php /*%%SmartyHeaderCode:533296787590f9b0fc59af4-45367050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68a37289080aa9c0f3af1d02a0dce3a36d824edb' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/vlayout/modules/MYCThemeSwitcher/List.tpl',
      1 => 1494194267,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '533296787590f9b0fc59af4-45367050',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'MCRYPT_ERROR' => 0,
    'AVAILABLE_LAYOUTS' => 0,
    'LAYOUT' => 0,
    'SELECTED_LAYOUTUID' => 0,
    'FORCED_LAYOUTUID' => 0,
    'USER_MODEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_590f9b0fd4a0f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590f9b0fd4a0f')) {function content_590f9b0fd4a0f($_smarty_tpl) {?>
<style>
	.themecard{
		margin: 15px;
		padding: 10px;
		border: 1px solid black;
		background-color: white;
		border-radius: 5px;
		-webkit-box-shadow: 6px 6px 15px -4px rgba(0,0,0,0.75);
		-moz-box-shadow: 6px 6px 15px -4px rgba(0,0,0,0.75);
		box-shadow: 6px 6px 15px -4px rgba(0,0,0,0.75);
		text-align: center;
		cursor: pointer;
		min-height: 460px;
		height: auto !important;
	}
	
	.mycthemeswitchercnt{
		background-color: white;
		border: 3px dashed lightgray;
		width:90%;
		margin:auto;
		margin-top:20px;
		margin-bottom:20px;
		padding-bottom:20px;
	}

	
	.themescontainer{
		width: 100%;
		padding-bottom: 20px;
	}
	
	.themescontainer .span4{
		width: 30%;
		margin-left: 3%;
	}
	@media (max-width: 800px) {
	.themescontainer .span4{
		width: 100%;
	}
}
	.themethumbs{
		width: 100%;
		height: auto;
	}
	
	.globalapplytooltip{
		padding: 5px;
	    padding-bottom: 0px;
	    padding-top: 0px;
	    border-radius: 40%;
	    background-color: rgba(0,0,0,0.3);
	    font-size: smaller;
	}
	
	.licensebox{
		background-color: #5bb75b;
		border-radius: 5px;
		padding: 5px;
		color: white !important;
	}
	
	.myclogo{
		max-width: 80px;
		height: auto;
		float: left;
		margin-right:5px;
	}
	.myctsheader{
		padding-top: 10px;    height: 80px;
	}
	.myctsheader h1{
		line-height: 40px;
	}
</style>


<div class="mycthemeswitchercnt" >
		<div class="myctsheader">
			<img class="myclogo" src="layouts/vlayout/modules/MYCThemeSwitcher/images/MYCThemeSwitcher.png">
			<h1 class="">MYC Theme Switcher</h1>
			<small><?php echo vtranslate('LBL_WELCOME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</small>
		<hr>
	</div>
			
			
			<br>
			<div class="container themescontainer">
			<?php if ($_smarty_tpl->tpl_vars['MCRYPT_ERROR']->value){?>
				<div class="alert alert-danger"><b>PHP-MCRYPT EXTENSION NOT FOUND!</b><br> The <b>php-mcrypt</b> extension is <b>not loaded</b> on this server, please setup and load it to use the MYC Theme Switcher module, after you installed and loaded correctly the php-mcrypt extension this error will disappear, you need then to disable and enable again the MYC Theme Switcher module from the Module Manager to complete the setup! </div>
			<?php }?>
			<div class="alert alert-danger" id="errormsg" style="display:none;">Error</div>
				<div class="row">
					
					<?php  $_smarty_tpl->tpl_vars['LAYOUT'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LAYOUT']->_loop = false;
 $_smarty_tpl->tpl_vars['Index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['AVAILABLE_LAYOUTS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LAYOUT']->key => $_smarty_tpl->tpl_vars['LAYOUT']->value){
$_smarty_tpl->tpl_vars['LAYOUT']->_loop = true;
 $_smarty_tpl->tpl_vars['Index']->value = $_smarty_tpl->tpl_vars['LAYOUT']->key;
?>
					<div class="span4">
					  <div class="themecard">	
						<h3><?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value['label'];?>
 <?php if ($_smarty_tpl->tpl_vars['SELECTED_LAYOUTUID']->value==$_smarty_tpl->tpl_vars['LAYOUT']->value["layoutuid"]){?>&nbsp;&nbsp;<span class="label label-success">Selected</span><?php }?><?php if ($_smarty_tpl->tpl_vars['FORCED_LAYOUTUID']->value==$_smarty_tpl->tpl_vars['LAYOUT']->value["layoutuid"]){?>&nbsp;&nbsp;<span class="label label-warning">Forced</span><?php }?></h3>
						<img src="modules/MYCThemeSwitcher/themesthumbs/<?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value['name'];?>
.jpg" class="themethumbs"><br>
						<input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value['name'];?>
-layoutuid" value="<?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value['layoutuid'];?>
">
						<?php if ($_smarty_tpl->tpl_vars['LAYOUT']->value['licensestatus']=="VALID"){?>					
						<?php if ($_smarty_tpl->tpl_vars['LAYOUT']->value["layoutuid"]!="default"){?>							
							<?php if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->isAdminUser()){?>
								<h4 class="licensebox pull-left">License Verified</h4>
								<a class="btn  btn-danger pull-right"  onclick="deActivateLicense('<?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value["name"];?>
')">Deactivate</a>
								<input type="hidden" class="input-large" id="<?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value['name'];?>
-MYCactivationKeyDeactivate" value="<?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value['productkey'];?>
">
							<?php }else{ ?>
								<h4 class="licensebox">License Verified</h4>
							<?php }?>	
						<?php }?>
						<div class="clearfix"></div>
						<br><b>Version</b>: <?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value['version'];?>
 | <b>Author</b>: <?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value['author'];?>

						<br><br>
						<?php if ($_smarty_tpl->tpl_vars['SELECTED_LAYOUTUID']->value!=$_smarty_tpl->tpl_vars['LAYOUT']->value["layoutuid"]){?>
							<?php if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->isAdminUser()){?>
								<a class="btn btn-warning pull-left" onclick="applyTheme('<?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value["name"];?>
',false)">Apply</a>
								<a class="btn btn-success  pull-right" onclick="applyTheme('<?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value["name"];?>
',true)">Apply Globally&nbsp;&nbsp;<b class="globalapplytooltip" title="This will apply the selected layout for all the Users of this CRM">?</b></a>
							<?php }else{ ?>
								<a class="btn btn-warning " onclick="applyTheme('<?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value["name"];?>
',false)">Apply</a>								<?php }?>
						<?php }else{ ?>
							<?php if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->isAdminUser()){?>
								<a class="btn btn-success " onclick="applyTheme('<?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value["name"];?>
',true)">Apply Globally&nbsp;&nbsp;<b class="globalapplytooltip" title="This will apply the selected layout for all the Users of this CRM">?</b></a>
								
							<?php }?>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->isAdminUser()){?>
						<br><br>
						<?php if ($_smarty_tpl->tpl_vars['FORCED_LAYOUTUID']->value==$_smarty_tpl->tpl_vars['LAYOUT']->value["layoutuid"]){?>
						
						<a class="btn btn-danger" onclick="removeGlobalLayoutBlock('<?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value["name"];?>
')">Remove Global Theme Block&nbsp;&nbsp;<b class="globalapplytooltip" title="This will remove the selected layout block for all the Users of this CRM">?</b></a>

						<?php }else{ ?>
						<a class="btn btn-warning" onclick="forceTheme('<?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value["name"];?>
')">Force Theme for all Users&nbsp;&nbsp;<b class="globalapplytooltip" title="This will force the selected layout for all the Users of this CRM">?</b></a>
						
						<?php }?>
						<?php }?>
						
						<div class="clearfix"></div>
						<?php }else{ ?>						
						<input type="text" class="input-large" id="<?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value['name'];?>
-MYCactivationKey" placeholder="Put here your Theme License Key"><br>
						<a class="btn btn-warning btn-large pull-center" onclick="activateLicense('<?php echo $_smarty_tpl->tpl_vars['LAYOUT']->value["name"];?>
')">Activate License</a>
						<?php }?>
						
						<br>					
					  </div>
					  <div class="clearfix"></div>
					</div>
					<?php } ?>
				</div>
			</div>
			
			
			<script>
				
				$(function(){
					$(".globalapplytooltip").tooltip();
				});
				
				function activateLicense(layoutname){
					
					var progressElement = $('.progressActivation');
					progressElement.progressIndicator();
					
					progressElement.progressIndicator({'mode':'show'});
					var params = {
						'module' : 'MYCThemeSwitcher',
						'action' : 'AjaxActions',
						'mode' : 'activateMYCSubscriptionKey',
						'myckey'	 : $("#"+layoutname+"-MYCactivationKey").val(),
						'layoutuid'	: $("#"+layoutname+"-layoutuid").val()
					}
					AppConnector.request(params).then(function(data) {
						console.log(data);
						
						if(data.result.success) window.location.reload();						
						else {							
							var errstring="";
							for(var m=0;m<data.result.messages.length;m++){
								var me=m+1;
								errstring+=me+") "+data.result.messages[m]+" <br>";
							}
							$("#errormsg").html("There was some error doing the requested operation! The following are the error details: <br>"+errstring);							
							$("#errormsg").show();
						}
						
						progressElement.progressIndicator({'mode':'hide'});
					},
					function(error,err){
						progressElement.progressIndicator({'mode':'hide'});
						console.log(error);
					});
				}
				
				function deActivateLicense(layoutname){
					
					var progressElement = $('.progressActivation');
					progressElement.progressIndicator();
					
					progressElement.progressIndicator({'mode':'show'});
					var params = {
						'module' : 'MYCThemeSwitcher',
						'action' : 'AjaxActions',
						'mode' : 'deActivateMYCSubscriptionKey',
						'myckey'	 : $("#"+layoutname+"-MYCactivationKeyDeactivate").val(),
						'layoutuid'	: $("#"+layoutname+"-layoutuid").val()
					}
					AppConnector.request(params).then(function(data) {
						console.log(data);
						
						if(data.result.success) window.location.reload();						
						else {							
							var errstring="";
							for(var m=0;m<data.result.messages.length;m++){
								var me=m+1;
								errstring+=me+") "+data.result.messages[m]+" <br>";
							}
							$("#errormsg").html("There was some error doing the requested operation! The following are the error details: <br>"+errstring);							
							$("#errormsg").show();
						}
						
						progressElement.progressIndicator({'mode':'hide'});
					},
					function(error,err){
						progressElement.progressIndicator({'mode':'hide'});
						console.log(error);
					});
				}
				
				function applyTheme(themename,applyglobally){
					
					var progressElement = $('.progressActivation');
					progressElement.progressIndicator();
					
					progressElement.progressIndicator({'mode':'show'});
					
					if(applyglobally) {
						var cr = confirm("Are you sure you want apply this layour for ALL users in this crm ?");
						if (cr == true) var ajmode="setLayoutForAllUsers";
						else return false;
					}
					else var ajmode="setLayoutForCurrentUser";
					
					var params = {
						'module' : 'MYCThemeSwitcher',
						'action' : 'AjaxActions',
						'mode' : ajmode,
						'layoutuid'	: $("#"+themename+"-layoutuid").val()
					}
					AppConnector.request(params).then(function(data) {
						console.log(data);
						
						if(data.result.success) window.location.reload();						
						else {							
							var errstring="";
							for(var m=0;m<data.result.messages.length;m++){
								var me=m+1;
								errstring+=me+") "+data.result.messages[m]+" <br>";
							}
							$("#errormsg").html("There was some error doing the requested operation! The following are the error details: <br>"+errstring);							
							$("#errormsg").show();
						}
						
						progressElement.progressIndicator({'mode':'hide'});
					},
					function(error,err){
						progressElement.progressIndicator({'mode':'hide'});
						console.log(error);
					});
				}
				
				function forceTheme(themename){
					
					var progressElement = $('.progressActivation');
					progressElement.progressIndicator();
					
					progressElement.progressIndicator({'mode':'show'});
					
					
						var cr = confirm("Are you sure you want apply this layour for ALL users in this crm ?");
						if (cr == true) var ajmode="blockLayoutGlobally";
						else return false;
					
					
					var params = {
						'module' : 'MYCThemeSwitcher',
						'action' : 'AjaxActions',
						'mode' : ajmode,
						'layoutuid'	: $("#"+themename+"-layoutuid").val()
					}
					AppConnector.request(params).then(function(data) {
						console.log(data);
						
						if(data.result.success) window.location.reload();						
						else {							
							var errstring="";
							for(var m=0;m<data.result.messages.length;m++){
								var me=m+1;
								errstring+=me+") "+data.result.messages[m]+" <br>";
							}
							$("#errormsg").html("There was some error doing the requested operation! The following are the error details: <br>"+errstring);							
							$("#errormsg").show();
						}
						
						progressElement.progressIndicator({'mode':'hide'});
					},
					function(error,err){
						progressElement.progressIndicator({'mode':'hide'});
						console.log(error);
					});
				}
				
				function removeGlobalLayoutBlock(themename){
					
					var progressElement = $('.progressActivation');
					progressElement.progressIndicator();
					
					progressElement.progressIndicator({'mode':'show'});
					
					
						var cr = confirm("Are you sure you want remove the layout block for ALL users in this crm ?");
						if (cr == true) var ajmode="removeGlobalLayoutBlock";
						else return false;
					
					
					var params = {
						'module' : 'MYCThemeSwitcher',
						'action' : 'AjaxActions',
						'mode' : ajmode,
					}
					AppConnector.request(params).then(function(data) {
						console.log(data);
						
						if(data.result.success) window.location.reload();						
						else {							
							var errstring="";
							for(var m=0;m<data.result.messages.length;m++){
								var me=m+1;
								errstring+=me+") "+data.result.messages[m]+" <br>";
							}
							$("#errormsg").html("There was some error doing the requested operation! The following are the error details: <br>"+errstring);							
							$("#errormsg").show();
						}
						
						progressElement.progressIndicator({'mode':'hide'});
					},
					function(error,err){
						progressElement.progressIndicator({'mode':'hide'});
						console.log(error);
					});
				}
				
			</script>
			
</div>
<?php }} ?>