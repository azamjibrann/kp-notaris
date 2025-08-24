<?php

namespace App\Http\Controllers;
use App\Models\Photo;  // Sesuaikan dengan nama model dan namespace

use App\Models\Order;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // User melihat daftar layanan
    public function layananUser()
    {
        $layanans = Layanan::all();
        return view('user.layanan', compact('layanans'));
    }

    // User pesan layanan (form pesan)
    public function pesan($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('user.pesan', compact('layanan'));
    }

    // Simpan pesanan baru
    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'tanggal'    => 'required|date',
            'alamat'     => 'required|string',
            'keterangan' => 'nullable|string',
        ]);
            // dd(Auth::id());
            // dd($request->all());

        Order::create([
            'user_id'    => Auth::id(),
            'layanan_id' => $request->layanan_id,
            'tanggal'    => $request->tanggal,
            'alamat'     => $request->alamat,
            'keterangan' => $request->keterangan,
            'status'     => 'pending',
            ]);

        return redirect()->route('user.pesanan')
                        ->with('success', 'Pesanan berhasil dibuat!');
    }

    // User melihat daftar pesanannya sendiri
    public function pesananUser()
    {
        $orders = Order::with(['layanan', 'user'])
                ->where('user_id', Auth::id())
                ->latest()
                ->get();

    $layanans = Layanan::all();

    $photos = Photo::all(); // Ganti Photo dengan model galeri yang sesuai

    return view('dashboard_user', compact('layanans', 'orders', 'photos'));

    }

    // Admin melihat semua pesanan
    public function adminIndex()
    {
        $orders = Order::with(['layanan', 'user'])
                        ->latest()
                        ->get();

        return view('admin.pesanan', compact('orders'));
    }
}
