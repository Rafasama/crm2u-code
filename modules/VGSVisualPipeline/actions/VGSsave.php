<?php

/**
 * VGS Visual Pipeline Module
 *
 *
 * @package        VGSVisualPipeline Module
 * @author         Curto Francisco, Maggi Conrado - www.vgsglobal.com
 * @license        vTiger Public License.
 * @version        Release: 1.0
 */

class VGSVisualPipeline_VGSsave_Action extends Vtiger_Action_Controller {

    public function checkPermission(Vtiger_Request $request) {
        global $current_user;

        if (!is_admin($current_user)) {
            throw new AppException('LBL_PERMISSION_DENIED');
        }
    }

    public function process(Vtiger_Request $request) {
        $db = PearDatabase::getInstance();

        switch ($request->get('mode')) {
            case 'deleteRecord':
                $db->pquery("DELETE FROM vtiger_vgsvisualpipeline WHERE vgsvisualpipelineid=?", array($request->get('record_id')));
                $fieldsResponse['result'] = 'ok';
                $tabid = getTabId($request->get('module1'));
                Vtiger_Link::deleteLink($tabid, 'LISTVIEWBASIC', 'Pipeline View');
                $response = new Vtiger_Response();
                $response->setResult($fieldsResponse);
                $response->emit();
                break;

            default:
                $params = Array(
                    $request->get('picklist1'),
                    $request->get('module1'),
                );

                $result = $db->pquery("SELECT * FROM vtiger_vgsvisualpipeline WHERE sourcemodule=?", Array($request->get('module1')));

                if ($db->num_rows($result) > 0) {
                    $fieldsResponse['result'] = 'fail';
                    $fieldsResponse['message'] = vtranslate('ALREADY_EXISTS', 'VGSVisualPipeline');
                } else {
                    try {

                        $result = $db->pquery("INSERT INTO vtiger_vgsvisualpipeline (sourcefieldname,sourcemodule) VALUES (?,?)", $params);
                        if ($db->getAffectedRowCount($result) == 1) {
                            $fieldsResponse['result'] = 'ok';
                            $tabid = getTabId($request->get('module1'));
                            Vtiger_Link::addLink($tabid, 'LISTVIEWBASIC', 'Pipeline View', "javascript:changeView()", '', 0, '');
                        } else {
                            $fieldsResponse['result'] = 'fail';
                            $fieldsResponse['message'] = vtranslate('LBL_DB_INSERT_FAIL','VGSVisualPipeline');
                        }
                    } catch (Exception $exc) {
                        $fieldsResponse['result'] = 'fail';
                        $fieldsResponse['message'] = $exc->message;
                    }
                }

                $response = new Vtiger_Response();
                $response->setResult($fieldsResponse);
                $response->emit();
                break;
        }
    }

}
