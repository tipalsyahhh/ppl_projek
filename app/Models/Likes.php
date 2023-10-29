<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;
    protected $table = 'likes';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'comentar', 'like', 'created_at', 'status_id'];

    public function user()
    {
        return $this->belongsTo(Login::class, 'user_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public static function addLike($user_id)
    {
        return Likes::create([
            'user_id' => $user_id,
            'like' => 1,
        ]);
    }

    public static function addComment($user_id)
    {
        return Likes::create([
            'user_id' => $user_id,
            'comentar' => 1,
        ]);
    }
}