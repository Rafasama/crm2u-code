<?php

/**
 * VGS Visual Pipeline Module
 *
 *
 * @package        VGSVisualPipeline Module
 * @author         Curto Francisco, Conrado Maggi - www.vgsglobal.com
 * @license        vTiger Public License.
 * @version        Release: 1.0
 */

class VGSVisualPipeline_VGSVisualPipelineView_View extends Vtiger_IndexAjax_View {

    function __construct() {
        parent::__construct();
        $this->exposeMethod('showVPView');
        $this->exposeMethod('get_string_between');
    }

    function process(Vtiger_Request $request) {
        $mode = $request->get('mode');
        if (!empty($mode)) {
            $this->invokeExposedMethod($mode, $request);
            return;
        }
    }

    function showVPView(Vtiger_Request $request) {
        global $current_user;

        $moduleName = $request->get('module1');
        $db = PearDatabase::getInstance();

        $result = $db->pquery("SELECT sourcefieldname FROM vtiger_vgsvisualpipeline WHERE sourcemodule = ?", array($moduleName));
        $vpFieldName = $db->query_result($result, 0, 'sourcefieldname');

        $moduleInstance = Vtiger_Module_Model::getInstance($moduleName);
        $fieldInstance = Vtiger_Field_Model::getInstance($vpFieldName, $moduleInstance);
        $selectedIds = $request->get('seleccionados');
        $vpColumn = $fieldInstance->column;

        $list = $this->getListViewResult($moduleName, $selectedIds, $vpColumn,$vpFieldName);

        if ($list == 'Field not in filter') {
            $notField = false;
        } else {
            $list = $this->sortListArray($moduleName, $list);
            $notField = true;

            $picklistValues = $this->getPicklistValues($moduleName, $vpFieldName);

            foreach ($picklistValues as $picklistOrder => $picklistValue) {
                $tmp = array();
                if (count($list) > 0) {
                    foreach ($list as $key => $value) {
                        if ($value == $picklistValue) {
                            $tooltipViewModel = Vtiger_TooltipView_Model::getInstance($moduleName, $key);
                            $recordStructure = $tooltipViewModel->getStructure();
                            $recordArray = array(
                                'RECORD' => $key,
                                'RECORD_LABEL' => Vtiger_Functions::getCRMRecordLabel($key),
                                'MODULE_MODEL' => $moduleInstance,
                                'RECORD_STRUCTURE' => $recordStructure['TOOLTIP_FEILDS'],
                                'TOOLTIP_FIELDS' => $tooltipViewModel->getFields(),
                                'RECORD_MODEL' => Vtiger_Record_Model::getInstanceById($key, $moduleName),
                            );
                            array_push($tmp, $recordArray);
                        }
                    }
                }
                $array_datos[$picklistOrder][$picklistValue] = $tmp;
            }
        }



        $viewer = $this->getViewer($request);
        $viewer->assign('MODULE', $moduleName);
        $viewer->assign('USER_MODEL', Users_Record_Model::getCurrentUserModel());

        $viewer->assign('MODULENAME', $moduleName);
        $viewer->assign('COLUMNA', $vpFieldName);
        $viewer->assign('RECORDS_ARRAY', $array_datos);
        $viewer->assign('NOT_IN_FILTER', $notField);
        echo $viewer->view('VGSVisualPipelineView.tpl', 'VGSVisualPipeline', true);
    }

    function get_string_between($string, $start, $end) {
        $string = " " . $string;
        $ini = strpos($string, $start);
        if ($ini == 0)
            return "";
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    function getPicklistValues($targetModule, $targetFieldName) {
        global $log;
        $currentUser = Users_Record_Model::getCurrentUserModel();
        $fieldModel = Vtiger_Field_Model::getInstance($targetFieldName, Vtiger_Module_Model::getInstance($targetModule));


        // Check is the user can write in that field
        if (!$fieldModel->getPermissions('readwrite')) {
            $log->debug('User id: ' . $currentUser->id . ' is not permitted to edit the field:' . $targetFieldName);
            return false;
        }

        //Check if the user can choose that picklist value.

        if ($fieldModel->isRoleBased() && !$currentUser->isAdminUser()) {
            $picklistValues = Vtiger_Util_Helper::getRoleBasedPicklistValues($targetFieldName, $currentUser->get('roleid'));
        } else {
            $picklistValues = Vtiger_Util_Helper::getPickListValues($targetFieldName);
        }

        return $picklistValues;
    }

    function getListViewResult($moduleName, $selectedIds, $vpColumn,$vpFieldName) {
        $db = PearDatabase::getInstance();
        $current_user = Users_Record_Model::getCurrentUserModel();

        $customView = new CustomView($moduleName);
        $viewid = $customView->getViewId($moduleName);


        if (is_array($selectedIds) && count($selectedIds) > 0) {
            $selected_ids = '(' . implode(',', $selectedIds) . ')';
        } elseif ($selectedIds != '') {
            $selected_ids = '(' . $selectedIds . ')';
        }

        $queryGenerator = new QueryGenerator($moduleName, $current_user);
        if ($viewid != "0") {
            $queryGenerator->initForCustomViewById($viewid);
        } else {
            $queryGenerator->initForDefaultCustomView();
        }

        $list_query = $queryGenerator->getQuery();
        $campos = $this->get_string_between($list_query, 'SELECT', 'FROM');
        if (strpos($campos, $vpColumn) === false) {
           $vpColumn = false;
        }

        $where = $queryGenerator->getConditionalWhere();
        if (isset($where) && $where != '') {
            $_SESSION['export_where'] = $where;
        } else {
            unset($_SESSION['export_where']);
        }

        //Selected Ids
        $moduleInstance = Vtiger_Module_Model::getInstance($moduleName);
        if (!empty($selectedIds)) {
            $list_query .= ' AND ' . $moduleInstance->basetableid . ' IN ' . $selected_ids;
        }
        $list = array();

        $result = $db->query($list_query);
        if ($db->num_rows($result) > 0) {

            for ($i = 0; $i < $db->num_rows($result); $i++) {
                
                if($vpColumn){
                    $list[$db->query_result($result, $i, $moduleInstance->basetableid)] = $db->query_result($result, $i, $vpColumn);

                }  else {
                    $recordInstance = Vtiger_Record_Model::getInstanceById($db->query_result($result, $i, $moduleInstance->basetableid), $moduleName);
                    $list[$db->query_result($result, $i, $moduleInstance->basetableid)] = $recordInstance->get($vpFieldName);

                }
                
            }
        }

        return $list;
    }

    function sortListArray($moduleName, $array_datos) {
        $db = PearDatabase::getInstance();
        $result = $db->pquery("SELECT * FROM vtiger_vgsvisualsorting WHERE module = ?", array($moduleName));
        if ($db->num_rows($result) > 0 && is_array($array_datos)) {
            $sorting = array();
            while ($row = $db->fetch_row($result)) {
                $sorting = array_merge($sorting, explode(',', unserialize(htmlspecialchars_decode($row['sorting']))));
            }
            $array_datos = $this->sortArrayByArray($array_datos, $sorting);
        }
        return $array_datos;
    }

    function sortArrayByArray(Array $array, Array $orderArray) {
        $ordered = array();
        foreach ($orderArray as $key) {
            if (array_key_exists($key, $array)) {
                $ordered[$key] = $array[$key];
                unset($array[$key]);
            }
        }
        return $ordered + $array;
    }

}
