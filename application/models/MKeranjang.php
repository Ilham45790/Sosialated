<?php
class MKeranjang extends CI_Model {

    public function tampil() {
        $this->db->select('keranjang.*, catalog.nama_catalog, catalog.harga, catalog.gambar_catalog');
        $this->db->from('keranjang');
        $this->db->join('catalog', 'keranjang.id_catalog = catalog.id_catalog');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function simpan($inputan, $id_catalog) {
        $id_customer = $this->session->userdata('id_customer'); 

        $existing_item = $this->get_item($id_customer, $id_catalog);

        if ($existing_item) {
            $new_quantity = $existing_item['jumlah'] + $inputan['jumlah'];
            $this->db->where('id_keranjang', $existing_item['id_keranjang']);
            $this->db->update('keranjang', ['jumlah' => $new_quantity]);
        } else {
            $data = [
                'id_customer' => $id_customer,
                'id_catalog'     => $id_catalog,
                'nama_catalog'   => $inputan['nama_catalog'],
                'harga'       => $inputan['harga'],
                'gambar_catalog' => $inputan['gambar_catalog'],
                'jumlah'      => $inputan['jumlah']
            ];
            $this->db->insert('keranjang', $data);
        }
    }

    public function hapus_item($id_customer, $id_keranjang) {
        $this->db->where('id_customer', $id_customer);
        $this->db->where('id_keranjang', $id_keranjang);
        $this->db->delete('keranjang');

        if ($this->db->affected_rows() == 0) {
            log_message('error', 'Data tidak ditemukan untuk dihapus.');
        }

        return $this->db->affected_rows() > 0;
    }

    public function get_item($id_customer, $id_catalog) {
        return $this->db->get_where('keranjang', [
            'id_customer' => $id_customer,
            'id_catalog'     => $id_catalog
        ])->row_array();
    }

    public function add_item($data) {
        $this->db->insert('keranjang', $data);
    }

    public function update_item($id_keranjang, $data) {
        $this->db->where('id_keranjang', $id_keranjang)->update('keranjang', $data);
    }

    public function delete_item($id_keranjang) {
        $this->db->where('id_keranjang', $id_keranjang)->delete('keranjang');
    }

    public function get_keranjang_by_customer($id_customer) {
        $this->db->select('keranjang.*, catalog.nama_catalog, catalog.harga, catalog.gambar_catalog');
        $this->db->from('keranjang');
        $this->db->join('catalog', 'keranjang.id_catalog = catalog.id_catalog');
        $this->db->where('keranjang.id_customer', $id_customer);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function simpan_transaksi($data) {
    $this->db->insert('transaksi', $data);
    }

    public function hapus_keranjang_by_customer($id_customer) {
    $this->db->where('id_customer', $id_customer);
    $this->db->delete('keranjang');
    }
}
