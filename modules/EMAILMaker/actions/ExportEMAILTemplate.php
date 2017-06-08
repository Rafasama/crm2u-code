<?php
/* * *******************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class EMAILMaker_ExportEMAILTemplate_Action extends Vtiger_Action_Controller {

    public function checkPermission(Vtiger_Request $request) {
    }
    public function process(Vtiger_Request $request) {
        $adb = PearDatabase::getInstance();
        $Templates = explode(";", $request->get('templates'));
        sort($Templates);
        $c = '';
        if (count($Templates) > 0) {
            foreach ($Templates AS $templateid) {
                $result = $adb->pquery("SELECT * FROM vtiger_emakertemplates WHERE templateid=?", array($templateid));
                $num_rows = $adb->num_rows($result); 
                if ($num_rows > 0) {
                    $templateResult = $adb->fetch_array($result);
                    $templatename = $templateResult["templatename"];
                    $subject = $templateResult["subject"]; 
                    $description = $templateResult["description"];
                    $module = $templateResult["module"];
                    $is_listview = $templateResult["is_listview"];
                    $is_theme = $templateResult["is_theme"];
                    $body = decode_html($templateResult["body"]);
                    $c .= "<template>";
                       $c .= "<type>EMAILMaker</type>";
                       $c .= "<templatename>".$this->cdataEncode($templatename,true)."</templatename>";
                       $c .= "<subject>".$this->cdataEncode($subject,true)."</subject>";
                       $c .= "<description>".$this->cdataEncode($description,true)."</description>";
                       $c .= "<module>".$this->cdataEncode($module)."</module>";
                       $c .= "<is_listview>".$this->cdataEncode($is_listview)."</is_listview>";
                       $c .= "<is_theme>".$this->cdataEncode($is_theme)."</is_theme>";                       
                       $c .= "<body>";
                          $c .= $this->cdataEncode($body,true);
                       $c .= "</body>";
                    $c .= "</template>";
                }
            }
        }

        header('Content-Type: application/xhtml+xml');
        header("Content-Disposition: attachment; filename=export.xml");

        echo "<?xml version='1.0'?" . ">";
        echo "<export>";
        echo $c;
        echo "</export>";
        exit;
    }

    private function cdataEncode($text, $encode = false) {
        $From = array("<![CDATA[", "]]>");
        $To = array("<|!|[%|CDATA|[%|", "|%]|]|>");

        if ($text != "") {
            $pos1 = strpos("<![CDATA[", $text);
            $pos2 = strpos("]]>", $text);

            if ($pos1 === false && $pos2 === false && $encode == false) {
                $content = $text;
            } else {
                $encode_text = str_replace($From, $To, $text);
                $content = "<![CDATA[" . $encode_text . "]]>";
            }
        } else {
            $content = "";
        }
        return $content;
    }
}