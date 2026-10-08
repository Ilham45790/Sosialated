<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    function __construct(){

        parent::__construct();

        if (!$this->session->userdata("id_customer")) {
            $this->session->set_flashdata('pesan_gagal', 'Harap login terlebih dahulu.');
            redirect('/', 'refresh');
        }
    }

    public function index() {
        $this->load->model('MTransaksi');
        $data['transaksi'] = $this->MTransaksi->tampil();

        // Load views
        $this->load->view('header');
        $this->load->view('transaksi_tampil', $data);
        $this->load->view('footer');
    }

    function detail($id_transaksi) {
        $this->load->model('MTransaksi');
        $data['transaksi'] = $this->MTransaksi->detail($id_transaksi);

        $detail_transaksi = json_decode($data['transaksi']['detail_transaksi'], true);

        if (!is_array($detail_transaksi)) {
            $detail_transaksi = []; 
        }

        $data['transaksi']['detail_transaksi'] = $detail_transaksi;

        $snapToken = '';
        $data['cekmidtrans'] = array();
        if ($data['transaksi']['status_pembayaran'] == 'pending') {

            include 'midtrans-php/Midtrans.php';
            \Midtrans\Config::$serverKey = 'SB-Mid-server-tnkwB4GJ563obIhhTsR3UmNz';
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $params['transaction_details']['order_id'] = $data['transaksi']['id_transaksi'];
            $params['transaction_details']['gross_amount'] = $data['transaksi']['total_harga'];

            try {
                $snapToken = \Midtrans\Snap::getSnapToken($params);
            } catch (Exception $e) {
            }
            $data['snapToken'] = $snapToken;

            // Cek status transaksi di Midtrans
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/" . $data['transaksi']['id_transaksi'] . "/status",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "accept: application/json",
                    "authorization: Basic U0ItTWlkLXNlcnZlci10bmt3QjRHSjU2M29iSWhoVHNSM1VtTno6"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $responsi = json_decode($response, TRUE);
                if (isset($responsi['status_code']) && in_array($responsi['status_code'], [200, 201])) {
                    $data['cekmidtrans'] = $responsi;

                    if ($responsi['transaction_status'] == 'settlement') {
                        $this->MTransaksi->set_lunas($id_transaksi);
                        redirect('transaksi/detail/' . $id_transaksi, 'refresh');
                    }
                }
            }
        }

        $this->load->view('header');
        $this->load->view('transaksi_detail', $data);
        $this->load->view('footer');
    }
}
