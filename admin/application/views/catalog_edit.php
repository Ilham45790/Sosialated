<div class="container">
    <h5>Edit Catalog</h5>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="">Nama Catalog</label>
            <input type="text" name="nama_catalog" class="form-control" value="<?php echo set_value("nama_catalog", $catalog['nama_catalog']) ?>">
            <span class="text-danger small">
                <?php echo form_error("nama_catalog") ?>
            </span>
        </div>
        <div class="mb-3">
            <label for="">Gambar Catalog</label>
            <input type="file" name="gambar_catalog" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Deskripsi Catalog</label>
            <input type="text" name="deskripsi" class="form-control" value="<?php echo set_value("deskripsi", $catalog['deskripsi']) ?>">
            <span class="text-danger small">
                <?php echo form_error("deskripsi") ?>
            </span>
        </div>
        <div class="mb-3">
            <label for="">Harga Catalog</label>
            <input type="text" name="harga" class="form-control" value="<?php echo set_value("harga", $catalog['harga']) ?>">
            <span class="text-danger small">
                <?php echo form_error("harga") ?>
            </span>
        </div>
        <div class="mb-3">
            <label for="">Stok Catalog</label>
            <input type="text" name="stok_catalog" class="form-control" value="<?php echo set_value("stok", $catalog['stok_catalog']) ?>">
            <span class="text-danger small">
                <?php echo form_error("stok_catalog") ?>
            </span>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>