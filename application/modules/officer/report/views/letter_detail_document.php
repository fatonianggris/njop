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
        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/css/pages/fonts/dropify.css" rel="stylesheet" type="text/css" />

        <!--begin::Layout Themes(used by all pages)-->
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/officer/dist/assets/media/logos/favicon.ico" />
        <link href="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.css" rel="stylesheet" type="text/css"  />

        <style>
            .table thead th {
                vertical-align: top; 
                border-bottom: 2px solid #EBEDF3;
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
                                <h3 class="font-mobile display-4 text-warning font-weight-boldest">DETAIL LAPORAN</h3>
                            </div>
                        </div>
                        <div class="row flex-center mb-5">
                            <div class="col-6 float-left">
                                <a href="<?php echo site_url('officer/dashboard'); ?>" type="button" class="btn btn-danger float-left font-weight-bold"><li class="fa fa-home "></li> Menu</a>
                            </div>
                            <div class="col-6 float-right">
                                <a onclick="window.history.back();" class="btn btn-light-warning font-weight-bold float-right"><i class="fa fa-backward"></i>Kembali</a>           
                            </div>
                        </div>
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
                                            Berikut merupakan laporan pajak yang telah Anda laporkan di Sistem NJOP
                                        </span>
                                    </div>
                                    <img src="<?php echo base_url(); ?>assets/officer/dist/assets/media/svg/avatars/004-boy-1.svg" alt="" class="align-self-end h-100px">
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                        <!--begin::Login Sign in form-->
                        <div class="login-signin">
                            <div class="row" id="kt_form" >

                                <!--begin::Card-->
                                <div class="card card-custom" >
                                    <div class="card-header mt-2" style="justify-content: center">
                                        <div class="card-title text-center">                                
                                            <h2 class="card-label font-size-h3 font-weight-bolder">
                                                Detail Laporan NJOP "<?php echo strtoupper(strtolower($letter[0]->nama_wajib_pajak)); ?>" - <?php echo $letter[0]->nomor_nop; ?>
                                                <span class="text-muted pt-2 font-size-sm d-block">Berikut detail formulir surat NJOP sesuai dengan bukti pajak</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <!--begin::Form-->
                                    <form class="form" novalidate="novalidate"enctype="multipart/form-data" method="post" >

                                        <div class="card-body">
                                            <div class="row border-bottom">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="font-weight-bolder">NOP</label>
                                                        <input type="text" id="kt_input_nop" name="nomor_nop" disabled="" value="<?php echo $letter[0]->nomor_nop; ?>" class="form-control form-control-solid form-control-lg"  placeholder="Isikan NOP Surat"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label class="font-weight-bolder">Tahun</label>
                                                        <input type="text" name="tahun_pajak" disabled="" value="<?php echo $letter[0]->tahun_pajak; ?>" id="kt_datepicker_tahun" class="input-reset form-control-solid  form-control form-control-lg"  placeholder="Isikan Tahun Pajak"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="font-weight-bolder">NIK/NOPEL</label>
                                                        <input type="text" name="nik_wajib_pajak" id="kt_input_nik" disabled="" value="<?php echo $letter[0]->nik_wajib_pajak; ?>" class="form-control form-control-solid  form-control-lg"  placeholder="Isikan NIK/NOPEL"/>
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
                                                            <textarea class="form-control form-control-solid" disabled="" placeholder="Isikan Nama Jalan dan Kode Khusus" name="letak_objek_pajak" rows="2"><?php echo $letter[0]->letak_objek_pajak; ?></textarea>
                                                        </div>                                            
                                                        <div class="form-group col-lg-6">
                                                            <label>Provinsi</label>
                                                            <select name="prov_objek_pajak" id="provinsi_ob" disabled="" class="form-control select-dark form-control-lg select2">
                                                                <option value="<?php echo $letter[0]->prov_objek_pajak; ?>" selected="">
                                                                    <?php echo ucwords(strtolower($letter[0]->nama_provinsi_obj)); ?>
                                                                </option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label>Kabupaten/Kota</label>
                                                            <select name="kabkot_objek_pajak" id="kabupaten_kota_ob" disabled="" class="form-control form-control-lg">
                                                                <option value="">Pilih Kabupaten/Kota</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label>Kecamatan</label>
                                                            <select name="kec_objek_pajak" id="kecamatan_ob" disabled="" class="form-control form-control-lg">
                                                                <option value="">Pilih Kecamatan</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label>Kelurahan/Desa</label>
                                                            <select name="kel_objek_pajak" id="kelurahan_desa_ob" disabled="" class="form-control form-control-lg">
                                                                <option value="">Pilih Kelurahan/Desa</option>

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
                                                            <textarea class="form-control" placeholder="Isikan Nama Jalan/ Nomor Rumah" disabled="" name="alamat_wajib_pajak" rows="2"><?php echo $letter[0]->alamat_wajib_pajak; ?></textarea>
                                                        </div>
                                                        <div class="col-lg-5 col-12">
                                                            <div class="form-group">
                                                                <label>Nama Pemilik</label>
                                                                <input type="text" name="nama_wajib_pajak" disabled="" value="<?php echo $letter[0]->nama_wajib_pajak; ?>" class="form-control  form-control-lg"  placeholder="Isikan Nama Pemilik"/>
                                                            </div>
                                                        </div>                                            
                                                        <div class="form-group col-lg-6">
                                                            <label>Provinsi</label>
                                                            <select name="prov_wajib_pajak" id="provinsi_pem" disabled="" class="form-control form-control-lg">
                                                                <option value="<?php echo $letter[0]->prov_wajib_pajak; ?>" selected="">
                                                                    <?php echo ucwords(strtolower($letter[0]->nama_provinsi_pem)); ?>
                                                                </option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label>Kabupaten/Kota</label>
                                                            <select name="kabkot_wajib_pajak" id="kabupaten_kota_pem" disabled="" class="form-control form-control-lg">
                                                                <option value="">Pilih Kabupaten/Kota</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label>Kecamatan</label>
                                                            <select name="kec_wajib_pajak" id="kecamatan_pem" disabled="" class="form-control form-control-lg">
                                                                <option value="">Pilih Kecamatan</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label>Kelurahan/Desa</label>
                                                            <select name="kel_wajib_pajak" id="kelurahan_desa_pem" disabled="" class="form-control form-control-lg">
                                                                <option value="">Pilih Kelurahan/Desa</option>

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
                                                            <input type="text" name="luas_bumi" disabled="" value="<?php echo $letter[0]->luas_bumi; ?>" class="form-control  form-control-lg"  placeholder="Isikan Luas Bumi"/>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group">                                                
                                                            <input type="text" name="luas_bangunan" disabled="" value="<?php echo $letter[0]->luas_bangunan; ?>" class="form-control  form-control-lg"  placeholder="Isikan Luas Bangunan"/>
                                                        </div>
                                                    </div>                                       
                                                </div>        
                                                <div class="col-lg-2 col-6 ">                                        
                                                    <div class="">
                                                        <div class="form-group">
                                                            <div class="text-center">
                                                                <label class="font-weight-bolder font-size-h6 ">Kelas</label>
                                                            </div>
                                                            <input type="text" name="kelas_bumi" disabled="" value="<?php echo $letter[0]->kelas_bumi; ?>" class="form-control  form-control-lg"  placeholder="Isikan Kelas Bumi"/>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group">                                                
                                                            <input type="text" name="kelas_bangunan" disabled="" value="<?php echo $letter[0]->kelas_bangunan; ?>" class="form-control  form-control-lg"  placeholder="Isikan Kelas Bangunan"/>
                                                        </div>
                                                    </div>
                                                </div>     
                                                <div class="col-lg-2 text-center col-6">                                        
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label class="font-weight-bolder font-size-h6">NJOP Per M<sup>2</sup> (RP)</label>
                                                            <input type="text" name="harga_meter_njop_bumi" value="<?php echo $letter[0]->harga_meter_njop_bumi; ?>" readonly="" value="0" class="form-control  form-control-lg form-control-solid"  placeholder="Isikan Harga/M Bumi"/>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group">                                                
                                                            <input type="text" name="harga_meter_njop_bangunan" value="<?php echo $letter[0]->harga_meter_njop_bangunan; ?>" readonly="" value="0" class="form-control  form-control-lg form-control-solid"  placeholder="Isikan Harga/M Bangunan"/>
                                                        </div>
                                                    </div>
                                                </div>    
                                                <div class="col-lg-2 text-center col-6">                                        
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label class="font-weight-bolder font-size-h6">Total NJOP (RP)</label>
                                                            <input type="text" name="total_njop_bumi" value="<?php echo $letter[0]->total_njop_bumi; ?>" readonly="" value="0" class="form-control form-control-lg form-control-solid"  placeholder="Isikan Total Bumi"/>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group">                                                
                                                            <input type="text" name="total_njop_bangunan" value="<?php echo $letter[0]->total_njop_bangunan; ?>" readonly="" value="0" class="form-control  form-control-lg form-control-solid"  placeholder="Isikan Total Bangunan"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 text-center">                                        
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label class="font-weight-bolder font-size-h6">Bukti Pajak</label> <a href="#" type="button" class="bt btn-xs font-weight-bold ml-2" data-toggle="modal" data-target="#modal_bukti" > <span class="label label-md font-weight-boldest label-primary label-inline">Lihat</span></a>
                                                            <input type="file" class="dropify_pajak" name="foto_surat" disabled="" data-default-file="<?php echo site_url($letter[0]->foto_surat); ?>" data-max-file-size="5M" data-height="120" data-allowed-file-extensions="png jpg jpeg" />
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="mt-5 row">             
                                                <div class="col-lg-4 text-center">    
                                                    <div class="text-center">
                                                        <label class="font-weight-bolder font-size-h6 ">Validasi</label>
                                                    </div>
                                                    <?php if ($letter[0]->status_validasi == 0) { ?>
                                                        <p class="font-weight-boldest display-3 mb-1 text-warning text-center">PROSES VALIDASI</p>
                                                    <?php } elseif ($letter[0]->status_validasi == 1) {
                                                        ?>
                                                        <p class="font-weight-boldest display-3 mb-1 text-success text-center">DISETUJUI</p>

                                                    <?php } elseif ($letter[0]->status_validasi == 2) {
                                                        ?>
                                                        <p class="font-weight-boldest display-3 mb-1 text-danger text-center">DITOLAK</p>
                                                        <?php if ($letter[0]->keterangan != "" || $letter[0]->keterangan != NULL) { ?>
                                                            <p class="font-weight-bold mb-1 text-danger text-center"> "<?php echo $letter[0]->keterangan; ?>"</p>
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
                                                            <input type="text" name="total_pajak_bumi_bangunan" disabled="" value="<?php echo number_format($letter[0]->total_pajak_bumi_bangunan, 0, ',', '.'); ?>" class="form-control  form-control-lg"  placeholder="Isikan Pajak yang dibayar"/>
                                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI,</b> isikan pajak yang dibayar</span>     
                                                        </div>
                                                    </div>                                       
                                                </div>                                    
                                                <div class="col-lg-3 text-center" >    
                                                    <div class="text-center">
                                                        <label class="font-weight-bolder font-size-h6">Pembayaran</label>
                                                    </div>
                                                    <div class=" text-center ">
                                                        <?php if ($letter[0]->status_pembayaran_pajak == 1) { ?>
                                                            <p class="font-weight-boldest display-3 mb-1 text-success text-center">LUNAS</p>
                                                        <?php } else { ?>
                                                            <p class="font-weight-boldest display-3 mb-1 text-danger">BELUM BAYAR</p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Card-->
                            </div>
                        </div>

                    </div>
                    <!--end::Login Sign in form-->
                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
    <div class="modal fade" id="modal_bukti" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto Bukti Surat NJOP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <img alt="Pic" class="col-12" src="<?php echo base_url() . $letter[0]->foto_surat; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Tutup</button>
                </div>
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
    <!--end::Main-->

    <!--begin::Global Config(global config for global JS scripts)-->
    <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle-->

    <!--end::Page Scripts-->
    <script src="<?php echo base_url(); ?>assets/officer/dist/assets/js/dropify.js"></script>

    <script src="<?php echo base_url(); ?>assets/officer/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.js"></script>
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