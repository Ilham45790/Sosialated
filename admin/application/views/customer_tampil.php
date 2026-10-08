<div class="container">
        <h2>Data Customer</h2>
        <table class="table table-bordered" id="tabelku">
            <thead>
                <tr >
                    <th>ID Customer</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($pengguna as $p => $v):  ?>

                <tr>
                    <td><?php echo $p+1; ?></td>
                    <td><?php echo $v['nama']; ?></td>
                    <td><?php echo $v['email']; ?></td>
                    <td><?php echo $v['password']; ?></td>
                    <td><?php echo $v['alamat']; ?></td>
                    <td><?php echo $v['nomor_telepon']; ?></td>
                    <td>
                        <a href="<?php echo base_url("pengguna/hapus_customer/".$v["id_customer"]) ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
</div>