/******/ (() => { // webpackBootstrap
    /******/ 	"use strict";
    var __webpack_exports__ = {};

// Class Definition
    var KTLogin = function () {
        var _login;

        var _handleSignInForm = function () {
            var validation;
            var form = KTUtil.getById('kt_edit_profile_form')
            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            nama_akun: {
                                validators: {
                                    notEmpty: {
                                        message: 'Nama Akun diperlukan'
                                    },
                                }
                            },
                            nik: {
                                validators: {
                                    notEmpty: {
                                        message: 'NIK KTP diperlukan'
                                    },
                                    regexp: {
                                        regexp: /^[0-9s.'"\s]+$/i,
                                        message: 'Inputan harus berupa angka'
                                    },
                                    stringLength: {
                                        max: 22,
                                        min: 22,
                                        message: 'Inputan tidak boleh lebih atau kurang dari 16 digit'
                                    }
                                }
                            },
                            role_akun: {
                                validators: {
                                    notEmpty: {
                                        message: 'Role Akun diperlukan'
                                    }
                                }
                            },
                            jenis_kelamin: {
                                validators: {
                                    notEmpty: {
                                        message: 'Jenis Kelamin diperlukan'
                                    }
                                }
                            },
                            email_akun: {
                                validators: {
                                    notEmpty: {
                                        message: 'Email Akun diperlukan'
                                    },
                                    emailAddress: {
                                        message: 'Inputan harus berformat email'
                                    }
                                }
                            },
                            nomor_handphone_akun: {
                                validators: {
                                    notEmpty: {
                                        message: 'Nomor Handphone diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    },
                                }
                            },
                            password: {
                                validators: {
                                    notEmpty: {
                                        message: 'Password diperlukan'
                                    },
                                    identical: {
                                        compare: function () {
                                            return form.querySelector('[name="cf_password"]').value;
                                        },
                                        message: 'Inputan Password tidak sama dengan inputan Konfirmasi Password'
                                    }
                                }
                            },
                            cf_password: {
                                validators: {
                                    notEmpty: {
                                        message: 'Konfirmasi Password diperlukan'
                                    },
                                    identical: {
                                        compare: function () {
                                            return form.querySelector('[name="password"]').value;
                                        },
                                        message: 'Inputan Konfirmasi Password tidak sama dengan inputan Password'
                                    }
                                }
                            },
                            alamat: {
                                validators: {
                                    notEmpty: {
                                        message: 'Alamat Akun diperlukan'
                                    },

                                }
                            },
                            foto_ktp: {
                                validators: {
                                    file: {
                                        extension: 'jpeg,jpg,png',
                                        type: 'image/jpeg,image/png',
                                        maxSize: 5097152,
                                        message: 'Foto harus berekstensi jpeg,jpg,png dan kurang dari 5Mb'
                                    }
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            submitButton: new FormValidation.plugins.SubmitButton(),
                            bootstrap: new FormValidation.plugins.Bootstrap()
                        }
                    }
            );

            $(".ubahpass").bootstrapSwitch();
            var pass_awal = $('input[name="password"]');
            var pass_konf = $('input[name="cf_password"]');

            pass_awal.prop('disabled', true);
            pass_konf.prop('disabled', true);

            validation.disableValidator('password').disableValidator('cf_password');

            $(".ubahpass").on("switchChange.bootstrapSwitch", function (event, state) {
                if (state == true) {
                    validation.enableValidator('password').enableValidator('cf_password');
                    pass_awal.prop('disabled', false);
                    pass_konf.prop('disabled', false);

                } else {
                    validation.disableValidator('password').disableValidator('cf_password');
                    pass_awal.prop('disabled', true);
                    pass_konf.prop('disabled', true);
                    pass_awal.val("");
                    pass_konf.val("");
                }
            });

            _login.on('submit', function (wizard) {
                if (validation) {
                    validation.validate().then(function (status) {
                        if (status == 'Valid') {
                            KTApp.blockPage({
                                overlayColor: '#FFA800',
                                state: 'warning',
                                size: 'lg',
                                opacity: 0.1,
                                message: 'Silahkan Tunggu...'
                            });
                            form.submit(); // Submit form
                        } else {
                            Swal.fire({
                                text: "Mohon Maaf, kemungkinan terjadi kesalahan pada pengisian Anda, Mohon menginputkan dengan benar.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Oke!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-primary"
                                }
                            }).then(function () {
                                KTUtil.scrollTop();
                            });
                        }
                    });
                }
            });
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