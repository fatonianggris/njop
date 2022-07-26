<?php

class AccountModel extends CI_Model {

    private $table_account = 'akun';
    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';
    private $table_structure = 'struktur_akun';

    //
    //-------------------------------AUTH------------------------------//
    //
    
    public function get_page() {

        $this->db->select('*');
        $this->db->where('id_general_page', 1);
        $sql = $this->db->get($this->table_general_page);
        return $sql->result();
    }

    public function get_email_akun($email = '') {

        $this->db->where('email_akun', $email);

        $sql = $this->db->get($this->table_account);
        return $sql->result();
    }

    public function get_structure_account() {

        $this->db->select('*');
        $sql = $this->db->get($this->table_structure);
        return $sql->result();
    }

    public function get_contact() {

        $this->db->select('*');
        $this->db->where('id_kontak', 1);
        $sql = $this->db->get($this->table_contact);
        return $sql->result();
    }

    public function check_account_duplicate($email = '') {
        $this->db->where('email_akun', $email);

        $sql = $this->db->get($this->table_account);
        return $sql->result();
    }

    public function check_email_account($email = '') {
        $this->db->where('email_akun', $email);
        $sql = $this->db->get($this->table_account);
        return $sql->result();
    }

    public function check_role($role = '') {
        $this->db->select('nama_struktur');
        $this->db->where('id_struktur', $role);
        $sql = $this->db->get($this->table_structure);

        return $sql->result();
    }

    public function get_all_account() {
        $this->db->select("a.*,
                                DATE_FORMAT(a.inserted_at, '%d/%m/%Y') AS tanggal_masuk,
                                s.id_role_struktur,
                                s.nama_struktur
                         ");
        $this->db->from('akun a');
        $this->db->join('struktur_akun s', 'a.role_akun=s.id_struktur', 'left');
        $this->db->order_by('a.inserted_at DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_account_id($id = '') {
        $this->db->where('id_akun', $id);
        $sql = $this->db->get($this->table_account);
        return $sql->result();
    }

    public function insert_account($value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_akun' => $value['nama_akun'],
            'role_akun' => $value['role_akun'],
            'password' => password_hash($value['password'], PASSWORD_DEFAULT, array('cost' => 12)),
            'nik' => $value['nik'],
            'email_akun' => $value['email_akun'],
            'nomor_handphone_akun' => $value['nomor_handphone_akun'],
            'jenis_kelamin' => $value['jenis_kelamin'],
            'api_key' => $value['api_key'],
            'alamat' => $value['alamat'],
            'foto_ktp' => $value['foto_ktp'],
            'foto_ktp_thumb' => $value['foto_ktp_thumb'],
        );
        $this->db->insert($this->table_account, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_password($id = '', $password = '') {
        $this->db->trans_begin();

        $data = array(
            'password' => password_hash($password, PASSWORD_DEFAULT, array('cost' => 12)),
        );

        $this->db->where('id_akun', $id);
        $this->db->update($this->table_account, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function reset_account_password($email = '', $password = '') {
        $this->db->trans_begin();

        $data = array(
            'password' => password_hash($password, PASSWORD_DEFAULT, array('cost' => 12)),
        );

        $this->db->where('email_akun', $email);
        $this->db->update($this->table_account, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_account($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_akun' => $value['nama_akun'],
            'role_akun' => $value['role_akun'],
            'nik' => $value['nik'],
            'email_akun' => $value['email_akun'],
            'nomor_handphone_akun' => $value['nomor_handphone_akun'],
            'jenis_kelamin' => $value['jenis_kelamin'],
            'api_key' => $value['api_key'],
            'alamat' => $value['alamat'],
            'foto_ktp' => $value['foto_ktp'],
            'foto_ktp_thumb' => $value['foto_ktp_thumb'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_akun', $id);
        $this->db->update($this->table_account, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_account_profile($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_akun' => $value['nama_akun'],
            'nik' => $value['nik'],
            'email_akun' => $value['email_akun'],
            'nomor_handphone_akun' => $value['nomor_handphone_akun'],
            'jenis_kelamin' => $value['jenis_kelamin'],
            'alamat' => $value['alamat'],
            'foto_ktp' => $value['foto_ktp'],
            'foto_ktp_thumb' => $value['foto_ktp_thumb'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_akun', $id);
        $this->db->update($this->table_account, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_account($value) {
        $this->db->trans_begin();

        $this->db->where('id_akun', $value);
        $this->db->delete($this->table_account);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //----------------------------------------------------------------//
}

?>