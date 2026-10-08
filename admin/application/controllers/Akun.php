<?php
class Akun extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        //jika tidak ada tiket bioskop, maka suruh login
        if (!$this->session->userdata('id_admin')) {
            redirect('/', 'refresh');
        }
    }
    
    public function index() {
        $inputan = $this->input->post();

        //form validation nama kategori wajib diisi
		$this->form_validation->set_rules("nama", "Nama", "required");
		$this->form_validation->set_rules("email", "Email", "required");

		//atur pesan dalam bahasa indonesia
		$this->form_validation->set_message("required", "%s wajib diisi");

        if ($this->form_validation->run()==TRUE) {
            //jalankan skrip ubah (maksudnya ubah akun)
            $this->load->model('Madmin');
            $id_admin = $this->session->userdata("id_admin");
            $this->Madmin->ubah($inputan, $id_admin);

            $this->session->set_flashdata('pesan_sukses', 'Akun telah diubah');
            redirect('home', 'refresh');
        }

        $this->load->view('header');
        $this->load->view('akun');
        $this->load->view('footer');
    }
}
?>