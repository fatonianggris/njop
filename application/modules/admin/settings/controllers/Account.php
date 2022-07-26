<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sias-admin') == FALSE) {
            redirect('admin/auth');
        }

        $this->user_student = $this->session->userdata("sias-admin");

        $this->load->model('AccountModel');
        $this->load->library('form_validation');
    }

    //
    //-------------------------------DATA AKUN ADMIN------------------------------//
    //
    
    public function list_account() {
        if ($this->user_student[0]->role_akun != 1) {
            redirect('admin/dashboard');
        }

        $data['title'] = 'Setting | Akun Admin NJOP';
        $data['nav_set'] = 'menu-item-here';
        $data['account'] = $this->AccountModel->get_all_account();
//        $data['jumlah_data_akun'] = $this->Akunmodel->get_jumlah_data_akun($this->user['id_ref'], $this->user['role_akun']);

        $this->template->load('template_admin/template_admin', 'admin_list_user_account', $data);
    }

    public function add_account() {
        if ($this->user_student[0]->role_akun != 1) {
            redirect('admin/dashboard');
        }

        $data['title'] = 'Setting | Akun Admin NJOP';
        $data['nav_set'] = 'menu-item-here';

        $data['structure'] = $this->AccountModel->get_structure_account();

        $this->template->load('template_admin/template_admin', 'admin_add_user_account', $data);
    }

    public function edit_account($id = '') {
        if ($this->user_student[0]->role_akun != 1) {
            redirect('admin/dashboard');
        }
        $id = paramDecrypt($id);

        $data['nav_set'] = 'menu-item-here';
        $check = $this->AccountModel->get_account_id($id);
        $data['account'] = $this->AccountModel->get_account_id($id); //?   
        $data['structure'] = $this->AccountModel->get_structure_account();

        if ($check == FALSE or empty($id)) {
            $this->load->view('error_404', $data);
        } else {
            //edit data with id
            $this->template->load('template_admin/template_admin', 'admin_edit_user_account', $data);
        }
    }

    public function edit_profile($id = '') {

        $id = paramDecrypt($id);

        $data['nav_set'] = 'menu-item-here';
        $check = $this->AccountModel->get_account_id($id);
        $data['account'] = $this->AccountModel->get_account_id($id); //? 
        $data['structure'] = $this->AccountModel->get_structure_account();

        if ($check == FALSE or empty($id)) {
            $this->load->view('error_404', $data);
        } else {
            //edit data with id
            $this->template->load('template_admin/template_admin', 'admin_edit_profile', $data);
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

    public function post_account() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_akun', 'Nama Akun', 'required');
        $this->form_validation->set_rules('nik', 'NIK KTP', 'required');
        $this->form_validation->set_rules('role_akun', 'Role Akun', 'required');
        $this->form_validation->set_rules('email_akun', 'Email Akun ', 'required');
        $this->form_validation->set_rules('nomor_handphone_akun', 'Nomor Handphone Akun', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('password', 'Password Akun', 'required|matches[cf_password]');
        $this->form_validation->set_rules('cf_password', 'Password Konfirmasi Akun', 'required');
        $this->form_validation->set_rules('api_key', 'Api Key', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $check = $this->AccountModel->check_account_duplicate($data['email_akun']);
        $role = $this->AccountModel->check_role($data['role_akun']);

        if ($check == TRUE) {

            $this->session->set_flashdata('flash_message', warn_msg("Mohon Maaf, Email tersebut Telah Tersedia..."));
            redirect('admin/settings/account/add_account');
        } else {
            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('admin/settings/account/add_account');
            } else {

                $this->load->library('upload'); //load library upload file
                $this->load->library('image_lib'); //load library image

                if (!empty($_FILES['foto_ktp'])) {

                    $path = 'uploads/pendaftaran/images/';
                    $path_thumb = 'uploads/pendaftaran/images/thumbs/';
                    //config upload file
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = 5048; //set limit
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
                        $img['weight'] = 1000;

                        $this->image_lib->initialize($img);
                        if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                            $data['foto_ktp_thumb'] = $path_thumb . $name;
                        } else {
                            $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                            redirect('admin/settings/account/add_account');
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('admin/settings/account/add_account');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Silahkan Upload Foto KTP Akun yang akan dibuat.'));
                    redirect('admin/settings/account/add_account');
                }

                $input = $this->AccountModel->insert_account($data);

                if ($input == true) {

                    $this->new_account($data['nama_akun'], $data['email_akun'], $data['password'], $role[0]->nama_struktur);
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Akun '$data[nama_akun]' ('$data[email_akun]') telah disimpan.."));
                    redirect('admin/settings/account/add_account');
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
                    redirect('admin/settings/account/add_account');
                }
            }
        }
    }

    public function update_account_profile($id = '') {
        $id = paramDecrypt($id);
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
            redirect('admin/settings/account/edit_profile/' . paramEncrypt($id));
        } else {
            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('admin/settings/account/edit_profile/' . paramEncrypt($id));
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
                            redirect('admin/settings/account/edit_profile/' . paramEncrypt($id));
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('admin/settings/account/edit_profile/' . paramEncrypt($id));
                    }
                }
                if ($data['password'] != '' or $data['password'] != NULL) {
                    $this->form_validation->set_rules('password', 'Password Baru', 'required|matches[cf_password]');
                    $this->form_validation->set_rules('cf_password', 'Password Konfirmasi Baru', 'required');

                    if ($this->form_validation->run() == FALSE) {

                        $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                        redirect('admin/settings/account/edit_profile/' . paramEncrypt($id));
                    } else {
                        $this->AccountModel->update_password($id, $data['password']);
                    }
                }

                $edit = $this->AccountModel->update_account_profile($id, $data);
                if ($edit == true) {

                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Profile Akun '$data[nama_akun]' ('$data[email_akun]') Telah diupdate.."));
                    redirect('admin/settings/account/edit_profile/' . paramEncrypt($id));
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
                    redirect('admin/settings/account/edit_profile/' . paramEncrypt($id));
                }
            }
        }
    }

    public function update_account($id = '') {
        $id = paramDecrypt($id);
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_akun', 'Nama Akun', 'required');
        $this->form_validation->set_rules('nik', 'NIK KTP', 'required');
        $this->form_validation->set_rules('role_akun', 'Role Akun', 'required');
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
            redirect('admin/settings/account/edit_account/' . paramEncrypt($id));
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('admin/settings/account/edit_account/' . paramEncrypt($id));
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
                            redirect('admin/settings/account/edit_account/' . paramEncrypt($id));
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('admin/settings/account/edit_account/' . paramEncrypt($id));
                    }
                }

                if ($data['password'] != '' or $data['password'] != NULL) {
                    $this->form_validation->set_rules('password', 'Password Baru', 'required|matches[cf_password]');
                    $this->form_validation->set_rules('cf_password', 'Password Konfirmasi Baru', 'required');

                    if ($this->form_validation->run() == FALSE) {

                        $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                        redirect('admin/settings/account/edit_account/' . paramEncrypt($id));
                    } else {
                        $this->AccountModel->update_password($id, $data['password']);
                    }
                }

                $edit = $this->AccountModel->update_account($id, $data);
                if ($edit == true) {

                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Akun '$data[nama_akun]' ('$data[email_akun]') Telah diupdate.."));
                    redirect('admin/settings/account/edit_account/' . paramEncrypt($id));
                } else {

                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
                    redirect('admin/settings/account/edit_account/' . paramEncrypt($id));
                }
            }
        }
    }

   
    public function new_account($nama = '', $email = '', $pass = '', $role = '') {

        $data['page'] = $this->AccountModel->get_page();
        $data['contact'] = $this->AccountModel->get_contact();
        $data['nama'] = $nama;
        $data['email'] = $email;
        $data['password'] = $pass;
        $data['role'] = $role;

        $subjek = "AKUN BARU";
        $content = $this->load->view('mailer_template/new_account', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $email,
            'subjek' => $subjek,
            'content' => $content,
        );

        if ($email) {
            $this->mailer->send($sendmail);
            echo '1';
        } else {
            echo '0';
        }

        // Panggil fungsi send yang ada di librari Mailer
    }

    public function delete_account() {
        $id = $this->input->post('id');
        $id = paramDecrypt($id);

        $delete = $this->AccountModel->delete_account($id);

        if ($delete == true) {

            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Akun Telah Terhapus.."));
            redirect('admin/settings/account/list_account');
        } else {

            $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan...'));
            redirect('admin/settings/account/list_account');
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
