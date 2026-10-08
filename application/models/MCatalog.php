<?php
class MCatalog extends CI_Model {
    public function tampil(){
        return $this->db->get('catalog')->result_array();
    }

    public function detail_umum($id_catalog){
        return $this->db->get_where('catalog', ['id_catalog' => $id_catalog])->row_array();
    }

    public function simpan($data){
        return $this->db->insert('catalog', $data);
    }

    public function hapus($id_catalog){
        $this->db->where('id_catalog', $id_catalog);
        return $this->db->delete('catalog');
    }

    public function edit($data, $id_catalog){
        $this->db->where('id_catalog', $id_catalog);
        return $this->db->update('catalog', $data);
    }

    public function cari_catalog($keyword) {
        $this->db->like('nama_catalog', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        return $this->db->get('catalog')->result_array();
    }

    public function get_by_nama($nama_catalog) {
        return $this->db->get_where('catalog', ['LOWER(nama_catalog)' => strtolower($nama_catalog)])->row_array();
    }
}