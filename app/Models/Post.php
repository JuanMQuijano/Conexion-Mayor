<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'image',
        'url',
        'user_id'
    ];

    public function post_owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function is_liked()
    {
        return $this->likes->contains('user_id', auth()->user());
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
