<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Login;
<<<<<<< HEAD
use App\Models\Product;
use App\Models\Likes;
=======
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        $statuses = Status::all();
        $statuses = Status::with('user')->get();
        $user = Auth::user();
<<<<<<< HEAD
        $products = Product::all();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        return view('statuses.index', compact('statuses', 'firstname', 'lastname', 'user', 'products'));
=======
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        return view('statuses.index', compact('statuses', 'firstname', 'lastname', 'user'));
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
    }    

    public function create(Request $request)
    {
        $user = Auth::user();
<<<<<<< HEAD
        $products = Product::all();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        return view('statuses.create', compact('firstname', 'lastname', 'user', 'products'));
=======
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        return view('statuses.create', compact('firstname', 'lastname', 'user'));
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'caption' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        // Mengambil ID pengguna yang sedang login
        $user_id = auth()->user()->id;
    
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
    
        $imagePath = 'storage/images/' . $imageName; // Sesuaikan dengan direktori penyimpanan gambar
    
        // Pindahkan gambar ke direktori yang diinginkan
        $image->move(public_path('storage/images'), $imageName);
    
        // Membuat entri baru dalam tabel 'status'
        Status::create([
            'user_id' => $user_id,
            'caption' => $request->caption,
            'image' => $imagePath,
        ]);
    
        // Redirect ke halaman yang sesuai
<<<<<<< HEAD
        return redirect()->route('dataAkun.index');
=======
        return redirect()->route('statuses.index');
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
    }
    
    public function show(Status $status)
    {
        return view('statuses.show', compact('status'));
    }

    public function edit(Status $status, Request $request)
    {
        $user = Auth::user();
<<<<<<< HEAD
        $products = Product::all();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        return view('statuses.edit', compact('status', 'firstname', 'lastname', 'user', 'products'));
=======
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        return view('statuses.edit', compact('status', 'firstname', 'lastname', 'user'));
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'caption' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
    
        // Menemukan status berdasarkan id
        $status = Status::find($id);
    
        if (!$status) {
            return redirect()->route('statuses.index')->with('error', 'Status tidak ditemukan');
        }
    
<<<<<<< HEAD
        // Memeriksa peran pengguna
        if (Auth::user()->role == 'admin') {
            $redirectRoute = 'statuses.index';
        } else {
            $redirectRoute = 'dataAkun.index';
        }
    
=======
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
        if ($request->hasFile('image')) {
            // Hapus file gambar lama jika ada
            if ($status->image) {
                // Ambil nama file gambar lama
                $oldImage = pathinfo($status->image)['basename'];
<<<<<<< HEAD
    
                // Hapus file gambar lama
                Storage::disk('public')->delete('images/' . $oldImage);
            }
    
            // Mengambil file gambar yang diunggah
            $image = $request->file('image');
    
            // Membuat nama unik untuk file gambar
            $imageName = time() . '_' . $image->getClientOriginalName();
    
            // Memindahkan gambar ke direktori yang sesuai
            $image->move(public_path('storage/images'), $imageName);
    
=======
        
                // Hapus file gambar lama
                Storage::disk('public')->delete('images/' . $oldImage);
            }
        
            // Mengambil file gambar yang diunggah
            $image = $request->file('image');
        
            // Membuat nama unik untuk file gambar
            $imageName = time() . '_' . $image->getClientOriginalName();
        
            // Memindahkan gambar ke direktori yang sesuai
            $image->move(public_path('storage/images'), $imageName);
        
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
            // Mendapatkan path lengkap gambar
            $imagePath = 'storage/images/' . $imageName;
        } else {
            $imagePath = $status->image;
        }
    
        $status->update([
            'caption' => $request->caption,
            'image' => $imagePath,
        ]);
    
<<<<<<< HEAD
        return redirect()->route($redirectRoute)->with('success', 'Status berhasil diperbarui');
    }    
=======
        return redirect()->route('statuses.index')->with('success', 'Status berhasil diperbarui');
    }
    
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7

    public function showComments($status_id, Request $request)
    {
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        
        // Mengambil status berdasarkan $status_id
        $status = Status::findOrFail($status_id);
        
        // Mengambil like dan comentar yang terkait dengan status
        $likes = Likes::where('status_id', $status_id)->get();
    
        return view('like.comments', compact('likes', 'firstname', 'lastname', 'user', 'status'));
    }
<<<<<<< HEAD
    public function destroy($id)
    {
        try {
            // Hapus status
            Status::destroy($id);

            return redirect()->route('statuses.index')->with('success', 'Status berhasil dihapus');
        } catch (\Exception $e) {
            // Handle exception jika status tidak ditemukan atau terjadi kesalahan lainnya
            return redirect()->route('statuses.index')->with('error', 'Gagal menghapus status. Silakan coba lagi.');
        }
    }

    public function deleteProfile($id)
    {
        // Ambil postingan terkait
        $status = Status::find($id);

    // Simpan relasi likes untuk sementara
    $status->likes()->delete();

    // Hapus status
    $status->delete();

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->route('dataAkun.index')->with('success', 'Status berhasil dihapus');
    }

    public function getStatusCountByUser()
    {
        $userId = Auth::id(); // Mendapatkan ID pengguna yang sedang masuk

        $statusCount = Status::where('user_id', $userId)->count();

        return view('status.count', compact('statusCount'));
    }
=======
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
}
