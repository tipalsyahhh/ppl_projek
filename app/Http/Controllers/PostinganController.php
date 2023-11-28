<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class PostinganController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $products = Product::all();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
    
        if ($user && $user->role === 'admin') {
            // Tindakan yang hanya dapat diakses oleh admin
            $postingan = Postingan::all();
            $jumlahBeli = [];
    
            foreach ($postingan as $item) {
                $jumlahBeli[$item->id] = $item->products->sum('jumlah_beli');
            }
    
<<<<<<< HEAD
            return view('postingan.index', compact('postingan', 'jumlahBeli', 'firstname', 'lastname', 'user', 'products'));
=======
<<<<<<< HEAD
            return view('postingan.index', compact('postingan', 'jumlahBeli', 'firstname', 'lastname', 'user', 'products'));
=======
            return view('postingan.index', compact('postingan', 'jumlahBeli', 'firstname', 'lastname', 'user'));
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
        } else {
            // Tindakan ini hanya dapat diakses oleh non-admin
            return redirect()->route('home')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
    }
    
    public function create(Request $request)
    {
        $user = Auth::user();
        $products = Product::all();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
    
        if ($user && $user->role === 'admin') {
            // Tindakan yang hanya dapat diakses oleh admin
            return view('postingan.create', compact('firstname', 'lastname', 'user', 'products'));
        } else {
            // Tindakan ini hanya dapat diakses oleh nonadmin
            return redirect()->route('home')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required|regex:/^\d+(\.\d{1,4})?/',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
<<<<<<< HEAD
            'jenis' => 'required', // Menambahkan validasi untuk 'jenis'
            'kapasitas' => 'required|integer', // Menambahkan validasi untuk 'kapasitas'
=======
<<<<<<< HEAD
            'jenis' => 'required', // Menambahkan validasi untuk 'jenis'
            'kapasitas' => 'required|integer', // Menambahkan validasi untuk 'kapasitas'
=======
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
        ]);
    
        $image = $request->file('image');
    
        // Berikan nama unik untuk gambar
        $imageName = time() . '.' . $image->getClientOriginalExtension();
    
        // Simpan gambar ke direktori yang diinginkan di penyimpanan
        $image->storeAs('images', $imageName);
    
        // Simpan data postingan ke basis data
        $postingan = new Postingan([
            'nama_menu' => $request->get('nama_menu'),
            'harga' => $request->get('harga'),
            'deskripsi' => $request->get('deskripsi'),
            'image' => 'storage/images/' . $imageName,
<<<<<<< HEAD
            'jenis' => $request->get('jenis'), // Menambahkan 'jenis'
            'kapasitas' => $request->get('kapasitas'), // Menambahkan 'kapasitas'
=======
<<<<<<< HEAD
            'jenis' => $request->get('jenis'), // Menambahkan 'jenis'
            'kapasitas' => $request->get('kapasitas'), // Menambahkan 'kapasitas'
=======
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
        ]);
    
        $postingan->save();
    
        return redirect()->route('postingan.index')
            ->with('success', 'Postingan berhasil ditambahkan');
    }

    public function show($id, Request $request)
    {
        $postingan = Postingan::find($id);
        $products = Product::all();
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        
        // Ambil jumlah beli dari semua produk yang terkait dengan postingan
        $jumlahBeli = $postingan->products->sum('jumlah_beli');
        
<<<<<<< HEAD
        return view('postingan.detail', compact('postingan', 'jumlahBeli', 'firstname', 'lastname', 'user', 'products'));
=======
<<<<<<< HEAD
        return view('postingan.detail', compact('postingan', 'jumlahBeli', 'firstname', 'lastname', 'user', 'products'));
=======
        return view('postingan.detail', compact('postingan', 'jumlahBeli', 'firstname', 'lastname', 'user'));
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
    } 
     
    public function edit($id, Request $request)
    {
        $postingan = Postingan::find($id);
        $products = Product::all();
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        return view('postingan.edit', compact('postingan', 'firstname', 'lastname', 'user', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Menghapus required untuk gambar
            'jenis' => 'required', // Menambahkan validasi untuk 'jenis'
            'kapasitas' => 'integer', // Menambahkan validasi untuk 'kapasitas'
        ]);
    
        // Dapatkan postingan berdasarkan ID
        $postingan = Postingan::find($id);
    
        // Hapus gambar lama jika ada
        if ($request->hasFile('image')) {
            $oldImagePath = public_path($postingan->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
    
            $image = $request->file('image');
    
            // Berikan nama unik untuk gambar
            $imageName = time() . '.' . $image->getClientOriginalExtension();
    
            // Simpan gambar ke direktori public/storage/images
            $image->move(public_path('storage/images'), $imageName);
    
            // Update data postingan termasuk 'jenis' dan 'kapasitas'
            $postingan->update([
                'nama_menu' => $request->get('nama_menu'),
                'harga' => $request->get('harga'),
                'deskripsi' => $request->get('deskripsi'),
                'image' => 'storage/images/' . $imageName,
                'jenis' => $request->get('jenis'), // Menambahkan 'jenis'
                'kapasitas' => $request->get('kapasitas'), // Menambahkan 'kapasitas'
            ]);
        } else {
            // Jika tidak ada gambar yang diunggah, update data lainnya tanpa mengubah gambar
            $postingan->update([
                'nama_menu' => $request->get('nama_menu'),
                'harga' => $request->get('harga'),
                'deskripsi' => $request->get('deskripsi'),
                'jenis' => $request->get('jenis'), // Menambahkan 'jenis'
                'kapasitas' => $request->get('kapasitas'), // Menambahkan 'kapasitas'
            ]);
        }
    
        return redirect()->route('postingan.index')
            ->with('success', 'Postingan berhasil diperbarui');
    }    

    public function destroy($id)
    {
        // Ambil postingan terkait
        $postingan = Postingan::find($id);
    
        // Hapus semua produk terkait
        $postingan->products()->delete();
    
        // Hapus postingan
        $postingan->delete();
    
        return redirect()->route('postingan.index')
            ->with('success', 'Postingan berhasil dihapus');
    }
}
