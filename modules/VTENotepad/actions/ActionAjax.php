<?php
/* ********************************************************************************
 * The content of this file is subject to the VTE Notepad ("License");
 * You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is VTExperts.com
 * Portions created by VTExperts.com. are Copyright(C) VTExperts.com.
 * All Rights Reserved.
 * ****************************************************************************** */

/**
 * Class VTENotepad_ActionAjax_Action
 */
class VTENotepad_ActionAjax_Action extends Vtiger_Action_Controller
{
    /**
     * @constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->exposeMethod('getConfig');
        $this->exposeMethod('save');
    }

    /**
     * @param Vtiger_Request $request
     * @return bool
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
        $mode = $request->get('mode');
        if (!empty($mode)) {
            $this->invokeExposedMethod($mode, $request);
            return;
        }
    }

    /**
     * @param Vtiger_Request $request
     */
    public function getConfig(Vtiger_Request $request)
    {
        global $site_URL, $current_user;
        $data = array();
        $response = new Vtiger_Response();
        $response->setEmitType(Vtiger_Response::$EMIT_JSON);

        $data['base'] = $site_URL;
        $data['date_format'] = $current_user->date_format;
        $data['hour_format'] = $current_user->hour_format;
        $data['start_hour'] = $current_user->start_hour;
        $data['end_hour'] = $current_user->end_hour;
        $data['time_zone'] = $current_user->time_zone;
        $data['dayoftheweek'] = $current_user->dayoftheweek;

        $response->setResult($data);
        $response->emit();
    }

    /**
     * @param Vtiger_Request $request
     */
    public function save(Vtiger_Request $request)
    {
        global $current_user;

        $userId = $current_user->id ? $current_user->id : 0;
        $module = $request->getModule();
        $response = new Vtiger_Response();
        $response->setEmitType(Vtiger_Response::$EMIT_JSON);
        $data = array();
        $params = array();

        /** @var VTENotepad_Record_Model $recordModel */
        $recordModel = VTENotepad_Record_Model::getCleanInstance($module);
        $record = $request->get('record');

        if ($request->has('name')) {
            $params['name'] = $request->get('name');
        }

        if ($request->has('content')) {
            $params['content'] = $request->get('content');
        }

        if ($request->has('description')) {
            $params['description'] = $request->get('description');
        }

        // UserId
        $params['user_id'] = $userId;

        // Save data
        $note = $recordModel->save($record, $params);
        $id = $note->getId();

        if (!$id) {
            // When error
            $response->setError(200, vtranslate('LBL_FAILURE', $module));
            return $response->emit();
        }

        $data['id'] = $id;
        $data['updated'] = $note->get('updated');
        $data['message'] = vtranslate('LBL_SUCCESSFUL', $module);

        $response->setResult($data);
        return $response->emit();
    }

}