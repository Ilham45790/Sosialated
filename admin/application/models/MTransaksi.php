<?php
class Mtransaksi extends CI_Model {
    function tampil() {
        $this->db->select('transaksi.*, customer.nama');
        $this->db->from('transaksi');
        $this->db->join('customer', 'customer.id_customer = transaksi.id_customer', 'left'); 
        $this->db->order_by('transaksi.tanggal_transaksi', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function jumlahTransaksi() {
        return $this->db->count_all('transaksi'); 
    }

    public function hapus($id_transaksi) {
        $this->db->where('id_transaksi', $id_transaksi); 
        $this->db->delete('transaksi'); 
    }
}