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
                            <a href="" class="text-muted">Pengumuman Website</a>
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
                    <div class="card card-custom" id="kt_form">
                        <div class="card-header">
                            <h3 class="card-title">
                                Edit Pengumuman Website
                            </h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" novalidate="novalidate" action="<?php echo site_url('admin/announcement/announcement/update_announcement'); ?>" enctype="multipart/form-data" method="post" id="kt_add_announcement_form">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label>Nama Pengumuman</label>
                                            <input type="text" name="nama_pengumuman" value="<?php echo $announcement[0]->nama_pengumuman ?>" class="form-control  form-control-lg"  placeholder="Isikan Nama Pengumuman"/>
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Nama Pengumuman</span>               
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Status Pengumuman</label>
                                            <select name="status_pengumuman" class="form-control form-control-lg">
                                                <option value="<?php echo $announcement[0]->status_pengumuman; ?>" selected="">
                                                    <?php
                                                    if ($announcement[0]->status_pengumuman == 1) {
                                                        echo 'Penting';
                                                    } else if ($mailer[0]->status_pengumuman == 2) {
                                                        echo 'Normal';
                                                    }
                                                    ?>
                                                </option>
                                                <option value="1">Penting</option>
                                                <option value="2">Normal</option>                                                
                                            </select> 
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>pilih Status Pengumuman</span>               
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Isi Pengumuman</label>
                                            <textarea class="form-control" id="kt-ckeditor-annnouncement" placeholder="Isikan Pengumuman" name="isi_pengumuman" rows="10"><?php echo $announcement[0]->isi_pengumuman ?></textarea>
                                            <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan Pengumuman </span>               
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
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/custom/login/add-announcement-admin.js"></script>