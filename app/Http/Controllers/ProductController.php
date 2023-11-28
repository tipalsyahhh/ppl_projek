<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Postingan;
use App\Models\Login;
use App\Models\DataAkun;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        $products = [];
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
        if ($user && $user->role === 'admin') {
            // Jika pengguna adalah admin, ambil semua produk
            $products = Product::all();
        } else {
            $latestIsNew = Product::where('user_id', $user->id)
                ->orderBy('is_new', 'desc') // Urutkan berdasarkan is_new secara menurun
                ->first();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
            if ($latestIsNew) {
                $products = Product::where('user_id', $user->id)
                    ->where('is_new', $latestIsNew->is_new) // Mencari data dengan is_new yang sama dengan yang terbaru
                    ->get();
            }
        }
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

        return view('products.index', compact('products', 'firstname', 'lastname', 'user'));
    }

    public function create(Request $request, $postinganId = null)
<<<<<<< HEAD
=======
=======
    
        return view('products.index', compact('products', 'firstname', 'lastname', 'user'));
    }    
     
    public function create(Request $request)
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
    {
        $user = Auth::user();
        $products = Product::all();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
    
        // Jika postinganId tidak diberikan, ambil postingan terakhir berdasarkan ID
        if (!$postinganId) {
            $postingan = Postingan::latest('id')->first();
        } else {
            // Ambil data postingan berdasarkan postinganId
            $postingan = Postingan::find($postinganId);
    
            // Pastikan bahwa postingan dengan postinganId yang diberikan ditemukan
            if (!$postingan) {
                return redirect()->route('error')->with('error', 'Postingan tidak ditemukan.');
            }
        }
    
        // Ambil data menu dari model Postingan
        $menus = Postingan::all();
    
        if ($request->isMethod('post')) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
            $validator = Validator::make($request->all(), [
                'alamat_id' => 'required',
                'jumlah_beli' => 'required|integer',
                'tanggal_datang' => 'required|date',
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        
            // Ambil data postingan berdasarkan menu_id
            $postingan = Postingan::find($request->input('menu_id'));
        
            // Pastikan bahwa postingan dengan menu_id yang diberikan ditemukan
            if (!$postingan) {
                return redirect()->back()->with('error', 'Menu tidak ditemukan.');
            }
        
            // Bersihkan nilai harga dari tanda pemisah ribuan dan angka desimal, konversi ke float
            $hargaCleaned = preg_replace('/[^0-9]/', '', $postingan->harga);
            $harga = floatval($hargaCleaned);
        
            // Buat produk baru
            $product = new Product;
            // Hapus baris berikut karena menu_id akan diisi otomatis
            // $product->menu_id = $request->input('menu_id');
            $product->user_id = $user->id;
            $product->alamat_id = $request->input('alamat_id');
            $product->jumlah_beli = $request->input('jumlah_beli');
            $product->total_harga = $harga * $request->input('jumlah_beli');
            $product->created_at = now();
            $product->tanggal_datang = $request->input('tanggal_datang');
            $product->status = 'menunggu';
            $product->is_new = true;
            $product->save();
        
            return redirect()->route('products.index');
        }
    
        return view('products.create', compact('firstname', 'lastname', 'user', 'menus', 'products', 'postingan'));
<<<<<<< HEAD
=======
=======
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
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
    }
    

    public function store(Request $request)
    {
        $data = $request->validate([
            'menu_id' => 'required|exists:postingan,id',
            'jumlah_beli' => 'required|integer',
            'tanggal_datang' => 'required|date',
        ]);
    
        $user = Auth::user();
        $data['user_id'] = $user->id;
    
        // Cari data alamat yang sesuai dari model DataAkun berdasarkan user yang sedang login
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
    
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
        // Ambil data harga dari model Postingan
        $harga = Postingan::where('id', $data['menu_id'])->value('harga');
    
        // Hitung total harga
        $data['total_harga'] = $harga * $data['jumlah_beli'];
    
<<<<<<< HEAD
=======
=======
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
        // Setel is_new untuk menjadi angka yang berurutan
        $lastIsNew = Product::where('user_id', $user->id)->max('is_new');
        $data['is_new'] = $lastIsNew ? $lastIsNew + 1 : 1;
    
        // Tambahkan properti created_at dengan waktu sekarang
        $data['created_at'] = now();
    
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
        // Set status menjadi "menunggu"
        $data['status'] = 'menunggu';
    
        // Buat entri produk baru
<<<<<<< HEAD
        Product::create($data);
    
        return redirect()->route('products.index')->with('success', 'Pesanan berhasil di buat, tunggu admin memferivikasi pesanan anda.');
=======
        Product::create($data);
    
        return redirect()->route('products.index')->with('success', 'Pesanan berhasil di buat, tunggu admin memferivikasi pesanan anda.');
=======
        // Buat entri produk baru
        Product::create($data);
    
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
    }
    

    public function show($id, Request $request)
    {
        $product = Product::find($id);
        $products = Product::all();
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
<<<<<<< HEAD
        return view('products.index', compact('product', 'firstname', 'lastname', 'user', 'products'));
=======
<<<<<<< HEAD
        return view('products.index', compact('product', 'firstname', 'lastname', 'user', 'products'));
=======
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
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
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

    public function tataTertib(Request $request)
    {
        $user = Auth::user();
        $products = Product::all();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        return view('products.peraturan', compact('firstname', 'lastname', 'user', 'products'));
    }

    public function approveOrder(Request $request)
    {
        // Validasi request, pastikan product_id ada dalam request
        $request->validate([
            'product_id' => 'required|exists:product,id',
        ]);

        // Temukan produk berdasarkan ID dan langsung ubah status menjadi disetujui
        Product::where('id', $request->product_id)->update(['status' => 'disetujui']);

        // Redirect ke halaman products.index setelah berhasil disetujui
        return redirect()->route('products.index')->with('success', 'Status berhasil diubah menjadi disetujui');
    }

    public function rejectOrder(Request $request)
    {
        // Validasi request, pastikan product_id ada dalam request
        $request->validate([
            'product_id' => 'required|exists:product,id',
        ]);

        // Temukan produk berdasarkan ID dan langsung ubah status menjadi ditolak
        Product::where('id', $request->product_id)->update(['status' => 'ditolak']);

        // Redirect ke halaman products.index setelah berhasil ditolak
        return redirect()->route('products.index')->with('success', 'Status berhasil diubah menjadi ditolak');
    }
}