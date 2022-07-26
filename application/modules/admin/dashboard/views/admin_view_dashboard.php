<!--begin::Content-->
<?php $user = $this->session->userdata('sias-admin'); ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">

                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Detail Dashboard Admin</a>
                        </li>                       
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="top">
                <a onclick="window.history.back();" class="btn btn-light-danger btn-sm font-weight-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-backward"></i>Kembali</a>           
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Notice-->
            <div class="row ">
                <div class="col-lg-4">
                    <!--begin::Stats Widget 28-->
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <!--begin::Engage Widget 2-->
                            <div class="card card-custom mb-7">
                                <div class="card-body d-flex p-0">
                                    <div class="flex-grow-1 bg-success p-5 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%; background-image: url(<?php echo base_url(); ?>assets/ppdb/dist/assets/media/svg/icons/home/door-open.svg);">
                                        <h4 class="text-inverse-danger font-weight-bolder">Aktifkan Klien</h4>
                                        <p class="text-inverse-danger my-2">Mode Pengisiam oleh Klien</p>
                                        <?php if ($page[0]->status_klien == 1) { ?>
                                            <input data-switch="true" class="ppdb_swicth" data-size="small" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" />
                                        <?php } else { ?>
                                            <input data-switch="true" class="ppdb_swicth" data-size="small" type="checkbox" data-on-color="success" data-off-color="danger" />
                                        <?php } ?>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Engage Widget 2-->
                        <!--end::Card-->
                        <div class="col-lg-6 col-6">
                            <!--begin::Engage Widget 2-->
                            <div class="card card-custom mb-7">
                                <div class="card-body d-flex p-0">
                                    <div class="flex-grow-1 bg-primary p-5 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.8rem) bottom;background-size: auto 50%;background-image: url(<?php echo base_url(); ?>assets/ppdb/dist/assets/media/svg/icons/files/uploaded-file.svg);">
                                        <h4 class="text-inverse-danger font-weight-bolder">Setor Surat</h4>
                                        <p class="text-inverse-danger my-2">Klik untuk setor laporan</p>
                                        <button class="btn btn-warning font-weight-bold btn-sm" type="button" data-toggle="modal" data-target="#modal_add_letter">
                                            <i class="flaticon2-plus-1"></i>
                                            Unggah
                                        </button>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Engage Widget 2-->
                        <div class="col-lg-6 ">
                            <!--begin::Tiles Widget 11-->
                            <div class="card card-custom bg-info gutter-b" >
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3 text-white">
                                        <?php if ($total_akun_surat[0]->total_surat == NULL || $total_akun_surat[0]->total_surat == "") { ?>
                                            0
                                        <?php } else { ?>
                                            <?php echo $total_akun_surat[0]->total_surat; ?>
                                        <?php } ?>
                                    </div>
                                    <a href="#" class="text-inverse-primary font-weight-bold font-size-lg mt-1 text-white">TOTAL LAPORAN SURAT</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>
                        <!--end::Stats Widget 25-->
                        <div class="col-lg-6 ">
                            <!--begin::Stats Widget 26-->                    
                            <div class="card card-custom bg-warning gutter-b">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3 text-white">
                                        <?php if ($total_akun_surat[0]->total_akun == NULL || $total_akun_surat[0]->total_akun == "") { ?>
                                            0
                                        <?php } else { ?>
                                            <?php echo $total_akun_surat[0]->total_akun; ?>
                                        <?php } ?>
                                    </div>
                                    <a href="#" class="text-inverse-primary font-weight-bold font-size-lg mt-1 text-white">TOTAL AKUN ADMIN</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>

                    </div>
                    <!--end::Stats Widget 26-->
                    <div class="row">
                        <!--end::Stats Widget 25-->
                        <div class="col-lg-6 ">
                            <!--begin::Stats Widget 26-->                    
                            <div class="card card-custom bg-success gutter-b">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                                        <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000"/>
                                        </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3 text-white">
                                        <?php if ($total_pembayaran[0]->lunas == NULL || $total_pembayaran[0]->lunas == "") { ?>
                                            0
                                        <?php } else { ?>
                                            <?php echo $total_pembayaran[0]->lunas; ?>
                                        <?php } ?>
                                    </div>
                                    <a href="#" class="text-inverse-primary font-weight-bold font-size-lg mt-1 text-white">TOTAL LUNAS</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>
                        <!--end::Stats Widget 26-->
                        <!--end::Stats Widget 25-->
                        <div class="col-lg-6 ">
                            <!--begin::Stats Widget 26-->                    
                            <div class="card card-custom bg-danger gutter-b">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                                        <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000" transform="translate(12.000000, 15.499947) scale(1, -1) translate(-12.000000, -15.499947) "/>
                                        </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3 text-white">
                                        <?php if ($total_pembayaran[0]->belum_bayar == NULL || $total_pembayaran[0]->belum_bayar == "") { ?>
                                            0
                                        <?php } else { ?>
                                            <?php echo $total_pembayaran[0]->belum_bayar; ?>
                                        <?php } ?>
                                    </div>
                                    <a href="#" class="text-inverse-primary font-weight-bold font-size-lg mt-1 text-white">TOTAL BELUM BAYAR</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>
                    </div>
                    <!--end::Stats Widget 26-->  
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-7 col-12">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b">
                                <!--begin::Header-->
                                <div class="card-header h-auto">
                                    <!--begin::Title-->
                                    <div class="card-title py-5">
                                        <h3 class="card-label">Grafik Laporan Surat Tiap 3 Tahun</h3>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <div class="card-body">
                                    <!--begin::Chart-->
                                    <div id="chart_letter"></div>
                                    <!--end::Chart-->
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                        <div class="col-lg-5 col-12">
                            <!--begin::Card-->
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="card card-custom mt-0">
                                        <!--begin::Header-->
                                        <div class="card-header h-auto">
                                            <!--begin::Title-->
                                            <div class="card-title py-5">
                                                <h3 class="card-label">Persentase Luas (M<sup>2</sup>)</h3>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Header-->
                                        <div class="card-body">
                                            <!--begin::Chart-->
                                            <div id="pie_chart_letter" class="d-flex justify-content-center"></div>
                                            <!--end::Chart-->
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <div class="col-lg-12 mt-8">
                                    <!--begin::Tiles Widget 11-->
                                    <div class="card card-custom bg-dark gutter-b" >
                                        <div class="card-body">
                                            <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
                                                <rect fill="#000000" x="2" y="8" width="20" height="3"/>
                                                <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
                                                </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3 text-white">
                                                <?php if ($pie_chart_letter[0]->total_pajak == NULL || $pie_chart_letter[0]->total_pajak == "") { ?>
                                                    Rp. 0
                                                <?php } else { ?>
                                                    Rp. <?php echo number_format($pie_chart_letter[0]->total_pajak, 0, ',', '.'); ?>
                                                <?php } ?>
                                            </div>
                                            <a href="#" class="text-inverse-primary font-weight-bold font-size-lg mt-1 text-white">TOTAL PEMBAYARAN PAJAK</a>
                                        </div>
                                    </div>
                                    <!--end::Tiles Widget 11-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
    <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</div>
<!--end::Content-->
<?php
$arr_lunas = [];
$arr_belum_lunas = [];
$arr_tahun = [];

if (!empty($chart_letter)) {
    foreach ($chart_letter as $key => $values) {
        $arr_lunas[] = $values->lunas;
        $arr_belum_lunas[] = $values->belum_lunas;
        $arr_tahun[] = $values->tahun_pajak;
    }
}
?>  

<script>
    var csrfName = $('.txt_csrfname').attr('name');
    var csrfHash = $('.txt_csrfname').val(); // CSRF hash

    var pro = $(".ppdb_swicth").bootstrapSwitch();
    pro.on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            Swal.fire({
                title: "Peringatan!",
                text: "Apakah anda yakin ingin MENGAKTIFKAN MODE KLIEN Sekarang?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#1BC5BD",
                confirmButtonText: "Ya, Aktifkan!",
                cancelButtonText: "Tidak, batal!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo site_url("admin/dashboard/change_status_client") ?>",
                        data: {id: '<?php echo paramEncrypt(1); ?>', [csrfName]: csrfHash},
                        dataType: 'html',
                        success: function (result) {
                            Swal.fire("Diaktifkan!", "Mode Pengisian oleh Klien telah diaktifkan!.", "success");
                        },
                        error: function (result) {
                            console.log(result);
                            Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
                        }
                    });
                } else {
                    pro.bootstrapSwitch('state', false);
                    Swal.fire("Dibatalkan!", "Mode Pengisian oleh Klien batal diaktifkan.", "error");
                }
            });
        } else {
            Swal.fire({
                title: "Peringatan!",
                text: "Apakah anda yakin ingin NONAKTIFKAN MODE KLIEN Sekarang?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Non Aktifkan!",
                cancelButtonText: "Tidak, batal!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo site_url("admin/dashboard/change_status_client") ?>",
                        data: {id: '<?php echo paramEncrypt(0); ?>', [csrfName]: csrfHash},
                        dataType: 'html',
                        success: function (result) {
                            Swal.fire("Dinonaktifkan!", "Mode Pengisian oleh Klien telah dinonaktifkan!.", "success");
                        },
                        error: function (result) {
                         
                            Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
                        }
                    });
                } else {
                    pro.bootstrapSwitch('state', true);
                    Swal.fire("Dibatalkan!", "Mode Pengisian oleh Klien batal dinonaktifkan.", "error");
                }
            });
        }
    });
</script>

<script>
    var lunas = [<?php echo implode(',', $arr_lunas) ?>];
    var belum_lunas = [<?php echo implode(',', $arr_belum_lunas) ?>];
    var tahun = [<?php echo implode(',', $arr_tahun) ?>];

    "use strict";
// Shared Colors Definition
    const primary = '#6993FF';
    const success = '#1BC5BD';
    const info = '#8950FC';
    const warning = '#FFA800';
    const danger = '#F64E60';
    const dark = '#000000';
    const grey = '#808080';
    const yellow = '#ffff00';

    var KTApexChartsDemo = function () {
        // Private functions

        var _demo1 = function () {
            const apexChart = "#chart_letter";
            var options = {
                series: [{
                        name: 'LUNAS',
                        data: lunas
                    }, {
                        name: 'BELUM BAYAR',
                        data: belum_lunas
                    }, ],
                chart: {
                    type: 'bar',
                    height: 341
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '70%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: tahun,
                },
                yaxis: {
                    title: {
                        text: 'Total Laporan'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return "" + val.toLocaleString("id-ID") + " Laporan"
                        }
                    }
                },
                colors: [success, danger, ]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        };

        var surat = [<?php echo $pie_chart_letter[0]->luas_bumi; ?>, <?php echo $pie_chart_letter[0]->luas_bangunan; ?>];

        var _demo2 = function () {
            const apexChart = "#pie_chart_letter";
            var options = {
                series: surat,
                chart: {
                    width: 357,
                    type: 'pie',
                },
                labels: ['Luas Bumi', 'Luas Bangunan'],
                responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 380,

                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }],
                colors: [primary, success]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }

        return {
            // public functions
            init: function () {

                _demo1();
                _demo2();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTApexChartsDemo.init();
    });
</script>
