<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('MKeranjang'); 
        $this->load->model('MTransaksi'); 

        if (!$this->session->userdata("id_customer")) {
            $this->session->set_flashdata('pesan_gagal', 'Harap login terlebih dahulu.');
            redirect('/', 'refresh');
        }
    }

    public function index() {
        $id_customer = $this->session->userdata('id_customer');
        $keranjang = $this->MKeranjang->get_keranjang_by_customer($id_customer);

        $total_harga = 0;
        foreach ($keranjang as $item) {
            $total_harga += $item['harga'] * $item['jumlah'];
        }

        $data['keranjang'] = $keranjang;
        $data['total_harga'] = $total_harga;

        $this->load->view('header');
        $this->load->view('keranjang', $data);
        $this->load->view('footer');
    }

    public function tambah() {
        $id_customer = $this->session->userdata('id_customer'); 
        $id_catalog = $this->input->post('id_catalog');
        $nama_catalog = $this->input->post('nama_catalog');
        $harga = $this->input->post('harga');
        $gambar_catalog = $this->input->post('gambar_catalog');
        $jumlah = (int) $this->input->post('jumlah');  

        $existing_item = $this->MKeranjang->get_item($id_customer, $id_catalog);

        if ($existing_item) {
            $new_quantity = $existing_item['jumlah'] + $jumlah;
            $this->MKeranjang->update_item($existing_item['id'], ['jumlah' => $new_quantity]);
        } else {
            $this->MKeranjang->add_item([
                'id_customer' => $id_customer,
                'id_catalog' => $id_catalog,
                'nama_catalog' => $nama_catalog,
                'harga' => $harga,
                'gambar_catalog' => $gambar_catalog,
                'jumlah' => $jumlah
            ]);
        }
        $this->session->set_flashdata('pesan_sukses', 'catalog berhasil ditambahkan ke keranjang');

        redirect('catalog');
    }

    public function proses_checkout() {
        $id_customer = $this->session->userdata('id_customer');
        $keranjang = $this->MKeranjang->get_keranjang_by_customer($id_customer);

        if (empty($keranjang)) {
            redirect('catalog');
        }

        // Cek stok catalog
        foreach ($keranjang as $item) {
            $catalog = $this->db->get_where('catalog', ['id_catalog' => $item['id_catalog']])->row_array();
            if ($catalog['stok_catalog'] < $item['jumlah']) {
                $this->session->set_flashdata('pesan_error', 'Stok catalog "' . $catalog['nama_catalog'] . '" tidak mencukupi.');
                redirect('keranjang');
            }
        }

        // Hitung total harga
        $total_harga = 0;
        foreach ($keranjang as $item) {
            $total_harga += $item['harga'] * $item['jumlah'];
        }

        // Simpan transaksi hanya sekali
        $data_transaksi = [
            'id_customer' => $id_customer,
            'total_harga' => $total_harga,
            'status_pembayaran' => 'pending',
            'detail_transaksi' => json_encode($keranjang)
        ];
        $this->MKeranjang->simpan_transaksi($data_transaksi);

        foreach ($keranjang as $item) {
            $this->db->set('stok_catalog', 'stok_catalog - ' . $item['jumlah'], FALSE);
            $this->db->where('id_catalog', $item['id_catalog']);
            $this->db->update('catalog');
        }

        $this->MKeranjang->hapus_keranjang_by_customer($id_customer);

        // Redirect dengan pesan sukses
        $this->session->set_flashdata('pesan_sukses', 'Terima kasih! Pesanan Anda sedang disiapkan.');
        redirect('transaksi', 'refresh');
    }


    public function hapus($id_keranjang) {
        $id_customer = $this->session->userdata('id_customer');

        if ($this->MKeranjang->hapus_item($id_customer, $id_keranjang)) {
            $this->session->set_flashdata('pesan_sukses', 'catalog berhasil dihapus dari keranjang.');
        } else {
            $this->session->set_flashdata('pesan_error', 'Gagal menghapus catalog dari keranjang.');
        }

        redirect('keranjang');
    }

}

?>