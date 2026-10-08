<div class="container my-5">
    <?php if (!empty($catalog)): ?>
        <div class="row">
            <div class="col-md-6 mb-4">
                <img src="<?php echo $this->config->item('url_catalog') . $catalog['gambar_catalog']; ?>" class="img-fluid rounded shadow-sm" alt="Gambar Catalog" style="object-fit: cover; width: 100%; max-height: 500px;">
            </div>

            <div class="col-md-6">
                <h2 class="text-dark fw-bold mb-3"><?php echo $catalog['nama_catalog']; ?></h2>

                <h4 class="text-success fw-bold mb-3">
                    IDR <?php echo number_format($catalog['harga'], 2); ?>
                </h4>

                <p class="text-muted mb-3" style="font-size: 16px;">
                    <?php echo nl2br($catalog['deskripsi']); ?>
                </p>

                <p class="mb-3">
                    <?php if ($catalog['stok_catalog'] > 0): ?>
                        <span class="badge bg-success">Stok Tersedia: <?php echo $catalog['stok_catalog']; ?></span>
                    <?php else: ?>
                        <span class="badge bg-danger">Stok Habis</span>
                    <?php endif; ?>
                </p>

                <?php if ($catalog['stok_catalog'] > 0): ?>
                    <form method="post" action="<?php echo site_url('keranjang/tambah'); ?>" class="mt-4">
                        <input type="hidden" name="id_catalog" value="<?php echo $catalog['id_catalog']; ?>">
                        <input type="hidden" name="nama_catalog" value="<?php echo $catalog['nama_catalog']; ?>">
                        <input type="hidden" name="harga" value="<?php echo $catalog['harga']; ?>">
                        <input type="hidden" name="gambar_catalog" value="<?php echo $catalog['gambar_catalog']; ?>">

                        <div class="input-group mb-3" style="max-width: 300px;">
                            <input type="number" name="jumlah" class="form-control" min="1" placeholder="Jumlah" required>
                            <button class="btn btn-dark" type="submit">
                                <i class="fa-solid fa-cart-shopping"></i> Tambah ke Keranjang
                            </button>
                        </div>
                    </form>
                <?php else: ?>
                    <p class="text-danger mt-4">Produk ini sedang tidak tersedia.</p>
                <?php endif; ?>
            </div>
        </div>

        <?php if (!empty($rekomendasi_produk)): ?>
            <hr>
            <h4 class="mt-5 mb-3 text-dark fw-bold">Produk yang Mungkin Juga Anda Sukai</h4>
            <div class="row row-cols-2 row-cols-md-4 g-4">
                <?php foreach ($rekomendasi_produk as $produk_rekomendasi): ?>
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <img src="<?php echo $this->config->item('url_catalog') . $produk_rekomendasi['gambar_catalog']; ?>" class="card-img-top" alt="<?= $produk_rekomendasi['nama_catalog']; ?>" style="object-fit: cover; height: 150px;">
                            <div class="card-body">
                                <h6 class="card-title fw-bold"><?= $produk_rekomendasi['nama_catalog']; ?></h6>
                                <p class="card-text text-success fw-bold">IDR <?= number_format($produk_rekomendasi['harga'], 2); ?></p>
                                <a href="<?= site_url('catalog/detail/' . $produk_rekomendasi['id_catalog']) ?>" class="btn btn-sm btn-outline-dark">Lihat Detail</a>
                                <p class="small text-muted mt-2 mb-0">
                                    <small>
                                        <i class="fa-solid fa-arrow-up-right-dots"></i> Confidence: <?= number_format($produk_rekomendasi['confidence'], 2); ?><br>
                                        <i class="fa-solid fa-chart-line"></i> Support: <?= number_format($produk_rekomendasi['support'], 2); ?><br>
                                        <i class="fa-solid fa-arrows-up-down"></i> Lift: <?= number_format($produk_rekomendasi['lift'], 2); ?>
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    <?php else: ?>
        <div class="alert alert-warning text-center">
            Detail catalog tidak ditemukan.
        </div>
    <?php endif; ?>
</div>