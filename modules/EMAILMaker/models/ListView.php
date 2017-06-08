<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class EMAILMaker_ListView_Model extends Vtiger_Base_Model {
    public function getModule() {
        return $this->get('module');
    }
    public function getSideBarLinks($linkParams){
        $linkTypes = array('SIDEBARLINK', 'SIDEBARWIDGET');
        $moduleLinks = $this->getModule()->getSideBarLinks($linkParams);
        $listLinkTypes = array('LISTVIEWSIDEBARLINK', 'LISTVIEWSIDEBARWIDGET');
        $listLinks = Vtiger_Link_Model::getAllByType($this->getModule()->getId(), $listLinkTypes);

        if($listLinks['LISTVIEWSIDEBARLINK']) {
            foreach($listLinks['LISTVIEWSIDEBARLINK'] as $link) {
                    $moduleLinks['SIDEBARLINK'][] = $link;
            }
        }
        if($listLinks['LISTVIEWSIDEBARWIDGET']) {
            foreach($listLinks['LISTVIEWSIDEBARWIDGET'] as $link) {
                    $moduleLinks['SIDEBARWIDGET'][] = $link;
            }
        }
        return $moduleLinks;
    }
    public function getListViewLinks($linkParams){
        $currentUserModel = Users_Record_Model::getCurrentUserModel();
        $moduleModel = $this->getModule();

        $linkTypes = array('LISTVIEWBASIC', 'LISTVIEW', 'LISTVIEWSETTING');
        $links = Vtiger_Link_Model::getAllByType($moduleModel->getId(), $linkTypes, $linkParams);

        $basicLinks = $this->getBasicLinks();
        foreach($basicLinks as $basicLink){
            $links['LISTVIEWBASIC'][] = Vtiger_Link_Model::getInstanceFromValues($basicLink);
        }
        $advancedLinks = $this->getAdvancedLinks();
        foreach($advancedLinks as $advancedLink){
            $links['LISTVIEW'][] = Vtiger_Link_Model::getInstanceFromValues($advancedLink);
        }
        if($currentUserModel->isAdminUser()){
            $settingsLinks = $this->getSettingLinks();
            foreach($settingsLinks as $settingsLink){
                    $links['LISTVIEWSETTING'][] = Vtiger_Link_Model::getInstanceFromValues($settingsLink);
            }
        }
        return $links;
    }
    public function getListViewMassActions($linkParams){
        $currentUserModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
        $moduleModel = $this->getModule();
        $linkTypes = array('LISTVIEWMASSACTION');
        $links = Vtiger_Link_Model::getAllByType($moduleModel->getId(), $linkTypes, $linkParams);
        $massActionLinks = array();
        if($currentUserModel->hasModuleActionPermission($moduleModel->getId(), 'EditView')){
            $massActionLinks[] = array(
                'linktype' => 'LISTVIEWMASSACTION',
                'linklabel' => 'LBL_EDIT',
                'linkurl' => 'javascript:Vtiger_List_Js.triggerMassEdit("index.php?module='.$moduleModel->get('name').'&view=MassActionAjax&mode=showMassEditForm");',
                'linkicon' => ''
            );
        }
        if($currentUserModel->hasModuleActionPermission($moduleModel->getId(), 'Delete')){
            $massActionLinks[] = array(
                'linktype' => 'LISTVIEWMASSACTION',
                'linklabel' => 'LBL_DELETE',
                'linkurl' => 'javascript:Vtiger_List_Js.massDeleteRecords("index.php?module='.$moduleModel->get('name').'&action=MassDelete");',
                'linkicon' => ''
            );
        }
        if($moduleModel->isCommentEnabled()){
            $massActionLinks[] = array(
                'linktype' => 'LISTVIEWMASSACTION',
                'linklabel' => 'LBL_ADD_COMMENT',
                'linkurl' => 'index.php?module='.$moduleModel->get('name').'&view=MassActionAjax&mode=showAddCommentForm',
                'linkicon' => ''
            );
        }
        foreach($massActionLinks as $massActionLink){
            $links['LISTVIEWMASSACTION'][] = Vtiger_Link_Model::getInstanceFromValues($massActionLink);
        }
        return $links;
    }
    public function getListViewHeaders() {
        $listViewContoller = $this->get('listview_controller');
        $module = $this->getModule();
        $headerFieldModels = array();
        $headerFields = $listViewContoller->getListViewHeaderFields();
        foreach($headerFields as $fieldName => $webserviceField){
                if($webserviceField && !in_array($webserviceField->getPresence(), array(0,2))) continue;
                $headerFieldModels[$fieldName] = Vtiger_Field_Model::getInstance($fieldName,$module);
        }
        return $headerFieldModels;
    }

    public function getListViewEntries($pagingModel){
        $db = PearDatabase::getInstance();
        $moduleName = $this->getModule()->get('name');
        $moduleFocus = CRMEntity::getInstance($moduleName);
        $moduleModel = Vtiger_Module_Model::getInstance($moduleName);
        $queryGenerator = $this->get('query_generator');
        $listViewContoller = $this->get('listview_controller');
        $searchKey = $this->get('search_key');
        $searchValue = $this->get('search_value');
        $operator = $this->get('operator');
        if(!empty($searchKey)) {
                $queryGenerator->addUserSearchConditions(array('search_field' => $searchKey, 'search_text' => $searchValue, 'operator' => $operator));
        }
        $orderBy = $this->getForSql('orderby');
        $sortOrder = $this->getForSql('sortorder');
        //List view will be displayed on recently created/modified records
        if(empty($orderBy) && empty($sortOrder) && $moduleName != "Users"){
                $orderBy = 'modifiedtime';
                $sortOrder = 'DESC';
        }
        if(!empty($orderBy)){
            $columnFieldMapping = $moduleModel->getColumnFieldMapping();
            $orderByFieldName = $columnFieldMapping[$orderBy];
            $orderByFieldModel = $moduleModel->getField($orderByFieldName);
            if($orderByFieldModel && $orderByFieldModel->getFieldDataType() == Vtiger_Field_Model::REFERENCE_TYPE){
                //IF it is reference add it in the where fields so that from clause will be having join of the table
                $queryGenerator = $this->get('query_generator');
                $queryGenerator->addWhereField($orderByFieldName);
            }
        }
        $listQuery = $this->getQuery();
        $sourceModule = $this->get('src_module');
        if(!empty($sourceModule)){
            if(method_exists($moduleModel, 'getQueryByModuleField')){
                $overrideQuery = $moduleModel->getQueryByModuleField($sourceModule, $this->get('src_field'), $this->get('src_record'), $listQuery);
                if(!empty($overrideQuery)) {
                        $listQuery = $overrideQuery;
                }
            }
        }
        $startIndex = $pagingModel->getStartIndex();
        $pageLimit = $pagingModel->getPageLimit();

        if(!empty($orderBy)){
            if($orderByFieldModel && $orderByFieldModel->isReferenceField()){
                $referenceModules = $orderByFieldModel->getReferenceList();
                $referenceNameFieldOrderBy = array();
                foreach($referenceModules as $referenceModuleName){
                    $referenceModuleModel = Vtiger_Module_Model::getInstance($referenceModuleName);
                    $referenceNameFields = $referenceModuleModel->getNameFields();
                    $columnList = array();
                    foreach($referenceNameFields as $nameField){
                        $fieldModel = $referenceModuleModel->getField($nameField);
                        $columnList[] = $fieldModel->get('table').$orderByFieldModel->getName().'.'.$fieldModel->get('column');
                    }
                    if(count($columnList) > 1){
                        $referenceNameFieldOrderBy[] = getSqlForNameInDisplayFormat(array('first_name'=>$columnList[0],'last_name'=>$columnList[1]),'Users').' '.$sortOrder;
                    } else {
                        $referenceNameFieldOrderBy[] = implode('', $columnList).' '.$sortOrder ;
                    }
                }
                $listQuery .= ' ORDER BY '. implode(',',$referenceNameFieldOrderBy);
            }else{
                $listQuery .= ' ORDER BY '. $orderBy . ' ' .$sortOrder;
            }
        }

        $viewid = ListViewSession::getCurrentView($moduleName);
        ListViewSession::setSessionQuery($moduleName, $listQuery, $viewid);

        $listQuery .= " LIMIT $startIndex,".($pageLimit+1);
        $listResult = $db->pquery($listQuery, array());
        $listViewRecordModels = array();
        $listViewEntries =  $listViewContoller->getListViewRecords($moduleFocus,$moduleName, $listResult);
        $pagingModel->calculatePageRange($listViewEntries);

        if($db->num_rows($listResult) > $pageLimit){
            array_pop($listViewEntries);
            $pagingModel->set('nextPageExists', true);
        }else{
            $pagingModel->set('nextPageExists', false);
        }
        $index = 0;
        foreach($listViewEntries as $recordId => $record){
            $rawData = $db->query_result_rowdata($listResult, $index++);
            $record['id'] = $recordId;
            $listViewRecordModels[$recordId] = $moduleModel->getRecordFromArray($record, $rawData);
        }
        return $listViewRecordModels;
    }
    public function getListViewCount(){
        $db = PearDatabase::getInstance();
        $queryGenerator = $this->get('query_generator');
        $searchKey = $this->get('search_key');
        $searchValue = $this->get('search_value');
        $operator = $this->get('operator');
        if(!empty($searchKey)) {
                $queryGenerator->addUserSearchConditions(array('search_field' => $searchKey, 'search_text' => $searchValue, 'operator' => $operator));
        }
        $listQuery = $this->getQuery();
        $sourceModule = $this->get('src_module');
        if(!empty($sourceModule)) {
                $moduleModel = $this->getModule();
                if(method_exists($moduleModel, 'getQueryByModuleField')) {
                        $overrideQuery = $moduleModel->getQueryByModuleField($sourceModule, $this->get('src_field'), $this->get('src_record'), $listQuery);
                        if(!empty($overrideQuery)) {
                                $listQuery = $overrideQuery;
                        }
                }
        }
        $position = stripos($listQuery, ' from ');
        if ($position) {
                $split = spliti(' from ', $listQuery);
                $splitCount = count($split);
                $listQuery = 'SELECT count(*) AS count ';
                for ($i=1; $i<$splitCount; $i++) {
                        $listQuery = $listQuery. ' FROM ' .$split[$i];
                }
        }
        if($this->getModule()->get('name') == 'Calendar'){
                $listQuery .= ' AND activitytype <> "Emails"';
        }
        $listResult = $db->pquery($listQuery, array());
        return $db->query_result($listResult, 0, 'count');
    }
    function getQuery(){
        $queryGenerator = $this->get('query_generator');
        $listQuery = $queryGenerator->getQuery();
        return $listQuery;
    }
    public static function getInstance($moduleName){
        $db = PearDatabase::getInstance();
        $currentUser = vglobal('current_user');

        $modelClassName = Vtiger_Loader::getComponentClassName('Model', 'ListViewME', $moduleName);
        $instance = new $modelClassName();
        $moduleModel = Vtiger_Module_Model::getInstance($moduleName);

        return $instance->set('module', $moduleModel);
    } 
    public static function getInstanceForPopup($value){
        $db = PearDatabase::getInstance();
        $currentUser = vglobal('current_user');

        $modelClassName = Vtiger_Loader::getComponentClassName('Model', 'ListView', $value);
        $instance = new $modelClassName();
        $moduleModel = Vtiger_Module_Model::getInstance($value);

        $queryGenerator = new QueryGenerator($moduleModel->get('name'), $currentUser);

        $listFields = $moduleModel->getPopupFields();
        $listFields[] = 'id';
        $queryGenerator->setFields($listFields);

        $controller = new ListViewController($db, $currentUser, $queryGenerator);

        return $instance->set('module', $moduleModel)->set('query_generator', $queryGenerator)->set('listview_controller', $controller);
    }
    public function getAdvancedLinks(){
        $moduleModel = $this->getModule();
        $createPermission = Users_Privileges_Model::isPermitted($moduleModel->getName(), 'EditView');
        $advancedLinks = array();
        $importPermission = Users_Privileges_Model::isPermitted($moduleModel->getName(), 'Import');
        if($importPermission && $createPermission){
                $advancedLinks[] = array(
                    'linktype' => 'LISTVIEW',
                    'linklabel' => 'LBL_IMPORT',
                    'linkurl' => $moduleModel->getImportUrl(),
                    'linkicon' => ''
                );
        }
        $exportPermission = Users_Privileges_Model::isPermitted($moduleModel->getName(), 'Export');
        if($exportPermission){
                $advancedLinks[] = array(
                    'linktype' => 'LISTVIEW',
                    'linklabel' => 'LBL_EXPORT',
                    'linkurl' => 'javascript:Vtiger_List_Js.triggerExportAction("'.$this->getModule()->getExportUrl().'")',
                    'linkicon' => ''
                );
        }
        $duplicatePermission = Users_Privileges_Model::isPermitted($moduleModel->getName(), 'DuplicatesHandling');
        if($duplicatePermission){
                $advancedLinks[] = array(
                    'linktype' => 'LISTVIEWMASSACTION',
                    'linklabel' => 'LBL_FIND_DUPLICATES',
                    'linkurl' => 'Javascript:Vtiger_List_Js.showDuplicateSearchForm("index.php?module='.$moduleModel->getName().
                                                    '&view=MassActionAjax&mode=showDuplicatesSearchForm")',
                    'linkicon' => ''
                );
        }
        return $advancedLinks;
    }
    public function getSettingLinks(){
        return $this->getModule()->getSettingLinks();
    }
    public function getBasicLinks(){
        $basicLinks = array();
        $moduleModel = $this->getModule();
        $createPermission = Users_Privileges_Model::isPermitted($moduleModel->getName(), 'EditView');
        if($createPermission){
            $basicLinks[] = array(
                'linktype' => 'LISTVIEWBASIC',
                'linklabel' => 'LBL_ADD_RECORD',
                'linkurl' => $moduleModel->getCreateRecordUrl(),
                'linkicon' => ''
            );
        }
        return $basicLinks;
    }
    public function extendPopupFields($fieldsList){
        $moduleModel = $this->get('module');
        $queryGenerator = $this->get('query_generator');
        $listFields = $moduleModel->getPopupFields();
        $listFields[] = 'id';
        $listFields = array_merge($listFields, $fieldsList);
        $queryGenerator->setFields($listFields);
        $this->get('query_generator', $queryGenerator);
    }
}
