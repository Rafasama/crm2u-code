<?php
/* ********************************************************************************
 * The content of this file is subject to the VTE Notepad ("License");
 * You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is VTExperts.com
 * Portions created by VTExperts.com. are Copyright(C) VTExperts.com.
 * All Rights Reserved.
 * ****************************************************************************** */

/**
 * Class VTENotepad_Module_Model
 */
class VTENotepad_Module_Model extends Vtiger_Module_Model
{

    /**
     * @return array
     */
    function getSettingLinks()
    {
        $settingsLinks[] = array(
            'linktype' => 'MODULESETTING',
            'linklabel' => 'Uninstall',
            'linkurl' => "index.php?module={$this->name}&parent=Settings&view=Uninstall",
            'linkicon' => ''
        );
        return $settingsLinks;
    }

}