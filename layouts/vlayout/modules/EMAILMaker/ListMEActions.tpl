{*<!--
/*********************************************************************************
  ** The contents of this file are subject to the vtiger CRM Public License Version 1.0
   * ("License"); You may not use this file except in compliance with the License
   * The Original Code is:  vtiger CRM Open Source
   * The Initial Developer of the Original Code is vtiger.
   * Portions created by vtiger are Copyright (C) vtiger.
   * All Rights Reserved.
  *
 ********************************************************************************/
-->*}
{strip}
	<span class="pull-right listViewActions">
        <span class="pageNumbers alignTop" data-placement="bottom" >
                {if $LISTVIEW_ENTIRES_COUNT}{$PAGING_MODEL->getRecordStartRange()} {vtranslate('LBL_to', $MODULE)} {$PAGING_MODEL->getRecordEndRange()}{/if}
        </span>
        <span class="btn-group alignTop">
                <span class="btn-group">
                        <button class="btn" id="listViewPreviousPageButton" {if !$PAGING_MODEL->isPrevPageExists()} disabled {/if} type="button"><span class="icon-chevron-left"></span></button>
                                <button class="btn dropdown-toggle" type="button" id="listViewPageJump" data-toggle="dropdown" {if $PAGE_COUNT eq 1} disabled {/if}>
                                        <i class="vtGlyph vticon-pageJump" title="{vtranslate('LBL_LISTVIEW_PAGE_JUMP',$moduleName)}"></i>
                                </button>
                                <ul class="listViewBasicAction dropdown-menu" id="listViewPageJumpDropDown">
                                        <li>
                                                <span class="row-fluid">
                                                        <span class="span3 pushUpandDown2per"><span class="pull-right">{vtranslate('LBL_PAGE',$moduleName)}</span></span>
                                                        <span class="span4">
                                                                <input type="text" id="pageToJump" class="listViewPagingInput" value="{$PAGE_NUMBER}"/>
                                                        </span>
                                                        <span class="span2 textAlignCenter pushUpandDown2per">
                                                                {vtranslate('LBL_OF',$moduleName)}&nbsp;
                                                        </span>
                                                        <span class="span2 pushUpandDown2per" id="totalPageCount">{$PAGE_COUNT}</span>
                                                </span>
                                        </li>
                                </ul>
                        <button class="btn" id="listViewNextPageButton" {if (!$PAGING_MODEL->isNextPageExists()) or ($PAGE_COUNT eq 1)} disabled {/if} type="button"><span class="icon-chevron-right"></span></button>
                </span>
        </span>

	{if $IS_ADMIN eq '1'}
            <span class="btn-group">
                <span class="pull-right listViewActions">
                    <span class="btn-group">
                        <button class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="alignMiddle" src="{vimage_path('tools.png')}" alt="{vtranslate('LBL_SETTINGS', $MODULE)}" title="{vtranslate('LBL_SETTINGS', $MODULE)}">&nbsp;&nbsp;<i class="caret"></i></button>
                        <ul class="listViewSetting dropdown-menu">
                            <li><a href="index.php?module=CronTasks&parent=Settings&view=List&block=4&fieldid=26">{vtranslate("Scheduler", "Settings")}</a></li>
                        </ul>
                    </span>
                </span>
            </span>
	{/if}
	</span>
	<div class="clearfix"></div>
	<input type="hidden" id="recordsCount" value=""/>
	<input type="hidden" id="selectedIds" name="selectedIds" />
	<input type="hidden" id="excludedIds" name="excludedIds" />
{/strip}