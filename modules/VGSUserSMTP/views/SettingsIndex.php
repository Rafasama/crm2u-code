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


class VGSUserSMTP_SettingsIndex_View extends Settings_Vtiger_Index_View {

    public function process(Vtiger_Request $request) {
        global $site_URL;

        if (!aW8bgzsTs3Xp($request->getModule())) {
            
            header('Location: index.php?module=' . $request->getModule() . '&view=VGSLicenseSettings&parent=Settings');
        }else{
            $viewer = $this->getViewer($request);
            $viewer->assign('PARENT_MODULE', 'Settings');
            $viewer->assign('RMU_FIELDS_ARRAY', $this->getSMTPSettings());
            $viewer->view('SettingsIndex.tpl', $request->getModule());
        }    

        
    }
    
    function getSMTPSettings(){
        $db = PearDatabase::getInstance();
        $smtpSettings = array();
        $sql = "SELECT vtiger_vgsusersmtp.*, vtiger_users.user_name FROM vtiger_vgsusersmtp 
            INNER JOIN vtiger_users ON vtiger_vgsusersmtp.userid = vtiger_users.id 
            WHERE status='Active'";
        $result = $db->pquery($sql);
        if($result && $db->num_rows($result) > 0){
            while ($row = $db->fetchByAssoc($result)) {
                $row['password'] = substr(str_repeat("*", strlen($row['password'])),0,20); 
                array_push($smtpSettings, $row);
            }
        }
        
        return $smtpSettings;
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
