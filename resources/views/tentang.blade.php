<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang</title>
    <link rel="stylesheet" href="css/tentang.css">
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

    <div class="container-tentang">
        <div class="main-tentang">
            <div class="gambar" data-aos="fade-right" data-aos-delay="100" data-aos-duration="750">
                <img src="img/manusia.png" alt="">
            </div>
            <div class="desc-tentang">
                <h3 data-aos="fade-left" data-aos-delay="100" data-aos-duration="750">Tentang Kami</h3>
                <p data-aos="fade-left" data-aos-delay="100" data-aos-duration="750">Kantor Notaris & PPAT Yanti
                    Haryanti,
                    S.H., M.Kn. merupakan lembaga jasa hukum yang berlokasi di
                    Kabupaten
                    Tasikmalaya. Berdiri sebagai Pejabat Pembuat Akta Tanah (PPAT) sejak tahun 2019 dan resmi menjabat
                    sebagai
                    Notaris pada tahun 2023, kantor ini hadir untuk memberikan layanan hukum yang profesional, amanah,
                    dan
                    terpercaya.</p><br>
                <p data-aos="fade-left" data-aos-delay="100" data-aos-duration="750">Dengan pengalaman menangani
                    berbagai
                    kebutuhan klien, mulai dari individu, instansi pemerintahan, hingga
                    perusahaan swasta, kami senantiasa menjunjung tinggi prinsip integritas, ketelitian, dan pelayanan
                    yang
                    humanis. Selain menjalankan profesi sebagai Notaris & PPAT, Ibu Yanti Haryanti, S.H., M.Kn. juga
                    merupakan
                    seorang akademisi aktif yang mengajar di Institut Nahdlatul Ulama Tasikmalaya, memperkuat kompetensi
                    ilmiah
                    dan profesionalitas dalam setiap layanan yang diberikan.</p>
            </div>
        </div>
    </div>
    <!-- Profil Ketua -->
    <div class="container-profil">
        <div class="judul-ketua">
            <h2 data-aos="zoom-in" data-aos-delay="60" data-aos-duration="600">Profil Notaris PPAT</h2>
        </div>
        <div class="profil-ketua">
            <div class="profil-teks">
                <p data-aos="zoom-in" data-aos-delay="60" data-aos-duration="600"><strong>Nama</strong> : Yanti
                    Haryanti, S.H., M.Kn</p>
                <p data-aos="zoom-in" data-aos-delay="60" data-aos-duration="600"><strong>Alamat</strong> : Kp.
                    Puncaksari, RT 005 , RW 002, Kelurahan Mangkubakti, Kecamatan
                    Cibeureum, Kota Tasikmalaya.</p>
                <p data-aos="zoom-in" data-aos-delay="60" data-aos-duration="600"><strong>Jabatan</strong> : Notaris &
                    PPAT Kab. Tasikmalaya</p>
                <p data-aos="zoom-in" data-aos-delay="60" data-aos-duration="600"><strong>Riwayat pendidikan</strong> :
                    STHG Kota Tasikmalaya (S1) - Universitas Jayabaya Jakarta (S2)
                </p>
                <br>
                <p data-aos="zoom-in" data-aos-delay="100" data-aos-duration="750">Yanti Haryanti, S.H., M.Kn. adalah
                    Notaris dan PPAT yang memiliki legalitas resmi dari Kementerian
                    Hukum dan HAM Republik Indonesia serta Kementerian Agraria dan Tata Ruang/Badan Pertanahan Nasional.
                    Dengan latar belakang pendidikan Magister Kenotariatan dan pengalaman akademis sebagai dosen, beliau
                    memadukan wawasan teoritis dan praktik hukum secara komprehensif dalam menangani setiap urusan
                    klien.</p>
            </div>
            <div class="gambar-ketua">
                <img src="img/buyanti.png" alt="" data-aos="zoom-in" data-aos-delay="60" data-aos-duration="600">
            </div>
        </div>
    </div>
    <!-- Akhiran Profil Ketua -->


    <!-- Kenapa Memilih Kami -->
    <div class="container-kenapa">
        <div class="gambar-kenapa">
            <img src="" alt="" data-aos="zoom-out" data-aos-delay="300" data-aos-duration="750">
        </div>
        <div class="judul-kenapa">
            <h3 data-aos="fade-left" data-aos-delay="100" data-aos-duration="750">Kenapa Memilih Kami ? </h3>
            <p data-aos="fade-left" data-aos-delay="100" data-aos-duration="750">Berpengalaman sebagai PPAT sejak 2019
                dan Notaris resmi sejak 2023, kami siap melayani kebutuhan hukum
                Anda, baik untuk urusan perorangan, perusahaan, maupun instansi.</p>
            <div class="list-check" data-aos="fade-left" data-aos-delay="100" data-aos-duration="750">
                <p><i class='bx bxs-check-circle'></i> Pengetahuan tinggi di bidang Notaris dan PPAT</p>
                <p><i class='bx bxs-check-circle'></i> Kerja sama yang solid dengan mitra dan klien</p>
                <p><i class='bx bxs-check-circle'></i> Kualitas layanan yang ramah dan responsif</p>
                <p><i class='bx bxs-check-circle'></i> Komitmen untuk terus berkembang bersama tim dan teknologi</p>
            </div>
        </div>
    </div>
    <!-- Akhiran Kenapa Memilih Kami -->


    <!-- Tim -->
    <div class="container-tim">
        <div class="text">
            <h3 data-aos="zoom-in" data-aos-delay="20" data-aos-duration="600">Tim Propesional Kami</h3>
            <p data-aos="zoom-in" data-aos-delay="20" data-aos-duration="600">Kantor ini juga didukung oleh tim yang
                solid dan kompeten</p>
        </div>
        <div class="konten-tim">
            <div class="tim satu">
                <img src="img/bapa.png" alt="" class="gambar-tima" data-aos="zoom-out" data-aos-delay="100"
                    data-aos-duration="750">
            </div>
            <div class="tim dua">
                <img src="img/ibu.png" alt="" class="gambar-timb" data-aos="zoom-out" data-aos-delay="100"
                    data-aos-duration="750">
            </div>
        </div>
    </div>
    <!-- Akhir Tim -->

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
        });
    </script>
    <script src="js/script.js"></script>
</body>

</html>
