<?php
class Home extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        //jika tidak ada tiket bioskop, maka suruh login
        if (!$this->session->userdata('id_admin')) {
            redirect('/', 'refresh');
        }
    }
    
    function index() {

        //panggil model MPengguna
        $this->load->model("MPengguna");
        $this->load->model("MCatalog");
        $this->load->model("Mtransaksi");

        $data['jumlah_pengguna'] = $this->MPengguna->jumlahPengguna();
        $data['jumlah_catalog'] = $this->MCatalog->jumlahCatalog();
        $data['jumlah_transaksi'] = $this->Mtransaksi->jumlahTransaksi();


        $this->load->view("header");
        $this->load->view("home", $data);
        $this->load->view("footer");
    }
}
