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

        <style>
            .table {
                display: block; /* important */
                height: 250px;
                overflow-y: scroll;
            }
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
                <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('<?php echo base_url(); ?>assets/client/dist/assets/media/bg/bg-3.jpg');">
                    <div class="login-form text-center p-7 position-relative overflow-hidden">
                        <!--begin::Login Header-->
                        <div class="d-flex flex-center mb-5">
                            <a href="#">
                                <img src="<?php echo base_url() . $page[0]->logo_website; ?>" class="max-h-150px" alt="" />
                            </a>
                        </div>
                        <!--end::Login Header-->
                        <!--begin::Login Sign in form-->
                        <div class="login-signin">
                            <div class="mb-10 ">
                                <p class="font-mobile font-weight-boldest text-warning ">HISTORI LAPORAN ANDA DITEMUKAN </p>
                                <div class="font-weight-bold text-danger font-size-lg">Berikut meurpakan laporan pajak yang telah Anda laporkan di Sistem kami.</div>
                            </div>
                            <div class="table-responsive px-mobile">
                                <?php echo $this->session->flashdata('flash_message'); ?>
                                <table class="table table-light table-light-success text-center">
                                    <thead>
                                        <tr>
                                            <th class="table-center">NOP</th>
                                            <th class="table-center">Nama Pemilik</th>
                                            <th class="table-center">Tahun Pajak</th>
                                            <th class="table-center">Luas Bumi M<sup>2</sup></th>
                                            <th class="table-center">Luas Bangunan M<sup>2</sup></th>
                                            <td class="table-center">Kelas Bumi</td>
                                            <td class="table-center">Kelas Bangunan</td>
                                            <td class="table-center">Total Bayar (Rp)</td>
                                            <td class="table-center">Validasi</td>
                                            <td class="table-center">Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($letter)) {
                                            foreach ($letter as $key => $value) {
                                                ?> 
                                                <tr>
                                                    <td class="font-weight-boldest table-center font-size-sm"><?php echo $value->nomor_nop ?></td>
                                                    <td class="table-center font-size-sm"><?php echo $value->nama_wajib_pajak; ?></td>
                                                    <td class="table-center font-size-sm font-weight-boldest"><?php echo $value->tahun_pajak; ?></td>
                                                    <td class="table-center font-size-sm"><?php echo $value->luas_bumi; ?></td>
                                                    <td class="table-center font-size-sm"><?php echo $value->luas_bangunan; ?></td>
                                                    <td class="table-center font-size-sm"><?php echo $value->kelas_bumi; ?></td>
                                                    <td class="table-center font-size-sm"><?php echo $value->kelas_bangunan; ?></td>
                                                    <td class="table-center font-size-sm">
                                                        <?php if ($value->total_pajak_bumi_bangunan == NULL || $value->total_pajak_bumi_bangunan == "") { ?>
                                                            0
                                                        <?php } else { ?>
                                                            <?php echo number_format($value->total_pajak_bumi_bangunan, 0, ',', '.'); ?>
                                                        <?php } ?>
                                                    <td class="table-center font-size-sm">
                                                        <?php if ($value->status_validasi == 0) { ?>
                                                            <span class="label label-md font-weight-boldest label-warning label-inline">
                                                                DIPROSES
                                                            </span>
                                                        <?php } elseif ($value->status_validasi == 1) {
                                                            ?>
                                                            <span class="label label-md font-weight-boldest label-success label-inline">
                                                                DISETUJUI
                                                            </span>
                                                        <?php } elseif ($value->status_validasi == 2) {
                                                            ?>
                                                            <span class="label label-md font-weight-boldest label-danger label-inline">
                                                                DITOLAK
                                                            </span>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="table-center font-size-sm">
                                                        <a href="#" type="button" class="bt btn-xs font-weight-bold" data-toggle="modal" data-target="#modal_bukti_<?php echo paramEncrypt($value->id_surat); ?>" > <span class="label label-md font-weight-boldest label-primary label-inline">Lihat</span></a>
                                                    </td>
                                                </tr>  
                                                <?php
                                            }  //ngatur nomor urut
                                        }
                                        ?>          
                                    </tbody>                                          
                                </table>
                            </div>
                            <a href="<?php echo site_url('client/home'); ?>" type="button" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4 mt-5"><li class="fa fa-home font-size-h4"></li> Kembali ke Menu</a>
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

                                    <div class="card-body">
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
                                                            <img src="<?php echo base_url() . $value->foto_surat; ?>" class="max-h-100px" alt="" />
                                                        </a>
                                                        <span class="form-text text-dark"><b class="text-danger">*KLIK UNTUK PERBESAR</b></span>                      
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
                <div class="modal fade" id="modal_foto_<?php echo paramEncrypt($value->id_surat); ?>" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Bukti Pajak</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    <img alt="Pic" class="col-12" src="<?php echo base_url() . $value->foto_surat ?>">
                                </div>
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

        <!--begin::Global Config(global config for global JS scripts)-->
        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="<?php echo base_url(); ?>assets/client/dist/assets/plugins/global/plugins.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/client/dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/client/dist/assets/js/scripts.bundle.js"></script>
        <!--end::Global Theme Bundle-->

        <!--end::Page Scripts-->
        <script src="<?php echo base_url(); ?>assets/client/dist/assets/plugins/custom/whatsappchat/whatsapp-chat-support.js"></script>
        <script>
            $('#example_1').whatsappChatSupport();
        </script>
    </body>
    <!--end::Body-->
</html>