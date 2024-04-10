<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Posts')]
class Showposts extends Component
{
    public function delete(Post $post)
    {
        $post->delete();
    }
    public function render()
    {
        return view('livewire.showposts', [

            'posts' =>Post::all(),
        ]);
    }
}
