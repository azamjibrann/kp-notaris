<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])
</head>

<body class="p-0 m-0 box-border overflow-hidden bg-gray-50">
    <div class="grid grid-cols-[280px_1fr] min-h-screen max-w-full overflow-hidden">
        <!-- Sidebar -->
        <div class="sidebar-bg px-4 py-6 flex flex-col min-h-screen">
            <!-- Header -->
            <div class="mb-6">
                <div class="flex items-center mb-6">
                    <div class="w-6 h-6 bg-white rounded mr-2 flex items-center justify-center">
                        <i class='bx bx-file text-blue-600 text-sm'></i>
                    </div>
                    <span class="text-white text-sm font-bold">NOTARIS/PPAT</span>
                </div>

                <h2 class="text-white text-xl font-bold mb-4">Dashboard</h2>
            </div>

            <!-- Menu Items -->
            <div class="space-y-2 flex-1">
                <div class="menu-item active rounded-full border-2 border-white">
                    <a href="#" onclick="showContent('menu-konten', event)"
                        class="flex items-center text-white no-underline px-4 py-2 rounded-full">
                        <i class='bx bxs-dashboard text-sm mr-2'></i>
                        <span class="text-sm">Menu</span>
                    </a>
                </div>

                <div class="menu-item rounded-full border-2 border-white">
                    <a href="#" onclick="showContent('layanan', event)"
                        class="flex items-center text-white no-underline px-4 py-2 rounded-full">
                        <i class='bx bx-notepad text-sm mr-2'></i>
                        <span class="text-sm">Layanan</span>
                    </a>
                </div>

                <div class="menu-item rounded-full border-2 border-white">
                    <a href="#" onclick="showContent('profil', event)"
                        class="flex items-center text-white no-underline px-4 py-2 rounded-full">
                        <i class='bx bxs-user-badge text-sm mr-2'></i>
                        <span class="text-sm">Profil Notaris</span>
                    </a>
                </div>

                <div class="menu-item rounded-full border-2 border-white">
                    <a href="#" onclick="showContent('konsul', event)"
                        class="flex items-center text-white no-underline px-4 py-2 rounded-full">
                        <i class='bx bx-edit text-sm mr-2'></i>
                        <span class="text-sm">Form Konsul</span>
                    </a>
                </div>

                <div class="menu-item rounded-full border-2 border-white">
                    <a href="#" onclick="showContent('galeri', event)"
                        class="flex items-center text-white no-underline px-4 py-2 rounded-full">
                        <i class='bx bxs-image text-sm mr-2'></i>
                        <span class="text-sm">Galeri</span>
                    </a>
                </div>

                <div class="menu-item rounded-full border-2 border-white">
                    <a href="#" class="flex items-center text-white no-underline px-4 py-2 rounded-full">
                        <i class='bx bx-calendar text-sm mr-2'></i>
                        <span class="text-sm">Tambah galeri</span>
                    </a>
                </div>
            </div>

            <!-- Logout Button -->
            <div class="mt-4">
                <button class="logout-btn-custom text-white px-4 py-2 rounded-lg font-medium w-full text-sm">
                    Logout
                </button>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="bg-gray-50 p-4 overflow-auto max-h-screen">
            <!-- Menu Content -->
            <div id="menu-konten" class="content-section">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Notaris & PPAT</h1>

                <div class="grid grid-cols-3 gap-4 max-w-5xl">
                    <!-- Card 1 - Layanan Notaris -->
                    <div class="card p-4">
                        <div class="flex items-center space-x-3">
                            <div class="user-icon w-12 h-12">
                                <i class='bx bx-user text-lg'></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-gray-800">Layanan Notaris</h3>
                                <p class="text-xl font-bold text-gray-900">156</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 - Formulir -->
                    <div class="card p-4">
                        <div class="flex items-center space-x-3">
                            <div class="user-iconl w-12 h-12">
                                <i class='bx bx-notepad text-lg'></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-gray-800">Formulir Masuk</h3>
                                <p class="text-xl font-bold text-gray-900">35</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 - Layanan Populer -->
                    <div class="card p-4">
                        <div class="flex items-center space-x-3">
                            <div class="user-iconl w-12 h-12">
                                <i class='bx bx-user text-lg'></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-gray-800">Layanan Populer</h3>
                                <p class="text-xl font-bold text-gray-900">35</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kelola Layanan Notaris -->
                <div class="container flex w-full justify-between mt-5 gap-8">
                    <div class="flex flex-col grow p-3 shadow-xl rounded-md card">
                        <h2 class="text-xl font-bold ">Kelola Layanan Notaris</h2>
                        <button class="bg-blue-500 rounded-md p-1 w-2/4 text-white my-3">+ Tambah Layanan</button>
                        <table class="table-auto border border-blue-400 border-collapse my-2">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="border border-blue-400 px-4 py-2">Layanan apa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border border-blue-400 px-4 py-2">Info Layanan</td>
                                </tr>
                                <tr>
                                    <td class="border border-blue-400 px-4 py-2">Apa si</td>
                                </tr>
                                <tr>
                                    <td class="border border-blue-400 px-4 py-2">Yagataw</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="flex justify-between">
                            <button class="bg-green-500 rounded-md p-1 w-28 text-white my-3">Edit</button>
                            <button class="bg-gray-500 rounded-md p-1 w-28 text-white my-3">Hapus</button>
                        </div>
                    </div>
                    <!--  -->

                    <!-- Item Formulir Konsul -->
                    <div class="flex grow flex-col card p-3">
                        <h2 class="text-xl font-bold ">Formulir Konsultasi</h2>
                        <input type="text" id="searchInput" placeholder="Cari..."
                            class="border p-2 mb-3 rounded-lg my-2">
                        <table class="table-auto border-collapse border border-gray-300 w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2">Nama</th>
                                    <th class="border border-gray-300 px-4 py-2">Kontak</th>
                                    <th class="border border-gray-300 px-4 py-2">Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">Azam</td>
                                    <td class="border border-gray-300 px-4 py-2">0896167832</td>
                                    <td class="border border-gray-300 px-4 py-2">Bandung</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">Jibran</td>
                                    <td class="border border-gray-300 px-4 py-2">082374324</td>
                                    <td class="border border-gray-300 px-4 py-2">Jakarta</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">Jibran</td>
                                    <td class="border border-gray-300 px-4 py-2">082374324</td>
                                    <td class="border border-gray-300 px-4 py-2">Jakarta</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">Jibran</td>
                                    <td class="border border-gray-300 px-4 py-2">082374324</td>
                                    <td class="border border-gray-300 px-4 py-2">Jakarta</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">Jibran</td>
                                    <td class="border border-gray-300 px-4 py-2">082374324</td>
                                    <td class="border border-gray-300 px-4 py-2">Jakarta</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">Jibran</td>
                                    <td class="border border-gray-300 px-4 py-2">082374324</td>
                                    <td class="border border-gray-300 px-4 py-2">Jakarta</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--  -->

            <!-- Other Content Sections -->
            <div id="layanan" class="content-section mt-4">
                <div class="flex justify-between">
                    <h1 class="text-3xl font-bold text-gray-800 mb-8">Layanan</h1>
                    <button class="bg-blue-500 h-9 rounded-md w-48 text-white"> + Tambahkan Layanan</button>
                </div>
                <div class="layanan p-8">
                    <p class="text-gray-600">Ini Adalah LAYANAN</p>
                </div>
                <div class="layanan p-8">
                    <p class="text-gray-600">Ini Adalah LAYANAN</p>
                </div>
                <div class="layanan p-8">
                    <p class="text-gray-600">Ini Adalah LAYANAN</p>
                </div>
                <div class="layanan p-8">
                    <p class="text-gray-600">Ini Adalah LAYANAN</p>
                </div>
                <div class="layanan p-8">
                    <p class="text-gray-600">Ini Adalah LAYANAN</p>
                </div>

            </div>

            <div id="profil" class="content-section">
                <h1 class="text-3xl font-bold text-gray-800 mb-8">Profil Notaris</h1>
                <div class="card p-8">
                    <h2 class="text-xl font-semibold mb-4">Ini adalah PROFILE</h2>
                    <p class="text-gray-600">Ini Adalah PROFILE</p>
                </div>
            </div>


            <!-- Formulir Konsul -->
            <div id="konsul" class="content-section m-4">
                <h1 class="text-3xl font-bold text-gray-800 mb-8">Form Konsul</h1>
                <div class="flex justify-between">
                    <input type="text" value="Sortir" class="border-2 h-10 p-3 rounded-md">
                    <input type="text" class="border-2 h-10 p-3 rounded-md w-1/2 ml-24">
                    <button class="text-white font-bold bg-blue-950 h-10 rounded-md w-40">Export</button>
                </div>
                <div class="tabel">
                     <table class="table-auto border-collapse border border-gray-300 w-full mt-7">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2">Nama</th>
                                    <th class="border border-gray-300 px-4 py-2">Kontak</th>
                                    <th class="border border-gray-300 px-4 py-2">Tujuan Konsul</th>
                                    <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">Azam</td>
                                    <td class="border border-gray-300 px-4 py-2">0896167832</td>
                                    <td class="border border-gray-300 px-4 py-2">Bandung</td>
                                    <td class="border border-gray-300 px-4 py-2">20/08/2025</td>                                    
                                </tr>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">Jibran</td>
                                    <td class="border border-gray-300 px-4 py-2">082374324</td>
                                    <td class="border border-gray-300 px-4 py-2">Jakarta</td>
                                    <td class="border border-gray-300 px-4 py-2">20/08/2025</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">Jibran</td>
                                    <td class="border border-gray-300 px-4 py-2">082374324</td>
                                    <td class="border border-gray-300 px-4 py-2">Jakarta</td>
                                    <td class="border border-gray-300 px-4 py-2">20/08/2025</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">Jibran</td>
                                    <td class="border border-gray-300 px-4 py-2">082374324</td>
                                    <td class="border border-gray-300 px-4 py-2">Jakarta</td>
                                    <td class="border border-gray-300 px-4 py-2">20/08/2025</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">Jibran</td>
                                    <td class="border border-gray-300 px-4 py-2">082374324</td>
                                    <td class="border border-gray-300 px-4 py-2">Jakarta</td>
                                    <td class="border border-gray-300 px-4 py-2">20/08/2025</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">Jibran</td>
                                    <td class="border border-gray-300 px-4 py-2">082374324</td>
                                    <td class="border border-gray-300 px-4 py-2">Jakarta</td>
                                    <td class="border border-gray-300 px-4 py-2">20/08/2025</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <!--  -->


        <div id="galeri" class="content-section">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Galeri</h1>
            <div class="card p-8">
                <div class="space-y-6">
                    <!-- Photo Upload Form -->
                    <form method="POST" action="{{ route('photos.store') }}" enctype="multipart/form-data"
                        class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">+ PHOTO</label>
                            <input type="file" name="photo" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul
                                Foto</label>
                            <input type="text" name="judul" id="judul" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Teks :</label>
                            <textarea name="description" rows="5"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                        </div>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200">UPLOAD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>