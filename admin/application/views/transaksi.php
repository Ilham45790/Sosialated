<div class="container">
        <h5>Riwayat Transaksi</h5>
        <table class="table table-bordered" id="tabelku">
            <thead style="text-align: center;">
                <tr >
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Tanggal Transaksi</th>
                    <th>Total Harga</th>
                    <th>Status Transaksi</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">

                <?php foreach ($transaksi as $p => $v): ?>

                <tr>
                    <td><?php echo $p+1 ?></td>
                    <td><?php echo $v['nama']; ?></td>
                    <td><?php echo date('d M Y', strtotime($v['tanggal_transaksi'])) ?></td>
                    <td><?php echo number_format($v['total_harga']) ?></td>
                    <td>
                        <span class="badge bg-dark">
                            <?php echo $v['status_pembayaran'] ?>
                        </span>
                    </td>
                    <td>
                        <a href="<?php echo base_url("transaksi/hapus/".$v["id_transaksi"]) ?>" class="btn btn-info">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="text-end mt-3">
            <a href="<?php echo base_url('transaksi/cetak_csv') ?>" class="btn btn-success">Cetak CSV</a>
        </div>
</div>