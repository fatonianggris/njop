<?php

class WilayahModel extends CI_Model {

    /**
     * METHOD/FUNCTION JOBS CRUD
     */
    public function get_provinsi() {
        $sql = $this->db->query('SELECT * FROM provinsi');
        return $sql->result();
    }

    public function get_kabupaten($id_provinsi = '') {
        $sql = $this->db->query("SELECT
                                    *
                                FROM
                                    kota_kabupaten
                                WHERE
                                    id_provinsi = '$id_provinsi'");
        return $sql->result();
    }

    public function get_kecamatan($id_kabupaten = '') {
        $sql = $this->db->query("SELECT
                                    *
                                FROM
                                    kecamatan
                                WHERE
                                    id_kota_kabupaten = '$id_kabupaten'");
        return $sql->result();
    }

    public function get_kelurahan($id_kecamatan = '') {
        $sql = $this->db->query("SELECT
                                    *
                                FROM
                                    kelurahan
                                WHERE
                                    id_kecamtan = '$id_kecamatan'");
        return $sql->result();
    }

}
