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
                            <a href="" class="text-muted">Konfigurasi Halaman</a>
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
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom" id="kt_form" >
                        <div class="card-header">
                            <h3 class="card-title">
                                Edit Konfigurasi Third Party
                            </h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" novalidate="novalidate" action="<?php echo site_url('admin/settings/settings/update_third_party'); ?>" enctype="multipart/form-data" method="post" id="kt_add_page_form">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 text-center">
                                        <div class="form-group">
                                            <h5 class="text-center font-weight-bolder mb-5 text-danger">
                                                MICROBLINK (auto scan ktp)
                                        </div>
                                    </div>    
                                    <div class="col-lg-6 text-center">
                                        <div class="form-group">
                                            <h5 class="text-center font-weight-bolder mb-5 text-danger">
                                                ONE SIGNAL (notifikasi)
                                            </h5>
                                        </div>
                                    </div>   
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Microblink Key</label>
                                            <textarea class="form-control"  placeholder="Isikan Microblink Key" name="microblink_key" rows="4"><?php echo $thirdparty[0]->microblink_key; ?></textarea>
                                            <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan Microblink Key</span>               
                                        </div>
                                    </div>    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>One Signal App ID</label>
                                            <textarea class="form-control"  placeholder="Isikan One Signal App ID" name="onesignal_app_id" rows="4"><?php echo $thirdparty[0]->onesignal_app_id; ?></textarea>
                                            <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan One Signal App ID</span>        
                                        </div>
                                    </div>   
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Expired Key Microblink</label>
                                            <input type="text" id="kt_datepicker_1" name="microblink_key_exp" readonly="" value="<?php echo $thirdparty[0]->microblink_key_exp ?>"  class="form-control  form-control-lg"  placeholder="Pilih Tanggal Microblink Expired"/>
                                            <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan Expired Key Microblink</span>               
                                        </div>
                                    </div>  
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>One Signal Auth Key</label>
                                            <input type="text" name="onesignal_auth" value="<?php echo $thirdparty[0]->onesignal_auth ?>"  class="form-control  form-control-lg"  placeholder="Isikan One Signal Auth Key"/>
                                            <span class="form-text text-dark"><b class="text-dark">*TIDAK WAJIB DIISI, </b>isikan One Signal Auth Key</span>               
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
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/custom/login/add-page-admin.js"></script>