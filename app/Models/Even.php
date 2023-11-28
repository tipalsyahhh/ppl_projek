<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Even extends Model
{
    use HasFactory;
    protected $table = 'even';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['nama_even', 'tanggal_acara', 'deskripsi', 'image', 'harga_tiket', 'status_even'];
}