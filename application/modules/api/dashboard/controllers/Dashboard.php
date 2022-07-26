<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require './vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Dashboard extends RestController {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('DashboardModel');
    }

    //
    //-------------------------------DASHBOARD------------------------------//
    //
    
    public function dashboard_get() {
        $id = $this->get('id_akun');
        $api_key = $this->get('api_key');

        if ($id && $api_key) {

            $cek_auth = $this->AuthModel->check_api_auth($id, $api_key);

            if ($cek_auth) {

                $data['total_pembayaran'] = $this->DashboardModel->get_total_pembayaran();
                $data['total_akun_surat'] = $this->DashboardModel->get_total_akun_surat();

                if ($data) {

                    $result = array();
                    foreach ($data as $key => $value) {
                        $result['status'] = true;
                        $result['dashboard'] = $value;
                    }
                    // Set the response and exit
                    $this->response($result, 200);
                } else {
                    // Set the response and exit
                    $this->response([
                        'status' => false,
                        'message' => 'Mohon Maaf, data tidak ditemukan!'
                            ], 404);
                }
            } else {

                $this->response([
                    'status' => false,
                    'message' => 'Mohon Maaf, ID tidak ditemukan!'
                        ], 404);
            }
        } else {
            $this->response([
                'status' => false,
                'message' => 'Mohon maaf server sedang sibuk!'
                    ], 404);
        }
    }

    //-----------------------------------------------------------------------//
}
