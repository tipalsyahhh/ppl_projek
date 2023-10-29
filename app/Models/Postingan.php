<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;
    protected $table = 'postingan';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['nama_menu', 'harga', 'deskripsi', 'image', 'jumlah_pesan'];

    public function products()
    {
        return $this->hasMany(Product::class, 'menu_id', 'id');
    }
}