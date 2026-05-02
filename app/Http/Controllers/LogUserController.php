<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogUser;

class LogUserController extends Controller
{
    public function index()
    {
        $logs = LogUser::latest()->get();
        return view('loguser.index', compact('logs'));
    }
}
