<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\LogBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::latest()->paginate(10);
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'max:255'],
            'stok' => ['required', 'integer', 'min:-1'],
            'harga' => ['required', 'numeric', 'min:0'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        Barang::create($validated);

        LogBarang::create([
        'nama_barang' => $validated['nama_barang'],
        'kategori' => $validated['kategori'],
        'deskripsi' => $validated['deskripsi'],
        'aksi' => 'Tambah Barang',
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'nama_barang' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'max:255'],
            'stok' => ['required', 'integer', 'min:-1'],
            'harga' => ['required', 'numeric', 'min:0'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        $barang->update($validated);

        LogBarang::create([
        'nama_barang' => $barang->nama_barang,
        'kategori' => $barang->kategori,
        'deskripsi' => $barang->deskripsi,
        'aksi' => 'Update Barang',
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        LogBarang::create([
        'nama_barang' => $barang->nama_barang,
        'kategori' => $barang->kategori,
        'deskripsi' => $barang->deskripsi,
        'aksi' => 'Hapus Barang',
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}