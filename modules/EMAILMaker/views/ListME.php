<?php
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ******************************************************************************* */

class EMAILMaker_ListME_View extends EMAILMaker_List_View {

    protected $listViewLinks = false;
    
    public function __construct(){
        parent::__construct();
    }

    function preProcess (Vtiger_Request $request, $display=true){
            parent::preProcess($request, false); 
            $EMAILMaker = new EMAILMaker_EMAILMaker_Model();            
            $viewer = $this->getViewer ($request);
            $moduleName = $request->getModule();

            $this->initializeListViewContents($request, $viewer, $EMAILMaker);
            $viewer->assign('SOURCE_MODULE', $sourceModule);
            
            if($display) {
                $this->preProcessDisplay($request);
            }
    }    
    function preProcessTplName(Vtiger_Request $request){
            return 'ListMEPreProcess.tpl';
    }        
    public function process(Vtiger_Request $request){  
            EMAILMaker_Debugger_Model::GetInstance()->Init();
            $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
            if ($EMAILMaker->CheckPermissions("DETAIL") == false)
                $EMAILMaker->DieDuePermission();
            $viewer = $this->getViewer($request);          
            $version_type = $EMAILMaker->GetVersionType();
            $license_key = $EMAILMaker->GetLicenseKey();
            $viewer->assign("VERSION_TYPE", $version_type);
            $viewer->assign("VERSION", ucfirst($version_type) . " " . EMAILMaker_Version_Helper::$version);
            $viewer->assign("LICENSE_KEY", $license_key);
            $viewer->assign("EXPORT", "no");
            $viewer->assign("IMPORT", "no");
            $this->initializeListViewContents($request, $viewer, $EMAILMaker);
            $viewer->view("ListMEContents.tpl", 'EMAILMaker');
    }    
    public function initializeListViewContents(Vtiger_Request $request, Vtiger_Viewer $viewer, $EMAILMaker){            
            if ($request->has('record') && !$request->isEmpty('record')) {
                $templateid = $request->get('record');
            } else {
                $templateid = "";
            }       
            if ($EMAILMaker->CheckPermissions("EDIT") && $EMAILMaker->GetVersionType() != "deactivate"){
                $viewer->assign("EDIT", "permitted");
            }
            if ($EMAILMaker->CheckPermissions("DELETE") && $EMAILMaker->GetVersionType() != "deactivate"){
                $viewer->assign("DELETE", "permitted");
            }        
            $orderby = "meid";
            $sortorder = "desc";

            if ($request->has('sortorder') && !$request->isEmpty('sortorder')){
                $sortorder = $request->get('sortorder');
            }
            if ($request->has('orderby') && !$request->isEmpty('orderby')){
                $orderby= $request->get('orderby');
            }            
            $pageNumber = $request->get('page');
            if(empty($pageNumber)){
                    $pageNumber = 1;
            }
            $pagingModel = new Vtiger_Paging_Model();
            $pagingModel->set('page', $pageNumber);
            $viewer->assign("ORDER_BY", $orderby);
            $viewer->assign("SORT_ORDER", $sortorder);
            $listViewCount = $EMAILMaker->geEmailCampaignsCount($templateid);
            $return_data = $EMAILMaker->geEmailCampaignsData($pagingModel,$templateid,$orderby,$sortorder);
            $listview_entries_count = count($return_data);
            $viewer->assign("MASSEMAILS", $return_data);
            $current_user = Users_Record_Model::getCurrentUserModel();
            if (is_admin($current_user)){
                $viewer->assign('IS_ADMIN', '1');
            }
            $is_delay_active = $EMAILMaker->controlActiveDelay();
            $viewer->assign("IS_DELAY_ACTIVE", $is_delay_active);
            $Header_Values = array("me_subject" => "LBL_EMAIL_SUBJECT",
                                   "list_name" => "LBL_LIST_NAME",
                                   "total_entries" => "LBL_RECIPIENTS",
                                   "total_sent_emails" => "LBL_EMAILS", 
                                   "unsubscribes" => "LBL_UNSUBSCRIBES",
                                   "start_of" => "LBL_START_OF",
                                   "status" => "status");
            $viewer->assign('HEADER_VALUES', $Header_Values);
            $linkParams = array('MODULE' => $moduleName, 'ACTION' => $request->get('view'));
            $linkModels = $EMAILMaker->getListViewLinks($linkParams);
            $viewer->assign('LISTVIEW_MASSACTIONS', $linkModels['LISTVIEWMASSACTION']);
            $viewer->assign('LISTVIEW_LINKS', $linkModels);
            $totalCount = $listViewCount;
            $pageLimit = $pagingModel->getPageLimit();
            $pageCount = ceil((int) $totalCount / (int) $pageLimit);
            if($pageCount == 0){
                    $pageCount = 1;
            }
            $viewer->assign('PAGE_COUNT', $pageCount);
            $viewer->assign('LISTVIEW_COUNT', $totalCount);
            $viewer->assign('PAGE_NUMBER', $pageNumber);
            $viewer->assign('PAGING_MODEL', $pagingModel);
            $viewer->assign('TEMPLATEID', $templateid);
            $viewer->assign('LISTVIEW_ENTIRES_COUNT', $listview_entries_count);
    }    
    function getHeaderScripts(Vtiger_Request $request) {
            $headerScriptInstances = parent::getHeaderScripts($request);
            $moduleName = $request->getModule();
            $jsFileNames = array(
                "layouts.vlayout.modules.Vtiger.resources.List",
                "layouts.vlayout.modules.EMAILMaker.resources.ListME"
            );
            $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
            $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
            return $headerScriptInstances;
    }
}