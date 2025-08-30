<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananLayanan;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'layanan_id' => 'required|exists:layanans,id',
    //         'tanggal'    => 'required|date',
    //         'alamat'     => 'required|string'
    //     ]);

    //     PemesananLayanan::create([
    //         'user_id'    => Auth::id(),
    //         'layanan_id' => $request->layanan_id,
    //         'tanggal'    => $request->tanggal,
    //         'alamat'     => $request->alamat,
    //         'status'     => 'pending'
    //     ]);

    //     return redirect()->back()->with('success', 'Jadwal berhasil disimpan!');
    // }
}
