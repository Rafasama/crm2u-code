<?php
/* * *******************************************************************************
 * The content of this file is subject to the PDF Maker Free license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class PDFMaker_PDFContentUtils_Model extends Vtiger_Base_Model {
    
    public function getOwnerNameCustom($id){
        $db = PearDatabase::getInstance();
        if ($id != ""){
            $result = $db->pquery("SELECT user_name FROM vtiger_users WHERE id=?", array($id));
            $ownername = $db->query_result($result, 0, "user_name");
        }
        if ($ownername == ""){
            $result = $db->pquery("SELECT groupname FROM vtiger_groups WHERE groupid=?", array($id));
            $ownername = $db->query_result($result, 0, "groupname");
        } else {
            $ownername = getUserFullName($id);
        }
        return $ownername;
    }
    
    public function getAccountNo($account_id){
        $accountno = "";
        if ($account_id != '') {
            $db = PearDatabase::getInstance();
            $sql = "SELECT account_no FROM vtiger_account WHERE accountid=?";
            $result = $db->pquery($sql, array($account_id));
            $accountno = $db->query_result($result, 0, "account_no");
        }
        return $accountno;
    }
    
    public function getInventoryCurrencyInfoCustomArray($inventory_table,$inventory_id,$id) {
        $db = PearDatabase::getInstance();
        
        if ($inventory_table != "") {
            $sql = "SELECT currency_id, " . $inventory_table . ".conversion_rate AS conv_rate, vtiger_currency_info.* FROM " . $inventory_table . "
                           INNER JOIN vtiger_currency_info ON " . $inventory_table . ".currency_id = vtiger_currency_info.id
                           WHERE " . $inventory_id . "=?";
        } else {
            $sql = "SELECT vtiger_currency_info.*, id AS currency_id, '' AS conv_rate FROM vtiger_currency_info WHERE  vtiger_currency_info.id=?";
        }
        $res = $db->pquery($sql, array($id));

        $currency_info = array();
        $currency_info["currency_id"] = $db->query_result($res, 0, "currency_id");
        $currency_info["conversion_rate"] = $db->query_result($res, 0, "conv_rate");
        $currency_info["currency_name"] = $db->query_result($res, 0, "currency_name");
        $currency_info["currency_code"] = $db->query_result($res, 0, "currency_code");
        $currency_info["currency_symbol"] = $db->query_result($res, 0, "currency_symbol");
    
        return $currency_info;    
    }
    
    public function getFolderName($folderid){
        $foldername = "";
        if ($folderid != "") {
            $db = PearDatabase::getInstance();
            $result = $db->pquery("SELECT foldername FROM vtiger_attachmentsfolder WHERE folderid = ?", array($folderid));
            if ($db->num_rows($result) > 0) {
                return $foldername = $db->query_result($result, 0, "foldername");
            }
        }
        return $foldername;        
    }    
    
    public function getSimpleHtmlDomFile() {        
        $simple_html_dom_file = "include/simplehtmldom/simple_html_dom.php";
        if(file_exists($simple_html_dom_file)) {
            return $simple_html_dom_file; 
        } else {
            return "modules/PDFMaker/resources/classes/simple_html_dom.php";  
        }
    }
        
    public function getDOMElementAtts($elm) {
        $atts_string = "";
        if ($elm != null) {
            foreach ($elm->attr as $attName => $attVal) {
                $atts_string .= $attName . '="' . $attVal . '" ';
            }
        }

        return $atts_string;
    }
    public function getTermsAndConditionsCustom($value){
        $db = PearDatabase::getInstance();
        if (file_exists("modules/Settings/EditTermDetails.php")){
            $res = $db->pquery("SELECT tandc FROM vtiger_inventory_tandc WHERE id = ?", array($value));
            $num = $db->num_rows($res);
            if ($num > 0) {
                $tandc = $db->query_result($res, 0, "tandc");
            } else {
                $tandc = $value;
            }
        } else {
            $tandc = $value;
        }
        return $tandc;
    }
}