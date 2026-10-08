<?php
class MCustomer extends CI_Model
{
    public function login($inputan)
    {
        $email = $inputan['email'];
        $password = sha1($inputan['password']); 

        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('customer');
        $cekcustomer = $query->row_array();

        if (!empty($cekcustomer)) {
            $this->session->set_userdata("id_customer", $cekcustomer['id_customer']);
            $this->session->set_userdata("email", $cekcustomer['email']);
            $this->session->set_userdata("nama", $cekcustomer['nama']);
            $this->session->set_userdata("alamat", $cekcustomer['alamat']);
            $this->session->set_userdata("nomor_telepon", $cekcustomer['nomor_telepon']);
            return "ada";
        } else {
            return "ga ada";
        }
    }

    public function tampil()
    {
        $query = $this->db->get("customer");
        return $query->result_array();
    }

    public function detail($id_customer)
    {
        $this->db->where("id_customer", $id_customer);
        $query = $this->db->get("customer");
        return $query->row_array();
    }

    public function ubah($inputan, $id_customer)
    {
        if (!empty($inputan['password'])) {
            $inputan['password'] = sha1($inputan['password']);
        } else {
            unset($inputan['password']);
        }

        $this->db->where('id_customer', $id_customer);
        $this->db->update('customer', $inputan);

        $this->db->where('id_customer', $id_customer);
        $query = $this->db->get('customer');
        $customer = $query->row_array();

        if (!empty($customer)) {
            foreach ($customer as $key => $value) {
                $this->session->set_userdata($key, $value);
            }
        }
    }

    public function register($data)
    {
        $this->db->insert('customer', $data);
    }
}
