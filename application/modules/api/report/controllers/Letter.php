<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require './vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Letter extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('LetterModel');
    }

    //
    //---------------------------------LETTER-----------------------------------//
    //
    
     public function detailletter_get() {

        $id = $this->get('id_surat');
        $api_key = $this->get('api_key');

        if ($id && $api_key) {

            $cek_auth = $this->LetterModel->check_api_auth($api_key);

            if ($cek_auth) {

                $data = $this->LetterModel->get_letter_document_id($id);

                if ($data) {

                    $result = array();
                    // Set the response and exit          
                    foreach ($data as $key => $value) {
                        $result['status'] = TRUE;
                        $result['detail_surat'] = $value;
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
                'message' => 'Mohon Maaf, ID tidak ditemukan!'
                    ], 404);
        }
    }

    public function listletter_get() {

        $api_key = $this->get('api_key');

        if ($api_key) {

            $cek_auth = $this->LetterModel->check_api_auth($api_key);

            if ($cek_auth) {

                $data = $this->LetterModel->get_letter_document();

                if ($data) {

                    $result = array();
                    // Set the response and exit          
                    foreach ($data as $key => $value) {
                        $result['status'] = TRUE;
                        $result['list_surat'] = $value;
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
                'message' => 'Mohon Maaf, ID tidak ditemukan!'
                    ], 404);
        }
    }

    public function searchletter_get() {

        $nop = $this->get('nop');
        $api_key = $this->get('api_key');

        if ($nop && $api_key) {

            $cek_auth = $this->LetterModel->check_api_auth($api_key);

            if ($cek_auth) {

                $data = $this->LetterModel->get_letter_data_by_nop($nop);

                if ($data) {

                    $result = array();
                    // Set the response and exit          
                    foreach ($data as $key => $value) {
                        $result['status'] = TRUE;
                        $result['cari_surat'] = $value;
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
                'message' => 'Mohon Maaf, ID tidak ditemukan!'
                    ], 404);
        }
    }

    public function checkletter_get() {

        $nop = $this->get('nop');
        $tahun = $this->get('tahun_pajak');
        $api_key = $this->get('api_key');

        if ($nop && $api_key && $tahun) {

            $cek_auth = $this->LetterModel->check_api_auth($api_key);

            if ($cek_auth) {

                $data = $this->LetterModel->check_letter_by_nop_year($nop, $tahun);

                if ($data) {

                    $result = array();
                    // Set the response and exit          
                    foreach ($data as $key => $value) {
                        $result['status'] = true;
                        $result['cek_surat'] = $value;
                    }
                    // Set the response and exit
                    $this->response($result, 200);
                } else {
                    // Set the response and exit
                    $this->response([
                        'status' => true,
                        'message' => 'Data laporan surat baru!'
                            ], 200);
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
                'message' => 'Mohon Maaf, ID tidak ditemukan!'
                    ], 404);
        }
    }

    //INSERT
    public function addletter_post() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $foto_surat = $this->post('foto_surat');
        $foto_surat_thumb = $this->post('foto_surat_thumb');

        $nama_foto_surat = strtolower($this->post('nama_foto_surat'));

        $check = $this->LetterModel->check_letter_duplicate($data['nomor_nop'], $data['tahun_pajak']);

        if ($check) {

            $this->response([
                'status' => false,
                'message' => 'Mohon Maaf, Laporan dengan NOP & Tahun tersebut telah dilaporkan!'
                    ], 404);
        } else {

            if ($nama_foto_surat != '' || $nama_foto_surat == NULL) {

                $path = 'uploads/laporan/images/' . $nama_foto_surat . '.png';
                $path_thumb = 'uploads/laporan/images/thumbs/' . $nama_foto_surat . '.png';

                file_put_contents($path, base64_decode($foto_surat));
                file_put_contents($path_thumb, base64_decode($foto_surat_thumb));

                $data['foto_surat'] = $path;
                $data['foto_surat_thumb'] = $path_thumb;
            }

            $input = $this->LetterModel->insert_letter_document($data);

            if ($input == true) {

                $this->send_notification('LAPORAN NJOP BARU', $data['nomor_nop'], $data['nama_wajib_pajak'], site_url("/admin/report/letter/list_letter_document"));

                $this->set_response([
                    'status' => TRUE,
                    'message' => 'Berhasil, Data telah tersimpan'], 200);
            } else {

                $this->set_response([
                    'status' => FALSE,
                    'message' => 'Mohon maaf, server sedang sibuk'], 404);
            }
        }
    }

    // UPDATE 
    public function updateletter_post() {

        $id_surat = $this->put('id_surat');

        $param = $this->input->put();
        $data = $this->security->xss_clean($param);

        $foto_surat = $this->post('foto_surat');
        $foto_surat_thumb = $this->post('foto_surat_thumb');
        $nama_foto_surat = strtolower($this->post('nama_foto_surat'));

        $check = $this->LetterModel->check_letter_duplicate($data['nomor_nop'], $data['tahun_pajak']);

        if ($check) {

            $this->response([
                'status' => false,
                'message' => 'Mohon Maaf, Laporan dengan NOP & Tahun tersebut telah dilaporkan!'
                    ], 404);
        } else {

            if ($nama_foto_surat != '' || $nama_foto_surat == NULL) {

                $this->delete_bukti_surat_lama($foto_surat);

                $path = 'uploads/laporan/images/' . $nama_foto_surat . '.png';
                $path_thumb = 'uploads/laporan/images/thumbs/' . $nama_foto_surat . '.png';

                file_put_contents($path, base64_decode($foto_surat));
                file_put_contents($path_thumb, base64_decode($foto_surat_thumb));

                $data['foto_surat'] = $path;
                $data['foto_surat_thumb'] = $path_thumb;
            }

            $update = $this->LetterModel->update_letter_document($id_surat, $data);

            if ($update == true) {
                $this->set_response([
                    'status' => true,
                    'message' => 'berhasil, Data telah diupdate'], 202);
            } else {
                $this->set_response([
                    'status' => false,
                    'message' => 'Mohon maaf, terjadi kesalahan.'], 404);
            }
        }
    }

    // DELETE
    public function deleteletter_delete() {

        $id = $this->delete('id_surat');

        if ($id) {
            // get the data by id
            $letter = $this->LetterModel->get_letter_document_id($id);

            $file_surat = explode('/', $letter[0]->foto_surat);
            $file_name_surat = $file_surat[3];

            $file_ktp = explode('/', $letter[0]->foto_ktp);
            $file_name_ktp = $file_ktp[3];

            $delete = $this->LetterModel->delete_letter_document($id);

            if ($delete) {

                $this->delete_bukti_surat_lama($file_name_surat);
                $this->delete_bukti_surat_lama($file_name_ktp);

                // data is found                
                $this->set_response([
                    'status' => TRUE,
                    'message' => 'Berhasil, Data telah dihapus!'], 200);
            } else {
                // required post params is missing
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'ID tidak ditemukan!'], 404);
            }
        } else {
            // required post params is missing
            $this->set_response([
                'status' => FALSE,
                'message' => 'Mohon maaf, server sedang sibuk!'], 404);
        }
    }

    public function send_notification($title = '', $nop = '', $pemohon = '', $postlink = '') {

        $key = $this->LetterModel->get_third_party_key(); //?   

        $data = array(
            "app_id" => $key[0]->onesignal_app_id,
            "included_segments" => array('All'),
            "headings" => array(
                "en" => "$title"
            ),
            "contents" => array(
                "en" => "NOP: $nop - ($pemohon)"
            ),
            "url" => "$postlink"
        );

        // Print Output in JSON Format
        $data_string = json_encode($data);

        // API URL
        $url = "https://onesignal.com/api/v1/notifications";

        //Curl Headers
        $headers = array
            (
            'Authorization: Basic NmIwYjFjOGMtMjkxMC00ZTM2LWE1NDctYWQxZjZmN2U4OWJj',
            'Content-Type: application/json;
                charset = utf-8'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        // Variable for Print the Result
        $response = curl_exec($ch);

        curl_close($ch);

        if ($response) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function delete_bukti_surat_lama($name = '') {
        $path = 'uploads/laporan/images/';
        $path_thumb = 'uploads/laporan/images/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    //--------------------------------------------------------------------------//
}
