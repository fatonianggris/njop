<html lang="en">
    <!--begin::Head-->
    <head>
        <meta charset="utf-8" />
        <title>Alur Penyetoran | SiNJOP </title>
        <meta name="description" content="<?php echo $title; ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="canonical" href="<?php echo base_url(); ?>" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="<?php echo base_url(); ?>assets/client/dist/assets/css/pages/login/classic/login-2.css" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/client/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/client/dist/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/client/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/client/dist/assets/media/logos/favicon.ico" />
        <link href="<?php echo base_url(); ?>assets/client/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.css" rel="stylesheet" type="text/css"  />

    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
                <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('<?php echo base_url(); ?>assets/client/dist/assets/media/bg/bg-3.jpg');">
                    <div class="login-form text-center p-7 position-relative overflow-hidden">
                        <!--begin::Login Header-->
                        <div class="d-flex flex-center mb-5">
                            <a href="#">
                                <img src="<?php echo base_url() . $page[0]->logo_website; ?>" class="max-h-100px" alt="" />
                            </a>
                        </div>
                        <!--end::Login Header-->
                        <!--begin::Login Sign in form-->
                        <div class="login-signin">
                            <div class="mb-0 ">
                                <p class="font-mobile font-weight-boldest text-warning ">ALUR PENYETORAN NJOP PAJAK</p>
                            </div>
                            <div class="px-mobile">
                                <div class="alert alert-custom alert-light-danger alert-shadow fade show" role="alert">
                                    <div class="alert-icon">
                                        <span class="svg-icon svg-icon-danger svg-icon-xl">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                            <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"/>
                                            <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"/>
                                            </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <div class="alert-text">Berikut ini merupakan Alur Penyetoran NJOP Pajak, Silahkan Mengikuti Alur Untuk Memudahkan Anda.</div>
                                </div>
                            </div>
                            <!--begin::Notice-->
                            <?php echo $this->session->flashdata('flash_message'); ?>
                            <!--end::Notice-->
                            <div class="timeline timeline-4 px-mobile">
                                <div class="timeline-bar"></div>
                                <div class="timeline-items">
                                    <div class="timeline-item timeline-item-right">
                                        <div class="timeline-badge">
                                            <div class="bg-success"></div>
                                        </div>

                                        <div class="timeline-label">
                                            <span class="text-danger font-weight-boldest">Mulai</span>
                                        </div>

                                        <div class="timeline-content">
                                            <div class="d-flex align-items-center p-2">
                                                <div class="mr-2">
                                                    <span class="svg-icon svg-icon-danger svg-icon-4x">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M14.2330207,14.3666907 L16.3111786,18.8233147 C16.4278814,19.0735846 16.3196038,19.3710749 16.0693338,19.4877777 L14.2567182,20.3330142 C14.0064483,20.449717 13.708958,20.3414394 13.5922552,20.0911694 L11.4668267,15.5331733 L8.85355339,18.1464466 C8.7597852,18.2402148 8.63260824,18.2928932 8.5,18.2928932 C8.22385763,18.2928932 8,18.0690356 8,17.7928932 L8,5.13027585 C8,5.00589283 8.04636089,4.88597544 8.13002996,4.79393946 C8.31578343,4.58961065 8.63200759,4.57455235 8.8363364,4.76030582 L18.1424309,13.2203917 C18.2368163,13.3061967 18.2948385,13.424831 18.3046218,13.5520135 C18.3258009,13.8273425 18.1197718,14.0677099 17.8444428,14.088889 L14.2330207,14.3666907 Z" fill="#000000"/>
                                                        </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <div class="d-flex flex-column text-left">
                                                    <div class="text-dark-75">Untuk NJOP ONLINE, User melakukan pendaftaran form secara <b>ONLINE</b> melalui <b>WEB RESMI SiNJOP Kabupaten Blitar</b> <a href="https://sinjop.com/client/home/">www.sinjop.com/</a> <a>atau datang ke Balai Desa untuk pendaftaran OFFLINE</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item timeline-item-left">
                                        <div class="timeline-badge">
                                            <div class="bg-danger"></div>
                                        </div>

                                        <div class="timeline-label">
                                            <span class="text-warning font-size-lg font-weight-boldest">1. Setor NJOP</span>
                                        </div>

                                        <div class="timeline-content">
                                            <div class="d-flex align-items-center p-2">
                                                <div class="mr-2">
                                                    <span class="svg-icon svg-icon-warning svg-icon-4x">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
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
                                                </div>
                                                <div class="d-flex flex-column text-left">
                                                    <div class="text-dark-75">User melakukan setor laporan dengan mengisikan <b>KELENGKAPAN DATA DIRI</b> pada formulir</div>
                                                    <div class="mt-3">
                                                        <?php if ($page[0]->status_klien == 1) { ?>
                                                            <a href="#" data-toggle="modal" data-target="#modal_add_letter" class="btn btn-sm font-weight-bolder text-uppercase btn-warning py-3 px-5">Setor NJOP</a>
                                                        <?php } else { ?>
                                                            <a href="#" class="btn btn-sm font-weight-bolder text-uppercase bg-dark-o-50 py-3 px-5">Ditutup</a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="timeline-item timeline-item-right">
                                        <div class="timeline-badge">
                                            <div class="bg-danger"></div>
                                        </div>

                                        <div class="timeline-label">
                                            <span class="text-warning font-size-lg font-weight-boldest">2. Menunggu Validasi Laporan</span>
                                        </div>

                                        <div class="timeline-content">
                                            <div class="d-flex align-items-center p-2">
                                                <div class="mr-2">
                                                    <span class="svg-icon svg-icon-warning svg-icon-4x">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M7.14319965,19.3575259 C7.67122143,19.7615175 8.25104409,20.1012165 8.87097532,20.3649307 L7.89205065,22.0604779 C7.61590828,22.5387706 7.00431787,22.7026457 6.52602525,22.4265033 C6.04773263,22.150361 5.88385747,21.5387706 6.15999985,21.0604779 L7.14319965,19.3575259 Z M15.1367085,20.3616573 C15.756345,20.0972995 16.3358198,19.7569961 16.8634386,19.3524415 L17.8320512,21.0301278 C18.1081936,21.5084204 17.9443184,22.1200108 17.4660258,22.3961532 C16.9877332,22.6722956 16.3761428,22.5084204 16.1000004,22.0301278 L15.1367085,20.3616573 Z" fill="#000000"/>
                                                        <path d="M12,21 C7.581722,21 4,17.418278 4,13 C4,8.581722 7.581722,5 12,5 C16.418278,5 20,8.581722 20,13 C20,17.418278 16.418278,21 12,21 Z M19.068812,3.25407593 L20.8181344,5.00339833 C21.4039208,5.58918477 21.4039208,6.53893224 20.8181344,7.12471868 C20.2323479,7.71050512 19.2826005,7.71050512 18.696814,7.12471868 L16.9474916,5.37539627 C16.3617052,4.78960984 16.3617052,3.83986237 16.9474916,3.25407593 C17.5332781,2.66828949 18.4830255,2.66828949 19.068812,3.25407593 Z M5.29862906,2.88207799 C5.8844155,2.29629155 6.83416297,2.29629155 7.41994941,2.88207799 C8.00573585,3.46786443 8.00573585,4.4176119 7.41994941,5.00339833 L5.29862906,7.12471868 C4.71284263,7.71050512 3.76309516,7.71050512 3.17730872,7.12471868 C2.59152228,6.53893224 2.59152228,5.58918477 3.17730872,5.00339833 L5.29862906,2.88207799 Z" fill="#000000" opacity="0.3"/>
                                                        <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/>
                                                        </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <div class="d-flex flex-column text-left">
                                                    <div class="text-dark-75">Mohon menunggu info validasi hasil laporan NJOP dari Admin.</div>
                                                    <!--                                                    <div class="mt-3">
                                                                                                            <a href="custom/apps/support-center/feedback.html" target="_blank" class="btn btn-sm font-weight-bolder text-uppercase btn-warning py-3 px-5">Cek Sekarang</a>
                                                                                                        </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item timeline-item-left">
                                        <div class="timeline-badge">
                                            <div class="bg-success"></div>
                                        </div>

                                        <div class="timeline-label">
                                            <span class="text-warning font-size-lg font-weight-boldest">3. Cek Status Histori Laporan</span>
                                        </div>

                                        <div class="timeline-content">
                                            <div class="d-flex align-items-center p-2">
                                                <div class="mr-2">
                                                    <span class="svg-icon svg-icon-warning svg-icon-4x">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/>
                                                        </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <div class="d-flex flex-column text-left">
                                                    <div class="text-dark-75">Mengecek histori laporan NJOP yang telah dilaporkan sebelumnya.</div>
                                                    <div class="mt-3">
                                                        <?php if ($page[0]->status_klien == 1) { ?>
                                                            <a href="#" data-toggle="modal" data-target="#modal_list_letter" class="btn btn-sm font-weight-bolder text-uppercase btn-warning py-3 px-5">Cek Sekarang</a>
                                                        <?php } else { ?>
                                                            <a href="#" class="btn btn-sm font-weight-bolder text-uppercase bg-dark-o-50 py-3 px-5">Ditutup</a>

                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item timeline-item-right">
                                        <div class="timeline-badge">
                                            <div class="bg-danger"></div>
                                        </div>

                                        <div class="timeline-label">
                                            <span class="text-success font-size-lg font-weight-boldest">Selesai</span>
                                        </div>

                                        <div class="timeline-content">
                                            <div class="d-flex align-items-center p-2">
                                                <div class="mr-2">
                                                    <span class="svg-icon svg-icon-success svg-icon-4x">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                        <path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero"/>
                                                        </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <div class="d-flex flex-column text-left">
                                                    <div class="text-dark-75">Terimakasih telah melakukan pelaporan NJOP secara Online.</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo site_url('client/home'); ?>" type="button" class="btn btn-primary mt-10 font-weight-bold px-9 py-4 my-3 mx-4 "><li class="fa fa-home font-size-h4"></li> Kembali ke Menu</a>

                            <!--                            <div class="mt-10">
                                                            <span class="mt-10 mb-10 text-danger font-size-lg">Silahkan <b>KILK</b> Tombol dibawah ini untuk <b> <b>UPLOAD BUKTI PEMBAYARAN</b> </b>, Gunakan <b>NOMOR PENDAFTARAN</b> diatas atau <b>NOMOR PENDAFTARAN</b> yang dikirimkan di Email Anda.</span>
                                                        </div>-->
                        </div>
                        <!--end::Login Sign in form-->
                        <!--begin::Content footer for mobile-->
                        <div class="d-flex flex-column-auto flex-column flex-sm-row justify-content-center align-items-center mt-5 p-5">
                            <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">© 2021 SiNJOP Acitya Technology</div>                           
                        </div>
                        <!--end::Content footer for mobile-->
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
        <div class="modal fade" id="modal_add_letter"  data-keyboard="false" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cek Setor Laporan Surat Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form class="form" method="POST" action="<?php echo site_url('client/register/check_letter_document'); ?>" id="kt_check_letter">
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
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cek Riwayat Laporan Surat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form class="form" method="POST" action="<?php echo site_url('client/register/check_nop_letter'); ?>" id="kt_check_nop_letter">
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
        <!--end::Main-->
        <script>var HOST_URL = "<?php echo base_url(); ?>";</script>
        <!--end::Main-->
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="<?php echo base_url(); ?>assets/client/dist/assets/plugins/global/plugins.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/client/dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/client/dist/assets/js/scripts.bundle.js"></script>
        <!--end::Global Theme Bundle-->
        <!--begin::Page Scripts(used by this page)-->
        <script src="<?php echo base_url(); ?>assets/client/dist/assets/js/pages/custom/login/check_letter_njop.js"></script>
        <script src="<?php echo base_url(); ?>assets/client/dist/assets/js/pages/crud/forms/widgets/jquery-mask.js"></script>
        <script src="<?php echo base_url(); ?>assets/client/dist/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/client/dist/assets/js/pages/custom/login/login-general.js"></script>
        <!--end::Page Scripts-->
        <script src="<?php echo base_url(); ?>assets/client/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.js"></script>
        <script>
            $('#example_1').whatsappChatSupport();
        </script>
    </body>
    <!--end::Body-->
</html>