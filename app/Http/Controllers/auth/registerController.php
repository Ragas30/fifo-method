<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required' | 'string' | 'max:255',
            'email' => 'required' | 'string' | 'email' | 'max:255' | 'unique:users',
            'password' => 'required' | 'string' | 'min:8' | 'confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }
}
