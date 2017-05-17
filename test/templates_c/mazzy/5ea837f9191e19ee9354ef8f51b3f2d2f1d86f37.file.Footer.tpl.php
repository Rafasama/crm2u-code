<?php /* Smarty version Smarty-3.1.7, created on 2017-05-07 22:09:19
         compiled from "/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/mazzy/modules/Vtiger/Footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1799364585590f9b0fd8bfe8-40416697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ea837f9191e19ee9354ef8f51b3f2d2f1d86f37' => 
    array (
      0 => '/home/rz2ac608/public_html/crm2u.com.br/poc/includes/runtime/../../layouts/mazzy/modules/Vtiger/Footer.tpl',
      1 => 1494194836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1799364585590f9b0fd8bfe8-40416697',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTIVITY_REMINDER' => 0,
    'HEADER_LINKS' => 0,
    'MAIN_PRODUCT_SUPPORT' => 0,
    'MAIN_PRODUCT_WHITELABEL' => 0,
    'FIRSTHEADERLINK' => 0,
    'FIRSTHEADERLINKCHILDRENS' => 0,
    'FEEDBACKLINKMODEL' => 0,
    'CURRENT_USER_MODEL' => 0,
    'VTIGER_VERSION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_590f9b0fddeb2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590f9b0fddeb2')) {function content_590f9b0fddeb2($_smarty_tpl) {?>
<input id='activityReminder' class='hide noprint' type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ACTIVITY_REMINDER']->value;?>
"/><?php if ($_smarty_tpl->tpl_vars['HEADER_LINKS']->value&&$_smarty_tpl->tpl_vars['MAIN_PRODUCT_SUPPORT']->value&&!$_smarty_tpl->tpl_vars['MAIN_PRODUCT_WHITELABEL']->value){?><?php $_smarty_tpl->tpl_vars["FIRSTHEADERLINK"] = new Smarty_variable($_smarty_tpl->tpl_vars['HEADER_LINKS']->value[0], null, 0);?><?php $_smarty_tpl->tpl_vars["FIRSTHEADERLINKCHILDRENS"] = new Smarty_variable($_smarty_tpl->tpl_vars['FIRSTHEADERLINK']->value->get('childlinks'), null, 0);?><?php $_smarty_tpl->tpl_vars["FEEDBACKLINKMODEL"] = new Smarty_variable($_smarty_tpl->tpl_vars['FIRSTHEADERLINKCHILDRENS']->value[2], null, 0);?><div id="userfeedback" class="feedback noprint"><a href="https://discussions.vtiger.com" target="_blank" xonclick="<?php echo $_smarty_tpl->tpl_vars['FEEDBACKLINKMODEL']->value->get('linkurl');?>
" class="handle"><?php echo vtranslate("LBL_FEEDBACK","Vtiger");?>
</a></div><?php }?><?php if (!$_smarty_tpl->tpl_vars['MAIN_PRODUCT_WHITELABEL']->value&&isset($_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value)){?><footer class="noprint"><div class="vtFooter"><p><?php echo vtranslate('POWEREDBY');?>
 <?php echo $_smarty_tpl->tpl_vars['VTIGER_VERSION']->value;?>
 &nbsp;&copy; 2004 - <?php echo date('Y');?>
&nbsp&nbsp;<a href="//www.vtiger.com" target="_blank">vtiger.com</a>&nbsp;|&nbsp;<a href="#" onclick="window.open('../copyright.html','copyright', 'height=115,width=575').moveTo(210,620)"><?php echo vtranslate('LBL_READ_LICENSE');?>
</a>&nbsp;|&nbsp;<a href="https://www.vtiger.com/crm/privacy-policy" target="_blank"><?php echo vtranslate('LBL_PRIVACY_POLICY');?>
</a></p></div></footer><?php }?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('JSResources.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><div id="mazzyMobileModal" class="modal hide fade" style="top:40%;width: 300px; z-index:99999999999;" tabindex="-1" role="dialog" aria-labelledby="mazzyMobileModalLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="mazzyMobileModalLabel">Switch to <b>Mobile Optimized</b> version</h3></div><div class=" modal-body"><div class="progressSwithing"></div><p class="mazzyModalBody">This theme comes with 2 different version, one optimized for <b>desktop and tablets</b> with big resolutions, and the other one optimized for tablet, <b>smartphones and other devices with small screen</b>.</p></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true" onclick="setCookie('mobileswitch', 'declined', 0); return true;">Cancel</button><a class="btn btn-red" onclick="switchTheme('mobile');">Switch to Mobile Theme</a></div></div></body>
	<script>
		$(function(){
			
			
			function getColTotals(){	
				
				var tfoot="";
				var cnt=1;
				var colids = new Array();
				$("b.listsum").remove();
				$(".listViewEntriesTable > tfoot").remove();
				
				$(".listViewEntriesTable > tbody > tr.listViewEntries:first > td").each(function(item,i) {
				    
				    var fieldtype=$(this).attr("data-field-type");			    
				    tfoot+="<th class='medium'>";
				    if(fieldtype=="double" || fieldtype=="currency"){ colids.push(cnt); tfoot+="<b style='font-size:15px;' class='listsum' col-id='"+cnt+"'>ss</b>"; }
				    tfoot+="</th>";
				    cnt+=1;
				});
				
				$(".listViewEntriesTable").append('<tfoot><tr class="listViewHeaders">'+tfoot+'</tr></tfoot>');
				
				
				var tcount=new Array();
				for (ct = 0; ct < colids.length; ct++) tcount[ct]=0;
				
				$(".listViewEntries").each(function (item,i){
					for (ct = 0; ct < colids.length; ct++) { 
					    var cc = $(this).children("td:nth-child("+colids[ct]+")");
					    var value=cc.text().replace(/[^0-9.,]*/g, '').replace(/,([^,]*)$/, '.$1').replace(/(\d+).(?=\d{3}(\D|$))/g, "$1").replace(/(\d+),(?=\d{3}(\D|$))/g, "$1");

					    
					    console.log(value);
					    numValf = parseFloat(value);
					    if(cc.html().indexOf('style="color:#FF0000;"') > -1)  
					    	tcount[ct]-=  numValf;
					    else tcount[ct]+=  numValf;
					}					
				});
				
				var zx=0;		
						
				$("b.listsum").each(function(item,i) {								
					$(this).html(tcount[zx].toFixed(2));
					zx+=1;
				});
				
				
				
			}	
			
			getColTotals();
			
			$(document).ajaxComplete(function(event,xhr,settings){			  
			  if(settings.container=="#pjaxContainer") getColTotals();
			});
			
			
			
			
		});
	</script>
	
	</html>
<?php }} ?>