/******/ (() => { // webpackBootstrap
    /******/ 	"use strict";
    var __webpack_exports__ = {};
    /*!*****************************************************************!*\
     !*** ../demo1/src/js/pages/crud/ktdatatable/base/html-table.js ***!
     \*****************************************************************/

// Class definition

    var KTDatatableHtmlTableDemo = function () {
        // Private functions

        var options = {
            data: {
                pageSize: 500,
            },

            search: {
                input: $('#kt_datatable_search_query'),
                key: 'generalSearch',
            },
            toolbar: {
                items: {
                    pagination: {pageSizeSelect: [500, 1000]}
                }
            },
            layout: {
                class: 'datatable-bordered datatable-head-custom',
                scroll: true,
                height: 600,
                footer: false
            },

            columns: [{
                    field: 'ID',
                    title: 'ID',
                    sortable: false,
                    width: 20,
                    selector: true,
                    textAlign: 'center',
                }, {
                    field: 'No Formulir',
                    title: 'No Formulir',
                    width: 70,
                    type: 'number',
                    autoHide: false
                },
                {
                    field: 'Nama Calon',
                    title: 'Nama Calon',
                    width: 190,
                    autoHide: false
                },
                {
                    field: 'JK',
                    title: 'JK',
                    width: 25,
                    template: function (row) {
                        var status = {
                            1: {
                                'title': 'L',
                                'class': 'label-light-warning'
                            },
                            2: {
                                'title': 'P',
                                'class': 'label-light-success'
                            }
                        };
                        return '<span class="label font-weight-bold label-lg ' + status[row.JK].class + ' label-inline">' + status[row.JK].title + '</span>';
                    },
                },
                {
                    field: 'Jenjang',
                    title: 'Jenjang',
                    width: 65,
                    template: function (row) {
                        var status = {
                            1: {
                                'title': 'KB',
                                'class': 'label-light-info'
                            },
                            2: {
                                'title': 'TK',
                                'class': 'label-light-primary'
                            },
                            3: {
                                'title': 'SD',
                                'class': 'label-light-success'
                            },
                            4: {
                                'title': 'SMP',
                                'class': 'label-light-warning'
                            },
                            5: {
                                'title': 'SMA',
                                'class': 'label-light-danger'
                            },
                            6: {
                                'title': 'UMUM',
                                'class': 'label-light-default'
                            }
                        };
                        return '<span class="label font-weight-bold label-lg ' + status[row.Jenjang].class + ' label-inline">' + status[row.Jenjang].title + '</span>';
                    },
                },
                {
                    field: 'Program',
                    title: 'Program',
                    width: 75,
                    template: function (row) {
                        var status = {
                            1: {
                                'title': 'REGULER',
                                'class': 'label-light-info'
                            },
                            2: {
                                'title': 'ICP',
                                'class': 'label-light-success'
                            }
                        };
                        return '<span class="label font-weight-bold label-lg ' + status[row.Program].class + ' label-inline">' + status[row.Program].title + '</span>';
                    },
                },
                {
                    field: 'Penerimaan',
                    title: 'Penerimaan',
                    width: 90,
                    template: function (row) {
                        var status = {
                            1: {
                                'title': 'DITERIMA',
                                'class': 'label-light-success'
                            },
                            2: {
                                'title': 'DITOLAK',
                                'class': 'label-light-danger'
                            }

                        };
                        return '<span class="label font-weight-bold label-lg ' + status[row.Penerimaan].class + ' label-inline">' + status[row.Penerimaan].title + '</span>';
                    },
                },
                {
                    field: 'Pembayaran',
                    title: 'Pembayaran',
                    width: 105,
                    template: function (row) {
                        var status = {
                            0: {
                                'title': 'BELUM BAYAR',
                                'class': 'label-light-danger'
                            },
                            1: {
                                'title': 'SUDAH BAYAR',
                                'class': 'label-light-success'
                            },
                            2: {
                                'title': 'SUDAH BAYAR',
                                'class': 'label-light-success'
                            }

                        };
                        return '<span class="label font-weight-bold label-lg ' + status[row.Pembayaran].class + ' label-inline">' + status[row.Pembayaran].title + '</span>';
                    },
                },
                {
                    field: 'Keterangan',
                    title: 'Keterangan',
                    width: 100,
                    template: function (row) {
                        var status = {
                            lunas: {
                                'title': 'LUNAS',
                                'class': 'label-light-success'
                            },
                            belum_lunas: {
                                'title': 'BELUM LUNAS',
                                'class': 'label-light-danger'
                            },
                            '': {
                                'title': 'BELUM LUNAS',
                                'class': 'label-light-danger'
                            }

                        };
                        return '<span class="label font-weight-bold label-lg ' + status[row.Keterangan].class + ' label-inline">' + status[row.Keterangan].title + '</span>';
                    },
                },
                {
                    field: 'Tanggal',
                    title: 'Tanggal',
                    width: 80,
                    template: function (row) {
                        return '<span class="label font-weight-bold label-lg label-light-default label-inline">' + row.Tanggal + '</span>';
                    }
                },
                {
                    field: 'TA',
                    title: 'TA',
                    width: 70,
                },
            ]
        };


        var localSelectorDemo = function () {
            // enable extension
            options.extensions = {
                // boolean or object (extension options)
                checkbox: true,
            };

            var datatable = $('#kt_datatable_admission_accepted').KTDatatable(options);
            var count_data = null;

            datatable.on(
                    'datatable-on-check datatable-on-uncheck',
                    function (e) {
                        var checkedNodes = $.makeArray(datatable.getSelectedRecords().find('.checkbox-single > [type="checkbox"]').
                                map(function (i, chk) {
                                    return $(chk).val();
                                }));
                        count_data = checkedNodes.join(',');
                    });

            $('#frm-excel').on('submit', function () {
                document.getElementById('id_check_excel').value = count_data;
            });

            $('#frm-form').on('submit', function () {
                document.getElementById('id_check_form').value = count_data;
            });

            $('#frm-files').on('submit', function () {
                document.getElementById('id_check_files').value = count_data;
            });

            $('#kt_datatable_search_grade').on('change', function () {
                datatable.search($(this).val().toLowerCase(), 'Jenjang');
            });

            $('#kt_datatable_search_program').on('change', function () {
                datatable.search($(this).val().toLowerCase(), 'Program');
            });

            $('#kt_datatable_search_gender').on('change', function () {
                datatable.search($(this).val().toLowerCase(), 'JK');
            });

            $('#kt_datatable_search_payment').on('change', function () {
                datatable.search($(this).val().toLowerCase(), 'Pembayaran');
            });

            $('#kt_datatable_search_schoolyear').on('change', function () {
                datatable.search($(this).val().toLowerCase(), 'TA');
            });

            $('#kt_datatable_search_grade', '#kt_datatable_search_program', '#kt_datatable_search_gender', '#kt_datatable_search_payment', '#kt_datatable_search_schoolyear').selectpicker();

        };

        return {
            // Public functions
            init: function () {
                // init dmeo
                localSelectorDemo();
            },
        };
    }();

    jQuery(document).ready(function () {
        KTDatatableHtmlTableDemo.init();
    });

    /******/ })()
        ;
//# sourceMappingURL=html-table.js.map