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

    //Atributos de la clase
    protected $fillable = [
        'name',
        'description',
        'type',
        'image',
        'url',
        'user_id'
    ];

    //Retorna el usuario al que pertenezca la publicación
    public function post_owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Retorna un arreglo de likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    //Valida si tiene o no el like del usuario con el id x
    public function is_liked()
    {
        return $this->likes->contains('user_id', auth()->user());
    }

    //Retorna un arreglo de comentarios
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
