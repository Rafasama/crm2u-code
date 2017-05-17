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

class VGSVisualPipeline_VGSIndexSettings_View extends Settings_Vtiger_Index_View {

    public function process(Vtiger_Request $request) {

        $vgsRelUpdatesList = $this->getList();

        $viewer = $this->getViewer($request);
        $viewer->assign('RMU_FIELDS_ARRAY', $vgsRelUpdatesList);
        $viewer->assign('IS_VALIDATED', true);
        $viewer->view('VGSIndexSettings.tpl', $request->getModule());

    }

    function getPageTitle(Vtiger_Request $request) {
        return vtranslate('LBL_MODULE_NAME', $request->getModule());
    }

    function getList() {
        $db = PearDatabase::getInstance();
        $relModFieldList = Array();
        $sql = "SELECT vtiger_vgsvisualpipeline.*, f1.fieldlabel as sourcefieldlabel FROM vtiger_vgsvisualpipeline 
                        INNER JOIN vtiger_field f1 ON vtiger_vgsvisualpipeline.`sourcefieldname` = f1.fieldname COLLATE utf8_unicode_ci
                       GROUP BY  vgsvisualpipelineid ";
        $result = $db->pquery($sql, array());
        $i = 0;
        while ($row = $db->fetchByAssoc($result)) {

            $relModFieldList[$i]['id'] = $row['vgsvisualpipelineid'];
            $relModFieldList[$i]['source_module'] = vtranslate($row['sourcemodule']);
            $relModFieldList[$i]['source_field_name'] = vtranslate($row['sourcefieldlabel'], $row['sourcemodule']);
            $i++;
        }
        return $relModFieldList;
    }

    /**
     * Function to get the list of Script models to be included
     * @param Vtiger_Request $request
     * @return <Array> - List of Vtiger_JsScript_Model instances
     */
    function getHeaderScripts(Vtiger_Request $request) {
        $headerScriptInstances = parent::getHeaderScripts($request);

        $jsFileNames = array(
            "layouts.vlayout.modules.VGSVisualPipeline.resources.VGSVisualPipelineSettings",
        );

        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
        return $headerScriptInstances;
    }

}
