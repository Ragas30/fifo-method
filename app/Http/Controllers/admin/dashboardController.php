<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashboardController extends Controller
{
    public function index()
    {
        $barangs = Barang::count();
        $users = User::all();

        return view('adminPage.index', compact('barangs', 'users'));
    }

    public function barang()
    {
        $barangs = Barang::count();
        return view('adminPage.index', compact('barangs'));
    }

    public function inputBarang()
    {
        return view('adminPage.inputBarang.index');
    }
}
