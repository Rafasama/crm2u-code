<?php
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/

class EMAILMaker_RecordME_Model extends Vtiger_Record_Model {

    var $ConvertDate = array('is', 'is not', 'between', 'before', 'after', 'in less than', 'in more than');
    var $availableModules = array('Contacts', 'Vendors', 'Leads', 'Accounts');      
    
    public function getId(){
        return $this->get('meid');
    }
    public function getName(){
        return $this->get('description');
    }
    public function get($key){
        return parent::get($key);
    }
    public function getEditViewUrl(){
        return 'index.php?module=EMAILMaker&view=EditME&record='.$this->getId();
    }   
    public function getModule(){
        return $this->module;
    }
    public function setModule($moduleName){
        $this->module = Vtiger_Module_Model::getInstance($moduleName);
        return $this;
    }
    public function isDefault(){
        return true;
    }
    public function save(){
        $adb = PearDatabase::getInstance();
        $meid = $this->get('meid');        
        $description = $this->get('description');
        $templateid = $this->get('templateid');
        $listid = $this->get('listid'); 
        $start_of = $this->get('start_of');  
        $from_name = $this->get('from_name');  
        $from_email = $this->get('from_email');  
        $max_limit =  $this->get('max_limit');  
        $me_subject = $this->get('me_subject');  
        $me_language = $this->get('me_language');  
        $email_fieldname = $this->get('email_fieldname');  
        $moduleName = $this->get('module_name');
        $userid = $this->get('userid');

        $params = array($description, $templateid, $listid, $start_of, $from_name, $from_email, $max_limit, $me_subject, $me_language, $email_fieldname);
        if(isset($meid) && $meid != "" && $meid != "0"){
            $sql = "UPDATE vtiger_emakertemplates_me SET description = ?, templateid = ?, listid =? , start_of =? , from_name =? , from_email =?, max_limit = ?, me_subject = ?, language = ?, email_fieldname = ? WHERE meid = ?";
            $params[] = $meid;
            $insert = false;
        } else {
            $sql = "INSERT INTO vtiger_emakertemplates_me (description, templateid, listid, start_of, from_name, from_email, max_limit, me_subject, language, email_fieldname, status, userid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $params[] = $this->get('status');
            $params[] = $userid;
            $insert = true;            
        }
        $adb->pquery($sql, $params);
        if ($insert) $meid = $adb->database->Insert_ID("vtiger_emakertemplates_me");        
        $this->set('meid', $meid);
    }    
    public function delete(){
        $adb = PearDatabase::getInstance();
        $meid = $this->getId();
        $adb->pquery("UPDATE vtiger_emakertemplates_me SET deleted = '1' WHERE meid = ?", array($meid));
        
        $adb->pquery("UPDATE vtiger_emakertemplates_emails 
                     INNER JOIN vtiger_emakertemplates_sent ON vtiger_emakertemplates_emails.esentid = vtiger_emakertemplates_sent.esentid 
                     INNER JOIN  vtiger_emakertemplates_me ON  vtiger_emakertemplates_me.esentid = vtiger_emakertemplates_sent.esentid 
                     SET vtiger_emakertemplates_emails.deleted = '1' WHERE vtiger_emakertemplates_emails.status != 1 AND vtiger_emakertemplates_me.meid = ?", array($meid));
    }
    public function getEntityMethods(){
            $db = PearDatabase::getInstance();
            $emm = new VTEntityMethodManager($db);
            $methodNames = $emm->methodsForModule($this->get('module_name'));
            return $methodNames;
    }
    public function getRecordLinks(){
            $links = array();
            $recordLinks = array(
                    array(
                            'linktype' => 'LISTVIEWRECORD',
                            'linklabel' => 'LBL_EDIT_RECORD',
                            'linkurl' => $this->getEditViewUrl(),
                            'linkicon' => 'icon-pencil'
                    ),
                    array(
                            'linktype' => 'LISTVIEWRECORD',
                            'linklabel' => 'LBL_DELETE_RECORD',
                            'linkurl' => 'javascript:Vtiger_List_Js.deleteRecord('.$this->getId().');',
                            'linkicon' => 'icon-trash'
                    )
            );
            foreach($recordLinks as $recordLink) {
                    $links[] = Vtiger_Link_Model::getInstanceFromValues($recordLink);
            }

            return $links;
    }
    public static function getInstance($meid){        
        $adb = PearDatabase::getInstance();
        $sql = "SELECT vtiger_emakertemplates_me.*, field.fieldlabel, vtiger_emakertemplates.module AS module_name, es.total_sent_emails, es.total_emails FROM vtiger_emakertemplates_me "
             . "INNER JOIN vtiger_emakertemplates USING(templateid) "
             . "LEFT JOIN vtiger_emakertemplates_sent as es USING (esentid) "
             . "LEFT JOIN vtiger_field as field ON vtiger_emakertemplates_me.email_fieldname = field.fieldname "
             . "WHERE vtiger_emakertemplates_me.meid = ?";
        $result = $adb->pquery($sql, array($meid));

        if($adb->num_rows($result)){
            $data = $adb->raw_query_result_rowdata($result, 0);            
            return self::getInstanceObject($data);
        }else{
            return null;
        }
    }
    public static function getCleanInstance($templateid = ""){
        $adb = PearDatabase::getInstance();        
        $current_user = Users_Record_Model::getCurrentUserModel();
        $from_name = $current_user->first_name." ".$current_user->last_name;
        $from_email = $current_user->email1;
        $userid = $current_user->id;   
        
        if(!empty($current_user->language)){
            $user_language = $current_user->language;
        } else {
            $user_language = vglobal("default_language");
        }    
        $data = array("module_name" => "", "from_name" => $from_name, "from_email" => $from_email, "start_of" => "", "userid" => $userid, "status" => "not started", "templateid" => $templateid, "language" => $user_language);
        return self::getInstanceObject($data);
    }
    public static function getInstanceObject($data){
        $MassEmailRecordModel = new self();
        $currentUser = Users_Record_Model::getCurrentUserModel();
        $hour_format = $currentUser->get('hour_format');        
        $Cols = array("email_fieldname","email_fieldname_label","language","language_label","description","module_name","templateid","listid","meid","status","userid","from_name","from_email","start_of","start_of_date","start_of_time","max_limit","me_subject", "unsubscribes", "total_entries", "total_sent_emails", "esentid", "total_emails"); 

        if ($hour_format == "12") {
            $time_format = 'h:i a';
        } else {
            $time_format = 'H:i';
        }
        
        if ($data["start_of"] != ""){
            $convert_date_start = DateTimeField::convertToUserTimeZone($data["start_of"]);
            $start_of_date = $convert_date_start->format('Y-m-d');
            $start_of_time = $convert_date_start->format('H:00');
            $formated_time = $convert_date_start->format($time_format);
        } else {
            $start_of_date = date('Y-m-d', strtotime("+1 day"));
            $start_of_time = "00:00";
            $formated_time = "";
        }    
        $data["start_of_date"] = DateTimeField::convertToUserFormat($start_of_date);
        $data["start_of_time"] = $start_of_time;
        $data["start_of"] = trim($data["start_of_date"]." ".$formated_time);

        if ($data["total_sent_emails"] == "") $data["total_sent_emails"] = "0";        
        
        if ($data["module_name"] == ""){
            $MassEmailRecordModel->controlAvailableModules();
            $Available_Modules = $MassEmailRecordModel->getAvailableModules();            
            $data["module_name"] = $Available_Modules[0];
        }
        
        if ($data["language"] == ""){                      
            if(!empty($current_user->language)){
                $data["language"] = $current_user->language;
            } else {
                $data["language"] = vglobal("default_language");
            }
        }        
        
        if ($data["language"] != ""){ 
            $data["language_label"] = Vtiger_Language_Handler::getLanguageLabel($data["language"]);
        }
        
        if ($data["email_fieldname"] != ""){
            $data["email_fieldname_label"] = vtranslate($data["fieldlabel"],$data["module_name"]);            
        }
        
        foreach ($Cols AS $col) {
             $MassEmailRecordModel->set($col, $data[$col]);
        }
        
        $MassEmailRecordModel->setModule($data["module_name"]);
        $MassEmailRecordModel->setTemplateData();
        
        return $MassEmailRecordModel;
    }
    public function setTemplateData(){
    
        $templateid = $this->get("templateid"); 
        
        if ($templateid != "") {
            $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
            $data = $EMAILMaker->GetDetailViewData($templateid);
            $this->set("templatedata", $data);

            $module_name = $this->get("module_name"); 
            if ($module_name == "") $this->set("module_name", $data["module"]);
            
            $me_subject = $this->get("me_subject"); 
            if ($me_subject == "") $this->set("me_subject", $data["subject"]);
        }         
    }
    public function controlAvailableModules(){
        $noOfFields = count($this->availableModules);

        for ($i = 0; $i < $noOfFields; ++$i){
            if(!vtlib_isModuleActive($this->availableModules[$i])){
                unset($this->availableModules[$i]);
            }
        }
    }    
    public function getAvailableModules(){
        return $this->availableModules;
    }    
    public static function getModuleFilters($for_module, $selected = ""){           
        $CustomViewFilters = CustomView_Record_Model::getAll($for_module);
        $customviewcombo_html = "<select name='selected_filter' class='chzn-select'>";
        foreach ($CustomViewFilters AS $CVF) {
            $customviewcombo_html .= "<option value='".$CVF->get("cvid")."' ".($selected == $CVF->get("cvid")?"selected":"").">".vtranslate($CVF->get("viewname"),$for_module)."</option>";
        }
        $customviewcombo_html .= "</select>";
        return $customviewcombo_html;
    }   
    public static function getModuleColumns($for_module, $selected = ""){           
        $moduleModel = Vtiger_Module_Model::getInstance($for_module);
        $emailFieldModels = $moduleModel->getFieldsByType('email');

        $columnscombo_html = "<select name='selected_email_fieldname' class='chzn-select'>";
        
        foreach ($emailFieldModels as $fieldName => $fieldModel) {
            if ($fieldModel->isViewable()) {
                $columnscombo_html .= "<option value='".$fieldName."' ".($selected == $fieldName?"selected":"").">".vtranslate($fieldModel->get('label'),$for_module)."</option>";
            }
        }
        $columnscombo_html .= "</select>";
        return $columnscombo_html;
    }    
    public function getTemplateModule() {
        $templatedata = $this->get("templatedata");

        if (isset($templatedata["module"]))
            $template_module = $templatedata["module"];
        else
            $template_module = "";
        
        return $template_module;    
    }    
    public function getTemplateName() {
        $templateid = $this->get("templateid");
        $templatedata = $this->get("templatedata");

        if (isset($templatedata["templatename"]))
            $template_url = "<a href=\"index.php?module=EMAILMaker&view=Detail&record=" . $templateid . "&return_module=EMAILMaker&return_view=List\">" . $templatedata["templatename"] . "</a>";
        else
            $template_url = "";
        
        return $template_url;
    }    
    public function getFilterLink($link = false) {
        $adb = PearDatabase::getInstance();
        $listname = "";
        $listid = $this->get("listid");
        $result = $adb->pquery("SELECT * FROM vtiger_customview WHERE cvid=?", array($listid));
        $num_rows = $adb->num_rows($result); 
        
        if ($num_rows > 0) {
            $viewname = $adb->query_result($result,0,"viewname");
            $entitytype = $adb->query_result($result,0,"entitytype");
            $listname = vtranslate($entitytype,$entitytype);
            $listname .= " &gt; ";
            $listname .= vtranslate($viewname,$entitytype);
        } 

        return $listname;
    }
    
    public function setFromRequestData($requestData) {

        $StartOf = DateTimeField::convertToDBTimeZone($requestData["start_of_date"]." ".$requestData["start_of_time"]);
        $start_of =  $StartOf->format('Y-m-d H:i:s');
        
        $Cols = array("description" => $requestData["description"],
                      "module_name" => $requestData["for_module"],
                      "templateid" => $requestData["emailtemplateid"],
                      "listid" => $requestData["selected_filter"],
                      "from_name" => $requestData["from_name"],
                      "from_email" => $requestData["from_email"],
                      "start_of" => $start_of,
                      "max_limit" => $requestData["max_limit"],
                      "me_subject" => $requestData["subject"],
                      "me_language" => $requestData["me_language"],
                      "email_fieldname" => $requestData["selected_email_fieldname"]); 
        foreach ($Cols AS $col => $val) {
            $this->set($col, $val);
        }
    }
    
    
    public function getDetailViewRelatedLinks($Params) {
        $detailViewLinks = array();
        $relatedLinks = array();
        $relatedLinks[] = array(
                        'linktype' => 'DETAILVIEWTAB',
                        'linklabel' => vtranslate('LBL_CAMPAIGN_DETAIL', $Params["MODULE"]),
                        'linkKey' => 'LBL_CAMPAIGN_DETAIL',
                        'linkurl' => 'index.php?module=EMAILMaker&view=DetailME&record='.$Params["RECORD"],
                        'linkicon' => ''
        );
        
        $relatedLinks[] = array(
                        'linktype' => 'DETAILVIEWTAB',
                        'linklabel' => vtranslate('LBL_RECIPIENTS_LIST', $Params["MODULE"]),
                        'linkKey' => 'LBL_RECIPIENTS_LIST',
                        'linkurl' => 'index.php?module=EMAILMaker&view=DetailME&mode=RecipientsList&record='.$Params["RECORD"],
                        'linkicon' => ''
        );
        
        foreach($relatedLinks as $relatedLinkEntry) {
                $relatedLink = Vtiger_Link_Model::getInstanceFromValues($relatedLinkEntry);
                $detailViewLinks[$relatedLink->getType()][] = $relatedLink;
        }
        
        return $detailViewLinks;
    }
    
}