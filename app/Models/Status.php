<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['user_id', 'caption', 'image', 'created_at', 'comentar_id', 'like'];

    public function user()
    {
        return $this->belongsTo(Login::class, 'user_id', 'id');
    }

    public function likes()
    {
<<<<<<< HEAD
        return $this->hasMany(Likes::class, 'status_id', 'id');
=======
        return $this->hasMany(Likes::class, 'status_id', 'id')->where('like', 1);
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
    }
    
    public function comments()
    {
        return $this->hasMany(Likes::class, 'status_id', 'id')->where('comentar', 'text');
    }

    public function getLikesCountAttribute()
    {
        return $this->likes->count();
    }

    public function getCommentsCountAttribute()
    {
        return Likes::where('status_id', $this->id)->whereNotNull('comentar')->count();
    }
}