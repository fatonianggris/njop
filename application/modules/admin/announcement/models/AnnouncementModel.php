<?php

class AnnouncementModel extends CI_Model {

    private $table_announcement = 'pengumuman_ppdb';

    //
    //-------------------------------SETTING------------------------------//
    //
    
    public function get_announcement_config() {

        $this->db->select('*');
        $this->db->where('id_pengumuman_ppdb', 1);
        $sql = $this->db->get($this->table_announcement);
        return $sql->result();
    }

    public function update_announcement($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_pengumuman' => strtoupper($value['nama_pengumuman']),
            'status_pengumuman' => $value['status_pengumuman'],
            'isi_pengumuman' => $value['isi_pengumuman'],
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_pengumuman_ppdb', $id);
        $this->db->update($this->table_announcement, $data);

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