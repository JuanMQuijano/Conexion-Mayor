<?php

namespace App\Http\Livewire;

use Livewire\Component;

//Creamos un controlador e inicilizamos las variables que vamos a usar
class LikeComponent extends Component
{
    public $post;
    public $likes;
    public $is_liked;

    public function mount($post)
    {
        $this->likes = $post->likes->count();
        $this->is_liked = $post->is_liked();
    }

    //Creamos una función de like para verificar si la publicación act ya tiene like o no
    public function like()
    {
        //Si ya dio like lo va a eliminar
        if ($this->post->is_liked(auth()->user())) {
            //Eliminar los likes del id del usuario donde en la tabla de likes el valor de la columna post_id sea 
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->is_liked = false;
            $this->likes--;
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->is_liked = true;
            $this->likes++;
        }
    }

    //Renderizamos el componente
    public function render()
    {
        return view('livewire.like-component');
    }
}
