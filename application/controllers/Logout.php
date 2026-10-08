    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Logout extends CI_Controller {

    	public function index()
    	{
            $this->session->unset_userdata("id_customer");
            $this->session->unset_userdata("email");
            $this->session->unset_userdata("nama");
            $this->session->unset_userdata("alamat");
            $this->session->unset_userdata("nomor_telepon");

            $this->session->set_flashdata('pesan_sukses', 'Berhasil logout');
            redirect('/','refresh');
    	}
    }
