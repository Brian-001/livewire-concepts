<div class="flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full bg-white p-6 rounded-lg shadow-md">
        <form wire:submit.prevent="add" class="flex items-center">
            <input type="text" wire:model="todo" class="border border-gray-300 outline-none text-xl px-4 py-2 rounded-lg w-full mr-2" placeholder="Enter todo">
            <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded-lg focus:outline-none hover:bg-blue-600">Add</button>
        </form>
        <ul class="mt-4">
            @foreach ($todos as $todo)
            <li class="mb-2">{{ $todo }}</li>
            @endforeach
        </ul>
    </div>
</div>
