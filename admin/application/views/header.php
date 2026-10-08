<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sosialated-Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <nav style="color: black;" class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
        <div class="container">
            <a href="#" class="navbar-brand">Admin</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="naff">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="<?php echo base_url("home") ?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pengguna</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url("pengguna/customer") ?>" class="dropdown-item">Customer</a></li>
                            <li><a href="<?php echo base_url("pengguna/admin") ?>" class="dropdown-item">Admin</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("catalog") ?>" class="nav-link">Catalog</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("transaksi") ?>" class="nav-link">Riwayat Transaksi</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="<?php echo base_url("akun") ?>" class="nav-link">
                            <?php echo $this->session->userdata("nama") ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("logout") ?>" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   