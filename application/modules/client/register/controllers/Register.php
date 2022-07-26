<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('RegisterModel');
        $this->load->library('form_validation');
    }

    //
    //---------------------------------LETTER-----------------------------------//
    //
    
    public function list_letter_document() {

        $data['nav_bud'] = 'menu-item-here';
        $data['letter'] = $this->RegisterModel->get_letter_document();

        $this->template->load('template_client/template_client', 'letter_list_document', $data);
    }

    public function check_letter_document() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nomor_nop', 'NOP Pajak', 'required');
        $this->form_validation->set_rules('tahun_pajak', 'Tahun Pajak ', 'required');

        $check_duplicate = $this->RegisterModel->check_letter_duplicate($data['nomor_nop'], $data['tahun_pajak']);
        $check_nop = $this->RegisterModel->check_letter_nop($data['nomor_nop']);

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('client/home');
        } else {

            if ($check_duplicate) {

                $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, Laporan NJOP dengan NOP (" . $data['nomor_nop'] . ") dan Tahun (" . $data['tahun_pajak'] . ") Telah Dilaporkan, Silahkan cek daftar laporan NJOP tahun sebelumnya. Terima Kasih"));
                redirect('client/home');
            } else {

                if ($check_nop) {
                    redirect('client/register/add_letter_document_exist/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                } else {
                    redirect('client/register/add_letter_document_new/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                }
            }
        }
    }

    public function check_nop_letter() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nomor_nop_cek', 'NOP Pajak', 'required');

        $check_nop = $this->RegisterModel->check_letter_nop($data['nomor_nop_cek']);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('client/home');
        } else {
            if ($check_nop) {
                redirect('client/register/list_letter_history/' . paramEncrypt($data['nomor_nop_cek']));
            } else {
                $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, Inputan dengan NOP (" . $data['nomor_nop_cek'] . ") tidak ditemukan, Silahkan cek ulang Inputan Anda"));
                redirect('client/home');
            }
        }
    }

    public function list_letter_history($nop = '') {
        $nop = paramDecrypt($nop);

        $data['title'] = 'SiNJOP | Acitya Tech ';
        $data['nav_bud'] = 'menu-item-here';
        $data['contact'] = $this->RegisterModel->get_contact();
        $data['page'] = $this->RegisterModel->get_page();

        $data['letter'] = $this->RegisterModel->get_letter_by_nop($nop);

        if ($data['letter']) {
            $this->load->view('letter_list_history', $data);
        } else {
            $datas['title'] = 'ERROR | PAGE NOT FOUND';
            $this->load->view('error_404', $datas);
        }
    }

    public function detail_letter_document($id = '') {
        $id = paramDecrypt($id);

        $data['nav_bud'] = 'menu-item-here';
        $data['letter'] = $this->RegisterModel->get_letter_document_id($id); //? 

        if ($data['letter'] == FALSE or empty($id)) {
            $datas['title'] = 'ERROR | PAGE NOT FOUND';
            $this->load->view('error_404', $datas);
        } else {
            $this->template->load('template_client/template_client', 'letter_detail_document', $data);
        }
    }

    public function add_letter_document_exist($nop, $tahun) {
        $nop = paramDecrypt($nop);
        $tahun = paramDecrypt($tahun);

        $data['title'] = 'SiNJOP | Acitya Tech ';
        $data['nav_bud'] = 'menu-item-here';
        $data['contact'] = $this->RegisterModel->get_contact();
        $data['page'] = $this->RegisterModel->get_page();

        $data['nomor_nop'] = $nop;
        $data['tahun_pajak_ext'] = $tahun;
        $data['letter'] = $this->RegisterModel->get_letter_data_by_nop($nop);
        $data['provinsi'] = $this->RegisterModel->get_provinsi();
        $data['key'] = $this->RegisterModel->get_third_party_key(); //?  

        if ($nop && $tahun) {
            $this->load->view('letter_add_document_exist', $data);
        } else {
            $datas['title'] = 'ERROR | PAGE NOT FOUND';
            $this->load->view('error_404', $datas);
        }
    }

    public function add_letter_document_new($nop, $tahun) {
        $nop = paramDecrypt($nop);
        $tahun = paramDecrypt($tahun);

        $data['nav_bud'] = 'menu-item-here';
        $data['title'] = 'SiNJOP | Acitya Tech ';
        $data['contact'] = $this->RegisterModel->get_contact();

        $data['nomor_nop'] = $nop;
        $data['tahun_pajak_ext'] = $tahun;
        $data['letter'] = $this->RegisterModel->get_wilayah_by_nop($data['nomor_nop']);
        $data['provinsi'] = $this->RegisterModel->get_provinsi();
        $data['page'] = $this->RegisterModel->get_page();
        $data['key'] = $this->RegisterModel->get_third_party_key(); //?  

        if ($nop && $tahun) {
            $this->load->view('letter_add_document_new', $data);
        } else {
            $datas['title'] = 'ERROR | PAGE NOT FOUND';
            $this->load->view('error_404', $datas);
        }
    }

    public function register_success($nop, $tahun) {
        $nop = paramDecrypt($nop);
        $tahun = paramDecrypt($tahun);

        $data['title'] = 'SiNJOP | Acitya Tech ';
        $data['contact'] = $this->RegisterModel->get_contact();
        $data['page'] = $this->RegisterModel->get_page();

        $data['letter'] = $this->RegisterModel->check_letter_duplicate($nop, $tahun);

        if ($data) {
            $this->load->view('letter_view_register_success', $data);
        } else {
            $datas['title'] = 'ERROR | PAGE NOT FOUND';
            $this->load->view('error_404', $datas);
        }
    }

    public function check_laporan() {
        $id = $this->input->post('id_surat');
        $nop = $this->input->post('nomor_nop');
        $tahun = $this->input->post('tahun_pajak');

        $id = paramDecrypt($id);

        $check = $this->RegisterModel->check_letter_duplicate($nop, $tahun);
        $check_old = $this->RegisterModel->check_letter_old($id);

        if ($check == TRUE && $id == NULL) {
            $isAvailable = false;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else if ($check == TRUE && ($check_old[0]->nomor_nop != $nop || $check_old[0]->tahun_pajak != $tahun)) {
            $isAvailable = false;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else if ($check == TRUE && $check_old[0]->nomor_nop == $nop && $check_old[0]->tahun_pajak == $tahun) {
            $isAvailable = true;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else if ($check == FALSE) {
            $isAvailable = true;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        }
    }

    public function post_letter_document_exist() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nomor_nop', 'NOP Pajak', 'required');
        $this->form_validation->set_rules('tahun_pajak', 'Tahun Pajak ', 'required');
        $this->form_validation->set_rules('nik_wajib_pajak', 'NIK/Nopel Pemilik Wajib Pajak', 'required');
        $this->form_validation->set_rules('prov_objek_pajak', 'Provinsi Objek Pajak', 'required');
        $this->form_validation->set_rules('kabkot_objek_pajak', 'Kabupaten/Kota Objek Pajak', 'required');
        $this->form_validation->set_rules('kec_objek_pajak', 'Kecamatan Objek Pajak ', 'required');
        $this->form_validation->set_rules('kel_objek_pajak', 'Kelurahan/Desa Objek Pajak', 'required');
        $this->form_validation->set_rules('nama_wajib_pajak', 'Nama Pemilik Wajib Pajak', 'required');
        $this->form_validation->set_rules('prov_wajib_pajak', 'Provinsi Wajib Pajak', 'required');
        $this->form_validation->set_rules('kabkot_wajib_pajak', 'Kabupaten/Kota Wajib Pajak', 'required');
        $this->form_validation->set_rules('kec_wajib_pajak', 'Kecamatan Wajib Pajak', 'required');
        $this->form_validation->set_rules('kel_wajib_pajak', 'Kelurahan/Desa Wajib Pajak', 'required');
        $this->form_validation->set_rules('luas_bumi', 'Luas Bumi', 'required');
        $this->form_validation->set_rules('luas_bangunan', 'Luas Bangunan', 'required');
        $this->form_validation->set_rules('kelas_bumi', 'Kelas Bumi', 'required');
        $this->form_validation->set_rules('kelas_bangunan', 'Kelas Bangunan', 'required');
        $this->form_validation->set_rules('total_pajak_bumi_bangunan', 'Pajak Yang Dibayar', 'required');

        $check = $this->RegisterModel->check_letter_duplicate($data['nomor_nop'], $data['tahun_pajak']);

        $data['status_pembayaran_pajak'] = 0;

        if ($check) {

            $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, Laporan NJOP dengan NOP (" . $data['nomor_nop'] . ") dan Tahun (" . $data['tahun_pajak'] . ") Telah Dilaporkan, Silahkan cek daftar laporan NJOP. Terima Kasih"));
            redirect('client/register/add_letter_document_exist/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
        } else {
            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('client/register/add_letter_document_exist/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
            } else {

                $this->load->library('upload'); //load library upload file
                $this->load->library('image_lib'); //load library image

                if (!empty($_FILES['foto_surat']['tmp_name'])) {

                    $path = 'uploads/laporan/images/';
                    $path_thumb = 'uploads/laporan/images/thumbs/';
                    //config upload file
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = 5048; //set without limit
                    $config['overwrite'] = FALSE; //if have same name, add number
                    $config['remove_spaces'] = TRUE; //change space into _
                    $config['encrypt_name'] = TRUE;
                    //initialize config upload
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('foto_surat')) {//if success upload data
                        $result['upload'] = $this->upload->data();
                        $name = $result['upload']['file_name'];
                        $data['foto_surat'] = $path . $name;

                        $img['image_library'] = 'gd2';
                        $img['source_image'] = $path . $name;
                        $img['new_image'] = $path_thumb . $name;
                        $img['maintain_ratio'] = true;
                        $img['width'] = 1000;
                        $img['height'] = 1000;

                        $this->image_lib->initialize($img);
                        if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                            $data['foto_surat_thumb'] = $path_thumb . $name;
                        } else {
                            $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                            redirect('client/register/add_letter_document_exist/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('client/register/add_letter_document_exist/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                    }
                }
                $input = $this->RegisterModel->insert_letter_document($data);

                if ($input == true) {

                    //$this->apply_proposal($data['nama_anggaran'], $nama_bidang[0]->nama_struktur);
                    $this->send_notification('LAPORAN NJOP BARU', $data['nomor_nop'], $data['nama_wajib_pajak'], site_url("/admin/report/letter/list_letter_document"));

                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil Disubmit, Laporan NJOP dengan NOP ('$data[nomor_nop]') pada Tahun ('$data[tahun_pajak]') telah disimpan. Silahkan cek Laporan NJOP di menu Daftar Laporan NJOP"));
                    redirect('client/register/register_success/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang!'));
                    redirect('client/register/add_letter_document_exist/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                }
            }
        }
    }

    public function post_letter_document_new() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nomor_nop', 'NOP Pajak', 'required');
        $this->form_validation->set_rules('tahun_pajak', 'Tahun Pajak ', 'required');
        $this->form_validation->set_rules('nik_wajib_pajak', 'NIK/Nopel Pemilik Wajib Pajak', 'required');
        $this->form_validation->set_rules('prov_objek_pajak', 'Provinsi Objek Pajak', 'required');
        $this->form_validation->set_rules('kabkot_objek_pajak', 'Kabupaten/Kota Objek Pajak', 'required');
        $this->form_validation->set_rules('kec_objek_pajak', 'Kecamatan Objek Pajak ', 'required');
        $this->form_validation->set_rules('kel_objek_pajak', 'Kelurahan/Desa Objek Pajak', 'required');
        $this->form_validation->set_rules('nama_wajib_pajak', 'Nama Pemilik Wajib Pajak', 'required');
        $this->form_validation->set_rules('prov_wajib_pajak', 'Provinsi Wajib Pajak', 'required');
        $this->form_validation->set_rules('kabkot_wajib_pajak', 'Kabupaten/Kota Wajib Pajak', 'required');
        $this->form_validation->set_rules('kec_wajib_pajak', 'Kecamatan Wajib Pajak', 'required');
        $this->form_validation->set_rules('kel_wajib_pajak', 'Kelurahan/Desa Wajib Pajak', 'required');
        $this->form_validation->set_rules('luas_bumi', 'Luas Bumi', 'required');
        $this->form_validation->set_rules('luas_bangunan', 'Luas Bangunan', 'required');
        $this->form_validation->set_rules('kelas_bumi', 'Kelas Bumi', 'required');
        $this->form_validation->set_rules('kelas_bangunan', 'Kelas Bangunan', 'required');
        $this->form_validation->set_rules('total_pajak_bumi_bangunan', 'Pajak Yang Dibayar', 'required');

        $check = $this->RegisterModel->check_letter_duplicate($data['nomor_nop'], $data['tahun_pajak']);

        $data['status_pembayaran_pajak'] = 0;

        if ($check) {

            $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, Laporan NJOP dengan NOP (" . $data['nomor_nop'] . ") dan Tahun (" . $data['tahun_pajak'] . ") Telah Dilaporkan, Silahkan cek daftar laporan NJOP. Terima Kasih"));
            redirect('client/register/add_letter_document_new/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
        } else {
            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('client/register/add_letter_document_new/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
            } else {

                $this->load->library('upload'); //load library upload file
                $this->load->library('image_lib'); //load library image

                if (!empty($_FILES['foto_surat']['tmp_name'])) {

                    $path = 'uploads/laporan/images/';
                    $path_thumb = 'uploads/laporan/images/thumbs/';
                    //config upload file
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = 5048; //set without limit
                    $config['overwrite'] = FALSE; //if have same name, add number
                    $config['remove_spaces'] = TRUE; //change space into _
                    $config['encrypt_name'] = TRUE;
                    //initialize config upload
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('foto_surat')) {//if success upload data
                        $result['upload'] = $this->upload->data();
                        $name = $result['upload']['file_name'];
                        $data['foto_surat'] = $path . $name;

                        $img['image_library'] = 'gd2';
                        $img['source_image'] = $path . $name;
                        $img['new_image'] = $path_thumb . $name;
                        $img['maintain_ratio'] = true;
                        $img['width'] = 1000;
                        $img['height'] = 1000;

                        $this->image_lib->initialize($img);
                        if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                            $data['foto_surat_thumb'] = $path_thumb . $name;
                        } else {
                            $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                            redirect('client/register/add_letter_document_new/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('client/register/add_letter_document_new/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                    }
                }
                $input = $this->RegisterModel->insert_letter_document($data);

                if ($input == true) {

                    //$this->apply_proposal($data['nama_anggaran'], $nama_bidang[0]->nama_struktur);
                    $this->send_notification('LAPORAN NJOP BARU', $data['nomor_nop'], $data['nama_wajib_pajak'], site_url("/admin/report/letter/list_letter_document"));

                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil Disubmit, Laporan NJOP dengan NOP ('$data[nomor_nop]') pada Tahun ('$data[tahun_pajak]') telah disimpan. Silahkan cek Laporan NJOP di menu Daftar Laporan NJOP"));
                    redirect('client/register/register_success/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang!'));
                    redirect('client/register/add_letter_document_new/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                }
            }
        }
    }

    public function send_notification($title = '', $nop = '', $pemohon = '', $postlink = '') {

        $key = $this->RegisterModel->get_third_party_key(); //?   

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
            "Authorization: Basic " . $key[0]->onesignal_auth . "",
            "Content-Type: application/json;
                charset = utf-8"
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

    //---------------------------------------GET AJAX WILAYAH---------------------------------------//

    public function add_ajax_prov($id_prov = '') {

        $query = $this->db->get('provinsi');
        $data = "<option ></option>";
        foreach ($query->result() as $value) {
            if ($id_prov != '' || $id_prov != NULL) {
                if ($id_prov == $value->id) {
                    $data .= "<option selected value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
                } else {
                    $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
                }
            } else {
                $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
            }
        }
        echo $data;
    }

    public function add_ajax_kab($id_prov = '', $id_kab = '') {

        $query = $this->db->get_where('kota_kabupaten', array('id_provinsi' => $id_prov));
        $data = "<option ></option>";
        foreach ($query->result() as $value) {
            if ($id_kab != '' || $id_kab != NULL) {
                if ($id_kab == $value->id) {
                    $data .= "<option selected value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
                } else {
                    $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
                }
            } else {
                $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
            }
        }
        echo $data;
    }

    function add_ajax_kec($id_kab = '', $id_kec = '') {

        $query = $this->db->get_where('kecamatan', array('id_kota_kabupaten' => $id_kab));
        $data = "<option></option>";
        foreach ($query->result() as $value) {
            if ($id_kec != '' || $id_kec != NULL) {
                if ($id_kec == $value->id) {
                    $data .= "<option selected value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
                } else {
                    $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
                }
            } else {
                $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
            }
        }
        echo $data;
    }

    function add_ajax_des($id_kec = '', $id_des = '') {
        $query = $this->db->get_where('kelurahan', array('id_kecamatan' => $id_kec));
        $data = "<option></option>";
        foreach ($query->result() as $value) {
            if ($id_des != '' || $id_des != NULL) {
                if ($id_des == $value->id) {
                    $data .= "<option selected value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
                } else {
                    $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
                }
            } else {
                $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
            }
        }
        echo $data;
    }

    function add_ajax_des_auto($id_kec = '', $id_des = '') {
        $query = $this->db->get_where('kelurahan', array('id_kecamatan' => $id_kec));
        $data = "<option></option>";
        foreach ($query->result() as $value) {
            if ($id_des != '' || $id_des != NULL) {
                if (strtolower($id_des) == strtolower($value->nama)) {
                    $data .= "<option selected value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
                } else {
                    $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
                }
            } else {
                $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->nama)) . "</option>";
            }
        }
        echo $data;
    }

    //--------------------------------------------------------------------------//
}
