<?php
class Transaksi extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id_admin')) {
            redirect('/', 'refresh');
        }
    }
    
    function index() {

        $this->load->model("Mtransaksi");
        $data['transaksi'] = $this->Mtransaksi->tampil();

        $this->load->view("header");
        $this->load->view("transaksi", $data);
        $this->load->view("footer");
    }

    function hapus($id_transaksi) {

        $this->load->model("Mtransaksi");
        $this->Mtransaksi->hapus($id_transaksi);
        $this->session->set_flashdata('pesan_sukses', 'Transaksi telah terhapus');
        
        redirect('transaksi', 'refresh');
    }

    function cetak_csv() {
        $this->load->model("Mtransaksi");
        $transaksi_data = $this->Mtransaksi->tampil();

        // Set the headers for CSV download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="riwayat_transaksi_' . date('Ymd_His') . '.csv"');
        header('Cache-Control: max-age=0');

        // Open output stream
        $output = fopen('php://output', 'w');

        // Add CSV headers
        fputcsv($output, array('No', 'Nama Customer', 'Tanggal Transaksi', 'Total Harga', 'Status Transaksi'));

        // Add data to CSV
        $no = 1;
        foreach ($transaksi_data as $row) {
            $data_row = array(
                $no++,
                $row['nama'],
                date('d M Y', strtotime($row['tanggal_transaksi'])),
                $row['total_harga'],
                $row['status_pembayaran']
            );
            fputcsv($output, $data_row);
        }

        fclose($output);
        exit(); // Terminate script after CSV generation
    }

}