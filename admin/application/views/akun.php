<div class="container mt-5">
    <h5>Ubah Akun</h5>
        <div class="row">
            <div class="col-md-4 mt-5 offset-md-4 bg-white shadow p-5">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo set_value("nama", $this->session->userdata("nama")) ?>">
                        <span class="text-danger small">
                            <?php echo form_error("nama") ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control">
                        <p class="text-muted">Kosongkan jika password tidak diubah</p>
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo set_value("email", $this->session->userdata("email")) ?>">
                        <span class="text-danger small">
                            <?php echo form_error("email") ?>
                        </span>
                    </div>
                    <button class="btn btn-primary">Ubah Akun</button>
                </form>
            </div>
        </div>
</div>