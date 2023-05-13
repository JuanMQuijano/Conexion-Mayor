<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{
    use HasFactory;

    //Atributos de la clase
    protected $fillable = [
        'user_id',
        'post_id',
        'comentario'
    ];

    //Trae la información del usuario al que perteneza ésta publicación
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
