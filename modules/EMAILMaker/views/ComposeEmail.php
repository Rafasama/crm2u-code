<?php
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ******************************************************************************* */

class EMAILMaker_ComposeEmail_View extends Vtiger_ComposeEmail_View {
    function __construct() {
        parent::__construct();
        $this->exposeMethod('previewPrint');
        $this->exposeMethod('emailPreview');
        $this->exposeMethod('emailForward');
    }
    public function checkPermission(Vtiger_Request $request) {
        $moduleName = "Emails";

        if (!Users_Privileges_Model::isPermitted($moduleName, 'EditView')) {
                throw new AppException('LBL_PERMISSION_DENIED');
        }
    }
    function preProcess(Vtiger_Request $request, $display=true) {
        if($request->getMode() == 'previewPrint'){
            return;
        }
        return parent::preProcess($request,$display);
    }
    public function process(Vtiger_Request $request) {

        $mode = $request->getMode();
        if(!empty($mode)) {
                echo $this->invokeExposedMethod($mode, $request);
                return;
        }
        $this->composeMailData($request);
        $viewer = $this->getViewer($request);
        echo $viewer->view('ComposeEmailForm.tpl', $moduleName, true);
    }
    public function previewPrint($request) {
        $this->emailPreview($request);
    }    
    function emailPreview($request){
        $recordId = $request->get('record');
        $moduleName = "Emails";

        $this->record = Vtiger_DetailView_Model::getInstance("Emails", $recordId);
        $recordModel = $this->record->getRecord();

        $viewer = $this->getViewer($request);
        $TO = Zend_Json::decode(html_entity_decode($recordModel->get('saved_toid')));
        $CC = Zend_Json::decode(html_entity_decode($recordModel->get('ccmail')));
        $BCC = Zend_Json::decode(html_entity_decode($recordModel->get('bccmail')));

        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
        $description = $EMAILMaker->getEmailContent($recordId);
        $recordModel->set('description',$description);        
        
        $parentId = $request->get('parentId');
        if(empty($parentId)) {
                list($parentRecord, $status) = explode('@', reset(array_filter(explode('|', $recordModel->get('parent_id')))));
                $parentId = $parentRecord;
        }

        $viewer->assign('FROM', $recordModel->get('from_email'));
        $viewer->assign('TO',$TO);
        $viewer->assign('CC', implode(',',$CC));
        $viewer->assign('BCC', implode(',',$BCC));
        $viewer->assign('RECORD', $recordModel);
        $viewer->assign('MODULE', $moduleName);
        $viewer->assign('RECORD_ID', $recordId);
        $viewer->assign('PARENT_RECORD', $parentId);

        if($request->get('mode') == 'previewPrint') {
            $viewer->assign('USER_MODEL', Users_Record_Model::getCurrentUserModel());
            echo $viewer->view('EmailPreviewPrint.tpl',$moduleName,true);
        }else{
            echo $viewer->view('EmailPreview.tpl',$moduleName,true);
        }
    }
    function emailForward($request){
        $viewer = $this->getViewer($request);
        $moduleName = "Emails";
        $this->emailActionsData($request);
        $viewer->assign('TO', '');
        $viewer->assign('TOMAIL_INFO', '');
        $viewer->assign('RELATED_LOAD', true);
        $viewer->assign('EMAIL_MODE', 'forward');
        echo $viewer->view('ComposeEmailForm.tpl', $moduleName, true);
    }
    
    public function emailActionsData($request){
        $recordId = $request->get('record');
        $moduleName = "Emails";
        $viewer = $this->getViewer($request);
        $attachment = array();
        
        $this->record = Vtiger_DetailView_Model::getInstance($moduleName, $recordId);
        $recordModel = $this->record->getRecord();

        $EMAILMaker = new EMAILMaker_EMAILMaker_Model();
        $description = $EMAILMaker->getEmailContent($recordId);
        $recordModel->set('description',$description);        
        
        $this->composeMailData($request);
        $subject = $recordModel->get('subject');
        $attachmentDetails = $recordModel->getAttachmentDetails();

        $viewer->assign('SUBJECT', $subject);
        $viewer->assign('DESCRIPTION', $description);
        $viewer->assign('ATTACHMENTS', $attachmentDetails);
        $viewer->assign('PARENT_EMAIL_ID', $recordId);
        $viewer->assign('PARENT_RECORD', $request->get('parentId'));
    }

    function getHeaderScripts(Vtiger_Request $request) {
       $headerScriptInstances = parent::getHeaderScripts($request);
       $moduleName = $request->getModule();

       $jsFileNames = array(
               "libraries.jquery.ckeditor.ckeditor",
               "libraries.jquery.ckeditor.adapters.jquery",
               'modules.Vtiger.resources.validator.BaseValidator',
               'modules.Vtiger.resources.validator.FieldValidator',
               "modules.Emails.resources.MassEdit",
               "modules.EMAILMaker.resources.EmailPreview",
               "modules.Vtiger.resources.CkEditor",
               'modules.Vtiger.resources.Popup',
               'libraries.jquery.jquery_windowmsg',
               'libraries.jquery.multiplefileupload.jquery_MultiFile'
       );

       $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
       $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
       return $headerScriptInstances;
   }
}
