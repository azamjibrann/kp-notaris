<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Layanan;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        $layanans = Layanan::latest()->get();
        $photos   = Photo::latest()->get();
       $orders = Order::with(['layanan', 'user'])
        ->when($request->filled('search'), function ($query) use ($request) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('username', 'like', '%' . $request->search . '%');
            });
        })
        ->latest()
        ->get();
        $layananCount  = Layanan::count();
        $orderCount    = Order::count();
        $layananPopuler = Order::selectRaw('layanan_id, COUNT(*) as total')
            ->groupBy('layanan_id')
            ->orderByDesc('total')
            ->with('layanan')
            ->first();

        return view('dashboard_admin', compact(
            'layanans',
            'photos',
            'orders',
            'layananCount',
            'orderCount',
            'layananPopuler'
        ));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'dokumen'      => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        if ($request->hasFile('dokumen')) {
            $validated['dokumen'] = $request->file('dokumen')->store('dokumen_layanan', 'public');
        }

        Layanan::create($validated);

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'dokumen'      => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        $layanan = Layanan::findOrFail($id);

        if ($request->hasFile('dokumen')) {
            // Hapus dokumen lama kalau ada
            if ($layanan->dokumen && Storage::disk('public')->exists($layanan->dokumen)) {
                Storage::disk('public')->delete($layanan->dokumen);
            }
            $validated['dokumen'] = $request->file('dokumen')->store('dokumen_layanan', 'public');
        } else {
            $validated['dokumen'] = $layanan->dokumen; // tetap pakai yang lama
        }

        $layanan->update($validated);

        return redirect()->back()->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        if ($layanan->dokumen && Storage::disk('public')->exists($layanan->dokumen)) {
            Storage::disk('public')->delete($layanan->dokumen);
        }

        $layanan->delete();

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
