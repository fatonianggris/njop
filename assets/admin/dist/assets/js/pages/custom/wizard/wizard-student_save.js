/******/ (() => { // webpackBootstrap
    /******/ 	"use strict";
    var __webpack_exports__ = {};
    /*!*******************************************************!*\
     !*** ../demo1/src/js/pages/custom/wizard/wizard-2.js ***!
     \*******************************************************/


// Class definition
    var KTWizard2 = function () {
        // Base elements
        var _wizardEl;
        var _formEl;
        var _wizardObj;
        var _validations = [];

        // Private functions
        var _initWizard = function () {
            // Initialize form wizard
            _wizardObj = new KTWizard(_wizardEl, {
                startStep: 1, // initial active step number
                clickableSteps: false // to make steps clickable this set value true and add data-wizard-clickable="true" in HTML for class="wizard" element
            });

            // Validation before going to next page
            _wizardObj.on('change', function (wizard) {
                if (wizard.getStep() > wizard.getNewStep()) {
                    return; // Skip if stepped back
                }

                // Validate form before change wizard step
                var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

                if (validator) {
                    validator.validate().then(function (status) {
                        if (status == 'Valid') {
                            wizard.goTo(wizard.getNewStep());

                            KTUtil.scrollTop();
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

                return false;  // Do not change wizard step, further action will be handled by he validator
            });

            // Change event
            _wizardObj.on('changed', function (wizard) {
                KTUtil.scrollTop();
            });

            // Submit event
            _wizardObj.on('submit', function (wizard) {
                Swal.fire({
                    text: "Oke! semua inputan telah tervalidasi, Silahkan pilih tombol Kirim untuk menyimpan.",
                    icon: "success",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, kirim!",
                    cancelButtonText: "No, batalan",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-primary",
                        cancelButton: "btn font-weight-bold btn-danger"
                    }
                }).then(function (result) {
                    if (result.value) {
                        _formEl.submit(); // Submit form
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: "Input tambah siswa Anda batalkan!.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Oke!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-primary",
                            }
                        });
                    }
                });
            });
        }

        var _initValidation = function () {
            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            // Step 1
            _validations.push(FormValidation.formValidation(
                    _formEl,
                    {
                        fields: {
                            nisn: {
                                validators: {
                                    notEmpty: {
                                        message: 'NISN Siswa diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    },
                                    stringLength: {
                                        max: 10,
                                        min: 10,
                                        message: 'Inputan tidak boleh lebih atau kurang dari 10 digit'
                                    }
                                }
                            },
                            nik: {
                                validators: {
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    },
                                    stringLength: {
                                        max: 16,
                                        min: 16,
                                        message: 'Inputan tidak boleh lebih atau kurang dari 16 digit'
                                    }
                                }
                            },
                            nama_lengkap: {
                                validators: {
                                    notEmpty: {
                                        message: 'Nama Lengkap diperlukan'
                                    },
                                    regexp: {
                                        regexp: /^[a-zs'"\s]+$/i,
                                        message: 'Inputan harus berupa huruf'
                                    }
                                }
                            },
                            nama_panggilan: {
                                validators: {
                                    regexp: {
                                        regexp: /^[a-zs'"\s]+$/i,
                                        message: 'Inputan harus berupa huruf'
                                    }
                                }
                            },
                            tempat_lahir: {
                                validators: {
                                    notEmpty: {
                                        message: 'Tempat Lahir diperlukan'
                                    },
                                    regexp: {
                                        regexp: /^[a-zs\s]+$/i,
                                        message: 'Inputan harus berupa huruf'
                                    }

                                }
                            },
                            tanggal_lahir: {
                                validators: {
                                    notEmpty: {
                                        message: 'Tanggal Lahir diperlukan'
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
                            agama: {
                                validators: {
                                    notEmpty: {
                                        message: 'Agama diperlukan'
                                    }
                                }
                            },
                            nomor_handphone: {
                                validators: {
                                    notEmpty: {
                                        message: 'Nomor HP diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka'
                                    },
                                    stringLength: {
                                        min: 10,
                                        message: 'Inputan tidak boleh kurang dari 10 digit'
                                    }
                                }
                            },
                            nomor_telepon: {
                                validators: {
                                    integer: {
                                        message: 'Inputan harus Angka'
                                    }

                                }
                            },
                            email: {
                                validators: {
                                    notEmpty: {
                                        message: 'Email diperlukan'
                                    },
                                    emailAddress: {
                                        message: 'Inputan harus berformat email'
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
                        }
                    }
            ));

            // Step 2
            _validations.push(FormValidation.formValidation(
                    _formEl,
                    {
                        fields: {
                            nama_ayah: {
                                validators: {
                                    notEmpty: {
                                        message: 'Nama Ayah diperlukan'
                                    },
                                    regexp: {
                                        regexp: /^[a-zs'"\s]+$/i,
                                        message: 'Inputan harus berupa huruf'
                                    }
                                }
                            },
                            nik_ayah: {
                                validators: {
                                    notEmpty: {
                                        message: 'NIK KTP Ayah diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    },
                                    stringLength: {
                                        max: 16,
                                        min: 16,
                                        message: 'Inputan tidak boleh lebih atau kurang dari 16 digit'
                                    }
                                }
                            },
                            tempat_lahir_ayah: {
                                validators: {
                                    notEmpty: {
                                        message: 'Tempat Lahir Ayah diperlukan'
                                    },
                                    regexp: {
                                        regexp: /^[a-zs\s]+$/i,
                                        message: 'Inputan harus berupa huruf'
                                    }

                                }
                            },

                            tanggal_lahir_ayah: {
                                validators: {
                                    notEmpty: {
                                        message: 'Tanggal Lahir Ayah diperlukan'
                                    }
                                }
                            },
                            pekerjaan_ayah: {
                                validators: {
                                    notEmpty: {
                                        message: 'Pekerjaan Ayah diperlukan'
                                    },
                                    regexp: {
                                        regexp: /^[a-zs\s]+$/i,
                                        message: 'Inputan harus berupa huruf'
                                    }
                                }
                            },
                            pendidikan_ayah: {
                                validators: {
                                    notEmpty: {
                                        message: 'Pendidikan Ayah diperlukan'
                                    }
                                }
                            },
                            penghasilan_ayah: {
                                validators: {
                                    notEmpty: {
                                        message: 'Penghasilan Ayah diperlukan'
                                    }
                                }
                            },
                            nama_ibu: {
                                validators: {
                                    notEmpty: {
                                        message: 'Nama Ibu diperlukan'
                                    },
                                    regexp: {
                                        regexp: /^[a-zs'"\s]+$/i,
                                        message: 'Inputan harus berupa huruf'
                                    }
                                }
                            },
                            nik_ibu: {
                                validators: {
                                    notEmpty: {
                                        message: 'NIK KTP Ibu diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    },
                                    stringLength: {
                                        max: 16,
                                        min: 16,
                                        message: 'Inputan tidak boleh lebih atau kurang dari 16 digit'
                                    }
                                }
                            },
                            tempat_lahir_ibu: {
                                validators: {
                                    notEmpty: {
                                        message: 'Tempat Lahir Ibu diperlukan'
                                    },
                                    regexp: {
                                        regexp: /^[a-zs\s]+$/i,
                                        message: 'Inputan harus berupa huruf'
                                    }

                                }
                            },

                            tanggal_lahir_ibu: {
                                validators: {
                                    notEmpty: {
                                        message: 'Tanggal Lahir Ibu diperlukan'
                                    }
                                }
                            },
                            pekerjaan_ibu: {
                                validators: {
                                    notEmpty: {
                                        message: 'Pekerjaan Ibu diperlukan'
                                    },
                                    regexp: {
                                        regexp: /^[a-zs\s]+$/i,
                                        message: 'Inputan harus berupa huruf'
                                    }
                                }
                            },
                            pendidikan_ibu: {
                                validators: {
                                    notEmpty: {
                                        message: 'Pendidikan Ibu diperlukan'
                                    }
                                }
                            },
                            penghasilan_ibu: {
                                validators: {
                                    notEmpty: {
                                        message: 'Penghasilan Ibu diperlukan'
                                    }
                                }
                            },
                            nama_wali: {
                                validators: {
                                    notEmpty: {
                                        message: 'Nama Wali diperlukan'
                                    },
                                    regexp: {
                                        regexp: /^[a-zs'"\s]+$/i,
                                        message: 'Inputan harus berupa huruf'
                                    }
                                }
                            },
                            nik_wali: {
                                validators: {
                                    notEmpty: {
                                        message: 'NIK KTP Wali diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    },
                                    stringLength: {
                                        max: 16,
                                        min: 16,
                                        message: 'Inputan tidak boleh lebih atau kurang dari 16 digit'
                                    }
                                }
                            },
                            tempat_lahir_wali: {
                                validators: {
                                    notEmpty: {
                                        message: 'Tempat Lahir Wali diperlukan'
                                    },
                                    regexp: {
                                        regexp: /^[a-zs\s]+$/i,
                                        message: 'Inputan harus berupa huruf'
                                    }

                                }
                            },

                            tanggal_lahir_wali: {
                                validators: {
                                    notEmpty: {
                                        message: 'Tanggal Lahir Wali diperlukan'
                                    }
                                }
                            },
                            pekerjaan_wali: {
                                validators: {
                                    notEmpty: {
                                        message: 'Pekerjaan Wali diperlukan'
                                    },
                                    regexp: {
                                        regexp: /^[a-zs\s]+$/i,
                                        message: 'Inputan harus berupa huruf'
                                    }
                                }
                            },
                            pendidikan_wali: {
                                validators: {
                                    notEmpty: {
                                        message: 'Pendidikan Wali diperlukan'
                                    }
                                }
                            },
                            penghasilan_wali: {
                                validators: {
                                    notEmpty: {
                                        message: 'Penghasilan Wali diperlukan'
                                    }
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
                        }
                    }
            ));

            // Step 3
            _validations.push(FormValidation.formValidation(
                    _formEl,
                    {
                        fields: {
                            alamat_rumah_kk: {
                                validators: {
                                    notEmpty: {
                                        message: 'Alamat Rumah KK diperlukan'
                                    }
                                }
                            },
                            provinsi_kk: {
                                validators: {
                                    notEmpty: {
                                        message: 'Provinsi KK diperlukan'
                                    }
                                }
                            },
                            kabupaten_kota_kk: {
                                validators: {
                                    notEmpty: {
                                        message: 'Kabupaten/Kota KK diperlukan'
                                    }
                                }
                            },
                            kecamatan_kk: {
                                validators: {
                                    notEmpty: {
                                        message: 'Kecamatan KK diperlukan'
                                    }
                                }
                            },
                            kelurahan_desa_kk: {
                                validators: {
                                    notEmpty: {
                                        message: 'Kelurahan/Desa KK diperlukan'
                                    }
                                }
                            },
                            rt_kk: {
                                validators: {
                                    notEmpty: {
                                        message: 'RT KK diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    }
                                }
                            },
                            rw_kk: {
                                validators: {
                                    notEmpty: {
                                        message: 'RW KK diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    },
                                }
                            },
                            kodepos_kk: {
                                validators: {
                                    notEmpty: {
                                        message: 'Kodepos KK diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    },
                                }
                            },
                            alamat_rumah_dom: {
                                validators: {
                                    notEmpty: {
                                        message: 'Alamat Rumah Domisili diperlukan'
                                    }
                                }
                            },
                            provinsi_dom: {
                                validators: {
                                    notEmpty: {
                                        message: 'Provinsi Domisili diperlukan'
                                    }
                                }
                            },
                            kabupaten_kota_dom: {
                                validators: {
                                    notEmpty: {
                                        message: 'Kabupaten/Kota Domisili diperlukan'
                                    }
                                }
                            },
                            kecamatan_dom: {
                                validators: {
                                    notEmpty: {
                                        message: 'Kecamatan Domisili diperlukan'
                                    }
                                }
                            },
                            kelurahan_desa_dom: {
                                validators: {
                                    notEmpty: {
                                        message: 'Kelurahan/Desa Domisili diperlukan'
                                    }
                                }
                            },
                            rt_dom: {
                                validators: {
                                    notEmpty: {
                                        message: 'RT Domisili diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    }
                                }
                            },
                            rw_dom: {
                                validators: {
                                    notEmpty: {
                                        message: 'RW Domisili diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    },
                                }
                            },
                            kodepos_dom: {
                                validators: {
                                    notEmpty: {
                                        message: 'Kodepos Domisili diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
                        }
                    }
            ));

            // Step 4
            _validations.push(FormValidation.formValidation(
                    _formEl,
                    {
                        fields: {
                            alat_transportasi: {
                                validators: {
                                    notEmpty: {
                                        message: 'Alat Transportasi diperlukan'
                                    }
                                }
                            },
                            jenis_tinggal: {
                                validators: {
                                    notEmpty: {
                                        message: 'Jenis Tempat Tinggal diperlukan'
                                    }
                                }
                            },
                            jarak_rumah_sekolah: {
                                validators: {
                                    notEmpty: {
                                        message: 'Jarak Rumah diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    }
                                }
                            },
                            jumlah_saudara: {
                                validators: {
                                    notEmpty: {
                                        message: 'Jumlah Saudara diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    }
                                }
                            },
                            anak_ke: {
                                validators: {
                                    notEmpty: {
                                        message: 'Anak Ke- diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    }
                                }
                            },
                            kebutuhan_khusus: {
                                validators: {
                                    notEmpty: {
                                        message: 'Berkebutuhan Khusus diperlukan'
                                    }
                                }
                            },
                            tinggi_badan: {
                                validators: {
                                    notEmpty: {
                                        message: 'Tinggi Badan diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    }
                                }
                            },
                            berat_badan: {
                                validators: {
                                    notEmpty: {
                                        message: 'Berat Badan diperlukan'
                                    },
                                    integer: {
                                        message: 'Inputan harus Angka',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    }
                                }
                            },
                            tingkat_siswa: {
                                validators: {
                                    notEmpty: {
                                        message: 'Tingkat Siswa diperlukan'
                                    }
                                }
                            },
                            password: {
                                validators: {
                                    notEmpty: {
                                        message: 'Password diperlukan'
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
                                            return _formEl.querySelector('[name="password"]').value;
                                        },
                                        message: 'Inputan Password tidak sama dengan inputan Konfirmasi Password'
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
                        }
                    }
            ));
// Revalidate the confirmation password when changing the password
            _formEl.querySelector('[name="password"]').addEventListener('input', function () {
                _wizardObj.revalidateField('cf_password');
            });

        };

        return {
            // public functions
            init: function () {
                _wizardEl = KTUtil.getById('kt_wizard');
                _formEl = KTUtil.getById('kt_form_student');

                _initWizard();
                _initValidation();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTWizard2.init();
    });

    /******/ })()
        ;
//# sourceMappingURL=wizard-2.js.map