<?php
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class EMAILMaker_Module_Model extends EMAILMaker_EMAILMaker_Model { //Vtiger_Module_Model {

    public function getAlphabetSearchField(){
            return 'templatename';
    }
    public function getCreateRecordUrl(){
            return 'index.php?module=' . $this->get('name') . '&view=' . $this->getEditViewName();
    }
    public function saveRecord(EMAILMaker_Record_Model $recordModel){
            $db = PearDatabase::getInstance();
            $templateid = $recordModel->getId();
            if(empty($templateid)){
                    $templateid = $db->getUniqueID('vtiger_emakertemplates');
                    $sql = "INSERT INTO vtiger_emakertemplates(templatename, subject, description, body, deleted, templateid) VALUES (?,?,?,?,?,?)";
            }else{
                    $sql = "UPDATE vtiger_emakertemplates SET templatename=?, subject=?, description=?, body=?, deleted=? WHERE templateid = ?";
            }
            $params = array(decode_html($recordModel->get('templatename')), decode_html($recordModel->get('subject')),
                            decode_html($recordModel->get('description')), $recordModel->get('body'), 0, $templateid);
            $db->pquery($sql, $params);
            return $recordModel->setId($templateid);
    }
    public function deleteRecord(EMAILMaker_Record_Model $recordModel){
            $recordId = $recordModel->getId();
            $db = PearDatabase::getInstance();
            $db->pquery('DELETE FROM vtiger_emakertemplates WHERE templateid = ? ', array($recordId));
    }
    public function deleteAllRecords(){
            $db = PearDatabase::getInstance();
            $db->pquery('DELETE FROM vtiger_emakertemplates', array());
    }
    public function getAllModuleEmailTemplateFields(){
            $currentUserModel = Users_Record_Model::getCurrentUserModel();
            $allModuleList = $this->getAllModuleList();
            $allRelFields = array();
            foreach ($allModuleList as $index => $module){
                    if($module == 'Users'){
                            $fieldList = $this->getRelatedModuleFieldList($module, $currentUserModel);
                    }else{
                            $fieldList = $this->getRelatedFields($module, $currentUserModel);
                    }
                    foreach ($fieldList as $key => $field) {
                            $option = array(vtranslate($field['module'], $field['module']) . ':' . vtranslate($field['fieldlabel'], $field['module']), "$" . strtolower($field['module']) . "-" . $field['columnname'] . "$");
                            $allFields[] = $option;
                            if (!empty($field['referencelist'])){
                                    foreach ($field['referencelist'] as $key => $relField) {
                                            $relOption = array(vtranslate($field['fieldlabel'], $field['module']) . ':' . '(' . vtranslate($relField['module'], $relField['module']) . ')' . vtranslate($relField['fieldlabel'],$relField['module']), "$" . strtolower($field['module']) . "-" . $field['columnname'] . ":" . $relField['columnname'] . "$");
                                            $allRelFields[] = $relOption;
                                    }
                            }
                    }
                    if(is_array($allFields) && is_array($allRelFields)){
                            $allFields = array_merge($allFields, $allRelFields);
                            $allRelFields="";
                    }
                    $allOptions[vtranslate($module, $module)] = $allFields;
                    $allFields = "";
            }
            $option = array('Current Date', '$custom-currentdate$');
            $allFields[] = $option;
            $option = array('Current Time', '$custom-currenttime$');
            $allFields[] = $option;
            $allOptions['generalFields'] = $allFields;
            return $allOptions;
    }
    function getRelatedFields($module, $currentUserModel){
            $handler = vtws_getModuleHandlerFromName($module, $currentUserModel);
            $meta = $handler->getMeta();
            $moduleFields = $meta->getModuleFields();
            $returnData = array();
            foreach ($moduleFields as $key => $field){
                    $referencelist = array();
                    $relatedField = $field->getReferenceList();
                    if ($field->getFieldName() == 'assigned_user_id'){
                            $relModule = 'Users';
                            $referencelist = $this->getRelatedModuleFieldList($relModule, $currentUserModel);
                    }
                    if (!empty($relatedField)){
                            foreach ($relatedField as $ind => $relModule){
                                    $referencelist = $this->getRelatedModuleFieldList($relModule, $currentUserModel);
                            }
                    }
                    $returnData[] = array('module' => $module, 'fieldname' => $field->getFieldName(), 'columnname' => $field->getColumnName(), 'fieldlabel' => $field->getFieldLabelKey(), 'referencelist' => $referencelist);
            }
            return $returnData;
    }	
    function getRelatedModuleFieldList($relModule, $user){
            $handler = vtws_getModuleHandlerFromName($relModule, $user);
            $relMeta = $handler->getMeta();
            if (!$relMeta->isModuleEntity()) {
                    return null;
            }
            $relModuleFields = $relMeta->getModuleFields();
            $relModuleFieldList = array();
            foreach ($relModuleFields as $relind => $relModuleField){
                    if($relModule == 'Users'){
                            if($relModuleField->getFieldDataType() == 'string' || $relModuleField->getFieldDataType() == 'email' || $relModuleField->getFieldDataType() == 'phone') {
                                    $skipFields = array(98,115,116,31,32);
                                    if(!in_array($relModuleField->getUIType(), $skipFields) && $relModuleField->getFieldName() != 'asterisk_extension'){
                                            $relModuleFieldList[] = array('module' => $relModule, 'fieldname' => $relModuleField->getFieldName(), 'columnname' => $relModuleField->getColumnName(), 'fieldlabel' => $relModuleField->getFieldLabelKey());
                                    }
                            }
                    } else {
                            $relModuleFieldList[] = array('module' => $relModule, 'fieldname' => $relModuleField->getFieldName(), 'columnname' => $relModuleField->getColumnName(), 'fieldlabel' => $relModuleField->getFieldLabelKey());
                    }
            }
            return $relModuleFieldList;
    }
    public function getAllModuleList(){
            $db = PearDatabase::getInstance();

            $query = 'SELECT DISTINCT(name) AS modulename FROM vtiger_tab 
                              LEFT JOIN vtiger_field ON vtiger_field.tabid = vtiger_tab.tabid
                              WHERE vtiger_field.uitype = ?';
            $result = $db->pquery($query, array(13));
            $num_rows = $db->num_rows($result);
            $moduleList = array();
            for($i=0; $i<$num_rows; $i++){
                    $moduleList[] = $db->query_result($result, $i, 'modulename');
            }
            return $moduleList;
    }
    public function getSideBarLinks($linkParams){
            $linkTypes = array('SIDEBARLINK', 'SIDEBARWIDGET');
            $links = Vtiger_Link_Model::getAllByType($this->getId(), $linkTypes, $linkParams);

            $quickLinks = array(
                    array(
                            'linktype' => 'SIDEBARLINK',
                            'linklabel' => 'LBL_RECORDS_LIST',
                            'linkurl' => $this->getDefaultUrl(),
                            'linkicon' => '',
                    ),
            );                
            $version_type = $this->GetVersionType();
            if ($version_type == "Professional") {
                $quickLinks[] = array(  'linktype' => 'SIDEBARLINK',
                                        'linklabel' => 'LBL_EMAIL_CAMPAIGNS_LIST',
                                        'linkurl' => $this->getMEUrl(),
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
            
            foreach($quickLinks as $quickLink) {
                    $links['SIDEBARLINK'][] = Vtiger_Link_Model::getInstanceFromValues($quickLink);
            }
            return $links;
    }
    public function getRecordIds($skipRecords){
            $db = PearDatabase::getInstance();
            $result = $db->pquery('SELECT templateid FROM vtiger_emakertemplates WHERE templateid NOT IN ('.generateQuestionMarks($skipRecords).')', $skipRecords);
            $num_rows = $db->num_rows($result);
            $recordIds = array();
            for($i; $i<$num_rows; $i++){
                    $recordIds[] = $db->query_result($result, $i, 'templateid');
            }
            return $recordIds;
    }    
    public function getEmailRelatedModules(){
            $userPrivModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();

            $relatedModules = vtws_listtypes(array('email'), Users_Record_Model::getCurrentUserModel());
            $relatedModules = $relatedModules['types'];

            foreach ($relatedModules as $key => $moduleName){
                    if ($moduleName === 'Users') {
                            unset($relatedModules[$key]);
                    }
            }
            foreach ($relatedModules as $moduleName){
                    $moduleModel = Vtiger_Module_Model::getInstance($moduleName);
                    if($userPrivModel->isAdminUser() || $userPrivModel->hasGlobalReadPermission() || $userPrivModel->hasModulePermission($moduleModel->getId())) {
                            $emailRelatedModules[] = $moduleName;
                    }
            }
            $emailRelatedModules[] = 'Users';
            return $emailRelatedModules;
    }    
    public function searchEmails($searchValue){
            $emailsResult = array();
            $db = PearDatabase::getInstance();
            $currentUserModel = Users_Record_Model::getCurrentUserModel();
            $emailSupportedModulesList = $this->getEmailRelatedModules();

            foreach ($emailSupportedModulesList as $moduleName){
                    $searchFields = array();
                    $moduleModel = Vtiger_Module_Model::getInstance($moduleName);
                    $emailFieldModels = $moduleModel->getFieldsByType('email');

                    foreach ($emailFieldModels as $fieldName => $fieldModel){
                            if ($fieldModel->isViewable()) {
                                    $searchFields[] = $fieldName;
                            }
                    }
                    $emailFields = $searchFields;
                    $nameFields = $moduleModel->getNameFields();
                    foreach ($nameFields as $fieldName) {
                            $fieldModel = Vtiger_Field_Model::getInstance($fieldName, $moduleModel);
                            if ($fieldModel->isViewable()) {
                                    $searchFields[] = $fieldName;
                            }
                    }
                    if ($emailFields){
                            $moduleInstance = CRMEntity::getInstance($moduleName);
                            $queryGenerator = new QueryGenerator($moduleName, $currentUserModel);
                            $listFields = $searchFields;
                            $listFields[] = 'id';
                            $queryGenerator->setFields($listFields);

                            //Opensource fix for showing up deleted records on email search
                            $queryGenerator->startGroup(""); 
                            foreach ($searchFields as $key => $emailField) {
                                    $queryGenerator->addCondition($emailField, trim($searchValue), 'c', 'OR');
                            }

                            $queryGenerator->endGroup(); 
                            $result = $db->pquery($queryGenerator->getQuery(), array());
                            $numOfRows = $db->num_rows($result);

                            for($i=0; $i<$numOfRows; $i++) {
                                    $row = $db->query_result_rowdata($result, $i);
                                    foreach ($emailFields as $emailField){
                                            $emailFieldValue = $row[$emailField];
                                            if ($emailFieldValue) {
                                                    $recordLabel = getEntityFieldNameDisplay($moduleName, $nameFields, $row);
                                                    if (strpos($emailFieldValue, $searchValue) !== false || strpos($recordLabel, $searchValue) !== false || strpos(strtolower($recordLabel), strtolower($searchValue)) !== false) {
                                                            $emailsResult[vtranslate($moduleName, $moduleName)][$row[$moduleInstance->table_index]][]
                                                                                    = array('value' => $emailFieldValue,
                                                                                            'emailid' => $emailFieldValue,
                                                                                            'name' => $recordLabel,
                                                                                            'label' => $recordLabel . ' <b>('.$emailFieldValue.')</b>',
                                                                                            'id' => $row[$moduleInstance->table_index]."|".$emailField."|".$moduleName);

                                                    }
                                            }
                                    }
                            }
                    }
            }
            return $emailsResult;
    }
    public function getMERecipientsListSql() {
            $query = "SELECT vtiger_crmentity.crmid, vtiger_emakertemplates_emails.*, vtiger_activity.*, vtiger_emaildetails.email_flag, vtiger_activity.time_start FROM vtiger_emakertemplates_emails
                            INNER JOIN vtiger_emakertemplates_me
                                ON vtiger_emakertemplates_me.esentid = vtiger_emakertemplates_emails.esentid
                            LEFT JOIN vtiger_activity
                                ON vtiger_activity.activityid = vtiger_emakertemplates_emails.parent_id
                            LEFT JOIN vtiger_crmentity
                                ON vtiger_crmentity.crmid = vtiger_activity.activityid
                            LEFT JOIN vtiger_emaildetails
                                ON vtiger_emaildetails.emailid = vtiger_activity.activityid";
            return $query;
    }
    public function getMERecipientsListCount($recordId = false) {
            $params = array();
            $db = PearDatabase::getInstance();
            $query  =  $this->getMERecipientsListSql();

            if ($recordId) {
                $query .= " WHERE vtiger_emakertemplates_me.meid=?";
                $params = array($recordId);
            }
            $result = $db->pquery($query, $params);
            return $db->num_rows($result);
    }
    public function getMERecipientsList($mode, $pagingModel, $user, $recordId = false) {
            $currentUser = Users_Record_Model::getCurrentUserModel();
            $db = PearDatabase::getInstance();

            if (!$user) {
                    $user = $currentUser->getId();
            }

            $nowInUserFormat = Vtiger_Datetime_UIType::getDisplayDateValue(date('Y-m-d H:i:s'));
            $nowInDBFormat = Vtiger_Datetime_UIType::getDBDateTimeValue($nowInUserFormat);
            list($currentDate, $currentTime) = explode(' ', $nowInDBFormat);

            $query  =  $this->getMERecipientsListSql();
            $query .= " WHERE vtiger_emakertemplates_me.meid=? LIMIT ". $pagingModel->getStartIndex() .", ". ($pagingModel->getPageLimit()+1);

            $params = array($recordId);
            $result = $db->pquery($query, $params);
            $numOfRows = $db->num_rows($result);

            $groupsIds = Vtiger_Util_Helper::getGroupsIdsForUsers($currentUser->getId());
            $recipients = array();
            for($i=0; $i<$numOfRows; $i++) {
                    $newRow = $db->query_result_rowdata($result, $i);
                    $model = Vtiger_Record_Model::getCleanInstance('Emails');
                    $ownerId = $newRow['smownerid'];
                    $currentUser = Users_Record_Model::getCurrentUserModel();
                    $model->setData($newRow);
                    $model->setId($newRow['crmid']);
                    $pid = $newRow['pid'];

                    $pmodule = getSalesEntityType($pid);
                    $pmoduleModel = Vtiger_Module_Model::getInstance($pmodule);
                    $model->set("pmodule",$pmodule);
                    $model->set("pmodulemodel",$pmoduleModel);

                    $model->set("status",$newRow['email_flag']);

                    $recipients[] = $model;
            }

            $pagingModel->calculatePageRange($recipients);
            if($numOfRows > $pagingModel->getPageLimit()){
                    array_pop($recipients);
                    $pagingModel->set('nextPageExists', true);
            } else {
                    $pagingModel->set('nextPageExists', false);
            }

            return $recipients;
    }
}