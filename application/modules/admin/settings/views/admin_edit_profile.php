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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Pengaturan</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Edit Profile</a>
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
                        <div class="card-header">
                            <h3 class="card-title">
                                Edit Akun Profile
                            </h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" novalidate="novalidate" action="<?php echo site_url('admin/settings/account/update_account_profile/' . paramEncrypt($account[0]->id_akun)); ?>" enctype="multipart/form-data" method="post" id="kt_edit_profile_form">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Nama Lengkap Anda</label>
                                            <input type="text" name="nama_akun" value="<?php echo $account[0]->nama_akun; ?>" class="form-control form-control-lg"  placeholder="Isikan Nama Akun"/>
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Nama akun</span>               
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>NIK KTP</label>
                                            <input type="text" name="nik" id="kt_input_nik" class="form-control form-control-lg" value="<?php echo $account[0]->nik; ?>" placeholder="Isikan NIK KTP"/>
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan NIK KTP</span>               
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Email Akun</label>
                                            <input type="text" name="email_akun" value="<?php echo $account[0]->email_akun; ?>" class="form-control  form-control-lg"  placeholder="Isikan Email Akun"/>
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Email Akun</span>               
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>Nomor Handphone</label>
                                            <input type="text" name="nomor_handphone_akun" value="<?php echo $account[0]->nomor_handphone_akun; ?>" class="form-control  form-control-lg"  placeholder="Isikan Nomor Handphone"/>
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Nomor Handphone</span>               
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control form-control-lg">
                                                <?php
                                                if ($account[0]->jenis_kelamin == 1) {
                                                    echo 'Laki-Laki';
                                                } else if ($account[0]->jenis_kelamin == 2) {
                                                    echo 'Perempuan';
                                                }
                                                ?>  
                                                <option value="1">Laki-Laki</option>
                                                <option value="2">Perempuan</option>
                                            </select> 
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Nomor Handphone</span>               
                                        </div>
                                    </div>
                                    <div class="col-lg-2 mb-3" >
                                        <label>Ubah password?</label>
                                        <div class="input-group">
                                            <input data-switch="true" class="ubahpass" data-size="large" type="checkbox" data-on-text="Ya"  data-off-text="Tidak" />
                                        </div>
                                        <span class="form-text text-dark"><b class="text-danger"></b>*Aktifkan jika ingin mengubah password</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Password Baru</label>
                                            <input type="password" name="password" class="form-control  form-control-lg"  placeholder="Isikan Password Baru" />
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Password Baru</span>               
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Konfirmasi Password Baru</label>
                                            <input type="password" name="cf_password" class="form-control  form-control-lg"  placeholder="Isikan Password Baru" />
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Password Baru</span>               
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Foto KTP</label>
                                            <input type="hidden" name="img_foto_ktp" value="<?php echo $account[0]->foto_ktp ?>" style="display:none" />
                                            <input type="hidden" name="img_foto_ktp_thumb" value="<?php echo $account[0]->foto_ktp_thumb; ?>" style="display:none" />
                                            <input type="file" class="dropify" name="foto_ktp" data-default-file="<?php echo site_url($account[0]->foto_ktp); ?>" data-max-file-size="5M" data-height="200" data-allowed-file-extensions="png jpg jpeg" />

                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>File berformat png,jpg,jpeg kurang dari 5Mb.</span>               
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>API KEY</label>
                                            <textarea class="form-control form-control-solid" placeholder="Isi api key" name="api_key" rows="7" readonly=""><?php echo $account[0]->api_key; ?></textarea>
                                            <span class="form-text text-dark"><b class="text-dark">*AUTO GENERATE API KEY </b></span>               
                                        </div>
                                    </div>  
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" placeholder="Isikan Alamat" name="alamat" rows="10"><?php echo $account[0]->alamat; ?></textarea>
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Alamat Akun</span>               
                                        </div>
                                    </div>   
                                </div>
                            </div>
                            <div class="card-footer">
                                <button id="kt_login_signin_submit" class="btn btn-success font-weight-bold px-9 py-4 col-lg-1 col-12">Simpan</button>
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
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/custom/login/edit-profile.js"></script>
