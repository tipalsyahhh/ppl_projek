<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Login extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'login';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['user', 'password', 'namadepan', 'namabelakang', 'gender', 'remember_token', 'role'];

    // Metode untuk menggabungkan nama depan dan nama belakang menjadi nama lengkap
    public function getFullNameAttribute()
    {
        return $this->attributes['namadepan'] . ' ' . $this->attributes['namabelakang'];
    }

    public function getAuthIdentifierName()
    {
        return 'user';
    }

    public function getAuthIdentifier()
    {
        return $this->attributes['user'];
    }

    public function getAuthPassword()
    {
        return $this->attributes['password'];
    }

    // Implementasi metode-metode untuk remember token
    public function getRememberToken()
    {
        return $this->attributes['remember_token'];
    }

    public function setRememberToken($value)
    {
        $this->attributes['remember_token'] = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function profileImage()
    {
        return $this->hasOne(ProfileImage::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(Login::class, 'user_id', 'id');
    }

    public function following(): BelongsToMany
    {
        return $this->belongsToMany(Login::class, 'follows', 'user_id', 'following_user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(Login::class, 'follows', 'following_user_id', 'user_id');
    }

    protected $appends = ['myFollowers_count', 'myFollowings_count'];

    public function getMyFollowersCountAttribute()
    {
        return $this->followers()->count();
    }

    public function getMyFollowingsCountAttribute()
    {
        return $this->following()->count();
    }

    public function myStatuses()
    {
        return $this->hasMany(Status::class, 'user_id', 'id');
    }

    public function approvedOrdersCount()
    {
        return $this->products()->where('status', 'disetujui')->count();
    }

    // Metode untuk menghitung jumlah produk dengan status 'ditolak'
    public function rejectedOrdersCount()
    {
        return $this->products()->where('status', 'ditolak')->count();
    }

    // Ganti nama relasi dan model sesuai dengan struktur aplikasi Anda
    public function products()
    {
        return $this->hasMany(Product::class, 'user_id');
    }

    // Metode untuk menghitung jumlah pesanan yang belum dibaca
    public function unreadOrdersCount()
    {
        return $this->products()->where('status', 'unread')->count();
    }
}