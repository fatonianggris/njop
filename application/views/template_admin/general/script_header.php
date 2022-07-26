<head>
    <?php $user = $this->session->userdata('sias-admin'); ?>
    <?php $key = $this->db->get_where('third_party', array('id_third_party' => 1))->result(); ?>
    <base href="">
    <meta charset="utf-8" />
    <title>SiNJOP| Acitya Tech</title>
    <meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="acityatechnology.com" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="<?php echo base_url(); ?>assets/admin/dist/assets/css/pages/wizard/wizard-2.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/admin/dist/assets/css/pages/fonts/dropify.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/dist/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!-- Popup CSS -->
    <link href="<?php echo base_url(); ?>assets/admin/dist/assets/plugins/custom/magnific-popup/dist/magnific-popup.css" rel="stylesheet">

    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?php echo base_url(); ?>assets/admin/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/dist/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="<?php echo base_url(); ?>assets/admin/dist/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/dist/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/dist/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/dist/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/dist/assets/media/logos/favicon.ico" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/assets/plugins/custom/owlcarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/assets/plugins/custom/owlcarousel/dist/assets/owl.theme.default.css">
    <style>
        .select2-container {
            box-sizing: border-box;
            display: block;
            margin: 0;
            position: relative;
            vertical-align: middle;
        }
        .select2-container--default .select2-selection--single,
        .select2-container--default .select2-selection--multiple {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #E4E6EF;
            outline: none !important;
            border-radius: 0.42rem;
            height: auto;
            line-height: 0;
            padding: 0.23rem 0.42rem;
            background: #F3F6F9;
        }

        .blockquote {
            margin-bottom: 1rem;
            font-size: 1rem;
        }


        .select2-container--default.select2-container--disabled .select2-selection--multiple, .select2-container--default.select2-container--disabled .select2-selection--single {
            cursor: not-allowed;
            background-color: #f3f6f9;
            opacity: 1;
        }

        .container-xxl, .container-xl, .container-lg, .container-md, .container-sm, .container {
            max-width: 99%;
        }

        .dataTables_scrollBody::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
            border-radius: 10px;
        }


        .dataTables_scrollBody::-webkit-scrollbar {
            width: 6px;
            background-color: #F5F5F5;
        }

        .dataTables_scrollBody::-webkit-scrollbar-thumb {
            background-color: #777;
            border-radius: 10px;
        }
        .table.table-separate th:last-child, .table.table-separate td:last-child {
            padding-right: 5px !important;
        }
        .table.table-separate th:first-child, .table.table-separate td:first-child{
            padding-left: 5px !important;
        }

        .dropdown-menu > li > a, .dropdown-menu > .dropdown-item {
            outline: none !important;
            display: inline-block;
            flex-grow: 1;
        }

        scroller::-webkit-scrollbar {
            display: none; 
        }

        .swal2-container .swal2-html-container {
            max-height: max-content;
            overflow: auto;
        }

        .form-control-lg-swal {
            height: calc(1.5em + 1.65rem + 2px);   
            font-size: 1.08rem;
            line-height: 1.5;
            border-radius: 0.42rem;
        }
        .modal-file {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1070;
            display: none;
            width: 100%;
            height: 100%;
            overflow: hidden;
            outline: 0;
        }
        .dz-preview .dz-image img{
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
        }
        .border {
            border: 2px solid #adaeb4 !important;
        }
    </style>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        var OneSignal = window.OneSignal || [];
        var initConfig = {
            appId: "<?php echo $key[0]->onesignal_app_id; ?>",
            safari_web_id: "<?php echo $key[0]->onesignal_app_id_safari; ?>",
            notifyButton: {
                enable: true,
                size: 'medium', /* One of 'small', 'medium', or 'large' */
                theme: 'default', /* One of 'default' (red-white) or 'inverse" (white-red) */
                position: 'bottom-left',
                text: {
                    'tip.state.unsubscribed': 'Kilk untuk mendapatkan notifikasi',
                    'tip.state.subscribed': "Anda telah mengaktifkan notifikasi",
                    'tip.state.blocked': "Anda memblokir notifikasi",
                    'message.prenotify': 'Kilk untuk mendapatkan notifikasi',
                    'message.action.subscribed': "Terima kasih telah menambahkan notifikasi!",
                    'message.action.resubscribed': "Anda telah mengaktifkan notifikasi",
                    'message.action.unsubscribed': "Anda tidak akan mendapatkan notifikasi",
                    'dialog.main.title': 'KELOLA NOTIFIKASI',
                    'dialog.main.button.subscribe': 'AKTIFKAN',
                    'dialog.main.button.unsubscribe': 'NON-AKTIFKAN',
                    'dialog.blocked.title': 'Unblock Notifikasi',
                    'dialog.blocked.message': "Ikuti intruksi untuk mengaktifkan notifikasi:"
                },
            },
        };
        OneSignal.push(function () {
            OneSignal.SERVICE_WORKER_PARAM = {scope: '/push/onesignal/'};
            OneSignal.SERVICE_WORKER_PATH = 'push/onesignal/OneSignalSDKWorker.js'
            OneSignal.SERVICE_WORKER_UPDATER_PATH = 'push/onesignal/OneSignalSDKUpdaterWorker.js'
            OneSignal.init(initConfig);
        });
    </script>
</head>
<!--begin::Global Theme Bundle(used by all pages)-->
<script type="module" src="https://unpkg.com/@microblink/blinkid-in-browser-sdk@5.15.0/ui/dist/blinkid-in-browser/blinkid-in-browser.esm.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/dist/assets/plugins/global/plugins.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/js/scripts.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/plugins/custom/datatables/datatables.bundle.js"></script> 
<script src="<?php echo base_url(); ?>assets/admin/dist/assets/plugins/custom/datatables/dataTables.checkboxes.min.js"></script>


<!--end::Global Theme Bundle-->