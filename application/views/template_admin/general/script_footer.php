<div class="modal fade" id="modal_add_letter"  data-keyboard="false" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalSizeLg" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cek Setor Laporan Surat Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form class="form" method="POST" action="<?php echo site_url('admin/report/letter/check_letter_document'); ?>" id="kt_check_letter">
                <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">                   
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="form-group">
                                <label class="font-weight-bolder">NOP</label>             
                                <input type="text" id="kt_input_nop_cek" name="nomor_nop_cek" class="form-control form-control-lg " placeholder="Inputkan NOP Surat" >
                                <span class="form-text text-dark"><b class="text-danger">*WAJIB DIISI, </b>isikan NOP Surat terdiri dari 18 digit</span>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="font-weight-bolder">Tahun Pajak</label>
                                <input type="text" name="tahun_pajak_cek" readonly="" id="kt_datepicker_tahun_cek" class="input-reset form-control form-control-lg"  placeholder="Tahun Pajak"/>
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
</div>
<script>var HOST_URL = "<?php echo base_url(); ?>";</script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/custom/login/check_letter_njop.js"></script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Page Vendors(used by this page)-->
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/features/calendar/basic.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/crud/forms/widgets/select2.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/crud/forms/widgets/jquery-mask.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/crud/forms/widgets/bootstrap-daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/crud/forms/widgets/bootstrap-maxlength.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/crud/file-upload/image-input-emp.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/widgets.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/crud/forms/editors/ckeditor-classic.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/pages/features/miscellaneous/sweetalert2.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/dropify.js"></script>

<!-- Magnific popup JavaScript -->
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/plugins/custom/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/plugins/custom/magnific-popup/dist/jquery.magnific-popup-init.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/plugins/custom/owlcarousel/dist/owl.carousel.js"></script>
<script>
    $('.dropify').dropify({
    messages: {
    'default': 'Klik atau Geser file Anda disini',
            'replace': 'Klik atau Geser file Anda untuk mengganti',
            'remove': 'Hapus',
            'error': 'Ooops, terjadi kesalahan.'
    }
    });
</script>
