<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Likes;
use App\Models\Login;
use App\Models\Status;
<<<<<<< HEAD
use App\Models\Product;
=======
<<<<<<< HEAD
use App\Models\Product;
=======
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
<<<<<<< HEAD
        $products = Product::all();
=======
<<<<<<< HEAD
        $products = Product::all();
=======
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
    
        // Dapatkan semua status yang sesuai dengan pengguna
        $statuses = Status::all(); // Ubah query sesuai kebutuhan
    
        // Dapatkan semua status yang telah dilike oleh pengguna
        $likedStatuses = Status::whereHas('likes', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
    
        // Dapatkan semua status yang telah dikomentari oleh pengguna
        $commentedStatuses = Likes::whereNotNull('comentar')->get();
        
        return view('like.status', [
            'statuses' => $statuses,
            'likedStatuses' => $likedStatuses,
            'commentedStatuses' => $commentedStatuses,
<<<<<<< HEAD
        ], compact('firstname', 'lastname', 'user', 'products'));
=======
<<<<<<< HEAD
        ], compact('firstname', 'lastname', 'user', 'products'));
=======
        ], compact('firstname', 'lastname', 'user'));
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
    }
    
    public function addLike(Request $request, $status_id)
    {
        // Pastikan Anda telah mengecek otentikasi pengguna sebelum menambahkan like
        $user_id = auth()->user()->id; // Mengambil ID pengguna yang sedang login
    
        // Membuat instance baru dari model Likes
        $like = new Likes();
        $like->user_id = $user_id;
    
        // Atur relasi dengan status yang sesuai
        $status = Status::find($status_id);
    
        if ($status) {
            $like->user_id = $user_id;
            $like->status_id = $status->id; // Mengisi kolom "status_id" sesuai dengan relasi
            $like->like = 1; // Mengisi kolom "like" sesuai dengan kebutuhan Anda
            $like->save();
        } else {
            return redirect()->back()->with('error', 'Status tidak ditemukan.');
        }
    
        // Tambahkan logika lain yang Anda perlukan, seperti mengupdate jumlah like pada postingan atau komentar yang sesuai.
    
        return redirect()->back()->with('success', 'Like berhasil ditambahkan.');
    }
    
    public function addComment(Request $request, $status_id)
    {
        // Pastikan Anda telah mengecek otentikasi pengguna sebelum menambahkan komentar
        $user_id = auth()->user()->id; // Mengambil ID pengguna yang sedang login
        $commentText = $request->input('comment'); // Mengambil isi komentar dari request
    
        $comment = new Likes();
        $comment->user_id = $user_id;
        $comment->comentar = $commentText; // Menyimpan isi komentar
    
        // Atur relasi dengan status yang sesuai
        $status = Status::find($status_id); // Gantilah ini dengan cara Anda mendapatkan status yang sesuai
        $comment->status()->associate($status);
    
        // Simpan komentar ke dalam database
        $comment->save();
    
        // Tambahkan logika lain yang Anda perlukan, seperti mengupdate tampilan status atau komentar.
    
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }
    
    
    public function showComments($status_id, Request $request)
    {
        $user = auth()->user();
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        $status = Status::findOrFail($status_id);
<<<<<<< HEAD
        $products = Product::all();
=======
<<<<<<< HEAD
        $products = Product::all();
=======
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
    
        // Mengambil semua komentar terkait status yang memiliki status_id sesuai dengan $status_id
        $likes = Likes::where('status_id', $status_id)->get();
    
<<<<<<< HEAD
        return view('like.comments', compact('likes', 'user', 'status', 'firstname', 'lastname', 'products'));
=======
<<<<<<< HEAD
        return view('like.comments', compact('likes', 'user', 'status', 'firstname', 'lastname', 'products'));
=======
        return view('like.comments', compact('likes', 'user', 'status', 'firstname', 'lastname'));
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
    }

    public function show($statusId)
    {
        // Temukan status berdasarkan status_id
        $status = Status::find($statusId);
    
        if (!$status) {
            // Status tidak ditemukan, Anda dapat menangani ini sesuai kebutuhan Anda
            abort(404);
        }
    
        // Perbarui relasi 'comments' untuk mengambil komentar
        $status = Status::with('comments')->find($statusId);
    
        // Mengambil jumlah likes
        $likesCount = $status->likes_count;
    
        // Mengambil jumlah komentar
        $commentsCount = $status->comments->count(); // Menggunakan count() untuk menghitung jumlah komentar
    
        return view('status.show', [
            'status' => $status,
            'likesCount' => $likesCount,
            'commentsCount' => $commentsCount, // Menggunakan $commentsCount yang telah dihitung
        ]);
    }
    
}
