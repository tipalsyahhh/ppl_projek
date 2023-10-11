<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Postingan;
use App\Models\Login;
use App\Models\DataAkun;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        return view('products.index', compact('products', 'firstname', 'lastname', 'user'));
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
    
        // Ambil data menu dari model Postingan
        $menus = Postingan::all();
    
        return view('products.create', compact('firstname', 'lastname', 'user', 'menus'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'menu_id' => 'required',
            'jumlah_beli' => 'required',
        ]);
    
        $user = Auth::user();
        $data['user_id'] = $user->id;
    
        // Cari data alamat yang sesuai dari model DataAkun berdasarkan user yang sedang login
        $dataAkun = DataAkun::where('user_id', $user->id)->first();
    
        if ($dataAkun) {
            // Jika DataAkun ditemukan, ambil alamat_id-nya dan setel pada data produk
            $data['alamat_id'] = $dataAkun->id;
        } else {
            // Tangani situasi jika DataAkun tidak ditemukan (misalnya, berikan nilai default atau kembalikan kesalahan)
            // $data['alamat_id'] = nilai_default;
            // Atau tampilkan pesan kesalahan dan arahkan pengguna ke halaman yang sesuai
            // return redirect()->route('error')->with('error', 'Data Akun tidak ditemukan');
        }
    
        Product::create($data);
    
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }        

    public function show($id, Request $request)
    {
        $product = Product::find($id);
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        return view('products.index', compact('product', 'firstname', 'lastname', 'user'));
    }

    public function edit($id, Request $request)
    {
        $product = Product::find($id);
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'menu_id' => 'required',
            'user_id' => 'required',
            'alamat' => 'required',
            'jumlah_beli' => 'required',
        ]);

        $product = Product::find($id);
        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}