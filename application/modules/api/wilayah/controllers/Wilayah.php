<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require './vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Wilayah extends RestController {

    function __construct() {
        // Construct the parent class
        parent::__construct();

        $this->load->model('WilayahModel');
    }

    /**
     * METHOD/FUNCTION JOBS CRUD
     */
    // GET WILAYAH PROV
    public function getprovinsi_get() {

        $data ['result'] = $this->WilayahModel->get_provinsi();
        if ($data) {
            // Set the response and exit             
            $this->output
                    ->set_status_header(200)
                    ->set_header('Cache-Control: no-store, no-cache, must-revalidate')
                    ->set_header('Cache-Control: post-check=0, pre-check=0')
                    ->set_header('Pragma: no-cache')
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        } else {
            // Set the response and exit
            $this->set_response([
                'status' => FALSE,
                'message' => 'Data tidak ditemukan'
                    ], 404); // NOT_FOUND (404) being the HTTP response code
        }
    }

    // GET WILAYAH KAB
    public function getkabupaten_get() {
        $id_provinsi = $this->get('id_provinsi');

        if (!$id_provinsi) {
            $this->set_response([
                'status' => FALSE,
                'message' => 'ID/Kode salah'], 404);
        } else {
            $data ['result'] = $this->WilayahModel->get_kabupaten($id_provinsi);
            if ($data) {
                // Set the response and exit             
                $this->output
                        ->set_status_header(200)
                        ->set_header('Cache-Control: no-store, no-cache, must-revalidate')
                        ->set_header('Cache-Control: post-check=0, pre-check=0')
                        ->set_header('Pragma: no-cache')
                        ->set_content_type('application/json', 'utf-8')
                        ->set_output(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
            } else {
                // Set the response and exit
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'Data tidak ditemukan'
                        ], 404); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }

    // GET WILAYAH KEC
    public function getkecamatan_get() {

        $id_kabupaten = $this->get('id_kabupaten');

        if (!$id_kabupaten) {
            $this->set_response([
                'status' => FALSE,
                'message' => 'ID/Kode salah'], 404);
        } else {
            $data ['result'] = $this->WilayahModel->get_kecamatan($id_kabupaten);
            if ($data) {
                // Set the response and exit             
                $this->output
                        ->set_status_header(200)
                        ->set_header('Cache-Control: no-store, no-cache, must-revalidate')
                        ->set_header('Cache-Control: post-check=0, pre-check=0')
                        ->set_header('Pragma: no-cache')
                        ->set_content_type('application/json', 'utf-8')
                        ->set_output(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
            } else {
                // Set the response and exit
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'Data tidak ditemukan'
                        ], 404); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }

    // GET WILAYAH KEL
    public function getkelurahan_get() {

        $id_kecamatan = $this->get('id_kecamatan');

        if (!$id_kecamatan) {
            $this->set_response([
                'status' => FALSE,
                'message' => 'ID/Kode salah'], 404);
        } else {
            $data ['result'] = $this->WilayahModel->get_kelurahan($id_kecamatan);
            if ($data) {
                // Set the response and exit             
                $this->output
                        ->set_status_header(200)
                        ->set_header('Cache-Control: no-store, no-cache, must-revalidate')
                        ->set_header('Cache-Control: post-check=0, pre-check=0')
                        ->set_header('Pragma: no-cache')
                        ->set_content_type('application/json', 'utf-8')
                        ->set_output(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
            } else {
                // Set the response and exit
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'Data tidak ditemukan'
                        ], 404); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }

}
