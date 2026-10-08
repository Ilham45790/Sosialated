<?php
class MCatalog extends CI_Model {
    function tampil() {
        $q = $this->db->get("catalog");
        $d = $q->result_array();

        return $d;
    }

    public function jumlahcatalog() {
        return $this->db->count_all('catalog'); 
    }

    function detail($id_catalog) {
        $this->db->where('id_catalog', $id_catalog);
        $q = $this->db->get('catalog');
        $d = $q->row_array();

        return $d;
    }

    function simpan($inputan) {
        $config['upload_path'] = $this->config->item("assets_catalog");
        $config['allowed_types'] = 'jpeg|jpg|png|gif';

        $this->load->library('upload', $config);
        $ngupload = $this->upload->do_upload('gambar_catalog');

        if ($ngupload) {
            $inputan['gambar_catalog'] = $this->upload->data('file_name');
        }

        $this->db->insert('catalog', $inputan);
    }

    function edit($id_catalog, $inputan) {
        $config['upload_path'] = $this->config->item("assets_catalog");
        $config['allowed_types'] = 'jpeg|gif|jpg|png';
        $this->load->library("upload", $config);

        $ngupload = $this->upload->do_upload("gambar_catalog");

        if ($ngupload) {
            $inputan['gambar_catalog'] = $this->upload->data("file_name");

        }

        $this->db->where('id_catalog', $id_catalog);
        $this->db->update('catalog', $inputan);

        }

        function hapus($id_catalog) {
        $this->db->where('id_catalog', $id_catalog);
        $this->db->delete('catalog');
    }
}
?>