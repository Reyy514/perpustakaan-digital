<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
        // TAMPILKAN SEMUA KATEGORI
    public function index(Request $request)
    {
        $query = Kategori::query();

        if ($request->has('search') && $request->search !== '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $kategoris = $query->latest()->get();

        return view('kategori.index', compact('kategoris'));
    }
    
    public function buku($id)
    {
        $kategori = Kategori::with('buku')->findOrFail($id);
        $bukus = $kategori->buku; // Ambil daftar bukunya

        return view('buku.index', compact('kategori', 'bukus'));
    }

    // TAMPILKAN FORM TAMBAH
    public function create()
    {
        return view('kategori.create');
    }

    // SIMPAN KATEGORI BARU
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // TAMPILKAN FORM EDIT
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}