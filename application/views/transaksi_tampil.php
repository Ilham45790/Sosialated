<div class="container mt-5">


    <div class="container">
    <h5>Data Transaksi Beli <?php echo $this->session->userdata("nama") ?></h5>

    <table class="table table-bordered" id="tabelku">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi as $key => $value): ?>

            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo date('d M Y H:i', strtotime($value['tanggal_transaksi'])) ?></td>
                <td><?php echo number_format($value['total_harga']) ?></td>
               <td>
                     <span class="badge bg-dark">
                        <?php echo $value['status_pembayaran'] ?>
                    </span>
               </td>
                    <td>
                    <a href="<?php echo base_url("transaksi/detail/".$value["id_transaksi"]) ?>" class="btn btn-info">Detail</a>
                </td>
            </tr>

            <?php endforeach ?>
        </tbody>
    </table>
    
</div>
</div>