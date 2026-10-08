<?php
class MAdmin extends CI_Model
{
    public function login($inputan)
    {
        $email = $inputan['email'];
        $password = sha1($inputan['password']); 

        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('admin');
        $cekadmin = $query->row_array();

        if (!empty($cekadmin)) {
            $this->session->set_userdata("id_admin", $cekadmin['id_admin']);
            $this->session->set_userdata("email", $cekadmin['email']);
            $this->session->set_userdata("nama", $cekadmin['nama']);
            return "ada";
        } else {
            return "ga ada";
        }
    }

    public function tampil()
    {
        $query = $this->db->get("admin");
        return $query->result_array();
    }

    public function detail($id_admin)
    {
        $this->db->where("id_admin", $id_admin);
        $query = $this->db->get("admin");
        return $query->row_array();
    }
}