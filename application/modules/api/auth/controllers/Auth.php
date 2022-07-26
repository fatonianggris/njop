<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require './vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Auth extends RestController {

    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->model('AuthModel');
    }

    public function login_post() {
        $email = $this->post('email');
        $password = $this->post('password');

        if ($email && $password) {
            // Check if the users data store contains users
            $cek_user = $this->AuthModel->check_user($email);

            if ($cek_user) {
                // Users from a data store e.g. database
                $result = array();
                $data_user = $this->AuthModel->data_user($email);

                foreach ($data_user as $key => $value) {
                    $result['status'] = true;
                    $result['user'] = $value;
                }

                if (password_verify($password, $cek_user[0]->password)) {
                    // Set the response and exit
                    $this->response($result, 200);
                } else {
                    // Set the response and exit
                    $this->response([
                        'status' => false,
                        'message' => 'Mohon Maaf, Password anda salah!'
                            ], 404);
                }
            } else {
                // Set the response and exit
                $this->response([
                    'status' => false,
                    'message' => 'Mohon Maaf, Email tidak ditemukan!'
                        ], 404);
            }
        } else {
            $this->response([
                'status' => false,
                'message' => 'Mohon maaf server sedang sibuk!'
                    ], 404);
        }
    }

    public function licensekey_get() {
        $id = $this->get('id_akun');
        $api_key = $this->get('api_key');

        if ($id && $api_key) {

            $cek_auth = $this->AuthModel->check_api_auth($id, $api_key);

            if ($cek_auth) {

                $data = $this->AuthModel->get_license();
                $result = array();
                // Set the response and exit         
                foreach ($data as $key => $value) {
                    $result['status'] = true;
                    $result['license_key'] = $value;
                }

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
                'message' => 'Mohon maaf server sedang sibuk!'
                    ], 404);
        }
    }

}
