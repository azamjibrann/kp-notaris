<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<style>
    .content-section {
        display: none;
    }

    .content-section.active {
        display: block;
    }

    .menu-item.active {
        background-color: rgba(255, 255, 255, 0.2);
    }

    [x-cloak] {
        display: none !important;
    }

    /* Mobile menu toggle */
    @media (max-width: 768px) {
        .sidebar-mobile {
            position: fixed;
            top: 0;
            left: -280px;
            width: 280px;
            height: 100vh;
            z-index: 50;
            transition: left 0.3s ease;
        }

        .sidebar-mobile.active {
            left: 0;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 40;
            display: none;
        }

        .overlay.active {
            display: block;
        }
    }
</style>

<body class="p-0 m-0 box-border overflow-hidden bg-gray-50">
    <!-- Mobile Menu Button -->
    <div class="md:hidden fixed top-4 left-4 z-50">
        <button onclick="toggleMobileMenu()" class="bg-blue-600 text-white p-2 rounded-md shadow-lg">
            <i class='bx bx-menu text-xl'></i>
        </button>
    </div>

    <!-- Mobile Overlay -->
    <div id="mobileOverlay" class="overlay" onclick="closeMobileMenu()"></div>

    <div class="grid md:grid-cols-[280px_1fr] grid-cols-1 min-h-screen max-w-full overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar-bg px-4 py-6 flex flex-col min-h-screen md:relative sidebar-mobile">
            <!-- Close button for mobile -->
            <div class="md:hidden flex justify-end mb-4">
                <button onclick="closeMobileMenu()" class="text-white text-xl">
                    <i class='bx bx-x'></i>
                </button>
            </div>

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
                <div class="menu-item rounded-full border-2 border-white">
                    <a href="#" onclick="showContent('menu-konten', event); closeMobileMenu();"
                        class="flex items-center text-white no-underline px-4 py-2 rounded-full">
                        <i class='bx bxs-user-badge text-sm mr-2'></i>
                        <span class="text-sm">Profil Notaris</span>
                    </a>
                </div>

                <div class="menu-item rounded-full border-2 border-white">
                    <a href="#" onclick="showContent('layanan', event); closeMobileMenu();"
                        class="flex items-center text-white no-underline px-4 py-2 rounded-full">
                        <i class='bx bx-notepad text-sm mr-2'></i>
                        <span class="text-sm">Layanan</span>
                    </a>
                </div>

                <div class="menu-item rounded-full border-2 border-white">
                    <a href="#" onclick="showContent('galeria', event); closeMobileMenu();"
                        class="flex items-center text-white no-underline px-4 py-2 rounded-full">
                        <i class='bx bxs-image text-sm mr-2'></i>
                        <span class="text-sm">Galeri</span>
                    </a>
                </div>

                <div class="menu-item rounded-full border-2 border-white">
                    <a href="#" onclick="showContent('konsul', event); closeMobileMenu();"
                        class="flex items-center text-white no-underline px-4 py-2 rounded-full">
                        <i class='bx bx-edit text-sm mr-2'></i>
                        <span class="text-sm">Form Konsul</span>
                    </a>
                </div>
            </div>

            <!-- Logout Button -->
            <div class="mt-4">
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit"
                        class="logout-btn-custom text-white px-4 py-2 rounded-lg font-medium w-full text-sm">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="bg-gray-50 p-2 md:p-4 overflow-auto max-h-screen pt-16 md:pt-4">
            <!-- Menu Content -->
            <!-- Konten utama untuk menu-konten -->
            <div id="menu-konten" class="content-section">
                <h1 class="text-xl md:text-2xl font-bold text-gray-800 mb-4 md:mb-6">Notaris & PPAT</h1>

                <div class="card p-4 md:p-8 bg-white rounded shadow">
                    <h2 class="text-lg md:text-xl font-semibold mb-4">Profil Saya</h2>

                    {{-- Username --}}
                    <p class="text-gray-600 text-sm md:text-base">
                        <span class="font-semibold">Username:</span> {{ Auth::user()->username }}
                    </p>

                    {{-- Email (opsional, kalau ada) --}}
                    <p class="text-gray-600 mt-2 text-sm md:text-base">
                        <span class="font-semibold">Email:</span> {{ Auth::user()->email }}
                    </p>
                </div>
                
            </div>

            <!-- Other Content Sections -->
            <div id="layanan" class="content-section mt-4 flex flex-col">
                <div class="flex justify-between mb-4 md:mb-8">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Layanan</h1>
                </div>

                {{-- LIST LAYANAN --}}
                <div class="space-y-4">
                    @foreach($layanans as $layanan)
                    <div class="bg-white shadow rounded p-4 mb-4" x-data="{ open: false }">
                        <h2 class="font-semibold text-base md:text-lg">{{ $layanan->nama_layanan }}</h2>
                        <p class="text-gray-600 mb-3 text-sm md:text-base">{{ $layanan->deskripsi }}</p>
                        <div class="mb-3">
                            <span class="font-semibold text-gray-700 text-sm md:text-base">Dokumen:</span>
                            @if ($layanan->dokumen)
                            <a href="{{ asset('storage/' . $layanan->dokumen) }}" target="_blank"
                                class="text-blue-600 underline text-sm md:text-base">
                                Persyaratan.pdf
                            </a>
                            @else
                            <span class="text-gray-500 text-sm md:text-base">Tidak ada</span>
                            @endif
                        </div>

                        {{-- Tombol Buat Jadwal --}}
                        <button @click="open = !open"
                            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 inline-block text-sm md:text-base w-full md:w-auto">
                            Buat Jadwal
                        </button>

                        {{-- FORM Jadwal (default hidden) --}}
                        <div x-show="open" x-cloak class="mt-4">
                            <form action="{{ route('user.layanan.store') }}" method="POST"
                                class="bg-gray-50 p-4 rounded shadow">
                                @csrf
                                <input type="hidden" name="layanan_id" value="{{ $layanan->id }}">

                                {{-- Nama Layanan (auto isi) --}}
                                <div class="mb-3">
                                    <label
                                        class="block font-semibold text-gray-700 text-sm md:text-base">Layanan</label>
                                    <input type="text" value="{{ $layanan->nama_layanan }}" readonly
                                        class="w-full border rounded p-2 bg-gray-100 text-sm md:text-base">
                                </div>

                                {{-- Nama User (auto isi) --}}
                                <div class="mb-3">
                                    <label
                                        class="block font-semibold text-gray-700 text-sm md:text-base">Pemesan</label>
                                    <input type="text" value="{{ Auth::user()->username }}" readonly
                                        class="w-full border rounded p-2 bg-gray-100 text-sm md:text-base">
                                    <input type="hidden" name="username" value="{{ Auth::user()->username }}">
                                </div>

                                {{-- Tanggal --}}
                                <div class="mb-3">
                                    <label
                                        class="block font-semibold text-gray-700 text-sm md:text-base">Tanggal</label>
                                    <input type="date" name="tanggal" required
                                        class="w-full border rounded p-2 text-sm md:text-base">
                                </div>

                                <div class="mb-3">
                                    <label class="block font-semibold text-gray-700 text-sm md:text-base">Telpon</label>
                                    <input type="text" name="telpon" required
                                        class="w-full border rounded p-2 text-sm md:text-base">
                                </div>

                                {{-- Alamat --}}
                                <div class="mb-3">
                                    <label class="block font-semibold text-gray-700 text-sm md:text-base">Alamat</label>
                                    <textarea name="alamat" rows="3" required
                                        class="w-full border rounded p-2 text-sm md:text-base"></textarea>
                                </div>

                                <div class="flex flex-col md:flex-row justify-end gap-2">
                                    <button type="button" @click="open = false"
                                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-sm md:text-base">
                                        Batal
                                    </button>
                                    <button type="submit"
                                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm md:text-base">
                                        Simpan Jadwal
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- konsul --}}
            <div id="konsul" class="content-section m-2 md:m-4">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4 md:mb-8">Daftar Pesanan</h1>

                <div class="flex flex-col md:flex-row justify-between gap-4 mb-4">
                    <form action="{{ route('user.dashboard') }}#konsul" method="GET" class="flex w-full md:w-1/2">
                        <input type="text" name="search" placeholder="Cari pesanan..." value="{{ request('search') }}"
                            class="border-2 h-10 p-3 rounded-md w-full text-sm">
                        <button type="submit" class="ml-2 bg-blue-600 text-white px-4 rounded text-sm">Cari</button>
                    </form>
                </div>

                <div class="tabel overflow-x-auto">
                    <table class="w-full border border-gray-300 mt-7 min-w-[600px]">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border px-2 md:px-4 py-2 text-sm md:text-base">No</th>
                                <th class="border px-2 md:px-4 py-2 text-sm md:text-base">Layanan</th>
                                <th class="border px-2 md:px-4 py-2 text-sm md:text-base">User</th>
                                <th class="border px-2 md:px-4 py-2 text-sm md:text-base">Tanggal</th>
                                <th class="border px-2 md:px-4 py-2 text-sm md:text-base">Alamat</th>
                                <th class="border px-2 md:px-4 py-2 text-sm md:text-base">Telpon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $i => $item)
                            <tr>
                                <td class="border px-2 md:px-4 py-2 text-sm md:text-base">{{ $i+1 }}</td>
                                <td class="border px-2 md:px-4 py-2 text-sm md:text-base">{{
                                    $item->layanan->nama_layanan }}</td>
                                <td class="border px-2 md:px-4 py-2 text-sm md:text-base">{{ $item->user->username }}
                                </td>
                                <td class="border px-2 md:px-4 py-2 text-sm md:text-base">{{ $item->tanggal }}</td>
                                <td class="border px-2 md:px-4 py-2 text-sm md:text-base">{{ $item->alamat }}</td>
                                <td class="border px-2 md:px-4 py-2 text-sm md:text-base">{{ $item->telpon }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- galeri --}}
            <div id="galeria" class="content-section">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Galeri</h1>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                    @foreach ($photos as $photo)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $photo->image) }}" class="w-full h-40 object-cover" />
                        <p class="p-3 text-gray-800 text-sm">{{ $photo->description }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPT --}}
    <script>
        function openModal() {
            document.getElementById("formModal").classList.remove("hidden");
            document.getElementById("formModal").classList.add("flex");
        }

        function closeModal() {
            document.getElementById("formModal").classList.remove("flex");
            document.getElementById("formModal").classList.add("hidden");
        }

        // Mobile menu functions
        function toggleMobileMenu() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobileOverlay');

            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        function closeMobileMenu() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobileOverlay');

            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        }

        // Close mobile menu when window is resized to desktop size
        window.addEventListener('resize', function () {
            if (window.innerWidth >= 768) {
                closeMobileMenu();
            }
        });
    </script>

    <script src="{{ asset('js/user.js') }}"></script>

</body>

</html>
