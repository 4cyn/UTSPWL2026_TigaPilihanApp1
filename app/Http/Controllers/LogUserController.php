<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogUser;

class LogUserController extends Controller
{
    public function index(Request $request)
    {
        $query = LogUser::query();

        // 🔹 Filter aksi
        if ($request->filled('aksi')) {
            $query->where('aksi', $request->aksi);
        }

        // 🔹 Filter tanggal awal
        if ($request->filled('tanggal_awal')) {
            $query->whereDate('created_at', '>=', $request->tanggal_awal);
        }

        // 🔹 Filter tanggal akhir
        if ($request->filled('tanggal_akhir')) {
            $query->whereDate('created_at', '<=', $request->tanggal_akhir);
        }

        $logs = $query->latest()->get();

        return view('loguser.index', compact('logs'));
    }
}
