<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        return view('adminPage.index');
    }

    public function inputBarang()
    {
        return view('adminPage.inputBarang.index');
    }
}
