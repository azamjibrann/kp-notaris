<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
    <link rel="stylesheet" href="css/kontak.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-transparent" id="navbar">
        <div class="logo">
            <img src="{{ asset('img/logof.png') }}" alt="">
            <a href="{{ route('index') }}">Notaris/PPAT</a>
        </div>

        <div class="hamburger" onclick="toggleMenu()">
            <i class='bx bx-menu'></i>
        </div>

        <div class="menu" id="navMenu">
            <a href="{{ route('index') }}" class="{{ Request::routeIs('index') ? 'active' : '' }}">Home</a>
            <a href="{{ route('galeri') }}" class="{{ Request::routeIs('galeri') ? 'active' : '' }}">Galeri</a>
            <a href="{{ route('layanan') }}" class="{{ Request::routeIs('layanan') ? 'active' : '' }}">Layanan</a>
            <a href="{{ route('tentang') }}" class="{{ Request::routeIs('tentang') ? 'active' : '' }}">Tentang</a>
            <a href="{{ route('kontak') }}" class="{{ Request::routeIs('kontak') ? 'active' : '' }}">Kontak</a>
            <a href="{{ route('login.form') }}" class="tbl-login masuk-mobile {{ Request::routeIs('login.form') ? 'active' : '' }}">Masuk / Daftar</a>
        </div>

        <div class="masuk masuk-dekstop" id="navMasuk">
            <a href="{{ route('login') }}" class="tbl-login">Masuk / Daftar</a>
        </div>
    </nav>
    <!-- Akhiran Nav -->
    <!-- Hal Utama -->
    <div class="container-kontak">
        <div class="gambar-kontak">
            <img src="img/kontak.jpg" alt="">
        </div>
        <div class="bg-gambar">
            <div class="hubungi-kami">
                <div class="wg" data-aos="zoom-in" data-aos-delay="60" data-aos-duration="600"
                    data-aos-anchor-placement="top-bottom">
                    <h2>Hubungi Kami</h2>
                    <p>Kami Siap Membantu Anda</p>
                    <div class="bungkus-sosmed">
                        <a href="https://wa.me/6285794778311?text=Hallo%20!" target="_blank">
                            <div class="sosmed wa">
                                <h3>WhatsApp</h3>
                                <i class='bx bxl-whatsapp bx-lg bx-tada-hover'></i>
                            </div>
                        </a>
                        <a href="">
                            <div class="sosmed gmail">
                                <h3>Gmail</h3>
                                <i class='bx bxl-gmail bx-lg bx-tada-hover'></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhiran Hal Utama -->


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
        });
    </script>
    <script src="js/script.js"></script>
</body>

</html>
