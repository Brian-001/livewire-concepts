<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Hello World')]
class HelloWorld extends Component
{
    public $name = '';

    public function render()
    {
        return view('livewire.hello-world');
    }
}
