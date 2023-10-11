<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
}