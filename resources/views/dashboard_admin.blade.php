<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])

</head>
<style>
    .content-section {
        display: none;
        /* semua konten disembunyikan */
    }

    .content-section.active {
        display: block;
        /* hanya yang active yang muncul */
    }
</style>
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

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
                                <p class="text-xl font-bold text-gray-900">{{ $layananCount }}</p>
                            </div>
                        </div>
                    </div>


                    <!-- Card 2 - Formulir -->
                    <div class="card p-4">
                        <div class="flex items-center space-x-3">
                            <div class="user-icon w-12 h-12">
                                <i class='bx bx-notepad text-lg'></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-gray-800">Formu Konsul</h3>
                                <p class="text-xl font-bold text-gray-900">{{ $orderCount }}</p>
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
                                <p class="text-xl font-bold text-gray-900">
                                    @if($layananPopuler)
                                        {{ $layananPopuler->layanan->nama_layanan }} ({{ $layananPopuler->total }})
                                    @else
                                        Belum ada pesanan
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kelola Layanan Notaris -->
                <div class="container flex w-full justify-between mt-5 gap-8">
                    <div class="container flex w-full mt-5 gap-8">
                        <div class="flex flex-col grow p-3 shadow-xl rounded-md card">
                            <h2 class="text-xl font-bold">Daftar Layanan Notaris</h2>

                            <table class="table-auto border border-blue-400 border-collapse my-2 ">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="border border-blue-400 px-4 py-2">Nama Layanan</th>
                                        <th class="border border-blue-400 px-4 py-2">Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($layanans as $layanan)
                                        <tr>
                                            <td class="border border-blue-400 px-4 py-2">
                                                {{ $layanan->nama_layanan }}
                                            </td>
                                            <td class="border border-blue-400 px-4 py-2">
                                                {{ $layanan->deskripsi }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="border border-blue-400 px-4 py-2 text-center text-gray-500">
                                                Belum ada layanan tersedia
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
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
                                @foreach($orders as $item)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->user->username }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->telpon }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->alamat }}</td>
                                    </tr>
                                @endforeach
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
                    <button onclick="openModal()" class="bg-blue-500 h-9 rounded-md w-48 text-white">+ Tambahkan
                        Layanan</button>
                </div>

                <!-- {{-- LIST LAYANAN --}}
                @foreach ($layanans as $layanan)
                <div class="bg-white shadow rounded p-4 mb-4">
                    <h2 class="text-lg font-semibold">{{ $layanan->nama_layanan }}</h2>
                    <p class="text-gray-600">{{ $layanan->deskripsi }}</p>
                    <form action="{{ route('layanan.destroy', $layanan->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                            Hapus
                        </button>
                    </form>
                </div>
                @endforeach -->


                <table class="w-full border border-gray-300 mt-7">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border px-4 py-2">Nama Layanan</th>
                            <th class="border px-4 py-2">Deskripsi</th>
                            <th class="border px-4 py-2">Dokumen</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($layanans as $layanan)
<tr>
    <td class="border px-4 py-2">{{ $layanan->nama_layanan }}</td>
    <td class="border px-4 py-2">{{ $layanan->deskripsi }}</td>
    <td class="border px-4 py-2">
        @if ($layanan->dokumen)
                        <a href="{{ asset('storage/' . $layanan->dokumen) }}"
                           target="_blank"
                           class="text-blue-600 underline">
                            Persyaratan dokumen
                        </a>
                    @else
                        <span class="text-gray-500">Tidak ada</span>
                    @endif
    </td>
    <td class="border px-4 py-2">
        <div x-data="{ open: false }">

            <!-- Tombol Edit + Hapus sejajar -->
            <div class="flex items-center justify-center gap-3">
                <!-- Tombol Edit -->
                <button @click="open = !open"
                        class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-500">
                    Edit
                </button>

                <!-- Tombol Hapus -->
                <form action="{{ route('layanan.destroy', $layanan->id) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                        Hapus
                    </button>
                </form>
            </div>

            <!-- Form Edit (hidden, tampil di bawah tombol) -->
            <div x-show="open" class="mt-3 bg-gray-100 p-4 rounded shadow">
                <form action="{{ route('layanan.update', $layanan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-2">
                        <label class="block text-gray-700">Nama Layanan</label>
                        <input type="text" name="nama_layanan"
                               value="{{ old('nama_layanan', $layanan->nama_layanan) }}"
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-2">
                        <label class="block text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" rows="2"
                                  class="w-full border rounded px-3 py-2">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
                    </div>

                    <div class="mb-2">
            <label class="block text-gray-700">Upload Dokumen</label>
            <input type="file" name="dokumen"
                   class="w-full border rounded px-3 py-2"
                   accept=".pdf,.doc,.docx,.jpg,.png">
            @if ($layanan->dokumen)
                <p class="text-sm mt-1">
                    Dokumen saat ini:
                    <a href="{{ asset('storage/' . $layanan->dokumen) }}" target="_blank" class="text-blue-600 underline">
                        Lihat Dokumen
                    </a>
                </p>
            @endif
        </div>

                    <button type="submit"
                            class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                        Simpan
                    </button>
                </form>
            </div>

        </div>
    </td>
</tr>
@endforeach



                    </tbody>
                </table>





                {{-- MODAL FORM TAMBAH LAYANAN --}}
                <div id="formModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
                    <div class="bg-white shadow-md rounded p-6 w-full max-w-lg relative">
                        <!-- Tombol close -->
                        <button onclick="closeModal()"
                            class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-xl">&times;</button>

                        <h1 class="text-2xl font-bold mb-6 text-center">Tambah Layanan</h1>
                        <form action="{{ route('layanan.store') }}" method="POST"  enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            <div>
                                <label for="nama_layanan" class="block font-medium mb-1">Nama Layanan</label>
                                <input type="text" id="nama_layanan" name="nama_layanan"
                                    class="w-full border rounded p-2 focus:outline-none focus:ring focus:border-blue-400"
                                    placeholder="Masukkan nama layanan" required>
                            </div>
                            <div>
                                <label for="deskripsi" class="block font-medium mb-1">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" rows="4"
                                    class="w-full border rounded p-2 focus:outline-none focus:ring focus:border-blue-400"
                                    placeholder="Masukkan deskripsi layanan"></textarea>
                            </div>

                            <div>
                                <label for="dokumen" class="block font-medium mb-1">Upload Dokumen</label>
                                <input type="file" id="dokumen" name="dokumen"
                                    class="w-full border rounded p-2 focus:outline-none focus:ring focus:border-blue-400"
                                    accept=".pdf,.doc,.docx,.jpg,.png">
                                <p class="text-xs text-gray-500 mt-1">Format: PDF, DOC, DOCX, JPG, PNG (maks 2MB)</p>

                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- SCRIPT DI DALAM DIV --}}
                <script>
                    function openModal() {
                        document.getElementById("formModal").classList.remove("hidden");
                        document.getElementById("formModal").classList.add("flex");
                    }

                    function closeModal() {
                        document.getElementById("formModal").classList.remove("flex");
                        document.getElementById("formModal").classList.add("hidden");
                    }
                </script>
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
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Daftar Pesanan</h1>

    <div class="flex justify-between items-center">
        {{-- Sortir (belum ada logika di backend) --}}
        {{-- <input type="text" placeholder="Sortir" class="border-2 h-10 p-3 rounded-md"> --}}

        {{-- Cari Pesanan --}}
        <form action="{{ route('admin.dashboard') }}#konsul" method="GET" class="flex w-1/2 ml-24">
            <input type="text" name="search" placeholder="Cari pesanan..."
                value="{{ request('search') }}"
                class="border-2 h-10 p-3 rounded-md w-full">
            <button type="submit" class="ml-2 bg-blue-600 text-white px-4 rounded">Cari</button>
        </form>

        {{-- Export (nanti bisa diarahkan ke route export excel/pdf) --}}
        <a href="{{ route('admin.orders.export.pdf') }}"
   class="text-white font-bold bg-blue-950 h-10 rounded-md w-40 flex items-center justify-center">
   Export
</a>

    </div>

    <div class="tabel">
        <table class="w-full border border-gray-300 mt-7">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Layanan</th>
                    <th class="border px-4 py-2">User</th>
                    <th class="border px-4 py-2">Tanggal</th>
                    <th class="border px-4 py-2">Alamat</th>
                    <th class="border px-4 py-2">Telpon</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $i => $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $i+1 }}</td>
                        <td class="border px-4 py-2">{{ $item->layanan->nama_layanan ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $item->user->username ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $item->tanggal }}</td>
                        <td class="border px-4 py-2">{{ $item->alamat }}</td>
                        <td class="border px-4 py-2">{{ $item->telpon }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Belum ada pesanan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>



            {{-- galeri --}}
            <div id="galeri" class="content-section">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold text-gray-800">Galeri</h1>
                    <button onclick="toggleForm()"
                        class="bg-blue-500 h-9 rounded-md w-48 text-white flex items-center justify-center">
                        <i class='bx bx-edit text-sm mr-2'></i>
                        <span class="text-sm">+ Tambah galeri</span>
                    </button>
                </div>

                {{-- Form Tambah Galeri (hidden default) --}}
                <form id="formGaleri" action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data"
                    class="hidden bg-white shadow-md rounded-lg p-4 mb-6">
                    @csrf
                    <div class="mb-3">
                        <input type="file" name="photo" class="border p-2 w-full rounded" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="judul" class="border p-2 w-full rounded" placeholder="Judul">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="description" class="border p-2 w-full rounded"
                            placeholder="Deskripsi foto">
                    </div>
                    <button type="submit" class="bg-green-500 px-4 py-2 text-white rounded">Simpan</button>
                </form>
                {{-- List Galeri --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach ($photos as $photo)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $photo->image) }}" class="w-full h-40 object-cover" />
                        <p class="p-3 text-gray-800 text-sm">{{ $photo->description }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <script>
                function toggleForm() {
                    document.getElementById("formGaleri").classList.toggle("hidden");
                }
            </script>
        </div>

        <!-- galeri -->





        {{-- <div id="tbgaleri" class="content-section">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Tambah galeri</h1>
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
        </div> --}}
    </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
