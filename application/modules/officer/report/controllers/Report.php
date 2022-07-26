<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('ReportModel');
        $this->load->library('form_validation');
        $this->user_officer = $this->session->userdata("sias-officer");

        if ($this->session->userdata('sias-officer') == FALSE) {
            redirect('officer/auth');
        }
    }

    //
    //---------------------------------LETTER-----------------------------------//
    //
    
    public function list_letter_document() {
        $data['title'] = 'SiNJOP | Acitya Tech ';
        $data['letter'] = $this->ReportModel->get_letter_document($this->user_officer[0]->id_akun);
        $data['officer'] = $this->ReportModel->get_officer();
        $data['contact'] = $this->ReportModel->get_contact();
        $data['page'] = $this->ReportModel->get_page();

        $this->load->view('letter_list_document', $data);
    }

    public function check_letter_document() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nomor_nop', 'NOP Pajak', 'required');
        $this->form_validation->set_rules('tahun_pajak', 'Tahun Pajak ', 'required');

        $check_duplicate_own = $this->ReportModel->check_letter_duplicate_own($this->user_officer[0]->id_akun, $data['nomor_nop'], $data['tahun_pajak']);
        $check_duplicate_not_own = $this->ReportModel->check_letter_duplicate_not_own($this->user_officer[0]->id_akun, $data['nomor_nop'], $data['tahun_pajak']);
        $check_nop = $this->ReportModel->check_letter_nop($data['nomor_nop']);

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('officer/dashboard');
        } else {

            if ($check_duplicate_own) {

                $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, Laporan NJOP dengan NOP (" . $data['nomor_nop'] . ") dan Tahun (" . $data['tahun_pajak'] . ") Telah Dilaporkan, Silahkan cek daftar laporan NJOP tahun sebelumnya. Terima Kasih"));
                redirect('officer/dashboard');
            } else {
                if ($check_duplicate_not_own) {

                    $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, Laporan NJOP dengan NOP (" . $data['nomor_nop'] . ") dan Tahun (" . $data['tahun_pajak'] . ") Telah Dilaporkan oleh Petugas (" . strtoupper(strtolower($check_duplicate_not_own[0]->nama_akun)) . "), Jika ada kendala hubungi Admin. Terima Kasih"));
                    redirect('officer/dashboard');
                } else {
                    if ($check_nop) {

                        redirect('officer/report/add_letter_document_exist/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                    } else {
                        redirect('officer/report/add_letter_document_new/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                    }
                }
            }
        }
    }

    public function check_nop_letter() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nomor_nop_cek', 'NOP Pajak', 'required');

        $check_nop = $this->ReportModel->check_letter_nop($data['nomor_nop_cek']);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('officer/dashboard');
        } else {
            if ($check_nop) {
                redirect('officer/report/list_letter_history/' . paramEncrypt($data['nomor_nop_cek']));
            } else {
                $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, Inputan dengan NOP (" . $data['nomor_nop_cek'] . ") tidak ditemukan, Silahkan cek ulang Inputan Anda"));
                redirect('officer/dashboard');
            }
        }
    }

    public function list_letter_history($nop = '') {
        $nop = paramDecrypt($nop);

        $data['title'] = 'SiNJOP | Acitya Tech ';
        $data['nav_bud'] = 'menu-item-here';
        $data['contact'] = $this->ReportModel->get_contact();
        $data['page'] = $this->ReportModel->get_page();

        $data['letter'] = $this->ReportModel->get_letter_by_nop($nop, $this->user_officer[0]->id_akun);
        $data['info'] = $this->ReportModel->get_letter_data_by_nop($nop);

        if ($data['letter']) {
            $this->load->view('letter_list_history', $data);
        } else {
            $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, Inputan dengan NOP (" . $nop . ") tidak ditemukan, Silahkan cek ulang Inputan Anda"));
            redirect('officer/dashboard');
        }
    }

    public function detail_letter_document($id = '') {
        $id = paramDecrypt($id);

        $data['title'] = 'SiNJOP | Acitya Tech ';
        $data['contact'] = $this->ReportModel->get_contact();
        $data['page'] = $this->ReportModel->get_page();
        $data['letter'] = $this->ReportModel->get_letter_document_id($id); //? 

        if ($data['letter'] == FALSE or empty($id)) {
            $datas['title'] = 'ERROR | PAGE NOT FOUND';
            $this->load->view('error_404', $datas);
        } else {
            $this->load->view('letter_detail_document', $data);
        }
    }

    public function add_letter_document_exist($nop, $tahun) {
        $nop = paramDecrypt($nop);
        $tahun = paramDecrypt($tahun);

        $data['title'] = 'SiNJOP | Acitya Tech ';

        $data['contact'] = $this->ReportModel->get_contact();
        $data['page'] = $this->ReportModel->get_page();

        $data['nomor_nop'] = $nop;
        $data['tahun_pajak_ext'] = $tahun;
        $data['letter'] = $this->ReportModel->get_letter_data_by_nop($nop);
        $data['provinsi'] = $this->ReportModel->get_provinsi();
        $data['key'] = $this->ReportModel->get_third_party_key(); //?  

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

        $data['title'] = 'SiNJOP | Acitya Tech ';
        $data['contact'] = $this->ReportModel->get_contact();

        $data['nomor_nop'] = $nop;
        $data['tahun_pajak_ext'] = $tahun;
        $data['letter'] = $this->ReportModel->get_wilayah_by_nop($data['nomor_nop']);
        $data['provinsi'] = $this->ReportModel->get_provinsi();
        $data['page'] = $this->ReportModel->get_page();
        $data['key'] = $this->ReportModel->get_third_party_key(); //?  

        if ($nop && $tahun) {
            $this->load->view('letter_add_document_new', $data);
        } else {
            $datas['title'] = 'ERROR | PAGE NOT FOUND';
            $this->load->view('error_404', $datas);
        }
    }

    public function edit_letter_document($id = '') {
        $id = paramDecrypt($id);

        $data['title'] = 'SiNJOP | Acitya Tech ';
        $data['letter'] = $this->ReportModel->get_letter_document_id($id);
        $data['provinsi'] = $this->ReportModel->get_provinsi();
        $data['key'] = $this->ReportModel->get_third_party_key(); //?  

        if ($data['letter'] == FALSE or empty($id)) {
            $datas['title'] = 'ERROR | PAGE NOT FOUND';
            $this->load->view('error_404', $datas);
        } else {
            if ($id && $data) {
                $this->load->view('letter_edit_document', $data);
            } else {
                $datas['title'] = 'ERROR | PAGE NOT FOUND';
                $this->load->view('error_404', $datas);
            }
        }
    }

    public function report_success($nop, $tahun) {
        $nop = paramDecrypt($nop);
        $tahun = paramDecrypt($tahun);

        $data['title'] = 'SiNJOP | Acitya Tech ';
        $data['contact'] = $this->ReportModel->get_contact();
        $data['page'] = $this->ReportModel->get_page();

        $data['letter'] = $this->ReportModel->check_letter_duplicate_own($this->user_officer[0]->id_akun, $nop, $tahun);

        if ($data) {
            $this->load->view('letter_view_report_success', $data);
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

        $check = $this->ReportModel->check_letter_duplicate_own($this->user_officer[0]->id_akun, $nop, $tahun);
        $check_old = $this->ReportModel->check_letter_old($id);

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

        $check = $this->ReportModel->check_letter_duplicate_own($this->user_officer[0]->id_akun, $data['nomor_nop'], $data['tahun_pajak']);

        if (!isset($data['status_pembayaran_pajak'])) {
            $data['status_pembayaran_pajak'] = 0;
        }

        if ($check) {

            $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, Laporan NJOP dengan NOP (" . $data['nomor_nop'] . ") dan Tahun (" . $data['tahun_pajak'] . ") Telah Dilaporkan, Silahkan cek daftar laporan NJOP. Terima Kasih"));
            redirect('officer/report/add_letter_document_exist/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
        } else {
            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('officer/report/add_letter_document_exist/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
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
                            redirect('officer/report/add_letter_document_exist/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('officer/report/add_letter_document_exist/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                    }
                }
                $input = $this->ReportModel->insert_letter_document($this->user_officer[0]->id_akun, $data);

                if ($input == true) {

                    //$this->apply_proposal($data['nama_anggaran'], $nama_bidang[0]->nama_struktur);
                    $this->send_notification('LAPORAN NJOP BARU', $data['nomor_nop'], $data['nama_wajib_pajak'], site_url("/officer/report/list_letter_document"));

                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil Disubmit, Laporan NJOP dengan NOP ('$data[nomor_nop]') pada Tahun ('$data[tahun_pajak]') telah disimpan. Silahkan cek Laporan NJOP di menu Daftar Laporan NJOP"));
                    redirect('officer/report/report_success/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang!'));
                    redirect('officer/report/add_letter_document_exist/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
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

        $check = $this->ReportModel->check_letter_duplicate_own($this->user_officer[0]->id_akun, $data['nomor_nop'], $data['tahun_pajak']);

        if (!isset($data['status_pembayaran_pajak'])) {
            $data['status_pembayaran_pajak'] = 0;
        }

        if ($check) {

            $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, Laporan NJOP dengan NOP (" . $data['nomor_nop'] . ") dan Tahun (" . $data['tahun_pajak'] . ") Telah Dilaporkan, Silahkan cek daftar laporan NJOP. Terima Kasih"));
            redirect('officer/report/add_letter_document_new/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
        } else {
            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('officer/report/add_letter_document_new/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
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
                            redirect('officer/report/add_letter_document_new/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('officer/report/add_letter_document_new/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                    }
                }
                $input = $this->ReportModel->insert_letter_document($this->user_officer[0]->id_akun, $data);

                if ($input == true) {

                    //$this->apply_proposal($data['nama_anggaran'], $nama_bidang[0]->nama_struktur);
                    $this->send_notification('LAPORAN NJOP BARU', $data['nomor_nop'], $data['nama_wajib_pajak'], site_url("/officer/report/list_letter_document"));

                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil Disubmit, Laporan NJOP dengan NOP ('$data[nomor_nop]') pada Tahun ('$data[tahun_pajak]') telah disimpan. Silahkan cek Laporan NJOP di menu Daftar Laporan NJOP"));
                    redirect('officer/report/report_success/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang!'));
                    redirect('officer/report/add_letter_document_new/' . paramEncrypt($data['nomor_nop']) . '/' . paramEncrypt($data['tahun_pajak']));
                }
            }
        }
    }

    public function update_letter_document($id = '') {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $id = paramDecrypt($id);

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

        $check = $this->ReportModel->check_letter_duplicate_own($this->user_officer[0]->id_akun, $data['nomor_nop'], $data['tahun_pajak']);
        $get_old_name = $this->ReportModel->get_old_name_letter($id);

        $data['foto_surat'] = $data['foto_surat_old'];

        $file_old = explode('/', $data['foto_surat_old']);
        $file_name_old = $file_old[3];

        if (!isset($data['status_pembayaran_pajak'])) {
            $data['status_pembayaran_pajak'] = 0;
        }

        if ($check == TRUE && strtoupper(strtolower($data['nomor_nop'])) != strtoupper(strtolower($get_old_name[0]->nomor_nop))) {

            $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, Laporan NJOP dengan NOP (" . $data['nomor_nop'] . ") dan Tahun (" . $data['tahun_pajak'] . ") Telah Dilaporkan, Silahkan cek daftar laporan NJOP. Terima Kasih"));
            redirect('officer/report/edit_letter_document/' . paramEncrypt($id));
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('officer/report/edit_letter_document/' . paramEncrypt($id));
            } else {
                $this->load->library('upload'); //load library upload file
                $this->load->library('image_lib'); //load library image

                if (!empty($_FILES['foto_surat']['tmp_name'])) {

                    $this->delete_bukti_surat_lama($file_name_old); //delete existing file

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
                            redirect('officer/report/edit_letter_document/' . paramEncrypt($id));
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('officer/report/edit_letter_document/' . paramEncrypt($id));
                    }
                }
                $update = $this->ReportModel->update_letter_document($id, $data);

                if ($update == true) {

                    //$this->apply_proposal($data['nama_anggaran'], $nama_bidang[0]->nama_struktur);
                    //$this->send_notification('REVISI PROPOSAL', $data['nama_anggaran'], $nama_bidang[0]->nama_struktur, site_url("/officer/detail_letter_fondation/" . paramEncrypt($id)));

                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil Diupdate, Laporan NJOP dengan NOP ('$data[nomor_nop]') pada Tahun ('$data[tahun_pajak]') telah diupdate."));
                    redirect('officer/report/edit_letter_document/' . paramEncrypt($id));
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang!'));
                    redirect('officer/report/edit_letter_document/' . paramEncrypt($id));
                }
            }
        }
    }

    public function delete_letter_document() {
        $id = $this->input->post('id');
        $id = paramDecrypt($id);

        $letter = $this->ReportModel->get_letter_document_id($id);

        $file_surat = explode('/', $letter[0]->foto_surat);
        $file_name_surat = $file_surat[3];

        $file_ktp = explode('/', $letter[0]->foto_ktp);
        $file_name_ktp = $file_ktp[3];

        $delete = $this->ReportModel->delete_letter_document($id);

        if ($delete == true) {
            $this->delete_bukti_surat_lama($file_name_surat);
            $this->delete_bukti_surat_lama($file_name_ktp);

            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Laporan NOJP Telah Terhapus.."));
            redirect('officer/report/list_letter_document');
        } else {

            $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan...'));
            redirect('officer/report/list_letter_document');
        }
    }

    public function delete_bukti_surat_lama($name = '') {
        $path = 'uploads/laporan/images/';
        $path_thumb = 'uploads/laporan/images/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    public function send_notification($title = '', $nop = '', $pemohon = '', $postlink = '') {

        $key = $this->ReportModel->get_third_party_key(); //?   

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
