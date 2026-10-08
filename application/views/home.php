<style>
    .container img {
        transition: transform 0.5s ease-in-out; 
    }

    .container img:hover {
        transform: scale(1.05); 
    }

    .container {
        position: relative;
        text-align: left;
        color: white;
    }

    .text-block {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        padding: 50px;
        width: 40%;
    }

    .text-block h1 {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        color: #d4af37;
    }

    .text-block h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        color: white;
    }

    .text-block p {
        font-family: 'Garet', sans-serif;
        font-size: 1rem;
        color: white;
    }

    .text-block .stars {
        color: #d4af37;
    }

    .text-block-1 {
        position: absolute;
        right: 80px;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        padding: 50px;
        width: 40%;
    }

    .text-block-1 h1 {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        color: #d4af37;
    }

    .text-block-1 h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        color: white;
    }

    .text-block-1 p {
        font-family: 'Garet', sans-serif;
        font-size: 1rem;
        color: white;
    }

    .text-block-1 .stars {
        color: #d4af37;
    }

    .carousel-item {
        height: 1000px; /* Set height for the carousel items */
        background-position: center;
        background-size: cover;
        border-radius: 15px;
    }

    .carousel-inner {
        height: 100%;
    }

    .carousel-caption {
        font-family: 'Great Vibes', cursive;
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        text-align: center;
    }

    .carousel-caption h1 {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        color: #000000;
    }

    .carousel-caption h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        color: white;
    }

    .about-section, .location-section {
        margin-top: 50px;
        text-align: center;
        padding: 50px 20px;
        background-color: #FFFFFF;
        color: white;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .about-section h1, .location-section h1 {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        color: #000000;
        margin-bottom: 20px;
    }

    .about-section p, .location-section p {
        font-family: 'Playfair Display', serif;
        font-size: 1.2rem;
        color: #000000;
        line-height: 1.8;
    }

    .location-section iframe {
        width: 100%;
        height: 400px;
        border-radius: 15px;
        margin-top: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

</style>
<div id="welcomeCarousel" class="carousel slide" data-bs-ride="carousel" style="margin-top: 95px;">
    <div class="carousel-inner">
        <!-- First slide -->
        <div class="carousel-item active" style="background-image: url('./assets/produk/kaos polos 6.jpg');">
            <div class="carousel-caption d-none d-md-block">
                <h1>P O L O S</h1>
            </div>
        </div>
        <!-- Second slide -->
        <div class="carousel-item" style="background-image: url('./assets/produk/kaos polos 8.jpg');">
            <div class="carousel-caption d-none d-md-block">
                <h1>P O L O S</h1>
            </div>
        </div>
        <!-- Third slide -->
        <div class="carousel-item" style="background-image: url('./assets/produk/kaos polos 9.jpg');">
            <div class="carousel-caption d-none d-md-block">
                <h1>P O L O S</h1>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#welcomeCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#welcomeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
    <!-- About Us Section -->
    <div class="about-section">
        <h1>About Us</h1>
        <p>"KAMI SIAP MELAYANI ANDA, JIKA ANDA INGIN MENCARI KAOS POLOS ATAU KAOS APAPUN ITU ANDA SANGAT TEPAT JIKA MEMBUKA WEBSITE KAMU"</p>
    </div>

    </div>
