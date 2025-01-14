<?php

namespace App\Http\Controllers\pimpinan;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pimpinanController extends Controller
{
    public function index()
    {
        $users = User::count();
        $barangs = Barang::count();
        return view('pimpinan.index', compact('users', 'barangs'));
    }
}
