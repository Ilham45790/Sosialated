<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-box {
            margin: 80px auto;
            max-width: 400px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);

            body {
            background-color: #808080; 
        }

        .login-container {
            max-width: 400px;
            margin: auto;
            margin-top: 10%;
            background: black;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0px 4px 10px rgb(0, 0, 0, 0.1);
        }

        h1 {
            font-family: 'Henny Penny', cursive;
            font-size: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
            color: white;
        }

        h1 img {
            height: 2rem;
            margin-left: 10px;
        }

        .form-control {
            background-color: #D3D3D3; 
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            margin-bottom: 25px;
        }

        .form-control:focus {
            box-shadow: none;
            border: 1px solid #D3D3D3; 
        }

        .btn-primary {
            background-color: #000000;
            border: none;
            border-radius: 30px;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
        }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h3 class="text-center mb-4">Login Admin</h3>

            <?php if ($this->session->flashdata('pesan_sukses')): ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('pesan_sukses') ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('pesan_gagal')): ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('pesan_gagal') ?>
                </div>
            <?php endif; ?>

            <?= form_open('welcome', ['autocomplete' => 'off']) ?>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input autocomplete="off" type="email" name="email" class="form-control" placeholder="Email">
                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input autocomplete="off" type="password" name="password" class="form-control" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-4">Login</button>
            <?= form_close() ?>
        </div>
    </div>
</body>
</html>








<style>
        @import url('https://fonts.googleapis.com/css2?family=Henny+Penny&display=swap');

        
    </style>