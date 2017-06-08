<?php

/**
 * VGS Users SMTP Module
 *
 *
 * @package        VGSUserSMTP Module
 * @author         Conrado Maggi - www.vgsglobal.com
 * @license        vTiger Public License.
 * @version        Release: 1.0
 */
include_once 'include/utils/encryption.php';

class VGSUserSMTP_SaveSMTPConfig_Action extends Vtiger_Action_Controller {

    public function checkPermission(Vtiger_Request $request) {
       return true;
    }

    public function process(Vtiger_Request $request) {
        global $current_user;
        $db = PearDatabase::getInstance();

        switch ($request->get('mode')) {
            case 'deleteRecord':
                $db->pquery("DELETE FROM vtiger_vgsusersmtp WHERE id=?", array($request->get('record_id')));
                $fieldsResponse['result'] = 'ok';
                $response = new Vtiger_Response();
                $response->setResult($fieldsResponse);
                $response->emit();
                break;
            case 'getUserSMTPs';
                $result = $db->pquery("SELECT * FROM vtiger_vgsusersmtp WHERE userid=?", array($current_user->id));
                if ($db->num_rows($result) > 0) {

                    $fieldsResponse['result'] = 'ok';
                    $fieldsResponse['smtps'] = 'yes';
                    $response = new Vtiger_Response();
                    $response->setResult($fieldsResponse);
                    $response->emit();
                }else{
                    return false;
                }
                break;
            default:
                
                $encrypt = new Encryption();
                
                $params = Array(
                    $request->get('server_name'),
                    $request->get('user_name'),
                    $encrypt->encrypt($request->get('password')),
                    $request->get('from_name'),
                    $request->get('email_from'),
                    $request->get('smtp_auth'),
                    $request->get('user_id'),

                );

                $result = $db->pquery("SELECT * FROM vtiger_vgsusersmtp WHERE userid=?", array($request->get('user_id')));

                if ($db->num_rows($result) > 0) {
                    $fieldsResponse['result'] = 'fail';
                    $fieldsResponse['message'] = vtranslate('ALREADY_SETTINGS', $request->get('module'));
                } else {
                    try {
                        array_push($params,$current_user->id);
                        $result = $db->pquery("INSERT INTO vtiger_vgsusersmtp (server_name,user_name,password,email_from,from_name,smtp_auth,userid) VALUES (?,?,?,?,?,?,?)", $params);
                        if ($db->getAffectedRowCount($result) == 1) {
                            $fieldsResponse['result'] = 'ok';
                        } else {
                            $fieldsResponse['result'] = 'fail';
                            $fieldsResponse['message'] = vtranslate('LBL_DB_INSERT_FAIL', $request->get('module'));
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
