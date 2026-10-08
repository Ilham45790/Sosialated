<div class="container mt-5">
    <!-- main content -->
    <div class="container detail-order p-4" data-aos="zoom-in-up">
        <?php if ($this->session->flashdata('pesan_sukses')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('pesan_sukses'); ?>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('pesan_error')): ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('pesan_error'); ?>
                    </div>
                <?php endif; ?>


        <div class="row">
            <div class="row col-lg-6">
                <h5 class="col-sm-4 col-6">Nomor Pesanan</h5>
                <h5 class="col-sm-8 col-6"> : <?php echo $transaksi['id_transaksi'] ?></h5>
            </div>
        </div>
        <div class="row">
            <div class="row col-lg-6">
                <h5 class="col-sm-4 col-6">Tanggal Pesan</h5>
                <h5 class="col-sm-8 col-6"> : <?php echo date('d F Y', strtotime($transaksi["tanggal_transaksi"])) ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo date('H:i', strtotime($transaksi["tanggal_transaksi"])) ?> WIB</h5>
            </div>
            <div class="row col-lg-6">
                <h5 class="text-end pe-0">Status Pembayaran : <span class="badge bg-primary fs-6"><?php echo ucfirst($transaksi['status_pembayaran']) ?></span></h5>
            </div>
        </div>
        <div class="table-responsive">
                <h1>Detail Transaksi</h1>
                <p><strong>ID Transaksi:</strong> <?= $transaksi['id_transaksi']; ?></p>
                <p><strong>ID Customer:</strong> <?= $transaksi['id_customer']; ?></p>
                <p><strong>Total Harga:</strong> Rp <?= number_format($transaksi['total_harga'], 0, ',', '.'); ?></p>
                <p><strong>Tanggal Transaksi:</strong> <?= $transaksi['tanggal_transaksi']; ?></p>
                <p><strong>Status Pembayaran:</strong> <?= ucfirst($transaksi['status_pembayaran']); ?></p>

                <h2>Detail Pesanan</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama catalog</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($transaksi['detail_transaksi'])): ?>
                            <?php foreach ($transaksi['detail_transaksi'] as $item): ?>
                            <tr>
                                <td><?= $item['nama_catalog']; ?></td>
                                <td>Rp <?= number_format($item['harga'], 0, ',', '.'); ?></td>
                                <td><?= $item['jumlah']; ?></td>
                                <td>Rp <?= number_format($item['harga'] * $item['jumlah'], 0, ',', '.'); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">Tidak ada detail transaksi</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            <?php if (!empty($snapToken)) :  ?>
                <div class="d-flex justify-content-end">
                    <button href="" class="btn btn-danger mt-4 d-flex w-25 justify-content-center" id="pay-button">Bayar Sekarang</button>
                </div>
            <?php endif ?>

            <?php if (!empty($cekmidtrans)) :  ?>
                <div class="mt-5">
                    <h3 class="text-center">Detail Pembayaran</h3>
                    <table class="table table-borderless table-striped table-light text-center">
                        <thead>
                            <tr>
                                <th scope="col">Total Tagihan</th>
                                <th scope="col">Tipe Pembayaran</th>
                                <th scope="col">Status Pembayaran</th>
                                <th scope="col">Nomor VA</th>
                                <th scope="col">Kode VA</th>
                                <th scope="col">Waktu Transaksi</th>
                                <th scope="col">Batas Akhir Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>Rp. <?php echo number_format($cekmidtrans['gross_amount'], 0, ',', '.') ?></td>
                            <td><?php echo $cekmidtrans['payment_type'] ?></td>
                            <td><?php echo $cekmidtrans['transaction_status'] ?>
                                <?php if ($cekmidtrans['transaction_status'] == 'pending'): ?><br>
                                    Segera lakukan pembayaran sebelum waktu habis

                                   <?php if   (!empty($snapToken)) : ?>
                <div class="d-flex justify-content-end">
                    <button href="" class="btn btn-danger mt-4 d-flex w-25 justify-content-center" id="pay-button">Bayar Sekarang</button>
                </div>
            <?php endif ?>
                                <?php endif ?></td>
                            <td><?php echo $cekmidtrans['bill_key'] ?></td>
                            <td><?php echo $cekmidtrans['biller_code'] ?></td>
                            <td><?php echo $cekmidtrans['transaction_time'] ?></td>
                            <td><?php echo $cekmidtrans['expiry_time'] ?></td>  
                        </tbody>
                    </table>
                </div>
            <?php endif ?>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-FvBtfb0wg_6n8bA1"></script>
    <?php if (!empty($snapToken)) :  ?>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function() {
                snap.pay('<?php echo $snapToken ?>', {
                    onSuccess: function(result) {
                        window.location.href = "<?php echo base_url('transaksi/detail/' . $transaksi['id_transaksi']) ?>";
                    },
                    onPending: function(result) {
                        window.location.href = "<?php echo base_url('transaksi/detail/' . $transaksi['id_transaksi']) ?>";
                    },
                    onError: function(result) {
                        window.location.href = "<?php echo base_url('transaksi/detail/' . $transaksi['id_transaksi']) ?>";
                    }
                });
            };
        </script>
    <?php endif?>

</div>