<?php

class ExportModel extends CI_Model {

    //
    //------------------------------REPORT--------------------------------//

    public function get_data_export_letter($id = '') {
        $this->db->select("s.*, 
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
        $this->db->where('s.id_surat IN (' . $id . ')');

        $sql = $this->db->get();
        return $sql->result_array();
    }

//
}

?>