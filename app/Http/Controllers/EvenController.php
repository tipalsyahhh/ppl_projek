<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Even;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EvenController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $products = Product::all();
        $firstname = $request->input('first_name');
        $lastname = $request->input('last_name');
        $evens = Even::all();
        return view('even.index', compact('evens', 'firstname', 'lastname', 'user', 'products'));
    }

    public function tampilanEven(Request $request)
    {
        $user = Auth::user();
        $products = Product::all();
        $firstname = $request->input('first_name');
        $lastname = $request->input('last_name');
        $evens = Even::all();
        return view('even.tampilanEven', compact('evens', 'firstname', 'lastname', 'user', 'products'));
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $products = Product::all();
        $firstname = $request->input('first_name');
        $lastname = $request->input('last_name');
        return view('even.create', compact('firstname', 'lastname', 'user', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_even' => 'required',
            'tanggal_acara' => 'required|date',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga_tiket' => 'required',
        ]);
    
        // Handle upload gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            // Simpan di dalam folder pw2\public\storage\images
            $path = $image->storeAs('images', $imageName); 
            
            $input['image'] = 'images/' . $imageName;
        }
    
        // Tambahkan logika untuk menentukan status_even
        $input['status_even'] = Carbon::parse($request->tanggal_acara)->addDays(7) > now() ? 'berlaku' : 'tidak berlaku';
    
        // Simpan data even
        Even::create($input);
    
        return redirect()->route('even.index')->with('success', 'Even berhasil ditambahkan.');
    }

    public function show($id)
    {
        $even = Even::findOrFail($id);
        return view('even.show', compact('even'));
    }

    public function edit($id, Request $request)
    {
        $user = Auth::user();
        $products = Product::all();
        $firstname = $request->input('first_name');
        $lastname = $request->input('last_name');
        $even = Even::findOrFail($id);
        return view('even.edit', compact('even', 'firstname', 'lastname', 'user', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_even' => 'required',
            'tanggal_acara' => 'required|date',
            'deskripsi' => 'required',
            'harga_tiket' => 'required',
        ]);
    
        $even = Even::findOrFail($id);
        $input = $request->all();
    
        // Handle upload gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
    
            // Simpan di dalam folder pw2\public\storage\images
            $path = $image->storeAs('images', $imageName); 
    
            // Hapus gambar lama jika ada
            if (Storage::exists($even->image)) {
                Storage::delete($even->image);
            }
    
            $input['image'] = 'images/' . $imageName;
        }
    
        // Perbarui status_even
        $input['status_even'] = Carbon::parse($request->tanggal_acara)->addDays(7) > now() ? 'berlaku' : 'tidak berlaku';
    
        // Perbarui data even
        $even->update($input);
    
        return redirect()->route('even.index')->with('success', 'Even berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $even = Even::findOrFail($id);
        $even->delete();

        return redirect()->route('even.index')->with('success', 'Even berhasil dihapus.');
    }
}
