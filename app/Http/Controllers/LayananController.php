<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Layanan;
use App\Models\Photo;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::latest()->get();
        $photos   = Photo::latest()->get(); // tambahkan ini
        $orders   = Order::with(['layanan', 'user'])->latest()->get();
        $layananCount  = Layanan::count();
        $orderCount    = Order::count();
        $layananPopuler = Order::selectRaw('layanan_id, COUNT(*) as total')
                        ->groupBy('layanan_id')
                        ->orderByDesc('total')
                        ->with('layanan')
                        ->first();
        return view('dashboard_admin', compact('layanans', 'photos', 'orders', 'layananCount', 'orderCount', 'layananPopuler'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Layanan::create($request->all());

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
        ]);

        $layanan = Layanan::findOrFail($id);
        $layanan->update([
            'nama_layanan' => $request->nama_layanan,
            'deskripsi'    => $request->deskripsi,
        ]);

        return redirect()->back()->with('success', 'Layanan berhasil diperbarui.');
    }

}
