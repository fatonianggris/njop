<!--begin::Content-->
<?php $user = $this->session->userdata('sias-admin'); ?>
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
                            <a href="" class="text-muted">Daftar Surat NJOP</a>
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
                    <!--begin::Entry-->
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <div class="card-header text-center text-lg-left">
                            <div class="card-title">
                                <span class="card-icon">
                                    <i class="flaticon2-layers-1 text-primary"></i>
                                </span>
                                <h3 class="card-label">Daftar Laporan Surat NJOP
                                    <span class="text-muted pt-2 font-size-sm d-block">Silahakan isi formulir tambah surat NJOP sesuai dengan bukti pajak</span>
                                </h3>
                            </div>
                            <div class="card-toolbar">
                                <?php if ($user[0]->id_role_struktur == 1) { ?>
                                    <button type="button" class="btn btn-primary btn-md " data-toggle="modal" data-target="#modal_add_letter" >
                                        <i class="flaticon2-add"></i>Setor Surat
                                    </button>                                   
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Search Form-->
                            <form class="mb-6">
                                <div class="row mb-lg-6">
                                    <div class="col-lg-2 mb-lg-0 mb-6">
                                        <label>Nomor NJOP:</label>
                                        <input type="text" class="form-control datatable-input" placeholder="Inputkan Nomor NJOP" data-col-index="1" />
                                    </div>

                                    <div class="col-lg-2 mb-lg-0 mb-6">
                                        <label>NIK Wajib Pajak:</label>
                                        <input type="text" class="form-control datatable-input" placeholder="Inputkan NIK Wajib Pajak" data-col-index="2" />
                                    </div>
                                    <div class="col-lg-2 mb-lg-0 mb-6">
                                        <label>Nama Wajib Pajak:</label>
                                        <input type="text" class="form-control datatable-input" placeholder="Inputkan Nama Wajib Pajak" data-col-index="3" />
                                    </div>
                                    <div class="col-lg-2 mb-lg-0 mb-6 col-6">
                                        <label>Luas Bumi (M<sup>2</sup>):</label>
                                        <input type="text" class="form-control datatable-input" placeholder="Inputkan Luas Bumi" data-col-index="4" />
                                    </div>
                                    <div class="col-lg-2 mb-lg-0 mb-6 col-6">
                                        <label>Luas Bangunan (M<sup>2</sup>):</label>
                                        <input type="text" class="form-control datatable-input" placeholder="Inputkan Luas Bangunan" data-col-index="5" />
                                    </div>
                                    <div class="col-lg-2 mb-lg-0 mb-6">
                                        <label>Total Pembayaran Pajak:</label>
                                        <input type="text" class="form-control datatable-input" placeholder="Inputkan Total Pembayaran" data-col-index="6" />
                                    </div>
                                </div>
                                <div class="row mb-lg-6">
                                    <div class="col-lg-2 mb-lg-0 mb-6 col-6">
                                        <label>Tahun Pajak:</label>
                                        <input type="text" class="form-control datatable-input" id="kt_datepicker_tahun_pajak" readonly placeholder="Inputkan Tahun Pajak" data-col-index="7" />

                                    </div>
                                    <div class="col-lg-2 mb-lg-0 mb-1 mb-6 col-6">
                                        <label>Status Pembayaran:</label>
                                        <select class="form-control datatable-input" data-col-index="8">
                                            <option value="">Pilih Status Pembayaran</option>
                                            <option value="LUNAS">Lunas</option>
                                            <option value="BELUM BAYAR">Belum Bayar</option>                                           
                                        </select>
                                    </div>
                                    <div class="col-lg-2 mb-lg-0 mb-1 mb-6 col-6">
                                        <label>Status Validasi:</label>
                                        <select class="form-control datatable-input" data-col-index="9">
                                            <option value="">Pilih Status Validasi</option>
                                            <option value="DIPROSES">Diproses</option>
                                            <option value="DISETUJUI">Disetujui</option>      
                                            <option value="DITOLAK">Ditolak</option>      
                                        </select>
                                    </div>
                                    <div class="col-lg-2 mb-lg-0 mb-1 col-6">
                                        <label>Nama Petugas:</label>
                                        <select class="form-control datatable-input" data-col-index="10">
                                            <option value="">Pilih Status Validasi</option>
                                            <?php
                                            if (!empty($officer)) {
                                                foreach ($officer as $key => $value) {
                                                    $word_search = explode(" ", strip_tags($value->nama_akun));
                                                    $limit_word_search = implode(" ", array_splice($word_search, 0, 2));
                                                    ?>
                                                    <option value="<?php echo strtoupper(strtolower($limit_word_search)); ?>"><?php echo strtoupper(strtolower($limit_word_search)); ?></option>                                                        
                                                    <?php
                                                }  //ngatur nomor urut
                                            }
                                            ?>         
                                        </select>
                                    </div>
                                </div>
                                <div class="row text-lg-left text-center">
                                    <div class="col-lg-9 col-12 mt-lg-3 mt-3">
                                        <button class="btn btn-primary btn-primary--icon" id="kt_search">
                                            <span>
                                                <i class="la la-search"></i>
                                                <span>Cari</span>
                                            </span>
                                        </button>&#160;&#160;
                                        <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                                            <span>
                                                <i class="la la-close"></i>
                                                <span>Reset</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="col-lg-2 text-lg-right text-left col-6 mt-lg-3 mt-6">
                                        <div class="btn-group">
                                            <button class="btn btn-primary font-weight-bold " type="button"  aria-haspopup="true" aria-expanded="true">
                                                <i class="flaticon2-plus-1"></i>
                                                Import
                                            </button>                                            
                                        </div>
                                    </div>
                            </form>     
                            <div class="col-lg-1 col-6 text-lg-left text-right mt-lg-3 mt-6">
                                <div class="btn-group">
                                    <button class="btn btn-warning font-weight-bold dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="flaticon2-download"></i>
                                        Export
                                    </button>
                                    <div class="dropdown-menu">
                                        <form class="form" id="frm-excel" action="<?php echo site_url('admin/report/export/export_data_csv'); ?>" method="POST">  
                                            <input type="text" id="id_check_excel" class="form-control" value="" name="data_check" style="display:none">                         
                                            <button class="dropdown-item" role="button" type="submit"><i class="flaticon2-checking"></i> Laporan .csv</button>
                                        </form>
<!--                                                <form class="form" id="frm-form" action="<?php echo site_url('ppdb/admission/export_student_formulir'); ?>" method="POST">  
<input type="text" id="id_check_form" class="form-control" value="" name="data_check" style="display:none">                         
<button class="dropdown-item" role="button" type="submit"><i class="flaticon-doc"></i> Laporan .pdf</button>
</form>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--begin: Datatable-->
                        <!--begin: Datatable-->
                        <table class="table table-separate table-hover table-light-warning table-checkable" id="kt_datatable">
                            <thead>
                                <tr>
                                    <th class="text-center"></th>
                                    <th>Nomor NJOP</th>
                                    <th>NIK Wajib Pajak</th>
                                    <th>Nama Wajib Pajak</th>
                                    <th>L. Bumi (M<sup>2</sup>)</th>
                                    <th>L. Bangunan (M<sup>2</sup>)</th>
                                    <th>Total Bayar</th>
                                    <th>Th Pajak</th>
                                    <th>Status Bayar</th>  
                                    <th>Validasi</th>  
                                    <th>Petugas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($letter)) {
                                    foreach ($letter as $key => $value) {
                                        ?>
                                        <tr>
                                            <td><?php echo $value->id_surat; ?></td>
                                            <td class="font-weight-bolder text-primary"><?php echo (($value->nomor_nop)); ?></td>
                                            <td class="font-weight-bolder "><?php echo $value->nik_wajib_pajak; ?></td>
                                            <td class="font-weight-bolder"><?php echo ucwords(strtolower($value->nama_wajib_pajak)); ?></td>
                                            <td class="font-weight-bolder">
                                                <?php if ($value->luas_bumi == NULL || $value->luas_bumi == "") { ?>
                                                    0
                                                <?php } else { ?>
                                                    <?php echo number_format($value->luas_bumi, 0, ',', '.'); ?>
                                                <?php } ?>
                                            </td>
                                            <td class="font-weight-bolder">
                                                <?php if ($value->luas_bangunan == NULL || $value->luas_bangunan == "") { ?>
                                                    0
                                                <?php } else { ?>
                                                    <?php echo number_format($value->luas_bangunan, 0, ',', '.'); ?>
                                                <?php } ?>
                                            </td>
                                            <td class="font-weight-bolder">
                                                <?php if ($value->total_pajak_bumi_bangunan == NULL || $value->total_pajak_bumi_bangunan == "") { ?>
                                                    0
                                                <?php } else { ?>
                                                    <?php echo number_format($value->total_pajak_bumi_bangunan, 0, ',', '.'); ?>
                                                <?php } ?>
                                            </td>
                                            <td class="font-weight-bolder"><?php echo $value->tahun_pajak; ?></td>
                                            <td class="font-weight-bolder"><?php echo $value->status_pembayaran_pajak; ?></td>
                                            <td class="font-weight-bolder "><?php echo $value->status_validasi; ?></td>
                                            <?php
                                            $words = explode(" ", strip_tags($value->nama_akun));
                                            $limit_word = implode(" ", array_splice($words, 0, 2));
                                            ?>
                                            <td class="font-weight-bolder text-warning"><?php echo strtoupper(strtolower($limit_word)); ?></td>

                                            <td nowrap="nowrap">
                                                <div class="dropdown dropdown-inline">
                                                    <a href="javascript:;" class="btn btn-xs  btn-clean btn-icon btn-outline-primary" data-toggle="dropdown">
                                                        <i class="la la-cog"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                        <ul class="nav nav-hover flex-column">
                                                            <?php if ($value->status_validasi == 0) { ?>
                                                                <li class="nav-item"><a class="nav-link" href="javascript:act_confirm_letter('<?php echo paramEncrypt($value->id_surat); ?>', '<?php echo strtoupper($value->nomor_nop); ?>', '<?php echo strtoupper($value->nama_wajib_pajak); ?>')"><i class="nav-icon la la-handshake text-success"></i><span class="nav-text text-success font-weight-bold text-hover-primary">Setujui Surat</span></a></li>
                                                                <li class="nav-item"><a class="nav-link" href="javascript:act_reject_letter('<?php echo paramEncrypt($value->id_surat); ?>', '<?php echo strtoupper($value->nomor_nop); ?>', '<?php echo strtoupper($value->nama_wajib_pajak); ?>')"><i class="nav-icon la la-close text-danger"></i><span class="nav-text text-danger font-weight-bold text-hover-primary">Tolak Surat</span></a></li>
                                                            <?php } else if ($value->status_validasi == 1) { ?>
                                                                <li class="nav-item"><a class="nav-link" href="javascript:act_reject_letter('<?php echo paramEncrypt($value->id_surat); ?>', '<?php echo strtoupper($value->nomor_nop); ?>', '<?php echo strtoupper($value->nama_wajib_pajak); ?>')"><i class="nav-icon la la-close text-danger"></i><span class="nav-text text-danger font-weight-bold text-hover-primary">Tolak Surat</span></a></li>
                                                            <?php } else if ($value->status_validasi == 2) { ?>
                                                                <li class="nav-item"><a class="nav-link" href="javascript:act_confirm_letter('<?php echo paramEncrypt($value->id_surat); ?>', '<?php echo strtoupper($value->nomor_nop); ?>', '<?php echo strtoupper($value->nama_wajib_pajak); ?>')"><i class="nav-icon la la-handshake text-success"></i><span class="nav-text text-success font-weight-bold text-hover-primary">Setujui Surat</span></a></li>
                                                            <?php } ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url("/admin/report/letter/detail_letter_document/" . paramEncrypt($value->id_surat)); ?>"><i class="nav-icon la la-eye "></i><span class="nav-text text-hover-primary font-weight-bold">Lihat Surat</span></a></li>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url("/admin/report/letter/edit_letter_document/" . paramEncrypt($value->id_surat)); ?>"><i class="nav-icon la la-pencil-ruler text-warning"></i><span class="nav-text text-warning font-weight-bold text-hover-primary">Edit Surat</span></a></li>
                                                            <li class="nav-item"><a class="nav-link" href="javascript:act_delete_letter('<?php echo paramEncrypt($value->id_surat); ?>', '<?php echo strtoupper($value->nomor_nop); ?>', '<?php echo strtoupper($value->nama_wajib_pajak); ?>')"><i class="nav-icon la la-trash text-danger"></i><span class="nav-text text-danger font-weight-bold text-hover-primary">Hapus Surat</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }  //ngatur nomor urut
                                }
                                ?>         
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th class="font-weight-bolder text-danger"><b>TOTAL</b></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th class="font-weight-bolder text-danger">Dana Eksternal</th>
                                    <th class="font-weight-bolder text-danger">Dana Acc</th>
                                    <th class="font-weight-bolder text-danger"></th>
                                    <th></th>
                                    <th></th>   
                                    <th></th>  
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        <!--end: Datatable-->
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>

<!--end::Entry-->
<input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</div>
<!--end::Content-->
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/crud/datatables/search-options/document-letter.js">
</script>

<script>

    function act_reject_letter(id, nop, name) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin MENOLAK Laporan Surat atas nama " + name + " (" + nop + ")?",
            icon: "warning",
            input: 'textarea',
            inputLabel: 'Keterangan',
            inputPlaceholder: 'Masukkan alasan ditolak',
            inputAttributes: {
                'aria-label': 'Masukkan alasan ditolak'
            },
            inputValidator: (value) => {
                if (!value) {
                    return 'Keterangan diperlukan!'
                }
            },
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, tolak!",
            cancelButtonText: "Tidak, batal!",
            showLoaderOnConfirm: true,
            closeOnConfirm: false,
            closeOnCancel: true,
            preConfirm: (text) => {
                return $.ajax({
                    type: "post",
                    url: "<?php echo site_url("admin/report/letter/reject_letter_document") ?>",
                    data: {id: id, keterangan: text, [csrfName]: csrfHash},
                    dataType: 'html',
                    success: function (result) {
                        Swal.fire("Ditolak!", "Laporan Surat Nama " + name + " (" + nop + ") telah ditolak.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        console.log(result);
                        Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
                    }
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then(function (result) {
            if (!result.isConfirm) {
                Swal.fire("Dibatalkan!", "Penolakan Laporan Surat atas nama " + name + " (" + nop + ") dibatalkan.", "error");
            }
        });
    }
</script>
<script>
    function act_confirm_letter(id, nop, name) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin MENYETUJUI Laporan Surat atas nama " + name + " (" + nop + ")?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, setuju!",
            cancelButtonText: "Tidak, batal!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("/admin/report/letter/confirm_letter_document") ?>",
                    data: {id: id, [csrfName]: csrfHash},
                    dataType: 'html',
                    success: function (result) {
                        Swal.fire("Disetujui!", "Laporan Surat atas nama " + name + " (" + nop + ") telah disetujui.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        console.log(result);
                        Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
                    }
                });

            } else {
                Swal.fire("Dibatalkan!", "Surat atas nama " + name + " (" + nop + ") batal disetujui.", "error");
            }
        });
    }
</script>


<script>
    function act_delete_letter(id, nop, name) {
        var csrfName = $('.txt_csrfname').attr('name');
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash

        Swal.fire({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin menghapus Surat atas nama " + name + " (" + nop + ")?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak, batal!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("/admin/report/letter/delete_letter_document") ?>",
                    data: {id: id, [csrfName]: csrfHash},
                    dataType: 'html',
                    success: function (result) {
                        Swal.fire("Terhapus!", "Surat atas nama " + name + " (" + nop + ") telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        console.log(result);
                        Swal.fire("Opsss!", "Koneksi Internet Bermasalah.", "error");
                    }
                });

            } else {
                Swal.fire("Dibatalkan!", "Surat atas nama " + name + " (" + nop + ") batal dihapus.", "error");
            }
        });
    }
</script>