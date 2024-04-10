<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create Posts')]
class CreatePost extends Component
{
    #[Rule('required', message: 'Yo, Add a title')]
    public $title = '';

    #[Rule('required', message: 'Yo, Add content')]
    public $content = '';

    public function save()
    {
        $this->validate();
        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->redirect('/showposts', navigate:true);
    }
    
    //Method to clear all the fields
    public function clearFields()
    {
        $this->title = '';
        $this->content = '';
    }
    public function render()
    {
        return view('livewire.create-post');
    }
}
