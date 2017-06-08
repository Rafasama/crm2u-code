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

include_once 'vtlib/Vtiger/Mailer.php';
include_once 'include/utils/encryption.php';


class VGSUserSMTP_Mailer_Model extends Vtiger_Mailer {

    public static function getInstance() {
        return new self();
    }

    /**
     * Function returns error from phpmailer
     * @return <String>
     */
    function getError() {
        return $this->ErrorInfo;
    }

    /**
     * Initialize this instance
     * @access private
     */
    function initialize() {
        $this->IsSMTP();
        global $adb;
        $currentUser = Users_Record_Model::getCurrentUserModel();


        $result = $adb->pquery("SELECT * FROM vtiger_vgsusersmtp WHERE userid=?", Array($currentUser->id));

        if ($result && $adb->num_rows($result) > 0) {

            $encrypt = new Encryption();

            $this->Host = $adb->query_result($result, 0, 'server_name');
            $this->Username = decode_html($adb->query_result($result, 0, 'user_name'));
            $this->Password = $encrypt->decrypt($adb->query_result($result, 0, 'password'));
            $this->From = $adb->query_result($result, 0, 'email_from');
            $this->AddReplyTo($adb->query_result($result, 0, 'email_from'));
            $this->SMTPAuth = $adb->query_result($result, 0, 'smtp_auth');
            $this->FromName = decode_html($adb->query_result($result, 0, 'from_name'));
        }





        if ($this->Host == '') {
            $result = $adb->pquery("SELECT * FROM vtiger_systems WHERE server_type=?", Array('email'));

            if ($adb->num_rows($result)) {
                $this->Host = $adb->query_result($result, 0, 'server');
                $this->Username = decode_html($adb->query_result($result, 0, 'server_username'));
                $this->Password = decode_html($adb->query_result($result, 0, 'server_password'));
                $this->SMTPAuth = $adb->query_result($result, 0, 'smtp_auth');
            }
        }

        if ($this->Host != '') {
            // To support TLS
            $hostinfo = explode("://", $this->Host);
            $smtpsecure = $hostinfo[0];
            if ($smtpsecure == 'tls') {
                $this->SMTPSecure = $smtpsecure;
                $this->Host = $hostinfo[1];
            }
            // End

            if (empty($this->SMTPAuth))
                $this->SMTPAuth = false;

            $this->_serverConfigured = true;
        }
    }

}
