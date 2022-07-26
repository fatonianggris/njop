<?php

class AuthModel extends CI_Model {

    private $table_account = 'akun';
    private $table_general_page = 'general_page';

    //
    //-------------------------------AUTH------------------------------//
    //

    public function check_user($email = '') {
        $this->db->where('email_akun', $email);
        $sql = $this->db->get($this->table_account);
        return $sql->result();
    }

    public function data_user($email = '') {
        $this->db->select('a.id_akun, a.nama_akun, a,jenis_kelamin, a.nik, a.alamat, a.email_akun, a.nomor_handphone_akun, a.role_akun, s.id_role_struktur, s.nama_struktur');
        $this->db->from('akun a');
        $this->db->join('struktur_akun s', 'a.role_akun=s.id_struktur', 'left');
        $this->db->where('a.email_akun', $email);
        $sql = $this->db->get($this->table_account);
        return $sql->result();
    }

    public function get_license() {

        $this->db->select('mobile_api_key');
        $this->db->where('id_general_page', 1);
        $sql = $this->db->get($this->table_general_page);
        return $sql->result();
    }

    public function check_api_auth($id = '', $api_key = '') {
        $this->db->where('id_akun', $id);
        $this->db->where('api_key', $api_key);
        $sql = $this->db->get($this->table_account);
        return $sql->result();
    }

    //----------------------------------------------------------------//
}

?>