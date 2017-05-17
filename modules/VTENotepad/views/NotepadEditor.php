<?php
/* ********************************************************************************
* The content of this file is subject to the VTE Notepad ("License");
* You may not use this file except in compliance with the License
* The Initial Developer of the Original Code is VTExperts.com
* Portions created by VTExperts.com. are Copyright(C) VTExperts.com.
* All Rights Reserved.
* ****************************************************************************** */

/**
 * Class VTENotepad_NotepadEditor_View
 */
Class VTENotepad_NotepadEditor_View extends Vtiger_Basic_View
{
    /**
     * @param Vtiger_Request $request
     * @return bool|void
     * @throws AppException
     */
    public function checkPermission(Vtiger_Request $request)
    {
        return;
    }

    /**
     * @param Vtiger_Request $request
     */
    public function process(Vtiger_Request $request)
    {
        global $current_user;

        $userId = $current_user->id ? $current_user->id : 0;
        $record = null;

        $viewer = $this->getViewer($request);
        $moduleName = $request->getModule();

        $recordModel = new VTENotepad_Record_Model();

        if ($userId) {
            $record = $recordModel->findByUserId($userId);

            if ($record && $record->get('updated')) {
                $dateTimeField = new DateTimeField($record->get('updated'));

                $record->set('updated', $dateTimeField->getDisplayDateTimeValue());
            }
        }

        $viewer->assign('MODULE_NAME', $moduleName);
        $viewer->assign('RECORD', $record);

        echo $viewer->view('NotepadEditor.tpl', $moduleName, true);
    }

}