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

include_once 'modules/VGSUserSMTP/models/VGSLicenseManager.php';


class VGSUserSMTP_SMTPAddnew_View extends Vtiger_Index_View {

    public function process(Vtiger_Request $request) {
        
        $currentUserModel = Users_Record_Model::getCurrentUserModel();

        if (!aW8bgzsTs3Xp($request->getModule())) {
            
            header('Location: index.php?module=' . $request->getModule() . '&view=VGSLicenseSettings&parent=Settings');
        }else{
            $viewer = $this->getViewer($request);
            $viewer->assign('CURRENT_USER_ID', $currentUserModel->get('id'));
            $viewer->view('SMTPAddNew.tpl',$request->get('module'));

        }

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
}
