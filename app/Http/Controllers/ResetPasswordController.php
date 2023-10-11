<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends BaseController
{
    public function showResetForm($username, Request $request)
    {
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        return view('akun.reset-password-form', ['username' => $username], compact('firstname', 'lastname', 'user'));
    }

    public function resetPassword(Request $request)
    {
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);
    
        // Mendapatkan pengguna yang sedang diotentikasi
        $user = Auth::user();
    
        // Pastikan pengguna sedang diotentikasi
        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus masuk terlebih dahulu.');
        }
    
        // Update password
        $user->password = Hash::make($request->input('password'));
        $user->save();
    
        // Mengambil username dari pengguna yang sedang diotentikasi
        $username = $user->username;

        session()->flash('success', 'Password berhasil diubah. Silahkan login dengan password baru.');
        return view('akun.reset-password-form', compact('username', 'firstname', 'lastname', 'user'));
    }
}
