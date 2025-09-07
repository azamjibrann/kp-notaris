<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan</title>
    <link rel="stylesheet" href="css/layanan.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
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

    <!-- Layanan Notaris-->
    <div class="container-layanan">
        <h3>Layanan Notaris</h3>
        <div class="konten-layanan">
            <div class="pembuatan">
                <p>Pembuatan Akta Koperasi</p>
            </div>
            <div class="pembuatan">
                <p>Pembuatan CV </p>
            </div>
            <div class="pembuatan">
                <p>Pembuatan Akta PT</p>
                </div>
            <div class="pembuatan">
                <p>Pembuatan Akta Yayasan</p>
                </div>
            <div class="pembuatan">
                <p>Pembuatan Akta Perkumpulan</p>
                </div>
            <div class="pembuatan">
                <p>Warmerking/Register</p>
            </div>
            <div class="pembuatan">
                <p>Legalisasi</p>
            </div>
            <div class="pembuatan">
                <p>Pendirian Firma</p>
            </div>
            <div class="pembuatan">
                <p>Akta Jaminan Fidusia</p>
            </div>
            <div class="pembuatan">
                <p>Pembuatan Akta-Akta Notaril Lainnya</p>
            </div>
            {{-- <div class="pembuatan">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sequi.</p>
            </div>
            <div class="pembuatan">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sequi.</p>
            </div> --}}
        </div>
    </div>
    <!-- Akhir Layanan Notaris -->


    <!-- Layanan PPAT-->
    <div class="container-layanan">
        <h3>Layanan PPAT</h3>
        <div class="konten-layanan">
            <div class="pembuatan">
                <p>Pembuatan Akta Koperasi</p>
            </div>
            <div class="pembuatan">
                <p>Pembuatan CV </p>
            </div>
            <div class="pembuatan">
                <p>Pembuatan Akta PT</p>
                </div>
            <div class="pembuatan">
                <p>Pembuatan Akta Yayasan</p>
                </div>
            <div class="pembuatan">
                <p>Pembuatan Akta Perkumpulan Warmeking</p>
                </div>
            <div class="pembuatan">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sequi.</p>
            </div>
            <div class="pembuatan">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sequi.</p>
            </div>
            <div class="pembuatan">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sequi.</p>
            </div>
            <div class="pembuatan">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sequi.</p>
            </div>
            <div class="pembuatan">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sequi.</p>
            </div>
            <div class="pembuatan">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sequi.</p>
            </div>
            <div class="pembuatan">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sequi.</p>
            </div>
        </div>
    </div>
    <!-- Akhir Layanan PPAT -->


    <!-- Layanan Lainnya-->
    <div class="container-layanan">
        <h3>Layanan Lainnya</h3>
        <div class="konten-layanan">
            <div class="pembuatan">
                <p>Pembuatan Akta Koperasi</p>
            </div>
            <div class="pembuatan">
                <p>Pembuatan CV </p>
            </div>
            <div class="pembuatan">
                <p>Pembuatan Akta PT</p>
                </div>
            <div class="pembuatan">
                <p>Pembuatan Akta Yayasan</p>
                </div>
            <div class="pembuatan">
                <p>Pembuatan Akta Perkumpulan Warmeking</p>
                </div>
            <div class="pembuatan">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sequi.</p>
            </div>
            <div class="pembuatan">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sequi.</p>
            </div>
            <div class="pembuatan">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sequi.</p>
            </div>
            <div class="pembuatan">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sequi.</p>
            </div>
            <div class="pembuatan">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sequi.</p>
            </div>
            <div class="pembuatan">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sequi.</p>
            </div>
            <div class="pembuatan">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sequi.</p>
            </div>
        </div>
    </div>
    <!-- Akhir Layanan Lainnya -->


        <script src="js/script.js"></script>
</body>

</html>
