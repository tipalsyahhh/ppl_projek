<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'id';
    public $timestamps = false;
<<<<<<< HEAD
    protected $fillable = ['menu_id', 'user_id', 'alamat_id', 'jumlah_beli', 'created_at', 'tanggal_datang', 'total_harga', 'status', 'unread', 'is_new'];
=======
<<<<<<< HEAD
    protected $fillable = ['menu_id', 'user_id', 'alamat_id', 'jumlah_beli', 'created_at', 'tanggal_datang', 'total_harga', 'status', 'unread', 'is_new'];
=======
    protected $fillable = ['menu_id', 'user_id', 'alamat_id', 'jumlah_beli', 'created_at', 'is_new'];
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

    public function login()
    {
        return $this->belongsTo(Login::class, 'user_id', 'id');
    }

    public function postingan()
    {
        return $this->belongsTo(Postingan::class, 'menu_id', 'id');
    }

    public function alamat()
    {
        return $this->belongsTo(DataAkun::class, 'alamat_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Login::class, 'user_id'); // Sesuaikan dengan nama kolom yang sesuai
    }

}