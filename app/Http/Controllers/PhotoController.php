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
        return view('dashboard_index', compact('photos'));
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

        return redirect()->route('admin.dashboard_index')->with('success', 'Foto berhasil ditambahkan!');
    }
}

