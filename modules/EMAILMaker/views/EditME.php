<?php
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ******************************************************************************* */

class EMAILMaker_EditME_View extends EMAILMaker_Edit_View {

    public function process(Vtiger_Request $request) {
        $mode = $request->getMode();
        
        $currentUser = Users_Record_Model::getCurrentUserModel();
        $viewer = $this->getViewer($request);
        $moduleName = $request->getModule();
        $qualifiedModuleName = $request->getModule(false);
        $templateid = "";
        $recordId = $request->get('record');
        if ($recordId) {
            $MassEmailRecordModel = EMAILMaker_RecordME_Model::getInstance($recordId);
            $viewer->assign('RECORDID', $recordId);
            $viewer->assign('MODULE_MODEL', $MassEmailRecordModel->getModule());
            $viewer->assign('MODE', 'edit');
        } else {            
            if ($request->has('templateid') && !$request->isEmpty('templateid')) {
                $templateid = $request->get("templateid");
            }             
            $MassEmailRecordModel = EMAILMaker_RecordME_Model::getCleanInstance($templateid);
        }

        $selectedModule = $request->get('source_module');
        if(!empty($selectedModule)) {
            $viewer->assign('SELECTED_MODULE', $selectedModule);
        }

        $viewer->assign('MASSEMAILRECORD_MODEL', $MassEmailRecordModel);
        $available_modules = $MassEmailRecordModel->getAvailableModules();   
        $viewer->assign('AVAILABLE_MODULES', $available_modules);
        $module_filters = EMAILMaker_RecordME_Model::getModuleFilters($MassEmailRecordModel->get("module_name"), $MassEmailRecordModel->get("listid"));   
        $viewer->assign("CUSTOMVIEW_OPTION", $module_filters);    
        $module_columns = EMAILMaker_RecordME_Model::getModuleColumns($MassEmailRecordModel->get("module_name"), $MassEmailRecordModel->get("email_fieldname"));   
        $viewer->assign("COLUMNS_OPTION", $module_columns);  
        $viewer->assign('MODULE', $moduleName);
        $viewer->assign('QUALIFIED_MODULE', $qualifiedModuleName);
        $viewer->assign('CURRENT_USER', $currentUser);
        $admin = Users::getActiveAdminUser();
        $viewer->assign('ACTIVE_ADMIN', $admin);
        $viewer->assign('STEP', '1');        
        $date_format = $currentUser->get('date_format');
        $viewer->assign('DATEFORMAT', $date_format);        
        $hour_format = $currentUser->get('hour_format');
        $tf = "";
        $Hours = array();
        for($h=0; $h<24; $h++) {
            $hv = $h;
            if ($hour_format == 12) {
                if ($h < 13) {
                    $tf = " am";
                    $hf = ($h==0?12:$h);
                } else {
                    $hf = $h - 12; 
                    $tf = " pm";
                }
            } else {
                $hf = $h;
            }            
            if(strlen(trim($hf)) < 2) $hf = '0'.$hf;            
            if(strlen(trim($h)) < 2) $hv = '0'.$h;            
            $Hours[$hv.":00"] = $hf.":00".$tf;
        }
        $viewer->assign('HOURS', $Hours);    
        
        $All_Languages = Vtiger_Language_Handler::getAllLanguages();
        $viewer->assign('EMAIL_LANGUAGES', $All_Languages);    
        
        
        $viewer->view('EditME.tpl', $qualifiedModuleName);
    }

    public function preProcess(Vtiger_Request $request) {
        parent::preProcess($request);
        $viewer = $this->getViewer($request);
        $recordId = $request->get('record');
        $viewer->assign('RECORDID', $recordId);
        $viewer->assign('RECORD_MODE', $request->getMode());
        $viewer->view('EditMEHeader.tpl', $request->getModule(false));
    }

    public function getHeaderScripts(Vtiger_Request $request) {
        $headerScriptInstances = parent::getHeaderScripts($request);
        $moduleName = $request->getModule();
        $jsFileNames = array(
            "modules.Vtiger.resources.Edit",
            "modules.$moduleName.resources.EditME",
            "modules.$moduleName.resources.EditME1",
            "modules.$moduleName.resources.EditME2",
            "modules.$moduleName.resources.EditME3",
            "modules.$moduleName.resources.EditME4",
            "modules.$moduleName.resources.EditME5",
        );
        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
        return $headerScriptInstances;
    }    
}