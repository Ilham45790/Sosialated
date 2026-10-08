<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("id_customer")) {
            $this->session->set_flashdata('pesan_gagal', 'Harap login terlebih dahulu.');
            redirect('/', 'refresh');
        }
    }
    
    public function index()
    {
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }
}
