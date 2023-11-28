<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataAkun;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

class DataAkunController extends Controller
{
    // Menampilkan daftar data
    public function index(Request $request)
    {
        $user = Auth::user();
        $statuses = Status::all();
        $products = Product::all();
        $firstname = $request->input('first_name');
        $lastname = $request->input('last_name');
        $dataAkun = DataAkun::where('user_id', $user->id)->get();
        $userProfile = DataAkun::with('user.profileImage', 'user.followers', 'user.myStatuses')->where('user_id', $user->id)->first();
        $statusCount = Status::where('user_id', $user->id)->count();
    
        return view('dataAkun.index', compact('dataAkun', 'firstname', 'lastname', 'user', 'userProfile', 'products', 'statuses', 'statusCount'));
    }

    public function show($dataAkunId)
{
    $dataAkun = DataAkun::find($dataAkunId);
    $user = $dataAkun->user; // Ini akan mengembalikan objek pengguna yang terkait

    return view('profile.show', compact('dataAkun', 'user'));
}

    // Menampilkan formulir untuk membuat data baru
    public function create(Request $request)
    {
        $user = Auth::user();
        $products = Product::all();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        return view('dataAkun.create', compact('firstname', 'lastname', 'user', 'products'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $dataAkun = new DataAkun([
            'nama_depan' => $request->input('nama_depan'),
            'nama_belakang' => $request->input('nama_belakang'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'alamat' => $request->input('alamat'),
            'gender' => $request->input('gender'),
            'biodata' => $request->input('biodata'),
            'user_id' => Auth::user()->id, // Gunakan ID pengguna yang telah login
        ]);
    
        $dataAkun->save();
    
        return redirect()->route('dataAkun.index');
    }   

    // Menampilkan data yang ingin diedit
    public function edit($user_id, Request $request)
    {
        $dataAkun = DataAkun::where('user_id', $user_id)->first();
    
        $products = Product::all();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        $user = Auth::user();
    
        if (!$dataAkun) {
            return redirect()->route('dataAkun.index')->with('error', 'Data Akun tidak ditemukan');
        }
    
        return view('dataAkun.edit', compact('dataAkun', 'firstname', 'lastname', 'user', 'products'));
    }

    // Memperbarui data yang diedit
    public function update(Request $request)
    {
        $user = Auth::user(); // Dapatkan pengguna yang sedang masuk
        $dataAkun = DataAkun::where('user_id', $user->id)->first(); // Dapatkan data akun pengguna yang sedang masuk
    
        $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'biodata' => 'required',
        ]);
    
        // Jika pengguna belum memiliki data akun, buat baru
        if (!$dataAkun) {
            $dataAkun = new DataAkun();
            $dataAkun->user_id = $user->id;
        }
    
        $dataAkun->nama_depan = $request->input('nama_depan');
        $dataAkun->nama_belakang = $request->input('nama_belakang');
        $dataAkun->tanggal_lahir = $request->input('tanggal_lahir');
        $dataAkun->alamat = $request->input('alamat');
        $dataAkun->gender = $request->input('gender');
        $dataAkun->biodata = $request->input('biodata');
        $dataAkun->save();
    
        return redirect()->route('dataAkun.index')->with('success', 'Profil berhasil diperbarui');
    }    

    // Menghapus data
    public function destroy($user_id)
    {
        $dataAkun = DataAkun::where('user_id', $user_id)->first();
    
        if ($dataAkun) {
            $dataAkun->delete();
            return redirect()->route('dataAkun.index')->with('success', 'Data Profil berhasil dihapus');
        } else {
            return redirect()->route('dataAkun.index')->with('error', 'Data Profil tidak ditemukan');
        }
    }

    protected function hasUserData($user)
    {
        return DataAkun::where('user_id', $user->id)->exists();
    }
}
