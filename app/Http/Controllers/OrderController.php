<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Order;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


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
            'telpon'     => 'required|string',
        ]);

        Order::create([
            'user_id'    => Auth::id(),
            'layanan_id' => $request->layanan_id,
            'tanggal'    => $request->tanggal,
            'alamat'     => $request->alamat,
            'keterangan' => $request->keterangan,
            'telpon'     => $request->telpon,
        ]);

        return redirect()->route('user.pesanan')
                         ->with('success', 'Pesanan berhasil dibuat!');
    }

    // User melihat daftar pesanannya sendiri
    public function pesananUser(Request $request)
    {
        $orders = Order::with('layanan')
            ->where('user_id', Auth::id())
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->whereHas('layanan', function ($q) use ($request) {
                    $q->where('nama_layanan', 'like', '%' . $request->search . '%');
                });
            })
            ->latest()
            ->get();

        $layanans = Layanan::all();
        $photos   = Photo::all();

        return view('dashboard_user', compact('layanans', 'orders', 'photos'));
    }

    // Admin melihat semua pesanan
   // Admin melihat semua pesanan
public function adminIndex(Request $request)
{
    $orders = Order::with(['layanan', 'user'])
        ->when($request->filled('search'), function ($query) use ($request) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('username', 'like', "%{$search}%");
            });
        })
        ->when($request->filled('layanan_id'), function ($query) use ($request) {
            $query->where('layanan_id', $request->layanan_id);
        })
        ->latest()
        ->get();

    $layanans = Layanan::latest()->get();
    $photos   = Photo::latest()->get();
        dd($request->search);

    return view('dashboard_admin', compact('orders', 'layanans', 'photos'));
}


public function exportPdf()
{
    $orders = Order::with(['layanan', 'user'])->get();

    $pdf = Pdf::loadView('orders_pdf', compact('orders'))
              ->setPaper('a4', 'portrait');

    return $pdf->download('data-orders.pdf');
}


}
