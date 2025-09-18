<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::latest()->get();
        return view('dashboard_admin', compact('photos'));
    }
    public function galeri()
{
    $photos = Photo::latest()->get();
    // arahkan ke galeri publik
    return view('galeri', compact('photos'));
}
    public function create()
    {
        return view('tbgaleri');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'judul' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $imagePath = $request->file('photo')->store('photos', 'public');

        Photo::create([
            'image' => $imagePath,
            'judul' => $request->judul,
            'description' => $request->description
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Foto berhasil ditambahkan!');
    }

    // 🔹 Tambahan untuk galeri user (tanpa user_id)
    public function userIndex()
    {
        $photos = Photo::latest()->get();
        return view('user.galeri', compact('photos'));
    }

    // hapus
    public function destroy($id)
{
    $photo = Photo::findOrFail($id);

    // Hapus file dari storage kalau ada
    if ($photo->image && Storage::exists('public/' . $photo->image)) {
        Storage::delete('public/' . $photo->image);
    }

    // Hapus dari database
    $photo->delete();

    return redirect()->back()->with('success', 'Foto berhasil dihapus!');
}

}
