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
    <body id="kt_body" style="background-image: url(<?php echo base_url(); ?>assets/client/dist/assets/media/bg/bg-10.jpg)" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
                <!--begin::Aside-->
                <div class="login-aside d-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10" style="background-image: url(<?php echo base_url(); ?>assets/client/dist/assets/media/bg/utsman.jpg);">
                    <!--begin: Aside Container-->
                    <div class="d-flex flex-row-fluid flex-column justify-content-between text-lg-left text-center">
                        <!--begin: Aside header-->
                        <a href="#" class="flex-column-auto mt-5 pb-lg-0 pb-10">
                            <img src="<?php echo base_url() . $page[0]->logo_website; ?>" class="max-h-150px" alt="" />
                        </a>
                        <!--end: Aside header-->
                        <!--begin: Aside content-->
                        <div class="flex-column-fluid d-flex flex-column mt-5">
                            <h3 class="font-size-h1 mb-5 text-white font-weight-bolder">SPPDB <?php echo $page[0]->nama_website; ?></h3>
                            <p class="text-white font-weight-bolder"><?php echo $page[0]->greeting_website; ?>.</p>
                            <!--end: Aside content-->
                            <div class="alert <?php echo ($announcement[0]->status_pengumuman == 1) ? 'alert-danger' : 'alert-warning'; ?> mt-5 p-5 justify-content-top text-left" role="alert">
                                <h4 class="alert-heading font-weight-bolder"><?php echo $announcement[0]->nama_pengumuman; ?></h4>
                                <div class="border-bottom border-white opacity-50 mb-5"></div>
                                <p>
                                    <?php echo $announcement[0]->isi_pengumuman ?>
                                </p>
                            </div>
                        </div>
                        <!--begin: Aside footer for desktop-->
                        <div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
                            <div class="font-weight-bold text-white">© 2021 SiNJOP Acitya Technology</div>
                            <div class="d-flex">

                            </div>
                        </div>
                        <!--end: Aside footer for desktop-->
                    </div>
                    <!--end: Aside Container-->
                </div>
                <!--begin::Aside-->
                <!--begin::Content-->
                <div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
                    <!--begin::Content body-->
                    <div class="d-flex flex-column-fluid flex-center mt-5 mt-lg-0">
                        <!--begin::Signup-->
                        <div class="login-form login-signin">
                            <div class="text-center mb-5 mb-lg-10">
                                <h3 class="font-mobile display-4 text-warning font-weight-bolder">ALUR PENYETORAN PAJAK NJOP</h3>
                                <p class="text-dark-75 font-weight-bold">Silahkan <b class="text-danger">MENGIKUTI</b> alur Penyetoran Pajak NJOP untuk memudahkan Anda, dengan meng-klik tombol di bawah ini. </p>
                            </div>
                            <!--begin::Form-->
                            <div class="row">
                                <div class="col-xl-12">
                                    <!--begin::Tiles Widget 13-->
                                    <div class="card card-custom bgi-no-repeat gutter-b" style="height: 185px; background-color: #663259; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto; background-image: url(<?php echo base_url(); ?>assets/client/dist/assets/media/svg/patterns/taieri.svg)">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex align-items-center">
                                            <div>
                                                <h3 class="text-white font-weight-bolder line-height-lg mb-5">Alur Penyetoran Surat NJOP 
                                                    <br />Kabupaten Blitar</h3>
                                                <a href="<?php echo site_url("/client/home/registration_flow"); ?>"  class="btn btn-warning font-weight-bold px-6 py-3 mt-2 mr-3"><i class="fa fa-eye"></i>Lihat Alur</a>
                                                <a href="<?php echo $page[0]->url_tutorial_alur; ?>" target="_blank" class="btn btn-primary font-weight-bold px-6 py-3 mt-2 "><i class="fab fa-youtube "></i>Video Tutorial</a>

                                            </div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Tiles Widget 13-->
                                </div>
                            </div>
                            <!--begin::Notice-->
                            <?php echo $this->session->flashdata('flash_message'); ?>
                            <!--end::Notice-->
                            <?php if ($page[0]->status_klien == 1) { ?>
                                <!--end::Form-->
                                <div class="text-center mb-10 mb-lg-10">
                                    <h3 class="font-mobile display-4 text-warning font-weight-bolder">PILIH MENU</h3>
                                    <p class="text-dark-75 font-weight-bold">Berikut merupakan <b class="text-danger">MENU AKSI</b> menuju halaman yang Anda butuhkan. </p>
                                </div>
                                <div class="row text-center">
                                    <div class="col-xl-4 col-3">
                                    </div> 
                                    <!--                                    <div class="col-xl-4 col-6 ">
                                                                                begin::Tiles Widget 12
                                                                                <div class="card card-custom gutter-b text-center bg-primary" style="height: 180px">
                                                                                    <div class="card-body ">
                                                                                        <span class="svg-icon svg-icon-3x svg-icon-white ">
                                                                                            begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg
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
                                                                                            end::Svg Icon
                                                                                        </span>
                                                                                        <div class="font-weight-bolder font-size-sm mt-3 text-white">Setor Surat NJOP Pajak</div>
                                                                                        <a href="#"  data-toggle="modal" data-target="#modal_add_letter" class="btn btn-light-warning btn-shadow-hover font-weight-bold mt-3"><i class="fa fa-upload"></i> Setor</a>
                                        
                                                                                    </div>
                                                                                </div>
                                                                                end::Tiles Widget 12
                                                                            </div>-->
                                    <div class="col-xl-4 col-6">
                                        <!--begin::Tiles Widget 12-->
                                        <div class="card card-custom gutter-b text-center bg-primary" style="height: 180px">
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
                                    <div class="col-xl-4 col-3">
                                    </div> 
                                </div>
                            <?php } else { ?>
                                <!--end::Form-->
                                <div class="text-center mb-10 mb-lg-10 mt-8">
                                    <h3 class="font-mobile display-3 text-danger font-weight-boldest">PELAPORAN TELAH DITUTUP</h3>
                                    <p class="text-dark-75 font-weight-bold">Silahkan melihat <b class="text-danger">INFO PENGUMUMAN</b> untuk mengtahui informasi terkait Pelaporan Surat NJOP atau hubungi Admin dibawah ini: </p>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <div class="whatsapp_chat_support" id="example_7">
                                        <div class="wcs_button wcs_button_person" data-number="<?php echo "62" . substr($contact[0]->no_handphone, 1); ?>"  data-default-msg="Assslamualaikum, permisi mau bertanya?" >
                                            <div class="wcs_button_person_img"><img src="<?php echo base_url() . $page[0]->logo_website; ?>" alt="" style="background-color: white"></div>
                                            <div class="wcs_button_person_content">
                                                <div class="wcs_button_person_name">Admin TU &nbsp;/&nbsp; Sekolah Utsman</div>
                                                <div class="wcs_button_person_description">Butuh Bantuan? Chat via whatsApp</div>
                                                <div class="wcs_button_person_status">Saya Online</div>
                                            </div>
                                        </div>	
                                    </div>

                                </div>
                            <?php } ?>
                        </div>
                        <!--end::Signup-->

                    </div>
                    <!--end::Content body-->
                    <!--begin::Content footer for mobile-->
                    <div class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
                        <div class="text-dark font-weight-bold order-2 order-sm-1 my-2">© 2021 SiNJOP Acitya Technology</div>

                    </div>
                    <!--end::Content footer for mobile-->
                </div>
                <!--end::Content-->
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
<!--        <div class="modal fade" id="modal_add_letter"  data-keyboard="false" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
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
        </div>-->
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

        <!--end::Page Scripts-->
        <script src="<?php echo base_url(); ?>assets/client/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.js"></script>
        <script>
            $('#example_1').whatsappChatSupport();
        </script>
        <script>

            $('#example_7').whatsappChatSupport();
        </script>

    </body>

    <!--end::Body-->
</html>