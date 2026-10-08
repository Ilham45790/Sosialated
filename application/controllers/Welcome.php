<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index()
    {
        $inputan = $this->input->post();
        $this->form_validation->set_rules("email","email","required");
        $this->form_validation->set_rules("password","password","required");
        $this->form_validation->set_message("required","%s wajib diisi");

        if($this->form_validation->run()==TRUE){
            $this->load->model("MCustomer");
            $output = $this->MCustomer->login($inputan);

            if($output=="ada"){
                $this->session->set_flashdata('pesan_sukses', 'Berhasil login');
                redirect('home','refresh');
            }else{
                $this->session->set_flashdata('pesan_gagal', 'Username atau password salah');
                redirect('/','refresh');
            }
        }

        // Load view dengan data
        $this->load->view('header');
        $this->load->view('welcome'); 
        $this->load->view('footer');
    }
}
