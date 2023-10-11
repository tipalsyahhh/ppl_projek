<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login; // Import the Login model
use Illuminate\Support\Facades\Hash; // Import the Hash class
use Illuminate\Support\Str;

class RegisterController extends BaseController
{
    public function showRegistrationForm()
    {
        return view('register'); // Ganti dengan nama view registrasi yang Anda gunakan
    }

    public function register(Request $request)
    {
        $request->validate([
            'user' => 'required|unique:login',
            'password' => 'required',
            'namadepan' => 'required',
            'namabelakang' => 'required',
            'gender' => 'required',
        ]);
    
        $user = $request->input('user');
        $password = $request->input('password');
        $namadepan = $request->input('namadepan');
        $namabelakang = $request->input('namabelakang');
        $gender = $request->input('gender');
    
        // Generate remember_token using Str::random
        $remember_token = Str::random(60);
    
        $hashedPassword = Hash::make($password);
    
        $login = new Login([
            'user' => $user,
            'password' => $hashedPassword,
            'namadepan' => $namadepan,
            'namabelakang' => $namabelakang,
            'gender' => $gender,
            'remember_token' => $remember_token,
        ]);
    
        $login->save();
    
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan masuk dengan akun Anda.');
    }
}