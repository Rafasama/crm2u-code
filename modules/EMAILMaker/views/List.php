<?php
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ******************************************************************************* */

class EMAILMaker_List_View extends Vtiger_Index_View {

    protected $listViewLinks = false;
    
    public function __construct() {
        parent::__construct();
        $this->exposeMethod('getList');
    }

    public function preProcess(Vtiger_Request $request, $display = true) {
        $viewer = $this->getViewer($request);
        $moduleName = $request->getModule();
        $viewer->assign('QUALIFIED_MODULE', $moduleName);
        Vtiger_Basic_View::preProcess($request, false);
        $viewer = $this->getViewer($request);

        $moduleName = $request->getModule();
        if (!empty($moduleName)){
            $moduleModel = new EMAILMaker_EMAILMaker_Model('EMAILMaker');
            $currentUser = Users_Record_Model::getCurrentUserModel();
            $userPrivilegesModel = Users_Privileges_Model::getInstanceById($currentUser->getId());
            $permission = $userPrivilegesModel->hasModulePermission($moduleModel->getId());
            $viewer->assign('MODULE', $moduleName);

            if (!$permission){
                $viewer->assign('MESSAGE', 'LBL_PERMISSION_DENIED');
                $viewer->view('OperationNotPermitted.tpl', $moduleName);
                exit;
            }

            $linkParams = array('MODULE' => $moduleName, 'ACTION' => $request->get('view'));
            $linkModels = $moduleModel->getSideBarLinks($linkParams);
            $viewer->assign('QUICK_LINKS', $linkModels);
        }        
        $viewer->assign('CURRENT_USER_MODEL', Users_Record_Model::getCurrentUserModel());
        $viewer->assign('CURRENT_VIEW', $request->get('view'));
        if ($display){
            $this->preProcessDisplay($request);
        }
    }    
    public function postProcess(Vtiger_Request $request){
        $viewer = $this->getViewer($request);
        $viewer->view('IndexPostProcess.tpl');
        parent::postProcess($request);
    }
    public function process(Vtiger_Request $request){
        $viewer = $this->getViewer($request);
        $adb = PearDatabase::getInstance();
        $vcv = vglobal('vtiger_current_version');
        $result = @$adb->pquery("SELECT * FROM vtiger_emakertemplates_license",array());

        if ($result && $adb->num_rows($result) > 0) {
            $this->invokeExposedMethod('getList', $request);
        } else {
            $viewer->assign("STEP", "1");
            $viewer->assign("CURRENT_STEP", $current_step);
            $viewer->assign("TOTAL_STEPS", $total_steps);
            $viewer->assign("URL", vglobal("site_URL"));
            $company_details = Vtiger_CompanyDetails_Model::getInstanceById();
            $viewer->assign("COMPANY_DETAILS", $company_details);
            $viewer->view('Install.tpl', 'EMAILMaker');
        }
    }
    public function getList(Vtiger_Request $request){
        $l = new EMAILMaker_License_Action();
        $l->controlLicense();
        
        EMAILMaker_Debugger_Model::GetInstance()->Init();
        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
        
        if ($EMAILMaker->CheckPermissions("DETAIL") == false)
            $EMAILMaker->DieDuePermission();

        $adb = PearDatabase::getInstance();
        
        $viewer = $this->getViewer($request);
        $orderby = "templateid";
        $dir = "asc";

        if (isset($_REQUEST["dir"]) && $_REQUEST["dir"] == "desc")
            $dir = "desc";

        if (isset($_REQUEST["orderby"])) {
            switch ($_REQUEST["orderby"]) {
                case "name":
                    $orderby = "templatename";
                    break;
                default:
                    $orderby = $_REQUEST["orderby"];
                    break;
            }
        }

        $version_type = $EMAILMaker->GetVersionType();
        $license_key = $EMAILMaker->GetLicenseKey();

        $viewer->assign("VERSION_TYPE", $version_type);
        $viewer->assign("VERSION", ucfirst($version_type) . " " . EMAILMaker_Version_Helper::$version);
        $viewer->assign("LICENSE_KEY", $license_key);
        
        if ($EMAILMaker->CheckPermissions("EDIT")){
            $viewer->assign("EXPORT", "yes");
        }
        if ($EMAILMaker->CheckPermissions("EDIT") && $EMAILMaker->GetVersionType() != "deactivate" && $EMAILMaker->GetVersionType() != ""){
            $viewer->assign("EDIT", "permitted");
            $viewer->assign("IMPORT", "yes");
        }
        if ($EMAILMaker->CheckPermissions("DELETE") && $EMAILMaker->GetVersionType() != "deactivate" && $EMAILMaker->GetVersionType() != ""){
            $viewer->assign("DELETE", "permitted");
        }

        $viewer->assign("MOD", $mod_strings);
        $viewer->assign("APP", $app_strings);
        $viewer->assign("THEME", $theme);
        $viewer->assign("PARENTTAB", getParentTab());
        $viewer->assign("IMAGE_PATH", $image_path);
        $viewer->assign("ORDERBY", $orderby);
        $viewer->assign("DIR", $dir);
        
        $Search_Selectbox_Data = $EMAILMaker->getSearchSelectboxData();
        $viewer->assign("SEARCHSELECTBOXDATA", $Search_Selectbox_Data);
        
       
        $return_data = $EMAILMaker->GetListviewData($orderby, $dir, "", false, $request);

        
        $category = getParentTab();
        $viewer->assign("CATEGORY", $category);
        
        $current_user =  Users_Record_Model::getCurrentUserModel();

        $linkParams = array('MODULE' => $moduleName, 'ACTION' => $request->get('view'));
        $linkModels = $EMAILMaker->getListViewLinks($linkParams);
        $viewer->assign('LISTVIEW_MASSACTIONS', $linkModels['LISTVIEWMASSACTION']);
        
        $viewer->assign('LISTVIEW_LINKS', $linkModels);
       
        $tpl = "ListEMAILTemplates";
        if ($request->get('ajax') == "true")
            $tpl .= "Contents";

        if (is_admin($current_user)){
            $viewer->assign('IS_ADMIN', '1');
        }
        
        $WTemplateIds = array(); 
        $workflows_query = $EMAILMaker->geEmailWorkflowsQuery();
        $workflows_result = $adb->pquery($workflows_query,array()); 
        $workflows_num_rows = $adb->num_rows($workflows_result); 

        if ($workflows_num_rows > 0) {
            require_once('modules/EMAILMaker/workflow/VTEMAILMakerMailTask.php');

            for($i=0; $i<$workflows_num_rows; $i++) {
                $data = $adb->raw_query_result_rowdata($workflows_result, $i);
                $task = $data["task"];
                $taskObject = unserialize($task);
                $wtemplateid = $taskObject->template;
                if (!in_array($wtemplateid,$WTemplateIds)) {
                    $WTemplateIds[] = $wtemplateid;
                }

            }
        }

        $viewer->assign('WTEMPLATESIDS', $WTemplateIds);

        if ($request->has('search_workflow') && !$request->isEmpty('search_workflow')) {
            $search_workflow = $request->get('search_workflow');
            foreach ($return_data AS $n => $Data) {
                if ($search_workflow == "wf_0") {
                    if (in_array($Data["templateid"],$WTemplateIds)) {
                        echo " unset ".$Data["templateid"]."<br>";
                        unset($return_data[$n]);
                    }
                } else {
                    if (!in_array($Data["templateid"],$WTemplateIds)) {
                        unset($return_data[$n]);
                    }
                }   
            }
        }        
        
        $viewer->assign("EMAILTEMPLATES", $return_data);
        
        $sharing_types = Array(""=>"",
        "public" => vtranslate("PUBLIC_FILTER",'EMAILMaker'),
        "private" => vtranslate("PRIVATE_FILTER",'EMAILMaker'),
        "share" => vtranslate("SHARE_FILTER",'EMAILMaker'));
        $viewer->assign("SHARINGTYPES", $sharing_types);
        
        $Status = array(
        "status_1" => vtranslate("Active",'EMAILMaker'),
        "status_0" => vtranslate("Inactive",'EMAILMaker'));
        $viewer->assign("STATUSOPTIONS", $Status);
        
        $WF = array(
        "wf_1" => vtranslate("LBL_YES",'EMAILMaker'),
        "wf_0" => vtranslate("LBL_NO",'EMAILMaker'));
        $viewer->assign("WFOPTIONS", $WF);
        
        $Search_Types = array("templatename","module","category","description","sharingtype","owner","status","workflow");
        
        foreach ($Search_Types AS $st) {    
            $search_val = "";
            if ($request->has('search_'.$st) && !$request->isEmpty('search_'.$st)) {
                $search_val = $request->get('search_'.$st);
            }
            $viewer->assign("SEARCH".strtoupper($st)."VAL", $search_val);
        }
        
        
        $viewer->view($tpl.".tpl", 'EMAILMaker');
    }
    
    function getHeaderScripts(Vtiger_Request $request) {
        $headerScriptInstances = parent::getHeaderScripts($request);
        $moduleName = $request->getModule();

        $jsFileNames = array(
            "layouts.vlayout.modules.EMAILMaker.resources.License",
            "layouts.vlayout.modules.Vtiger.resources.List",
            "layouts.vlayout.modules.EMAILMaker.resources.List"
        );
        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
        return $headerScriptInstances;
    }
}