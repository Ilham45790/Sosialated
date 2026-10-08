<style>
@import url('https://fonts.googleapis.com/css2?family=Henny+Penny&display=swap');

body {
    background-color: #f2f2f2; 
}

.register-container {
    max-width: 650px;
    margin: auto;
    margin-top: 3%;
    background: #fff;
    border-radius: 10px;
    padding: 40px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15); 
}

h1 {
    font-family: 'Henny Penny', cursive;
    font-size: 3rem;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    color: #000000 ; 
}
.yoo {
    font-family: 'Playfair Display', serif;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
    color: #4e3629; 
}

h1 img {
    height: 2rem;
    margin-left: 10px;
}

.form-control {
    background-color: #fff; 
    border: 1px solid #3e2723; 
    border-radius: 30px;
    padding: 10px 20px;
    margin-bottom: 25px;
    color: #3e2723; 
}

.btn-primary {
    background-color: #000000 ; 
    border: none;
    border-radius: 30px;
    width: 100%;
    padding: 10px;
    margin-top: 30px;
    color: #fff; 
    font-weight: bold;
    transition: background-color 0.3s ease;
}

</style>

    <div class="register-container" style="margin-top: 95px;">
        <h1>
            SOCIALATED
        </h1>
        <p class="yoo">Registration</p>
        <form action="" method="post">
            <input type="text" placeholder="Nama" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>">
            <div class="text-danger small">
                <?php echo form_error('nama'); ?>
            </div>
            <input type="text" placeholder="Email" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
            <div class="text-danger small">
                <?php echo form_error('email'); ?>
            </div>
            <input type="password" placeholder="Password" name="password" class="form-control" value="<?php echo set_value('password'); ?>">
            <div class="text-danger small">
                <?php echo form_error('password'); ?>
            </div>
            <input type="text" placeholder="Alamat" name="alamat" class="form-control" value="<?php echo set_value('alamat'); ?>">
            <div class="text-danger small">
                <?php echo form_error('alamat'); ?>
            </div>
            <input type="text" placeholder="Nomor Telepon" name="nomor_telepon" class="form-control" value="<?php echo set_value('nomor_telepon'); ?>">
            <div class="text-danger small">
                <?php echo form_error('nomor_telepon'); ?>
            </div>
            <button type="submit" class="btn btn-primary">Sign In</button>
        </form>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php if ($this->session->flashdata('pesan_sukses')): ?>
    <script>swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses'); ?>", "success");</script>
    <?php endif ?>
    <?php if ($this->session->flashdata('pesan_gagal')): ?>
    <script>swal("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal'); ?>", "error");</script>
    <?php endif ?>
