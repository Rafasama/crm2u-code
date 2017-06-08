<?php
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ******************************************************************************* */

class EMAILMaker_Record_Model extends Vtiger_Record_Model {
	
    public function getId(){
        return $this->get('templateid');
    }
    public function setId($value){
        return $this->set('templateid',$value);
    }	
    public function delete(){
        $this->getModule()->deleteRecord($this);
    }
    public function deleteAllRecords(){
        $this->getModule()->deleteAllRecords();
    }
    public function getEmailTemplateFields(){
        return $this->getModule()->getAllModuleEmailTemplateFields();
    }
    public function getTemplateData($record){
        return $this->getModule()->getTemplateData($record);
    }
    public function getDetailViewUrl() {
        $module = $this->getModule();
        return 'index.php?module='.$this->getModuleName().'&view='.$module->getDetailViewName().'&record='.$this->getId();
    }
    public static function getInstanceById($templateId, $module=null) {
        $db = PearDatabase::getInstance();
        $result = $db->pquery('SELECT * FROM vtiger_emakertemplates WHERE templateid = ?', array($templateId));
        if($db->num_rows($result) > 0) {
                $row = $db->query_result_rowdata($result, 0);
                $recordModel = new self();
                return $recordModel->setData($row)->setModule('EMAILMaker');
        }
        return null;
    }	
}
