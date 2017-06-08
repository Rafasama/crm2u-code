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

class VGSUserSMTP_SettingsAddNew_View extends Settings_Vtiger_Index_View {

    public function process(Vtiger_Request $request) {

        $viewer = $this->getViewer($request);
        $viewer->assign('PARENT_MODULE', 'Settings');
        $viewer->assign('USER_LIST', $this->getUserList());
        $viewer->view('SMTPAddNew.tpl',$request->get('module'));
    }

    public function getHeaderScripts(Vtiger_Request $request) {
        $headerScriptInstances = parent::getHeaderScripts($request);

        $jsFileNames = array(
            "modules.VGSUserSMTP.resources.VGSMultiSenderSettings",
        );

        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
        return $headerScriptInstances;
    }
    
    function getUserList(){
        return getAllUserName();
    }
}
