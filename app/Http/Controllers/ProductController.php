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
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        $products = [];
    
        if ($user && $user->role === 'admin') {
            // Jika pengguna adalah admin, ambil semua produk
            $products = Product::all();
        } else {
            $latestIsNew = Product::where('user_id', $user->id)
                ->orderBy('is_new', 'desc') // Urutkan berdasarkan is_new secara menurun
                ->first();
    
            if ($latestIsNew) {
                $products = Product::where('user_id', $user->id)
                    ->where('is_new', $latestIsNew->is_new) // Mencari data dengan is_new yang sama dengan yang terbaru
                    ->get();
            }
        }
    
        return view('products.index', compact('products', 'firstname', 'lastname', 'user'));
    }    
     
    public function create(Request $request)
    {
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
    
        // Ambil data menu dari model Postingan
        $menus = Postingan::all();
    
        if ($request->isMethod('post')) {
            // Validasi data yang dikirim dari formulir (pastikan validasi sesuai kebutuhan Anda)
    
            $menuId = $request->input('menu_id');
            $alamatId = $request->input('alamat_id');
            $jumlahBeli = $request->input('jumlah_beli');
    
            // Buat entri produk baru
            $product = new Product;
            $product->menu_id = $menuId;
            $product->user_id = $user->id;
            $product->alamat_id = $alamatId;
            $product->jumlah_beli = $jumlahBeli;
            $product->created_at = now();
            $product->is_new = true; // Mengatur is_new menjadi true
            $product->save();
    
            // Redirect ke halaman yang sesuai setelah membuat produk
            return redirect()->route('products.index');
        }
    
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
            // Tangani situasi jika DataAkun tidak ditemukan
            // Misalnya, berikan nilai default atau arahkan pengguna ke halaman yang sesuai
            // $data['alamat_id'] = nilai_default;
            // Atau tampilkan pesan kesalahan
            return redirect()->route('error')->with('error', 'Data Akun tidak ditemukan');
        }
    
        // Setel is_new untuk menjadi angka yang berurutan
        $lastIsNew = Product::where('user_id', $user->id)->max('is_new');
        $data['is_new'] = $lastIsNew ? $lastIsNew + 1 : 1;
    
        // Tambahkan properti created_at dengan waktu sekarang
        $data['created_at'] = now();
    
        // Buat entri produk baru
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

    public function cekOrder(Product $product)
    {
        // Ambil data pembeli dari produk
        $login = $product->pembeli;
    
        // Kirim notifikasi kepada pembeli
        $login->notify(new OrderChecked($product));
    
        // Tambahkan log atau tindakan lain yang diperlukan
    
        return redirect()->back()->with('success', 'Notifikasi telah dikirim kepada pembeli.');
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