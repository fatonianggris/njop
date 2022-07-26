/******/ (() => { // webpackBootstrap
    /******/ 	"use strict";
    var __webpack_exports__ = {};

// Class Definition
    var KTLogin = function () {
        var _login;

        var _handleSignInForm = function () {
            var validation;
            var form = KTUtil.getById('kt_register_form');
            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            nama_calon_siswa: {
                                validators: {
                                    notEmpty: {
                                        message: 'Nama Lengkap Siswa diperlukan'
                                    },
                                    regexp: {
                                        regexp: /^[a-zs\s]+$/i,
                                        message: 'Inputan harus berupa huruf'
                                    }
                                }
                            },
                            id_tingkat: {
                                validators: {
                                    notEmpty: {
                                        message: 'Jenjang/Tingkat Siswa diperlukan'
                                    }
                                }
                            },
                            id_jalur: {
                                validators: {
                                    notEmpty: {
                                        message: 'Jalur Siswa diperlukan'
                                    }
                                }
                            },
                            id_tahun_ajaran: {
                                validators: {
                                    notEmpty: {
                                        message: 'Tahun Ajaran diperlukan'
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
                            nama_orangtua: {
                                validators: {
                                    notEmpty: {
                                        message: 'Nama Orangtua/Wali Siswa diperlukan'
                                    }
                                }
                            },
                            alamat: {
                                validators: {
                                    notEmpty: {
                                        message: 'Alamat Siswa diperlukan'
                                    }
                                }
                            },
                            email_orangtua: {
                                validators: {
                                    notEmpty: {
                                        message: 'Email Orangtua/Wali/Siswa diperlukan'
                                    },
                                    emailAddress: {
                                        message: 'Inputan harus berformat Email'
                                    },
                                    remote: {
                                        message: 'Email telah digunakan, Gunakan Email lain',
                                        method: 'POST',
                                        url: base_url + 'ppdb/register/check_email_ppdb',
                                    },
                                }
                            },
                            nomor_wa: {
                                validators: {
                                    notEmpty: {
                                        message: 'Nomor WA OrangTua/Wali/Siswa diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    },
                                    stringLength: {
                                        max: 13,
                                        min: 10,
                                        message: 'Inputan tidak boleh lebih dari 13 digit atau kurang dari 10 digit'
                                    }
                                }
                            },
                            'insight[]': {
                                validators: {
                                    notEmpty: {
                                        message: 'Infomasi Anda diperlukan'
                                    }
                                }
                            },
                            setuju: {
                                validators: {
                                    notEmpty: {
                                        message: 'Silahkan Centang bahwa Anda setuju'
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            submitButton: new FormValidation.plugins.SubmitButton(),
                            defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                            bootstrap: new FormValidation.plugins.Bootstrap()
                        }
                    }
            );
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
                _login = $('#kt_login');

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