<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comentario;
use Termwind\Components\Dd;

class Comentarios extends Component
{

    public $comentario;
    public $post;
    public $message;



    public function comentario()
    {

        $validate = $this->validate((['comentario' => 'required|min:2|max:255']));


        // dd($this->post->comentarios);
        $newComment = Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id,
            'comentario' => $this->comentario

        ]);
        $this->comentario = '';
        $this->post->comentarios[]   = $newComment;


        $this->message = 'Comentario Realizado Correctamente';
    }







    public function render()
    {
        return view('livewire.comentarios');
    }
}
