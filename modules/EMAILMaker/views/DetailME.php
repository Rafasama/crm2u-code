<?php
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ******************************************************************************* */

class EMAILMaker_DetailME_View extends Vtiger_Index_View {    
    var $MassEmailRecordModel = false;    
    function __construct() {
        parent::__construct();
        $this->exposeMethod('RecipientsList');
    }    
    public function preProcess(Vtiger_Request $request, $display = true){
        $viewer = $this->getViewer($request);
        $moduleName = $request->getModule();

        $viewer->assign('QUALIFIED_MODULE', $moduleName);
        Vtiger_Basic_View::preProcess($request, false);
        $viewer = $this->getViewer($request);
        
        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
        $moduleName = $request->getModule();
        
        if (!empty($moduleName)){
            $moduleModel = new EMAILMaker_EMAILMaker_Model('EMAILMaker');
            $currentUser = Users_Record_Model::getCurrentUserModel();
            $userPrivilegesModel = Users_Privileges_Model::getInstanceById($currentUser->getId());
            $permission = $userPrivilegesModel->hasModulePermission($moduleModel->getId());
            $viewer->assign('MODULE', $moduleName);
            if (!$permission) {
                $viewer->assign('MESSAGE', 'LBL_PERMISSION_DENIED');
                $viewer->view('OperationNotPermitted.tpl', $moduleName);
                exit;
            }
            $linkParams = array('MODULE' => $moduleName, 'ACTION' => $request->get('view'));
            $linkModels = $moduleModel->getSideBarLinks($linkParams);
            $viewer->assign('QUICK_LINKS', $linkModels);
        }
        if ($request->has('record') && !$request->isEmpty('record')){
            $record = $request->get('record');            
        }
        if ($EMAILMaker->CheckPermissions("EDIT") && $EMAILMaker->GetVersionType() != "deactivate"){
            $viewer->assign("EDIT", "permitted");
            $viewer->assign("IMPORT", "yes");
        }
        if ($EMAILMaker->CheckPermissions("DELETE") && $EMAILMaker->GetVersionType() != "deactivate"){
            $viewer->assign("DELETE", "permitted");
        }
        $viewer->assign('CURRENT_USER_MODEL', Users_Record_Model::getCurrentUserModel());
        $viewer->assign('CURRENT_VIEW', $request->get('view'));
        $viewer->assign('MODULE_NAME', $moduleName);
        $version_type = $EMAILMaker->GetVersionType();
        $viewer->assign("VERSION", $version_type . " " . EMAILMaker_Version_Helper::$version);
   
        if ($request->has('record') && !$request->isEmpty('record')){
            $record = $request->get('record');
            $this->MassEmailRecordModel = EMAILMaker_RecordME_Model::getInstance($record);
            $viewer->assign("MASSEMAILRECORDMODEL", $this->MassEmailRecordModel);
            $viewer->assign("TEMPLATENAME", $this->MassEmailRecordModel->get('me_subject'));
            $viewer->assign("MODULENAME", $this->MassEmailRecordModel->getFilterLink());
            $viewer->assign("RECORDID", $this->MassEmailRecordModel->getId());
        }        
        $viewer->assign('IS_EMAIL_CAMPAIGN', 'yes');
        if ($display){                               
            $this->preProcessDisplay($request);
        }
    }    
    function preProcessTplName(Vtiger_Request $request){
		return 'DetailViewPreProcess.tpl';
    }    
    function process(Vtiger_Request $request){
        $mode = $request->getMode();
        if(!empty($mode)){
                echo $this->invokeExposedMethod($mode, $request);
                return;
        }
        echo $this->showMassEmailDetailView($request);
    }        
    public function showMassEmailDetailView(Vtiger_Request $request){
        EMAILMaker_Debugger_Model::GetInstance()->Init();    
        $adb = PearDatabase::getInstance();        
        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
        if ($EMAILMaker->CheckPermissions("DETAIL") == false)
            $EMAILMaker->DieDuePermission();

        $viewer = $this->getViewer($request);

        if ($request->has('record') && !$request->isEmpty('record')){
            $record = $request->get('record');
            if (!$this->MassEmailRecordModel) $this->MassEmailRecordModel = EMAILMaker_RecordME_Model::getInstance($record);
            $viewer->assign("MASSEMAILRECORDMODEL", $this->MassEmailRecordModel);
        }        
        $category = getParentTab();
        $viewer->assign("CATEGORY", $category);
        $viewer->assign("IS_MASSEMAIL", "yes");
        $status = $this->MassEmailRecordModel->get('status');
        
        if ($status != "not started"){
            $width = "250px";
            $height = "240px";
            $left = $right = $top = $bottom = "10px";
            $title = $target_val = "";
            $cache_file_name = $tmp_dir."email_analyse_".$record;
            $html_image_name = "email_analyse_".$record;
            $esentid = $this->MassEmailRecordModel->get('esentid');
            $total_entries = $this->MassEmailRecordModel->get('total_entries'); 
            $unsubscribes = $this->MassEmailRecordModel->get('unsubscribes'); 
            $result2 = $adb->pquery("SELECT count(emailid) as total_send_emails FROM vtiger_emakertemplates_emails WHERE esentid = ? AND status = 1 AND (error IS NULL OR error = '0') GROUP BY esentid", array($esentid)); 
            $total_send_emails = $adb->query_result($result2,0,"total_send_emails"); 
            $result3 = $adb->pquery("SELECT count(emailid) as errors FROM vtiger_emakertemplates_emails WHERE esentid = ? AND status = 1 AND error IS NOT NULL AND error != '0' AND error != 'unsubscribes' GROUP BY esentid", array($esentid)); 
            $total_errors = $adb->query_result($result3,0,"errors"); 
            $result4 = $adb->pquery("SELECT count(emailid) as total_not_send_emails FROM vtiger_emakertemplates_emails WHERE esentid = ? AND status = 0 GROUP BY esentid", array($esentid)); 
            $total_not_send_emails = $adb->query_result($result4,0,"total_not_send_emails"); 
            $result5 = $adb->pquery("SELECT count(emailid) as total_deleted_recipients FROM vtiger_emakertemplates_emails WHERE esentid = ? AND status = 0 AND deleted = 1", array($esentid)); 
            $total_deleted_recipients = $adb->query_result($result5,0,"total_deleted_recipients"); 

            $sql6 = "SELECT count(track.access_count) as unique_open, sum(track.access_count) as total_open FROM vtiger_emakertemplates_emails AS emails 
                    INNER JOIN vtiger_email_track as track ON track.mailid = emails.parent_id
                    WHERE emails.esentid = ? AND emails.status = 1";
            $result5 = $adb->pquery($sql6, array($esentid)); 
            $unique_open = $adb->query_result($result5,0,"unique_open");
            $total_open = $adb->query_result($result5,0,"total_open");

            $total_emails = $this->MassEmailRecordModel->get('total_emails');
            $without_email_address = $total_entries - $total_emails - $unsubscribes;

            $title = vtranslate("LBL_GRAPH1_TITLE","EMAILMaker")." ".$total_entries;

            if ($total_send_emails != "" && $total_send_emails > 0) $Pie1_Entries[] = array("label" => "LBL_TOTAL_SENT_EMAILS", "value" => $total_send_emails); 
            if ($total_not_send_emails != "" && $total_not_send_emails > 0) $Pie1_Entries[] = array("label" => "LBL_TOTAL_EMAILS_WILL_BE_SENT", "value" => $total_not_send_emails); 

            if ($unsubscribes == "") $unsubscribes = 0;  
            $Pie1_Entries[] = array("label" => "LBL_UNSUBSCRIBES","value" => $unsubscribes);
            if ($without_email_address != "" && $without_email_address > 0) $Pie1_Entries[] = array("label" => "LBL_WITHOUT_EMAIL_ADDRESS", "value" => $without_email_address);

            if ($total_errors != "" && $total_errors > 0) $Pie1_Entries[] = array("label" => "LBL_TOTAL_EMAILS_COULD_NOT_BE_SENT", "value" => $total_errors); 
            if ($total_deleted_recipients != "" && $total_deleted_recipients > 0) $Pie1_Entries[] = array("label" => "LBL_TOTAL_EMAILS_NOT_BEEN_SENT", "value" => $total_deleted_recipients);

            $viewer->assign("TOTAL_ENTRIES", $total_entries);                            
            $viewer->assign("CHARTDATA1", $Pie1_Entries);
            
            if ($total_open > 0){
                $Pie2_Entries = array("0" => array("label" => vtranslate("LBL_TOTAL_OPEN","EMAILMaker"),"value" => $total_open), 
                                      "1" => array("label" => vtranslate("LBL_UNIQUE_OPEN","EMAILMaker"),"value" => $unique_open)); 
                $viewer->assign("CHARTDATA2", $Pie2_Entries);
            }
        }
        $viewer->view('DetailView.tpl', 'EMAILMaker'); 
    }    
    
    public function postProcess(Vtiger_Request $request) {
		$recordId = $request->get('record');
		$moduleName = $request->getModule();
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);

                if (!$this->MassEmailRecordModel) $this->MassEmailRecordModel = EMAILMaker_RecordME_Model::getInstance($record);
                
                $detailViewLinkParams = array('MODULE'=>$moduleName,'RECORD'=>$recordId);
		$detailViewLinks = $this->MassEmailRecordModel->getDetailViewRelatedLinks($detailViewLinkParams);              
                
		$selectedTabLabel = $request->get('tab_label');

		if(empty($selectedTabLabel)) {
                          $selectedTabLabel = vtranslate('LBL_CAMPAIGN_DETAIL', $moduleName);
                }

		$viewer = $this->getViewer($request);

		$viewer->assign('SELECTED_TAB_LABEL', $selectedTabLabel);
		$viewer->assign('MODULE_MODEL', $moduleModel);
		$viewer->assign('DETAILVIEW_LINKS', $detailViewLinks);

		$viewer->view('DetailViewPostProcess.tpl', $moduleName);

		parent::postProcess($request);
	}
    
    function getHeaderScripts(Vtiger_Request $request){
        $headerScriptInstances = parent::getHeaderScripts($request);
        $moduleName = $request->getModule();

        $jsFileNames = array(
           "layouts.vlayout.modules.Vtiger.resources.Detail",
           "layouts.vlayout.modules.EMAILMaker.resources.DetailME",
           "layouts.vlayout.modules.Vtiger.resources.RelatedList"
        );

        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
        return $headerScriptInstances;
    }
    
    public function RecipientsList(Vtiger_Request $request) {
        $moduleName = $request->getModule();
        $moduleModel = Vtiger_Module_Model::getInstance($moduleName);
        $recordId = $request->get('record');

        $pageNumber = $request->get('page');
        if(empty ($pageNumber)) {
                $pageNumber = 1;
        }
        $pagingModel = new Vtiger_Paging_Model();
        $pagingModel->set('page', $pageNumber);
        //$pagingModel->set('limit', 10);

        if (!$this->MassEmailRecordModel) $this->MassEmailRecordModel = EMAILMaker_RecordME_Model::getInstance($record);
        //$recordModel = $this->MassEmailRecordModel->getRecord();
        //$moduleModel = $recordModel->getModule();

        $relatedRecipients = $moduleModel->getMERecipientsList('', $pagingModel, 'all', $recordId);

        $viewer = $this->getViewer($request);
        //->assign('RECORD', $recordModel);
        $viewer->assign('MODULE_NAME', $moduleName);
        $viewer->assign('PAGING', $pagingModel);
        $viewer->assign('PAGE_NUMBER', $pageNumber);
        $viewer->assign('RECIPIENTS', $relatedRecipients);

        
        
        $recipients_count = count($relatedRecipients);
        $viewer->assign('RECIPIENTS_ENTIRES_COUNT', $recipients_count);
        
        $total_entries = $moduleModel->getMERecipientsListCount($recordId);
        $viewer->assign('TOTAL_ENTRIES', $total_entries);
        
        
        $pageLimit = $pagingModel->getPageLimit();
        $pageCount = ceil((int) $total_entries / (int) $pageLimit);

        if($pageCount == 0){
                $pageCount = 1;
        }
        $viewer->assign('PAGE_COUNT', $pageCount);
        
        $Header_Fields = array("parent_id"=>array("label" => "LBL_RECIPIENT"),
                                "email_address"=>array("label" => "SINGLE_Emails"),
                                "subject"=>array("label" => "Subject"),
                                "date_start"=>array("label" => "Date Sent"),
                                "time_start"=>array("label" => "Time Sent"),
                                "status"=>array("label" => "Status"),
                                "access_count" => array("label" => "Access Count"));
        
        $emailModuleModel = Vtiger_Module_Model::getInstance("Emails");
        foreach ($Header_Fields AS $hfkey => $HFData) {
            $Header_Fields[$hfkey]["field"] = Vtiger_Field_Model::getInstance($hfkey, $emailModuleModel);
        }
                            
        $viewer->assign('HEADER_FIELDS', $Header_Fields);
        
        $viewer->assign('CURRENT_USER_MODEL', Users_Record_Model::getCurrentUserModel());
        
/*
        echo "<pre>";
        print_r($relatedRecipients);
        echo "</pre>";
*/
        return $viewer->view('RecipientsList.tpl', $moduleName, true);
    }
	
}