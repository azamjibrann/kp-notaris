<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Layanan;
use App\Models\Photo;
use App\Models\PemesananLayanan;

class UserDashboardController extends Controller
{
    public function index()
    {
        // ambil semua layanan & foto uploadan admin
        $layanans = Layanan::all();
        $photos   = Photo::all();

        // ambil semua pesanan (jika ingin hanya pesanan user tertentu, tambahkan filter where)
        $orders   = Order::with(['layanan', 'user'])
                        ->where('user_id', auth()->id()) // hanya pesanan user login
                        ->latest()
                        ->get();

        return view('dashboard_user', compact('layanans', 'photos', 'orders'));
    }

    public function pesanan()
    {
        // ambil pesanan user yang sedang login
        $pesanan = PemesananLayanan::with(['user', 'layanan'])
                    ->where('user_id', auth()->id())
                    ->latest()
                    ->get();

        return view('dashboard_user', compact('pesanan'));
    }
}
