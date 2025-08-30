<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notaris</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <nav class="navbar" id="navbar">
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

    <!-- Hal Utama -->
    <div class="layar-penuh">
        <header id="home">
            <video autoplay muted loop src="img/body.mp4"></video>
        </header>
    </div>
    <div class="intro">
        <h2 data-aos="zoom-out" data-aos-delay="300" data-aos-duration="1000">Mitra terpercaya dalam layanan
            kenotariatan dan pertanahan</h2>
        <p data-aos="zoom-out" data-aos-delay="300" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
            Dengan pengalaman yang luas dan keahlian
            dalam hukum, kami berkomitmen untuk memberikan pelayanan terbaik bagi Anda, baik individu, perusahaan,
            maupun instansi.</p>
    </div>
    <div>
    </div>
    <!-- Akhir Hal Utama -->


    <!-- Kenali Kami -->
    <div class="container-kenali">
        <div class="gambar">
            <img src="img/kantor.png" alt="" data-aos="zoom-out" data-aos-delay="300" data-aos-duration="750">
        </div>
        <div class="kata-gambar">
            <h3 data-aos="fade-left" data-aos-delay="100" data-aos-duration="750">Kenali Lebih Dekat Kantor Kami</h3>
            <p data-aos="fade-left" data-aos-delay="100" data-aos-duration="750">Berpengalaman sebagai PPAT sejak 2019
                dan Notaris resmi sejak 2023, kami siap melayani kebutuhan hukum
                Anda, baik untuk urusan perorangan, perusahaan, maupun instansi.</p>
            <div class="list-check" data-aos="fade-left" data-aos-delay="100" data-aos-duration="750">
                <p><i class='bx bxs-check-circle'></i> Pengetahuan tinggi di bidang Notaris dan PPAT</p>
                <p><i class='bx bxs-check-circle'></i> Kerja sama yang solid dengan mitra dan klien</p>
                <p><i class='bx bxs-check-circle'></i> Kualitas layanan yang ramah dan responsif</p>
                <p><i class='bx bxs-check-circle'></i> Komitmen untuk terus berkembang bersama tim dan teknologi</p>
            </div>
            <div class="kenali-kami">
                <a href="{{ route('tentang') }}" class="tbl-kenali">Tentang Kami</a>
            </div>
        </div>
    </div>
    <!-- Akhir Kenali Kami -->


    <!-- Rumah Kantor -->
    <div class="container-rumah">
        <div class="gambar-rumah">
            <img src="img/rumah.jpg" alt="">
        </div>
        <div class="konten-rumah">
            <div class="isi-rumah">
                <h3 data-aos="fade-left" data-aos-delay="300" data-aos-duration="750">Kantor Notaris & PPAT Yanti
                    Haryanti, S.H. , M.Kn</h3>
                <div class="jalan" data-aos="fade-right" data-aos-delay="300" data-aos-duration="750">
                    <p><i class='bx bx-location-plus'> Jl.Raya Singaparna ,Kp.Desa Kolot Nomor 8</i></p>
                    <p class="desa">Desa Cikunir, Kecamatan Singaparna,Kabupaten Tasikmalaya</p>
                </div>
                <div class="jadwal" data-aos="fade-left" data-aos-delay="300" data-aos-duration="750">
                    <p><strong>Jam Operasional :</strong></p>
                    <table>
                        <tr>
                            <td>Senin</td>
                            <td>08:00–16:30</td>
                        </tr>
                        <tr>
                            <td>Selasa</td>
                            <td>08:00–16:30</td>
                        </tr>
                        <tr>
                            <td>Rabu</td>
                            <td>08:00–16:30</td>
                        </tr>
                        <tr>
                            <td>Kamis</td>
                            <td>08:00–16:30</td>
                        </tr>
                        <tr>
                            <td>Jumat</td>
                            <td>08:00–16:30</td>
                        </tr>
                        <tr>
                            <td>Sabtu</td>
                            <td class="tutup">Tutup</td>
                        </tr>
                        <tr>
                            <td>Minggu</td>
                            <td class="tutup">Tutup</td>
                        </tr>
                        <tr>
                            <td>Hari-Hari Besar</td>
                            <td class="tutup">Tutup</td>
                        </tr>
                        <tr>
                            <td>Hari Libur Nasional</td>
                            <td class="tutup">Tutup</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Rumah Kantor -->


    <!-- Layanan -->
    <h2 class="judul-layanan" id="layanan">Layanan</h2>
    <div class="layanan-container">
        <div class="layanan satu" data-aos="fade-right" data-aos-delay="200" data-aos-duration="750">
            <img class="gambar-layanan" src="img/layanan-notaris.jpg" alt="">
            <h3>Layanan Notaris</h3>
            <p>Kami menyediakan layanan pembuatan dan pengesahan dokumen hukum yang sah dan memiliki kekuatan pembuktian
                di mata hukum.</p>
        </div>
        <div class="layanan dua" data-aos="zoom-out" data-aos-delay="200" data-aos-duration="750">
            <img class="gambar-layanan" src="img/layanan-ppat.jpg" alt="">
            <h3>Layanan PPAT</h3>
            <p>Sebagai Pejabat Pembuat Akta Tanah (PPAT), kami menangani proses hukum pertanahan dan peralihan hak atas
                tanah dengan aman dan terpercaya</p>
        </div>
        <div class="layanan tiga" data-aos="fade-left" data-aos-delay="200" data-aos-duration="750">
            <img class="gambar-layanan" src="img/layanan-lain.jpg" alt="">
            <h3>Layanan Lainnya</h3>
            <p>Kami juga menyediakan layanan tambahan yang mendukung kebutuhan hukum dan administrasi Anda.</p>
        </div>

    </div>
    </div>
    <!-- Akhiran Layanan -->


    <!-- Footer -->
    <div class="container-footer">
        <div class="footer kiri">
            <h2>HUBUNGI KAMI</h2><br>
            <ul>
                <li class='bx bx-map'> Cikunir, Tasikmalaya, Jawa Barat</li><br>
                <li class='bx bx-phone-call'> 08945618162</li><br>
                <li class='bx bx-envelope'> notaris@gmail.com</li>
            </ul>
        </div>
        <div class="footer tengah">
            <ul>
                <li>Kontak</li>
                <li>Kontak</li>
                <li>Kontak</li>
                <li>Kontak</li>
            </ul>
        </div>
        <div class="footer kanan">
            <ul>
                <li>Sosmed</li>
                <li>Sosmed</li>
                <li>Sosmed</li>
            </ul>
        </div>
    </div>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
        });
    </script>
    <script src="js/script.js"></script>
</body>

</html>
