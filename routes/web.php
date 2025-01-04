<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\dashboardController;

route::get('/dashboard', [dashboardController::class, "index"])->name('dashboard');
