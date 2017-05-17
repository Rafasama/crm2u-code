<?php
/* ********************************************************************************
 * The content of this file is subject to the VTE Notepad ("License");
 * You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is VTExperts.com
 * Portions created by VTExperts.com. are Copyright(C) VTExperts.com.
 * All Rights Reserved.
 * ****************************************************************************** */

/**
 * Class VTENotepad
 */
class VTENotepad
{

    var $table_name = 'vtiger_vtenotepad';
    var $table_index = 'id';
    var $tab_name = Array('vtiger_vtenotepad');
    var $tab_name_index = Array('vtiger_vtenotepad' => 'id');

    function vtlib_handler($modulename, $event_type)
    {
        if ($event_type == 'module.postinstall') {
            // Handle actions when this module is install.
            self::addWidgetTo($modulename);
        } else if ($event_type == 'module.disabled') {
            // Handle actions when this module is disabled.
            self::removeWidgetTo($modulename);
        } else if ($event_type == 'module.enabled') {
            // Handle actions when this module is enabled.
            self::addWidgetTo($modulename);
        } else if ($event_type == 'module.preuninstall') {
            // Handle actions when this module is about to be deleted.
        } else if ($event_type == 'module.preupdate') {
            // Handle actions before this module is updated.
        } else if ($event_type == 'module.postupdate') {
            // Handle actions when this module is update.
            self::removeWidgetTo($modulename);
            self::addWidgetTo($modulename);
        }
    }

    /**
     * @param string $moduleName
     */
    static function addWidgetTo($moduleName)
    {
        global $adb;

        $module = Vtiger_Module::getInstance($moduleName);
        $widgetName = 'VTENotepad';

        if ($module) {
            $css_widgetType = 'HEADERCSS';
            $css_widgetLabel = vtranslate($widgetName, $moduleName);
            $css_link = "layouts/vlayout/modules/{$moduleName}/resources/{$moduleName}CSS.css";

            $js_widgetType = 'HEADERSCRIPT';
            $js_widgetLabel = vtranslate($widgetName, $moduleName);
            $js_link = "layouts/vlayout/modules/{$moduleName}/resources/{$moduleName}JS.js";

            // css
            $module->addLink($css_widgetType, $css_widgetLabel, $css_link);
            // js
            $module->addLink($js_widgetType, $js_widgetLabel, $js_link);
        }

        /*// Check module
        $rs = $adb->pquery("SELECT * FROM `vtiger_ws_entity` WHERE `name` = ?", array($moduleName));
        if ($adb->num_rows($rs) == 0) {
            $adb->pquery("INSERT INTO `vtiger_ws_entity` (`name`, `handler_path`, `handler_class`, `ismodule`)
            VALUES (?, 'include/Webservices/VtigerModuleOperation.php', 'VtigerModuleOperation', '1');", array($moduleName));
        }*/
    }

    /**
     * @param string $moduleName
     */
    static function removeWidgetTo($moduleName)
    {
        global $adb;

        $module = Vtiger_Module::getInstance($moduleName);
        $widgetName = 'VTENotepad';

        if ($module) {
            $css_widgetType = 'HEADERCSS';
            $css_widgetLabel = vtranslate($widgetName, $moduleName);
            $css_link = "layouts/vlayout/modules/{$moduleName}/resources/{$moduleName}CSS.css";

            $js_widgetType = 'HEADERSCRIPT';
            $js_widgetLabel = vtranslate($widgetName, $moduleName);
            $js_link = "layouts/vlayout/modules/{$moduleName}/resources/{$moduleName}JS.js";

            // css
            $module->deleteLink($css_widgetType, $css_widgetLabel, $css_link);
            // js
            $module->deleteLink($js_widgetType, $js_widgetLabel, $js_link);
        }

        /*// Check module
        $adb->pquery("DELETE FROM `vtiger_ws_entity` WHERE `name` = ?", array($moduleName));*/
    }

}
