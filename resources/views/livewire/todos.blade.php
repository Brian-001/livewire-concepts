<div>
    <form wire:submit="add">
        <input type="text" wire:model="todo" class="border outline-none text-2xl py-2 px-4">
        <button type="submit" class="py-2 px-4 bg-slate-300 rounded-lg">Add</button>
    </form>
    @foreach ($todos as $todo )
    <li>{{ $todo }}</li>
    @endforeach
</div>
