<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notaris</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="navbar">
            <div class="logo"><img src="img/logo.png" alt=""><a href="">Notaris/PPAT</a></div>
            <div class="menu">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="index.html">Galeri</a></li>
                    <li><a href="index.html">Layanan</a></li>
                    <li><a href="index.html">Tentang</a></li>
                    <li><a href="index.html">Kontak</a></li>
                    <li><a href="{{ route('login') }}" class="tbl-login">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="layar-penuh">
        <header id="home">
            <video autoplay muted loop src="img/body.mp4" ></video>
        </header>
    </div>
    <div class="intro">
        <h2 data-aos="zoom-out" data-aos-delay="300" data-aos-duration="1000">Layanan Notaris Online Terpercaya</h2>
        <p data-aos="zoom-out" data-aos-delay="300" data-aos-duration="1000">Proses mudah, cepat, dan aman. Semua dokumen Anda ditangani oleh profesional.</p>
        <p>
            <a href="{{ route('login') }}" class="tombol" data-aos="zoom-out" data-aos-anchor-placement="top-bottom" data-aos-delay="300" data-aos-duration="1000">Daftar Sekarang</a>
        </p>
    </div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

</body>
</html>