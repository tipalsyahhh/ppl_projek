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
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
    
        if ($user && $user->role === 'admin') {
            // Tindakan yang hanya dapat diakses oleh admin
            $postingan = Postingan::all();
            $jumlahBeli = [];
    
            foreach ($postingan as $item) {
                $jumlahBeli[$item->id] = $item->products->sum('jumlah_beli');
            }
    
            return view('postingan.index', compact('postingan', 'jumlahBeli', 'firstname', 'lastname', 'user'));
        } else {
            // Tindakan ini hanya dapat diakses oleh non-admin
            return redirect()->route('home')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
    }
    
    public function create(Request $request)
    {
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
    
        if ($user && $user->role === 'admin') {
            // Tindakan yang hanya dapat diakses oleh admin
            return view('postingan.create', compact('firstname', 'lastname', 'user'));
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
        ]);
    
        $postingan->save();
    
        return redirect()->route('postingan.index')
            ->with('success', 'Postingan berhasil ditambahkan');
    }

    public function show($id, Request $request)
    {
        $postingan = Postingan::find($id);
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        
        // Ambil jumlah beli dari semua produk yang terkait dengan postingan
        $jumlahBeli = $postingan->products->sum('jumlah_beli');
        
        return view('postingan.detail', compact('postingan', 'jumlahBeli', 'firstname', 'lastname', 'user'));
    } 
     
    public function edit($id, Request $request)
    {
        $postingan = Postingan::find($id);
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        return view('postingan.edit', compact('postingan', 'firstname', 'lastname', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
    
            // Update data postingan
            $postingan->update([
                'nama_menu' => $request->get('nama_menu'),
                'harga' => $request->get('harga'),
                'deskripsi' => $request->get('deskripsi'),
                'image' => 'storage/images/' . $imageName,
            ]);
        } else {
            // Jika tidak ada gambar yang diunggah, update data lainnya tanpa mengubah gambar
            $postingan->update([
                'nama_menu' => $request->get('nama_menu'),
                'harga' => $request->get('harga'),
                'deskripsi' => $request->get('deskripsi'),
            ]);
        }
    
        return redirect()->route('postingan.index')
            ->with('success', 'Postingan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Postingan::find($id)->delete();

        return redirect()->route('postingan.index')
            ->with('success', 'Postingan berhasil dihapus');
    }
}
