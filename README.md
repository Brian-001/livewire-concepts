# <h1 style = "color:red;" >Learning Livewire from scratch<h1>

Livewire is a full-stack framework for Laravel that allows you to build interactive web applications using PHP, without the need for writing JavaScript.

### Steps

> Start by installing laravel new app as follows: <br>
> `Composer require laravel/laravel livewire-concepts ` <br>
> Install livewire
> `Composer require livewire/livewire` <br>
> Include `@livewireStyles` inside head tag and `@livewireScripts` in body tags near closing body tag.

> Create your first livewire component using
> `php artisan make:livewire hello-world` <br>
> The above command creates two files namely: <br>

1. Livewire Component in `app/Livewire/HelloWorld.php`
2. Livewire Component's view in `resources/views/livewire/hello-world.blade.php`

> In HelloWorld.php, create a property ie, <br>
> `public $name ` <br> `public function render()` is used to to render component's blade view
> Lastly, in index.blade.php call the blade component ie,
> `@livewire('hello-world)` <br>
> Thats it! You have created your first livewire component successfully.

### Todos Component

In this component `wire:submit` is used to listen to either to submit button or when the user hits Enter upon typing completion. ie

```html
<div>
    <form wire:submit="add">
        <input type="text" wire:model="todo">
        <button type="submit">Add</button>
    </form>
    @foreach ($todos as $todo )
    <li>{{ $todo }}</li>
    @endforeach
</div>
```

## Lifecycle Hooks

Lifecycle hooks are methods that are automatically called at different stages of a component's lifecycle. These hooks allow you to execute code at specific points during the component's lifecycle, such as when it is mounted, updated, or removed from the <strong>DOM</strong>.

DOM stands for Document Object Model. It is a programming interface for web documents. In simple terms, the DOM represents the structure of an HTML or XML document as a tree-like structure where each node represents a part of the document, such as elements, attributes, and text.

**Main purposes of DOM**

Structured Representation: DOM provides a structured representation of the document, making it possible for programs to dynamically access and modify the content, structure, and style of web documents.

Platform-Neutral Interface: DOM provides a platform-neutral interface that allows scripts to access and manipulate the content, structure, and style of documents in a consistent and predictable way, regardless of the platform or programming language used.

Dynamic Interaction: DOM enables dynamic interaction with web documents, allowing scripts to respond to user actions, modify the document structure and content dynamically, and create interactive web applications.

Scripting Access: DOM provides a way for scripts (e.g., JavaScript) to access and manipulate the elements of a web document, such as adding or removing elements, changing element attributes and styles, and responding to events triggered by user actions.

Document Manipulation: DOM allows scripts to create, modify, and delete elements and attributes within a web document, enabling dynamic generation of content, updating of user interfaces, and manipulation of document structure.

Event Handling: DOM provides event handling mechanisms that allow scripts to respond to various events triggered by user actions, such as clicks, mouse movements, keyboard input, and form submissions.

LifeCycle Hook availablein Livewire

>```mount()``` This method is called when a Livewire component is first initialized and mounted in the DOM. It is often used to perform initialization tasks, such as fetching initial data.
ie

```php
class MyComponent extends Component
{
    public function mount()
    {
        // Perform initialization tasks
        $this->data = SomeModel::all();
    }
}
```

>```hydrate()``` This method is called when Livewire rehydrates a component after a page reload. It is useful for performing tasks that need to be executed on every page load. ie

```php
class MyComponent extends Component
{
    public function hydrate()
    {
        // Perform tasks after component is rehydrated
    }
}
```

>``` updated() ``` This method is called after Livewire updates the component's data properties. It is often used to perform actions in response to changes in data.
ie

 ```php
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
```

`render()` This method is responsible for rendering the component's view. It is called whenever the component needs to be rendered or re-rendered.
ie

```php
class MyComponent extends Component
{
    public $name = 'John'
    public function render()
    {
        return view('livewire.my-component', [
            'greeting' => 'Hello, ' . $this->name . '!',
        ]);
    }
}
```

>`updatingX()` `updatedX()` Livewire also provides lifecycle hooks specifically for handling updates to individual data properties, where X represents the name of the property.

```php

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
```

### How to generate livewire layout

``` php artisan livewire:layout ```
<br>
This will generate a file in this path ```resources/views/components/layouts/app.blade.php```
<br>

### Faker & Factory

<strong>Factories</strong> are used to define the structure of your model's fake data, while <strong>seeders</strong> are used to populate your database with that fake data. ie

**PostFactory**

```php
    <?php
    namespace Database\Factories;
    use App\Models\Post;
    use Illuminate\Database\Eloquent\Factories\Factory;
    /**
     * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
     */
    class PostFactory extends Factory
    {
        protected $model = Post::class;
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
            return [
                //
                'title' => $this->faker->sentence,
                'content' => $this->faker->paragraph,
            ];
        }
    }
  ```

**PostsSeeder**

```php
    <?php
    namespace Database\Seeders;
    use App\Models\Post;
    use Illuminate\Database\Seeder;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    class PostsSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            Post::factory(10)->create();
        }
    }
```

### Foreach Loop in Livewire

Anytime, you are using foreach loop, kindly ensure you ```insert keys```  inside items in the loop. These keys ansures that livewire can be able to re-order, search, filter items efficiently.
ie

```php
    @foreach ($posts as $post )
        <tr wire:key="{{$post->id}}">
            <td class="px-4 py-2">{{ $post->title }}</td>
            <!-- truncate word length to 8 words -->
            <td class="px-4 py-2">{{ str($post->content)->words(8) }}</td>
            <td class="px-4 py-2 inline-flex">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mr-2">Edit</button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" type="button" wire:click="delete({{ $post->id }})" wire:confirm="Are you sure you want to delete this post?">
                    Delete
                </button>
            </td>
        </tr>
    @endforeach
```

<h2 Livewire Nesting style="color:red">Livewire Nesting</h2>

This happens when you have a parent component and a child component. The child component is nested in a parent component.

**Parent component's view (showposts.blade.php)**

```php
    @foreach ($posts as $post )
        <tr wire:key="{{$post->id}}">
            <td>{{ $post->title }}</td>
            <!-- truncate word length to 8 words -->
            <td>{{ str($post->content)->words(8) }}</td>
            <td>
                <button type="button" wire:click="delete({{ $post->id }})" wire:confirm="Are you sure you want to delete this post?">
                    Delete
                </button>
            </td>
        </tr>
    @endforeach
```
**How to reference a component inside another component**

```php
<livewire:post-row>
```
>Extract contents (tr) of parent component and copy paste them in the childs component. So, the parent component will be like:

**showposts.blade.php**

```php
    @foreach ($posts as $post )
       <livewire:post-row> 
    @endforeach
```
**post-row.blade.php**

```php
    <tr wire:key="{{$post->id}}">
        <td>{{ $post->title }}</td>
        <!-- truncate word length to 8 words -->
        <td>{{ str($post->content)->words(8) }}</td>
        <td>
            <button type="button" wire:click="delete({{ $post->id }})" wire:confirm="Are you sure you want to delete this post?">
                Delete
            </button>
        </td>
    </tr>
```
If you run the following code you will run into an error simply because we are referencing `post` in our nested component which is `post-row.blade.php`. It doesn't exists and it is not a property and of our nested component.

⚠️ Warning: 
<p style="color:yellow;">Undefined variable $post</p>

To curb this, modify the reference to look like this:

**showposts.blade.php**

```php
    @foreach ($posts as $post )
       <livewire:post-row :key="$post->id" :$post> 
    @endforeach
```
Colon passes the variable post whereas if the colon is left out, it passes a sting $post

Adding `wire:key="{{ $post->id }}"` or the shorthand :`key="$post->id"` enables livewire to re-order items in case anything changes.

In case 
