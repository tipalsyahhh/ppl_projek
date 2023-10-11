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
    protected $fillable = ['menu_id', 'user_id', 'alamat_id', 'jumlah_beli'];

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

}