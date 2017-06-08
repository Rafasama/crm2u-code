<?php
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/

class EMAILMaker_ListViewME_Model extends EMAILMaker_ListView_Model {

    public function getListViewEntries($pagingModel){
        $adb = PearDatabase::getInstance();
        $module = $this->getModule();
        $moduleName = $module->getName();

        $recordModelClass = Vtiger_Loader::getComponentClassName('Model', 'RecordME', $moduleName);

        $listQuery = "SELECT vtiger_emakertemplates_me.* FROM vtiger_emakertemplates_me "
                    ."INNER JOIN vtiger_emakertemplates USING(templateid) "
                    ."WHERE";

        $params = array();
        $sourceModule = $this->get('sourceModule');
        if(!empty($sourceModule)) {
            $listQuery .= ' vtiger_emakertemplates.module = ? AND ';
            $params[] = $sourceModule;
        }
        $listQuery .= " deleted = '0' ";

        $startIndex = $pagingModel->getStartIndex();
        $pageLimit = $pagingModel->getPageLimit();

        $orderBy = $this->getForSql('orderby');
        if (!empty($orderBy) && $orderBy === 'smownerid') { 
                $fieldModel = Vtiger_Field_Model::getInstance('assigned_user_id', $moduleModel); 
                if ($fieldModel->getFieldDataType() == 'owner') { 
                        $orderBy = 'COALESCE(CONCAT(vtiger_users.first_name,vtiger_users.last_name),vtiger_groups.groupname)'; 
                } 
        }

        if(!empty($orderBy)) {
            $listQuery .= ' ORDER BY '. $orderBy . ' ' .$this->getForSql('sortorder');
        }
        $nextListQuery = $listQuery.' LIMIT '.($startIndex+$pageLimit).',1';
        $listQuery .= " LIMIT $startIndex,".($pageLimit+1);

        $listResult = $adb->pquery($listQuery, $params);
        $noOfRecords = $adb->num_rows($listResult);

        $listViewRecordModels = array();
        for($i=0; $i<$noOfRecords; ++$i) {
            $row = $adb->query_result_rowdata($listResult, $i);
            $record = new $recordModelClass();

            $record->setData($row);
            $listViewRecordModels[$record->getId()] = $record;
        }
        $pagingModel->calculatePageRange($listViewRecordModels);

        if($adb->num_rows($listResult) > $pageLimit){
            array_pop($listViewRecordModels);
            $pagingModel->set('nextPageExists', true);
        }else{
            $pagingModel->set('nextPageExists', false);
        }

        $nextPageResult = $adb->pquery($nextListQuery, $params);
        $nextPageNumRows = $adb->num_rows($nextPageResult);
        if($nextPageNumRows <= 0) {
            $pagingModel->set('nextPageExists', false);
        }
        return $listViewRecordModels;
    }

    public function getListViewCount() {
        $adb = PearDatabase::getInstance();

        $module = $this->getModule();
        $listQuery = "SELECT count(*) AS count FROM vtiger_emakertemplates_me "
                    ."INNER JOIN vtiger_emakertemplates USING(templateid) ";
        $sourceModule = $this->get('sourceModule');
        if($sourceModule) {
                $listQuery .= " WHERE vtiger_emakertemplates.module = '$sourceModule'";
        }

        $listResult = $adb->pquery($listQuery, array());
        return $adb->query_result($listResult, 0, 'count');
    }
    
    public static function getInstance($moduleName) {
		$db = PearDatabase::getInstance();
		$currentUser = vglobal('current_user');
		$modelClassName = Vtiger_Loader::getComponentClassName('Model', 'ListViewME', $moduleName);
		$instance = new $modelClassName();
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		return $instance->set('module', $moduleModel);
	}
}