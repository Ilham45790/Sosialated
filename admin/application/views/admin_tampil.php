<div class="container">
        <h2 class="mb-3">Data Admin</h2>
        <a href="<?php echo base_url("pengguna/tambah_admin") ?>" class="btn btn-primary mb-3"><i class="bi bi-plus"></i>Tambah Data</a>
        <table class="table table-bordered" id="tabelku">
            <thead>
                <tr >
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
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
                    <td>
                        <a href="<?php echo base_url("pengguna/edit_admin/".$v["id_admin"]) ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                        <a href="<?php echo base_url("pengguna/hapus_admin/".$v["id_admin"]) ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
</div>