# Learning Livewire from scratch

Livewire is a full-stack framework for Laravel that allows you to build interactive web applications using PHP, without the need for writing JavaScript.
### Steps
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
In this component ```wire:submit``` is used to listen to either to submit button or when the user hits Enter upon typing completion. ie
 
        <div>
            <form wire:submit="add">
                <input type="text" wire:model="todo">
                <button type="submit">Add</button>
            </form>
            @foreach ($todos as $todo )
            <li>{{ $todo }}</li>
            @endforeach
        </div>

## Lifecycle Hooks
Lifecycle hooks are methods that are automatically called at different stages of a component's lifecycle. These hooks allow you to execute code at specific points during the component's lifecycle, such as when it is mounted, updated, or removed from the <strong>DOM</strong>. <br>
<b>
<br>
DOM stands for Document Object Model. It is a programming interface for web documents. In simple terms, the DOM represents the structure of an HTML or XML document as a tree-like structure where each node represents a part of the document, such as elements, attributes, and text.
<br>
Main purposes of DOM

Structured Representation: DOM provides a structured representation of the document, making it possible for programs to dynamically access and modify the content, structure, and style of web documents.

Platform-Neutral Interface: DOM provides a platform-neutral interface that allows scripts to access and manipulate the content, structure, and style of documents in a consistent and predictable way, regardless of the platform or programming language used.

Dynamic Interaction: DOM enables dynamic interaction with web documents, allowing scripts to respond to user actions, modify the document structure and content dynamically, and create interactive web applications.

Scripting Access: DOM provides a way for scripts (e.g., JavaScript) to access and manipulate the elements of a web document, such as adding or removing elements, changing element attributes and styles, and responding to events triggered by user actions.

Document Manipulation: DOM allows scripts to create, modify, and delete elements and attributes within a web document, enabling dynamic generation of content, updating of user interfaces, and manipulation of document structure.

Event Handling: DOM provides event handling mechanisms that allow scripts to respond to various events triggered by user actions, such as clicks, mouse movements, keyboard input, and form submissions.

LifeCycle Hook availablein Livewire
>```mount()``` This method is called when a Livewire component is first initialized and mounted in the DOM. It is often used to perform initialization tasks, such as fetching initial data.
ie

    class MyComponent extends Component
    {
        public function mount()
        {
            // Perform initialization tasks
            $this->data = SomeModel::all();
        }
    }

>```hydrate()``` This method is called when Livewire rehydrates a component after a page reload. It is useful for performing tasks that need to be executed on every page load. ie

        class MyComponent extends Component
        {
            public function hydrate()
            {
                // Perform tasks after component is rehydrated
            }
        }
>``` updated() ``` This method is called after Livewire updates the component's data properties. It is often used to perform actions in response to changes in data.
ie

        class MyComponent extends Component
        {
            public $count = 0;

            public function increment()
            {
                $this->count++;
            }

            public function updated($propertyName)
            {
                if ($propertyName === 'count') {
                    // Perform actions after 'count' property is updated
                }
            }
        }

>```render()``` This method is responsible for rendering the component's view. It is called whenever the component needs to be rendered or re-rendered.
ie

        class MyComponent extends Component
        {
            public $name = 'John';

            public function render()
            {
                return view('livewire.my-component', [
                    'greeting' => 'Hello, ' . $this->name . '!',
                ]);
            }
        }

>``` updatingX() ``` ``` updatedX() ``` Livewire also provides lifecycle hooks specifically for handling updates to individual data properties, where X represents the name of the property.

        class MyComponent extends Component
        {
            public $name;

            protected $listeners = ['nameUpdated'];

            public function nameUpdated($value)
            {
                $this->name = $value;
            }

            public function updatingName($value)
            {
                // Perform actions before 'name' property is updated
            }

            public function updatedName($value)
            {
                // Perform actions after 'name' property is updated
            }
        }


