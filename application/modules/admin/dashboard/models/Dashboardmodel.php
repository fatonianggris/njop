<?php

class DashboardModel extends CI_Model {

    private $table_general_page = 'general_page';

    //
    //------------------------------COUNT--------------------------------//
    //
    
    public function get_total_pembayaran() {
        $sql = $this->db->query("SELECT
                                (
                                SELECT
                                    COALESCE(COUNT(a.nomor_nop),0)
                                FROM
                                    surat a
                                WHERE 
                                    a.status_pembayaran_pajak = 1
                            ) AS lunas,
                            (
                                SELECT
                                    COALESCE(COUNT(a.nomor_nop),0)
                                FROM
                                    surat a
                                WHERE 
                                    a.status_pembayaran_pajak = 0
                            ) AS belum_bayar");
        return $sql->result();
    }

    public function get_total_akun_surat() {
        $sql = $this->db->query("SELECT
                                (
                                SELECT
                                    COALESCE(COUNT(a.nomor_nop),0)
                                FROM
                                    surat a                                
                            ) AS total_surat,
                            (
                                SELECT
                                    COALESCE(COUNT(u.id_akun),0)
                                FROM
                                    akun u                              
                            ) AS total_akun");
        return $sql->result();
    }

    public function get_chart_letter() {
        $sql = $this->db->query("SELECT
                                    DISTINCT th.tahun_pajak,
                                    (
                                    SELECT
                                        COUNT(s.nomor_nop)
                                    FROM
                                        surat s
                                    WHERE
                                        s.tahun_pajak = th.tahun_pajak  AND s.status_pembayaran_pajak = 1
                                ) AS lunas,
                                (
                                    SELECT
                                        COUNT(s.nomor_nop)
                                    FROM
                                        surat s
                                    WHERE
                                        s.tahun_pajak = th.tahun_pajak AND s.status_pembayaran_pajak = 0
                                ) AS belum_lunas
                                FROM
                                    surat th
                                WHERE
                                    (th.tahun_pajak BETWEEN(YEAR(CURDATE())-2) AND (YEAR(CURDATE())))
                                ORDER BY
                                    th.tahun_pajak ASC");
        return $sql->result();
    }

    public function get_pie_chart_letter() {
        $sql = $this->db->query("SELECT
                                (
                                SELECT
                                    COALESCE(SUM(a.luas_bumi),0)
                                FROM
                                    surat a                                
                                ) AS luas_bumi,
                                (
                                SELECT
                                    COALESCE(SUM(a.luas_bangunan),0)
                                FROM
                                    surat a                                
                                ) AS luas_bangunan,
                                (
                                SELECT
                                    COALESCE(SUM(a.total_pajak_bumi_bangunan),0)
                                FROM
                                    surat a                                
                                ) AS total_pajak");
        return $sql->result();
    }

    public function get_general_page() {

        $this->db->select('*');
        $this->db->where('id_general_page', 1);
        $sql = $this->db->get($this->table_general_page);
        return $sql->result();
    }

    public function update_status_open_client($value) {
        $this->db->trans_begin();

        $data = array(
            'status_klien' => $value,
            'updated_at' => date("Y-m-d H:i:s"),
        );

        $this->db->where('id_general_page', 1);
        $this->db->update($this->table_general_page, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-----------------------------------------------------------------------//
//
}

?>