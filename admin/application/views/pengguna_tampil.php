<div class="container">
        <h5>Data Pelanggan</h5>
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
                        <a href="<?php echo base_url("pengguna/edit/".$v["id_customer"]) ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                        <a href="<?php echo base_url("pengguna/hapus/".$v["id_customer"]) ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <a href="<?php echo base_url("pengguna/tambah") ?>" class="btn btn-primary"><i class="bi bi-plus"></i>Tambah Data</a>
</div>