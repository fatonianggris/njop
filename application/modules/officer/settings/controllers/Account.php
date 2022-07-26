<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-officer') == FALSE) {
            redirect('officer/auth');
        }
        $this->user_officer = $this->session->userdata("sias-officer");
        $this->load->model('AccountModel');
        $this->load->library('form_validation');
    }

    //
    //-------------------------------DATA AKUN ADMIN------------------------------//
    //
    

    public function edit_profile() {

        $data['title'] = 'SiNJOP | Acitya Tech ';
        $data['account'] = $this->AccountModel->get_account_id($this->user_officer[0]->id_akun); //? 
        $data['structure'] = $this->AccountModel->get_structure_account();
        $data['contact'] = $this->AccountModel->get_contact();
        $data['page'] = $this->AccountModel->get_page();

        $check = $this->AccountModel->get_account_id($this->user_officer[0]->id_akun);

        if ($check == FALSE or empty($this->user_officer[0]->id_akun)) {
            $this->load->view('error_404', $data);
        } else {
            $this->load->view('officer_edit_profile', $data);
        }
    }

    public function check_email_akun() {

        $email = $this->input->post('email_akun');
        $check = $this->AccountModel->get_email_akun($email);

        if ($check) {
            $isAvailable = false;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        } else {
            $isAvailable = true;
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        }
    }

    public function update_account_profile() {
        $id = $this->user_officer[0]->id_akun;
        
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_akun', 'Nama Akun', 'required');
        $this->form_validation->set_rules('nik', 'NIK KTP', 'required');
        $this->form_validation->set_rules('email_akun', 'Email Akun ', 'required');
        $this->form_validation->set_rules('nomor_handphone_akun', 'Nomor Handphone Akun', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $data['foto_ktp'] = $data['img_foto_ktp'];
        $data['foto_ktp_thumb'] = $data['img_foto_ktp_thumb'];
        $image_old = explode('/', $data['img_foto_ktp']);
        $image_name_old = $image_old[3];

        $get_name = $this->AccountModel->get_account_id($id);
        $check = $this->AccountModel->check_account_duplicate($data['email_akun']);

        if ($check == TRUE && $data['email_akun'] != $get_name[0]->email_akun) {

            $this->session->set_flashdata('flash_message', warn_msg("Mohon Maaf, Email tersebut Telah Tersedia..."));
            redirect('officer/settings/account/edit_profile/');
        } else {
            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('officer/settings/account/edit_profile/');
            } else {
                $this->load->library('upload'); //load library upload file
                $this->load->library('image_lib'); //load library image

                if (!empty($_FILES['foto_ktp']['tmp_name'])) {

                    $this->delete_ktp_photo($image_name_old); //delete existing file

                    $path = 'uploads/pendaftaran/images/';
                    $path_thumb = 'uploads/pendaftaran/images/thumbs/';
                    //config upload file
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = 5048; //set without limit
                    $config['overwrite'] = FALSE; //if have same name, add number
                    $config['remove_spaces'] = TRUE; //change space into _
                    $config['encrypt_name'] = TRUE;
                    //initialize config upload
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('foto_ktp')) {//if success upload data
                        $result['upload'] = $this->upload->data();
                        $name = $result['upload']['file_name'];
                        $data['foto_ktp'] = $path . $name;

                        $img['image_library'] = 'gd2';
                        $img['source_image'] = $path . $name;
                        $img['new_image'] = $path_thumb . $name;
                        $img['maintain_ratio'] = true;
                        $img['width'] = 1000;
                        $img['height'] = 1000;

                        $this->image_lib->initialize($img);
                        if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                            $data['foto_ktp_thumb'] = $path_thumb . $name;
                        } else {
                            $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                            redirect('officer/settings/account/edit_profile/');
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('officer/settings/account/edit_profile/');
                    }
                }
                if (@$data['password'] != '' or @$data['password'] != NULL) {
                    $this->form_validation->set_rules('password', 'Password Baru', 'required|matches[cf_password]');
                    $this->form_validation->set_rules('cf_password', 'Password Konfirmasi Baru', 'required');

                    if ($this->form_validation->run() == FALSE) {

                        $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                        redirect('officer/settings/account/edit_profile/');
                    } else {
                        $this->AccountModel->update_password($id, $data['password']);
                    }
                }

                $edit = $this->AccountModel->update_account_profile($id, $data);
                if ($edit == true) {

                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Profile Akun '$data[nama_akun]' ('$data[email_akun]') Telah diupdate.."));
                    redirect('officer/settings/account/edit_profile/');
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
                    redirect('officer/settings/account/edit_profile/');
                }
            }
        }
    }

    //---------------------------------------DELETE FILE---------------------------------------//

    public function delete_ktp_photo($name = '') {
        $path = 'uploads/pendaftaran/images/';
        $path_thumb = 'uploads/pendaftaran/images/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    //------------------------------------------------------------------------------//
}
