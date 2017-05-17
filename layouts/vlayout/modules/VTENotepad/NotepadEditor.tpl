{*<!--
/* ********************************************************************************
 * The content of this file is subject to the VTE Notepad ("License");
 * You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is VTExperts.com
 * Portions created by VTExperts.com. are Copyright(C) VTExperts.com.
 * All Rights Reserved.
 * ****************************************************************************** */
-->*}

{strip}
    <div class="pull-right commonActionsButtonContainer">
        <div class="btn-group dropdown mega-dropdown">
            <a href="javascript:;" class="dropdown-toggle">
                <img src="layouts/vlayout/modules/VTENotepad/resources/favicon.png"
                     id="vtiger_vtenotepad-icon" class="alignMiddle"
                     alt="VTENotepad" title="VTENotepad">
            </a>

            <ul class="dropdown-menu dropdownStyles commonActionsButtonDropDown mega-dropdown-menu">
                {*<li class="title">*}
                {*<input type="text">*}
                {*</li>*}

                {*<hr>*}

                <li id="vtiger_vtenotepad-container">
                    <div class="row-fluid">
                        <div class="span12">
                            <textarea name="" id="vtiger_vtenotepad-content" cols="30" rows="15"
                                      data-id="{{($RECORD) ? $RECORD->getId() : 0}}">{{($RECORD) ? $RECORD->get('content') : ''}}</textarea>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <span class="vtiger_vtenotepad-updated">
                                <span class="vtiger_vtenotepad-updated-label">{vtranslate('Last saved', $MODULE_NAME)}</span>
                                :&nbsp;<span class="vtiger_vtenotepad-updated-time">{{($RECORD) ? $RECORD->get('updated') : ''}}</span>
                            </span>

                            <button class="btn btn-success btn-save" type="button">
                                {vtranslate('Save', $MODULE_NAME)}
                            </button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
{/strip}
