/******/ (() => { // webpackBootstrap
    /******/ 	"use strict";
    var __webpack_exports__ = {};

// Class Definition
    var KTLogin = function () {
        var _login;

        var _handleSignInForm = function () {
            var validation;
            var form = KTUtil.getById('kt_check_letter');
            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            nomor_nop_cek: {
                                validators: {
                                    notEmpty: {
                                        message: 'NOP diperlukan'
                                    },
                                    regexp: {
                                        regexp: /^[0-9s.'"\s]+$/i,
                                        message: 'Inputan harus berupa angka'
                                    },
                                    stringLength: {
                                        max: 24,
                                        min: 24,
                                        message: 'Inputan tidak boleh lebih atau kurang dari 18 digit'
                                    },
                                }
                            },
                            tahun_pajak_cek: {
                                validators: {
                                    notEmpty: {
                                        message: 'Tahun Pajak diperlukan'
                                    },
                                    remote: {
                                        message: 'NOP dengan ' + form.querySelector('[name="nomor_nop_cek"]').value + ' tahun ini telah melakukan laporan',
                                        method: 'POST',
                                        url: HOST_URL + 'admin/report/letter/check_laporan',
                                        data: function () {
                                            return {
                                                nomor_nop_cek: form.querySelector('[name="nomor_nop_cek"]').value,
                                            };
                                        },
                                    },
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            submitButton: new FormValidation.plugins.SubmitButton(),
                            defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                            bootstrap: new FormValidation.plugins.Bootstrap()
                        }
                    }
            );
        };

        // Public Functions
        return {
            // public functions
            init: function () {
                _login = $('#kt_form');

                _handleSignInForm();
            }
        };
    }();

// Class Initialization
    jQuery(document).ready(function () {
        KTLogin.init();
    });

    /******/ })()
        ;
//# sourceMappingURL=login-general.js.map