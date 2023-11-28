<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $table = 'follows'; // Nama tabel dalam database
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['id', 'user_id', 'following_user_id']; // Kolom yang dapat diisi

    public function user()
    {
        return $this->belongsTo(Login::class, 'user_id', 'id');
    }

    public function followingUser()
    {
        return $this->belongsTo(Login::class, 'following_user_id', 'id');
    }
}