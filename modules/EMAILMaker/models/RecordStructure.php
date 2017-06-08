<?php

/*********************************************************************************
 * The content of this file is subject to the ListView Colors 4 You license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/

class EMAILMaker_RecordStructure_Model extends Vtiger_RecordStructure_Model {

	const RECORD_STRUCTURE_MODE_DEFAULT = '';
	const RECORD_STRUCTURE_MODE_FILTER = 'Filter';
	//const RECORD_STRUCTURE_MODE_EDITTASK = 'EditTask';

	function setEMAILMakerModel($EMAILMakerModel) {
		$this->EMAILMakerModel = $EMAILMakerModel;
	}

	function getEMAILMakerModel() {
		return $this->EMAILMakerModel;
	}

	public function getStructure() {
		if(!empty($this->structuredValues)) {
			return $this->structuredValues;
		}

		$recordModel = $this->getEMAILMakerModel();
		$recordId = $recordModel->getId();

		$values = array();

		$baseModuleModel = $moduleModel = $this->getModule();
		$blockModelList = $moduleModel->getBlocks();
		foreach($blockModelList as $blockLabel=>$blockModel) {
			$fieldModelList = $blockModel->getFields();
			if (!empty ($fieldModelList)) {
				$values[$blockLabel] = array();
				foreach($fieldModelList as $fieldName=>$fieldModel) {
					if($fieldModel->isViewable()) {
						if (in_array($moduleModel->getName(), array('Calendar', 'Events'))&& $fieldName != 'modifiedby'  && $fieldModel->getDisplayType() == 3) {
							
							continue;
						}
						if(!empty($recordId)) {
							//Set the fieldModel with the valuetype for the client side.
							$fieldValueType = $recordModel->getFieldFilterValueType($fieldName);
							$fieldInfo = $fieldModel->getFieldInfo();
							$fieldInfo['emailmaker_valuetype'] = $fieldValueType;
							$fieldModel->setFieldInfo($fieldInfo);
						}

						$values[$blockLabel][$fieldName] = clone $fieldModel;
					}
				}
			}
		}

		$this->structuredValues = $values;
		return $values;
	}


	public function getAllEmailFields() {
		return $this->getFieldsByType('email');
	}

	public function getAllDateTimeFields() {
		$fieldTypes = array('date','datetime');
		return $this->getFieldsByType($fieldTypes);
	}

	public function getFieldsByType($fieldTypes) {
		$fieldTypesArray = array();
		if(gettype($fieldTypes) == 'string'){
			array_push($fieldTypesArray,$fieldTypes);
		} else {
			$fieldTypesArray = $fieldTypes;
		}
		$structure = $this->getStructure();
		$fieldsBasedOnType = array();
		if(!empty($structure)) {
			foreach($structure as $block => $fields) {
				foreach($fields as $metaKey => $field) {
					$type = $field->getFieldDataType();
					if(in_array($type, $fieldTypesArray)){
						$fieldsBasedOnType[$metaKey] = $field;
					}
				}
			}
		}
		return $fieldsBasedOnType;
	}

	public static function getInstanceForEMAILMakerModule($EMAILMakerModel, $mode) {
		$className = Vtiger_Loader::getComponentClassName('Model', $mode.'RecordStructure', 'EMAILMaker');
		$instance = new $className();
		$instance->setEMAILMakerModel($EMAILMakerModel);
                echo "aaaaaaaaaaaaaaaaaaaaaaa";
		$instance->setModule($EMAILMakerModel->getModule());
		return $instance;
	}

	public function getNameFields() {
		$moduleModel = $this->getModule();
		$nameFieldsList[$moduleModel->getName()] = $moduleModel->getNameFields();

		$fields = $moduleModel->getFieldsByType(array('reference', 'owner', 'multireference'));
		foreach($fields as $parentFieldName => $field) {
			$type = $field->getFieldDataType();
			$referenceModules = $field->getReferenceList();
			if($type == 'owner') $referenceModules = array('Users');
			foreach($referenceModules as $refModule) {
				$moduleModel = Vtiger_Module_Model::getInstance($refModule);
				$nameFieldsList[$refModule] = $moduleModel->getNameFields();
			}
		}

		$nameFields = array();
		$recordStructure = $this->getStructure();
		foreach ($nameFieldsList as $moduleName => $fieldNamesList) {
			foreach ($fieldNamesList as $fieldName) {
				foreach($recordStructure as $block => $fields) {
					foreach($fields as $metaKey => $field) {
						if ($fieldName === $field->get('name')) {
							$nameFields[$metaKey] = $field;
						}
					}
				}
			}
		}
		return $nameFields;
	}
}