<div class="container">
        <h2 class="mb-3">Data Catalog</h2>
        <a href="<?php echo base_url("catalog/tambah") ?>" class="btn btn-dark mb-3"><i class="bi bi-plus"></i>Tambah Catalog</a>
        <table class="table table-bordered" id="tabelku">
            <thead>
                <tr >
                    <th>ID Catalog</th>
                    <th>Nama Catalog</th>
                    <th>Gambar Catalog</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Stok Catalog</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($catalog as $m => $v):  ?>

                <tr>
                    <td><?php echo $m+1; ?></td>
                    <td><?php echo $v['nama_catalog']; ?></td>
                    <td><img src="<?php echo $this->config->item('url_catalog') . $v['gambar_catalog']; ?>" class="card-img-top" alt="Catalog Image" style="height: 100px; object-fit: cover;"></td>
                    <td><?php echo $v['deskripsi']; ?></td>
                    <td><?php echo $v['harga']; ?></td>
                    <td><?php echo $v['stok_catalog']; ?></td>
                    <td>
                        <a href="<?php echo base_url("catalog/edit/".$v["id_catalog"]) ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                        <a href="<?php echo base_url("catalog/hapus/".$v["id_catalog"]) ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
</div>