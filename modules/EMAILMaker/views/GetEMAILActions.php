<?php
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ******************************************************************************* */

class EMAILMaker_GetEMAILActions_View extends Vtiger_BasicAjax_View {

    public function process(Vtiger_Request $request){
        $current_user = $cu_model = Users_Record_Model::getCurrentUserModel();
        $currentLanguage = Vtiger_Language_Handler::getLanguage();        
        $adb = PearDatabase::getInstance();
        $mode = $request->get('mode');
        $viewer = $this->getViewer($request);
        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
        if ($EMAILMaker->CheckPermissions("DETAIL") == false) {
            $output = '<table border=0 cellspacing=0 cellpadding=5 width=100% align=center bgcolor=white>
              <tr>
                <td class="dvtCellInfo" style="width:100%;border-top:1px solid #DEDEDE;text-align:center;">
                  <strong>' . vtranslate("LBL_PERMISSION") . '</strong>
                </td>
              </tr>              		
              </table>';
            die($output);
        }
        
        $single_record = true;        
        $record = $request->get('record');
        $relmodule = getSalesEntityType($record);
        $viewer->assign('MODULE', $relmodule);
        $viewer->assign('ID', $record);
        if ($single_record) $viewer->assign('SINGLE_RECORD', 'yes');

        require('user_privileges/user_privileges_' . $current_user->id . '.php');

        if ($EMAILMaker->CheckPermissions("DETAIL")){
            $viewer->assign("ENABLE_EMAILMAKER", 'true');
        } else {
            $viewer->assign("ENABLE_EMAILMAKER", "false");
        }

        if (!isset($_SESSION["template_languages"]) || $_SESSION["template_languages"] == "") {
            $temp_res = $adb->pquery("SELECT label, prefix FROM vtiger_language WHERE active = ?",array('1'));
            while ($temp_row = $adb->fetchByAssoc($temp_res)) {
                $template_languages[$temp_row["prefix"]] = $temp_row["label"];
            }
            $_SESSION["template_languages"] = $template_languages;
        }
        $viewer->assign('TEMPLATE_LANGUAGES', $_SESSION["template_languages"]);
        $viewer->assign('CURRENT_LANGUAGE', $currentLanguage);
        $viewer->assign('IS_ADMIN', is_admin($current_user));

        $templates = $EMAILMaker->GetAvailableTemplatesArray($relmodule,false,$record);
        
        if (count($templates) > 0)
            $no_templates_exist = 0;
        else
            $no_templates_exist = 1;
        $viewer->assign('CRM_TEMPLATES', $templates);
        $viewer->assign('CRM_TEMPLATES_EXIST', $no_templates_exist);
        $viewer->assign('MODE', $mode);        
        $def_templateid = $EMAILMaker->GetDefaultTemplateId($relmodule);
        $viewer->assign('DEFAULT_TEMPLATE', $def_templateid);
        $viewer->view("GetEMAILActions.tpl", 'EMAILMaker');
    }
    function getRecordsListFromRequest(Vtiger_Request $request){
        $cvId = $request->get('cvid');
        $selectedIds = $request->get('selected_ids');
        $excludedIds = $request->get('excluded_ids');

        if(!empty($selectedIds) && $selectedIds != 'all') {
                if(!empty($selectedIds) && count($selectedIds) > 0){
                        return $selectedIds;
                }
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
}
