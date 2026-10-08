<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata("id_customer")) {
            $this->session->set_flashdata('pesan_gagal', 'Harap login terlebih dahulu.');
            redirect('/', 'refresh');
        }
        $this->load->model("MCatalog");
        $this->load->model('MTransaksi');
    }

    public function index() {
        $data['catalog'] = $this->MCatalog->tampil();
        $this->load->view('header');
        $this->load->view('Catalog', $data);
        $this->load->view('footer');
    }

    public function tambah_keranjang($id_catalog) {
        $inputan = $this->input->post();
        if ($inputan) {
            $this->load->model("MKeranjang");
            $this->MKeranjang->simpan($inputan, $id_catalog);
            $this->session->set_flashdata('pesan_sukses', 'catalog masuk ke keranjang belanja');
            redirect('keranjang', 'refresh');
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan catalog ke keranjang');
            redirect('catalog', 'refresh');
        }
    }

    public function pencarian() {
        $query = $this->input->get('query');
        if (empty($query)) {
            $catalog = $this->MCatalog->tampil();
        } else {
            $catalog = $this->MCatalog->cari_catalog($query);
        }
        $data['catalog'] = $catalog;
        $data['is_empty'] = (empty($catalog));
        $data['query'] = $query;
        $this->load->view('header');
        $this->load->view('catalog', $data);
        $this->load->view('footer');
    }

    public function detail($id_catalog) {
        $data['catalog'] = $this->MCatalog->detail_umum($id_catalog);
        if (!$data['catalog']) {
            show_404();
        }

        $nama_catalog = strtolower($data['catalog']['nama_catalog']);
        $apriori_results = $this->MTransaksi->runApriori();
        $supportData = $apriori_results['supportData'];
        $transactions = $apriori_results['transactions'];

        $allRules = $this->MTransaksi->getAssociationRules($supportData, $transactions);

        $rekomendasi_produk = [];
        $added_products = [];
        foreach ($allRules as $rule) {
            if (in_array($nama_catalog, $rule['antecedent'])) {
                foreach ($rule['consequent'] as $recommended_name) {
                    if (!in_array($recommended_name, $added_products)) {
                        $detail_produk = $this->MCatalog->get_by_nama($recommended_name);
                        if ($detail_produk) {
                            $detail_produk['confidence'] = $rule['confidence'];
                            $detail_produk['support'] = $rule['support'];
                            $detail_produk['lift'] = $rule['lift'];
                            $rekomendasi_produk[] = $detail_produk;
                            $added_products[] = $recommended_name;
                        }
                    }
                }
            }
        }

        $data['rekomendasi_produk'] = $rekomendasi_produk;
        $this->load->view('header');
        $this->load->view('detail_catalog', $data);
        $this->load->view('footer');
    }
}