<?php

namespace App\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public $name = '';

    public function render()
    {
        return view('livewire.hello-world');
    }
}
