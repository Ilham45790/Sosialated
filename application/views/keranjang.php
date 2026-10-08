<div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Catalog</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($keranjang)): ?>
                    <?php foreach ($keranjang as $item): ?>
                        <tr>
                            <td>
                                <img src="<?php echo $this->config->item('url_catalog') . $item['gambar_catalog']; ?>" class="card-img-top" alt="Catalog Image" style="height: 200px; object-fit: cover;">
                                <p class="mt-3"><?php echo $item['nama_catalog']; ?></p>
                            </td>
                            <td><?php echo number_format($item['harga'], 2); ?></td>
                            <td><?php echo $item['jumlah']; ?></td>
                            <td><?php echo number_format($item['harga'] * $item['jumlah'], 2); ?></td>
                            <td>
                                <a href="<?php echo site_url('keranjang/hapus/'.$item['id_keranjang']); ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Keranjang Anda kosong.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <th><?php echo number_format($total_harga, 2); ?></th>
                </tr>
            </tfoot>
        </table>
    </div>

    <form action="<?php echo site_url('keranjang/proses_checkout'); ?>" method="post">
        <button type="submit" class="btn btn-success btn-block">Checkout dan Bayar</button>
    </form>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-FvBtfb0wg_6n8bA1"></script>
    <script type="text/javascript">
        document.querySelector('form').onsubmit = function(event) {
            event.preventDefault();

            snap.pay('<?php echo $snapToken; ?>', {
                onSuccess: function(result) {
                    alert('Pembayaran berhasil!');
                    window.location.href = '<?php echo site_url('keranjang/terima_kasih'); ?>';
                },
                onPending: function(result) {
                    alert('Pembayaran tertunda.');
                },
                onError: function(result) {
                    alert('Pembayaran gagal.');
                }
            });
        };
    </script>
</div>
