<?php
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ******************************************************************************* */

class EMAILMaker_MassSaveAjax_View extends Vtiger_Footer_View {
    
    private $from_name;
    private $from_email;
    
    function __construct(){
        parent::__construct();
        $this->exposeMethod('massSave');
    }
    public function checkPermission(Vtiger_Request $request){
        $moduleName = $request->getModule();
        if (!Users_Privileges_Model::isPermitted($moduleName, 'Save')){
                throw new AppException(vtranslate($moduleName).' '.vtranslate('LBL_NOT_ACCESSIBLE'));
        }
    }
    public function process(Vtiger_Request $request){
        $mode = $request->getMode();
        if(!empty($mode)){
                echo $this->invokeExposedMethod($mode, $request);
                return;
        }
    }
    public function massSave(Vtiger_Request $request){
        global $upload_badext;
        
        error_reporting(0);
        $toMailNamesList = $request->get('toMailNamesList_emailField'); 
        $toMailNamesListCC = $request->get('toMailNamesList_emailCCField'); 
        $toMailNamesListBCC = $request->get('toMailNamesList_emailBCCField'); 
    
        $Send_Emails = $SendMail = $EmailCCBCC = array();
        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
        $adb = PearDatabase::getInstance();
        $moduleName = $request->getModule();
        $currentUserModel = Users_Record_Model::getCurrentUserModel();
        $recordIds = $this->getRecordsListFromRequest($request);
        $documentIds = $request->get('documentids');
        $pdf_template_ids = $request->get('pdftemplateids');
        $pdflanguage = $request->get('pdflanguage'); 
        $language = $request->get('email_language');
        $flag = $request->get('flag');
        $ids_for_pdf = $request->get('sorce_ids'); 
        $result = Vtiger_Util_Helper::transformUploadedFiles($_FILES, true);
        $_FILES = $result['file'];
        $recordId = $request->get('record');
        $from_email = $request->get('from_email');
        list($type,$email_val) = explode("::",addslashes($from_email));

        if ($email_val != ""){
            if($type == "a"){
                $this->from_name = $email_val;
                $result_a = $adb->pquery("select * from vtiger_systems where from_email_field != ? AND server_type = ?", array('','email'));
                $this->from_email = $adb->query_result($result_a,0,"from_email_field");
            } else {
                $result_u = $adb->pquery("SELECT first_name, last_name, ".$type." AS email  FROM vtiger_users WHERE id = ?", array($email_val));
                $first_name = $adb->query_result($result_u,0,"first_name");
                $last_name = $adb->query_result($result_u,0,"last_name");
                $this->from_name = trim($first_name." ".$last_name);
                $this->from_email = $adb->query_result($result_u,0,"email");
            }
        } else {
            $this->from_email = $currentUserModel->get('email1');
            $current_user_lname = $currentUserModel->get('last_name');
            $current_user_fname = $currentUserModel->get('first_name');
            $this->from_name = trime($current_user_fname." ".$current_user_lname);      
        }    
        
        $parentEmailId = $request->get('parent_id',null);
        $attachmentsWithParentEmail = array();
        if(!empty($parentEmailId) && !empty ($recordId)){
            $parentEmailModel = Vtiger_Record_Model::getInstanceById($parentEmailId);
            $attachmentsWithParentEmail = $parentEmailModel->getAttachmentDetails();
        }
        $existingAttachments = $request->get('attachments',array());
        if(empty($recordId)){
			if(is_array($existingAttachments)){
				foreach ($existingAttachments as $index =>  $existingAttachInfo) {
					$existingAttachInfo['tmp_name'] = $existingAttachInfo['name'];
					$existingAttachments[$index] = $existingAttachInfo;
					if(array_key_exists('docid',$existingAttachInfo)) {
						$documentIds[] = $existingAttachInfo['docid'];
						unset($existingAttachments[$index]);
					}

				}
			}
        } else {
            $attachmentsToUnlink = array();
            $documentsToUnlink = array();

            foreach($attachmentsWithParentEmail as $i => $attachInfo){
                $found = false;
                foreach ($existingAttachments as $index =>  $existingAttachInfo){
                    if($attachInfo['fileid'] == $existingAttachInfo['fileid']){
                        $found = true;
                        break;
                    }
                }
                if(!$found){
                    if(array_key_exists('docid',$attachInfo)){
                        $documentsToUnlink[] = $attachInfo['docid'];
                    }else{
                        $attachmentsToUnlink[] = $attachInfo;
                    }
                }
                unset($attachmentsWithParentEmail[$i]);
            }
            //Make the attachments as empty for edit view since all the attachments will already be there
            $existingAttachments = array();
            if(!empty($documentsToUnlink)){
                //$recordModel->deleteDocumentLink($documentsToUnlink);
            }
            if(!empty($attachmentsToUnlink)){
                //$recordModel->deleteAttachment($attachmentsToUnlink);
            }
        }
        // This will be used for sending mails to each individual
        $toMailInfo = $request->get('toemailinfo');

        $to = $request->get('to');
        if(is_array($to)){
                $to = implode(',',$to);
        }  
        //save_module still depends on the $_REQUEST, need to clean it up
        $_REQUEST['parent_id'] = $parentIds;

        $success = false;
        $viewer = $this->getViewer($request);
        //if ($this->checkUploadSize($documentIds)) 
        //{
        if (count($_FILES) > 0){
            foreach ($_FILES as $fileindex => $files){
                if ($files['name'] != '' && $files['size'] > 0) {
                    $files['original_name'] = vtlib_purify($_REQUEST[$fileindex . '_hidden']);
                    $fileid = $this->uploadAndSaveFile($files);

                    if ($fileid) $documentIds[] = $fileid;
                }
            }                
            unset($_FILES);
        }            
        $currentUserModel = Users_Record_Model::getCurrentUserModel();
        $current_user_id = $currentUserModel->getId();

        $ownerId = $current_user_id;
        $date_var = date("Y-m-d H:i:s");
        if(is_array($existingAttachments)){
            foreach ($existingAttachments as $index =>  $existingAttachInfo){
                $file_name = $existingAttachInfo['attachment'];
                $path = $existingAttachInfo['path'];
                $fileId = $existingAttachInfo['fileid'];

                $oldFileName = $file_name;
                //SEND PDF mail will not be having file id
                if(!empty ($fileId)){
                        $oldFileName = $existingAttachInfo['fileid'].'_'.$file_name;
                }
                $oldFilePath = $path.'/'.$oldFileName;

                $binFile = sanitizeUploadFileName($file_name, $upload_badext);
                $current_id = $adb->getUniqueID("vtiger_crmentity");
                $filename = ltrim(basename(" " . $binFile)); //allowed filename like UTF-8 characters
                $filetype = $existingAttachInfo['type'];
                $filesize = $existingAttachInfo['size'];
                //get the file path inwhich folder we want to upload the file
                $upload_file_path = decideFilePath();
                $newFilePath = $upload_file_path . $current_id . "_" . $binFile;
                copy($oldFilePath, $newFilePath);
                $description = "";
                $params1 = array($current_id, $current_user_id, $ownerId, $moduleName . " Attachment", $description, $adb->formatDate($date_var, true), $adb->formatDate($date_var, true));
                $adb->pquery("insert into vtiger_crmentity (crmid,smcreatorid,smownerid,setype,description,createdtime,modifiedtime) values(?, ?, ?, ?, ?, ?, ?)", $params1);
                $params2 = array($current_id, $filename, $description, $filetype, $upload_file_path);
                $result = $adb->pquery("insert into vtiger_attachments(attachmentsid, name, description, type, path) values(?, ?, ?, ?, ?)", $params2);
                $documentIds[] = $current_id;
            }
        }

        $success = true;
        if (count($documentIds) > 0) $att_documents = implode(",",$documentIds); else $att_documents = "";
        $S_Data = $request->getAll();
        $Send_Emails[] = array("subject"=>$request->get('subject'),"description"=>$S_Data['description'],"att_documents"=>$att_documents);
        $post_data = $request->getAll();

        foreach ($toMailNamesList AS $pid => $Emails_Data){
            foreach ($Emails_Data AS $Email_Data){
                $SendMail[$Email_Data["sid"]][] = $Email_Data;
            }
        }
        if (count($toMailNamesListCC) > 0){
            foreach ($toMailNamesListCC AS $Emails_Data){
                foreach ($Emails_Data AS $EId => $Email_Data){
                    $EmailCCBCC[$Email_Data["sid"]]["cc"][] = $Email_Data;
                }
            } 
        }
        if (count($toMailNamesListBCC) > 0){
            foreach ($toMailNamesListBCC AS $Emails_Data){
                foreach ($Emails_Data AS $EId => $Email_Data){
                    $EmailCCBCC[$Email_Data["sid"]]["bcc"][] = $Email_Data;
                }
            } 
        }                
        $esentid = $this->saveEmails($Send_Emails,$SendMail,$EmailCCBCC,$language,$pdf_template_ids,$pdflanguage,$ids_for_pdf);
        if ($esentid){
            $message = $EMAILMaker->getEmailsInfo($esentid); 
        } 
        $viewer->assign('SUCCESS', $success);
        $viewer->assign('MESSAGE', $message);
        $loadRelatedList = $request->get('related_load');
        if(!empty($loadRelatedList)){
            $viewer->assign('RELATED_LOAD',true);
        }        
        $viewer->view('SendEmailResult.tpl', $moduleName);
    }

    public function saveEmails($Send_Emails,$SendMail,$EmailCCBCC,$language,$pdf_template_ids,$pdflanguage,$ids_for_pdf){
        $esentid = false;
        $adb = PearDatabase::getInstance();
        $e_focus = CRMEntity::getInstance("Emails");
        $date_start = date(getNewDisplayDate());
        $actual_time = time();
        $optimalized_time = ceil($actual_time/900) *900;
        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
        $currentUserModel = Users_Record_Model::getCurrentUserModel();
        $current_user_id = $currentUserModel->getId();
        
        if (count($Send_Emails) > 0){
            foreach ($Send_Emails AS $SED){
                $email_send_date = "";
                $related_to = "";
                $sql = "INSERT INTO vtiger_emakertemplates_sent (from_name,from_email,subject,body,type,ids_for_pdf,pdf_template_ids,pdf_language,userid,att_documents,drip_group,saved_drip_delay,drip_delay,total_sent_emails,related_to,pmodule,language) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $result = $adb->pquery($sql,array($this->from_name,$this->from_email,$SED["subject"],$SED["description"],'1',$ids_for_pdf,$pdf_template_ids,$pdflanguage,$current_user_id,$SED["att_documents"],$drip_group_id,"","","0",$related_to,$pmodule,$language));
                $esentid = $adb->database->Insert_ID("vtiger_emakertemplates_sent");
                $total_emails = 0;
                $CEmails = array();
                $Email_IDs_Array = array();
                        
                foreach($SendMail AS $pid => $PidsData) {
                    $cc = $bcc = $cc_ids = $bcc_ids ="";
                    if (count($EmailCCBCC[$pid]) > 0) {
                        foreach($EmailCCBCC[$pid] AS $c_type => $C_Fields) {
                            foreach($C_Fields AS $C_Field) {
                                $CEmails[$pid][$c_type][] = $C_Field["value"]; 
                                if ($C_Field["recordid"] != "0" && $C_Field["recordid"] != "")  $Email_IDs_Array[$pid][$c_type][] = $C_Field["recordid"];
                            }   
                        }     

                        if (count($CEmails[$pid]["cc"]) > 0) 
                            $cc = implode(", ",$CEmails[$pid]["cc"]);
                        if (count($Email_IDs_Array[$pid]["cc"]) > 0)
                            $cc_ids = implode(", ",$Email_IDs_Array[$pid]["cc"]);
                        if (count($CEmails[$pid]["bcc"]) > 0)
                            $bcc = implode(", ",$CEmails[$pid]["bcc"]);
                        if (count($Email_IDs_Array[$pid]["bcc"]) > 0)
                            $bcc_ids = implode(", ",$Email_IDs_Array[$pid]["bcc"]);
                    } 

                    foreach($PidsData AS $Email_Data) {
                        $Inserted_Emails = array();

                        $focus = clone $e_focus; 

                        $to_email = $Email_Data["id"]; 
                        $mycrmid = $Email_Data["recordid"];
                        $email_address = $Email_Data["value"];
                        if ($mycrmid == "0") $mycrmid = "";

                        $focus->column_fields["assigned_user_id"]=$current_user_id;
                        $focus->column_fields["activitytype"]="Emails";
                        $focus->column_fields["date_start"]= $date_start;//This will be converted to db date format in save
                        $focus->column_fields["subject"] = $SED["subject"];
                        $focus->column_fields["description"] = $SED["description"];
                        $focus->column_fields["documentids"] = $SED["att_documents"];
                        $focus->column_fields["ccmail"] = $cc;
                        $focus->column_fields["bccmail"] = $bcc;
                        $focus->column_fields["parent_id"] = $mycrmid;

                        $saved_toid = "";
                       
                        if (trim($Email_Data["label"]) != "") {
                            $saved_toid = $Email_Data["label"]."<".$email_address.">"; 
                        } else {
                            $saved_toid = $email_address;
                        }
                        $focus->column_fields["saved_toid"] = $saved_toid;

                        $focus->save("Emails");

                        if ($mycrmid != "") {
                            $Inserted_Emails[] = $mycrmid; 

                            $rel_sql1 = 'DELETE FROM vtiger_seactivityrel WHERE crmid = ? AND activityid = ?';
                            $rel_sql2 = 'INSERT INTO vtiger_seactivityrel VALUES (?,?)';
                            $rel_params = array($mycrmid,$focus->id);
                            $adb->pquery($rel_sql1,$rel_params);
                            $adb->pquery($rel_sql2,$rel_params);
                        }
                        if (count($Email_IDs_Array[$pid]["cc"]) > 0) {
                            foreach ($Email_IDs_Array[$pid]["cc"] AS $email_crm_id) {
                                if (!in_array($email_crm_id,$Inserted_Emails)) {
                                    $Inserted_Emails[] = $email_crm_id; 
                                    $rel_sql_2 = 'insert into vtiger_seactivityrel values(?,?)';
                                        $rel_params_2 = array($email_crm_id,$focus->id);
                                        $adb->pquery($rel_sql_2,$rel_params_2);
                                }
                            }
                        }
                        if (count($Email_IDs_Array[$pid]["bcc"]) > 0) {
                            foreach ($Email_IDs_Array[$pid]["bcc"] AS $email_crm_id) {
                                if (!in_array($email_crm_id,$Inserted_Emails)) {
                                    $Inserted_Emails[] = $email_crm_id;
                                    $rel_sql_3 = 'insert into vtiger_seactivityrel values(?,?)';
                                            $rel_params_3 = array($email_crm_id,$focus->id);
                                            $adb->pquery($rel_sql_3,$rel_params_3);
                                }    
                            }
                        }
                        
                        $sql2 = "INSERT INTO vtiger_emakertemplates_emails (esentid,pid,email,email_address,cc,bcc,cc_ids,bcc_ids,status,parent_id,email_send_date) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                        $adb->pquery($sql2,array($esentid,$pid,$to_email,$email_address,$cc,$bcc,$cc_ids,$bcc_ids,"0",$focus->id,$email_send_date));
                        $total_emails++;

                        unset($focus);
                        unset($Inserted_Emails);
                    } 
                }
                $sql3 = "UPDATE vtiger_emakertemplates_sent SET total_emails = ?, attachments = ? WHERE esentid = ?";
                $adb->pquery($sql3,array($total_emails,$attachments,$esentid));
            }
        }
        return $esentid;
    }
    public function checkUploadSize($documentIds = false){
        $totalFileSize = 0;
        if (!empty ($_FILES)) {
                foreach ($_FILES as $fileDetails) {
                        $totalFileSize = $totalFileSize + (int) $fileDetails['size'];
                }
        }
        if (!empty ($documentIds)) {
                $count = count($documentIds);
                for ($i=0; $i<$count; $i++) {
                        $documentRecordModel = Vtiger_Record_Model::getInstanceById($documentIds[$i], 'Documents');
                        $totalFileSize = $totalFileSize + (int) $documentRecordModel->get('filesize');
                }
        }

        if ($totalFileSize > vglobal('upload_maxsize')) {
                return false;
        }
        return true;
    }

    public function getRecordsListFromRequest(Vtiger_Request $request){
        $cvId = $request->get('viewname');
        $selectedIds = $request->get('selected_ids');
        $excludedIds = $request->get('excluded_ids');
        if(!empty($selectedIds) && $selectedIds != 'all'){
                if(!empty($selectedIds) && count($selectedIds) > 0) {
                        return $selectedIds;
                }
        }
        if($selectedIds == 'all'){
            $sourceRecord = $request->get('sourceRecord');
            $sourceModule = $request->get('sourceModule');
            if ($sourceRecord && $sourceModule) {
                    $sourceRecordModel = Vtiger_Record_Model::getInstanceById($sourceRecord, $sourceModule);
                    return $sourceRecordModel->getSelectedIdsList($request->get('parentModule'), $excludedIds);
            }

            $customViewModel = CustomView_Record_Model::getInstanceById($cvId);
            if($customViewModel) {
                        $searchKey = $request->get('search_key');
                        $searchValue = $request->get('search_value');
                        $operator = $request->get('operator');
                if(!empty($operator)) {
                    $customViewModel->set('operator', $operator);
                    $customViewModel->set('search_key', $searchKey);
                    $customViewModel->set('search_value', $searchValue);
                }
                        return $customViewModel->getRecordIds($excludedIds);
            }
        }
        return array();
    }
    function getHeaderScripts(Vtiger_Request $request){
        $headerScriptInstances = parent::getHeaderScripts($request);
        $moduleName = $request->getModule();

        $jsFileNames = array(
                "modules.EMAILMaker.resources.ckeditor.ckeditor",
                "libraries.jquery.ckeditor.adapters.jquery",
                'modules.Vtiger.resources.validator.BaseValidator',
                'modules.Vtiger.resources.validator.FieldValidator',
                "modules.EMAILMaker.resources.SendEmail",
                "modules.Emails.resources.EmailPreview",
                'modules.Vtiger.resources.Popup',
                'modules.Vtiger.resources.Vtiger',
                'libraries.jquery.jquery_windowmsg',
                'libraries.jquery.multiplefileupload.jquery_MultiFile'
        );

        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
        return $headerScriptInstances;
    }   
    function uploadAndSaveFile($file_details){
        global $log;
        $log->debug("Entering into uploadAndSaveFile($file_details) method.");
        $adb = PearDatabase::getInstance();
        global $upload_badext;
        $date_var = date("Y-m-d H:i:s");
        $current_user = Users_Record_Model::getCurrentUserModel();
        $ownerid = $current_user->id;

        if (isset($file_details['original_name']) && $file_details['original_name'] != null)
            $file_name = $file_details['original_name'];
        else
            $file_name = $file_details['name'];

        $binFile = sanitizeUploadFileName($file_name, $upload_badext);

        $current_id = $adb->getUniqueID("vtiger_crmentity");

        $filename = ltrim(basename(" " . $binFile)); //allowed filename like UTF-8 characters
        $filetype = $file_details['type'];
        $filesize = $file_details['size'];
        $filetmp_name = $file_details['tmp_name'];

        $upload_file_path = decideFilePath();
        $upload_status = move_uploaded_file($filetmp_name, $upload_file_path . $current_id . "_" . $binFile);

        $save_file = 'true';

        if ($save_file == 'true' && $upload_status == 'true'){
                //This is only to update the attached filename in the vtiger_notes vtiger_table for the Notes module
                $params1 = array($current_id, $current_user->id, $ownerid, $module . " Attachment", "", $adb->formatDate($date_var, true), $adb->formatDate($date_var, true));
                $adb->pquery("insert into vtiger_crmentity (crmid,smcreatorid,smownerid,setype,description,createdtime,modifiedtime) values(?, ?, ?, ?, ?, ?, ?)", $params1);
                $adb->pquery("insert into vtiger_attachments(attachmentsid, name, description, type, path) values(?, ?, ?, ?, ?)", array($current_id, $filename, "", $filetype, $upload_file_path));
                return $current_id;
        } else {
                $log->debug("Skip the save attachment process.");
                return false;
        }
    }
}