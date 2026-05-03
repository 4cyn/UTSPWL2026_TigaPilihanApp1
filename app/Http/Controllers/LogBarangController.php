<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogBarang;

class LogBarangController extends Controller
{
    public function index(Request $request)
{
    $logs = LogBarang::query()
        ->when($request->aksi, function ($query, $aksi) {
            $query->where('aksi', $aksi);
        })
        ->when($request->kategori, function ($query, $kategori) {
            $query->where('kategori', $kategori);
        })
        ->when($request->tanggal_awal, function ($query, $tanggalAwal) {
            $query->whereDate('created_at', '>=', $tanggalAwal);
        })
        ->when($request->tanggal_akhir, function ($query, $tanggalAkhir) {
            $query->whereDate('created_at', '<=', $tanggalAkhir);
        })
        ->latest()
        ->get();

    return view('logbarang.index', compact('logs'));
}
}
