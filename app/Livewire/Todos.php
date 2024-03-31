<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Todos App')]
class Todos extends Component
{
    public $todo = '';
    public $todos = [
        'Take out trash',
        'Wash dishes'
    ];

    public function add()
    {
        //Adds items in the array list
        $this->todos[] = $this->todo;

        //Resets input field back to empty string after submitting typed data
        $this->reset('todo');
    }
    public function render()
    {
        return view('livewire.todos');
    }
}
