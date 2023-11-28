<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\Login;
use App\Models\DataAkun;
use App\Models\Status;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function index(Request $request)
    {
    $user = Auth::user(); // Mendapatkan pengguna yang saat ini masuk
    
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        $products = Product::all();
        // Mengambil daftar pengguna yang dapat di-follow (kecuali pengguna yang sedang masuk)
        $allUsers = Login::where('id', '!=', auth()->user()->id)->get();

        return view('follow.index', compact('allUsers', 'firstname', 'lastname', 'user', 'products'));
    }

    // Fungsi untuk mengikuti pengguna
    public function follow(Request $request, $userId)
    {
        $user = Login::find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan');
        }

        // Tambahkan relasi follow ke dalam tabel "follows"
        auth()->user()->following()->attach($userId);

        return redirect()->back()->with('success', 'Anda berhasil mengikuti pengguna ' . $user->user);
    }

    // Fungsi untuk berhenti mengikuti pengguna
    public function unfollow(Request $request, $userId)
    {
        $user = Login::find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan');
        }

        // Hapus relasi follow dari tabel "follows"
        auth()->user()->following()->detach($userId);

        return redirect()->back()->with('success', 'Anda berhenti mengikuti pengguna ' . $user->user);
    }

    // Fungsi untuk menampilkan daftar pengikut pengguna
    public function followers($userId)
    {
        $user = Login::find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan');
        }

        $followers = $user->followers;

        return view('followers', compact('user', 'followers'));
    }

    // Fungsi untuk menampilkan daftar pengguna yang diikuti
    public function following($userId)
    {
        $user = Login::find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan');
        }

        $following = $user->following;

        return view('following', compact('user', 'following'));
    }

    public function showProfile($userId, Request $request)
    {
        $user = auth()->user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        $products = Product::all();
        $statusCount = Status::where('user_id', $userId)->count();
        
        // Ambil data profil dari model DataAkun beserta relasi profileImage
        $userProfile = DataAkun::with('user.profileImage', 'user.followers', 'user.myStatuses')->where('user_id', $userId)->first();
        $users = Login::withCount(['followers', 'following'])->get();
        $userItem = Login::find($userId);
        
        if (!$userProfile) {
            // Handle the case when the user profile is not found
            return redirect()->route('follow.index')->with('error', 'User profile not found.');
        }
        
        return view('follow.profile', compact('userProfile', 'firstname', 'lastname', 'user', 'userItem', 'products', 'statusCount'));
    } 
}
