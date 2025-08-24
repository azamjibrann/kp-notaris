<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\Photo;
use App\Models\PemesananLayanan;

class UserDashboardController extends Controller
{
    public function index()
    {
        // ambil semua layanan & foto uploadan admin
        $layanans = Layanan::all();
        $photos = Photo::all();

        $orders   = Order::with(['layanan', 'user'])->latest()->get();
        return view('dashboard_user', compact('layanans', 'photos', 'orders'));
    }

    public function pesanan()
    {
        // relasi: user & layanan harus sudah didefinisikan di Model PemesananLayanan
        $pesanan = PemesananLayanan::with(['user', 'layanan'])
                    ->latest()
                    ->get();

        return view('dashboard_admin', compact('pesanan'));
    }
}
