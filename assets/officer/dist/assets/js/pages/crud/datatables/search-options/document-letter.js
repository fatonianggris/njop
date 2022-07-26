/******/ (() => { // webpackBootstrap
    /******/ 	"use strict";
    var __webpack_exports__ = {};
    /*!*******************************************************************************!*\
     !*** ../demo1/src/js/pages/crud/datatables/search-options/advanced-search.js ***!
     \*******************************************************************************/

    var KTDatatablesSearchOptionsAdvancedSearch = function () {

        $.fn.dataTable.Api.register('column().title()', function () {
            return $(this.header()).text().trim();
        });

        var initTable1 = function () {
            // begin first table
            var table = $('#kt_datatable').DataTable({
                responsive: true,
                // Pagination settings
                dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
                // read more: https://datatables.net/examples/basic_init/dom.html
                language: {
                    'lengthMenu': 'Display _MENU_',
                },
                headerCallback: function (row, data, start, end, display) {
                    row.getElementsByTagName('th')[0].innerHTML = `
                    `;
                },
                footerCallback: function (row, data, start, end, display) {

                    var column_lbumi = 4;
                    var column_lbang = 5;
                    var column_tot = 6;

                    var api_lbumi = this.api(), data;
                    var api_lbang = this.api(), data;
                    var api_tot = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ? i.replace(/[\$,.]/g, '') * 1 : typeof i === 'number' ? i : 0;
                    };

                    var pageTotal_lbumi = api_lbumi.column(column_lbumi, {page: 'current'}).data().reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                    var pageTotal_lbang = api_lbang.column(column_lbang, {page: 'current'}).data().reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                    var pageTotal_tot = api_tot.column(column_tot, {page: 'current'}).data().reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                    // Update footer
                    $(api_lbumi.column(column_lbumi).footer()).html(KTUtil.numberString(pageTotal_lbumi.toFixed(0)) + ' M<sup>2</sup>');
                    $(api_lbang.column(column_lbang).footer()).html(KTUtil.numberString(pageTotal_lbang.toFixed(0)) + ' M<sup>2</sup>');
                    $(api_tot.column(column_tot).footer()).html('Rp. ' + KTUtil.numberString(pageTotal_tot.toFixed(0)));
                },
                lengthMenu: [[-1], ["All"]],
                pageLength: -1,
                order: [[1, 'desc']],
                searchDelay: 500,
                scrollY: '60vh',
                scrollX: true,
                scrollCollapse: true,
                processing: true,
                columnDefs: [
                    {
                        targets: 0,
                        orderable: false,
                        width: '0',
                        checkboxes: {
                            'selectRow': false
                        },
                        render: function (data, type, full, meta) {
                            return `
                       `;
                        },
                    },
                    {
                        targets: 1,
                        title: 'NOP & Nama',
                        width: '250',
                        render: function (data, type, full, meta) {

                            var output;

                            var stateNo = KTUtil.getRandomInt(0, 6);
                            var states = [
                                'success',
                                'danger',
                                'success',
                                'warning',
                                'dark',
                                'primary',
                                'info'];

                            var state = states[stateNo];

                            output = `
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50 symbol-light-` + state + `" flex-shrink-0">
                                        <div class="symbol-label font-size-h5">` + full[3].substring(0, 1) + `</div>
                                    </div>
                                    <div class="ml-3">
                                        <span class="text-dark-75 font-weight-bold line-height-sm d-block pb-2">` + full[3] + `</span>
                                        <span class="text-warning text-hover-primary">` + full[1] + `</span>
                                    </div>
                                </div>`;
                            return output;
                        },
                    },
                    {
                        targets: 3,
                        width: '150',
                        orderable: false,
                    },
                    {
                        targets: 4,
                        width: '100',
                        orderable: false,
                    },
                    {
                        targets: 5,
                        width: '130',
                        orderable: false,
                    },
                    {
                        targets: 6,
                        width: '100',
                        orderable: false,
                    },
                    {
                        targets: -1,
                        title: 'Aksi',
                        width: '50',
                        orderable: false,
                    },
                    {
                        targets: 8,
                        width: '100',
                        render: function (data, type, full, meta) {
                            var status = {
                                0: {'title': 'BELUM BAYAR', 'class': 'label-light-danger'},
                                1: {'title': 'LUNAS', 'class': ' label-light-success'},

                            };
                            if (typeof status[data] === 'undefined') {
                                return data;
                            }
                            return '<span class="label label-lg font-weight-bold ' + status[data].class + ' label-inline">' + status[data].title + '</span>';
                        },
                    },
                    {
                        targets: 9,
                        render: function (data, type, full, meta) {
                            var status = {
                                0: {'title': 'DIPROSES', 'class': 'label-light-warning'},
                                1: {'title': 'DISETUJUI', 'class': ' label-light-success'},
                                2: {'title': 'DITOLAK', 'class': ' label-light-danger'},

                            };
                            if (typeof status[data] === 'undefined') {
                                return data;
                            }
                            return '<span class="label label-lg font-weight-bold ' + status[data].class + ' label-inline">' + status[data].title + '</span>';
                        },
                    },
                ],
            });

            $('#kt_search').on('click', function (e) {
                e.preventDefault();
                var params = {};
                $('.datatable-input').each(function () {
                    var i = $(this).data('col-index');
                    if (params[i]) {
                        params[i] += '|' + $(this).val();
                    } else {
                        params[i] = $(this).val();
                    }

                });
                console.log(params);
                $.each(params, function (i, val) {
                    // apply search params to datatable
                    table.column(i).search(val ? val : '', false, false);
                });
                table.table().draw();
            });


            $('#kt_reset').on('click', function (e) {
                e.preventDefault();
                $('.datatable-input').each(function () {
                    $(this).val('');
                    table.column($(this).data('col-index')).search('', false, false);
                });
                table.table().draw();
            });

            $("#kt_datepicker_tahun_pajak").datepicker({
                todayHighlight: true,
                orientation: "bottom left",
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            }).css('z-index', 4000);

            $('#frm-excel').on('submit', function () {
                var rows_selected = table.column(0).checkboxes.selected();
                document.getElementById('id_check_excel').value = rows_selected.join(",");
            });

//                $('#frm-form').on('submit', function () {
//                    document.getElementById('id_check_form').value = count_data;
//                });
//
//                $('#frm-files').on('submit', function () {
//                    document.getElementById('id_check_files').value = count_data;
//                });


        };

        return {

            //main function to initiate the module
            init: function () {
                initTable1();
            },

        };

    }();

    jQuery(document).ready(function () {
        KTDatatablesSearchOptionsAdvancedSearch.init();
    });

    /******/ })()
        ;
//# sourceMappingURL=advanced-search.js.map