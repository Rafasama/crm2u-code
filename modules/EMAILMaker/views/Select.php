<?php
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ******************************************************************************* */

class EMAILMaker_Select_View extends Vtiger_Index_View {
    public $cu_language = "";     
    public function preProcess(Vtiger_Request $request, $display = true){
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
            if (!$permission) {
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
    public function process(Vtiger_Request $request){
        EMAILMaker_Debugger_Model::GetInstance()->Init();

        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
        if ($EMAILMaker->CheckPermissions("EDIT") == false)
            $EMAILMaker->DieDuePermission();

        $viewer = $this->getViewer($request);

        if ($EMAILMaker->GetVersionType() == "professional")
            $type = "professional";
        else
            $type = "basic";
        
        $version_type = ucfirst($EMAILMaker->GetVersionType());
        $viewer->assign("VERSION", $version_type . " " . EMAILMaker_Version_Helper::$version);
        $source_path=getcwd()."/modules/EMAILMaker/templates";

        $dir_iterator = new RecursiveDirectoryIterator($source_path);
        $iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);
        
        $i = 0;
        $p_errors = 0;
        
        foreach ($iterator as $folder){
            $folder_name=substr($folder, strlen($source_path)+1);
            if($folder->isDir()) { 
                $other_folder = strpos($folder_name, "/");
                if ($other_folder === false && file_exists($folder."/index.html") && file_exists($folder."/image.png")) {
                    $EmailTemplates[] = $folder_name;
                }
            }
            $i++;         
        }
        
        asort($EmailTemplates);
        $viewer->assign("EMAILTEMPLATESPATH", $source_path);
        $viewer->assign("EMAILTEMPLATES", $EmailTemplates);
        $Themes_Data = $EMAILMaker->GetThemesData();
        $viewer->assign("EMAILTHEMES", $Themes_Data);
        $category = getParentTab();
        $viewer->assign("CATEGORY", $category);
        $viewer->view('Select.tpl', 'EMAILMaker');
    }
    function getHeaderScripts(Vtiger_Request $request){
        $headerScriptInstances = parent::getHeaderScripts($request);
        $moduleName = $request->getModule();

        $jsFileNames = array(
            "modules.EMAILMaker.resources.ckeditor.ckeditor",
            "libraries.jquery.ckeditor.adapters.jquery",
            "libraries.jquery.jquery_windowmsg"
        );
        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
        return $headerScriptInstances;
    }
}