<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    <head><base href="../../../../">
        <meta charset="utf-8" />
        <title>Login Page | Petugas NJOP</title>
        <meta name="description" content="Login page example" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="canonical" href="https://keenthemes.com/metronic" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/css/pages/login/classic/login-4.css" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
        <!--end::Layout Themes-->
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.css" rel="stylesheet" type="text/css"  />

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/officer/dist/assets/media/logos/favicon.ico" />
    </head>
    <!--end::Head-->
    <?php $user = $this->session->userdata('sias-officer'); ?>
    <!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
                <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('<?php echo base_url(); ?>assets/officer/dist/assets/media/bg/bg-3.jpg');">
                    <div class="login-form text-center p-7 position-relative overflow-hidden">
                        <!--begin::Login Header-->
                        <div class="d-flex flex-center mb-3">
                            <div class="text-center">
                                <h3 class="font-mobile display-4 text-warning font-weight-boldest">HALAMAN DASBOARD</h3>
                            </div>
                        </div>
                        <!--end::Login Header-->
                        <!--begin::Stats Widget 6-->
                        <div class="card card-custom card-stretch bg-warning-o-50 mb-5">
                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-center py-0 mt-2">
                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
                                    <?php
                                    $user = $this->session->userdata('sias-officer');
                                    $word = explode(" ", strip_tags($user[0]->nama_akun));
                                    $limit_word = implode(" ", array_splice($word, 0, 2));
                                    ?>
                                    <a href="#" class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary"><b class="text-danger">Hi, <?php echo strtoupper(strtolower($limit_word)); ?>!</b></a>
                                    <span class=" text-dark-75 font-size-md">
                                        Berikut merupakan halaman dashboard terkait perolehan kinerja Anda.
                                    </span>
                                </div>
                                <img src="<?php echo base_url(); ?>assets/officer/dist/assets/media/svg/avatars/004-boy-1.svg" alt="" class="align-self-end h-100px">
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 6-->
                        <div class="col-12">
                            <div class="row mb-5">
                                <div class="card card-custom col-6  bg-success-o-50" >
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-dark-50 font-weight-bolder">LUNAS</div>
                                            <div class="font-weight-bolder font-size-h3">
                                                <?php if ($total_pembayaran[0]->lunas == NULL || $total_pembayaran[0]->lunas == "") { ?>
                                                    0
                                                <?php } else { ?>
                                                    <?php echo $total_pembayaran[0]->lunas; ?>
<?php } ?>
                                            </div>
                                        </div>
                                        <!--end::Stats-->

                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--begin:: form-->
                                <!--end::Stats Widget 6-->
                                <div class="card card-custom col-6  bg-danger-o-50" >
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-dark-50 font-weight-bolder">BELUM BAYAR</div>
                                            <div class="font-weight-bolder font-size-h3">
                                                <?php if ($total_pembayaran[0]->belum_bayar == NULL || $total_pembayaran[0]->belum_bayar == "") { ?>
                                                    0
                                                <?php } else { ?>
                                                    <?php echo $total_pembayaran[0]->belum_bayar; ?>
<?php } ?>
                                            </div>
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--begin:: form-->
                            </div>

                            <div class="row mb-5">
                                <div class="card card-custom col-4 bg-success-o-50" >
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-dark-50 font-weight-bolder">DISETUJUI</div>
                                            <div class="font-weight-bolder font-size-h3">
                                                <?php if ($status_surat[0]->disetujui == NULL || $status_surat[0]->disetujui == "") { ?>
                                                    0
                                                <?php } else { ?>
                                                    <?php echo $status_surat[0]->disetujui; ?>
<?php } ?>
                                            </div>
                                        </div>
                                        <!--end::Stats-->

                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--begin:: form-->
                                <div class="card card-custom col-4 bg-warning-o-50" >
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-dark-50 font-weight-bolder">DIPROSES</div>
                                            <div class="font-weight-bolder font-size-h3">
                                                <?php if ($status_surat[0]->diproses == NULL || $status_surat[0]->diproses == "") { ?>
                                                    0
                                                <?php } else { ?>
                                                    <?php echo $status_surat[0]->diproses; ?>
<?php } ?>
                                            </div>
                                        </div>
                                        <!--end::Stats-->

                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--begin:: form-->
                                <!--end::Stats Widget 6-->
                                <div class="card card-custom col-4  bg-danger-o-50" >
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="flex-grow-1">
                                            <div class="text-dark-50 font-weight-bolder">DITOLAK</div>
                                            <div class="font-weight-bolder font-size-h3">
                                                <?php if ($status_surat[0]->ditolak == NULL || $status_surat[0]->ditolak == "") { ?>
                                                    0
                                                <?php } else { ?>
                                                    <?php echo $status_surat[0]->ditolak; ?>
<?php } ?>
                                            </div>
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--begin:: form-->
                            </div>
                        </div>
                        <div class="login-signin">
                            <div class="mb-5">

                                <h1 class="font-weight-bolder text-warning">Panel Menu</h1>
                                <div class="text-danger font-weight-bold">Silahkan pilih menu aktifitas dibawah ini:</div>
                            </div>
<?php echo $this->session->flashdata('flash_message'); ?>
                            <div class="row">
                                <div class="col-xl-6 col-6 ">
                                    <!--begin::Tiles Widget 12-->
                                    <div class="card card-custom gutter-b text-center bg-primary" >
                                        <div class="card-body ">
                                            <span class="svg-icon svg-icon-3x svg-icon-white ">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M8.95128003,13.8153448 L10.9077535,13.8153448 L10.9077535,15.8230161 C10.9077535,16.0991584 11.1316112,16.3230161 11.4077535,16.3230161 L12.4310522,16.3230161 C12.7071946,16.3230161 12.9310522,16.0991584 12.9310522,15.8230161 L12.9310522,13.8153448 L14.8875257,13.8153448 C15.1636681,13.8153448 15.3875257,13.5914871 15.3875257,13.3153448 C15.3875257,13.1970331 15.345572,13.0825545 15.2691225,12.9922598 L12.3009997,9.48659872 C12.1225648,9.27584861 11.8070681,9.24965194 11.596318,9.42808682 C11.5752308,9.44594059 11.5556598,9.46551156 11.5378061,9.48659872 L8.56968321,12.9922598 C8.39124833,13.2030099 8.417445,13.5185067 8.62819511,13.6969416 C8.71848979,13.773391 8.8329684,13.8153448 8.95128003,13.8153448 Z" fill="#000000"/>
                                                </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <div class="font-weight-bolder font-size-sm mt-3 text-white">Setor Laporan NJOP Pajak</div>
                                            <a href="#"  data-toggle="modal" data-target="#modal_add_letter" class="btn btn-light-warning btn-shadow-hover font-weight-bold mt-3"><i class="fa fa-upload"></i> Setor</a>

                                        </div>
                                    </div>
                                    <!--end::Tiles Widget 12-->
                                </div>
                                <div class="col-xl-6 col-6">
                                    <!--begin::Tiles Widget 12-->
                                    <div class="card card-custom gutter-b text-center bg-primary" >
                                        <div class="card-body">
                                            <span class="svg-icon svg-icon-3x svg-icon-white">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/>
                                                <path d="M10.5,10.5 L10.5,9.5 C10.5,9.22385763 10.7238576,9 11,9 C11.2761424,9 11.5,9.22385763 11.5,9.5 L11.5,10.5 L12.5,10.5 C12.7761424,10.5 13,10.7238576 13,11 C13,11.2761424 12.7761424,11.5 12.5,11.5 L11.5,11.5 L11.5,12.5 C11.5,12.7761424 11.2761424,13 11,13 C10.7238576,13 10.5,12.7761424 10.5,12.5 L10.5,11.5 L9.5,11.5 C9.22385763,11.5 9,11.2761424 9,11 C9,10.7238576 9.22385763,10.5 9.5,10.5 L10.5,10.5 Z" fill="#000000" opacity="0.3"/>
                                                </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <div class="text-white font-weight-bolder font-size-sm mt-3">Cek Laporan NJOP Pajak</div>
                                            <a href="#" data-toggle="modal" data-target="#modal_list_letter"  class="btn btn-light-warning btn-shadow-hover font-weight-bold mt-3"><i class="fa fa-search-plus"></i> Cek</a>

                                        </div>
                                    </div>
                                    <!--end::Tiles Widget 12-->
                                </div> 

                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-6 ">
                                    <!--begin::Tiles Widget 12-->
                                    <div class="card card-custom gutter-b text-center bg-primary" >
                                        <div class="card-body ">
                                            <span class="svg-icon svg-icon-3x svg-icon-white ">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                                </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <div class="font-weight-bolder font-size-sm mt-3 text-white">Daftar Surat NJOP Pajak</div>
                                            <a href="<?php echo site_url('officer/report/list_letter_document') ?>" class="btn btn-light-warning btn-shadow-hover font-weight-bold mt-3"><i class="fa fa-eye"></i> Lihat</a>

                                        </div>
                                    </div>
                                    <!--end::Tiles Widget 12-->
                                </div>
                                <div class="col-xl-6 col-6">
                                    <!--begin::Tiles Widget 12-->
                                    <div class="card card-custom gutter-b text-center bg-primary">
                                        <div class="card-body">
                                            <span class="svg-icon svg-icon-3x svg-icon-white">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                                </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <div class="text-white font-weight-bolder font-size-sm mt-3">Ubah Biodata Profil Anda</div>
                                            <a href="<?php echo site_url('officer/settings/account/edit_profile') ?>" class="btn btn-light-warning btn-shadow-hover font-weight-bold mt-3"><i class="fas fa-pencil-ruler"></i> Ubah</a>

                                        </div>
                                    </div>
                                    <!--end::Tiles Widget 12-->
                                </div> 

                            </div>
                            <div class="text-center">
                                <a href="<?php echo site_url('officer/auth/logout'); ?>" type="button" class="btn btn-warning font-weight-bold px-9 py-4 my-3 mx-4 mt-1"><li class="fas fa-door-open font-size-h4"></li> Keluar</a>
                            </div>
                            <!--end::form-->  
                            <div class="mt-5 text-center">
                                <span class="mr-1 text-dark-75">2021©</span>
                                <a href="" target="_blank" class="text-dark-75 text-hover-primary">Acitya Technology</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--end::Login-->
        </div>
        <!--end::Main-->
        <div class="modal fade" id="modal_add_letter"  data-keyboard="false" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content" id="kt_form">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cek Setor Laporan Surat Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form class="form" method="POST" action="<?php echo site_url('officer/report/check_letter_document'); ?>" id="kt_check_letter">
                        <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="modal-body">                   
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="form-group">
                                        <label class="font-weight-bolder">NOP</label>             
                                        <input type="text" id="kt_input_nop_cek" name="nomor_nop" class="form-control form-control-lg " placeholder="Inputkan NOP Surat" >
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan NOP Surat terdiri dari 18 digit</span>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label class="font-weight-bolder">Tahun Pajak</label>
                                        <input type="text" name="tahun_pajak" readonly="" id="kt_datepicker_tahun_cek" class="input-reset form-control form-control-lg"  placeholder="Tahun Pajak"/>
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Tahun Pajak</span>               
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-wizard-type="action-submit"  class="btn btn-success font-weight-bold mr-2" >Check</button>
                            <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal_list_letter"  data-keyboard="false" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content" id="kt_form_nop">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cek Riwayat Laporan Surat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form class="form" method="POST" action="<?php echo site_url('officer/report/check_nop_letter'); ?>" id="kt_check_nop_letter">
                        <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="modal-body">                   
                            <div class="row">
                                <div class="col-xl-2">
                                </div> 
                                <div class="col-xl-8">
                                    <div class="form-group">
                                        <label class="font-weight-bolder">NOP</label>             
                                        <input type="text" id="kt_input_nop" name="nomor_nop_cek" class="form-control form-control-lg " placeholder="Inputkan NOP Surat" >
                                        <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan NOP Surat terdiri dari 18 digit</span>
                                    </div>
                                </div> 
                                <div class="col-xl-2">
                                </div> 
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-wizard-type="action-submit"  class="btn btn-success font-weight-bold mr-2" >Check</button>
                            <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

        <script>var HOST_URL = "<?php echo base_url(); ?>";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/global/plugins.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/scripts.bundle.js"></script>
        <!--end::Global Theme Bundle-->
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/pages/custom/login/check_letter_njop.js"></script>
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/pages/custom/login/check_nop.js"></script>
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/pages/crud/forms/widgets/jquery-mask.js"></script>
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>

        <!--begin::Page Scripts(used by this page)-->
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/pages/custom/login/login-officer.js"></script>
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.js"></script>

        <!--end::Page Scripts-->

        <script>
            $('#example_1').whatsappChatSupport();
        </script>
    </body>
    <!--end::Body-->
</html>