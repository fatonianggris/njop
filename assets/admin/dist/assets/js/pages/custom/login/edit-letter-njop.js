/******/ (() => { // webpackBootstrap
    /******/ 	"use strict";
    var __webpack_exports__ = {};

// Class Definition
    var KTLogin = function () {
        var _login;

        var _handleSignInForm = function () {
            var validation;
            var form = KTUtil.getById('kt_edit_letter_form')
            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            id_surat: {
                                validators: {
                                    notEmpty: {
                                        message: 'ID surat diperlukan'
                                    },
                                }
                            },
                            nomor_nop: {
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
                            tahun_pajak: {
                                validators: {
                                    notEmpty: {
                                        message: 'Tahun Pajak diperlukan'
                                    },
                                    remote: {
                                        message: 'NOP dengan ' + form.querySelector('[name="nomor_nop"]').value + ' tahun ini telah melakukan laporan',
                                        method: 'POST',
                                        url: HOST_URL + 'admin/report/letter/check_laporan',
                                        data: function () {
                                            return {
                                                nomor_nop: form.querySelector('[name="nomor_nop"]').value,
                                                id_surat: form.querySelector('[name="id_surat"]').value,
                                            };
                                        },
                                    },
                                }
                            },
                            nik_wajib_pajak: {
                                validators: {
                                    notEmpty: {
                                        message: 'NIK/NOPEL diperlukan'
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
                            prov_objek_pajak: {
                                validators: {
                                    notEmpty: {
                                        message: 'Provinsi Letak Objek diperlukan'
                                    }
                                }
                            },
                            kabkot_objek_pajak: {
                                validators: {
                                    notEmpty: {
                                        message: 'Kabupaten/Kota Letak Objek diperlukan'
                                    }
                                }
                            },
                            kec_objek_pajak: {
                                validators: {
                                    notEmpty: {
                                        message: 'Kecamatan Letak Objek diperlukan'
                                    }
                                }
                            },
                            kel_objek_pajak: {
                                validators: {
                                    notEmpty: {
                                        message: 'Kelurahan/Desa Letak Objek diperlukan'
                                    }
                                }
                            },
                            nama_wajib_pajak: {
                                validators: {
                                    notEmpty: {
                                        message: 'Nama Wajib Pajak diperlukan'
                                    },
                                    regexp: {
                                        regexp: /^[a-zs\s]+$/i,
                                        message: 'Inputan harus berupa huruf'
                                    }
                                }
                            },
                            prov_wajib_pajak: {
                                validators: {
                                    notEmpty: {
                                        message: 'Provinsi Pemilik Objek diperlukan'
                                    }
                                }
                            },
                            kabkot_wajib_pajak: {
                                validators: {
                                    notEmpty: {
                                        message: 'Kabupaten/Kota Pemilik Objek diperlukan'
                                    }
                                }
                            },
                            kec_wajib_pajak: {
                                validators: {
                                    notEmpty: {
                                        message: 'Kecamatan Pemilik Objek diperlukan'
                                    }
                                }
                            },
                            kel_wajib_pajak: {
                                validators: {
                                    notEmpty: {
                                        message: 'Kelurahan/Desa Pemilik Objek diperlukan'
                                    }
                                }
                            },
                            luas_bumi: {
                                validators: {
                                    notEmpty: {
                                        message: 'Luas Bumi diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators                                      
                                    },
                                }
                            },
                            luas_bangunan: {
                                validators: {
                                    notEmpty: {
                                        message: 'Luas Bangunan diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators                                      
                                    },
                                }
                            },
                            kelas_bumi: {
                                validators: {
                                    notEmpty: {
                                        message: 'Kelas Bumi diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators                                      
                                    },
                                }
                            },
                            kelas_bangunan: {
                                validators: {
                                    notEmpty: {
                                        message: 'Kelas Bangunan diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators                                      
                                    },
                                }
                            },
                            total_pajak_bumi_bangunan: {
                                validators: {
                                    notEmpty: {
                                        message: 'Pajak yang dibayar diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators                                      
                                    },
                                }
                            },
                            foto_surat: {
                                validators: {
                                    file: {
                                        extension: 'jpeg,jpg,png',
                                        type: 'image/jpeg,image/png',
                                        maxSize: 5097152,
                                        message: 'File harus berekstensi png,jpg,jpeg dan < 5Mb'
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