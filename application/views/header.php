<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sosialated</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        .navbar {
            background-color: #FFFFFF; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); 
            font-family: 'Playfair Display', serif;
            width: 100%;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: #F8EDE3; 
            text-transform: uppercase; 
        }

        .nav-link {
            color: #000000; 
            font-size: 1rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #000000; 
            text-decoration: underline;
        }

        .w-100 {
            background-size: cover; 
            height: 500px; 
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: white; 
            padding: 25px;
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        }

        .cta {
          margin-top: 1rem;
          display: inline-block;
          padding: 1rem 2rem;
          font-size: 1rem;
          color: #fff;
          background-color: #4B3A36; 
          border-radius: 1rem;
          text-decoration: none;
        }

    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
            <img src="<?php echo base_url('assets/S C L T D 2.png') ?>" style="width: 100px; height: 100px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#naff" 
                    aria-controls="naff" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="naff">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?php echo base_url('home') ?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('keranjang') ?>" class="nav-link">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('transaksi') ?>" class="nav-link">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('catalog') ?>" class="nav-link">Catalog</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <?php if(!$this->session->userdata("id_customer")) : ?>
                        <li class="nav-item">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#login" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('register') ?>" class="nav-link">Register</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('logout') ?>" class="nav-link">Logout</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>