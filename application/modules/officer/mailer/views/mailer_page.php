<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Mail Page</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">               
                <li><a href="#"> Mail Page</a></li>
                <li class="active">Manajemen Mail Page</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row re">
        <div class="col-lg-12 col-md-12">
            <?php echo $this->session->flashdata('flash_message'); ?>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Newsletter</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-email text-info"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->total_newsletter; ?></span> data</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Pelanggan</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-user text-success"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->total_pelanggan; ?></span> data</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /row -->

    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <div class="white-box">
                <a href="" data-toggle="modal" data-target="#petunjuk" class="btn btn-info pull-right m-l-10 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-info m-r-5"></i> Petunjuk</a>
                <a href="" data-toggle="modal" data-target="#edit_mailer" class="btn btn-warning pull-right m-l-10 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-wrench m-r-5"></i>Config Mail </a>
                <h3 class="box-title m-b-0">Konfigurasi Mailer</h3>
                <p class="text-muted m-b-10">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive pro-rd">
                    <table class="table">
                        <tbody class="text-dark">
                            <tr>
                                <td>Nama Pengirim</td>
                                <td><?php echo $mail[0]->nama_pengirim; ?></td>
                            </tr>
                            <tr>
                                <td>Host</td>
                                <td><?php echo $mail[0]->host; ?></td>
                            </tr>
                            <tr>
                                <td>Email Website</td>
                                <td><?php echo $mail[0]->email_website; ?></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><?php echo $mail[0]->password; ?></td>
                            </tr>
                            <tr>
                                <td>Port</td>
                                <td><?php echo $mail[0]->port; ?></td>
                            </tr>
                            <tr>
                                <td>SMTP Auth</td>
                                <td><?php echo $mail[0]->smtp_auth; ?></td>
                            </tr>
                            <tr>
                                <td>SMTP Secure</td>
                                <td><?php echo $mail[0]->smtp_secure; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr class="m-b-10">
                <h3 class="box-title m-b-0">Testing Template Mailer</h3>
                <p class="text-muted m-b-10">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="col-sm-12 m-b-10">
                    <a href="" data-toggle="modal" data-target="#lihat_akun_aktivasi" class="btn btn-warning btn-rounded btn-outline btn-sm hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-mail-reply m-r-5"></i>Akun Aktivasi </a>
                    <a href="" data-toggle="modal" data-target="#lihat_invoice" class="btn btn-info m-l-10 btn-rounded btn-outline btn-sm  hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-mail-reply m-r-5"></i>Invoice </a>
                    <a href="" data-toggle="modal" data-target="#lihat_lupa_password" class="btn btn-success m-l-10 btn-rounded btn-outline hidden-xs btn-sm hidden-sm waves-effect waves-light"><i class="fa fa-mail-reply m-r-5"></i>Lupa Password </a>
                    <a href="" data-toggle="modal" data-target="#lihat_newsletter" class="btn btn-warning m-l-10 btn-rounded btn-outline btn-sm hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-mail-reply m-r-5"></i>Newsletter </a>

                </div>
                <div class="col-sm-12">
                    <a href="" data-toggle="modal" data-target="#lihat_pembayaran" class="btn btn-info btn-rounded btn-outline btn-sm  hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-mail-reply m-r-5"></i>Pembayaran </a>
                    <a href="" data-toggle="modal" data-target="#lihat_pengiriman_konfirmasi" class="btn btn-success m-l-10 btn-rounded btn-outline hidden-xs btn-sm hidden-sm waves-effect waves-light"><i class="fa fa-mail-reply m-r-5"></i>Pengiriman & Konfirmasi </a>
                    <a href="" data-toggle="modal" data-target="#lihat_pesanan" class="btn btn-warning m-l-10 btn-rounded btn-outline btn-sm hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-mail-reply m-r-5"></i>Pesanan </a>
                </div>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="white-box">
                <a href="" data-toggle="modal" data-target="#tambah_newsletter" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Newsletter </a>
                <h3 class="box-title m-b-0">Daftar Newsletter Website</h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive">
                    <table id="kategori" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>                      
                                <th>No.</th>                               
                                <th>Email</th>                              
                                <th>Tanggal Daftar</th>                               
                                <th>Aksi</th>
                            </tr>
                        </thead>                       
                        <tbody>
                            <?php
                            if (!empty($newsletter_user)) {
                                $i = 1;
                                foreach ($newsletter_user as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td><?php echo $i; ?>.</td>
                                        <td><b><?php echo $value->email_user; ?></b></td>
                                        <td><?php echo $value->tanggal_post; ?></td>
                                        <td>
                                            <a onclick="act_delete_newsletter(<?php echo $value->id_newsletter; ?>, '<?php echo strtoupper($value->email_user); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
                                        </td>                                
                                    </tr>                                   
                                    <?php
                                    $i++;
                                }  //ngatur nomor urut
                            }
                            ?>          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>       
    </div>
    <!-- /.row -->
</div>

<!-- /.modal -->
<div id="tambah_newsletter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Newsletter</h4>
                <small>Tambah Email Newsletter </small>
            </div>
            <form class="form" action="<?php echo site_url('mailer/mail/add_email_newsletter'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Email Newsletter</label>
                        <div class="col-10">
                            <input class="form-control" type="email" name="email_user" placeholder="Inputkan Email Newsletter" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                </div>
            </form>                    
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div id="edit_mailer" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Konfigurasi Mailer Website</h4>
                <small>Edit Mailer Website Anda </small>
            </div>
            <form class="form" action="<?php echo site_url('mailer/mail/update_mailer'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Nama Email Pengirim</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="nama_pengirim" value="<?php echo $mail[0]->nama_pengirim; ?>" placeholder="Inputkan Nama Email Pengirim" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "LAZADA.CO.ID"</small>  
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Host</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="host" value="<?php echo $mail[0]->host; ?>" placeholder="Inputkan Host" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "smtp.gmail.com"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Email Website</label>
                        <div class="col-10">
                            <input class="form-control" type="email" name="email_website" value="<?php echo $mail[0]->email_website; ?>" placeholder="Inputkan Email Website" >
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Password Email</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="password" value="<?php echo $mail[0]->password; ?>" placeholder="Inputkan Password" >
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Port</label>
                        <div class="col-10">
                            <input class="form-control" type="number" name="port" value="<?php echo $mail[0]->port; ?>" placeholder="Inputkan Port Mail" >
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "21"</small>  
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label class="col-2 col-form-label">SMTP Auth</label>
                        <div class="col-10">
                            <?php if ($mail[0]->smtp_auth == 'true') { ?>
                                <input type="checkbox" class="smtpauth" checked value="true" name="smtp_auth" data-on-text="TRUE" data-off-text="FALSE" data-on-color="success" data-off-color="default">
                            <?php } else { ?>
                                <input type="checkbox" class="smtpauth" value="false" name="smtp_auth" data-on-text="TRUE" data-off-text="FALSE" data-on-color="success" data-off-color="default">
                            <?php } ?>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>dipilih</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">SMTP Secure</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="smtp_secure" value="<?php echo $mail[0]->smtp_secure; ?>" placeholder="Inputkan Status SMTP Secure" >
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "SSL"</small>  
                        </div>
                    </div>   
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                </div>
            </form>                    
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div id="lihat_akun_aktivasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Template Akun Aktivasi</h4>
                <small>Testing Template Akun Aktivasi</small>
            </div>
            <form class="form" action="<?php echo site_url('mailer/mail/test_akun_aktivasi'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Email Tester</label>
                        <div class="col-10">
                            <input class="form-control" type="email" name="email_user" placeholder="Inputkan Email Tester" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                </div>
            </form>                  
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="lihat_invoice" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Template Invoice</h4>
                <small>Testing Template Invoice</small>
            </div>
            <form class="form" action="<?php echo site_url('mailer/mail/test_invoice'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Email Tester</label>
                        <div class="col-10">
                            <input class="form-control" type="email" name="email_user" placeholder="Inputkan Email Tester" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                </div>
            </form>                 
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="lihat_lupa_password" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Template Lupa Password</h4>
                <small>Testing Template Lupa Password</small>
            </div>
            <form class="form" action="<?php echo site_url('mailer/mail/test_lupa_password'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Email Tester</label>
                        <div class="col-10">
                            <input class="form-control" type="email" name="email_user" placeholder="Inputkan Email Tester" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                </div>
            </form>                 
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="lihat_newsletter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Template Newsletter</h4>
                <small>Testing Template Newsletter</small>
            </div>
            <form class="form" action="<?php echo site_url('mailer/mail/test_newsletter'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Email Tester</label>
                        <div class="col-10">
                            <input class="form-control" type="email" name="email_user" placeholder="Inputkan Email Tester" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                </div>
            </form>                 
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="lihat_pembayaran" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Template Status Pembayaran</h4>
                <small>Testing Template Status Pembayaran</small>
            </div>
            <form class="form" action="<?php echo site_url('mailer/mail/test_pembayaran'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Email Tester</label>
                        <div class="col-10">
                            <input class="form-control" type="email" name="email_user" placeholder="Inputkan Email Tester" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                </div>
            </form>               
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="lihat_pengiriman_konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Template Status Pengiriman & Konfirmasi</h4>
                <small>Testing Template Status Pengiriman & Konfirmasi</small>
            </div>
            <form class="form" action="<?php echo site_url('mailer/mail/test_pengiriman_konfirmasi'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Email Tester</label>
                        <div class="col-10">
                            <input class="form-control" type="email" name="email_user" placeholder="Inputkan Email Tester" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                </div>
            </form>                
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="lihat_pesanan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Template Status Pesanan</h4>
                <small>Testing Template Status Pesanan</small>
            </div>
            <form class="form" action="<?php echo site_url('mailer/mail/test_pesanan'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Email Tester</label>
                        <div class="col-10">
                            <input class="form-control" type="email" name="email_user" placeholder="Inputkan Email Tester" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                </div>
            </form>           
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-switch/bootstrap-switch.min.js"></script>
<script>
</script>
<script>
    $(".smtpauth").bootstrapSwitch();

    $(".smtpauth").on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            $('.smtpauth').attr('value', 'true');
        } else {
            $('.smtpauth').attr('value', 'false');
        }
    });

</script>

<script>
    function act_delete_newsletter(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus Email Newsletter (" + name + ")!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak, batal!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("mailer/mail/delete_newsletter") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Email Newsletter (" + name + ") telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });

            } else {
                swal("Dibatalkan", "Email Newsletter (" + name + ") batal dihapus.", "error");
            }
        });
    }
</script>
