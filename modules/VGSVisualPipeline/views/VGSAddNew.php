<?php

/**
 * VGS Visual Pipeline Module
 *
 *
 * @package        VGSVisualPipeline Module
 * @author         Curto Francisco - www.vgsglobal.com
 * @license        vTiger Public License.
 * @version        Release: 1.0
 */

class VGSVisualPipeline_VGSAddNew_View extends Settings_Vtiger_Index_View {

    public function process(Vtiger_Request $request) {

        $viewer = $this->getViewer($request);
        
        $entityModules = Vtiger_Module_Model::getEntityModules();
        $restrictedModules = array('Emails','Documents','Campaigns', 'Calendar','Faq','Webmails','ModComments', 'SMSNotifier', 'PBXManager'); //Modules where related fields do not work as expected

        $modules = array();
        foreach ($entityModules as $entityModule) {
            if(!in_array($entityModule->name, $restrictedModules)){
                array_push($modules, $entityModule->name);
            }
        }

        $viewer->assign('ENTITY_MODULES', $modules);

        $viewer->view('VGSAddNew.tpl', $request->getModule());
    }

    
     function getPageTitle(Vtiger_Request $request) {
        return vtranslate('LBL_MODULE_NAME', $request->getModule());
    }

    /**
     * Function to get the list of Script models to be included
     * @param Vtiger_Request $request
     * @return <Array> - List of Vtiger_JsScript_Model instances
     */
    function getHeaderScripts(Vtiger_Request $request) {
        $headerScriptInstances = parent::getHeaderScripts($request);
        $moduleName = $request->getModule();

        $jsFileNames = array(
            "layouts.vlayout.modules.VGSVisualPipeline.resources.VGSVisualPipelineSettings",
        );

        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
        return $headerScriptInstances;
    }
    
}
