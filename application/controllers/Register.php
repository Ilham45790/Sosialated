<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MCustomer'); 
    }

    public function index()
    {
        $this->form_validation->set_rules("nama", "Nama", "required|is_unique[customer.nama]");
        $this->form_validation->set_rules("email", "Email", "required|valid_email|is_unique[customer.email]");
        $this->form_validation->set_rules("password", "Password", "required|min_length[6]");
        $this->form_validation->set_rules("alamat", "Alamat", "required");
        $this->form_validation->set_rules("nomor_telepon", "Nomor Telepon", "required|numeric");

        $this->form_validation->set_message("required", "%s wajib diisi.");
        $this->form_validation->set_message("is_unique", "%s yang sama sudah digunakan.");
        $this->form_validation->set_message("valid_email", "%s harus berupa email yang valid.");
        $this->form_validation->set_message("min_length", "%s minimal harus terdiri dari %s karakter.");
        $this->form_validation->set_message("numeric", "%s harus berupa angka.");

        if ($this->form_validation->run() == TRUE) {
            $m['nama'] = htmlspecialchars($this->input->post("nama", TRUE));
            $m['email'] = htmlspecialchars($this->input->post("email", TRUE));
            $m['password'] = sha1($this->input->post("password", TRUE)); 
            $m['alamat'] = htmlspecialchars($this->input->post("alamat", TRUE));
            $m['nomor_telepon'] = htmlspecialchars($this->input->post("nomor_telepon", TRUE));

            $this->MCustomer->register($m);

            $this->session->set_flashdata('pesan_sukses', 'Registrasi berhasil, silakan login.');
            redirect('/', 'refresh');
        } else {
            $this->session->set_flashdata('pesan_error', validation_errors('<div class="error">', '</div>'));
        }

        $this->load->view('header');
        $this->load->view('register');
        $this->load->view('footer');
    }
}
