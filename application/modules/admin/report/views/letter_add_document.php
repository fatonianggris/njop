<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">

                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Laporan</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Tambah Surat NJOP</a>
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
            <?php echo $this->session->flashdata('flash_message'); ?>
            <!--end::Notice-->
            <div class="row">
                <div class="col-lg-12" id="kt_form" >
                    <!--begin::Card-->
                    <div class="card card-custom" >
                        <div class="card-header mt-2">
                            <div class="card-title">
                                <span class="card-icon">
                                    <i class="flaticon2-add text-primary"></i>
                                </span>
                                <h3 class="card-label">
                                    Formulir Tambah Laporan NJOP
                                    <span class="text-muted pt-2 font-size-sm d-block">Silahakan isi formulir tambah surat NJOP sesuai dengan bukti pajak</span>
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form class="form" novalidate="novalidate" action="<?php echo site_url('admin/report/letter/post_letter_document'); ?>" enctype="multipart/form-data" method="post" id="kt_add_letter_form">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="card-body">
                                <div class="row border-bottom">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="font-weight-bolder">NOP</label>
                                            <input type="text" id="kt_input_nop" name="nomor_nop" class="form-control form-control-lg"  placeholder="Isikan NOP Surat"/>
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan NOP Surat</span>               
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="font-weight-bolder">Tahun</label>
                                            <input type="text" name="tahun_pajak" readonly="" id="kt_datepicker_tahun" class="input-reset form-control form-control-lg"  placeholder="Isikan Tahun Pajak"/>
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Tahun Pajak</span>               
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="font-weight-bolder">NIK/NOPEL</label>
                                            <input type="text" name="nik_wajib_pajak" id="kt_input_nik" class="form-control form-control-lg"  placeholder="Isikan NIK/NOPEL"/>
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan NIK/Nopel pemilik</span>               
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
                                                <textarea class="form-control" placeholder="Isikan Nama Jalan dan Kode Khusus" name="letak_objek_pajak" rows="2"></textarea>
                                                <span class="form-text text-dark"><b class="text-dark">*OPSIONAL, </b>isikan Nama Jalan/RT/RW & Kode Khusus</span>               
                                            </div>                                            
                                            <div class="form-group col-lg-6">
                                                <label>Provinsi</label>
                                                <select name="prov_objek_pajak" id="provinsi_ob"  class="form-control form-control-lg select2">
                                                    <option value="">Pilih Provinsi</option>
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
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Provinsi objek berada</span>               
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Kabupaten/Kota</label>
                                                <select name="kabkot_objek_pajak" id="kabupaten_kota_ob" class="form-control form-control-lg">
                                                    <option value="">Pilih Kabupaten/Kota</option>

                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Kabupaten/Kota objek berada</span>               
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Kecamatan</label>
                                                <select name="kec_objek_pajak" id="kecamatan_ob" class="form-control form-control-lg">
                                                    <option value="">Pilih Kecamatan</option>

                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Kecamatan objek berada</span>               
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Kelurahan/Desa</label>
                                                <select name="kel_objek_pajak" id="kelurahan_desa_ob" class="form-control form-control-lg">
                                                    <option value="">Pilih Kelurahan/Desa</option>

                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Kelurahan/Desa objek berada</span>               
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
                                                <textarea class="form-control" placeholder="Isikan Nama Jalan/ Nomor Rumah" name="alamat_wajib_pajak" rows="2"></textarea>
                                                <span class="form-text text-dark"><b class="text-dark">*OPSIONAL, </b>isikan Nama Jalan/Nomor Rumah & RT/RW</span>               
                                            </div>
                                            <div class="col-lg-5 col-12">
                                                <div class="form-group">
                                                    <label>Nama Pemilik</label>
                                                    <input type="text" name="nama_wajib_pajak" class="form-control  form-control-lg"  placeholder="Isikan Nama Pemilik"/>
                                                    <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI,</b> isikan Nama Pemilik</span>               
                                                </div>
                                            </div>                                            
                                            <div class="form-group col-lg-6">
                                                <label>Provinsi</label>
                                                <select name="prov_wajib_pajak" id="provinsi_pem" class="form-control form-control-lg">
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
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Provinsi sesuai KTP</span>               
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Kabupaten/Kota</label>
                                                <select name="kabkot_wajib_pajak" id="kabupaten_kota_pem" class="form-control form-control-lg">
                                                    <option value="">Pilih Kabupaten/Kota</option>

                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Kabupaten/Kota sesuai KTP</span>               
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Kecamatan</label>
                                                <select name="kec_wajib_pajak" id="kecamatan_pem" class="form-control form-control-lg">
                                                    <option value="">Pilih Kecamatan</option>

                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Kecamatan sesuai KTP</span>               
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Kelurahan/Desa</label>
                                                <select name="kel_wajib_pajak" id="kelurahan_desa_pem" class="form-control form-control-lg">
                                                    <option value="">Pilih Kelurahan/Desa</option>

                                                </select>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Kelurahan/Desa sesuai KTP </span>               
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
                                                <input type="text" name="luas_bumi" class="form-control  form-control-lg"  placeholder="Isikan Luas Bumi"/>
                                                <span class="form-text text-dark text-left"><b class="text-danger">*WAJIB DIISI, </b>Luas Bumi</span>     
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-group">                                                
                                                <input type="text" name="luas_bangunan" class="form-control  form-control-lg"  placeholder="Isikan Luas Bangunan"/>
                                                <span class="form-text text-dark text-left"><b class="text-danger">*WAJIB DIISI, </b>Luas Bangunan</span>     
                                            </div>
                                        </div>                                       
                                    </div>        
                                    <div class="col-lg-2 col-6 ">                                        
                                        <div class="">
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <label class="font-weight-bolder font-size-h6 ">Kelas</label>
                                                </div>
                                                <input type="text" name="kelas_bumi" class="form-control  form-control-lg"  placeholder="Isikan Kelas Bumi"/>
                                                <span class="form-text text-dark text-left"><b class="text-danger">*WAJIB DIISI,</b> Kelas Bumi</span>     
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-group">                                                
                                                <input type="text" name="kelas_bangunan" class="form-control  form-control-lg"  placeholder="Isikan Kelas Bangunan"/>
                                                <span class="form-text text-dark text-left"><b class="text-danger">*WAJIB DIISI,</b> Kelas Bangunan</span>     
                                            </div>
                                        </div>
                                    </div>     
                                    <div class="col-lg-2 text-center">                                        
                                        <div class="">
                                            <div class="form-group">
                                                <label class="font-weight-bolder font-size-h6">NJOP Per M<sup>2</sup> (RP)</label>
                                                <input type="text" name="harga_meter_njop_bumi" readonly="" value="0" class="form-control  form-control-lg form-control-solid"  placeholder="Isikan Harga/M Bumi"/>
                                                <span class="form-text text-dark text-left"><b class="text-dark">*OPSIONAL,</b> tidak diisi</span>   
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-group">                                                
                                                <input type="text" name="harga_meter_njop_bangunan" readonly="" value="0" class="form-control  form-control-lg form-control-solid"  placeholder="Isikan Harga/M Bangunan"/>
                                                <span class="form-text text-dark text-left"><b class="text-dark">*OPSIONAL,</b> tidak diisi</span>   
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="col-lg-2 text-center">                                        
                                        <div class="">
                                            <div class="form-group">
                                                <label class="font-weight-bolder font-size-h6">Total NJOP (RP)</label>
                                                <input type="text" name="total_njop_bumi" readonly="" value="0" class="form-control form-control-lg form-control-solid"  placeholder="Isikan Total Bumi"/>
                                                <span class="form-text text-dark text-left"><b class="text-dark">*OPSIONAL,</b> tidak diisi</span>   
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-group">                                                
                                                <input type="text" name="total_njop_bangunan" readonly="" value="0" class="form-control  form-control-lg form-control-solid"  placeholder="Isikan Total Bangunan"/>
                                                <span class="form-text text-dark text-left"><b class="text-dark">*OPSIONAL,</b> tidak diisi</span>               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 text-center">                                        
                                        <div class="">
                                            <div class="form-group">
                                                <label class="font-weight-bolder font-size-h6">Upload Bukti Pajak</label>
                                                <input type="file" class="dropify" name="foto_surat" data-max-file-size="1M" data-height="120" data-allowed-file-extensions="png jpg jpeg" />
                                                <span class="form-text text-dark"><b class="text-dark">*OPSIONAL, </b>File berformat png,jpg,jpeg kurang dari 5Mb.</span>               
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="mt-5 row">                                
                                    <div class="col-lg-4 text-center">                                                                                                          
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group text-right">
                                            <h6 class="text-center font-weight-bolder mt-4">
                                                Pajak yang dibayar
                                            </h6>                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-3">                                        
                                        <div class="">
                                            <div class="form-group">
                                                <input type="text" name="total_pajak_bumi_bangunan" class="form-control  form-control-lg"  placeholder="Isikan Pajak yang dibayar"/>
                                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI,</b> isikan pajak yang dibayar</span>     
                                            </div>
                                        </div>                                       
                                    </div> 
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <h6 class="text-center font-weight-bolder mt-4">
                                                Lunas ?
                                            </h6>                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-2 text-center" >                                        
                                        <div class="input-group text-center">
                                            <input data-switch="true" checked name="status_pembayaran_pajak" value="1" class="lunas" data-size="large" type="checkbox" data-on-text="Ya" data-on-color="success" data-off-color="danger" data-off-text="Tidak" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button id="kt_login_signin_submit" class="btn btn-success font-weight-bold px-3 py-4 my-3 col-lg-1 col-12">Simpan</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/custom/login/add-letter-njop.js">
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
    $(document).ready(function () {
        var id_prov_ob;
        var id_kab_ob;
        var id_kec_ob;

        $("#provinsi_ob").change(function () {
            id_prov_ob = $(this).val();
            var url = "<?php echo site_url('admin/report/letter/add_ajax_kab'); ?>/" + id_prov_ob;
            $('#kabupaten_kota_ob').load(url);
            return false;
        });
        $("#kabupaten_kota_ob").change(function () {
            id_kab_ob = $(this).val();
            var url = "<?php echo site_url('admin/report/letter/add_ajax_kec'); ?>/" + id_kab_ob;
            $('#kecamatan_ob').load(url);
            return false;
        });
        $("#kecamatan_ob").change(function () {
            id_kec_ob = $(this).val()
            var url = "<?php echo site_url('admin/report/letter/add_ajax_des'); ?>/" + id_kec_ob;
            $('#kelurahan_desa_ob').load(url);
            return false;
        });

        var id_prov_pem;
        var id_kab_pem;
        var id_kec_pem;
        $("#provinsi_pem").change(function () {
            id_prov_pem = $(this).val();
            var url = "<?php echo site_url('admin/report/letter/add_ajax_kab'); ?>/" + id_prov_pem;
            $('#kabupaten_kota_pem').load(url);
            return false;
        });
        $("#kabupaten_kota_pem").change(function () {
            id_kab_pem = $(this).val();
            var url = "<?php echo site_url('admin/report/letter/add_ajax_kec'); ?>/" + id_kab_pem;
            $('#kecamatan_pem').load(url);
            return false;
        });
        $("#kecamatan_pem").change(function () {
            id_kec_pem = $(this).val()
            var url = "<?php echo site_url('admin/report/letter/add_ajax_des'); ?>/" + id_kec_pem;
            $('#kelurahan_desa_pem').load(url);
            return false;
        });
    });
</script>