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


class VGSUserSMTP_SMTPindex_View extends Vtiger_Index_View {

    public function checkPermission(Vtiger_Request $request) {

            return true;
       
    }


    public function process(Vtiger_Request $request) {
        $smtpConfig = $this->getSMTPConfigs();
        

         if (!aW8bgzsTs3Xp($request->getModule())) {
            
            header('Location: index.php?module=' . $request->getModule() . '&view=VGSLicenseSettings&parent=Settings');
        }else{
            $viewer = $this->getViewer($request);
            $viewer->assign('RMU_FIELDS_ARRAY', $smtpConfig);
            if(count($smtpConfig) > 0){
                $viewer->assign('SHOW_BUTTON',false);
            }  else {
                $viewer->assign('SHOW_BUTTON',true);
            }
            
            $viewer->assign('IS_VALIDATED', true);
            $viewer->view("SMTPConfig.tpl","VGSUserSMTP");
        } 


        
    }

    public function getSMTPConfigs(){
        global $current_user;
        $db = PearDatabase::getInstance();
        $smtpConfigs = Array();
        $result = $db->pquery("SELECT * FROM vtiger_vgsusersmtp WHERE userid = ?", array($current_user->id));
        $i = 0;
        while ($row = $db->fetchByAssoc($result)) {
            $smtpConfigs[$i]['id'] = $row['id'];
            $smtpConfigs[$i]['server_name'] = $row['server_name'];
            $smtpConfigs[$i]['user_name'] = $row['user_name'];
            $smtpConfigs[$i]['password'] = substr(str_repeat("*", strlen($row['password'])),0,20); 
            $smtpConfigs[$i]['email_from'] = $row['email_from'];
            $smtpConfigs[$i]['from_name'] = $row['from_name'];
            $smtpConfigs[$i]['smtp_auth'] = $row['smtp_auth'];
            $i++;
        }
        return $smtpConfigs;
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

