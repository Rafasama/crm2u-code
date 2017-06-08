<?php
/* * *******************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class EMAILMaker_SaveME_Action extends Vtiger_Action_Controller {

    public function checkPermission(Vtiger_Request $request){
    }
    public function process(Vtiger_Request $request){
        $adb = PearDatabase::getInstance();
        $moduleName = $request->getModule();
        $recordId = $request->get('record');
        if ($recordId) {
            $MassEmailRecordModel = EMAILMaker_RecordME_Model::getInstance($recordId);
        } else {
            $MassEmailRecordModel = EMAILMaker_RecordME_Model::getCleanInstance();
        }

        $requestData = $request->getAll();        
        $MassEmailRecordModel->setFromRequestData($requestData);
        $MassEmailRecordModel->save();
        $meid = $MassEmailRecordModel->get('meid');
        header("Location:index.php?module=EMAILMaker&view=DetailME&record=" . $meid);
    } 
}