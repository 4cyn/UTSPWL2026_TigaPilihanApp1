<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogBarang;

class LogBarangController extends Controller
{
    public function index()
    {
    $logs = LogBarang::latest()->get();
    return view('logbarang.index', compact('logs'));
    }
}
