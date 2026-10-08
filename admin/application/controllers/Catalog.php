<?php
class Catalog extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id_admin')) {
            redirect('/', 'refresh');
        }
    }
    
    function index() {
        // panggil model MCatalog
       $this->load->model("MCatalog");

       $data["catalog"] = $this->MCatalog->tampil();

        $this->load->view("header");
        $this->load->view("catalog_tampil", $data);
        $this->load->view("footer");
    }

    function tambah(){
        $this->load->model("MCatalog");

        $inputan = $this->input->post();
        if ($inputan) {
            $this->MCatalog->simpan($inputan);
            $this->session->set_flashdata('pesan_sukses', 'Catalog tersimpan');
            redirect('catalog', 'refresh');
        }

        $this->load->view("header");
        $this->load->view("catalog_tambah.php");
        $this->load->view("footer");
    }

    function edit($id_catalog) {
        $this->load->model("MCatalog");
        $data['catalog'] = $this->MCatalog->detail($id_catalog);

        $inputan = $this->input->post();
        if ($inputan) {
            $this->MCatalog->edit($id_catalog,$inputan);
            $this->session->set_flashdata('pesan_sukses', 'Catalog tersimpan');
            redirect('catalog', 'refresh');
        }
        $this->load->view("header");
        $this->load->view("catalog_edit.php", $data);
        $this->load->view("footer");
    }

    function hapus($id_catalog) {

        echo $id_catalog;
        $this->load->model('MCatalog');
        $this->MCatalog->hapus($id_catalog);
        $this->session->set_flashdata('pesan_sukses', 'Catalog telah terhapus');

        redirect('catalog','refresh');
    }
}