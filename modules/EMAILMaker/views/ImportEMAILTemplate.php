<?php
/* * *******************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class EMAILMaker_ImportEMAILTemplate_View extends Vtiger_Index_View {

    public function process(Vtiger_Request $request){
        $viewer = $this->getViewer($request);
        $viewer->assign("MODULE", $request->get('module'));
        $viewer->assign("MODULELABEL", vtranslate($request->get('module'), $request->get('module')));
        $viewer->view('ImportEMAILTemplate.tpl', 'EMAILMaker');
    }
    function getHeaderScripts(Vtiger_Request $request){
        $headerScriptInstances = parent::getHeaderScripts($request);
        $moduleName = $request->getModule();

        $jsFileNames = array(
            'modules.EMAILMaker.resources.Import'
        );

        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
        return $headerScriptInstances;
    }
}