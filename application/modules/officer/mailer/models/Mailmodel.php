<?php

class Mailmodel extends CI_Model {

    private $table_email = 'mailer_config';
    private $table_register = 'pendaftaran';
    private $table_general_page = 'general_page';
    private $table_contact = 'kontak';

    //
    //------------------------------COUNT--------------------------------//
    //

    //
    //------------------------------EMAIL--------------------------------//
    //
    
   
    public function get_contact() {

        $this->db->select('*');
        $this->db->where('id_kontak', 1);
        $sql = $this->db->get($this->table_contact);
        return $sql->result();
    }

    public function get_page() {

        $this->db->select('*');
        $this->db->where('id_general_page', 1);
        $sql = $this->db->get($this->table_general_page);
        return $sql->result();
    }

    public function get_register_id($id = '') {
        $this->db->select('*');
        $this->db->where('nomor_pendaftaran', $id);

        $sql = $this->db->get($this->table_register);
        return $sql->result();
    }

    public function update_mailer($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_pengirim' => $value['nama_pengirim'],
            'host' => $value['host'],
            'email_website' => $value['email_website'],
            'password' => $value['password'],
            'port' => $value['port'],
            'smtp_auth' => $value['smtp_auth'],
            'smtp_secure' => $value['smtp_secure']
        );

        $this->db->where('id_mailer', $id);
        $this->db->update($this->table_email, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //
    //--------------------------------------------------------------------//
    //
    //------------------------------PRODUK UNTUK NEWSLETTER--------------------------------------//


    public function get_general_page() {
        $sql = $this->db->query('SELECT * FROM general_page');
        return $sql->result();
    }

    public function get_newsletter() {
        $sql = $this->db->query('SELECT * FROM newsletter_customer');
        return $sql->result();
    }

    public function get_gambar_produk($id_token) {
        $sql = $this->db->query("SELECT * FROM gambar WHERE token = '$id_token' LIMIT 1");
        return $sql->result();
    }

    public function get_kontak() {
        $sql = $this->db->query('SELECT * FROM kontak');
        return $sql->result();
    }

    public function get_emailnewsletter_by_id($id = '') {

        $this->db->select('email_user');
        $this->db->where('id_newsletter', $id);

        $sql = $this->db->get($this->table_newsletter);
        return $sql->result();
    }

    public function get_detail_produk($id = '') {
        $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug, p.nama_produk, p.status_rekomendasi, p.bahan_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM  produk p 
                        LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang 
                        LEFT JOIN voucher v ON v.id_voucher = p.voucher
                        LEFT JOIN merek m ON m.id_merek = p.merek_barang) t 
           		WHERE t.id_produk = '$id'");
        return $sql->result();
    }

    public function insert_newsletter($value = '') {

        $data = array(
            'email_user' => $value['email_user']
        );

        $this->db->insert($this->table_newsletter, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_newsletter($value = '') {
        $this->db->trans_begin();

        $this->db->where('id_newsletter', $value);
        $this->db->delete($this->table_newsletter);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //
    //--------------------------------------------------------------------//
    //
    //------------------------------MAIL UNTUK PEMBAYARAN--------------------------------------//

    public function get_customer($id) {
        $sql = $this->db->query('SELECT email FROM newsletter_customer');
        return $sql->result();
    }

    public function get_produk_pesan($id = '') {
        $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug, p.nama_produk, p.status_rekomendasi, p.bahan_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM  produk p 
                        LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang 
                        LEFT JOIN voucher v ON v.id_voucher = p.voucher
                        LEFT JOIN merek m ON m.id_merek = p.merek_barang) t 
           		WHERE t.id_produk = '$id'");
        return $sql->result();
    }

}

?>