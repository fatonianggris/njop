<html lang="en">
    <!--begin::Head-->
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?> </title>
        <meta name="description" content="<?php echo $title; ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="canonical" href="<?php echo base_url(); ?>" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/css/pages/login/classic/login-2.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/css/pages/wizard/wizard-2.css" rel="stylesheet" type="text/css">

        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/css/pages/fonts/dropify.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/officer/dist/assets/media/logos/favicon.ico" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.css" rel="stylesheet" type="text/css"  />

        <style>

            .select2-container {
                box-sizing: border-box;
                display: block;
                margin: 0;
                position: relative;
                vertical-align: middle;
            }
            .select2-container--default .select2-selection--single,
            .select2-container--default .select2-selection--multiple {
                display: flex;
                align-items: center;
                justify-content: space-between;
                border: 1px solid #E4E6EF;
                outline: none !important;
                border-radius: 0.42rem;
                height: auto;
                line-height: 0;
                padding: 0.23rem 0.42rem;
                background: #F3F6F9;
            }

            .blockquote {
                margin-bottom: 1rem;
                font-size: 1rem;
            }

            .select2-container--default.select2-container--disabled .select2-selection--multiple, .select2-container--default.select2-container--disabled .select2-selection--single {
                cursor: not-allowed;
                background-color: #f3f6f9;
                opacity: 1;
            }

            .blockMsg {
                max-width: 75px;
            }


            .hydrated {
                display: inherit;
                visibility: inherit;  
                height: fit-content;               
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
                    <div class="login-form p-7 position-relative overflow-hidden">
                        <!--begin::Login Header-->
                        <div class="d-flex flex-center mb-3">
                            <div class="text-center">
                                <h3 class="font-mobile display-4 text-warning font-weight-boldest">FORMULIR LAPORAN</h3>
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
                        <!--end::Login Header-->
                        <div class="row flex-center ">
                            <!--begin::Stats Widget 6-->
                            <div class="card card-custom card-stretch bg-warning-o-50 mb-5 text-center">
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
                                            Silahakan mengisi formulir Surat, Berikut merupakan kolom formulir pengisian laporan
                                        </span>
                                    </div>
                                    <img src="<?php echo base_url(); ?>assets/officer/dist/assets/media/svg/avatars/004-boy-1.svg" alt="" class="align-self-end h-100px">
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                        <!--begin::Entry-->
                        <div class="d-flex flex-column flex-root">
                            <!--begin::Container-->
                            <!--begin::Notice-->
                            <?php echo $this->session->flashdata('flash_message'); ?>
                            <!--end::Notice-->
                            <div class="row">
                                <div class="card card-custom bg-success-o-50 ">
                                    <div class="alert alert-custom alert-light-warning shadow-sm fade show mb-7" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                        <div class="alert-text text-dark">
                                            <h4 class="alert-heading font-weight-bolder">Peringatan!</h4>
                                            <b>MOHON DIPERHATIKAN!</b>, Pengisian <b>OTOMATIS</b> Data <b>PROVINSI & KABUPATEN</b> letak objek pajak sesuai dengan 4 digit NOP (<b>35.05</b>.120.002.006.0017.0).<br> Silahkan melakukan <b>PERUBAHAN</b> jika inputan <b>TIDAK SESUAI</b> dengan bukti laporan yang akan Anda inputkan sekarang. Terima Kasih.
                                        </div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <!--begin: Wizard-->
                                        <div class="wizard wizard-2" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
                                            <!--begin: Wizard Nav-->
                                            <div class="wizard-nav border-right py-5 px-5 py-lg-15 px-lg-10">
                                                <!--begin::Wizard Step 1 Nav-->
                                                <div class="wizard-steps">
                                                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                                        <div class="wizard-wrapper">
                                                            <div class="wizard-icon">
                                                                <span class="svg-icon svg-icon-2x">
                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                    <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero"/>
                                                                    </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </div>
                                                            <div class="wizard-label">
                                                                <h3 class="wizard-title">ID Surat</h3>
                                                                <div class="wizard-desc">Masukan ID Surat NJOP</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Wizard Step 1 Nav-->
                                                    <!--begin::Wizard Step 2 Nav-->
                                                    <div class="wizard-step" data-wizard-type="step" >
                                                        <div class="wizard-wrapper">
                                                            <div class="wizard-icon">
                                                                <span class="svg-icon svg-icon-2x">
                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Compass.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/>
                                                                    </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </div>
                                                            <div class="wizard-label">
                                                                <h3 class="wizard-title">Letak Objek Pajak</h3>
                                                                <div class="wizard-desc">Tambahkan Data Posisi Objek</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Wizard Step 2 Nav-->
                                                    <!--begin::Wizard Step 3 Nav-->
                                                    <div class="wizard-step" data-wizard-type="step" >
                                                        <div class="wizard-wrapper">
                                                            <div class="wizard-icon">
                                                                <span class="svg-icon svg-icon-2x">
                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000"/>
                                                                    </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </div>
                                                            <div class="wizard-label">
                                                                <h3 class="wizard-title">Alamat Wajib Pajak</h3>
                                                                <div class="wizard-desc">Tambahkan Data Alamat Pemilik</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Wizard Step 3 Nav-->
                                                    <!--begin::Wizard Step 4 Nav-->
                                                    <div class="wizard-step" data-wizard-type="step" >
                                                        <div class="wizard-wrapper">
                                                            <div class="wizard-icon">
                                                                <span class="svg-icon svg-icon-2x">
                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <rect fill="#000000" opacity="0.3" x="4" y="4" width="16" height="16" rx="2"/>
                                                                    <rect fill="#000000" opacity="0.3" x="9" y="9" width="6" height="6"/>
                                                                    <path d="M20,7 L21,7 C21.5522847,7 22,7.44771525 22,8 L22,8 C22,8.55228475 21.5522847,9 21,9 L20,9 L20,7 Z" fill="#000000"/>
                                                                    <path d="M20,11 L21,11 C21.5522847,11 22,11.4477153 22,12 L22,12 C22,12.5522847 21.5522847,13 21,13 L20,13 L20,11 Z" fill="#000000"/>
                                                                    <path d="M20,15 L21,15 C21.5522847,15 22,15.4477153 22,16 L22,16 C22,16.5522847 21.5522847,17 21,17 L20,17 L20,15 Z" fill="#000000"/>
                                                                    <path d="M3,7 L4,7 L4,9 L3,9 C2.44771525,9 2,8.55228475 2,8 L2,8 C2,7.44771525 2.44771525,7 3,7 Z" fill="#000000"/>
                                                                    <path d="M3,11 L4,11 L4,13 L3,13 C2.44771525,13 2,12.5522847 2,12 L2,12 C2,11.4477153 2.44771525,11 3,11 Z" fill="#000000"/>
                                                                    <path d="M3,15 L4,15 L4,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,16 C2,15.4477153 2.44771525,15 3,15 Z" fill="#000000"/>
                                                                    </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </div>
                                                            <div class="wizard-label">
                                                                <h3 class="wizard-title">Nominal & Spesifikasi</h3>
                                                                <div class="wizard-desc">Nominal & Sepesifikasi Objek</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Wizard Step 4 Nav-->
                                                    <!--begin::Wizard Step 5 Nav-->
                                                    <div class="wizard-step" data-wizard-type="step" >
                                                        <div class="wizard-wrapper">
                                                            <div class="wizard-icon">
                                                                <span class="svg-icon svg-icon-2x">
                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                    <rect fill="#000000" opacity="0.3" x="11" y="2" width="2" height="14" rx="1"/>
                                                                    <path d="M12.0362375,3.37797611 L7.70710678,7.70710678 C7.31658249,8.09763107 6.68341751,8.09763107 6.29289322,7.70710678 C5.90236893,7.31658249 5.90236893,6.68341751 6.29289322,6.29289322 L11.2928932,1.29289322 C11.6689749,0.916811528 12.2736364,0.900910387 12.6689647,1.25670585 L17.6689647,5.75670585 C18.0794748,6.12616487 18.1127532,6.75845471 17.7432941,7.16896473 C17.3738351,7.57947475 16.7415453,7.61275317 16.3310353,7.24329415 L12.0362375,3.37797611 Z" fill="#000000" fill-rule="nonzero"/>
                                                                    </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </div>
                                                            <div class="wizard-label">
                                                                <h3 class="wizard-title">Upload Berkas</h3>
                                                                <div class="wizard-desc">Upload Bukti Surat NJOP</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Wizard Step 5 Nav-->
                                                    <!--begin::Wizard Step 6 Nav-->
                                                    <div class="wizard-step" data-wizard-type="step" >
                                                        <div class="wizard-wrapper">
                                                            <div class="wizard-icon">
                                                                <span class="svg-icon svg-icon-2x">
                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M11,3 L11,11 C11,11.0862364 11.0109158,11.1699233 11.0314412,11.2497543 C10.4163437,11.5908673 10,12.2468125 10,13 C10,14.1045695 10.8954305,15 12,15 C13.1045695,15 14,14.1045695 14,13 C14,12.2468125 13.5836563,11.5908673 12.9685588,11.2497543 C12.9890842,11.1699233 13,11.0862364 13,11 L13,3 L17.7925828,12.5851656 C17.9241309,12.8482619 17.9331722,13.1559315 17.8173006,13.4262985 L15.1298744,19.6969596 C15.051085,19.8808016 14.870316,20 14.6703019,20 L9.32969808,20 C9.12968402,20 8.94891496,19.8808016 8.87012556,19.6969596 L6.18269936,13.4262985 C6.06682778,13.1559315 6.07586907,12.8482619 6.2074172,12.5851656 L11,3 Z" fill="#000000"/>
                                                                    <path d="M10,21 L14,21 C14.5522847,21 15,21.4477153 15,22 L15,23 L9,23 L9,22 C9,21.4477153 9.44771525,21 10,21 Z" fill="#000000" opacity="0.3"/>
                                                                    </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </div>
                                                            <div class="wizard-label">
                                                                <h3 class="wizard-title">Pernyataan dan Persetujuan</h3>
                                                                <div class="wizard-desc">Konfirmasi Pernyataan dan Persetujuan</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Wizard Step 6 Nav-->
                                                </div>
                                            </div>
                                            <!--end: Wizard Nav-->
                                            <!--begin: Wizard Body-->
                                            <div class="wizard-body py-5 px-5 py-lg-15 px-lg-15">
                                                <!--begin: Wizard Form-->
                                                <div class="row px-4">
                                                    <div class="col-lg-12">
                                                        <form class="form" method="POST" action="<?php echo site_url('/officer/report/post_letter_document_new'); ?>" enctype="multipart/form-data"  id="kt_form_student">
                                                            <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                            <!--begin::Wizard Step 1-->
                                                            <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                                                <h3 class="mb-10 font-weight-bold text-dark">Informasi NOP/NIK & Tahun Surat:</h3>
                                                                <div class="row">
                                                                    <div class="form-group text-center">

                                                                        <div class="col-lg-12 ">
                                                                            <label class="font-weight-bolder">SCAN/UPLOAD KTP</label>  
                                                                            <blinkid-in-browser
                                                                                license-key="<?php echo $key[0]->microblink_key; ?>"
                                                                                recognizers="BlinkIdRecognizer"
                                                                                engine-location="https://unpkg.com/@microblink/blinkid-in-browser-sdk/resources/"
                                                                                >
                                                                            </blinkid-in-browser>
                                                                            <span class="form-text text-dark"><b class="text-dark">*OPSIONAL, </b>Scan/Upload KTP untuk pengisian <b>NIK, Nama dan Alamat Wajib Pajak</b> secara<b> OTOMATIS</b></span>               
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <!--begin::Input-->
                                                                        <div class="form-group">
                                                                            <label>NOP Pajak</label>
                                                                            <div class="input-group input-group-lg input-group-solid">

                                                                                <input type="text" id="kt_input_nop" name="nomor_nop" value="<?php echo $nomor_nop; ?>" class="form-control form-control-lg form-control-solid"  placeholder="Inputkan NOP Surat"/>
                                                                            </div>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan NOP Pajak</span>

                                                                        </div>
                                                                        <!--end::Input-->
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <!--begin::Input-->
                                                                        <div class="form-group">
                                                                            <label>NIK/NOPEL</label>
                                                                            <div class="input-group input-group-lg input-group-solid">
                                                                                <input type="text" name="nik_wajib_pajak" id="kt_input_nik"  class="form-control form-control-solid form-control-lg" placeholder="Inputkan NIK/NOPEL"/>
                                                                            </div>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan NIK/NOPEL</span>

                                                                        </div>
                                                                        <!--end::Input-->
                                                                    </div>
                                                                </div>
                                                                <div class="row">        
                                                                    <div class="col-lg-3"></div>
                                                                    <div class="col-lg-6">
                                                                        <!--begin::Input-->
                                                                        <div class="form-group">
                                                                            <label>Tahun Pajak</label>
                                                                            <div class="input-group input-group-lg input-group-solid">

                                                                                <input type="text" name="tahun_pajak" value="<?php echo $tahun_pajak_ext; ?>" readonly="" id="kt_datepicker_tahun" class="form-control form-control-solid form-control-lg" placeholder="Inputkan Tahun Pajak"  />
                                                                            </div>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Tahun Pajak</span>
                                                                        </div>
                                                                        <!--end::Input-->
                                                                    </div>
                                                                    <div class="col-lg-3"></div>
                                                                </div>

                                                            </div>
                                                            <!--end::Wizard Step 1-->                                        
                                                            <!--begin: Wizard Step 2-->
                                                            <div class="pb-5" data-wizard-type="step-content">
                                                                <h3 class="mb-10 font-weight-bold text-dark">Informasi Letak Objek Pajak:</h3>

                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <div class="form-group ">
                                                                            <label>Nama Jalan & Kode Khusus</label>
                                                                            <div class="input-group input-group-lg input-group-solid">
                                                                                <textarea class="form-control" name="letak_objek_pajak" rows="2"></textarea>
                                                                            </div>
                                                                            <span class="form-text text-dark"><b class="text-dark">*OPSIONAL, </b>isikan Nama Jalan/RT/RW & Kode Khusus</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <div class="form-group ">
                                                                            <label>Provinsi</label>
                                                                            <select name="prov_objek_pajak" id="provinsi_ob" class="form-control form-control-lg form-control-solid select2" >
                                                                                <option value="<?php echo substr($nomor_nop, 0, 2); ?>" selected="">
                                                                                    <?php echo ucwords(strtolower($letter[0]->nama_provinsi_obj)); ?>
                                                                                </option>
                                                                                <?php
                                                                                if (!empty($provinsi)) {
                                                                                    foreach ($provinsi as $key => $value_prov_ob) {
                                                                                        ?>
                                                                                        <option value="<?php echo $value_prov_ob->id; ?>"><?php echo ucwords(strtolower($value_prov_ob->nama)); ?></option>                                     
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                                ?>        
                                                                            </select>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Provinsi</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="form-group ">
                                                                            <label>Kabupaten/Kota</label>
                                                                            <select name="kabkot_objek_pajak" id="kabupaten_kota_ob" class="form-control form-control-lg form-control-solid select2" >
                                                                                <option value="">Pilih Kabupaten/Kota</option>

                                                                            </select>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Kabupaten/Kota</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <div class="form-group ">
                                                                            <label>Kecamatan</label>
                                                                            <select name="kec_objek_pajak" id="kecamatan_ob" class="form-control form-control-lg form-control-solid select2" >
                                                                                <option value="">Pilih Kecamatan</option>

                                                                            </select>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Kecamatan</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="form-group ">
                                                                            <label >Kelurahan/Desa</label>
                                                                            <select name="kel_objek_pajak"  id="kelurahan_desa_ob" class="form-control form-control-lg  form-control-solid select2" >
                                                                                <option value="">Pilih Kelurahan/Desa</option>
                                                                            </select>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Desa/kelurahan</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <!--end: Wizard Step 2-->
                                                            <!--begin: Wizard Step 3-->
                                                            <div class="pb-5" data-wizard-type="step-content">
                                                                <h3 class="mb-10 font-weight-bold text-dark">Informasi Wajib Pajak:</h3>
                                                                <span id="warn_scan" class="text-dark"></span>
                                                                <!--begin::Input-->
                                                                <div class="row">
                                                                    <div class="col-lg-12">                                                                            
                                                                        <div class="form-group ">
                                                                            <label>Nama Jalan/Nomor Rumah</label>
                                                                            <div class="input-group input-group-lg input-group-solid">
                                                                                <textarea class="form-control" id="alamat_pemilik" name="alamat_wajib_pajak" rows="2"></textarea>
                                                                            </div>
                                                                            <span class="form-text text-dark"><b class="text-dark">*OPSIONAL, </b>isikan Nama Jalan/Nomor Rumah & RT/RW</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label>Nama Pemilik</label>
                                                                            <input type="text" id="nama_pemilik" name="nama_wajib_pajak" class="form-control  form-control-lg form-control-solid"  placeholder="Isikan Nama Pemilik"/>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI,</b> isikan Nama Pemilik</span>               
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group ">
                                                                            <label>Provinsi</label>
                                                                            <select name="prov_wajib_pajak" id="provinsi_pem" class="form-control form-control-lg form-control-solid select2" >
                                                                                <option value="">Pilih Provinsi</option>
                                                                                <?php
                                                                                if (!empty($provinsi)) {
                                                                                    foreach ($provinsi as $key => $value_prov_pem) {
                                                                                        ?>
                                                                                        <option value="<?php echo $value_prov_pem->id; ?>"><?php echo ucwords(strtolower($value_prov_pem->nama)); ?></option>                                     
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                                ?>        
                                                                            </select>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Provinsi</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="form-group ">
                                                                            <label>Kabupaten/Kota</label>
                                                                            <select name="kabkot_wajib_pajak" id="kabupaten_kota_pem" class="form-control form-control-lg form-control-solid select2" >
                                                                                <option value="">Pilih Kabupaten/Kota</option>

                                                                            </select>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Kabupaten/Kota</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <div class="form-group ">
                                                                            <label>Kecamatan</label>
                                                                            <select name="kec_wajib_pajak" id="kecamatan_pem" class="form-control form-control-lg form-control-solid select2" >
                                                                                <option value="">Pilih Kecamatan</option>

                                                                            </select>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Kecamatan</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="form-group ">
                                                                            <label >Kelurahan/Desa</label>
                                                                            <select name="kel_wajib_pajak"  id="kelurahan_desa_pem" class="form-control form-control-lg  form-control-solid select2" >
                                                                                <option value="">Pilih Kelurahan/Desa</option>

                                                                            </select>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Desa/kelurahan</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!--end::Input-->                                                               
                                                            </div>
                                                            <!--end: Wizard Step 3-->      
                                                            <!--begin::Wizard Step 4-->
                                                            <div class="pb-5" data-wizard-type="step-content">
                                                                <h3 class="mb-10 font-weight-bold text-dark">Informasi Nominal & Spesifikasi Pajak:</h3>
                                                                <!--begin::Input-->
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <!--begin::Input-->
                                                                        <div class="form-group">
                                                                            <label>Luas Bumi M<sup>2</sup></label>
                                                                            <div class="input-group input-group-lg input-group-solid">
                                                                                <input type="text" name="luas_bumi" class="form-control form-control-lg form-control-solid " placeholder="Inputkan Luas Bumi"/>
                                                                            </div>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Luas Bumi</span>

                                                                        </div>
                                                                        <!--end::Input-->
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <!--begin::Input-->
                                                                        <div class="form-group">
                                                                            <label>Luas Bangunan M<sup>2</sup></label>
                                                                            <div class="input-group input-group-lg input-group-solid">
                                                                                <input type="text" name="luas_bangunan" class="form-control form-control-solid form-control-lg" placeholder="Inputkan Luas Bangunan"/>
                                                                            </div>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Luas Bangunan</span>

                                                                        </div>
                                                                        <!--end::Input-->
                                                                    </div>
                                                                </div>      
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <!--begin::Input-->
                                                                        <div class="form-group">
                                                                            <label>Kelas Bumi</label>
                                                                            <div class="input-group input-group-lg input-group-solid">
                                                                                <input type="text" name="kelas_bumi" class="form-control form-control-solid  form-control-lg"  placeholder="Inputkan Kelas Bumi"/>
                                                                            </div>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Kelas Bumi</span>

                                                                        </div>
                                                                        <!--end::Input-->
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <!--begin::Input-->
                                                                        <div class="form-group">
                                                                            <label>Kelas Bangunan</label>
                                                                            <div class="input-group input-group-lg input-group-solid">
                                                                                <input type="text" name="kelas_bangunan" class="form-control form-control-solid form-control-lg" placeholder="Inputkan Kelas Bangunan"/>
                                                                            </div>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Kelas Bangunan</span>

                                                                        </div>
                                                                        <!--end::Input-->
                                                                    </div>
                                                                </div> 
                                                                <div class="row">
                                                                    <div class="col-lg-1">

                                                                    </div>
                                                                    <div class="col-lg-10">
                                                                        <!--begin::Input-->
                                                                        <div class="form-group">
                                                                            <label>Total Pajak yang dibayar (Rp)</label>
                                                                            <div class="input-group input-group-lg input-group-solid">
                                                                                <input type="text" name="total_pajak_bumi_bangunan" class="form-control form-control-solid  form-control-lg"  placeholder="Inputkan Pembayaran Pajak "/>
                                                                            </div>
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Pajak yang dibayar</span>

                                                                        </div>
                                                                        <!--end::Input-->
                                                                    </div>
                                                                    <div class="col-lg-1">

                                                                    </div>
                                                                </div> 
                                                                <div class="row">
                                                                    <div class="col-lg-1">
                                                                    </div>
                                                                    <div class="col-lg-10">
                                                                        <!--begin::Input-->
                                                                        <div class="form-group">
                                                                            <label>Status Pembayaran</label><br>
                                                                            <input data-switch="true" type="checkbox" class="lunas font-weight-bold" checked value="1" name="status_pembayaran_pajak" data-size="large" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="danger">
                                                                        </div>
                                                                        <!--end::Input-->
                                                                    </div>
                                                                    <div class="col-lg-1">

                                                                    </div>
                                                                </div> 
                                                                <!--                                                                    <div class="row">
                                                                                                                                        <div class="col-lg-6">
                                                                                                                                            begin::Input
                                                                                                                                            <div class="form-group">
                                                                                                                                                <label> NJOP Bumi Per M<sup>2</sup> (RP)</label>
                                                                                                                                                <div class="input-group input-group-lg input-group-solid">
                                                                                                                                                    <input type="text" name="harga_meter_njop_bumi" readonly="" class="form-control form-control-solid  form-control-lg"  placeholder="Inputkan Kelas Bumi"/>
                                                                                                                                                </div>
                                                                                                                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Kelas Bumi</span>
                                                                
                                                                                                                                            </div>
                                                                                                                                            end::Input
                                                                                                                                        </div>
                                                                                                                                        <div class="col-lg-6">
                                                                                                                                            begin::Input
                                                                                                                                            <div class="form-group">
                                                                                                                                                 <label> NJOP Bangunan Per M<sup>2</sup> (RP)</label>
                                                                                                                                                <div class="input-group input-group-lg input-group-solid">
                                                                                                                                                    <input type="text" name="harga_meter_njop_bumi" readonly="" class="form-control form-control-solid form-control-lg" placeholder="Inputkan Kelas Bangunan"/>
                                                                                                                                                </div>
                                                                                                                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Kelas Bangunan</span>
                                                                
                                                                                                                                            </div>
                                                                                                                                            end::Input
                                                                                                                                        </div>
                                                                                                                                    </div> -->
                                                            </div>
                                                            <!--end::Wizard Step 4-->
                                                            <!--begin::Wizard Step 5-->
                                                            <div class="pb-5" data-wizard-type="step-content">
                                                                <h3 class="mb-20 font-weight-bold text-dark">Upload Berkas/Surat:</h3>                                                               
                                                                <div class="row ">  
                                                                    <div class="col-xl-12">
                                                                        <div class="form-group ">
                                                                            <label>Foto Bukti Pajak</label>
                                                                            <input type="file" class="dropify_pajak" name="foto_surat" data-max-file-size="5M" data-height="200" data-allowed-file-extensions="png jpg jpeg" />                                           
                                                                            <span class="form-text text-dark"><b class="text-danger">*OPSIONAL, </b>format file png,jpg,jpeg dan ukuran < 5Mb</span>
                                                                        </div>
                                                                    </div>
                                                                </div>                                                               
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Wizard Step 5-->
                                                            <!--begin::Wizard Step 6-->
                                                            <div class="pb-5" data-wizard-type="step-content">
                                                                <h3 class="mb-20 font-weight-bold text-dark">Pernyataan dan Persetujuan:</h3>
                                                                <div class="row mt-5">
                                                                    <div class="col-xl-1 col-2">
                                                                        <!--begin::Input-->
                                                                        <div class="form-group">
                                                                            <div class="checkbox-inline">
                                                                                <label class="checkbox checkbox-lg ">
                                                                                    <input type="checkbox" name="persetujuan_1">
                                                                                    <span></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Input-->
                                                                    <div class="col-xl-11 col-10">
                                                                        <!--begin::Input-->
                                                                        <div class="form-group">
                                                                            <blockquote class="blockquote">
                                                                                <p class="mb-0">
                                                                                    Menyatakan dengan sesungguhnya bahwa seluruh data yang telah dientri dan dikirimkan ke 
                                                                                    <b>Kabupaten Blitar</b> melalui aplikasi SiNJOP adalah benar sesuai dengan kondisi riil yang ada.
                                                                                </p>
                                                                            </blockquote>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-5">
                                                                    <div class="col-xl-1 col-2">
                                                                        <!--begin::Input-->
                                                                        <div class="form-group">
                                                                            <div class="checkbox-inline">
                                                                                <label class="checkbox checkbox-lg">
                                                                                    <input type="checkbox" name="persetujuan_2">
                                                                                    <span></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Input-->
                                                                    <div class="col-xl-11 col-10">
                                                                        <!--begin::Input-->
                                                                        <div class="form-group">
                                                                            <blockquote class="blockquote">
                                                                                <p class="mb-0">
                                                                                    Apabila ternyata data yang diinputkan tersebut tidak benar atau palsu,
                                                                                    maka siswa bersedia menerima sanksi dan konsekuensi sesuai ketentuan <b>Kabupaten Blitar</b>
                                                                                </p>
                                                                            </blockquote>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-10">
                                                                    <div class="col-xl-1">                                                
                                                                    </div>
                                                                    <!--end::Input-->
                                                                    <div class="col-xl-11">
                                                                        <!--begin::Input-->
                                                                        <div class="form-group">
                                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DICENTANG, </b>Silahkan mencentang jika Anda setuju</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Wizard Step 6-->
                                                            <!--begin: Wizard Actions-->
                                                            <div class="d-flex justify-content-between border-top mt-5">
                                                                <div class="mr-2">
                                                                    <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Kembali</button>
                                                                </div>
                                                                <div>
                                                                    <button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Kirim</button>
                                                                    <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Lanjut</button>
                                                                </div>
                                                            </div>
                                                            <!--end: Wizard Actions-->
                                                        </form>
                                                    </div>
                                                    <!--end: Wizard-->
                                                </div>
                                                <!--end: Wizard Form-->
                                            </div>
                                            <!--end: Wizard Body-->
                                        </div>
                                        <!--end: Wizard-->
                                    </div>
                                </div>
                            </div>

                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                       
                    </div>
                </div>
            </div>
            <!--end::Login-->
        </div>
        <div class="whatsapp_chat_support wcs_fixed_right" id="example_1">
            <div class="wcs_button_label">
                Butuh bantuan? Hubungi Kami
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

        <script>var HOST_URL = "<?php echo base_url(); ?>";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>var KTAppSettings = {"breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200}, "colors": {"theme": {"base": {"white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121"}, "light": {"white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0"}, "inverse": {"white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff"}}, "gray": {"gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121"}}, "font-family": "Poppins"};</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/global/plugins.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/scripts.bundle.js"></script>
        <script type="module" src="https://unpkg.com/@microblink/blinkid-in-browser-sdk@5.15.0/ui/dist/blinkid-in-browser/blinkid-in-browser.esm.js"></script>

        <!--end::Global Theme Bundle-->
        <!--end::Page Scripts-->
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/pages/crud/forms/widgets/select2.js"></script>
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/pages/custom/wizard/wizard-officer.js"></script>
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js"></script>      
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/pages/crud/forms/widgets/jquery-mask.js"></script>
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/pages/crud/forms/widgets/bootstrap-daterangepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/pages/crud/forms/widgets/bootstrap-maxlength.js"></script>
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.js"></script>
        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js"></script>

        <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/dropify.js"></script>

           <script type="text/javascript">

            const blinkId = document.querySelector('blinkid-in-browser');
            var scan = document.getElementById('warn_scan');
            blinkId.addEventListener('fatalError', ev => {
                console.log('fatalError', ev.detail);
            });
            blinkId.addEventListener('ready', ev => {
                console.log('ready', ev.detail);
            });
            blinkId.addEventListener('scanError', ev => {
                console.log('scanError', ev.detail);
            });
            blinkId.addEventListener('scanSuccess', ev => {
                console.log('scanSuccess', ev.detail);
                const results = ev.detail.recognizer;
                const niks = results.documentNumber;
                const nama_lengkap = results.fullName;
                const negara = results.nationality;
                const address = results.address;
                const alamat2 = results.additionalAddressInformation;
                if (niks !== "" || niks !== null) {
                    if (niks.length == 16) {
                        var nik = niks.replace(/ /g, '');
                        var cut_nik = nik.substr(0, 2) + '.' + nik.substr(2, 2) + '.' + nik.substr(4, 2) + '.' + nik.substr(6, 2) + '.' + nik.substr(8, 2) + '.' + nik.substr(10, 2) + '.' + nik.substr(12);
                        $('#kt_input_nik').val(cut_nik);
                        //untuk wilayah
                        var id_prov_pem = cut_nik.substr(0, 2);
                        var id_kab_pem = cut_nik.substr(0, 5);
                        console.log("kab" + id_kab_pem);
                        var id_kec_pem = cut_nik.substr(0, 8);
                        console.log("kec" + id_kec_pem);
                        var id_kel_pem = cut_nik.substr(0, 8) + "." + nik.substr(10, 2) + nik.substr(12, 2);
                        console.log("kel" + id_kel_pem);
                        var desa;
                        if (address !== "" || address !== null) {
                            var alamat_split = address.split(/\r?\n/);
                            desa = alamat_split[0];
                        }

                        var url_prov = "<?php echo site_url('officer/report/add_ajax_prov'); ?>/" + id_prov_pem;
                        $('#provinsi_pem').load(url_prov);
                        var url_kab = "<?php echo site_url('officer/report/add_ajax_kab'); ?>/" + id_prov_pem + "/" + id_kab_pem;
                        $('#kabupaten_kota_pem').load(url_kab);
                        var url_kec = "<?php echo site_url('officer/report/add_ajax_kec'); ?>/" + id_kab_pem + "/" + id_kec_pem;
                        $('#kecamatan_pem').load(url_kec);
                        var url_kel = "<?php echo site_url('officer/report/add_ajax_des_auto'); ?>/" + id_kec_pem + "/" + desa;
                        $('#kelurahan_desa_pem').load(url_kel);
                    }
                }
                if (nama_lengkap !== "" || nama_lengkap !== null) {
                    $('#nama_pemilik').val(nama_lengkap.toUpperCase());
                }
                if (address !== "" || address !== null) {
                    var alamat_split = address.split(/\r?\n/);
                    var desa = 'DESA ' + alamat_split[0].toUpperCase() + ", ";
                    var rt_rw = 'RT/RW ' + alamat_split[1].toUpperCase() + ", ";
                    var kec_des = alamat_split[2].toUpperCase() + " " + alamat_split[3].toUpperCase();
                    $('#alamat_pemilik').val(desa + " " + rt_rw + " " + kec_des);
                }

                if (negara !== "" || negara !== null) {

                }

                scan.innerHTML = "<b class='text-danger'>*PERHATIAN, </b>Anda pelakukan metode pengisian secara <b>OTOMATIS</b>, <br>dimohon untuk mengecek ulang kesesuaian dengan dokumen asli. Terima Kasih";
            });
            blinkId.addEventListener('feedback', ev => {
                console.log('feedback', ev.detail);
            });
        </script>
        <script>
            $(document).ready(function () {
                var id_prov_ob = '<?php echo substr($nomor_nop, 0, 2); ?>';
                var id_kab_ob = '<?php echo substr($nomor_nop, 0, 5); ?>';
                var id_kec_ob = '<?php echo substr($nomor_nop, 0, 8); ?>';
                var url_kab = "<?php echo site_url('officer/report/add_ajax_kab'); ?>/" + id_prov_ob + "/" + id_kab_ob;
                $('#kabupaten_kota_ob').load(url_kab);
                var url_kec = "<?php echo site_url('officer/report/add_ajax_kec'); ?>/" + id_kab_ob;
                $('#kecamatan_ob').load(url_kec);
                $("#provinsi_ob").change(function () {
                    id_prov_ob = $(this).val();
                    var url = "<?php echo site_url('officer/report/add_ajax_kab'); ?>/" + id_prov_ob;
                    $('#kabupaten_kota_ob').load(url);
                    return false;
                });
                $("#kabupaten_kota_ob").change(function () {
                    id_kab_ob = $(this).val();
                    var url = "<?php echo site_url('officer/report/add_ajax_kec'); ?>/" + id_kab_ob;
                    $('#kecamatan_ob').load(url);
                    return false;
                });
                $("#kecamatan_ob").change(function () {
                    id_kec_ob = $(this).val()
                    var url = "<?php echo site_url('officer/report/add_ajax_des'); ?>/" + id_kec_ob;
                    $('#kelurahan_desa_ob').load(url);
                    return false;
                });
                var id_prov_pem;
                var id_kab_pem;
                var id_kec_pem;
                $("#provinsi_pem").change(function () {
                    id_prov_pem = $(this).val();
                    var url = "<?php echo site_url('officer/report/add_ajax_kab'); ?>/" + id_prov_pem;
                    $('#kabupaten_kota_pem').load(url);
                    return false;
                });
                $("#kabupaten_kota_pem").change(function () {
                    id_kab_pem = $(this).val();
                    var url = "<?php echo site_url('officer/report/add_ajax_kec'); ?>/" + id_kab_pem;
                    $('#kecamatan_pem').load(url);
                    return false;
                });
                $("#kecamatan_pem").change(function () {
                    id_kec_pem = $(this).val()
                    var url = "<?php echo site_url('officer/report/add_ajax_des'); ?>/" + id_kec_pem;
                    $('#kelurahan_desa_pem').load(url);
                    return false;
                });
            });
        </script>
        <script>

            $(".lunas").on("switchChange.bootstrapSwitch", function (event, state) {
                if (state == true) {
                    $('.lunas').attr('value', '1');
                } else {
                    $('.lunas').attr('value', '0');
                }
            });
        </script>
        <script>
            $('#example_1').whatsappChatSupport();
        </script>
        <script>
            $('.dropify_pajak').dropify({
                messages: {
                    'default': 'Klik atau Geser file Anda disini',
                    'replace': 'Klik atau Geser file Anda untuk mengganti',
                    'remove': 'Hapus',
                    'error': 'Ooops, terjadi kesalahan.'
                }
            });

        </script>
    </body>
    <!--end::Body-->
</html>