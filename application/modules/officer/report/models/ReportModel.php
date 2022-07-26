<?php

class ReportModel extends CI_Model {

    private $table_structure = 'struktur_akun_keuangan';
    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';
    private $table_provinsi = 'provinsi';
    private $table_letter = 'surat';
    private $table_account = 'akun';
    private $table_third_party = 'third_party';

    //
    //------------------------------BUDGET--------------------------------//
    //  

    public function get_page() {

        $this->db->select('*');
        $this->db->where('id_general_page', 1);
        $sql = $this->db->get($this->table_general_page);
        return $sql->result();
    }

    public function get_third_party_key() {

        $this->db->select('*');
        $this->db->where('id_third_party', 1);
        $sql = $this->db->get($this->table_third_party);
        return $sql->result();
    }

    public function get_officer() {

        $this->db->select('nama_akun');

        $sql = $this->db->get($this->table_account);
        return $sql->result();
    }

    public function check_role($id = '') {
        $this->db->select("ak.nama_akun,
                           ak.nomor_handphone_akun,
                           ak.email_akun,
                           sak.nama_struktur,
                           sak.id_struktur,
                           sak.id_role_struktur
                         ");
        $this->db->from('akun_keuangan ak');
        $this->db->join('struktur_akun_keuangan sak', 'ak.role_akun = sak.id_struktur', 'left');
        $this->db->where('id_akun_keuangan', $id);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_provinsi() {
        $this->db->select('*');
        $sql = $this->db->get($this->table_provinsi);
        return $sql->result();
    }

    public function get_contact() {

        $this->db->select('*');
        $this->db->where('id_kontak', 1);
        $sql = $this->db->get($this->table_contact);
        return $sql->result();
    }

    public function get_old_name_letter($id = '') {
        $this->db->where('id_surat', $id);

        $sql = $this->db->get($this->table_letter);
        return $sql->result();
    }

    public function check_letter_duplicate_own($id_petugas = '', $nop = '', $tahun = '') {
        $this->db->where('id_petugas', $id_petugas);
        $this->db->where('nomor_nop', $nop);
        $this->db->where('tahun_pajak', $tahun);
        $sql = $this->db->get($this->table_letter);
        return $sql->result();
    }

    public function check_letter_duplicate_not_own($id_petugas = '', $nop = '', $tahun = '') {

        $this->db->select('nama_akun');

        $this->db->from($this->table_letter);
        $this->db->join('akun', 'id_akun = id_petugas', 'left');

        $this->db->where('nomor_nop', $nop);
        $this->db->where('tahun_pajak', $tahun);
        $this->db->where_not_in('id_petugas', $id_petugas);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function check_letter_nop($nop = '') {
        $this->db->where('nomor_nop', $nop);

        $sql = $this->db->get($this->table_letter);
        return $sql->result();
    }

    public function check_letter_old($id = '') {
        $this->db->select('nomor_nop, tahun_pajak');
        $this->db->where('id_surat', $id);

        $sql = $this->db->get($this->table_letter);
        return $sql->result();
    }

    public function check_name_division($id = '') {
        $this->db->where('id_struktur', $id);

        $sql = $this->db->get($this->table_structure);
        return $sql->result();
    }

    public function get_core_mail() {

        $this->db->select('ak.email_akun');

        $this->db->from('akun_keuangan ak');
        $this->db->join('struktur_akun_keuangan sak', 'ak.role_akun = sak.id_struktur', 'left');
        $this->db->where_in('sak.id_role_struktur', array(2, 5));

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_wilayah_by_nop($nop = '') {
        $kel_id = str_replace(".", "", substr($nop, 0, 14));
        $sql = $this->db->query("SELECT
                                (
                                SELECT
                                    prov.nama
                                FROM
                                    provinsi prov
                                WHERE
                                    prov.id = " . substr($nop, 0, 2) . "
                            ) AS nama_provinsi_obj,
                            (
                                SELECT
                                    kabkot.nama
                                FROM
                                    kota_kabupaten kabkot
                                WHERE
                                    kabkot.id = '" . substr($nop, 0, 5) . "'
                            ) AS nama_kabupaten_kota_obj
                            ");
        return $sql->result();
    }

    public function get_letter_by_nop($nop = '', $id_petugas = '') {
        $this->db->select("s.*, a.id_akun,
                                a.nama_akun,
                                
                                DATE_FORMAT(s.inserted_at, '%d/%m/%Y') AS tgl_post,
                                DATE_FORMAT(s.updated_at, '%d/%m/%Y') AS tgl_update, 
                                
                                pro_o.nama AS nama_provinsi_obj,                                    
                                kabkot_o.nama AS nama_kabupaten_kota_obj,
                                kec_o.nama AS nama_kecamatan_obj,
                                kel_o.nama AS nama_kelurahan_desa_obj, 
                                
                                pro_p.nama AS nama_provinsi_pem,                                    
                                kabkot_p.nama AS nama_kabupaten_kota_pem,
                                kec_p.nama AS nama_kecamatan_pem,
                                kel_p.nama AS nama_kelurahan_desa_pem, 
                         ");
        $this->db->from('surat s');
        $this->db->join('provinsi pro_o', 'pro_o.id = s.prov_objek_pajak', 'left');
        $this->db->join('kota_kabupaten kabkot_o', 'kabkot_o.id = s.kabkot_objek_pajak', 'left');
        $this->db->join('kecamatan kec_o', 'kec_o.id = s.kec_objek_pajak', 'left');
        $this->db->join('kelurahan kel_o', 'kel_o.id = s.kel_objek_pajak', 'left');

        $this->db->join('provinsi pro_p', 'pro_p.id = s.prov_wajib_pajak', 'left');
        $this->db->join('kota_kabupaten kabkot_p', 'kabkot_p.id = s.kabkot_wajib_pajak', 'left');
        $this->db->join('kecamatan kec_p', 'kec_p.id = s.kec_wajib_pajak', 'left');
        $this->db->join('kelurahan kel_p', 'kel_p.id = s.kel_wajib_pajak', 'left');

        $this->db->join('akun a', 'a.id_akun = s.id_petugas', 'left');

        $this->db->where('s.nomor_nop', $nop);
        $this->db->where('s.id_petugas', $id_petugas);
        $this->db->order_by('s.tahun_pajak', 'DESC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_letter_data_by_nop($nop = '') {
        $this->db->select("s.*, a.id_akun,
                                a.nama_akun,
                                
                                DATE_FORMAT(s.inserted_at, '%d/%m/%Y') AS tgl_post,
                                DATE_FORMAT(s.updated_at, '%d/%m/%Y') AS tgl_update, 
                                
                                pro_o.nama AS nama_provinsi_obj,                                    
                                kabkot_o.nama AS nama_kabupaten_kota_obj,
                                kec_o.nama AS nama_kecamatan_obj,
                                kel_o.nama AS nama_kelurahan_desa_obj, 
                                
                                pro_p.nama AS nama_provinsi_pem,                                    
                                kabkot_p.nama AS nama_kabupaten_kota_pem,
                                kec_p.nama AS nama_kecamatan_pem,
                                kel_p.nama AS nama_kelurahan_desa_pem, 
                         ");
        $this->db->from('surat s');
        $this->db->join('provinsi pro_o', 'pro_o.id = s.prov_objek_pajak', 'left');
        $this->db->join('kota_kabupaten kabkot_o', 'kabkot_o.id = s.kabkot_objek_pajak', 'left');
        $this->db->join('kecamatan kec_o', 'kec_o.id = s.kec_objek_pajak', 'left');
        $this->db->join('kelurahan kel_o', 'kel_o.id = s.kel_objek_pajak', 'left');

        $this->db->join('provinsi pro_p', 'pro_p.id = s.prov_wajib_pajak', 'left');
        $this->db->join('kota_kabupaten kabkot_p', 'kabkot_p.id = s.kabkot_wajib_pajak', 'left');
        $this->db->join('kecamatan kec_p', 'kec_p.id = s.kec_wajib_pajak', 'left');
        $this->db->join('kelurahan kel_p', 'kel_p.id = s.kel_wajib_pajak', 'left');

        $this->db->join('akun a', 'a.id_akun = s.id_petugas', 'left');

        $this->db->where('s.nomor_nop', $nop);

        $this->db->order_by('s.tahun_pajak', 'DESC');
        $this->db->limit(1);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_letter_document_id($id = '') {
        $this->db->select("s.*, a.id_akun,
                                a.nama_akun,
                                
                                DATE_FORMAT(s.inserted_at, '%d/%m/%Y') AS tgl_post,
                                DATE_FORMAT(s.updated_at, '%d/%m/%Y') AS tgl_update, 
                                
                                pro_o.nama AS nama_provinsi_obj,                                    
                                kabkot_o.nama AS nama_kabupaten_kota_obj,
                                kec_o.nama AS nama_kecamatan_obj,
                                kel_o.nama AS nama_kelurahan_desa_obj, 
                                
                                pro_p.nama AS nama_provinsi_pem,                                    
                                kabkot_p.nama AS nama_kabupaten_kota_pem,
                                kec_p.nama AS nama_kecamatan_pem,
                                kel_p.nama AS nama_kelurahan_desa_pem, 
                         ");
        $this->db->from('surat s');
        $this->db->join('provinsi pro_o', 'pro_o.id = s.prov_objek_pajak', 'left');
        $this->db->join('kota_kabupaten kabkot_o', 'kabkot_o.id = s.kabkot_objek_pajak', 'left');
        $this->db->join('kecamatan kec_o', 'kec_o.id = s.kec_objek_pajak', 'left');
        $this->db->join('kelurahan kel_o', 'kel_o.id = s.kel_objek_pajak', 'left');

        $this->db->join('provinsi pro_p', 'pro_p.id = s.prov_wajib_pajak', 'left');
        $this->db->join('kota_kabupaten kabkot_p', 'kabkot_p.id = s.kabkot_wajib_pajak', 'left');
        $this->db->join('kecamatan kec_p', 'kec_p.id = s.kec_wajib_pajak', 'left');
        $this->db->join('kelurahan kel_p', 'kel_p.id = s.kel_wajib_pajak', 'left');

        $this->db->join('akun a', 'a.id_akun = s.id_petugas', 'left');

        $this->db->where('s.id_surat', $id);

        $sql = $this->db->get();
        return $sql->result();
    }

    public function get_letter_document($id_petugas = '') {
        $this->db->select("s.*, a.id_akun,
                                a.nama_akun,
                                
                                DATE_FORMAT(s.inserted_at, '%d/%m/%Y') AS tgl_post,
                                DATE_FORMAT(s.updated_at, '%d/%m/%Y') AS tgl_update, 
                                
                                pro_o.nama AS nama_provinsi_obj,                                    
                                kabkot_o.nama AS nama_kabupaten_kota_obj,
                                kec_o.nama AS nama_kecamatan_obj,
                                kel_o.nama AS nama_kelurahan_desa_obj, 
                                
                                pro_p.nama AS nama_provinsi_pem,                                    
                                kabkot_p.nama AS nama_kabupaten_kota_pem,
                                kec_p.nama AS nama_kecamatan_pem,
                                kel_p.nama AS nama_kelurahan_desa_pem, 
                         ");
        $this->db->from('surat s');

        $this->db->join('provinsi pro_o', 'pro_o.id = s.prov_objek_pajak', 'left');
        $this->db->join('kota_kabupaten kabkot_o', 'kabkot_o.id = s.kabkot_objek_pajak', 'left');
        $this->db->join('kecamatan kec_o', 'kec_o.id = s.kec_objek_pajak', 'left');
        $this->db->join('kelurahan kel_o', 'kel_o.id = s.kel_objek_pajak', 'left');

        $this->db->join('provinsi pro_p', 'pro_p.id = s.prov_wajib_pajak', 'left');
        $this->db->join('kota_kabupaten kabkot_p', 'kabkot_p.id = s.kabkot_wajib_pajak', 'left');
        $this->db->join('kecamatan kec_p', 'kec_p.id = s.kec_wajib_pajak', 'left');
        $this->db->join('kelurahan kel_p', 'kel_p.id = s.kel_wajib_pajak', 'left');

        $this->db->join('akun a', 'a.id_akun = s.id_petugas', 'left');
        $this->db->where('s.id_petugas', $id_petugas);

        $this->db->order_by('s.inserted_at', 'ASC');

        $sql = $this->db->get();
        return $sql->result();
    }

    public function insert_letter_document($id_user = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_petugas' => $id_user,
            'nomor_nop' => $value['nomor_nop'],
            'letak_objek_pajak' => @$value['letak_objek_pajak'],
            'tahun_pajak' => $value['tahun_pajak'],
            'nik_wajib_pajak' => $value['nik_wajib_pajak'],
            'prov_objek_pajak' => $value['prov_objek_pajak'],
            'kabkot_objek_pajak' => $value['kabkot_objek_pajak'],
            'kec_objek_pajak' => $value['kec_objek_pajak'],
            'kel_objek_pajak' => $value['kel_objek_pajak'],
            'nama_wajib_pajak' => $value['nama_wajib_pajak'],
            'alamat_wajib_pajak' => @$value['alamat_wajib_pajak'],
            'prov_wajib_pajak' => $value['prov_wajib_pajak'],
            'kabkot_wajib_pajak' => $value['kabkot_wajib_pajak'],
            'kec_wajib_pajak' => $value['kec_wajib_pajak'],
            'kel_wajib_pajak' => $value['kel_wajib_pajak'],
            'luas_bumi' => $value['luas_bumi'],
            'luas_bangunan' => $value['luas_bangunan'],
            'kelas_bumi' => $value['kelas_bumi'],
            'kelas_bangunan' => $value['kelas_bangunan'],
            'harga_meter_njop_bumi' => @$value['harga_meter_njop_bumi'],
            'harga_meter_njop_bangunan' => @$value['harga_meter_njop_bangunan'],
            'total_njop_bumi' => @ $value['total_njop_bumi'],
            'total_njop_bangunan' => @$value['total_njop_bangunan'],
            'total_pajak_bumi_bangunan' => $value['total_pajak_bumi_bangunan'],
            'status_pembayaran_pajak' => $value['status_pembayaran_pajak'],
            'foto_surat' => $value['foto_surat'],
            'foto_surat_thumb' => @$value['foto_surat_thumb'],
        );

        $this->db->insert($this->table_letter, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_letter_document($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nomor_nop' => $value['nomor_nop'],
            'letak_objek_pajak' => @$value['letak_objek_pajak'],
            'tahun_pajak' => $value['tahun_pajak'],
            'nik_wajib_pajak' => $value['nik_wajib_pajak'],
            'prov_objek_pajak' => $value['prov_objek_pajak'],
            'kabkot_objek_pajak' => $value['kabkot_objek_pajak'],
            'kec_objek_pajak' => $value['kec_objek_pajak'],
            'kel_objek_pajak' => $value['kel_objek_pajak'],
            'nama_wajib_pajak' => $value['nama_wajib_pajak'],
            'alamat_wajib_pajak' => @$value['alamat_wajib_pajak'],
            'prov_wajib_pajak' => $value['prov_wajib_pajak'],
            'kabkot_wajib_pajak' => $value['kabkot_wajib_pajak'],
            'kec_wajib_pajak' => $value['kec_wajib_pajak'],
            'kel_wajib_pajak' => $value['kel_wajib_pajak'],
            'luas_bumi' => $value['luas_bumi'],
            'luas_bangunan' => $value['luas_bangunan'],
            'kelas_bumi' => $value['kelas_bumi'],
            'kelas_bangunan' => $value['kelas_bangunan'],
            'harga_meter_njop_bumi' => @$value['harga_meter_njop_bumi'],
            'harga_meter_njop_bangunan' => @$value['harga_meter_njop_bangunan'],
            'total_njop_bumi' => @ $value['total_njop_bumi'],
            'total_njop_bangunan' => @$value['total_njop_bangunan'],
            'total_pajak_bumi_bangunan' => $value['total_pajak_bumi_bangunan'],
            'status_pembayaran_pajak' => $value['status_pembayaran_pajak'],
            'foto_surat' => $value['foto_surat'],
            'foto_surat_thumb' => $value['foto_surat_thumb'],
            'updated_at' => date("Y-m-d H:i:s"),
        );

        $this->db->where('id_surat', $id);
        $this->db->update($this->table_letter, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_letter_document($value) {
        $this->db->trans_begin();

        $this->db->where('id_surat', $value);
        $this->db->delete($this->table_letter);

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