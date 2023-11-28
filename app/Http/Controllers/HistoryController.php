<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    // Menampilkan daftar riwayat produk
    public function index(Request $request)
    {
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        $user = $request->user(); // Mengambil pengguna yang login dari Request
        $products = Product::where('user_id', $user->id)->get();

        $products = Product::all();
        return view('history.index', compact('products', 'firstname', 'lastname', 'user'));
    }

    // Menampilkan detail riwayat produk
    public function show($id, Request $request)
    {
        $user = Auth::user();
        $products = Product::all();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        $product = Product::find($id);
        return view('history.show', compact('product', 'products', 'firstname', 'lastname', 'user'));
    }
}