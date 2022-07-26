<html lang="en">
    <!--begin::Head-->
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $title; ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="canonical" href="<?php echo base_url(); ?>" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/css/pages/login/classic/login-2.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/officer/dist/assets/media/logos/favicon.ico" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.css" rel="stylesheet" type="text/css"  />

        <style>
            .dataTables_scrollBody::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                background-color: #F5F5F5;
                border-radius: 10px;
            }

            .dataTables_scrollBody::-webkit-scrollbar {
                width: 6px;
                background-color: #F5F5F5;
            }

            .dataTables_scrollBody::-webkit-scrollbar-thumb {
                background-color: #777;
                border-radius: 10px;
            }

            .table.table-separate th:last-child, .table.table-separate td:last-child {
                padding-right: 5px !important;
            }
            .table.table-separate th:first-child, .table.table-separate td:first-child{
                padding-left: 5px !important;
            }

            .dropdown-menu > li > a, .dropdown-menu > .dropdown-item {
                outline: none !important;
                display: inline-block;
                flex-grow: 1;
            }

            scroller::-webkit-scrollbar {
                display: none; 
            }

            .swal2-container .swal2-html-container {
                max-height: max-content;
                overflow: auto;
            }
        </style>
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
                <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('<?php echo base_url(); ?>assets/officer/dist/assets/media/bg/bg-3.jpg');">
                    <div class="login-form text-center p-7 position-relative overflow-hidden">
                        <!--begin::Login Header-->
                        <div class="d-flex flex-center mb-3">
                            <div class="text-center">
                                <h3 class="font-mobile display-4 text-warning font-weight-boldest">HISTORI LAPORAN</h3>
                            </div>
                        </div>
                        <!--end::Login Header-->
                        <div class="row flex-center mb-5">
                            <div class="col-6 float-left">
                                <a href="<?php echo site_url('officer/dashboard'); ?>" type="button" class="btn btn-danger float-left font-weight-bold"><li class="fa fa-home "></li> Menu</a>
                            </div>
                            <div class="col-6 float-right">
                                <a onclick="window.history.back();" class="btn btn-light-warning font-weight-bold float-right"><i class="fa fa-backward"></i>Kembali</a>           
                            </div>
                        </div>
                        <div class="login-signin ">
                            <div class="row flex-center ">
                                <!--begin::Stats Widget 6-->
                                <div class="card card-custom card-stretch bg-warning-o-50 mb-5">
                                    <!--begin::Body-->
                                    <div class="card-body d-flex align-items-center py-0 mt-2">
                                        <div class="d-flex flex-column flex-grow-1 py-1 py-lg-5">
                                            <?php
                                            $user = $this->session->userdata('sias-officer');
                                            $word = explode(" ", strip_tags($user[0]->nama_akun));
                                            $limit_word = implode(" ", array_splice($word, 0, 2));
                                            ?>
                                            <a href="#" class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary"><b class="text-danger">Hi, <?php echo strtoupper(strtolower($limit_word)); ?>!</b></a>
                                            <span class=" text-dark-75 font-size-md">
                                                Berikut meurpakan laporan pajak atas nama <b>"<?php echo strtoupper(strtolower($info[0]->nama_wajib_pajak)); ?>"(<?php echo strtoupper(strtolower($info[0]->nomor_nop)); ?>)</b> yang telah Anda laporkan.
                                            </span>
                                        </div>
                                        <img src="<?php echo base_url(); ?>assets/officer/dist/assets/media/svg/avatars/004-boy-1.svg" alt="" class="align-self-end h-100px">
                                    </div>
                                    <!--end::Body-->
                                </div>
                            </div>
                            <div class="row">
                                <?php echo $this->session->flashdata('flash_message'); ?>
                                <!--begin::Entry-->
                                <!--begin::Card-->
                                <div class="card card-custom">
                                    <div class="card-body">
                                        <div class="accordion accordion-toggle-arrow" id="accordionExample4">
                                            <div class="card">
                                                <div class="card-header  bg-warning-o-50 " id="headingOne4">
                                                    <div class="card-title text-dark-75" data-toggle="collapse" data-target="#collapseOne4">
                                                        <i class="flaticon2-search text-dark-75 "></i> Filter Pencarian
                                                    </div>
                                                </div>
                                                <div id="collapseOne4" class="collapse " data-parent="#accordionExample4">
                                                    <div class="card-body">
                                                        <!--begin: Search Form-->
                                                        <form class="mb-1">
                                                            <div class="row mb-lg-6">

                                                                <div class="col-lg-2 mb-lg-0 mb-6 col-6">
                                                                    <label>L. Bumi (M<sup>2</sup>):</label>
                                                                    <input type="text" class="form-control datatable-input" placeholder="Inputkan Luas Bumi" data-col-index="4" />
                                                                </div>
                                                                <div class="col-lg-2 mb-lg-0 mb-6 col-6">
                                                                    <label>L. Bangunan (M<sup>2</sup>):</label>
                                                                    <input type="text" class="form-control datatable-input" placeholder="Inputkan Luas Bangunan" data-col-index="5" />
                                                                </div>
                                                                <div class="col-lg-2 mb-lg-0 mb-6">
                                                                    <label>Total Pembayaran Pajak:</label>
                                                                    <input type="text" class="form-control datatable-input" placeholder="Inputkan Total Pembayaran" data-col-index="6" />
                                                                </div>
                                                                <div class="col-lg-2 mb-lg-0 mb-6 col-6">
                                                                    <label>Tahun Pajak:</label>
                                                                    <input type="text" class="form-control datatable-input" id="kt_datepicker_tahun_pajak" readonly placeholder="Inputkan Tahun Pajak" data-col-index="7" />
                                                                </div>
                                                                <div class="col-lg-2 mb-lg-0 mb-1 mb-6 col-6">
                                                                    <label>Status Pembayaran:</label>
                                                                    <select class="form-control datatable-input" data-col-index="8">
                                                                        <option value="">Pilih Status Pembayaran</option>
                                                                        <option value="LUNAS">Lunas</option>
                                                                        <option value="BELUM BAYAR">Belum Bayar</option>                                           
                                                                    </select>
                                                                </div>


                                                                <div class="col-lg-2 mb-lg-0 mb-1 mb-6">
                                                                    <label>Status Validasi:</label>
                                                                    <select class="form-control datatable-input" data-col-index="9">
                                                                        <option value="">Pilih Status Validasi</option>
                                                                        <option value="DIPROSES">Diproses</option>
                                                                        <option value="DISETUJUI">Disetujui</option>      
                                                                        <option value="DITOLAK">Ditolak</option>      
                                                                    </select>
                                                                </div>

                                                            </div>

                                                            <div class="row text-lg-left text-center">
                                                                <div class="col-lg-9 col-12 mt-lg-3 mt-3">
                                                                    <button class="btn btn-primary btn-primary--icon" id="kt_search">
                                                                        <span>
                                                                            <i class="la la-search"></i>
                                                                            <span>Cari</span>
                                                                        </span>
                                                                    </button>&#160;&#160;
                                                                    <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                                                                        <span>
                                                                            <i class="la la-close"></i>
                                                                            <span>Reset</span>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                                <div class="col-lg-2 text-lg-right text-left col-6 mt-lg-3 mt-6">

                                                                </div>
                                                        </form>     
                                                        <div class="col-lg-1 col-6 text-lg-left text-right mt-lg-3 mt-1">
                                                            <!--                                                <div class="btn-group">
                                                                                                                <button class="btn btn-warning font-weight-bold dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                                                                    <i class="flaticon2-download"></i>
                                                                                                                    Export
                                                                                                                </button>
                                                                                                                <div class="dropdown-menu">
                                                                                                                    <form class="form" id="frm-excel" action="<?php echo site_url('admin/report/export/export_data_csv'); ?>" method="POST">  
                                                                                                                        <input type="text" id="id_check_excel" class="form-control" value="" name="data_check" style="display:none">                         
                                                                                                                        <button class="dropdown-item" role="button" type="submit"><i class="flaticon2-checking"></i> Laporan .csv</button>
                                                                                                                    </form>
                                                                                                                            <form class="form" id="frm-form" action="<?php echo site_url('ppdb/admission/export_student_formulir'); ?>" method="POST">  
                                                                            <input type="text" id="id_check_form" class="form-control" value="" name="data_check" style="display:none">                         
                                                                            <button class="dropdown-item" role="button" type="submit"><i class="flaticon-doc"></i> Laporan .pdf</button>
                                                                            </form>
                                                                                                                </div>
                                                                                                            </div>-->
                                                        </div>
                                                    </div>
                                                    <!--begin: Datatable-->

                                                </div>
                                            </div>
                                        </div>                                         
                                    </div>
                                    <!--begin: Datatable-->
                                    <table class="table table-separate table-hover table-light-success table-checkable font-size-sm " id="kt_datatable">
                                        <thead>
                                            <tr>
                                                <th class="text-center"></th>
                                                <th>Nomor NJOP</th>
                                                <th>NIK Wajib Pajak</th>
                                                <th>Nama Wajib Pajak</th>
                                                <th>L. Bumi (M<sup>2</sup>)</th>
                                                <th>L. Bangunan (M<sup>2</sup>)</th>
                                                <th>Total Bayar</th>
                                                <th>Th Pajak</th>
                                                <th>Status Bayar</th>  
                                                <th>Validasi</th>                                                
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($letter)) {
                                                foreach ($letter as $key => $value) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $value->id_surat; ?></td>
                                                        <td class="font-weight-bolder text-primary"><?php echo (($value->nomor_nop)); ?></td>
                                                        <td class="font-weight-bolder "><?php echo $value->nik_wajib_pajak; ?></td>
                                                        <td class="font-weight-bolder"><?php echo ucwords(strtolower($value->nama_wajib_pajak)); ?></td>
                                                        <td class="font-weight-bolder">
                                                            <?php if ($value->luas_bumi == NULL || $value->luas_bumi == "") { ?>
                                                                0
                                                            <?php } else { ?>
                                                                <?php echo number_format($value->luas_bumi, 0, ',', '.'); ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="font-weight-bolder">
                                                            <?php if ($value->luas_bangunan == NULL || $value->luas_bangunan == "") { ?>
                                                                0
                                                            <?php } else { ?>
                                                                <?php echo number_format($value->luas_bangunan, 0, ',', '.'); ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="font-weight-bolder">
                                                            <?php if ($value->total_pajak_bumi_bangunan == NULL || $value->total_pajak_bumi_bangunan == "") { ?>
                                                                0
                                                            <?php } else { ?>
                                                                <?php echo number_format($value->total_pajak_bumi_bangunan, 0, ',', '.'); ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="font-weight-bolder"><?php echo $value->tahun_pajak; ?></td>
                                                        <td class="font-weight-bolder"><?php echo $value->status_pembayaran_pajak; ?></td>
                                                        <td class="font-weight-bolder "><?php echo $value->status_validasi; ?></td>

                                                        <td nowrap="nowrap">
                                                            <div class="dropdown dropdown-inline">
                                                                <a href="javascript:;" class="btn btn-xs  btn-clean btn-icon btn-outline-primary" data-toggle="dropdown">
                                                                    <i class="la la-cog"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                                    <ul class="nav nav-hover flex-column">
                                                                        <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_bukti_<?php echo paramEncrypt($value->id_surat); ?>"><i class="nav-icon la la-eye "></i><span class="nav-text text-hover-primary font-weight-bold">Lihat Laporan</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }  //ngatur nomor urut
                                            }
                                            ?>         
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th class="font-weight-bolder text-danger"><b>TOTAL</b></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th class="font-weight-bolder text-danger">Dana Eksternal</th>
                                                <th class="font-weight-bolder text-danger">Dana Acc</th>
                                                <th class="font-weight-bolder text-danger"></th>
                                                <th></th>
                                                <th></th>          
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!--end: Datatable-->
                                    <!--end: Datatable-->
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
                    <!--end::Login Sign in form-->
                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
    <?php
    if (!empty($letter)) {
        foreach ($letter as $key => $value) {
            ?> 
            <div class="modal fade" id="modal_bukti_<?php echo paramEncrypt($value->id_surat); ?>" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detial Laporan Surat NJOP</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!--begin::Form-->
                            <form class="form" novalidate="novalidate"enctype="multipart/form-data" method="post" >


                                <div class="row border-bottom">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="font-weight-bolder">NOP</label>
                                            <input type="text" id="kt_input_nop" name="nomor_nop" disabled="" value="<?php echo $value->nomor_nop; ?>" class="form-control form-control-solid form-control-lg"  placeholder="Isikan NOP Surat"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="font-weight-bolder">Tahun</label>
                                            <input type="text" name="tahun_pajak" disabled="" value="<?php echo $value->tahun_pajak; ?>" id="kt_datepicker_tahun" class="input-reset form-control-solid  form-control form-control-lg"  placeholder="Isikan Tahun Pajak"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="font-weight-bolder">NIK/NOPEL</label>
                                            <input type="text" name="nik_wajib_pajak" id="kt_input_nik" disabled="" value="<?php echo $value->nik_wajib_pajak; ?>" class="form-control form-control-solid  form-control-lg"  placeholder="Isikan NIK/NOPEL"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-lg-6 border-right border-left">
                                        <div class="row mt-2">
                                            <div class="col-lg-12">
                                                <h6 class="text-center font-weight-bolder mb-5 mt-5">
                                                    Letak Objek Pajak
                                                </h6>
                                            </div>
                                            <div class="form-group col-lg-12 col-12">
                                                <label>Nama Jalan & Kode Khusus</label>
                                                <textarea class="form-control form-control-solid" disabled="" placeholder="Isikan Nama Jalan dan Kode Khusus" name="letak_objek_pajak" rows="2"><?php echo $value->letak_objek_pajak; ?></textarea>
                                            </div>                                            
                                            <div class="form-group col-lg-6">
                                                <label>Provinsi</label>
                                                <select name="prov_objek_pajak" id="provinsi_ob" disabled="" class="form-control select-dark form-control-lg select2">
                                                    <option value="<?php echo $value->prov_objek_pajak; ?>" selected="">
                                                        <?php echo ucwords(strtolower($value->nama_provinsi_obj)); ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Kabupaten/Kota</label>
                                                <select name="kabkot_objek_pajak" id="kabupaten_kota_ob" disabled="" class="form-control form-control-lg">
                                                    <option value="<?php echo $value->kabkot_objek_pajak; ?>" selected="">
                                                        <?php echo ucwords(strtolower($value->nama_kabupaten_kota_obj)); ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Kecamatan</label>
                                                <select name="kec_objek_pajak" id="kecamatan_ob" disabled="" class="form-control form-control-lg">
                                                    <option value="<?php echo $value->kec_objek_pajak; ?>" selected="">
                                                        <?php echo ucwords(strtolower($value->nama_kecamatan_obj)); ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Kelurahan/Desa</label>
                                                <select name="kel_objek_pajak" id="kelurahan_desa_ob" disabled="" class="form-control form-control-lg">
                                                    <option value="<?php echo $value->kel_objek_pajak; ?>" selected="">
                                                        <?php echo ucwords(strtolower($value->nama_kelurahan_desa_obj)); ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>       
                                    <div class="col-lg-6 border-right border-left">
                                        <div class="row mt-2">
                                            <div class="col-lg-12">
                                                <h6 class="text-center font-weight-bolder mb-5 mt-5">
                                                    Nama dan Alamat Wajib Pajak
                                                </h6>
                                            </div>
                                            <div class="form-group col-lg-7 col-12">
                                                <label>Nama Jalan/Nomor Rumah</label>
                                                <textarea class="form-control" placeholder="Isikan Nama Jalan/ Nomor Rumah" disabled="" name="alamat_wajib_pajak" rows="2"><?php echo $value->alamat_wajib_pajak; ?></textarea>
                                            </div>
                                            <div class="col-lg-5 col-12">
                                                <div class="form-group">
                                                    <label>Nama Pemilik</label>
                                                    <input type="text" name="nama_wajib_pajak" disabled="" value="<?php echo $value->nama_wajib_pajak; ?>" class="form-control  form-control-lg"  placeholder="Isikan Nama Pemilik"/>
                                                </div>
                                            </div>                                            
                                            <div class="form-group col-lg-6">
                                                <label>Provinsi</label>
                                                <select name="prov_wajib_pajak" id="provinsi_pem" disabled="" class="form-control form-control-lg">
                                                    <option value="<?php echo $value->prov_wajib_pajak; ?>" selected="">
                                                        <?php echo ucwords(strtolower($value->nama_provinsi_pem)); ?>
                                                    </option>                                                               
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Kabupaten/Kota</label>
                                                <select name="kabkot_wajib_pajak" id="kabupaten_kota_pem" disabled="" class="form-control form-control-lg">
                                                    <option value="<?php echo $value->kabkot_objek_pajak; ?>" selected="">
                                                        <?php echo ucwords(strtolower($value->nama_kabupaten_kota_pem)); ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Kecamatan</label>
                                                <select name="kec_wajib_pajak" id="kecamatan_pem" disabled="" class="form-control form-control-lg">
                                                    <option value="<?php echo $value->kec_objek_pajak; ?>" selected="">
                                                        <?php echo ucwords(strtolower($value->nama_kecamatan_pem)); ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Kelurahan/Desa</label>
                                                <select name="kel_wajib_pajak" id="kelurahan_desa_pem" disabled="" class="form-control form-control-lg">
                                                    <option value="<?php echo $value->kel_wajib_pajak; ?>" selected="">
                                                        <?php echo ucwords(strtolower($value->nama_kelurahan_desa_pem)); ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>     
                                </div>
                                <div class="border-bottom mt-5 row">
                                    <div class="col-lg-1 d-none d-lg-block">
                                        <div class="form-group text-center">
                                            <label class="font-weight-bolder font-size-h6"></label>
                                            <h6 class="text-center font-weight-bolder mt-7">
                                                Bumi
                                            </h6>
                                            <h6 class="text-center font-weight-bolder mt-15">
                                                Bangunan
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-6 ">
                                        <div class="">
                                            <div class="form-group ">
                                                <div class="text-center">
                                                    <label class="font-weight-bolder font-size-h6">Luas M<sup>2</sup></label>
                                                </div>
                                                <input type="text" name="luas_bumi" disabled="" value="<?php echo $value->luas_bumi; ?>" class="form-control  form-control-lg"  placeholder="Isikan Luas Bumi"/>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-group">                                                
                                                <input type="text" name="luas_bangunan" disabled="" value="<?php echo $value->luas_bangunan; ?>" class="form-control  form-control-lg"  placeholder="Isikan Luas Bangunan"/>
                                            </div>
                                        </div>                                       
                                    </div>        
                                    <div class="col-lg-2 col-6 ">                                        
                                        <div class="">
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <label class="font-weight-bolder font-size-h6 ">Kelas</label>
                                                </div>
                                                <input type="text" name="kelas_bumi" disabled="" value="<?php echo $value->kelas_bumi; ?>" class="form-control  form-control-lg"  placeholder="Isikan Kelas Bumi"/>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-group">                                                
                                                <input type="text" name="kelas_bangunan" disabled="" value="<?php echo $value->kelas_bangunan; ?>" class="form-control  form-control-lg"  placeholder="Isikan Kelas Bangunan"/>
                                            </div>
                                        </div>
                                    </div>     
                                    <div class="col-lg-2 text-center">                                        
                                        <div class="">
                                            <div class="form-group">
                                                <label class="font-weight-bolder font-size-h6">NJOP Per M<sup>2</sup> (RP)</label>
                                                <input type="text" name="harga_meter_njop_bumi" value="<?php echo $value->harga_meter_njop_bumi; ?>" readonly="" value="0" class="form-control  form-control-lg form-control-solid"  placeholder="Isikan Harga/M Bumi"/>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-group">                                                
                                                <input type="text" name="harga_meter_njop_bangunan" value="<?php echo $value->harga_meter_njop_bangunan; ?>" readonly="" value="0" class="form-control  form-control-lg form-control-solid"  placeholder="Isikan Harga/M Bangunan"/>
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="col-lg-2 text-center">                                        
                                        <div class="">
                                            <div class="form-group">
                                                <label class="font-weight-bolder font-size-h6">Total NJOP (RP)</label>
                                                <input type="text" name="total_njop_bumi" value="<?php echo $value->total_njop_bumi; ?>" readonly="" value="0" class="form-control form-control-lg form-control-solid"  placeholder="Isikan Total Bumi"/>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-group">                                                
                                                <input type="text" name="total_njop_bangunan" value="<?php echo $value->total_njop_bangunan; ?>" readonly="" value="0" class="form-control  form-control-lg form-control-solid"  placeholder="Isikan Total Bangunan"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 text-center">                                        
                                        <div class="">
                                            <div class="form-group">
                                                <label class="font-weight-bolder font-size-h6">Bukti Pajak</label><br>
                                                <a href="#" data-toggle="modal" data-target="#modal_foto_<?php echo paramEncrypt($value->id_surat); ?>">
                                                    <img src="<?php echo base_url() . $value->foto_surat; ?>" class="max-h-80px max-w-100" alt="" />
                                                </a>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="mt-5 row">                                
                                    <div class="col-lg-4 text-center"> 
                                        <div class="text-center">
                                            <label class="font-weight-bolder font-size-h6 ">Validasi</label>
                                        </div>
                                        <?php if ($value->status_validasi == 0) { ?>
                                            <p class="font-weight-boldest display-3 mb-1 text-warning text-center">PROSES VALIDASI</p>
                                        <?php } elseif ($value->status_validasi == 1) {
                                            ?>
                                            <p class="font-weight-boldest display-3 mb-1 text-success text-center">DISETUJUI</p>

                                        <?php } elseif ($value->status_validasi == 2) {
                                            ?>
                                            <p class="font-weight-boldest display-3 mb-1 text-danger text-center">DITOLAK</p>
                                            <?php if ($value->keterangan != "" || $value->keterangan != NULL) { ?>
                                                <p class="font-weight-bold mb-1 text-danger text-center"> "<?php echo $value->keterangan; ?>"</p>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group text-right">
                                            <h6 class="text-center font-weight-bolder mt-4">
                                                Pajak yang dibayar (Rp)
                                            </h6>                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-3">                                        
                                        <div class="">
                                            <div class="form-group">
                                                <input type="text" name="total_pajak_bumi_bangunan" disabled="" value="<?php echo number_format($value->total_pajak_bumi_bangunan, 0, ',', '.'); ?>" class="form-control  form-control-lg"  placeholder="Isikan Pajak yang dibayar"/>
                                            </div>
                                        </div>                                       
                                    </div>                                    
                                    <div class="col-lg-3 text-center" > 
                                        <div class="text-center">
                                            <label class="font-weight-bolder font-size-h6 ">Pembayaran</label>
                                        </div>
                                        <div class=" text-center ">
                                            <?php if ($value->status_pembayaran_pajak == 1) { ?>
                                                <p class="font-weight-boldest display-3 mb-1 text-success text-center">LUNAS</p>
                                            <?php } else { ?>
                                                <p class="font-weight-boldest display-4 mb-1 text-danger">BELUM BAYAR</p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>


                            </form>
                            <!--end::Form-->
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }  //ngatur nomor urut
    }
    ?>        
    <div class="whatsapp_chat_support wcs_fixed_right" id="example_1">
        <div class="wcs_button_label">
            Butuh bantuan?
        </div>	
        <div class="wcs_button wcs_button_circle">
            <span class="fa fa-phone"></span>
        </div>	

        <div class="wcs_popup">
            <div class="wcs_popup_close">
                <span class="far fa-times-circle mt-2"></span>
            </div>
            <div class="wcs_popup_header">
                <strong>Butuh bantuan? Kontak Kami </strong>
                <br>
                <div class="wcs_popup_header_description">Pilih salah satu <b>Admin SiNJOP</b> dibawah ini</div>
            </div>	
            <div class="wcs_popup_person_container">
                <?php if ($contact[0]->no_handphone != "" or $contact[0]->no_handphone != NULL) { ?>
                    <div class="wcs_popup_person" data-number="<?php echo "62" . substr($contact[0]->no_handphone, 1); ?>" data-default-msg="Assslamualaikum, permisi mau bertanya?">
                        <div class="wcs_popup_person_img"><img src="<?php echo base_url() . $page[0]->logo_website; ?>" alt=""></div>
                        <div class="wcs_popup_person_content">
                            <div class="wcs_popup_person_name">Admin SiNJOP</div>
                            <div class="wcs_popup_person_description">Petugas SiNJOP Desa</div>
                            <div class="wcs_popup_person_status">Sedang Online</div>
                        </div>	
                    </div>  
                <?php } ?>
            </div>
        </div>
    </div>	
    <!--end::Main-->

    <!--begin::Global Config(global config for global JS scripts)-->
    <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/scripts.bundle.js"></script>

    <script src="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/datatables/datatables.bundle.js"></script> 
    <script src="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/datatables/dataTables.checkboxes.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/pages/crud/datatables/search-options/document-letter.js"></script>

    <!--end::Page Scripts-->
    <script src="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.js"></script>
    <script>
        $('#example_1').whatsappChatSupport();
    </script>
</body>
<!--end::Body-->
</html>