<?php
/* * *******************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class EMAILMaker_EMAILMaker_Model extends Vtiger_Module_Model {

    private $version_type;
    private $license_key;
    private $version_no;
    private $basicModules;
    private $pageFormats;
    private $profilesActions;
    private $profilesPermissions;
    private $workflows = array("VTEMAILMakerMailTask");
    private $LUD = array();
    var $log;
    var $db;

    static $metaVariables = array(
        'Current Date' => '(general : (__VtigerMeta__) date) ($_DATE_FORMAT_)',
        'Current Time' => '(general : (__VtigerMeta__) time)',
        'System Timezone' => '(general : (__VtigerMeta__) dbtimezone)',
        'User Timezone' => '(general : (__VtigerMeta__) usertimezone)',
        'CRM Detail View URL' => '(general : (__VtigerMeta__) crmdetailviewurl)',
        'Portal Detail View URL' => '(general : (__VtigerMeta__) portaldetailviewurl)',
        'Site Url' => '(general : (__VtigerMeta__) siteurl)',
        'Portal Url' => '(general : (__VtigerMeta__) portalurl)',
        'Record Id' => '(general : (__VtigerMeta__) recordId)',
        'LBL_HELPDESK_SUPPORT_NAME' => '(general : (__VtigerMeta__) supportName)',
        'LBL_HELPDESK_SUPPORT_EMAILID' => '(general : (__VtigerMeta__) supportEmailid)',
    );
    
    function __construct(){
        $this->log = LoggerManager::getLogger('account');
        $this->db = PearDatabase::getInstance();
        $this->setLicenseInfo();
        $this->basicModules = array("20", "21", "22", "23");
        $this->profilesActions = array("EDIT" => "EditView", // Create/Edit
            "DETAIL" => "DetailView", // View
            "DELETE" => "Delete", // Delete
            "EXPORT_RTF" => "Export", // Export to RTF
        );
        $this->profilesPermissions = array();

        $this->name = "EMAILMaker";
        $this->id = getTabId("EMAILMaker");
        
        $_SESSION['KCFINDER']['uploadURL'] = "test/upload"; 
        $_SESSION['KCFINDER']['uploadDir'] = "../test/upload";
    }
    public function GetVersionType(){
        return $this->version_type;
    }
    public function GetLicenseKey(){
        return $this->license_key;
    }
    public function GetPageFormats(){
        return $this->pageFormats;
    }
    public function GetBasicModules(){
        return $this->basicModules;
    }
    public function GetProfilesActions(){
        return $this->profilesActions;
    }
    public function GetSearchSelectboxData() {
    
        $Search_Selectbox_Data = array();
        $sql = "SELECT * FROM vtiger_emakertemplates WHERE is_theme = '0' AND deleted = '0'";

        $result = $this->db->pquery($sql, array());
        $num_rows = $this->db->num_rows($result);
        for ($i = 0; $i < $num_rows; $i++) {
            $currModule = $this->db->query_result($result, $i, 'module');
            $templateid = $this->db->query_result($result, $i, 'templateid');
            $Template_Permissions_Data = $this->returnTemplatePermissionsData($currModule, $templateid);
            if ($Template_Permissions_Data["detail"] === false)
                continue;   

            $ownerid = $this->db->query_result($result, $i, 'owner');
            
            if (!isset($Search_Selectbox_Data["modules"][$currModule])) {
                $Search_Selectbox_Data["modules"][$currModule] = vtranslate($currModule, $currModule);
            }
            
            if (!isset($Search_Selectbox_Data["owners"][$ownerid])) {
                $Search_Selectbox_Data["owners"][$ownerid] = getUserFullName($ownerid);
            }
        }    
        
        return $Search_Selectbox_Data;
    }
    public function GetListviewData($orderby = "templateid", $sortorder = "asc", $formodule = "", $load_body = false, Vtiger_Request $request){
        $current_user = Users_Record_Model::getCurrentUserModel();
        $status_sql = "SELECT * FROM vtiger_emakertemplates_userstatus
		             INNER JOIN vtiger_emakertemplates USING(templateid)
		             WHERE userid=? AND deleted = '0' ";
        $status_res = $this->db->pquery($status_sql, array($current_user->id));
        $status_arr = array();
        while ($status_row = $this->db->fetchByAssoc($status_res)){
            $status_arr[$status_row["templateid"]]["is_active"] = $status_row["is_active"];
            $status_arr[$status_row["templateid"]]["is_default"] = $status_row["is_default"];
            $status_arr[$status_row["templateid"]]["sequence"] = $status_row["sequence"];
        }
        
        $originOrderby = $orderby;
        $originDir = $sortorder;
        if ($orderby == "order"){
            $orderby = "module";
            $sortorder = "asc";
        }
        $R_Atr = array();
        $sql = "SELECT * FROM vtiger_emakertemplates WHERE is_theme = '0' AND deleted = '0' ";
        if ($formodule != "") $sql .= "AND (module = '".$formodule."' OR module IS NULL OR module = '') ";
        
        $Search = array();
        $Search_Types = array("templatename","category","module","description","sharingtype","owner");
        foreach ($Search_Types AS $st) {
            if ($request->has('search_'.$st) && !$request->isEmpty('search_'.$st)) {
                $search_val = $request->get('search_'.$st);
                if ($st == "templatename" || $st == "description" || $st == "category") {
                    $search_val = "%".$search_val."%";
                    $Search[] = "vtiger_emakertemplates.".$st." LIKE ?";
                } else {
                    $Search[] = "vtiger_emakertemplates.".$st." = ?";
                }
                
                $R_Atr[] = $search_val;
            }
        }
        
        if (count($Search) > 0){        
            $sql .= " AND ";
            $sql .= implode(" AND ",$Search);
            
        }
        
        $sql .= "ORDER BY " . $orderby . " " . $sortorder;
        
        $result = $this->db->pquery($sql, $R_Atr);

        $return_data = Array();
        $num_rows = $this->db->num_rows($result);
        
        for ($i = 0; $i < $num_rows; $i++) {
            $currModule = $this->db->query_result($result, $i, 'module');
            $templateid = $this->db->query_result($result, $i, 'templateid');

            $Template_Permissions_Data = $this->returnTemplatePermissionsData($currModule, $templateid);
            if ($Template_Permissions_Data["detail"] === false)
                continue;
            
            $emailtemplatearray = array();
            $suffix = "";
            
            if (isset($status_arr[$templateid])){
                if ($status_arr[$templateid]["is_active"] == "0")
                    $emailtemplatearray['status'] = 0;
                else {
                    $emailtemplatearray['status'] = 1;
                    switch ($status_arr[$templateid]["is_default"]){
                        case "1":
                            $suffix = " (" . vtranslate("LBL_DEFAULT_NOPAR", "EMAILMaker") . " " . vtranslate("LBL_FOR_DV", "EMAILMaker") . ")";
                            break;
                        case "2":
                            $suffix = " (" . vtranslate("LBL_DEFAULT_NOPAR", "EMAILMaker") . " " . vtranslate("LBL_FOR_LV", "EMAILMaker") . ")";
                            break;
                        case "3":
                            $suffix = " (" . vtranslate("LBL_DEFAULT_NOPAR", "EMAILMaker") . ")";
                            break;
                    }
                }
                $emailtemplatearray['order'] = $status_arr[$templateid]["sequence"];
            } else {
                $emailtemplatearray['status'] = 1;
                $emailtemplatearray['order'] = 1;
            }

            if ($request->has('search_status') && !$request->isEmpty('search_status')) {
                if ($request->get('search_status') !=  "status_".$emailtemplatearray['status']) {
                    continue;
                }
            }
            
            
            $emailtemplatearray['status_lbl'] = ($emailtemplatearray['status'] == 1 ? vtranslate("Active") : vtranslate("Inactive", "EMAILMaker"));
            $emailtemplatearray['name'] = $this->db->query_result($result, $i, 'templatename');
            $emailtemplatearray['templateid'] = $templateid;
            $emailtemplatearray['description'] = $this->db->query_result($result, $i, 'description');
            $emailtemplatearray['subject'] = $this->db->query_result($result, $i, 'subject');
            $emailtemplatearray['is_listview'] = $this->db->query_result($result, $i, 'is_listview');
            if ($load_body) $emailtemplatearray['body'] = $this->db->query_result($result, $i, 'body');
            $emailtemplatearray['module'] = vtranslate($currModule, $currModule);
            $emailtemplatearray['templatename'] = "<a href=\"index.php?module=EMAILMaker&view=Detail&record=" . $templateid . "&return_module=EMAILMaker&return_view=List\">" . $this->db->query_result($result, $i, 'templatename') . $suffix . "</a>";
            if ($Template_Permissions_Data["edit"]) {
                $emailtemplatearray['edit'] = "<a href=\"index.php?module=EMAILMaker&view=Edit&record=" . $templateid . "&return_module=EMAILMaker&return_view=List\">" . vtranslate("LBL_EDIT") . "</a> | "
                        . "<a href=\"index.php?module=EMAILMaker&view=Edit&record=" . $templateid . "&isDuplicate=true&return_module=EMAILMaker&return_view=List\">" . vtranslate("LBL_DUPLICATE") . "</a>";
            }
            
            $emailtemplatearray['category'] = $this->db->query_result($result, $i, 'category');
            
            $owner = $this->db->query_result($result, $i, 'owner');
            $emailtemplatearray['owner'] = getUserFullName($owner);
            $sharingtype = $this->db->query_result($result, $i, 'sharingtype');
            $emailtemplatearray['sharingtype'] = vtranslate(strtoupper($sharingtype)."_FILTER",'EMAILMaker');
            
            
            $return_data [] = $emailtemplatearray;
        }

        if ($originOrderby == "order"){
            $modules = array();
            foreach ($return_data as $key => $templateArr)
                $modules[$templateArr["module"]][$key] = $templateArr["order"];

            $tmpArr = array();
            foreach ($modules as $orderArr){
                if ($originDir == "asc")
                    asort($orderArr, SORT_NUMERIC);
                else
                    arsort($orderArr, SORT_NUMERIC);

                foreach ($orderArr as $rdIdx => $order)
                    $tmpArr[] = $return_data[$rdIdx];
            }
            $return_data = $tmpArr;
        }
        return $return_data;
    }
    public function GetDetailViewData($templateid,$skipperrmisions = false){
        $no_img = '&nbsp;<img src="layouts/vlayout/skins/images/no.gif" alt="no" />';
        $yes_img = '&nbsp;<img src="layouts/vlayout/skins/images/Enable.png" alt="yes" />';
        $result = $this->db->pquery("SELECT * FROM vtiger_emakertemplates WHERE templateid=? AND deleted = '0'", array($templateid));
        $emailtemplateResult = $this->db->fetch_array($result);
        if (!$skipperrmisions) {
            $Template_Permissions_Data = $this->returnTemplatePermissionsData($emailtemplateResult["module"], $templateid);
            if ($Template_Permissions_Data["detail"] === false){
                $this->DieDuePermission();
            }        
        }
        $data = $this->getUserStatusData($templateid);
        if (count($data) > 0){
            if ($data["is_active"] == "1"){
                $is_active = vtranslate("Active");
                $activateButton = vtranslate("LBL_SETASINACTIVE", "EMAILMaker");
            } else {
                $is_active = vtranslate("Inactive", "EMAILMaker");
                $activateButton = vtranslate("LBL_SETASACTIVE", "EMAILMaker");
            }
            switch ($data["is_default"]){
                case "0":
                    $is_default = vtranslate("LBL_FOR_DV", "EMAILMaker") . $no_img . '&nbsp;&nbsp;';
                    $is_default .= vtranslate("LBL_FOR_LV", "EMAILMaker") . $no_img;
                    $defaultButton = vtranslate("LBL_SETASDEFAULT", "EMAILMaker");
                    break;
                case "1":
                    $is_default = vtranslate("LBL_FOR_DV", "EMAILMaker") . $yes_img . '&nbsp;&nbsp;';
                    $is_default .= vtranslate("LBL_FOR_LV", "EMAILMaker") . $no_img;
                    $defaultButton = vtranslate("LBL_UNSETASDEFAULT", "EMAILMaker");
                    break;
                case "2":
                    $is_default = vtranslate("LBL_FOR_DV", "EMAILMaker") . $no_img . '&nbsp;&nbsp;';
                    $is_default .= vtranslate("LBL_FOR_LV", "EMAILMaker") . $yes_img;
                    $defaultButton = vtranslate("LBL_UNSETASDEFAULT", "EMAILMaker");
                    break;
                case "3":
                    $is_default = vtranslate("LBL_FOR_DV", "EMAILMaker") . $yes_img . '&nbsp;&nbsp;';
                    $is_default .= vtranslate("LBL_FOR_LV", "EMAILMaker") . $yes_img;
                    $defaultButton = vtranslate("LBL_UNSETASDEFAULT", "EMAILMaker");
                    break;
            }
        } else {
            $is_active = vtranslate("Active");
            $activateButton = vtranslate("LBL_SETASINACTIVE", "EMAILMaker");
            $is_default = vtranslate("LBL_FOR_DV", "EMAILMaker") .  $no_img . '&nbsp;&nbsp;';
            $is_default .= vtranslate("LBL_FOR_LV", "EMAILMaker") .  $no_img ;
            $defaultButton = vtranslate("LBL_SETASDEFAULT", "EMAILMaker");
        }
        $emailtemplateResult["is_active"] = $is_active;
        $emailtemplateResult["is_default"] = $is_default;
        $emailtemplateResult["activateButton"] = $activateButton;
        $emailtemplateResult["defaultButton"] = $defaultButton;
        $emailtemplateResult["templateid"] = $templateid;
        $emailtemplateResult["permissions"] = $Template_Permissions_Data;
        return $emailtemplateResult;
    }
    public function GetAttachmentsData($templateid){
        $Attachments = array();
        $sql = "SELECT vtiger_seattachmentsrel.attachmentsid as documentid FROM vtiger_notes 
                          INNER JOIN vtiger_crmentity 
                             ON vtiger_crmentity.crmid = vtiger_notes.notesid
                          INNER JOIN vtiger_seattachmentsrel 
                             ON vtiger_seattachmentsrel.crmid = vtiger_notes.notesid   
                          INNER JOIN vtiger_emakertemplates_documents 
                             ON vtiger_emakertemplates_documents.documentid = vtiger_notes.notesid
                          WHERE vtiger_crmentity.deleted = '0' AND vtiger_emakertemplates_documents.templateid = ?";
        $result = $this->db->pquery($sql, array($templateid));
        $num_rows = $this->db->num_rows($result);  
        if ($num_rows > 0){
            while($row = $this->db->fetchByAssoc($result)){
                $Attachments[] = $row["documentid"]; 
            }
        }         
        return $Attachments;
    }
    public function GetEditViewData($templateid){
        $result = $this->db->pquery("SELECT vtiger_emakertemplates_displayed.*, vtiger_emakertemplates.* FROM vtiger_emakertemplates "
                                    ."LEFT JOIN vtiger_emakertemplates_displayed USING(templateid) "
                                    ."WHERE vtiger_emakertemplates.templateid=?", array($templateid));
        $emailtemplateResult = $this->db->fetch_array($result);
        $data = $this->getUserStatusData($templateid);
        if (count($data) > 0) {
            $emailtemplateResult["is_active"] = $data["is_active"];
            $emailtemplateResult["is_default"] = $data["is_default"];
            $emailtemplateResult["order"] = $data["order"];
        } else {
            $emailtemplateResult["is_active"] = "1";
            $emailtemplateResult["is_default"] = "0";
            $emailtemplateResult["order"] = "1";
        }
        
        $Template_Permissions_Data = $this->returnTemplatePermissionsData($emailtemplateResult["module"], $templateid);
        $emailtemplateResult["permissions"] = $Template_Permissions_Data;
        
        return $emailtemplateResult;
    }
    private function GetStatusArr(){
        $current_user = Users_Record_Model::getCurrentUserModel();
        $status_sql = "SELECT templateid, is_active, is_default, sequence 
                        FROM vtiger_emakertemplates_userstatus
                        INNER JOIN vtiger_emakertemplates USING(templateid)
                        WHERE userid=?";
        $status_res = $this->db->pquery($status_sql, array($current_user->id));
        $status_arr = array();
        while ($status_row = $this->db->fetchByAssoc($status_res)) {
            $status_arr[$status_row["templateid"]]["is_active"] = $status_row["is_active"];
            $status_arr[$status_row["templateid"]]["is_default"] = $status_row["is_default"];
            $status_arr[$status_row["templateid"]]["sequence"] = $status_row["sequence"];
        }        
        return $status_arr;
    }
    private function GetAvailableTemplatesResult($currModule, $forListView = false){
        $where_lv = $is_listview = "";
        if ($forListView == false){
            $where_lv = " AND is_listview=?";
            $is_listview = "0";
        }
        
        $sql = "SELECT vtiger_emakertemplates_displayed.*, vtiger_emakertemplates.* FROM vtiger_emakertemplates "
            ."LEFT JOIN  vtiger_emakertemplates_displayed USING(templateid) "
            ."WHERE is_theme = '0' AND module=? AND deleted = '0' " . $where_lv . " ORDER BY vtiger_emakertemplates.templateid";
        $params = array($currModule);
        if ($forListView == false)
            $params = array($currModule, $is_listview);

        return $this->db->pquery($sql, $params);
    }
    public function GetAvailableTemplates($currModule, $forListView = false){
        $return_array = array();       
        $status_arr = $this->GetStatusArr();        
        $result = $this->GetAvailableTemplatesResult($currModule,$forListView);
        
        while ($row = $this->db->fetchByAssoc($result)){
            $templateid = $row["templateid"];
            if ($this->CheckTemplatePermissions($currModule, $templateid, false) == false)
                continue;
            if (isset($status_arr[$templateid]["is_active"]) && $status_arr[$templateid]["is_active"] == "0"){
                continue;
            }
            if (trim($row["category"]) == "")
                $return_array[$row["templateid"]] = $row["templatename"];
            else    
                $return_array[$row["category"]][$row["templateid"]] = $row["templatename"];
        }
        return $return_array;
    }
    public function GetAvailableTemplatesArray($currModule, $forListView = false, $recordId = false){        
        include_once 'include/Webservices/Retrieve.php';
        
        $return_array = array();
        $status_arr = $this->GetStatusArr();
        $result = $this->GetAvailableTemplatesResult($currModule,$forListView);
        $num_rows = $this->db->num_rows($result);  
        
        if ($num_rows > 0){
            if ($recordId && !$forListView) {
                $current_user = Users_Record_Model::getCurrentUserModel();
                $entityData = VTEntityData::fromEntityId($this->db, $recordId);

            }
            while ($row = $this->db->fetchByAssoc($result)){
                $templateid = $row["templateid"];
                if ($this->CheckTemplatePermissions($currModule, $templateid, false) == false)
                    continue;
                if (isset($status_arr[$templateid]["is_active"]) && $status_arr[$templateid]["is_active"] == "0"){
                    continue;
                }
                if ($recordId && !$forListView) {
                    $EMAILMaker_Display_Model = new EMAILMaker_Display_Model();
                    if ($EMAILMaker_Display_Model->CheckDisplayConditions($row,$entityData,$currModule) == false)
                        continue;
                }
                $option = array("value"=> $templateid,"label"=>$row["templatename"],"title" => $row["description"]);

                if (trim($row["category"]) == "")
                    $return_array[0][$templateid] = $option;
                else    
                    $return_array[1][$row["category"]][$templateid] = $option;
            }
        }
        return $return_array;
    } 
    public function GetDefaultTemplateId($currModule, $forListView = false){
        $current_user = Users_Record_Model::getCurrentUserModel();

        if (!$forListView) 
            $did = "1";
        else
            $did = "2";

        $sql = "SELECT templateid, is_active, is_default, sequence 
                       FROM vtiger_emakertemplates_userstatus  
                       INNER JOIN vtiger_emakertemplates USING(templateid)
                       WHERE userid=? AND vtiger_emakertemplates.module = ? AND is_active = '1' AND is_default IN (?,3)";
        $res = $this->db->pquery($sql, array($current_user->id,$currModule,$did));

        while ($row = $this->db->fetchByAssoc($res)){
            return $row["templateid"];
        }
        return "";
    }    
    public function GetAllModules(){
        $Modulenames = Array('' => vtranslate("LBL_PLS_SELECT", "EMAILMaker"));
        $disallowed_modules = '10, 28';
        if (in_array($_SESSION['VTIGER_DB_VERSION'], array('5.1.0', '5.2.0')))
            $disallowed_modules .= ', 9, 16';
        $sql = "SELECT tabid, name, tablabel
			FROM vtiger_tab
			WHERE isentitytype=1
				AND presence=0
				AND tabid NOT IN ($disallowed_modules)
			ORDER BY name ASC";
        $result = $this->db->pquery($sql,array());
        while ($row = $this->db->fetchByAssoc($result)){
            if (file_exists("modules/" . $row['name'])){
                if (isPermitted($row['name'], '') != "yes")
                    continue;
                $Modulenames[$row['name']] = vtranslate($row['tablabel'],$row['name']);
                $ModuleIDS[$row['name']] = $row['tabid'];
            }
        }
        return array($Modulenames, $ModuleIDS);
    }
    public function GetPreparedMPDF(&$mpdf, $records, $templates, $module, $language, $preContent = ""){
        require_once("modules/EMAILMaker/resources/mpdf/mpdf.php");
        $focus = CRMEntity::getInstance($module);
        $TemplateContent = array();
        $name = '';
        foreach ($records as $record){
            foreach ($focus->column_fields as $cf_key => $cf_value){
                $focus->column_fields[$cf_key] = '';
            }
            if ($module == 'Calendar'){
                $cal_res = $this->db->pquery("select activitytype from vtiger_activity where activityid=?", array($record));
                $cal_row = $this->db->fetchByAssoc($cal_res);
                if ($cal_row['activitytype'] == 'Task')
                    $focus->retrieve_entity_info($record, $module);
                else
                    $focus->retrieve_entity_info($record, 'Events');
            } else
                $focus->retrieve_entity_info($record, $module);
            $focus->id = $record;

            foreach ($templates AS $templateid) {
                $PDFContent = $this->GetPDFContentRef($templateid, $module, $focus, $language);

                $Settings = $PDFContent->getSettings();
                if ($name == "")
                    $name = $PDFContent->getFilename();

                if ($this->CheckTemplatePermissions($module, $templateid, false) == false){
                    $header_html = "";
                    $body_html = vtranslate("LBL_PERMISSION", "EMAILMaker");
                    $footer_html = "";
                } else {
                    if ($preContent != ""){
                        $PDFContent->getContent();
                        $header_html = $preContent["header" . $templateid];
                        $body_html = $preContent["body" . $templateid];
                        $footer_html = $preContent["footer" . $templateid];
                    } else {
                        $pdf_content = $PDFContent->getContent();
                        $header_html = $pdf_content["header"];
                        $body_html = $pdf_content["body"];
                        $footer_html = $pdf_content["footer"];
                    }
                }
                if ($Settings["orientation"] == "landscape")
                    $orientation = "L";
                else
                    $orientation = "P";

                $format = $Settings["format"];
                $formatPB = $format;
                if (strpos($format, ";") > 0) {
                    $tmpArr = explode(";", $format);
                    $format = array($tmpArr[0], $tmpArr[1]);
                    $formatPB = $format[0] . "mm " . $format[1] . "mm";
                } elseif ($Settings["orientation"] == "landscape") {
                    $format .= "-L";
                    $formatPB .= "-L";
                }
                $ListViewBlocks = array();
                if (strpos($body_html, "#LISTVIEWBLOCK_START#") !== false && strpos($body_html, "#LISTVIEWBLOCK_END#") !== false)
                    preg_match_all("|#LISTVIEWBLOCK_START#(.*)#LISTVIEWBLOCK_END#|sU", $body_html, $ListViewBlocks, PREG_PATTERN_ORDER);

                if (count($ListViewBlocks) > 0){
                    $TemplateContent[$templateid] = $pdf_content;
                    $TemplateSettings[$templateid] = $Settings;
                    $num_listview_blocks = count($ListViewBlocks[0]);
                    for ($i = 0; $i < $num_listview_blocks; $i++) {
                        $ListViewBlock[$templateid][$i] = $ListViewBlocks[0][$i];
                        $ListViewBlockContent[$templateid][$i][$record][] = $ListViewBlocks[1][$i];
                    }
                } else {
                    if (!is_object($mpdf)) {
                        $mpdf = new mPDF('', $format, '', '', $Settings["margin_left"], $Settings["margin_right"], 0, 0, $Settings["margin_top"], $Settings["margin_bottom"], $orientation);
                        $mpdf->SetAutoFont();
                        $this->mpdf_preprocess($mpdf, $templateid, $PDFContent->bridge2mpdf);
                        $this->mpdf_prepare_header_footer_settings($mpdf, $templateid, $Settings);
                        @$mpdf->SetHTMLHeader($header_html);
                    } else {
                        $this->mpdf_preprocess($mpdf, $templateid, $PDFContent->bridge2mpdf);
                        @$mpdf->SetHTMLHeader($header_html);
                        @$mpdf->WriteHTML('<pagebreak sheet-size="' . $formatPB . '" orientation="' . $orientation . '" margin-left="' . $Settings["margin_left"] . 'mm" margin-right="' . $Settings["margin_right"] . 'mm" margin-top="0mm" margin-bottom="0mm" margin-header="' . $Settings["margin_top"] . 'mm" margin-footer="' . $Settings["margin_bottom"] . 'mm" />');
                    }
                    @$mpdf->SetHTMLFooter($footer_html);
                    @$mpdf->WriteHTML($body_html);
                    $this->mpdf_postprocess($mpdf, $templateid, $PDFContent->bridge2mpdf);
                }
            }
        }
        if (count($TemplateContent) > 0){
            foreach ($TemplateContent AS $templateid => $TContent){
                $header_html = $TContent["header"];
                $body_html = $TContent["body"];
                $footer_html = $TContent["footer"];
                $Settings = $TemplateSettings[$templateid];

                foreach ($ListViewBlock[$templateid] AS $id => $text){
                    $replace = "";
                    $cridx = 1;
                    foreach ($records as $record) {
                        $replace .= implode("", $ListViewBlockContent[$templateid][$id][$record]);
                        $replace = str_ireplace('$CRIDX$', $cridx++, $replace);
                    }
                    $body_html = str_replace($text, $replace, $body_html);
                }
                if ($Settings["orientation"] == "landscape")
                    $orientation = "L";
                else
                    $orientation = "P";

                $format = $Settings["format"];
                $formatPB = $format; 
                if (strpos($format, ";") > 0){
                    $tmpArr = explode(";", $format);
                    $format = array($tmpArr[0], $tmpArr[1]);
                    $formatPB = $format[0] . "mm " . $format[1] . "mm";
                } elseif ($Settings["orientation"] == "landscape") {
                    $format .= "-L";
                    $formatPB .= "-L";
                }
                if (!is_object($mpdf)){
                    $mpdf = new mPDF('', $format, '', '', $Settings["margin_left"], $Settings["margin_right"], 0, 0, $Settings["margin_top"], $Settings["margin_bottom"], $orientation);
                    $mpdf->SetAutoFont();
                    $this->mpdf_preprocess($mpdf, $templateid);
                    $this->mpdf_prepare_header_footer_settings($mpdf, $templateid, $Settings);
                    @$mpdf->SetHTMLHeader($header_html);
                } else {
                    $this->mpdf_preprocess($mpdf, $templateid);
                    @$mpdf->SetHTMLHeader($header_html);
                    @$mpdf->WriteHTML('<pagebreak sheet-size="' . $formatPB . '" orientation="' . $orientation . '" margin-left="' . $Settings["margin_left"] . 'mm" margin-right="' . $Settings["margin_right"] . 'mm" margin-top="0mm" margin-bottom="0mm" margin-header="' . $Settings["margin_top"] . 'mm" margin-footer="' . $Settings["margin_bottom"] . 'mm" />');
                }
                @$mpdf->SetHTMLFooter($footer_html);
                @$mpdf->WriteHTML($body_html);
                $this->mpdf_postprocess($mpdf, $templateid);
            }
        }
        if (!is_object($mpdf)){
            @$mpdf = new mPDF();
            @$mpdf->WriteHTML(vtranslate("LBL_PERMISSION", "EMAILMaker"));
        }
        if ($name == ""){
            $name = $this->GenerateName($records, $templates, $module);
        }
        $name = str_replace(array(' ', '/', ','), array('-', '-', '-'), $name);
        return $name;
    }
    public function GenerateName($records, $templates, $module){
        $focus = CRMEntity::getInstance($module);
        $focus->retrieve_entity_info($records[0], $module);
        if (count($records) > 1){
            $name = "BatchPDF";
        } else {
            $module_tabid = getTabId($module);
            $result = $this->db->pquery("SELECT fieldname FROM vtiger_field WHERE uitype = 4 AND tabid = ?",array($module_tabid));
            $fieldname = $this->db->query_result($result, 0, "fieldname");
            if (isset($focus->column_fields[$fieldname]) && $focus->column_fields[$fieldname] != ""){
                $name = $this->generate_cool_uri($focus->column_fields[$fieldname]);
            } else { 
                $templatesStr = implode("_", $templates);
                $recordsStr = implode("_", $records);
                $name = $templatesStr . $recordsStr . date("ymdHi");
            }
        }
        return $name;
    }
    public function GetPDFContentRef($templateid, $module, $focus, $language){
        return new EMAILMaker_PDFContent_Model($templateid, $module, $focus, $language);
    }
    public function DeleteAllRefLinks(){
        require_once('vtlib/Vtiger/Link.php');
        $link_res = $this->db->pquery("SELECT tabid FROM vtiger_tab WHERE isentitytype = ?",array('1'));
        while ($link_row = $this->db->fetchByAssoc($link_res)){
            Vtiger_Link::deleteLink($link_row["tabid"], "DETAILVIEWSIDEBARWIDGET", "EMAILMaker");
            Vtiger_Link::deleteLink($link_row["tabid"], "DETAILVIEWWIDGET", "EMAILMaker");
            Vtiger_Link::deleteLink($link_row["tabid"], "LISTVIEWMASSACTION", "Send Emails with EMAILMaker");
        }
    }
    public function AddLinks($modulename){
        require_once('vtlib/Vtiger/Module.php');
       
        if ($modulename != ""){
            $link_module = Vtiger_Module::getInstance($modulename);
            $link_module->addLink('DETAILVIEWSIDEBARWIDGET', 'EMAILMaker', 'module=EMAILMaker&view=GetEMAILActions&record=$RECORD$');
            $link_module->addLink('LISTVIEWMASSACTION', 'Send Emails with EMAILMaker', 'javascript:EMAILMaker_Actions_Js.getListViewPopup(this,\'$MODULE$\');');

            // remove non-standardly created links (difference in linkicon column makes the links twice when updating from previous version)
            $tabid = getTabId($modulename);
            $res = $this->db->pquery("SELECT * FROM vtiger_links WHERE tabid=? AND linktype=? AND linklabel=? AND linkurl=? ORDER BY linkid DESC", array($tabid, 'DETAILVIEWSIDEBARWIDGET', 'EMAILMaker', 'module=EMAILMaker&view=GetEMAILActions&record=$RECORD$'));
            $i = 0;
            while ($row = $this->db->fetchByAssoc($res)){
                $i++;
                if ($i > 1)
                    $this->db->pquery("DELETE FROM vtiger_links WHERE linkid=?", array($row['linkid']));
            }
            $res = $this->db->pquery("SELECT * FROM vtiger_links WHERE tabid=? AND linktype=? AND linklabel=? AND linkurl=? ORDER BY linkid DESC", array($tabid, 'LISTVIEWMASSACTION', 'Send Emails with EMAILMaker', 'javascript:EMAILMaker_Actions_Js.javascript:getListViewPopup(this,\'$MODULE$\');'));
            $i = 0;
            while ($row = $this->db->fetchByAssoc($res)){
                $i++;
                if ($i > 1)
                    $this->db->pquery("DELETE FROM vtiger_links WHERE linkid=?", array($row['linkid']));
            }
        }
    }
    public function AddHeaderLinks(){
        require_once('vtlib/Vtiger/Module.php');
        $link_module = Vtiger_Module::getInstance("EMAILMaker");
        $link_module->addLink('HEADERSCRIPT', 'EMAILMakerJS', 'layouts/vlayout/modules/EMAILMaker/resources/EMAILMakerActions.js', "", "1");
    }
    public function actualizeLinks(){        
        $Related_Modules = getEmailRelatedModules();        
        $result1 = $this->db->pquery("SELECT module FROM vtiger_emakertemplates WHERE deleted = ? GROUP BY module",array('0'));
        $num_rows1 = $this->db->num_rows($result1);          
        if ($num_rows1 > 0) {
            while ($row = $this->db->fetchByAssoc($result1)){
                if (!in_array($row["module"], $Related_Modules)) $Related_Modules[] = $row["module"];
            }
        }        
        if (count($Related_Modules) > 0){
            foreach ($Related_Modules AS $module){
                $this->AddLinks($module);
            }
        }
        $this->AddHeaderLinks();
    }
    public function DieDuePermission(){    
        global $current_user, $default_theme;        
        if (isset($_SESSION['vtiger_authenticated_user_theme']) && $_SESSION['vtiger_authenticated_user_theme'] != '')
            $theme = $_SESSION['vtiger_authenticated_user_theme'];
        else {
            if (!empty($current_user->theme)){
                $theme = $current_user->theme;
            } else {
                $theme = $default_theme;
            }
        }
        $output = "<link rel='stylesheet' type='text/css' href='themes/$theme/style.css'>";
        $output .= "<table border='0' cellpadding='5' cellspacing='0' width='100%' height='450px'><tr><td align='center'>";
        $output .= "<div style='border: 3px solid rgb(153, 153, 153); background-color: rgb(255, 255, 255); width: 55%; position: relative; z-index: 10000000;'>
      		<table border='0' cellpadding='5' cellspacing='0' width='98%'>
      		<tbody><tr>
      		<td rowspan='2' width='11%'><img src='layouts/vlayout/skins/images/denied.gif'></td>
      		<td style='border-bottom: 1px solid rgb(204, 204, 204);' nowrap='nowrap' width='70%'><span class='genHeaderSmall'>" . vtranslate("LBL_PERMISSION", "EMAILMaker") . "</span></td>
      		</tr>
      		<tr>
      		<td class='small' align='right' nowrap='nowrap'>
      		<a href='javascript:window.history.back();'>" . vtranslate("LBL_GO_BACK") . "</a><br></td>
      		</tr>
      		</tbody></table>
      		</div>";
        $output .= "</td></tr></table>";
        die($output);   
    }
    public function CheckTemplatePermissions($selected_module, $templateid = '', $die = true){
        $current_user = Users_Record_Model::getCurrentUserModel();
        $result = true;
        if (!is_admin($current_user)){          
            if ($selected_module != "" && isPermitted($selected_module, '') != "yes"){
                $result = false;
            } elseif ($templateid != "" && $this->CheckSharing($templateid) === false){
                $result = false;
            }
            if ($result === false){
                require('user_privileges/user_privileges_'.$current_user->id.'.php');
                require('user_privileges/sharing_privileges_'.$current_user->id.'.php');

                if($profileGlobalPermission[1] ==0){
                    $result = true;
                }
            }            
            if ($die === true && $result === false){
                $this->DieDuePermission();
            }
        }
        return $result;
    }    
    public function returnTemplatePermissionsData($selected_module = "", $templateid = ""){
        $current_user = Users_Record_Model::getCurrentUserModel();        
        $result = true;        
        if (!is_admin($current_user)){        
            if ($selected_module != "" && isPermitted($selected_module, '') != "yes"){
                $result = false;
            } elseif ($templateid != "" && $this->CheckSharing($templateid) === false){
                $result = false;
            }        
            $detail_result = $result;

            if (!$this->CheckPermissions("EDIT")){
                $edit_result = false;
            } else {
                $edit_result = $result;
            }

            if (!$this->CheckPermissions("DELETE")){
                $delete_result = false;
            } else {
                $delete_result = $result;
            }
            
            if ($detail_result === false || $edit_result === false || $delete_result === false){
                require('user_privileges/user_privileges_'.$current_user->id.'.php');
                require('user_privileges/sharing_privileges_'.$current_user->id.'.php');

                if($profileGlobalPermission[1] == 0){
                    $detail_result = true;
                }
                if($profileGlobalPermission[2] == 0){
                    $edit_result = $delete_result = true;
                }
            }  
        } else {            
            $detail_result = $edit_result = $delete_result = $result;
        }
        return array("detail"=>$detail_result,"edit"=>$edit_result ,"delete"=>$delete_result);
    }
    public function GetProfilesPermissions(){
        if (count($this->profilesPermissions) == 0){
            $profiles = Settings_Profiles_Record_Model::getAll();
            $res = $this->db->pquery("SELECT * FROM vtiger_emakertemplates_profilespermissions", array());
            $permissions = array();
            while ($row = $this->db->fetchByAssoc($res)){
                if (isset($profiles[$row["profileid"]]))
                    $permissions[$row["profileid"]][$row["operation"]] = $row["permissions"];
            }

            foreach ($profiles as $profileid => $profilename){
                foreach ($this->profilesActions as $actionName){
                    $actionId = getActionid($actionName);
                    if (!isset($permissions[$profileid][$actionId])){
                        $permissions[$profileid][$actionId] = "0";
                    }
                }
            }
            ksort($permissions);
            $this->profilesPermissions = $permissions;
        }
        return $this->profilesPermissions;
    }
    public function CheckPermissions($actionKey){
        $current_user = Users_Record_Model::getCurrentUserModel();
        $profileid = getUserProfile($current_user->id);
        $result = false;

        if (isset($this->profilesActions[$actionKey])) {
            $actionid = getActionid($this->profilesActions[$actionKey]);
            $permissions = $this->GetProfilesPermissions();
            
             if (isset($permissions[$profileid[0]][$actionid]) && $permissions[$profileid[0]][$actionid] == "0")
                $result = true;
        }
        return $result;
    }
    public function CheckSharing($templateid){
        $current_user = Users_Record_Model::getCurrentUserModel();
        $result = $this->db->pquery("SELECT owner, sharingtype FROM vtiger_emakertemplates WHERE templateid = ?", array($templateid));
        $row = $this->db->fetchByAssoc($result);
        $owner = $row["owner"];
        $sharingtype = $row["sharingtype"];
        $result = false;
        if ($owner == $current_user->id){
            $result = true;
        } else {
            switch ($sharingtype){
                case "public":
                    $result = true;
                    break;
                case "private":
                    $subordinateUsers = $this->getSubRoleUserIds($current_user->roleid);
                    if (!empty($subordinateUsers) && count($subordinateUsers) > 0){
                        $result = in_array($owner, $subordinateUsers);
                    }
                    else
                        $result = false;
                    break;
                case "share":
                    $subordinateUsers = $this->getSubRoleUserIds($current_user->roleid);
                    if (!empty($subordinateUsers) && count($subordinateUsers) > 0 && in_array($owner, $subordinateUsers))
                        $result = true;
                    else {
                        $member_array = $this->GetSharingMemberArray($templateid);
                        if (isset($member_array["users"]) && in_array($current_user->id, $member_array["users"]))
                            $result = true;
                        elseif (isset($member_array["roles"]) && in_array($current_user->roleid, $member_array["roles"]))
                            $result = true;
                        else {
                            if (isset($member_array["rs"])) {
                                foreach ($member_array["rs"] as $roleid){
                                    $roleAndsubordinateRoles = getRoleAndSubordinatesRoleIds($roleid);
                                    if (in_array($current_user->roleid, $roleAndsubordinateRoles)) {
                                        $result = true;
                                        break;
                                    }
                                }
                            }
                            if ($result == false && isset($member_array["groups"])){
                                $current_user_groups = explode(",", fetchUserGroupids($current_user->id));
                                $res_array = array_intersect($member_array["groups"], $current_user_groups);
                                if (!empty($res_array) && count($res_array) > 0)
                                    $result = true;
                                else
                                    $result = false;
                            }
                        }
                    }
                    break;
            }
        }
        return $result;
    }
    private function getSubRoleUserIds($roleid){
        $subRoleUserIds = array();
        $subordinateUsers = getRoleAndSubordinateUsers($roleid);
        if (!empty($subordinateUsers) && count($subordinateUsers) > 0) {
            $currRoleUserIds = getRoleUserIds($roleid);
            $subRoleUserIds = array_diff($subordinateUsers, $currRoleUserIds);
        }
        return $subRoleUserIds;
    }
    public function GetSharingMemberArray($templateid){
        $result = $this->db->pquery("SELECT shareid, setype FROM vtiger_emakertemplates_sharing WHERE templateid = ? ORDER BY setype ASC", array($templateid));
        $memberArray = array();
        while ($row = $this->db->fetchByAssoc($result)){
            $memberArray[$row["setype"]][] = $row["shareid"];
        }
        return $memberArray;
    }
    private function setLicenseInfo(){
        $t = $k = "";
        $this->version_no = EMAILMaker_Version_Helper::$version;
        $result = $this->db->pquery("SELECT version_type, license_key, license_info FROM vtiger_emakertemplates_license",array());

        if ($this->db->num_rows($result) > 0) {
            $license_info = $this->db->query_result($result,0,"license_info");            
            if ($license_info != "")
                $t = $this->db->query_result($result, 0, "version_type");
            else
                $t = "deactivate";

            $k = $this->db->query_result($result, 0, "license_key");
        }         
        $this->version_type = $t;
        $this->license_key = $k;
    }
    private function getUserStatusData($templateid){
        $current_user = Users_Record_Model::getCurrentUserModel();
        $result = $this->db->pquery("SELECT is_active, is_default, sequence FROM vtiger_emakertemplates_userstatus WHERE templateid=? AND userid=?", array($templateid, $current_user->id));

        $data = array();
        if ($this->db->num_rows($result) > 0) {
            $data["is_active"] = $this->db->query_result($result, 0, "is_active");
            $data["is_default"] = $this->db->query_result($result, 0, "is_default");
            $data["order"] = $this->db->query_result($result, 0, "sequence");
        }
        return $data;
    }
    private function mpdf_preprocess(&$mpdf, $templateid, $bridge = ''){
        if ($bridge != '' && is_array($bridge)) {
            $mpdf->EMAILMakerRecord = $bridge["record"];
            $mpdf->EMAILMakerTemplateid = $bridge["templateid"];

            if (isset($bridge["subtotalsArray"]))
                $mpdf->EMAILMakerSubtotalsArray = $bridge["subtotalsArray"];
        }

        $this->mpdf_processing($mpdf, $templateid, 'pre');
    }
    private function mpdf_postprocess(&$mpdf, $templateid, $bridge = ''){
        $this->mpdf_processing($mpdf, $templateid, 'post');
    }
    private function mpdf_processing(&$mpdf, $templateid, $when){
        $path = 'modules/EMAILMaker/resources/mpdf_processing/';
        switch ($when) {
            case "pre":
                $filename = 'preprocessing.php';
                $functionname = 'emakertemplates_mpdf_preprocessing';
                break;
            case "post":
                $filename = 'postprocessing.php';
                $functionname = 'emakertemplates_mpdf_postprocessing';
                break;
        }
        if (is_file($path . $filename) && is_readable($path . $filename)){
            require_once($path . $filename);
            $functionname($mpdf, $templateid);
        }
    }
    private function mpdf_prepare_header_footer_settings(&$mpdf, $templateid, &$Settings){
        $mpdf->EMAILMakerTemplateid = $templateid;
        $disp_header = $Settings["disp_header"];
        $disp_optionsArr = array("dh_first", "dh_other");
        $disp_header_bin = str_pad(base_convert($disp_header, 10, 2), 2, "0", STR_PAD_LEFT);
        for ($i = 0; $i < count($disp_optionsArr); $i++) {
            if (substr($disp_header_bin, $i, 1) == "1")
                $mpdf->EMAILMakerDispHeader[$disp_optionsArr[$i]] = true;
            else
                $mpdf->EMAILMakerDispHeader[$disp_optionsArr[$i]] = false;
        }

        $disp_footer = $Settings["disp_footer"];
        $disp_optionsArr = array("df_first", "df_last", "df_other");
        $disp_footer_bin = str_pad(base_convert($disp_footer, 10, 2), 3, "0", STR_PAD_LEFT);
        for ($i = 0; $i < count($disp_optionsArr); $i++) {
            if (substr($disp_footer_bin, $i, 1) == "1")
                $mpdf->EMAILMakerDispFooter[$disp_optionsArr[$i]] = true;
            else
                $mpdf->EMAILMakerDispFooter[$disp_optionsArr[$i]] = false;
        }
    }
    public function GetReleasesNotif(){
        $mpdf_ver = $releases = $notif = "";
        $user_prefs = $this->GetUserSettings();
        if ($user_prefs["is_notified"] == "0")
            return $notif;

        if ($this->version_type != "deactivate") {
            $client = new soapclient2("http://www.crm4you.sk/EMAILMaker/ITS4YouWS.php", false);
            $client->soap_defencoding = 'UTF-8';
            $err = $client->getError();

            $params = array("EMAILMaker" => $this->version_no,
                "mpdf" => $mpdf_ver
            );

            $releases = $client->call("check_last_releases", $params);
            $checkArr = explode("_", $releases);
            if (count($checkArr) == 4) {
                if ($checkArr[1] != "ok")
                    $notif = '<a href="' . $checkArr[0] . '" onclick="return confirm(\'' . vtranslate("ARE_YOU_SURE", "EMAILMaker") . '\');" title="PDF Maker download" style="color:red;">' . vtranslate("LBL_NEW_EMAILMaker", "EMAILMaker") . " " . $checkArr[1] . " " . vtranslate("LBL_AVAILABLE", "EMAILMaker") . ".</a> ";
                if ($checkArr[3] != "ok")
                    $notif .= '<a href="javascript:void(0)" onclick="downloadNewRelease(\'mpdf\', \'' . $checkArr[2] . '\', \'' . vtranslate("ARE_YOU_SURE", "EMAILMaker") . '\');" title="mPDF download" style="color:red;">' . vtranslate("LBL_NEW_MPDF", "EMAILMaker") . " " . $checkArr[3] . " " . vtranslate("LBL_AVAILABLE", "EMAILMaker") . ".</a>";
            }
        }

        return $notif;
    }
    public function GetCustomLabels(){        
        require_once("modules/EMAILMaker/resources/classes/EMAILMakerLabel.class.php");
        $oLblArr = array();
        $languages = array();

        if ($this->version_type == "professional") {
            $sql = "SELECT k.label_id, k.label_key, v.lang_id, v.label_value
                    FROM vtiger_emakertemplates_label_keys AS k
                    LEFT JOIN vtiger_emakertemplates_label_vals AS v
                        USING(label_id)";
            $result = $this->db->pquery($sql, array());

            while ($row = $this->db->fetchByAssoc($result)) {
                if (!isset($oLblArr[$row["label_id"]])) {
                    $oLbl = new EMAILMakerLabel($row["label_id"], $row["label_key"]);
                    $oLblArr[$row["label_id"]] = $oLbl;
                } else {
                    $oLbl = $oLblArr[$row["label_id"]];
                }
                $oLbl->SetLangValue($row["lang_id"], $row["label_value"]);
            }

            //getting the langs from vtiger_language
            $result = $this->db->pquery("SELECT * FROM vtiger_language WHERE active = ? ORDER BY id ASC", array("1"));
            while ($row = $this->db->fetchByAssoc($result)) {
                $languages[$row["id"]]["name"] = $row["name"];
                $languages[$row["id"]]["prefix"] = $row["prefix"];
                $languages[$row["id"]]["label"] = $row["label"];

                foreach ($oLblArr as $objLbl) {
                    if ($objLbl->IsLangValSet($row["id"]) == false)
                        $objLbl->SetLangValue($row["id"], "");
                }
            }
        }
        return array($oLblArr, $languages);
    }
    public function GetAvailableSettings(){
        $menu_array = array();
        $currentUserModel = Users_Record_Model::getCurrentUserModel();
        
        if($currentUserModel->isAdminUser()){
            $menu_array["EMAILMakerPrivilegies"]["location"] = "index.php?module=EMAILMaker&view=ProfilesPrivilegies";
            $menu_array["EMAILMakerPrivilegies"]["image_src"] = "themes/images/ico-profile.gif";
            $menu_array["EMAILMakerPrivilegies"]["desc"] = "LBL_PROFILES_DESC";
            $menu_array["EMAILMakerPrivilegies"]["label"] = "LBL_PROFILES";
            
            if ($this->version_type == "professional"){
                $menu_array["EMAILMakerCustomLables"]["location"] = "index.php?module=EMAILMaker&view=CustomLabels";
                $menu_array["EMAILMakerCustomLables"]["image_src"] = "themes/images/picklist.gif";
                $menu_array["EMAILMakerCustomLables"]["desc"] = "LBL_CUSTOM_LABELS_DESC";
                $menu_array["EMAILMakerCustomLables"]["label"] = "LBL_CUSTOM_LABELS";
            }
            
            $menu_array["EMAILMakerProductBlockTpl"]["location"] = "index.php?module=EMAILMaker&view=ProductBlocks";
            $menu_array["EMAILMakerProductBlockTpl"]["image_src"] = "themes/images/terms.gif";
            $menu_array["EMAILMakerProductBlockTpl"]["desc"] = "LBL_PRODUCTBLOCKTPL_DESC";
            $menu_array["EMAILMakerProductBlockTpl"]["label"] = "LBL_PRODUCTBLOCKTPL";

            $menu_array["EMAILMakerLicense"]["location"] = "index.php?module=EMAILMaker&view=License";
            $menu_array["EMAILMakerLicense"]["image_src"] = Vtiger_Theme::getImagePath('proxy.gif');
            $menu_array["EMAILMakerLicense"]["desc"] = "LICENSE_SETTINGS_INFO";
            $menu_array["EMAILMakerLicense"]["label"] = "LBL_LICENSE";

            $menu_array["EMAILMakerButtons"]["location"] = "index.php?module=EMAILMaker&view=Buttons";
            $menu_array["EMAILMakerButtons"]["image_src"] = Vtiger_Theme::getImagePath('proxy.gif');
            $menu_array["EMAILMakerButtons"]["desc"] = "LBL_EMAIL_BUTTONS_DESC";
            $menu_array["EMAILMakerButtons"]["label"] = "LBL_EMAIL_BUTTONS";
            
            $menu_array["EMAILMakerButtons"]["location"] = "index.php?module=EMAILMaker&view=Extensions";
            $menu_array["EMAILMakerButtons"]["image_src"] = Vtiger_Theme::getImagePath('proxy.gif');
            $menu_array["EMAILMakerButtons"]["desc"] = "LBL_EXTENSIONS_DESC";
            $menu_array["EMAILMakerButtons"]["label"] = "LBL_EXTENSIONS";
            
            $menu_array["EMAILMakerUpgrade"]["location"] = "index.php?module=ModuleManager&parent=Settings&view=ModuleImport&mode=importUserModuleStep1";
            $menu_array["EMAILMakerUpgrade"]["desc"] = "LBL_UPGRADE_DESC";
            $menu_array["EMAILMakerUpgrade"]["label"] = "LBL_UPGRADE";
            
            $menu_array["EMAILMakerUninstall"]["location"] = "index.php?module=EMAILMaker&view=Uninstall";
            $menu_array["EMAILMakerUninstall"]["desc"] = "LBL_UNINSTALL_DESC";
            $menu_array["EMAILMakerUninstall"]["label"] = "LBL_UNINSTALL";
        }
        return $menu_array;
    }
    public function GetProductBlockFields(){
        $current_user = Users_Record_Model::getCurrentUserModel();
        $result = array();
        
        $Article_Strings = array("" => vtranslate("LBL_PLS_SELECT", "EMAILMaker"),
            vtranslate("LBL_PRODUCTS_AND_SERVICES", "EMAILMaker") => array(
            "PRODUCTBLOC_START" => vtranslate("LBL_ARTICLE_START", "EMAILMaker"),
            "PRODUCTBLOC_END" => vtranslate("LBL_ARTICLE_END", "EMAILMaker")),
            vtranslate("LBL_PRODUCTS_ONLY", "EMAILMaker") => array(
            "PRODUCTBLOC_PRODUCTS_START" => vtranslate("LBL_ARTICLE_START", "EMAILMaker"),
            "PRODUCTBLOC_PRODUCTS_END" => vtranslate("LBL_ARTICLE_END", "EMAILMaker")),
            vtranslate("LBL_SERVICES_ONLY", "EMAILMaker") => array(
            "PRODUCTBLOC_SERVICES_START" => vtranslate("LBL_ARTICLE_START", "EMAILMaker"),
            "PRODUCTBLOC_SERVICES_END" => vtranslate("LBL_ARTICLE_END", "EMAILMaker")),
        );
        
        $result["ARTICLE_STRINGS"] = $Article_Strings;
        $Product_Fields = array("PS_CRMID" => vtranslate("LBL_RECORD_ID", "EMAILMaker"),
            "PS_NO" => vtranslate("LBL_PS_NO", "EMAILMaker"),
            "PRODUCTPOSITION" => vtranslate("LBL_PRODUCT_POSITION", "EMAILMaker"),
            "CURRENCYNAME" => vtranslate("LBL_CURRENCY_NAME", "EMAILMaker"),
            "CURRENCYCODE" => vtranslate("LBL_CURRENCY_CODE", "EMAILMaker"),
            "CURRENCYSYMBOL" => vtranslate("LBL_CURRENCY_SYMBOL", "EMAILMaker"),
            "PRODUCTNAME" => vtranslate("LBL_VARIABLE_PRODUCTNAME", "EMAILMaker"),
            "PRODUCTTITLE" => vtranslate("LBL_VARIABLE_PRODUCTTITLE", "EMAILMaker"),
            "PRODUCTEDITDESCRIPTION" => vtranslate("LBL_VARIABLE_PRODUCTEDITDESCRIPTION", "EMAILMaker"),
            "PRODUCTDESCRIPTION" => vtranslate("LBL_VARIABLE_PRODUCTDESCRIPTION", "EMAILMaker")            
        );

        if ($this->db->num_rows($this->db->pquery("SELECT tabid FROM vtiger_tab WHERE name = ?",array('Pdfsettings'))) > 0)
            $Product_Fields["CRMNOWPRODUCTDESCRIPTION"] = vtranslate("LBL_CRMNOW_DESCRIPTION", "EMAILMaker");

        $Product_Fields["PRODUCTQUANTITY"] = vtranslate("LBL_VARIABLE_QUANTITY", "EMAILMaker");
        $Product_Fields["PRODUCTUSAGEUNIT"] = vtranslate("LBL_VARIABLE_USAGEUNIT", "EMAILMaker");
        $Product_Fields["PRODUCTLISTPRICE"] = vtranslate("LBL_VARIABLE_LISTPRICE", "EMAILMaker");
        $Product_Fields["PRODUCTTOTAL"] = vtranslate("LBL_PRODUCT_TOTAL", "EMAILMaker");
        $Product_Fields["PRODUCTDISCOUNT"] = vtranslate("LBL_VARIABLE_DISCOUNT", "EMAILMaker");
        $Product_Fields["PRODUCTDISCOUNTPERCENT"] = vtranslate("LBL_VARIABLE_DISCOUNT_PERCENT", "EMAILMaker");
        $Product_Fields["PRODUCTSTOTALAFTERDISCOUNT"] = vtranslate("LBL_VARIABLE_PRODUCTTOTALAFTERDISCOUNT", "EMAILMaker");
        $Product_Fields["PRODUCTVATPERCENT"] = vtranslate("LBL_PRODUCT_VAT_PERCENT", "EMAILMaker");
        $Product_Fields["PRODUCTVATSUM"] = vtranslate("LBL_PRODUCT_VAT_SUM", "EMAILMaker");
        $Product_Fields["PRODUCTTOTALSUM"] = vtranslate("LBL_PRODUCT_TOTAL_VAT", "EMAILMaker");
        $result["SELECT_PRODUCT_FIELD"] = $Product_Fields;

        //Available fields for products
        $prod_fields = array();
        $serv_fields = array();

        $in = '0';
        if (vtlib_isModuleActive('Products'))
            $in = getTabId('Products');
        if (vtlib_isModuleActive('Services')){
            if ($in == '0')
                $in = getTabId('Services');
            else
                $in .= ', ' . getTabId('Services');
        }
        $sql = "SELECT  t.tabid, t.name,
                        b.blockid, b.blocklabel,
                        f.fieldname, f.fieldlabel
                FROM vtiger_tab AS t
                INNER JOIN vtiger_blocks AS b USING(tabid)
                INNER JOIN vtiger_field AS f ON b.blockid = f.block
                WHERE t.tabid IN (" . $in . ")
                    AND (f.displaytype != 3 OR f.uitype = 55)
                ORDER BY t.name ASC, b.sequence ASC, f.sequence ASC, f.fieldid ASC";
        $res = $this->db->pquery($sql,array());
        while ($row = $this->db->fetchByAssoc($res)){
            $module = $row["name"];
            $fieldname = $row["fieldname"];
            if (getFieldVisibilityPermission($module, $current_user->id, $fieldname) != '0')
                continue;

            $trans_field_nam = strtoupper($module) . "_" . strtoupper($fieldname);
            switch ($module) {
                case "Products":
                    $trans_block_lbl = vtranslate($row["blocklabel"], 'Products');
                    $trans_field_lbl = vtranslate($row["fieldlabel"], 'Products');
                    $prod_fields[$trans_block_lbl][$trans_field_nam] = $trans_field_lbl;
                    break;

                case "Services":
                    $trans_block_lbl = vtranslate($row["blocklabel"], 'Services');
                    $trans_field_lbl = vtranslate($row["fieldlabel"], 'Services');
                    $serv_fields[$trans_block_lbl][$trans_field_nam] = $trans_field_lbl;
                    break;

                default:
                    continue;
            }
        }
        $result["PRODUCTS_FIELDS"] = $prod_fields;
        $result["SERVICES_FIELDS"] = $serv_fields;

        return $result;
    }
    public function GetRelatedBlocks($select_module,$select_too = true){

        if($select_too) $Related_Blocks[""] = vtranslate("LBL_PLS_SELECT", "EMAILMaker");
        if ($select_module != "") {
            $Related_Modules = EMAILMaker_RelatedBlock_Model::getRelatedModulesList($select_module);

            if (count($Related_Modules) > 0){
                $sql = "SELECT * FROM vtiger_emakertemplates_relblocks
                        WHERE secmodule IN(" . generateQuestionMarks($Related_Modules) . ")
                            AND deleted = 0
                        ORDER BY relblockid";
                $result = $this->db->pquery($sql, $Related_Modules);
                while ($row = $this->db->fetchByAssoc($result)) {                    
                    if ($row["module"] == "PriceBooks" && $row["module"] != $select_module) {
                        $csql = "SELECT * FROM vtiger_pdfmaker_relblockcol WHERE relblockid = ? AND columnname LIKE ?";
                        $cresult = $this->db->pquery($csql, array($row["relblockid"],"vtiger_pricebookproductreltmp%"));
                        if ($this->db->num_rows($cresult) > 0) continue;
                    }                   
                    
                    $Related_Blocks[$row["relblockid"]] = $row["name"];
                }
            }
        }

        return $Related_Blocks;
    }
    public function GetUserSettings($userid = ""){
        $current_user = Users_Record_Model::getCurrentUserModel();
        $userid = ($userid == "" ? $current_user->id : $userid);
        $result = $this->db->pquery("SELECT * FROM vtiger_emakertemplates_usersettings WHERE userid = ?", array($userid));

        $settings = array();
        if ($this->db->num_rows($result) > 0){
            while ($row = $this->db->fetchByAssoc($result)){
                $settings["is_notified"] = $row["is_notified"];
            }
        } else {
            $settings["is_notified"] = "0";
        }
        return $settings;
    }
    public function getSideBarLinks($linkParams){       
        $currentUserModel = Users_Record_Model::getCurrentUserModel();
        
        $type = "SIDEBARLINK"; 
        $quickLinks = array();

        if ($linkParams["ACTION"] == "IndexAjax" && $linkParams["MODE"] == "showSettingsList"){    
            $SettingsLinks = $this->GetAvailableSettings();

            if (count($SettingsLinks) > 0) {
                foreach($SettingsLinks as $stype => $sdata){
                    $quickLinks[] = array(
                    'linktype' => 'SIDEBARLINK',
                    'linklabel' => $sdata["label"],
                    'linkurl' => $sdata["location"],
                    'linkicon' => ''); 
                }
            }
        } else {
            $linkTypes = array('SIDEBARLINK', 'SIDEBARWIDGET');
            $links = Vtiger_Link_Model::getAllByType($this->getId(), $linkTypes, $linkParams);

            $quickLinks[] = array(
                'linktype' => 'SIDEBARLINK',
                'linklabel' => 'LBL_RECORDS_LIST',
                'linkurl' => $this->getListViewUrl(),
                'linkicon' => '',
            );
            if (strtolower($this->version_type)== "professional"){
                $quickLinks[] = array(
                    'linktype' => 'SIDEBARLINK',
                    'linklabel' => 'LBL_EMAIL_CAMPAIGNS_LIST',
                    'linkurl' => "index.php?module=EMAILMaker&view=ListME",
                    'linkicon' => '',
                );
            }
            
            if (vtlib_isModuleActive("ITS4YouStyles")){
                $quickLinks[] = array(  'linktype' => 'SIDEBARLINK',
                                        'linklabel' => 'LBL_STYLES_LIST',
                                        'linkurl' => "index.php?module=ITS4YouStyles&view=List",
                                        'linkicon' => '',
                );
            }
            
        }       
        if (count($quickLinks) > 0){    
            foreach ($quickLinks as $quickLink){
                $links[$type][] = Vtiger_Link_Model::getInstanceFromValues($quickLink);
            }
        }        
        if($currentUserModel->isAdminUser() && $linkParams["ACTION"] != "Edit" && $linkParams["ACTION"] != "Detail"){
            $quickS2Links = array(
            'linktype' => "SIDEBARWIDGET",
            'linklabel' => "LBL_SETTINGS",
            'linkurl' => "module=EMAILMaker&view=IndexAjax&mode=showSettingsList&pview=".$linkParams["ACTION"],
            'linkicon' => ''); 
            $links["SIDEBARWIDGET"][] = Vtiger_Link_Model::getInstanceFromValues($quickS2Links);
        }        
        return $links;
    }
    public function getListViewLinks($linkParams){        
        $currentUserModel = Users_Record_Model::getCurrentUserModel();
        $linkTypes = array('LISTVIEWMASSACTION','LISTVIEWSETTING');
        $links = Vtiger_Link_Model::getAllByType($this->getId(), $linkTypes, $linkParams);

        if ($this->CheckPermissions("DELETE") && $this->GetVersionType() != "deactivate"){
            $massActionLink = array(
                'linktype' => 'LISTVIEWMASSACTION',
                'linklabel' => 'LBL_DELETE',
                'linkurl' => 'javascript:EMAILMaker_ListJs.massDeleteTemplates();',
                'linkicon' => ''
            );            
            $links['LISTVIEWMASSACTION'][] = Vtiger_Link_Model::getInstanceFromValues($massActionLink);
        }
        $quickLinks = array();
        if ($this->CheckPermissions("EDIT") && $this->GetVersionType() != "deactivate"){
            $quickLinks [] = array(
            'linktype' => 'LISTVIEW',
            'linklabel' => 'LBL_IMPORT',
            'linkurl' => 'index.php?module=EMAILMaker&view=ImportEMAILTemplate',
            'linkicon' => '');   
        }
        if ($this->CheckPermissions("EDIT")){
            $quickLinks [] = array(
            'linktype' => 'LISTVIEW',
            'linklabel' => 'LBL_EXPORT',
            'linkurl' => 'javascript:ExportTemplates();',
            'linkicon' => '');
        }         
        foreach($quickLinks as $quickLink){
            $links['LISTVIEW'][] = Vtiger_Link_Model::getInstanceFromValues($quickLink);
        }
        if($currentUserModel->isAdminUser()){
            $settingsLinks = $this->getSettingLinks();
            foreach($settingsLinks as $settingsLink){
                $links['LISTVIEWSETTING'][] = Vtiger_Link_Model::getInstanceFromValues($settingsLink);
            }
            $SettingsLinks = $this->GetAvailableSettings();
            foreach($SettingsLinks as $stype => $sdata){
                $s_parr = array(
                'linktype' => 'LISTVIEWSETTING',
                'linklabel' => $sdata["label"],
                'linkurl' => $sdata["location"],
                'linkicon' => ''); 
                $links['LISTVIEWSETTING'][] = Vtiger_Link_Model::getInstanceFromValues($s_parr);
            }
        }
        return $links;
    }    
    function generate_cool_uri($name){
        $Search = array("$", "€", "&", "%", ")", "(", ".", " - ", "/", " ", ",", "ľ", "š", "č", "ť", "ž", "ý", "á", "í", "é", "ó", "ö", "ů", "ú", "ü", "ä", "ň", "ď", "ô", "ŕ", "Ľ", "Š", "Č", "Ť", "Ž", "Ý", "Á", "Í", "É", "Ó", "Ú", "Ď", "\"", "°", "ß");
        $Replace = array("", "", "", "", "", "", "-", "-", "-", "-", "-", "l", "s", "c", "t", "z", "y", "a", "i", "e", "o", "o", "u", "u", "u", "a", "n", "d", "o", "r", "l", "s", "c", "t", "z", "y", "a", "i", "e", "o", "u", "d", "", "", "ss");
        $return = str_replace($Search, $Replace, $name);
        return $return;
    }    
    function createPDFAndSaveFile($request,$templates, $focus, $modFocus, $file_name, $moduleName, $language){
        $cu = Users_Record_Model::getCurrentUserModel();
        $dl = Vtiger_Language_Handler::getLanguage();
       
        $date_var = date("Y-m-d H:i:s");
        $ownerid = $focus->column_fields["assigned_user_id"];
        if (!isset($ownerid) || $ownerid == "") $ownerid = $cu->id;

        $current_id = $this->db->getUniqueID("vtiger_crmentity");
        $templates = rtrim($templates, ";");

        if ($templates != "0")
            $Templateids = explode(";", $templates);
        else
            $Templateids = array();

        $name = "";
        if (!$language || $language == "") $language = $dl;

        $preContent = "";
        $mode = $request->get('mode');
        $module = $request->get('module');
        if (isset($mode) && $mode == "edit" && isset($module) && $module == "EMAILMaker"){
            foreach ($Templateids as $templateid) {
                $preContent["header" . $templateid] = $request->get("header" . $templateid);
                $preContent["body" . $templateid] = $request->get("body" . $templateid);
                $preContent["footer" . $templateid] = $request->get("footer" . $templateid);
            }
        }
        $mpdf = "";
        $Records = array($modFocus->id);
        $name = $this->GetPreparedMPDF($mpdf, $Records, $Templateids, $moduleName, $language, $preContent);
        $name = $this->generate_cool_uri($name);
        $upload_file_path = decideFilePath();

        if ($name != "") $file_name = $name . ".pdf";

        $mpdf->Output($upload_file_path . $current_id . "_" . $file_name);

        $filesize = filesize($upload_file_path . $current_id . "_" . $file_name);
        $filetype = "application/pdf";

        $this->db->pquery("insert into vtiger_crmentity (crmid,smcreatorid,smownerid,setype,description,createdtime,modifiedtime) values(?, ?, ?, ?, ?, ?, ?)", array($current_id, $cu->id, $ownerid, "Documents Attachment", $focus->column_fields["description"], $this->db->formatDate($date_var, true), $this->db->formatDate($date_var, true)));
        $this->db->pquery("insert into vtiger_attachments(attachmentsid, name, description, type, path) values(?, ?, ?, ?, ?)", array($current_id, $file_name, $focus->column_fields["description"], $filetype, $upload_file_path));
        $this->db->pquery('insert into vtiger_seattachmentsrel values(?,?)', array($focus->id, $current_id));
        $this->db->pquery("UPDATE vtiger_notes SET filesize=?, filename=? WHERE notesid=?", array($filesize, $file_name, $focus->id));

        return true;
    }    
    function getRecipientModulenames(){    
        $RecipientModulenames = array(""=> vtranslate('LBL_PLS_SELECT','EMAILMaker'),
                                      "Contacts" => vtranslate('Contacts'),
                                      "Accounts" => vtranslate('Accounts'),
                                      "Vendors" => vtranslate('Vendors'),
                                      "Leads" => vtranslate('Leads'),
                                      "Users" => vtranslate('LBL_USERS'));
        return $RecipientModulenames;
    }    
    function getSubjectFields(){
        $subjectFields = array("##DD.MM.YYYY##"=>vtranslate('LBL_CURDATE_DD.MM.YYYY','EMAILMaker'),
                               "##DD-MM-YYYY##"=>vtranslate('LBL_CURDATE_DD-MM-YYYY','EMAILMaker'),
                               "##DD/MM/YYYY##"=>vtranslate('LBL_CURDATE_DD/MM/YYYY','EMAILMaker'),
                               "##MM-DD-YYYY##"=>vtranslate('LBL_CURDATE_MM-DD-YYYY','EMAILMaker'),
                               "##MM/DD/YYYY##"=>vtranslate('LBL_CURDATE_MM/DD/YYYY','EMAILMaker'),
                               "##YYYY-MM-DD##"=>vtranslate('LBL_CURDATE_YYYY-MM-DD','EMAILMaker'));  
        return $subjectFields;   
    }    
    public function GetThemesData($orderby = "templateid", $sortorder = "asc"){
        $current_user = Users_Record_Model::getCurrentUserModel();

        $status_sql = "SELECT * FROM vtiger_emakertemplates_userstatus
		             INNER JOIN vtiger_emakertemplates USING(templateid)
		             WHERE userid=?";
        $status_res = $this->db->pquery($status_sql, array($current_user->id));
        $status_arr = array();
        while ($status_row = $this->db->fetchByAssoc($status_res)) {
            $status_arr[$status_row["templateid"]]["is_active"] = $status_row["is_active"];
        }
        $result = $this->db->pquery("SELECT * FROM vtiger_emakertemplates WHERE is_theme = '1' AND deleted = '0'", array());
        $Return_Data = Array();
        $num_rows = $this->db->num_rows($result);
        
        for ($i = 0; $i < $num_rows; $i++){
            $templateid = $this->db->query_result($result, $i, 'templateid');
            $Email_Theme_Array = array();
            $suffix = "";
            
            $Email_Theme_Array['themeid'] = $templateid;
            $Email_Theme_Array['themename'] = $this->db->query_result($result, $i, 'templatename');
            $Email_Theme_Array['description'] = $this->db->query_result($result, $i, 'description');

            if ($this->CheckPermissions("EDIT")){
                $Email_Theme_Array['edit'] = "<a href=\"index.php?module=EMAILMaker&view=Edit&themeid=" . $templateid . "&mode=EditTheme&return_module=EMAILMaker&return_view=List\"><i title=\"" . vtranslate("LBL_EDIT") . "\" class=\"icon-pencil alignMiddle\"></i></a>&nbsp;";      
                $Email_Theme_Array['edit'] .= "<a href=\"index.php?module=EMAILMaker&view=Edit&themeid=" . $templateid . "&mode=EditTheme&isDuplicate=true&return_module=EMAILMaker&return_view=List\"><i title=\"" . vtranslate("LBL_DUPLICATE") . "\" class=\"icon-glass alignMiddle\" style=\"background-image: url('layouts/vlayout/modules/EMAILMaker/images/duplicate_icon.gif');\"></i></a>&nbsp;";
            }  
            if ($this->CheckPermissions("DELETE")){
                $Email_Theme_Array['edit'] .= "<a href=\"index.php?module=EMAILMaker&action=IndexAjax&mode=DeleteTheme&themeid=" . $templateid . "&return_module=EMAILMaker&return_view=List\"><i title=\"" . vtranslate("LBL_DELETE") . "\" class=\"icon-trash alignMiddle\"></i></a>";       
            }                                     
            $Return_Data [] = $Email_Theme_Array;            
        }
        return $Return_Data;
    }    
    public function getDetailViewLinks($templateid = ''){
	$linkTypes = array('DETAILVIEWTAB');
        $detail_url = 'index.php?module=EMAILMaker&view=Detail&record='.$templateid;

        $detailViewLinks = array(
                        array('linktype' => 'DETAILVIEWTAB',
                              'linklabel' => vtranslate('LBL_PROPERTIES','EMAILMaker'),
                              'linkurl' => $detail_url,      
                              'linkicon' => ''),
                        array('linktype' => 'DETAILVIEWTAB',
                              'linklabel' => vtranslate('Documents'),
                              'linkurl' => $detail_url.'&relatedModule=Documents&mode=showDocuments',
                              'linkicon' => '')
        );
        if (strtolower($this->version_type)== "professional"){
            $detailViewLinks[] = array('linktype' => 'DETAILVIEWTAB',
                                       'linklabel' => vtranslate('LBL_EMAIL_CAMPAIGNS_LIST','EMAILMaker'),
                                       'linkurl' => $detail_url.'&mode=showEmailCampaigns',
                                       'linkicon' => '');
            
            $current_user = Users_Record_Model::getCurrentUserModel();
            if ($current_user->isAdminUser()) {
                $detailViewLinks[] = array('linktype' => 'DETAILVIEWTAB',
                                           'linklabel' => vtranslate('LBL_EMAIL_WORKFLOWS_LIST','EMAILMaker'),
                                           'linkurl' => $detail_url.'&mode=showEmailWorkflows',
                                           'linkicon' => '');
            }
        }
        if (vtlib_isModuleActive("ITS4YouStyles")){
                $detailViewLinks[] = array(
                                'linktype' => 'DETAILVIEWTAB',
                                'linklabel' => vtranslate('LBL_STYLES_LIST','ITS4YouStyles'),
                                'linkurl' => $detail_url.'&relatedModule=ITS4YouStyles&mode=showRelatedList',
                                'linkicon' => ''
                );
        }
        foreach ($detailViewLinks as $detailViewLink){
                $linkModelList['DETAILVIEWTAB'][] = Vtiger_Link_Model::getInstanceFromValues($detailViewLink);
        }     

        return $linkModelList;
    }
    public function getEmailTemplateDocuments($templateid = ''){
        $Documents_Records = array();
        $query = "SELECT vtiger_notes.*, vtiger_crmentity.*, vtiger_attachmentsfolder.foldername FROM vtiger_notes 
        INNER JOIN vtiger_crmentity 
         ON vtiger_crmentity.crmid = vtiger_notes.notesid
        INNER JOIN vtiger_emakertemplates_documents 
         ON vtiger_emakertemplates_documents.documentid = vtiger_notes.notesid
        INNER JOIN vtiger_attachmentsfolder 
         ON vtiger_attachmentsfolder.folderid = vtiger_notes.folderid  
        WHERE vtiger_crmentity.deleted = '0' AND vtiger_emakertemplates_documents.templateid = ?";
    	$list_result = $this->db->pquery($query, array($templateid));
        $num_rows = $this->db->num_rows($list_result);

        if ($num_rows > 0){
            while($row = $this->db->fetchByAssoc($list_result)){
                $assigned_to_name = getUserFullName($row["smownerid"]);
                $Documents_Records[] = array("id"=> $row["notesid"],"title"=> $row["title"], "name" => $row["filename"],"assigned_to"=> $assigned_to_name,"folder"=> $row["foldername"],"filesize" =>$row["filesize"]);
            }
        }    
        return $Documents_Records;
    }    
    function retrieve_entity_info($record, $module){
    }
    function getEmailFieldToAdressat($mycrmid,$temp,$pmodule = ""){
        if ($temp == "-1"){
            $emailadd = getUserEmail($mycrmid);
        }elseif ($pmodule == "Users"){
            $ufocus = new Users();
            $ufocus->id = $mycrmid;
            $ufocus->retrieve_entity_info($mycrmid, 'Users');
            $emailadd = $ufocus->column_fields[$temp];
        }else{
            if ($pmodule == "") $pmodule=getSalesEntityType($mycrmid);

            $focus = CRMEntity::getInstance($pmodule);
            $focus->retrieve_entity_info($mycrmid,$pmodule);
            $emailadd=br2nl($focus->column_fields[$temp]);
        }

        $def_charset = vglobal("default_charset");
        $emailadd = html_entity_decode($emailadd, ENT_QUOTES, $def_charset);
        
        return $emailadd;
    }    
    function getEmailToAdressat($mycrmid,$temp, $pmodule = ""){
        if ($temp == "-1"){
            $emailadd = getUserEmail($mycrmid);
        }else{
            if ($pmodule == "") $pmodule=getSalesEntityType($mycrmid);

            $myquery='Select columnname from vtiger_field where fieldid = ? and vtiger_field.presence in (0,2)';
            $fresult=$this->db->pquery($myquery, array($temp));			
            if ($pmodule=='Contacts'){
                    require_once('modules/Contacts/Contacts.php');
                    $myfocus = new Contacts();
                    $myfocus->retrieve_entity_info($mycrmid,"Contacts");
            }elseif ($pmodule=='Accounts'){
                    require_once('modules/Accounts/Accounts.php');
                    $myfocus = new Accounts();
                    $myfocus->retrieve_entity_info($mycrmid,"Accounts");
            }elseif ($pmodule=='Leads'){
                    require_once('modules/Leads/Leads.php');
                    $myfocus = new Leads();
                    $myfocus->retrieve_entity_info($mycrmid,"Leads");
            }elseif ($pmodule=='Vendors'){
                    require_once('modules/Vendors/Vendors.php');
                    $myfocus = new Vendors();
                    $myfocus->retrieve_entity_info($mycrmid,"Vendors");
            }else {
                    $myfocus = CRMEntity::getInstance($pmodule);
                    $myfocus->retrieve_entity_info($mycrmid, $pmodule);
            }
            $fldname=$this->db->query_result($fresult,0,"columnname");
            $emailadd=br2nl($myfocus->column_fields[$fldname]);
        }
        
        $def_charset = vglobal("default_charset");
        $emailadd = html_entity_decode($emailadd, ENT_QUOTES, $def_charset);
        
        return $emailadd;
    }    
    public function getEmailsInfo($esentid){
        $result = $this->db->pquery("SELECT total_emails FROM vtiger_emakertemplates_sent WHERE esentid = ?", array($esentid));
        $total_emails = $this->db->query_result($result,0,"total_emails");
        $result2 = $this->db->pquery("SELECT count(emailid) as total FROM vtiger_emakertemplates_emails WHERE status = '1' AND esentid = ?", array($esentid));
        $sent_emails = $this->db->query_result($result2,0,"total");  

        if ($sent_emails == $total_emails){
            $status = "END";
            if ($total_emails > 1)
                $status_title = vtranslate("LBL_EMAILS_HAS_BEEN_SENT","EMAILMaker");
            else
                $status_title = vtranslate("LBL_EMAIL_HAS_BEEN_SENT","EMAILMaker");
        }else{
            $status_title = vtranslate("LBL_EMAILS_DISTRIBUTION","EMAILMaker");
            $status = "IN_PROCESS";
        }    
        $content = $sent_emails." ".vtranslate("LBL_EMAILS_SENT_FROM","EMAILMaker")." ".$total_emails;
        
        $buttons = "";
        if ($sent_emails != $total_emails){
            $buttons = "<div class='span5 textAlignRight'>";
                $buttons .= "<div class='marginRight10px'>";
                    $buttons .= "<button id='emailmaker_notifi_btn_".$esentid."' class='btn btn-success' type='button'><strong>".vtranslate("LBL_OPEN_EMAIL_POPUP","EMAILMaker")."</strong></button>";
                    $buttons .= "&nbsp;<button id='emailmaker_notifi_btn_stop_".$esentid."' class='btn btn-danger' type='button'><strong>".vtranslate("LBL_CANCEL")."</strong></button>";
                $buttons .= "</div>";
            $buttons .= "</div>";
        }
        $result3 = $this->db->pquery("SELECT error FROM vtiger_emakertemplates_emails WHERE status = '1' AND error IS NOT NULL AND esentid = ?",array($esentid));
        $error_emails = $this->db->num_rows($result3);
        $error_info = "";
        if ($error_emails > 0){
            $Errors = array();
            while($row3 = $this->db->fetchByAssoc($result3)){
                    $Errors[] = $row3['error'];
            }
            $error_info = implode("<br>",$Errors);
        }
        
        $stop_q = vtranslate("LBL_CLOSE_EMAIL_POPUP","EMAILMaker");
        
        return array("id" => $esentid, "title" => $status_title, "content" => $content, "buttons" => $buttons, "sent_emails" => $sent_emails, "total_emails" => $total_emails, "error_emails" => $error_emails, "error_info" => $error_info, "stop_q" => $stop_q);
    }
    public function getRecordsEmails($sourceModule, $recordIds, $basic = ""){ 
        $source_data = array();
        $emailFields = array();
               
        if (count($recordIds) == 1){
            $focus = CRMEntity::getInstance($sourceModule);
            $focus->id = $recordIds[0];            
            $focus->retrieve_entity_info($focus->id, $sourceModule);
            $source_data = $focus->column_fields;
            $single_record = true;
            $crmid = $focus->id;
        }else{
            $crmid = "";
            $single_record = false;            
        }    
        
        $Emails = $this->getEmailFieldsFromModule($single_record,$sourceModule,$recordIds);
        if (count($Emails) > 0) $emailFields[] = array("crmid" => $crmid, "module" => $sourceModule, "data" => $source_data, "emails" => $Emails);
       
        if ($basic == ""){
            $querystr = "select uitype, fieldid, fieldname, fieldlabel, columnname from vtiger_field where tabid=? and uitype IN (50,51,57,73,75,81,68,10)";
            $res=$this->db->pquery($querystr, array(getTabid($sourceModule)));
            $numrows = $this->db->num_rows($res);
            if ($numrows > 0){    
                for($i = 0; $i < $numrows; $i++){
                    $uitype = $this->db->query_result($res,$i,'uitype');
                    $fieldname = $this->db->query_result($res,$i,'fieldname');
                    $fieldid = $this->db->query_result($res,$i,'fieldid');
                    $fieldlabel = $this->db->query_result($res,$i,'fieldlabel');
                    $name = getTranslatedString($fieldlabel);

                    if ($single_record){    
                        $related_id = $focus->column_fields[$fieldname];
                        if ($related_id == "" || $related_id == "0") continue;
                        if (Vtiger_Util_Helper::checkRecordExistance($related_id) == "1") continue;
                        $related_module = getSalesEntityType($related_id); 
                        $entity_name = getEntityName($related_module, $related_id);
                        $related_label = vtranslate($fieldlabel, $related_module);
                        $focus2 = CRMEntity::getInstance($related_module);
                        $focus2->id = $related_id;
                        $focus2->retrieve_entity_info($related_id, $related_module);
                        $related_data = $focus2->column_fields;
                        $RelatedIds = array($related_id);
                    } else {
                        $related_id = $related_module = $entity_name = "";
                        $related_data = array();
                        $related_label = vtranslate($fieldlabel);
                        $RelatedIds = array();
                    }
                    
                    if ($related_id == "" || $related_id == "0") $set_crmid = $fieldname; else $set_crmid = $related_id;
                    
                    if ($uitype == "10" || $uitype == "68"){
                        if ($single_record){
                            $emailFields[] = array("crmid" => $set_crmid, "label" => $related_label, "name" => $entity_name[$set_crmid], "module" => $related_module, "data" => $related_data, "emails" =>$this->getEmailFieldsFromModule($single_record,$related_module,array($related_id)));
                        }else{
                            if ($uitype == "68"){
                                $a_module_lang = getTranslatedString("Accounts","Accounts");
                                $c_module_lang = getTranslatedString("Contacts","Contacts");
                            }else{
                                $querystr2 = "select relmodule from vtiger_fieldmodulerel where fieldid=? and relmodule IN (?,?,?,?)";
                                $res2 = $this->db->pquery($querystr2, array($fieldid,"Accounts","Contacts","Vendors","Leads"));
                                $num_rows2 = $this->db->num_rows($res2);

                                if ($num_rows2 > 0){
                                    while($row2 = $this->db->fetchByAssoc($res2)){
                                        $module_lang = getTranslatedString($row2["relmodule"],$row2["relmodule"]);
                                        $emailFields[] = array("crmid" => $set_crmid, "label" => $related_label." (".$module_lang.")", "name" => $entity_name[$related_id], "module" => $row2["relmodule"], "data" => $related_data, "emails" =>$this->getEmailFieldsFromModule($single_record,$row2["relmodule"],$RelatedIds));
                                    } 
                                }
                            }
                        }
                    }else{
                        if ($related_module == ""){
                            switch ($uitype){
                                case "50":
                                case "51":
                                case "73": $related_module = "Accounts"; break;
                                case "57": $related_module = "Contacts"; break;
                                case "75": $related_module = "Vendors"; break;
                                case "81": $related_module = "Vendors"; break;
                            }
                            $related_name = vtranslate($fieldlabel, $related_module);
                        }
                        $emailFields[] = array("crmid" => $set_crmid, "label" => $related_label, "name" => $entity_name[$related_id], "module" => $related_module, "data" => $related_data, "emails" =>$this->getEmailFieldsFromModule($single_record,$related_module,$RelatedIds));
                    }
                }
            }
        }

        $Emails_Types = array("standard" => $emailFields);

        $UsersRes=$this->db->pquery("select uitype, fieldid, fieldname, fieldlabel, columnname from vtiger_field where tabid=? and uitype IN (52,53)", array(getTabid($sourceModule)));
        while($row = $this->db->fetchByAssoc($UsersRes)) {
                $U_Source_Data = $UserIds = array();
                if (isset($source_data[$row["fieldname"]])){
                        $user_id = $source_data[$row["fieldname"]];      
                        $UserIds = array($user_id);
                        $U_Source_Data = $this->getUserData($user_id);
                } else {
                        $user_id = $row["fieldname"]; 
                }
            
                $AUser_Emails = $this->getEmailFieldsFromModule($single_record, "Users", $UserIds);
                if (count($AUser_Emails) > 0) $Emails_Types["logged"][] = array("crmid" => $user_id, "module" => "Users", "data" => $U_Source_Data, "emails" => $AUser_Emails, "label" => vtranslate($row["fieldlabel"],$sourceModule));
        }
        
        return $Emails_Types;
    }    
    public function getEmailFieldsFromModule($single_record, $sourceModule, $recordIds){
        if (!is_array($recordIds)) $recordIds = array($recordIds);
        $moduleModel = Vtiger_Module_Model::getInstance($sourceModule);
        $emailFields = $moduleModel->getFieldsByType('email');
        $accesibleEmailFields = array();
        $emailColumnNames = array();
        $emailColumnModelMapping = array();

        foreach($emailFields as $index=>$emailField){
            $fieldName = $emailField->getName();
            if($emailField->isViewable()){
                $accesibleEmailFields[] = $emailField;
                $emailColumnNames[] = $emailField->get('column');
                $emailColumnModelMapping[$emailField->get('column')] = $emailField;
            }
        }
        
        $emailFields = $accesibleEmailFields;

        $emailFieldCount = count($emailFields);
        $tableJoined = array();

        if($emailFieldCount > 0){
            if ($single_record && count($recordIds) > 0){
                $moduleMeta = $moduleModel->getModuleMeta();
                $wsModuleMeta = $moduleMeta->getMeta();
                $tabNameIndexList = $wsModuleMeta->getEntityTableIndexList();

                
                if ($sourceModule == "Users") {
                    $main_table = 'vtiger_users';
                    $tableJoined = array($main_table);
                    $main_column = 'id';
                } else {
                    $main_table = 'vtiger_crmentity';
                    $main_column = 'crmid';
                }
                
                $queryWithFromClause = 'SELECT '. implode(',',$emailColumnNames). ' FROM '.$main_table;
                
                foreach($emailFields as $emailFieldModel) {
                    $fieldTableName = $emailFieldModel->table;
                    if(in_array($fieldTableName, $tableJoined)){
                        continue;
                    }
                    $tableJoined[] = $fieldTableName;
                    $queryWithFromClause .= ' INNER JOIN '.$fieldTableName.' ON '.$fieldTableName.'.'.$tabNameIndexList[$fieldTableName].'= vtiger_crmentity.crmid';
                }
                $query =  $queryWithFromClause . ' WHERE '.$main_table.'.deleted = 0 AND '.$main_column.' IN ('.  generateQuestionMarks($recordIds).') AND (';

                for($i=0; $i<$emailFieldCount;$i++){
                    for($j=($i+1);$j<$emailFieldCount;$j++){
                        $query .= ' (' . $emailFields[$i]->getName() .' != \'\' and '. $emailFields[$j]->getName().' != \'\')';
                        if(!($i == ($emailFieldCount-2) && $j == ($emailFieldCount-1))) {
                            $query .= ' or ';
                        }
                    }
                }
                $query .= ') LIMIT 1';

                $db = PearDatabase::getInstance();
                $result = $db->pquery($query,$recordIds);
                $num_rows = $db->num_rows($result);

                if($num_rows == 0){
                    $query = $queryWithFromClause . ' WHERE '.$main_table.'.deleted = 0 AND '.$main_column.' IN ('.  generateQuestionMarks($recordIds).') AND (';
                    foreach($emailColumnNames as $index =>$columnName) {
                        $query .= " $columnName != ''";
                        //add glue or untill unless it is the last email field
                        if($index != ($emailFieldCount -1 ) ){
                            $query .= ' or ';
                        }
                    }
                    $query .= ') LIMIT 1';
                    $result = $db->pquery($query, $recordIds);
                    if($db->num_rows($result) > 0) {
                        $row = $db->query_result_rowdata($result,0);
                        foreach($emailColumnNames as $emailColumnName){
                            if(!empty($row[$emailColumnName])) {
                                $emailFields = array($emailColumnModelMapping[$emailColumnName]);
                                break;
                            }
                        }
                    }else{
                        foreach($emailColumnNames as $emailColumnName){
                            $emailFields = array($emailColumnModelMapping[$emailColumnName]);
                            break;
                        }
                    }
                }
                
            }else{
                foreach($emailColumnNames as $emailColumnName){
                    $emailFields[] = $emailColumnModelMapping[$emailColumnName];
                }
            }
        }
        return $emailFields;
    }     
    public function GetEMAILPDFListData($PDFTemplateIds){
        $return_data = Array();
        $current_user = Users_Record_Model::getCurrentUserModel();
        if (class_exists('PDFMaker_PDFMaker_Model')){
            $PDFMaker = new PDFMaker_PDFMaker_Model();

            $sql = 'SELECT templateid, description, filename, module
                            FROM vtiger_pdfmaker
                            WHERE templateid IN ('.  generateQuestionMarks($PDFTemplateIds).')';
            $result = $this->db->pquery($sql, $PDFTemplateIds);
            $num_rows = $this->db->num_rows($result);

            for ($i = 0; $i < $num_rows; $i++) {
                $currModule = $this->db->query_result($result, $i, 'module');
                $templateid = $this->db->query_result($result, $i, 'templateid');

                if ($PDFMaker->CheckTemplatePermissions($currModule, $templateid, false) === false)
                    continue;

                $return_data [$templateid] = $this->db->query_result($result, $i, 'filename');
            }
        }
        return $return_data;
    }    
    public function isTemplateForListView($templateid) {
        $result = $this->db->pquery("SELECT * FROM vtiger_emakertemplates WHERE templateid=? AND deleted = '0' AND is_listview = '1'", array($templateid));
        $num_rows = $this->db->num_rows($result);

        if ($num_rows > 0)
            return true;
        else
            return false;
    }    
    public function controlActiveDelay(){
        $result = $this->db->pquery("SELECT delay_active FROM vtiger_emakertemplates_delay", array());
        $delay_active = $this->db->query_result($result,0,"delay_active");  

        if ($delay_active == "1")
           return true;
        else
           return false;  
    }      
    public function geEmailCampaignsQuery($templateid, $formodule){
        $listQuery = "SELECT vtiger_emakertemplates_me.*, et.module, et.templatename, es.total_sent_emails FROM vtiger_emakertemplates_me "
             . "INNER JOIN vtiger_emakertemplates as et USING (templateid) "
             . "LEFT JOIN vtiger_emakertemplates_sent as es USING (esentid) "
             . "WHERE vtiger_emakertemplates_me.deleted = '0' ";
        if ($formodule != "") $listQuery .= "AND et.module = '".$formodule."' ";
        if ($templateid != "") $listQuery .= "AND et.templateid = '".$templateid."' ";
        return $listQuery;
    } 
    public function geEmailCampaignsCount($templateid = "", $formodule = ""){
        $listQuery = $this->geEmailCampaignsQuery($templateid, $formodule);
        $listResult = $this->db->pquery($listQuery, array());
        return $this->db->num_rows($listResult);
    }    
    public function geEmailCampaignsData($pagingModel, $templateid = "", $orderby = "templateid", $sortorder = "asc", $formodule = ""){
        $current_user = Users_Record_Model::getCurrentUserModel();
        $listQuery = $this->geEmailCampaignsQuery($templateid, $formodule);
        $listQuery .= "ORDER BY " . $orderby . " " . $sortorder;
        
        $startIndex = $pagingModel->getStartIndex();
        $pageLimit = $pagingModel->getPageLimit();
        
        $nextListQuery = $listQuery.' LIMIT '.($startIndex+$pageLimit).',1';
        $listQuery .= " LIMIT $startIndex,".($pageLimit+1);
        $listResult = $this->db->pquery($listQuery, array());

        $listViewRecordModels = Array();
        $num_rows = $this->db->num_rows($listResult);

        for ($i = 0; $i < $num_rows; $i++){
            $ME_Data = $this->db->fetchByAssoc($listResult, $i); 
     
            if ($this->CheckTemplatePermissions($ME_Data["module"], $ME_Data["templateid"], false) == false)
                continue;
            
            $listViewRecordModels[] = EMAILMaker_RecordME_Model::getInstanceObject($ME_Data);
        }
        $pagingModel->calculatePageRange($listViewRecordModels);

        if($num_rows > $pageLimit){
            array_pop($listViewRecordModels);
            $pagingModel->set('nextPageExists', true);
        }else{
            $pagingModel->set('nextPageExists', false);
        }

        $nextPageResult = $this->db->pquery($nextListQuery, $params);
        $nextPageNumRows = $this->db->num_rows($nextPageResult);
        if($nextPageNumRows <= 0) {
            $pagingModel->set('nextPageExists', false);
        }
        return $listViewRecordModels;
    }    
    public function GetWorkflowsList(){
        return $this->workflows;
    }    
    public function controlWorkflows(){
        $control = 0;
        $Workflows = $this->GetWorkflowsList(); 
        foreach ($Workflows AS $name){    
            $dest1 = "modules/com_vtiger_workflow/tasks/".$name.".inc";
            $dest2 = "layouts/vlayout/modules/Settings/Workflows/Tasks/".$name.".tpl";
            if (file_exists($dest1) && file_exists($dest2)) {
                $result1 = $this->db->pquery("SELECT * FROM com_vtiger_workflow_tasktypes WHERE tasktypename = ?",array($name));
                if ($this->db->num_rows($result1) > 0) $control++;
            } 
        }
        
        if (count($Workflows) == $control)
            return true;
        else
            return false;
    }    
    public function getEmailContent($emailid){
        $content = "";
        $sql = "SELECT vtiger_emakertemplates_contents.content FROM vtiger_emakertemplates_contents 
                INNER JOIN vtiger_activity using(activityid)
                INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_activity.activityid
                WHERE vtiger_emakertemplates_contents.activityid = ? AND vtiger_crmentity.deleted = 0";
        $result = $this->db->pquery($sql,array($emailid)); 
        $num_rows = $this->db->num_rows($result); 
        
        if ($num_rows > 0){
            $content = html_entity_decode($this->db->query_result($result,0,"content"));
        }
        return $content;
    }    
    function addAllAttachments($mail,$record){
        global $log, $root_directory;

        $adb = PearDatabase::getInstance();
        $res = $adb->pquery("select vtiger_attachments.* from vtiger_attachments inner join vtiger_seattachmentsrel on vtiger_attachments.attachmentsid = vtiger_seattachmentsrel.attachmentsid inner join vtiger_crmentity on vtiger_crmentity.crmid = vtiger_attachments.attachmentsid where vtiger_crmentity.deleted=0 and vtiger_seattachmentsrel.crmid=?", array($record));
        $count = $adb->num_rows($res);

        for($i=0;$i<$count;$i++){
            $fileid = $adb->query_result($res,$i,'attachmentsid');
            $filename = decode_html($adb->query_result($res,$i,'name'));
            $filepath = $adb->query_result($res,$i,'path');
            $filewithpath = $root_directory.$filepath.$fileid."_".$filename;
            if(is_file($filewithpath)){
                    $mail->AddAttachment($filewithpath,$filename);
            }
        }
        return $mail;
    }    
    public function getTrackImageDetails($crmId, $emailId, $emailTrack = true){
        $siteURL = vglobal('site_URL');
        $applicationKey = vglobal('application_unique_key');
        $trackURL = "$siteURL/modules/Emails/actions/TrackAccess.php?record=$emailId&parentId=$crmId&applicationKey=$applicationKey";
        $imageDetails = "<img src='$trackURL' alt='' width='1' height='1'>";
        return $imageDetails;
    }
   
    public static function getExpressions() {
        
        require_once 'modules/com_vtiger_workflow/include.inc';
        require_once 'modules/com_vtiger_workflow/expression_engine/VTExpressionsManager.inc';
       
        $db = PearDatabase::getInstance();

        $mem = new VTExpressionsManager($db);
        return $mem->expressionFunctions();
    }

    public static function getMetaVariables() {
        return self::$metaVariables;
    }
    
    public function geEmailWorkflowsQuery($templateid = "", $formodule = ""){
        $listQuery = "SELECT com_vtiger_workflows.*, com_vtiger_workflowtasks.task FROM com_vtiger_workflows "
             . "INNER JOIN com_vtiger_workflowtasks ON  com_vtiger_workflowtasks.workflow_id =  com_vtiger_workflows.workflow_id "
             . "WHERE com_vtiger_workflowtasks.task LIKE '%VTEMAILMakerMailTask%' ";
        if ($formodule != "") $listQuery .= "AND com_vtiger_workflows.module_name = '".$formodule."' ";
        if ($templateid != "") {
            $template_nl = strlen($templateid);
            $templatestring = '%;s:8:"template";s:'.$template_nl.':"'.$templateid.'";%';            
            $listQuery .= "AND com_vtiger_workflowtasks.task LIKE '".$templatestring."' ";
        }
        return $listQuery;
    } 
    public function geEmailWorkflowsCount($templateid = "", $formodule = ""){
        $listQuery = $this->geEmailWorkflowsQuery($templateid, $formodule);
        $listResult = $this->db->pquery($listQuery, array());
        return $this->db->num_rows($listResult);
    }    
    public function geEmailWorkflowsData($templateid = "", $orderby = "workflow_id", $sortorder = "asc", $formodule = ""){
        $current_user = Users_Record_Model::getCurrentUserModel();
        $listQuery = $this->geEmailWorkflowsQuery($templateid, $formodule);
        $listQuery .= "ORDER BY " . $orderby . " " . $sortorder;
        $listResult = $this->db->pquery($listQuery, array());

        $listViewRecordModels = Array();
        $num_rows = $this->db->num_rows($listResult);

        for ($i = 0; $i < $num_rows; $i++){
            $row = $this->db->fetchByAssoc($listResult, $i); 
            $record = Settings_Workflows_Record_Model::getInstance($row["workflow_id"]);
            
            $module_name = $row['module_name'];
            //To handle translation of calendar to To Do
            if($module_name == 'Calendar'){
                    $module_name = vtranslate('LBL_TASK', $module_name);
            }else{
                    $module_name = vtranslate($module_name, $module_name);
            }

            $row['module_name'] = $module_name;
            $row['execution_condition'] = vtranslate($record->executionConditionAsLabel($row['execution_condition']), 'Settings:Workflows');
            $record->setData($row);
            
            $listViewRecordModels[] = $record;
        }
        return $listViewRecordModels;
    }
    
    private function getUserData($userid){
        
        if (!isset($this->LUD[$userid])){
            $focus = CRMEntity::getInstance("Users");
            $focus->id = $userid;            
            $focus->retrieve_entity_info($userid, "Users");
            $this->LUD[$userid] = $focus->column_fields;
        }
        
        return $this->LUD[$userid];
    }
}