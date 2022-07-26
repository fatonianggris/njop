/******/ (() => { // webpackBootstrap
    /******/ 	"use strict";
    var __webpack_exports__ = {};
    /*!***************************************************************!*\
     !*** ../demo1/src/js/pages/crud/forms/widgets/jquery-mask.js ***!
     \***************************************************************/

// Class definition

    var KTMaskDemo = function () {

        // private functions
        var demos = function () {
            $('#kt_phone_with_ddd_input').mask('(00) 0000-0000-00000', {
                placeholder: "(99) 9999-9999-99999"
            });

            $('#kt_input_nop').mask('00.00.000.000.000.0000.0', {
                reverse: true
            });
            $('#kt_input_nop_cek').mask('00.00.000.000.000.0000.0', {
                reverse: true
            });
            $('#kt_input_nik').mask('00.00.00.00.00.00.0000', {
                reverse: true
            });

        }

        return {
            // public functions
            init: function () {
                demos();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTMaskDemo.init();
    });

    /******/ })()
        ;
//# sourceMappingURL=jquery-mask.js.map