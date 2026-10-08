<div class="container">
    <h5>Tambah admin</h5>

    <form action="" method="post">
        <div class="mb-3">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo set_value("nama") ?>">
            <span class="text-danger small">
                <?php echo form_error("nama") ?>
            </span>
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo set_value("email") ?>">
            <span class="text-danger small">
                <?php echo form_error("email") ?>
            </span>
        </div>
        <div class="mb-3">
            <label for="">Password</label>
            <input type="text" name="password" class="form-control" value="<?php echo set_value("password") ?>">
            <span class="text-danger small">
                <?php echo form_error("password") ?>
            </span>
        </div>
        <div class="mb-3">
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>