/* ********************************************************************************
 * The content of this file is subject to the VTE Notepad ("License");
 * You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is VTExperts.com
 * Portions created by VTExperts.com. are Copyright(C) VTExperts.com.
 * All Rights Reserved.
 * ****************************************************************************** */

/** @class VTENotepadJS */
jQuery.Class("VTENotepadJS", {}, {
    MODULE: 'VTENotepad',

    registerWidgetButtons: function () {
        var thisInstance = this;

        var actionsContainer = jQuery('.actionsContainer');
        var quickActions = actionsContainer.find('.quickActions');
        var commonActionsButtonContainer = quickActions.find('.commonActionsButtonContainer');

        var params = {
            "view": "NotepadEditor",
            "module": thisInstance.MODULE
        };

        AppConnector.request(params).then(
            function (response) {
                // Append to DOM
                commonActionsButtonContainer.after(jQuery(response));

                var notepadContainer = jQuery('#vtiger_vtenotepad-container');
                var notepadContent = jQuery('#vtiger_vtenotepad-content');
                var btnSave = notepadContainer.find('.btn-save');
                var lblUpdatedTime = jQuery('.vtiger_vtenotepad-updated-time');

                /**
                 * @link http://stackoverflow.com/questions/25089297/twitter-bootstrap-avoid-dropdown-menu-close-on-click-inside#25196101
                 */
                $('.dropdown.mega-dropdown a').on('click', function () {
                    $(this).parent().toggleClass("open");
                });

                $('body').on('click', function (e) {
                    var dropdownContainer = $('.dropdown.mega-dropdown');
                    if (!dropdownContainer.is(e.target) && dropdownContainer.has(e.target).length === 0 && $('.open').has(e.target).length === 0) {
                        dropdownContainer.removeClass('open');
                    }
                });

                btnSave.click(function (event) {
                    event.preventDefault();

                    var params = {
                        "action": "ActionAjax",
                        "mode": "save",
                        "module": thisInstance.MODULE,
                        "record": notepadContent.attr('data-id'),
                        "content": notepadContent.val()
                    };

                    AppConnector.request(params).then(
                        function (response) {
                            if (response.success) {
                                var data = response.result;

                                notepadContent.attr('data-id', data['id']);
                                lblUpdatedTime.text(data['updated']);

                                Vtiger_Helper_Js.showMessage({
                                    type: 'success',
                                    text: response.result.message
                                });
                            } else {
                                Vtiger_Helper_Js.showMessage({
                                    type: 'error',
                                    text: response.error.message
                                });
                            }
                        },
                        function (error) {
                            console.log('error =', error);
                        }
                    );
                });
            },
            function (error) {
                console.log('error =', error);
            }
        );

    },

    registerEvents: function () {
        var thisInstance = this;
        thisInstance.registerWidgetButtons();
    }
});

jQuery(document).ready(function () {
    var instance = new VTENotepadJS();
    instance.registerEvents();
});
