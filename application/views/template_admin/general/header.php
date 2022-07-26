<?php $user = $this->session->userdata('sias-admin'); ?>
<?php $page = $this->db->get_where('general_page', array('id_general_page' => 1))->result(); ?>
<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                <!--begin::Header Nav-->
                <ul class="menu-nav">
                    <li class="menu-item menu-item-submenu menu-item-rel <?php echo @$nav_dash; ?>" data-menu-toggle="click" aria-haspopup="true">
                        <a href="<?php echo site_url("/admin/dashboard") ?>" class="menu-link">
                            <span class="menu-text text-danger">Dashboard</span>
                            <i class="menu-arrow"></i>
                        </a>

                    </li>
<!--                    <li class="menu-item menu-item-submenu menu-item-rel <?php echo @$nav_out; ?>" data-menu-toggle="click" aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Pengeluaran</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover" aria-haspopup="true">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon ">
                                            begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-at.svg
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"/>
                                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"/>
                                                    <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
                                                    <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"/>
                                                </g>
                                            </svg>
                                            end::Svg Icon
                                        </span>
                                        <span class="menu-text">Pengeluaran Sekolah</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                                        <ul class="menu-subnav">
                                            <li class="menu-item" aria-haspopup="true">
                                                <a href="<?php echo site_url("/admin/outcome/list_outcome") ?>" class="menu-link">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Daftar Pengeluaran</span>
                                                </a>
                                            </li>  
                    <?php if ($user[0]->id_role_struktur == 7 || $user[0]->id_role_struktur == 5) { ?>
                                                                            <li class="menu-item" aria-haspopup="true">
                                                                                <a href="<?php echo site_url("/admin/outcome/add_nota_outcome") ?>" class="menu-link">
                                                                                    <i class="menu-bullet menu-bullet-dot">
                                                                                        <span></span>
                                                                                    </i>
                                                                                    <span class="menu-text">Ajukan Pengeluaran</span>
                                                                                </a>
                                                                            </li>
                    <?php } ?>
                                        </ul>
                                    </div>
                                </li>                                
                            </ul>
                        </div>
                    </li>-->
                    <?php if ($user[0]->id_role_struktur == 7) { ?>
                    <?php } else { ?>
                        <li class="menu-item menu-item-submenu menu-item-rel <?php echo @$nav_bud; ?>" data-menu-toggle="click" aria-haspopup="true">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="menu-text">Laporan</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                <ul class="menu-subnav">
                                    <?php if ($user[0]->id_role_struktur == 9) { ?>
                                    <?php } else { ?>
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover" aria-haspopup="true">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon ">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-at.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                            <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                            <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero"/>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <span class="menu-text">Laporan NJOP</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                                                <ul class="menu-subnav">
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="<?php echo site_url("/admin/report/letter/list_letter_document") ?>" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">Daftar Surat NJOP</span>
                                                        </a>
                                                    </li>  
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="#" class="menu-link"  data-toggle="modal" data-target="#modal_add_letter">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">Setor Surat NJOP</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <!--                                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover" aria-haspopup="true">
                                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                                <span class="svg-icon menu-icon ">
                                                                                    begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-at.svg
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                                            <path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3"/>
                                                                                            <path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000"/>
                                                                                        </g>
                                                                                    </svg>
                                                                                    end::Svg Icon
                                                                                </span>
                                                                                <span class="menu-text">Anggaran Bidang</span>
                                                                                <i class="menu-arrow"></i>
                                                                            </a>
                                                                            <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                                                                                <ul class="menu-subnav">
                                                                                    <li class="menu-item" aria-haspopup="true">
                                                                                        <a href="<?php echo site_url("/admin/budget/list_budget_division") ?>" class="menu-link">
                                                                                            <i class="menu-bullet menu-bullet-dot">
                                                                                                <span></span>
                                                                                            </i>
                                                                                            <span class="menu-text">Daftar Anggaran Bidang</span>
                                                                                        </a>
                                                                                    </li>  
                                                                                </ul>
                                                                            </div>
                                                                        </li>-->
                                </ul>
                            </div>
                        </li>
                    <?php } ?>
                    <?php if ($user[0]->id_role_struktur == 1) { ?>
                        <li class="menu-item menu-item-submenu menu-item-rel  <?php echo @$nav_set; ?>" data-menu-toggle="click" aria-haspopup="true">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="menu-text">Pengaturan</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                <ul class="menu-subnav">

                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                                        <a href="javascript:;" class="menu-link menu-toggle">
                                            <span class="svg-icon menu-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Send.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-text">Akun Admin</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                                            <ul class="menu-subnav">
                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                                                    <a href="<?php echo site_url("admin/settings/account/list_account") ?>" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Daftar Akun Admin</span>                                                    
                                                    </a>                                                
                                                </li>
                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                                                    <a href="<?php echo site_url("admin/settings/account/add_account") ?>" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Tambah Akun Admin</span>                                                    
                                                    </a>                                                
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                                        <a href="javascript:;" class="menu-link menu-toggle">
                                            <span class="svg-icon menu-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M15.9497475,3.80761184 L13.0246125,6.73274681 C12.2435639,7.51379539 12.2435639,8.78012535 13.0246125,9.56117394 L14.4388261,10.9753875 C15.2198746,11.7564361 16.4862046,11.7564361 17.2672532,10.9753875 L20.1923882,8.05025253 C20.7341101,10.0447871 20.2295941,12.2556873 18.674559,13.8107223 C16.8453326,15.6399488 14.1085592,16.0155296 11.8839934,14.9444337 L6.75735931,20.0710678 C5.97631073,20.8521164 4.70998077,20.8521164 3.92893219,20.0710678 C3.1478836,19.2900192 3.1478836,18.0236893 3.92893219,17.2426407 L9.05556629,12.1160066 C7.98447038,9.89144078 8.36005124,7.15466739 10.1892777,5.32544095 C11.7443127,3.77040588 13.9552129,3.26588995 15.9497475,3.80761184 Z" fill="#000000"/>
                                                        <path d="M16.6568542,5.92893219 L18.0710678,7.34314575 C18.4615921,7.73367004 18.4615921,8.36683502 18.0710678,8.75735931 L16.6913928,10.1370344 C16.3008685,10.5275587 15.6677035,10.5275587 15.2771792,10.1370344 L13.8629656,8.7228208 C13.4724413,8.33229651 13.4724413,7.69913153 13.8629656,7.30860724 L15.2426407,5.92893219 C15.633165,5.5384079 16.26633,5.5384079 16.6568542,5.92893219 Z" fill="#000000" opacity="0.3"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-text">Konfigurasi Sistem</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                                            <ul class="menu-subnav">
                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                                                    <a href="<?php echo site_url("admin/settings/email_configuration"); ?>" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Email Website</span>                                                    
                                                    </a>                                                
                                                </li>
                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                                                    <a href="<?php echo site_url("admin/settings/account_structure_configuration"); ?>" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Struktur Akun</span>                                                    
                                                    </a>                                                
                                                </li>
                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                                                    <a href="<?php echo site_url("admin/settings/contact_configuration"); ?>" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Kontak Website</span>                                                    
                                                    </a>                                                
                                                </li>
                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                                                    <a href="<?php echo site_url("admin/settings/general_page_configuration"); ?>" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Halaman Website</span>                                                    
                                                    </a>                                                
                                                </li>
                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                                                    <a href="<?php echo site_url("admin/settings/thirdparty_configuration"); ?>" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Third Party Key</span>                                                    
                                                    </a>                                                
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                                        <a href="javascript:;" class="menu-link menu-toggle">
                                            <span class="svg-icon menu-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <path d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z" fill="#000000"/>
                                                        <rect fill="#000000" opacity="0.3" x="10" y="16" width="4" height="4" rx="2"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-text">Pengumuman Web</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                                            <ul class="menu-subnav">
                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                                                    <a href="<?php echo site_url("admin/announcement/edit_announcement"); ?>" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Edit Pengumuman</span>                                                    
                                                    </a>                                                
                                                </li>                                                
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
                <!--end::Header Nav-->
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->
        <!--begin::Topbar-->
        <div class="topbar">

            <!--begin::Notifications-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
                        <span class="svg-icon svg-icon-xl svg-icon-primary">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
                                    <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="pulse-ring"></span>
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <form>
                        <!--begin::Header-->
                        <div class="d-flex flex-column pt-10 pb-8 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url(<?php echo base_url(); ?>assets/employee/dist/assets/media/misc/bg-1.jpg)">
                            <!--begin::Title-->
                            <h4 class="d-flex flex-center rounded-top">
                                <span class="text-white">Notifikasi</span>
                                <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">0</span>
                            </h4>
                            <!--end::Title-->                            
                        </div>
                        <!--end::Header-->
                        <!--begin::Content-->
                        <div class="tab-content">                            
                            <!--begin::Tabpane-->
                            <div class="tab-pane active" id="topbar_notifications_events" role="tabpanel">
                                <!--begin::Nav-->
                                <div class="navi navi-hover scroll my-4" data-scroll="true" data-height="300" data-mobile-height="200">
                                    <!--                                    begin::Item
                                                                        <a href="#" class="navi-item">
                                                                            <div class="navi-link">
                                                                                <div class="navi-icon mr-2">
                                                                                    <i class="flaticon2-line-chart text-success"></i>
                                                                                </div>
                                                                                <div class="navi-text">
                                                                                    <div class="font-weight-bold">New report has been received</div>
                                                                                    <div class="text-muted">23 hrs ago</div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        end::Item-->

                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--end::Tabpane-->

                        </div>
                        <!--end::Content-->
                    </form>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Notifications-->

            <!--begin::User-->
            <div class="dropdown ">
                <!--begin::Toggle-->
                <?php
                $words = explode(" ", strip_tags($user[0]->nama_akun));
                $limit_word = implode(" ", array_splice($words, 0, 2));
                ?>
                <div class="topbar-item " data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-dropdown btn-outline-success  btn-hover-white d-flex align-items-center btn-lg px-md-2 w-md-auto">
                        <span class="text-muted opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                        <span class="text-dark-75 opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4"><?php echo strtoupper(strtolower($limit_word)); ?></span>
                        <span class="symbol symbol-35">
                            <span class="symbol-label text-success font-size-h5 font-weight-bold bg-success-o-30"><?php echo substr(strtoupper(strtolower($user[0]->nama_akun)), 0, 1); ?></span>
                        </span>
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">
                    <!--begin::Header-->
                    <div class="d-flex align-items-center p-8 rounded-top">
                        <!--begin::Symbol-->
                        <span class="symbol symbol-50 bg-success">
                            <span class="symbol-label text-white font-size-h1 font-weight-boldest bg-white-o-30"><?php echo substr(strtoupper(strtolower($user[0]->nama_akun)), 0, 1); ?></span>
                        </span>
                        <!--end::Symbol-->

                        <!--begin::Text-->
                        <div class="text-dark m-0 flex-grow-1 ml-5 font-weight-bolder font-size-h3"><?php echo strtoupper(strtolower($limit_word)); ?></div>
                        <!--end::Text-->
                    </div>
                    <div class="separator separator-solid"></div>
                    <!--end::Header-->
                    <!--begin::Nav-->
                    <div class="navi navi-spacer-x-0 pt-3">
                        <!--begin::Item-->
                        <a href="<?php echo site_url("admin/settings/account/edit_profile/" . paramEncrypt($user[0]->id_akun)); ?>" class="navi-item px-8">
                            <div class="navi-link">
                                <div class="navi-icon mr-2">
                                    <i class="flaticon2-calendar-3 text-success"></i>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold">Profil Saya</div>
                                    <div class="text-muted">
                                        <span class="label label-light-danger label-inline font-weight-bold">kilk</span>
                                        untuk melihat dan update profil
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!--end::Item-->

                        <!--begin::Footer-->
                        <div class="navi-separator mt-3"></div>
                        <div class="navi-footer px-8 py-5 align-content-end">
                            <a href="<?php echo site_url("admin/auth/logout"); ?>" class="btn btn-light-danger font-weight-bold pull-right"><i class="fa fa-lock"></i>Keluar</a>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Nav-->
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::User-->

        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>