<?php
class MPengguna extends CI_Model {
    function customer() {
        $q = $this->db->get("customer");
        //pecah ke array
        $d = $q->result_array();

        return $d;
    }
    function admin() {
        $q = $this->db->get("admin");
        $d = $q->result_array();

        return $d;
    }

    public function jumlahPengguna() {
        $query = $this->db->query("
            SELECT 
                (SELECT COUNT(*) FROM customer) +
                (SELECT COUNT(*) FROM admin) AS total_count
        ");
        return $query->row()->total_count;
    }


    // customer 
    function detail_customer($id_customer) {
        $this->db->where('id_customer', $id_customer);
        $q = $this->db->get('customer');
        $d = $q->row_array();

        return $d;
    }
    
    function hapus_customer($id_customer) {
        $this->db->where('id_customer', $id_customer);
        $this->db->delete('customer');
    }

    //admin
    function detail_admin($id_admin) {
        //select * from admin where id_admin
        $this->db->where('id_admin', $id_admin);
        $q = $this->db->get('admin');
        $d = $q->row_array();

        return $d;
    }

    function simpan_admin($inputan) {

        $this->db->insert('admin', $inputan);
        
    }

    function edit_admin($id_admin, $inputan){
        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin', $inputan);
    }

    function hapus_admin($id_admin) {
        //delete from customer where id_customer=5
        $this->db->where('id_admin', $id_admin);
        $this->db->delete('admin');
    }
    
}

?>