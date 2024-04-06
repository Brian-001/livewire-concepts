<div class="flex items-center justify-center min-h-screen">
    <div x-data="{ count: 0 }">
        <span x-text="count"></span>
        <button x-on:click="count++" class="py-2 px-4 bg-blue-500 text-white rounded-lg focus:outline-none hover:bg-blue-600" >+</button>
    </div>
    <div class=" max-w-md w-full bg-white p-6 rounded-lg shadow-md">
            <input wire:model.live="name" type="text" class="border border-gray-300 outline-none text-xl px-4 py-2 rounded-lg w-full mb-4" placeholder="Enter your name">
            <p class="text-lg text-center mb-4">Hello <span class="font-bold">{{ $name }}</span></p>
    </div>
</div>
