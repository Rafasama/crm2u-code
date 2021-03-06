<?php
/* * *******************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class EMAILMaker_IndexAjax_Action extends Vtiger_Action_Controller {

    function __construct(){
        parent::__construct();

        $Methods = array('checkDuplicateKey','SaveCustomLabel','SaveCustomLabelValues','DeleteCustomLabels','SaveProductBlock',
            'deleteProductBlocks','DeleteTheme','DeleteTemplate','updateLinkForModule','controlEmails','sendEmail','getDocuments',
            'getFiltersForModule','getEmailTemplatesForModule','getEmailTemplatePreview','DeleteME','installExtension','stopSendingEmails',
            'SaveEMAILImages','SaveProfilesPrivilegies','ChangeActiveOrDefault','SearchEmails','getModuleFields','sendExampleMEmail');
        
        foreach ($Methods AS $method){
            $this->exposeMethod($method);
        }
    }
    
    function validateRequest(Vtiger_Request $request) {
		
        if ($request->has('debug') && !$request->isEmpty('debug')) {
            return true;
        } else {
            return $request->validateReadAccess();
        }
    }
    
    function checkPermission(Vtiger_Request $request){ 
        return true;
    }
    function preProcess(Vtiger_Request $request){
        return true;
    }
    function postProcess(Vtiger_Request $request){
        return true;
    }    
    function process(Vtiger_Request $request){
        $mode = $request->get('mode');
        if(!empty($mode)) {
                $this->invokeExposedMethod($mode, $request);
                return;
        }
        $type = $request->get('type');
    }    
    public function checkDuplicateKey(Vtiger_Request $request){
        $adb = PearDatabase::getInstance();
        $lblkey = $request->get('lblkey');
        $result = $adb->pquery("SELECT label_id FROM vtiger_emakertemplates_label_keys WHERE label_key=?", array("C_".$lblkey));
        $num_rows = $adb->num_rows($result);
        
        if ($num_rows > 0) {
             $result = array('success' => true, 'message' => vtranslate('LBL_LABEL_KEY_EXIST', 'EMAILMaker'));
        } else {
             $result = array('success' => false);
        }

        $response = new Vtiger_Response();
        $response->setResult($result);
        $response->emit();
    }    
    function SaveCustomLabel(Vtiger_Request $request){        
        $adb = PearDatabase::getInstance();        
        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();    
        $labelid = $request->get('labelid');
        $langid = $request->get('langid');        
        $LblVal = $request->get('LblVal');

        if ($labelid == ""){    
            $LblKey = $request->get('LblKey');
            $label_key = "C_" . $LblKey;            
            $adb->pquery("INSERT IGNORE INTO vtiger_emakertemplates_label_keys (label_key) VALUES (?)", array($label_key));
            $labelid = $adb->query_result($adb->pquery("SELECT label_id FROM vtiger_emakertemplates_label_keys WHERE label_key=?", array($label_key)), 0, "label_id");
            $adb->pquery("INSERT IGNORE INTO vtiger_emakertemplates_label_vals (label_id, lang_id, label_value) VALUES (?, ?, ?)", array($labelid, $langid, $LblVal));
        } else {
            $adb->pquery("UPDATE vtiger_emakertemplates_label_vals SET label_value = ? WHERE label_id = ? AND lang_id = ?", array($LblVal, $labelid, $langid));
        }

        $response = new Vtiger_Response();
        try {
            $response->setResult(array('labelid' => $labelid,'langid' => $langid,'langid' => $langid,'lblval' => $LblVal,'lblkey'=>$label_key));
        } catch (Exception $e) {
            $response->setError($e->getCode(), $e->getMessage());
        }
        $response->emit();
    }    
    function SaveCustomLabelValues(Vtiger_Request $request){        
        $test = "";
        $adb = PearDatabase::getInstance();
        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();    
        $lblkey = $request->get('lblkey');        
        $result1 = $adb->pquery("SELECT label_id FROM vtiger_emakertemplates_label_keys WHERE label_key = ?", array($lblkey));
        $labelid = $adb->query_result($result1,0,"label_id");
        
        list($oLabels, $languages) = $EMAILMaker->GetCustomLabels();
        $oLbl = $oLabels[$labelid];
        $langValsArr = $oLbl->GetLangValsArr();
        
        foreach ($langValsArr as $langid => $langVal){
            $control = $request->get('LblVal'.$langid);            
            if ($control == "yes") {
                $langval = $request->get('LblVal'.$langid."Value");
                $result2 = $adb->pquery("SELECT * FROM vtiger_emakertemplates_label_vals WHERE label_id = ? AND lang_id = ?", array($labelid,$langid));
                $num_rows2 = $adb->num_rows($result2);  
                 
                if ($num_rows2 > 0){
                    $adb->pquery("UPDATE vtiger_emakertemplates_label_vals SET label_id = ? WHERE lang_id = ?, label_value=?", array($langval, $labelid, $langid));
                } else {
                    if ($langval != ""){
                        $adb->pquery("INSERT INTO vtiger_emakertemplates_label_vals (label_id,lang_id,label_value) VALUES (?,?,?)", array($labelid, $langid, $langval));
                    }
                }
            }
        }
        
        $response = new Vtiger_Response();
        try {
            $response->setResult(array('success' => true));
        } catch (Exception $e) {
            $response->setError($e->getCode(), $e->getMessage());
        }
        $response->emit();
    }    
    public function DeleteCustomLabels(Vtiger_Request $request){
        $sql1 = "DELETE FROM vtiger_emakertemplates_label_vals WHERE label_id IN (";
        $sql2 = "DELETE FROM vtiger_emakertemplates_label_keys WHERE label_id IN (";
        $params = array();
        foreach ($_REQUEST as $key => $val) {
            if (substr($key, 0, 4) == "chx_" && $val == "on") {
                list($dump, $id) = explode("_", $key, 2);

                if (is_numeric($id)) {
                    $sql1 .= "?,";
                    $sql2 .= "?,";
                    array_push($params, $id);
                }
            }
        }
        if (count($params) > 0) {           
            $adb = PearDatabase::getInstance();
            $sql1 = rtrim($sql1, ",") . ")";
            $sql2 = rtrim($sql2, ",") . ")";
            $adb->pquery($sql1, $params);
            $adb->pquery($sql2, $params);
        }
        header("Location:index.php?module=EMAILMaker&view=CustomLabels");
    }    
    public function SaveProductBlock(Vtiger_Request $request){
        EMAILMaker_Debugger_Model::GetInstance()->Init();
        $adb = PearDatabase::getInstance();
        $tplid = $request->get('tplid');
        $template_name = $request->get('template_name');
        $body = $request->get('body'); 
        
        if (isset($tplid) && $tplid != ""){
            $adb->pquery("UPDATE vtiger_emakertemplates_productbloc_tpl SET name=?, body=? WHERE id=?", array($template_name, $body, $tplid));
        } else {
            $adb->pquery("INSERT INTO vtiger_emakertemplates_productbloc_tpl(name, body) VALUES(?,?)", array($template_name, $body));
        }        
        header("Location:index.php?module=EMAILMaker&view=ProductBlocks");
    }    
    public function deleteProductBlocks(Vtiger_Request $request){
        EMAILMaker_Debugger_Model::GetInstance()->Init();
        $adb = PearDatabase::getInstance();        
        $sql = "DELETE FROM vtiger_emakertemplates_productbloc_tpl WHERE id IN (";
        $params = array();
        foreach ($_REQUEST as $key => $val) {
            if (substr($key, 0, 4) == "chx_" && $val == "on"){
                list($dump, $id) = explode("_", $key, 2);
                if (is_numeric($id)) {
                    $sql .= "?,";
                    array_push($params, $id);
                }
            }
        }
        if (count($params) > 0){
            $sql = rtrim($sql, ",") . ")";
            $adb->pquery($sql, $params);
        }
        header("Location:index.php?module=EMAILMaker&view=ProductBlocks");
    }    
    public function DeleteTheme(Vtiger_Request $request){
        EMAILMaker_Debugger_Model::GetInstance()->Init();
        $adb = PearDatabase::getInstance();
        $themeid = $request->get('themeid');
        $return_module = $request->get('return_module');
        $return_view = $request->get('return_view'); 
        $adb->pquery("UPDATE vtiger_emakertemplates SET deleted=1 WHERE templateid=?", array($themeid));        
        header("Location:index.php?module=EMAILMaker&view=Select&return_module=".$return_module."&return_view=".$return_view);
    }    
    public function DeleteTemplate(Vtiger_Request $request){
        EMAILMaker_Debugger_Model::GetInstance()->Init();
        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
        if ($EMAILMaker->CheckPermissions("DELETE") == false)
            $EMAILMaker->DieDuePermission();

        $adb = PearDatabase::getInstance();
        $id_array = array();

        if ($request->has('templateid') && !$request->isEmpty('templateid')){
            $templateid = $request->get('templateid');
            $checkRes = $adb->pquery("select module from vtiger_emakertemplates where templateid=?", array($templateid));
            $checkRow = $adb->fetchByAssoc($checkRes);

            $EMAILMaker->CheckTemplatePermissions($checkRow["module"], $templateid);
            $adb->pquery("delete from vtiger_emakertemplates where templateid=?", array($templateid));
        } else {
            $idlist = $request->get('idlist');
            $id_array = explode(';', $idlist);
            $checkRes = $adb->pquery("select templateid, module from vtiger_emakertemplates where templateid IN (" . generateQuestionMarks($id_array) . ")",$id_array);
            $checkArr = array();
            while ($checkRow = $adb->fetchByAssoc($checkRes)){
                $checkArr[$checkRow["templateid"]] = $checkRow["module"];
            }
            for ($i = 0; $i < count($id_array) - 1; $i++) {
                $EMAILMaker->CheckTemplatePermissions($checkArr[$id_array[$i]], $id_array[$i]);
                $sql = "delete from vtiger_emakertemplates where templateid=?";
                $adb->pquery($sql, array($id_array[$i]));
            }
        }
        $ajaxDelete = $request->get('ajaxDelete');
        $listViewUrl = "index.php?module=EMAILMaker&view=List";
        if($ajaxDelete){
            $response = new Vtiger_Response();
            $response->setResult($listViewUrl);
            return $response;
        } else {
            header("Location: $listViewUrl");
        }
    }    
    public function updateLinkForModule(Vtiger_Request $request){
        EMAILMaker_Debugger_Model::GetInstance()->Init();
        $for_module = $request->get('forModule');
        $link_type = $request->get('linkType');
        $update_type = $request->get('updateType');
        $link_module = Vtiger_Module::getInstance($for_module);

        if ($update_type == "true")
             $useFunction = "addLink";
        else  
             $useFunction = "deleteLink";
        
        if ($link_type == "1")
            $link_module->$useFunction('DETAILVIEWSIDEBARWIDGET', 'EMAILMaker', 'module=EMAILMaker&view=GetEMAILActions&record=$RECORD$');
        elseif ($link_type == "2")
            $link_module->$useFunction('LISTVIEWMASSACTION', 'Send Emails with EMAILMaker', 'javascript:EMAILMaker_Actions_Js.getListViewPopup(this,\'$MODULE$\');');

        $result = array('success' => true);
        $response = new Vtiger_Response();
        $response->setResult($result);
        $response->emit();
    }    
    public function controlEmails(Vtiger_Request $request){
        $records = array();
        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
        $adb = PearDatabase::getInstance();
        $currentUserModel = Users_Record_Model::getCurrentUserModel();        
        $esentid = $request->get('esentid');
        
        if ($esentid != ""){   
            $records[] = $EMAILMaker->getEmailsInfo($esentid);
        }else{
            $sql = "SELECT DISTINCT tb1.esentid FROM vtiger_emakertemplates_sent AS tb1 INNER JOIN vtiger_emakertemplates_emails AS tb2 ON tb1.esentid = tb2.esentid WHERE tb2.deleted= '0' AND tb2.status = '0' AND tb1.userid = ? AND (tb1.drip_group = '0' OR tb1.drip_group IS NULL) AND tb1.drip_delay <= 0 AND tb1.type = 1 LIMIT 0,1";
            $result = $adb->pquery($sql,array($currentUserModel->id));
            $num_rows = $adb->num_rows($result); 

            if ($num_rows > 0){    
                while($row = $adb->fetchByAssoc($result)){
                    $records[] = $EMAILMaker->getEmailsInfo($row['esentid']);
                }
            }    
        }

        $response = new Vtiger_Response();
        $response->setResult($records);
        $response->emit();
    }    
    public function sendEmail(Vtiger_Request $request){
        $records = array();
        $rootDirectory =  vglobal('root_directory');
        $adb = PearDatabase::getInstance();

        if ($request->has('debug') && !$request->isEmpty('debug')) {
            if ($request->get('debug') == 'true') {
                error_reporting(63);
                ini_set("display_errors", 1);
                $adb->setDebug(true);
                $debug = true;
            }
        }
        
        $def_charset = vglobal("default_charset");
        $currentUserModel = Users_Record_Model::getCurrentUserModel();
        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
        
        $message = "";
        $mailer = Emails_Mailer_Model::getInstance();
        $mailer->IsHTML(true);

        $result0 = $adb->pquery("select from_email_field from vtiger_systems where server_type=?",array('email'));
        $from_email_field = $adb->query_result($result0,0,'from_email_field');
        
        $esentid = $request->get('esentid');
        $result = $adb->pquery("SELECT * FROM vtiger_emakertemplates_sent WHERE esentid = ?",array($esentid));
        $from_name = decode_html(decode_html($adb->query_result($result,0,"from_name")));
        $from_address = $adb->query_result($result,0,"from_email");
        $type = $adb->query_result($result,0,"type");
        $load_subject = $adb->query_result($result,0,"subject");
        $load_body = $adb->query_result($result,0,"body");
        $total_emails = $adb->query_result($result,0,"total_emails");
        $pdf_template_ids = $adb->query_result($result,0,"pdf_template_ids");
        $pdf_language = $adb->query_result($result,0,"pdf_language");
        $ids_for_pdf = $adb->query_result($result,0,"ids_for_pdf");
        $attachments = $adb->query_result($result,0,"attachments");
        $att_documents = $adb->query_result($result,0,"att_documents");
        $pmodule = $adb->query_result($result,0,"pmodule"); 
        $language = $adb->query_result($result,0,"language");         
        if ($language == "") $language = $currentUserModel->get('language');        
        $correct = "false";
        $cc = $bcc = $cc_ids = $bcc_ids = "";
        $all_emails_count = $sent_emails_count = 0;
        $result2 = $adb->pquery("SELECT * FROM vtiger_emakertemplates_emails WHERE esentid = ? AND status = '0' AND deleted = '0' LIMIT 0, 1",array($esentid));
        $not_emails_sent_num = $adb->num_rows($result2); 

        if ($not_emails_sent_num > 0){
            if ($type != "2"){
                $Inserted_Emails = array();
                $semailid = $adb->query_result($result2,0,"emailid");
                $mailer->reinitialize();
                
                $replyToEmail = $from_address;
                if(isset($from_email_field) && $from_email_field!=''){
                    $from_address = $from_email_field;
                }

                $mailer->ConfigSenderInfo($from_address, $from_name, $replyToEmail);       
                $pid = $adb->query_result($result2,0,"pid");
                if ($pid != "" && $pid != "0") $formodule = getSalesEntityType($pid); else $formodule = "";                    
                $myid = $adb->query_result($result2,0,"email");
                $cc = $adb->query_result($result2,0,"cc");
                $bcc = $adb->query_result($result2,0,"bcc");
                $ccs = array_filter(explode(',',$cc));
                $bccs = array_filter(explode(',',$bcc));
                $cc_ids = $adb->query_result($result2,0,"cc_ids");
                $bcc_ids = $adb->query_result($result2,0,"bcc_ids");
                $parent_id = $adb->query_result($result2,0,"parent_id");

                if (strpos($myid, "|")){
                    list($mycrmid,$temp,$rmodule) = explode("|",$myid,3);
                } else {
                    list($mycrmid,$temp) = explode("@",$myid,2);
                    $rmodule  = "";
                }    

                if ($mycrmid == "email"){
                    $formodule = $rmodule;
                    $emailadd = $temp;
                    $mycrmid = $rmodule = $track_URL = "";
                } elseif ($mycrmid == "massemail"){
                    $emailadd = $temp;
                    $mycrmid = $pid;
                    $rmodule = $pmodule;
                } else {
                    $emailadd = "";
                    if ($rmodule == ""){
                        if ($temp == "-1")
                            $rmodule = "Users";
                        else
                            $rmodule=getSalesEntityType($mycrmid);
                    }
                }
                
                if ($emailadd != ""){                    
                    $emailadd = html_entity_decode($emailadd, ENT_QUOTES, $def_charset);
                }                
                
                if ($formodule == "" && $mycrmid != "" && $rmodule != "") {
                    $pid = $mycrmid;
                    $formodule = $rmodule;
                }

                $saved_toid = "";
                if($temp == "-1" || $rmodule == "Users"){
                    $ufocus = new Users();
                    $ufocus->id = $mycrmid;
                    $ufocus->retrieve_entity_info($mycrmid, 'Users');
                    $emailadd = $ufocus->column_fields[$temp];
                    $emailadd = html_entity_decode($emailadd, ENT_QUOTES, $def_charset);
                    $user_full_name = getUserFullName($mycrmid);
                    $saved_toid = $user_full_name."<".$emailadd.">"; 
                } else {
                    if ($mycrmid != ""){
                        if ($delimeter == "@")
                            $emailadd = $EMAILMaker->getEmailToAdressat($mycrmid,$temp,$rmodule);
                        else
                            $emailadd = $EMAILMaker->getEmailFieldToAdressat($mycrmid,$temp,$rmodule);

                        if ($rmodule !=""){    
                            $entityNames = getEntityName($rmodule, $mycrmid);
                            $pname = $entityNames[$mycrmid];
                        }
                        $saved_toid = $pname."<".$emailadd.">"; 
                    } else {
                        $saved_toid = $emailadd;
                    }
                } 

                $EMAILContentModel = EMAILMaker_EMAILContent_Model::getInstance($formodule, $pid, $language, $mycrmid, $rmodule);
                $EMAILContentModel->setSubject($load_subject);
                $EMAILContentModel->setBody($load_body);
                $EMAILContentModel->getContent();

                $subject = $EMAILContentModel->getSubject();
                $body = $EMAILContentModel->getBody();

                $mailer->Body = $body;
                $mailer->Subject = $subject;
                $mailer->AddAddress($emailadd);

                $focus = CRMEntity::getInstance("Emails");

                if ($parent_id != "" && $parent_id != "0"){
                    $focus->retrieve_entity_info($parent_id,"Emails");
                    $focus->id = $parent_id;
                    $focus->mode = "edit";
                }

                $focus->column_fields["subject"] = $subject;
                $focus->column_fields["description"] = $body;
                $focus->column_fields["date_start"] = date(getNewDisplayDate());//This will be converted to db date format in save
                $focus->column_fields["time_start"] = date('H:i');

                if ($parent_id == "" || $parent_id == "0"){    
                    $focus->filename = $focus->parent_id = $focus->parent_type = "";
                    $focus->column_fields["assigned_user_id"]=$currentUserModel->id;
                    $focus->column_fields["activitytype"]="Emails";
                    $focus->column_fields["parent_id"] = $mycrmid;
                    $focus->column_fields["saved_toid"] = $saved_toid;
                    $focus->column_fields["ccmail"] = $cc;
                    $focus->column_fields["bccmail"] = $bcc;
                    $focus->save("Emails");

                    if ($mycrmid != ""){
                        $Inserted_Emails[] = $mycrmid; 
                        $adb->pquery('insert into vtiger_seactivityrel values(?,?)',array($mycrmid,$focus->id));
                        
                    }
                    
                    if ($cc_ids != ""){
                        $CC_IDs = explode(";",$cc_ids);
                        foreach ($CC_IDs AS $email_crm_id){
                            if (!in_array($email_crm_id,$Inserted_Emails)){
                                $Inserted_Emails[] = $email_crm_id; 
                                $adb->pquery('insert into vtiger_seactivityrel values(?,?)',array($email_crm_id,$focus->id));
                            }
                        }
                    }

                    if ($bcc_ids != ""){
                        $BCC_IDs = explode(";",$bcc_ids);
                        foreach ($BCC_IDs AS $email_crm_id){
                            if (!in_array($email_crm_id,$Inserted_Emails)){
                                $Inserted_Emails[] = $email_crm_id;
                                $adb->pquery('insert into vtiger_seactivityrel values(?,?)',array($email_crm_id,$focus->id));
                            }    
                        }
                    }
                    $parent_id = $focus->id;
                } else {
                    $focus->column_fields["parent_id"] = $mycrmid;
                    $focus->column_fields["saved_toid"] = $saved_toid;
                    $focus->column_fields["ccmail"] = $cc;
                    $focus->column_fields["bccmail"] = $bcc;
                    $focus->save("Emails");
                }
                
                if ($formodule != "" && $pid != "") {
                    $adb->pquery('insert into  vtiger_crmentityrel (crmid, module, relcrmid, relmodule) values(?,?,?,?)',array($pid,$formodule,$focus->id,'Emails'));
                }                
                
                if ($pdf_template_ids != ""){
                    if ($ids_for_pdf != ""){
                        $IDs_for_pdf = explode(";",$ids_for_pdf);
                        if (count($IDs_for_pdf) == 1) $IDs_for_pdf = $IDs_for_pdf[0];
                    } else {
                        $IDs_for_pdf = $pid;
                    }
                    $this->savePDFIntoEmail($request,$focus,$IDs_for_pdf ,$pdf_template_ids,$pdf_language,$pmodule);
                }

                $mailer = $EMAILMaker->addAllAttachments($mailer,$focus->id);

                $pos = strpos($description, '$logo$');
                if ($pos !== false){
                    $description =str_replace('$logo$','<img src="cid:logo" />',$description);
                    $logo = true;
                } 

                if ($att_documents != ""){
                    $attachments = $this->getAttachmentDetails($att_documents);
                    if(is_array($attachments)){
                        foreach($attachments as $attachment){
                            $fileNameWithPath = $rootDirectory.$attachment['path'].$attachment['fileid']."_".$attachment['attachment'];
                            if(is_file($fileNameWithPath)){
                                $mailer->AddAttachment($fileNameWithPath, $attachment['attachment']);
                                $result_att = $adb->pquery("SELECT * FROM vtiger_seattachmentsrel WHERE crmid = ? AND attachmentsid = ?", array($parent_id,$attachment['crmid'])); 
                                $num_rows_att = $adb->num_rows($result_att);

                                if ($num_rows_att == 0) $adb->pquery("INSERT INTO vtiger_seattachmentsrel (crmid, attachmentsid) VALUES(?, ?)", array($parent_id, $attachment['crmid']));
                            }
                        }
                    }
                }

                if ($logo){
                        $mailer->AddEmbeddedImage(vimage_path('logo_mail.jpg'), 'logo', 'logo.jpg', 'base64', 'image/jpg');
                }

                $Email_Images = $EMAILContentModel->getEmailImages();
                if (count($Email_Images) > 0){
                    foreach ($Email_Images AS $cid => $cdata){
                        $mailer->AddEmbeddedImage($cdata["path"], $cid, $cdata["name"]);
                    }    
                }  

                if(!empty($ccs)){
                        foreach($ccs as $cc) $mailer->AddCC($cc);
                }
                if(!empty($bccs)){
                        foreach($bccs as $bcc) $mailer->AddBCC($bcc);
                }                    
                if($temp != "-1") {
                    if ($mycrmid != "") $mailer->Body .= $EMAILMaker->getTrackImageDetails($mycrmid,$parent_id);
                }                    
                $status = $mailer->Send(true);
                if(!$status){
                    $mail_status = $mailer->getError();
                }  
                $sql_u = "UPDATE vtiger_emakertemplates_emails SET email_send_date = now(), status = '1', parent_id = ?";
                if (!$status){
                    $sql_u .= ", error = '".$mail_status."'";        
                } 
                $sql_u .= " WHERE emailid = ?";
                $adb->pquery($sql_u,array($parent_id, $semailid)); 

                $message = vtranslate('LBL_EMAIL_INFO','EMAILMaker')." ";
                $message .= $emailadd; 
                if ($status){
                    $correct = "true";                        
                    $sql_u2 = "UPDATE vtiger_emaildetails SET email_flag = 'SENT' WHERE emailid = ?";
                    $adb->pquery($sql_u2,array($parent_id)); 
                    $sql_u2 = "UPDATE vtiger_emakertemplates_sent SET total_sent_emails = total_sent_emails + 1 WHERE esentid = ?";
                    $adb->pquery($sql_u2,array($esentid));                    
                    $message .= " ".vtranslate('LBL_EMAIL_INFO_YES','EMAILMaker'); 
                } else {
                    $message .= " ".vtranslate('LBL_EMAIL_INFO_NO','EMAILMaker');  
                    if ($mail_status != "") {
                        $message .= " (".$mail_status.")";
                    } else {
                        $sql_u3 = "UPDATE vtiger_emakertemplates_emails SET error = ? WHERE emailid = ?";
                        $adb->pquery($sql_u3,array($message,$semailid)); 
                    }
                }
                
                if (class_exists(EMAILMaker_AfterSend_Helper)){
                    EMAILMaker_AfterSend_Helper::runAfterSend($parent_id,$status,$mailer);
                }                
            }
        }
        
        $Emails_Info = $EMAILMaker->getEmailsInfo($esentid); 
        $response_result = array("emails_info"=>$Emails_Info,"message" => $message,"correct"=>$correct);
        $response = new Vtiger_Response();
        $response->setResult($response_result);
        $response->emit();
    }
    function getAttachmentDetails($att_documents){
        $db = PearDatabase::getInstance();
        $rootDirectory =  vglobal('root_directory');
        $Att_Documents = explode(",",$att_documents);
        $attachmentRes = $db->pquery('SELECT vtiger_seattachmentsrel.crmid, vtiger_attachments.* FROM vtiger_attachments
                                      LEFT JOIN vtiger_seattachmentsrel ON vtiger_attachments.attachmentsid = vtiger_seattachmentsrel.attachmentsid
                                      WHERE vtiger_seattachmentsrel.crmid IN ('.  generateQuestionMarks($Att_Documents).') OR vtiger_attachments.attachmentsid IN ('.  generateQuestionMarks($Att_Documents).')', array($Att_Documents, $Att_Documents));
        $numOfRows = $db->num_rows($attachmentRes);
        $attachmentsList = array();
        if($numOfRows) {
            for($i=0; $i<$numOfRows; $i++) {
                $attachmentsList[$i]['crmid'] = $db->query_result($attachmentRes, $i, 'attachmentsid');
                $attachmentsList[$i]['fileid'] = $db->query_result($attachmentRes, $i, 'attachmentsid');
                $attachmentsList[$i]['attachment'] = decode_html($db->query_result($attachmentRes, $i, 'name'));
                $path = $db->query_result($attachmentRes, $i, 'path');
                $attachmentsList[$i]['path'] = $path;
                $attachmentsList[$i]['size'] = filesize($rootDirectory.$path.$attachmentsList[$i]['fileid'].'_'.$attachmentsList[$i]['attachment']);
                $attachmentsList[$i]['type'] = $db->query_result($attachmentRes, $i, 'type');
            }
        }

        return $attachmentsList;
    }
    public function getRelatedDocuments($crmid){
        $adb = PearDatabase::getInstance();
        $documentRes = $adb->pquery("SELECT * FROM vtiger_senotesrel
                                        INNER JOIN vtiger_crmentity ON vtiger_senotesrel.notesid = vtiger_crmentity.crmid AND vtiger_senotesrel.crmid = ?
                                        INNER JOIN vtiger_notes ON vtiger_notes.notesid = vtiger_senotesrel.notesid
                                        INNER JOIN vtiger_seattachmentsrel ON vtiger_seattachmentsrel.crmid = vtiger_notes.notesid
                                        INNER JOIN vtiger_attachments ON vtiger_attachments.attachmentsid = vtiger_seattachmentsrel.attachmentsid
                                        WHERE vtiger_crmentity.deleted = 0", array($crmid));
        $numOfRows = $adb->num_rows($documentRes);
        if($numOfRows) {
                for($i=0; $i<$numOfRows; $i++) {
                    $documentsList[$i]['name'] = $adb->query_result($documentRes, $i, 'filename');
                    $filesize = $adb->query_result($documentRes, $i, 'filesize');
                    $documentsList[$i]['size'] = $this->getFormattedFileSize($filesize);
                    $documentsList[$i]['docid'] = $adb->query_result($documentRes, $i, 'notesid');
                    $documentsList[$i]['path'] = $adb->query_result($documentRes, $i, 'path');
                    $documentsList[$i]['fileid'] = $adb->query_result($documentRes, $i, 'attachmentsid');
                    $documentsList[$i]['attachment'] = $adb->query_result($documentRes, $i, 'name');
                    $documentsList[$i]['type'] = $adb->query_result($documentRes, $i, 'type');
                }
        }
        return $documentsList;
    }
    public function getFormattedFileSize($filesize){
        if($filesize < 1024) {
                $filesize = sprintf("%0.2f",round($filesize, 2)).'B';
        } else if($filesize > 1024 && $filesize < 1048576) {
                $filesize = sprintf("%0.2f",round($filesize/1024, 2)).'KB';
        } else if($filesize > 1048576) {
                $filesize = sprintf("%0.2f",round($filesize/(1024*1024), 2)).'MB';
        }
        return $filesize;
    }
    function savePDFIntoEmail($request,$focus,$parentid,$pdf_template_ids,$pdf_language,$pmodule = ''){
        $adb = PearDatabase::getInstance();
        if (class_exists('PDFMaker_PDFMaker_Model')){
            $PDFMaker = new PDFMaker_PDFMaker_Model();
            if (is_array($parentid)) {
                $modFocus = $parentid;
                $f_date = date("ymdHi");
                $file_name = "doc_".$f_date.".pdf";
            } else {
                $pmodule=getSalesEntityType($parentid);
                $modFocus = CRMEntity::getInstance($pmodule);  
                if(isset($parentid)) {
                    $modFocus->retrieve_entity_info($parentid,$pmodule);
                    $modFocus->id = $parentid;
                } 
                $module_tabid = getTabId($pmodule);
                $result=$adb->pquery("SELECT fieldname FROM vtiger_field WHERE uitype=4 AND tabid=?",array($module_tabid));
                $fieldname=$adb->query_result($result,0,"fieldname");
                if(isset($modFocus->column_fields[$fieldname]) && $modFocus->column_fields[$fieldname]!=""){
                    $file_name = $PDFMaker->generate_cool_uri($modFocus->column_fields[$fieldname]).".pdf";
                } else {
                    $f_date = date("ymdHi");
                    $file_name = "doc_".$f_date.".pdf";
                }
            }
            $PDFMaker->createPDFAndSaveFile($request, $pdf_template_ids, $focus, $modFocus, $file_name, $pmodule, $pdf_language); 
        }
    }  
    function getDocuments(Vtiger_Request $request){
        $result = array();
        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();

        $templateid = $request->get('templateid');

        if ($templateid != "" && $templateid != "0"){
            $Documents_Records = $EMAILMaker->getEmailTemplateDocuments($templateid);
            if (count($Documents_Records) > 0){
                foreach ($Documents_Records AS $DD){
                    $result[$DD["id"]] = array("filename" => $DD["name"], "filesize" => $DD["filesize"]);
                }    
            }    
        }    
        $response = new Vtiger_Response();
        $response->setResult($result);
        $response->emit();
    }  
    function getFiltersForModule(Vtiger_Request $request){
        $source_module = $request->get("source_module"); 
        $module_filters = EMAILMaker_RecordME_Model::getModuleFilters($source_module);        
        $module_columns = EMAILMaker_RecordME_Model::getModuleColumns($source_module);
        
        echo '<div class="control-group">
                            <div class="control-label">
                                 '.vtranslate('LBL_FILTER','EMAILMaker').'
                            </div>
                            <div class="controls">
                                '.$module_filters.'
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="control-label">
                                '.vtranslate('LBL_COLUMN','EMAILMaker').'
                            </div>
                            <div class="controls">
                                '.$module_columns.'
                            </div>
                        </div>';            
    }  
    function getEmailTemplatesForModule(Vtiger_Request $request){
        $source_module = $request->get("source_module"); 
        $stemplateid = $request->get("templateid");  
                
        $orderby = "templateid";
        $dir = "asc";
        $c = "<div class='row-fluid'>";
        
        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
        $return_data = $EMAILMaker->GetListviewData($orderby, $dir, $source_module, false, $request);
        
        $select_lbl = vtranslate("LBL_SELECT","EMAILMaker");
        $preview_lbl = vtranslate("LBL_PREVIEW","EMAILMaker");
        
        foreach ($return_data AS $edata){            
            $templateid = $edata["templateid"];            
            if ($templateid == $stemplateid)
                $class = "blockHeader";
            else
                $class = "tableHeading";
            
            $c .= '<div class="span" style="margin:10px;" >
                    <div style="float:left;border:1px solid #000000;width:140px;height:185px;" class="themeTableColor">
                        <div style="height:160px;overflow:auto;">
                            <div class="tableHeading cursorPointer" style="border-bottom:1px solid #000000;" border="1">
                                <div id="EmailTemplateHeader'.$templateid.'" data-templateid="'.$templateid.'" style="padding:5px;text-align:center;font-weight:bold;" class="EmailTemplateSelect cursorPointer '.$class.'">
                                    '.$edata["name"].'
                                </div>
                            </div>
                            <div style="padding:2px">'.$edata["description"].'</div>
                        </div>
                        <center>
                            <div class="actions">
                                <span class="actionImages"><a class="EmailTemplateSelect cursorPointer" data-templateid="'.$templateid.'"><i title="Select" class="icon-plus actionImagesAlignment"></i>'.$select_lbl.'</a></span>
                                <span class="actionImages"><a class="EmailTemplatePreview cursorPointer" data-templateid="'.$templateid.'"><i title="Edit" class="icon-search actionImagesAlignment"></i>'.$preview_lbl.'</a></span>
                            </div>
                        </center>
                        </div>
                    </div>';
            
            $class = "tableHeading";
        }
        $c .= "</div>";
        echo $c;
    }  
    function getEmailTemplatePreview(Vtiger_Request $request){
        $templateid = $request->get("templateid");        
        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
        $emailtemplateResult = $EMAILMaker->GetDetailViewData($templateid);        
        echo decode_html($emailtemplateResult["body"]);
    }  
    public function DeleteME(Vtiger_Request $request){
        $moduleName = $request->getModule();
        $recordId = $request->get('record');
        $ajaxDelete = $request->get('ajaxDelete');

        $recordModel = EMAILMaker_RecordME_Model::getInstance($recordId, $moduleName);
        $recordModel->delete();

        if($ajaxDelete) {
            $result = "index.php?module=EMAILMaker&view=ListME";
        } else {
            $result = array('module'=>$moduleName);
        }

        $response = new Vtiger_Response();
        $response->setResult($result);
        $response->emit();
    }    
    public function installExtension(Vtiger_Request $request){
        $extname = $request->get("extname");
        
        if ($extname == "Workflow"){    
            $Errors = array();
            include_once('modules/EMAILMaker/EMAILMaker.php');
            $EMAILMaker = new EMAILMaker();

            $EMAILMakerModel = new EMAILMaker_EMAILMaker_Model();
            $Workflows = $EMAILMakerModel->GetWorkflowsList(); 

            foreach ($Workflows AS $name){   
                $folder_dest1 = "modules/com_vtiger_workflow/tasks/";
                $dest1 = $folder_dest1.$name.".inc";
                
                $source1 = "modules/EMAILMaker/workflow/".$name.".inc";
                if (!file_exists($dest1)){
                    if(!copy($source1, $dest1)){
                        $Errors[] = vtranslate("LBL_PERMISSION_ERROR_PART_1","EMAILMaker").' "'.$source1.'" '.vtranslate("LBL_PERMISSION_ERROR_PART_2","EMAILMaker").' "'.$folder_dest1.'" '.vtranslate("LBL_PERMISSION_ERROR_PART_3","EMAILMaker").'.';
                   }        
                }
                
                $folder_dest2 = "layouts/vlayout/modules/Settings/Workflows/Tasks/";
                $dest2 = $folder_dest2.$name.".tpl";
                
                $source2 = "layouts/vlayout/modules/EMAILMaker/taskforms/".$name.".tpl";
                if (!file_exists($dest2)){
                    if(!copy($source2, $dest2)){
                        $Errors[] = vtranslate("LBL_PERMISSION_ERROR_PART_1","EMAILMaker").' "'.$source2.'" '.vtranslate("LBL_PERMISSION_ERROR_PART_2","PDFMaker").' "'.$folder_dest2.'" '.vtranslate("LBL_PERMISSION_ERROR_PART_3","PDFMaker").'.';
                   }        
                }
            }            
            if (count($Errors) > 0){    
                $error = '<div class="modelContainer">';
                    $error .= '<div class="modal-header">';
                        $error .= '<button class="close vtButton" data-dismiss="modal">×</button>';
                        $error .= '<h3 class="redColor">';
                        $error .= vtranslate("LBL_INSTALLATION_FAILED","EMAILMaker");
                        $error .= '</h3>';
                    $error .= '</div>';
                    $error .= '<div class="modal-body">';
                        $error .= implode("<br>",$Errors);
                        $error .= "<br><br>".vtranslate("LBL_CHANGE_PERMISSION","EMAILMaker");
                    $error .= '</div>';
                $error .= '</div>';                
            }else{
                $EMAILMaker->installWorkflows();                
                $control = $EMAILMakerModel->controlWorkflows();
                
                if (!$control){
                    $error = vtranslate("LBL_INSTALLATION_FAILED","EMAILMaker");
                }
            }            
            if ($error == ""){
                 $result = array('success' => true, 'message' => vtranslate("LBL_WORKFLOWS_ARE_ALREADY_INSTALLED","EMAILMaker"));
            }else{
                 $result = array('success' => false, 'message' => vtranslate($error, 'EMAILMaker'));
            }
        }else{
            $result = array('success' => false);
        }        
        $response = new Vtiger_Response();
        $response->setResult($result);
        $response->emit();
    }    
    public function stopSendingEmails(Vtiger_Request $request){        
        $adb = PearDatabase::getInstance();
        $esentid = $request->get('esentid');
        if ($esentid != ""){
            $adb->pquery("UPDATE vtiger_emakertemplates_emails SET deleted = '1' WHERE esentid = ? AND status = '0'",array($esentid));
            $success = true;
        }else{
            $success = false;
        }        
        $response = new Vtiger_Response();
        $response->setResult(array('success' => $success));
        $response->emit();
    }    
    public function SaveEMAILImages(Vtiger_Request $request){
        $moduleName = $request->getModule();
        $crmid = $request->get('record');
        $adb = PearDatabase::getInstance();
        $adb->pquery("DELETE FROM vtiger_emakertemplates_images WHERE crmid=?", array($crmid));
        $R_Data = $request->getAll();

        foreach ($R_Data as $key => $value){
            if (strpos($key, "img_") !== false) {
                list($bin, $productid, $sequence) = explode("_", $key);
                if ($value != "no_image") {
                    $width = $R_Data["width_" . $productid . "_" . $sequence];
                    $height = $R_Data["height_" . $productid . "_" . $sequence];
                    if (!is_numeric($width) || $width > 999)
                        $width = 0;
                    if (!is_numeric($height) || $height > 999)
                        $height = 0;
                } else {
                    $height = $width = $value = 0;
                }
                $adb->pquery("INSERT INTO vtiger_emakertemplates_images (crmid, productid, sequence, attachmentid, width, height) VALUES (?, ?, ?, ?, ?, ?)", array($crmid, $productid, $sequence, $value, $width, $height));
            }        
        }
    }    
    public function SaveProfilesPrivilegies(Vtiger_Request $request){        
        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
        $adb = PearDatabase::getInstance();
        $permissions = $EMAILMaker->GetProfilesPermissions();        
        foreach ($permissions as $profileid => $subArr) {
            foreach ($subArr as $actionid => $perm) {
                $adb->pquery("DELETE FROM vtiger_emakertemplates_profilespermissions WHERE profileid = ? AND operation = ?", array($profileid, $actionid));
                $priv_chk = $request->get("priv_chk_" . $profileid . "_" . $actionid);
                if ($priv_chk == "on") {
                    $p_val = "0";
                } else {
                    $p_val = "1";
                }

                $adb->pquery("INSERT INTO vtiger_emakertemplates_profilespermissions (profileid, operation, permissions) VALUES(?, ?, ?)", array($profileid, $actionid, $p_val));
            }
        }        
        header("Location:index.php?module=EMAILMaker&view=ProfilesPrivilegies");
    }    
    public function ChangeActiveOrDefault(Vtiger_Request $request){
        $current_user = Users_Record_Model::getCurrentUserModel();
        $adb = PearDatabase::getInstance();
        $templateid = $request->get("templateid");
        $subject = $request->get("subjectChanged");

        $result = $adb->pquery("SELECT is_listview FROM vtiger_emakertemplates WHERE templateid=?", array($templateid));
        if ($adb->query_result($result, 0, "is_listview") == "1")
            $set_default_val = "2";
        else
            $set_default_val = "3";

        $result = $adb->pquery("SELECT * FROM vtiger_emakertemplates_userstatus WHERE templateid=? AND userid=?", array($templateid, $current_user->id));

        if ($adb->num_rows($result) > 0){
            if ($subject == "active")
                $sql = "UPDATE vtiger_emakertemplates_userstatus SET is_active=IF(is_active=0,1,0), is_default=IF(is_active=0,0,is_default) WHERE templateid=? AND userid=?";
            elseif ($subject == "default")
                $sql = "UPDATE vtiger_emakertemplates_userstatus SET is_default=IF(is_default > 0,0," . $set_default_val . ") WHERE templateid=? AND userid=?";
        } else {
            if ($subject == "active")
                $sql = "INSERT INTO vtiger_emakertemplates_userstatus(templateid,userid,is_active,is_default) VALUES(?,?,0,0)";
            elseif ($subject == "default")
                $sql = "INSERT INTO vtiger_emakertemplates_userstatus(templateid,userid,is_active,is_default) VALUES(?,?,1," . $set_default_val . ")";
        }
        $adb->pquery($sql, array($templateid, $current_user->id));

        $sql = "SELECT is_default, module
            FROM vtiger_emakertemplates_userstatus
            INNER JOIN vtiger_emakertemplates USING(templateid)
            WHERE templateid=? AND userid=?";
        $result = $adb->pquery($sql, array($templateid, $current_user->id));
        $new_is_default = $adb->query_result($result, 0, "is_default");
        $module = $adb->query_result($result, 0, "module");

        if ($new_is_default == $set_default_val){
            $sql5 = "UPDATE vtiger_emakertemplates_userstatus 
	       INNER JOIN vtiger_emakertemplates USING(templateid)
	       SET is_default=0
	       WHERE is_default > 0
             AND userid=?
             AND module=?
             AND templateid!=?";
            $adb->pquery($sql5, array($current_user->id, $module, $templateid));
        }
 
        $response = new Vtiger_Response();
        $response->setResult(array('success' => true));
        $response->emit();
    }    
    public function SearchEmails(Vtiger_Request $request){
        $moduleName = $request->get('module');
        $moduleModel = Vtiger_Module_Model::getInstance($moduleName);
        $searchValue = $request->get('searchValue');

        $emailsResult = array();
        if ($searchValue){
                $emailsResult = $moduleModel->searchEmails($request->get('searchValue'));
        }

        $response = new Vtiger_Response();
        $response->setResult($emailsResult);
        $response->emit();
    }    
    public function getModuleFields(Vtiger_Request $request){
        
        $current_user = Users_Record_Model::getCurrentUserModel();
        $this->cu_language = $current_user->get('language');
        $module = $request->get("formodule");
        $forfieldname = $request->get("forfieldname");
        
        $SelectModuleFields = array();
        $RelatedModules = array();
        
        if ($module != "") {
            $EMAILMakerFieldsModel = new EMAILMaker_Fields_Model();
            $SelectModuleFields = $EMAILMakerFieldsModel->getSelectModuleFields($module,$forfieldname);  
            $RelatedModules = $EMAILMakerFieldsModel->getRelatedModules($module);
            
        }         
        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
        $subject_fields = $EMAILMaker->getSubjectFields();
        
        $response = new Vtiger_Response();
        $response->setResult(array('success' => true,'fields' => $SelectModuleFields,'related_modules' => $RelatedModules,'subject_fields'=>array(vtranslate('LBL_COMMON_EMAILINFO','EMAILMaker') =>$subject_fields)));
        $response->emit();
    }
    
    
    public function sendExampleMEmail(Vtiger_Request $request){
        global $root_directory;
        
        $moduleName = $request->getModule();
        $data = $request->get("datap");
        $emailadd = $data["toemail"];
        
        $datame = $request->get("datame");
        $from_address = $datame["from_email"];
        $from_name = $datame["from_name"];
        $subject = $datame["subject"];   
        $templateid = $datame["emailtemplateid"];
        $language = $datame["language"];
        
        $formodule = $datame["for_module"];
        
        $mailer = Emails_Mailer_Model::getInstance();
        $mailer->IsHTML(true);
        
        $mailer->reinitialize();
              
        $adb = PearDatabase::getInstance();
        $result0 = $adb->pquery("select from_email_field from vtiger_systems where server_type=?",array('email'));
        $from_email_field = $adb->query_result($result0,0,'from_email_field');
        
        $replyToEmail = $from_address;
        if(isset($from_email_field) && $from_email_field!=''){
            $from_address = $from_email_field;
        }

        $mailer->ConfigSenderInfo($from_address, $from_name, $replyToEmail);  

        $EMAILContentModel = EMAILMaker_EMAILContent_Model::getInstanceById($templateid, $language, $formodule, "0");
        $EMAILContentModel->setSubject($subject);
        $EMAILContentModel->getContent(false,false,true);

        $subject = $EMAILContentModel->getSubject();
        $body = $EMAILContentModel->getBody();
   
        $mailer->Body = $body;
        $mailer->Subject = $subject;
        $mailer->AddAddress($emailadd);

        $sql10 = "SELECT vtiger_attachments.* FROM vtiger_notes 
                INNER JOIN vtiger_crmentity 
                    ON vtiger_crmentity.crmid = vtiger_notes.notesid
                INNER JOIN vtiger_seattachmentsrel 
                    ON vtiger_seattachmentsrel.crmid = vtiger_notes.notesid  
                INNER JOIN vtiger_attachments 
                    ON vtiger_attachments.attachmentsid = vtiger_seattachmentsrel.attachmentsid    
                INNER JOIN vtiger_emakertemplates_documents 
                    ON vtiger_emakertemplates_documents.documentid = vtiger_notes.notesid
                WHERE vtiger_crmentity.deleted = '0' AND vtiger_emakertemplates_documents.templateid = ?";
        $result10 = $adb->pquery($sql10, array($templateid));
        $num_rows10 = $adb->num_rows($result10);  

        if ($num_rows10 > 0){
            for($i=0;$i<$num_rows10;$i++){
                $fileid = $adb->query_result($result10,$i,'attachmentsid');
                $filename = decode_html($adb->query_result($result10,$i,'name'));
                $filepath = $adb->query_result($result10,$i,'path');
                $filewithpath = $root_directory.$filepath.$fileid."_".$filename;
                if(is_file($filewithpath)){
                        $mailer->AddAttachment($filewithpath,$filename);
                }
            }
        }        
        
        $Email_Images = $EMAILContentModel->getEmailImages();
        if (count($Email_Images) > 0) {
            foreach ($Email_Images AS $cid => $cdata) {
                $mailer->AddEmbeddedImage($cdata["path"], $cid, $cdata["name"]);
            }    
        }      
        
        $status = $mailer->Send(true);
        $success = true;
         "";
        if(!$status){
            $mail_status = $mailer->getError();
            $success = false;
        } else {
            $mail_status = vtranslate("LBL_EMAIL_HAS_BEEN_SENT",$moduleName);
        } 

        $response = new Vtiger_Response();
        $response->setResult(array('success' => $success,'status' => $mail_status));
        $response->emit();
    }
}