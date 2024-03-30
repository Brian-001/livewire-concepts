# Learning Livewire from scratch
## Steps
>Start by installing laravel new app as follows: <br>
```Composer require laravel/laravel livewire-concepts ``` <br>
>Install livewire
```Composer require livewire/livewire``` <br>
>Include ```@livewireStyles``` inside head tag and ```@livewireScripts``` in body tags near closing body tag.

>Create your first livewire component using 
``` php artisan make:livewire hello-world ``` <br>
>The above command creates two files namely: <br>
1. Livewire Component in ``` app/Livewire/HelloWorld.php ```
2. Livewire Component's view in  ``` resources/views/livewire/hello-world.blade.php ```

>In HelloWorld.php, create a property ie, <br>
```public $name ``` <br> ```public function render()``` is used to to render component's blade view
>Lastly, in index.blade.php call the blade component ie,
``` @livewire('hello-world) ``` <br>
Thats it! You have created your first livewire component successfully.

### Todos Component
In this component ```wire:submit``` is used to listen to either to submit button or when the user hits Enter upon typing completion.

