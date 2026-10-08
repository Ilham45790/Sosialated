<div class="container mt-5">
    <section class="py-5">
        <div class="container">
            <!-- section bar -->
            <form action="<?= base_url('catalog/pencarian'); ?>" method="GET" class="mb-4">
                <div class="search-container">
                    <input type="text" name="query" placeholder="Cari Catalog"
                        value="<?= htmlspecialchars($query ?? '') ?>"
                        arial-label="Cari Catalog" class="search-input">
                    <button type="submit" class="search-button">
                        Cari <i class="bi bi-search" style="margin-left: 5px;"></i>
                    </button>
                    <!-- tombol semua -->
                    <a href="<?= base_url('catalog'); ?>" class="all-button">Semua</a>
                </div>
                
            </form>

            
        </div>
        <style>
    /* Styling untuk Search Bar */
    .search-container {
        display: flex;
        gap: 10px; /* Jarak antar elemen */
        align-items: center;
        max-width: 700px; /* Lebar maksimum container pencarian */
        margin: 0 auto 30px auto; /* Penting: margin auto untuk memusatkan */
        background-color: #ffffff;
        border-radius: 50px; /* Bentuk kapsul */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        padding: 8px;
    }

    .search-input {
        flex-grow: 1; /* Input mengambil sisa ruang */
        padding: 12px 20px;
        border: none;
        border-radius: 50px; /* Sesuaikan dengan container */
        font-size: 1rem;
        outline: none; /* Hilangkan outline saat fokus */
        background-color: transparent; /* Transparan agar shadow container terlihat */
    }

    .search-input::placeholder {
        color: #a0a0a0;
    }

    .search-button {
        background-color: #007bff; /* Warna biru Bootstrap primary */
        color: white;
        border: none;
        border-radius: 50px;
        padding: 12px 25px;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 600;
        transition: background-color 0.3s ease, transform 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .search-button:hover {
        background-color: #0056b3; /* Warna biru lebih gelap saat hover */
        transform: translateY(-2px); /* Efek sedikit mengangkat */
    }

    .search-button i {
        margin-left: 8px;
    }

    .all-button {
        background-color: #6c757d; /* Warna abu-abu Bootstrap secondary */
        color: white;
        border: none;
        border-radius: 50px;
        padding: 12px 25px;
        text-decoration: none; /* Hilangkan garis bawah */
        font-size: 1rem;
        font-weight: 600;
        transition: background-color 0.3s ease, transform 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .all-button:hover {
        background-color: #5a6268;
        transform: translateY(-2px);
        color: white; /* Pastikan warna teks tetap putih */
    }

    /* Penyesuaian untuk kartu katalog */
    .card {
        border-radius: 15px;
        overflow: hidden; /* Penting agar gambar tidak keluar dari radius */
    }

    .card-img-top {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .card-body {
        padding-top: 15px;
        padding-bottom: 5px; /* Kurangi padding bawah */
    }

    .card-footer {
        background-color: #f8f9fa; /* Warna latar belakang footer */
        border-top: 1px solid #eee;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .input-group .form-control {
        border-radius: 50px 0 0 50px !important; /* Sudut melengkung kiri */
        border-right: none; /* Hilangkan border di tengah */
        padding-left: 15px;
    }

    .input-group .btn {
        border-radius: 0 50px 50px 0 !important; /* Sudut melengkung kanan */
        padding-left: 15px;
        padding-right: 15px;
    }

    .input-group {
        box-shadow: 0 2px 5px rgba(0,0,0,0.05); /* Sedikit bayangan pada input jumlah */
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        .search-container {
            flex-direction: column; /* Tumpuk elemen saat layar kecil */
            border-radius: 15px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 90%;
        }

        .search-input,
        .search-button,
        .all-button {
            width: 100%; /* Penuhi lebar container */
            border-radius: 10px; /* Radius sedikit kurang melengkung */
            margin-bottom: 10px; /* Jarak antar elemen yang ditumpuk */
        }

        .search-button,
        .all-button {
            padding: 10px 15px; /* Sesuaikan padding */
        }

        .search-container .search-input {
            margin-bottom: 10px; /* Jarak tambahan antara input dan tombol */
        }

        /* Hapus margin-bottom terakhir dari elemen yang ditumpuk */
        .search-container > *:last-child {
            margin-bottom: 0;
        }
    }
</style>
    </section>
    <!-- catalog Section -->
    <div class="row">
        <?php if (!empty($catalog) && is_array($catalog)): ?>
            <?php foreach ($catalog as $key => $value): ?>
                <div class="col-md-4 mb-4">
                    <!-- catalog Card -->
                        <div class="card shadow-sm border-0 h-100">
                            <a href=" <?php echo base_url("catalog/detail/" .$value["id_catalog"]) ?>" class="text-decoration-none">
                        <img src="<?php echo $this->config->item('url_catalog') . $value['gambar_catalog']; ?>" class="card-img-top" alt="Catalog Image" style="height: 300px; object-fit: cover;">
                        <div class="card-body text-center">
                            <!-- catalog Title -->
                            <h5 class="card-title text-dark" style="font-weight: bold; font-size: 20px;">
                                <?php echo $value['nama_catalog']; ?>
                            </h5>
                            <!-- catalog Price -->
                            <p class="card-text text-success mb-2" style="font-size: 18px; font-weight: bold;">
                                IDR <?php echo number_format($value['harga'], 2); ?>
                            </p>
                            <!-- catalog Description -->
                            <p class="card-text text-muted" style="font-size: 14px;">
                                <?php echo $value['deskripsi']; ?>
                            </p>
                            <!-- Stock Availability -->
                            <p class="text-<?php echo $value['stok_catalog'] == 0 ? 'danger' : 'success'; ?>" style="font-size: 14px;">
                                <?php echo $value['stok_catalog'] == 0 ? 'Tidak Tersedia' : 'Tersedia: <strong>' . $value['stok_catalog'] . '</strong>'; ?>
                            </p>



                            </a>

                            <?php if ($value['stok_catalog'] > 0): ?>
                                <!-- Add to Cart Form -->
                                <form method="post" action="<?php echo site_url('keranjang/tambah'); ?>">
                                    <input type="hidden" name="id_catalog" value="<?php echo $value['id_catalog']; ?>">
                                    <input type="hidden" name="nama_catalog" value="<?php echo $value['nama_catalog']; ?>">
                                    <input type="hidden" name="harga" value="<?php echo $value['harga']; ?>">
                                    <input type="hidden" name="gambar_catalog" value="<?php echo $value['gambar_catalog']; ?>">
                                    <div class="input-group mb-3" style="max-width: 300px;">
                            <input type="number" name="jumlah" class="form-control" min="1" placeholder="Jumlah" required>
                            <button class="btn btn-dark" type="submit">
                                <i class="fa-solid fa-cart-shopping"></i> Tambah ke Keranjang
                            </button>
                        </div>
                                </form>
                            <?php else: ?>
                                <p class="text-danger">catalog tidak tersedia</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <?php if (($key + 1) % 3 == 0): ?>
                    </div><div class="row">
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center my-5">
                <p class="text-muted" style="font-size: 18px;">catalog belum tersedia saat ini.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
