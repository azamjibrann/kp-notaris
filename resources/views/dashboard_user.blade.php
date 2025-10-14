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

    /* Sidebar background */
    .sidebar-bg {
        background: linear-gradient(180deg, #1e40af, #2563eb);
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
            overflow-y: auto;
            background: linear-gradient(180deg, #1e40af, #2563eb);
            padding-bottom: 6rem; /* beri ruang ekstra agar tombol logout terlihat */
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

    /* Tombol logout fix agar selalu di bawah di HP */
    .logout-container {
        position: sticky;
        bottom: 0;
        background: rgba(0, 0, 0, 0.1);
        padding-top: 1rem;
        padding-bottom: 1rem;
    }
</style>

<body class="p-0 m-0 box-border bg-gray-50">
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
        <div id="sidebar"
            class="sidebar-bg px-4 py-6 flex flex-col justify-between h-screen md:relative sidebar-mobile">

            <!-- Close button for mobile -->
            <div class="md:hidden flex justify-end mb-4">
                <button onclick="closeMobileMenu()" class="text-white text-2xl">
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
            <div class="space-y-2 flex-1 overflow-y-auto">
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
            <div class="logout-container mt-4">
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit"
                        class="logout-btn-custom bg-red-600 text-white px-4 py-2 rounded-lg font-medium w-full text-sm hover:bg-red-700">
                        <i class='bx bx-log-out-circle mr-1'></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="bg-gray-50 p-2 md:p-4 overflow-auto max-h-screen pt-16 md:pt-4">
            {{-- Konten kamu di sini tetap sama --}}
        </div>
    </div>

    {{-- SCRIPT --}}
    <script>
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

        window.addEventListener('resize', function () {
            if (window.innerWidth >= 768) {
                closeMobileMenu();
            }
        });
    </script>

    <script src="{{ asset('js/user.js') }}"></script>
</body>
</html>
