<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    .header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .header h1 {
        font-size: 2rem;
        color: #000000; 
        margin: 0;
    }

    .header h1 span {
        font-size: 1.2rem;
        color: #000000; 
    }

    .header a {
        color: #3a7bd5; 
        text-decoration: none;
        font-size: 1rem;
    }

    .header a i {
        margin-right: 5px;
        color: #000000; 
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .card {
        background-color: #000000; 
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        color: white;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
    }

    .card i {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .card h3 {
        margin: 10px 0 5px;
        font-size: 1.5rem;
    }

    .card p {
        font-size: 0.9rem;
        margin: 0;
    }

    .card .btn {
        display: inline-block;
        margin-top: 15px;
        background-color: #D3D3D3; 
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 0.9rem;
        transition: background-color 0.2s ease;
    }
</style>

</head>
<body>
<div class="container">
        <div class="header">
            <h1>Dashboard <span>Control Panel</span></h1>
            <a href="#"><i class="fas fa-home"></i></a>
        </div>

        <div class="grid">
            <div class="card">
                
                <h3><?php echo $jumlah_pengguna; ?></h3>
                <p>Pengguna</p>
                <a href="<?php echo base_url("pengguna/customer") ?>" class="btn">More Info <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="card">
                
                <h3><?php echo $jumlah_catalog; ?></h3>
                <p>Catalog</p>
                <a href="<?php echo base_url("catalog") ?>" class="btn">More Info <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <div class="card">
                
                <h3><?php echo $jumlah_transaksi; ?></h3>
                <p>Transaksi</p>
                <a href="<?php echo base_url("transaksi") ?>" class="btn">More Info <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
