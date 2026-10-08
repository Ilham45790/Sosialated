<?php
class Pengguna
 extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id_admin')) {
            redirect('/', 'refresh');
        }
    }
    
    function customer() {
       $this->load->model("MPengguna");
       $data["pengguna"] = $this->MPengguna->customer();

        $this->load->view("header");
        $this->load->view("customer_tampil", $data);
        $this->load->view("footer");
    }
    function admin() {
       $this->load->model("MPengguna");
       $data["pengguna"] = $this->MPengguna->admin();

        $this->load->view("header");
        $this->load->view("admin_tampil", $data);
        $this->load->view("footer");
    }

    // customer 
    function hapus_customer($id_customer) {

        echo $id_customer;
        $this->load->model('MPengguna');
        $this->MPengguna->hapus_customer($id_customer);
        $this->session->set_flashdata('pesan_sukses', 'pengguna telah terhapus');

        redirect('pengguna/customer','refresh');
    }

    // admin
    function tambah_admin(){

        $inputan = $this->input->post();

        $this->form_validation->set_rules("nama", "Nama","required");
        $this->form_validation->set_rules("email", "Email","required");
        $this->form_validation->set_rules("password", "Password","required");
        $this->form_validation->set_message("required", "%s wajib diisi");

        if ( $this->form_validation->run()==TRUE ) {
            $this->load->model('MPengguna');
            $this->MPengguna->simpan_admin($inputan);
            $this->session->set_flashdata('pesan_sukses', 'Data admin tersimpan');

            redirect('pengguna/admin','refresh');
        }

        $this->load->view('header');
        $this->load->view('admin_tambah');
        $this->load->view('footer');
    }


    function edit_admin($id_admin) {
        $this->load->model("MPengguna");
        $data['pengguna'] = $this->MPengguna->detail_admin($id_admin);

        $inputan = $this->input->post();
        if ($inputan) {
            $this->MPengguna->edit_admin($id_admin,$inputan);
            $this->session->set_flashdata('pesan_sukses', 'sukses edit admin');
            redirect('pengguna/admin', 'refresh');
        }

        $this->load->view("header");
        $this->load->view("admin_edit", $data);
        $this->load->view("footer");
    }

    function hapus_admin($id_admin) {

        echo $id_admin;

        $this->load->model('MPengguna');
        $this->MPengguna->hapus_admin($id_admin);
        $this->session->set_flashdata('pesan_sukses', 'admin telah terhapus');

        redirect('pengguna/admin','refresh');
    }

}