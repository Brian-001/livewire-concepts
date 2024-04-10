<div class="flex justify-center items-center min-h-screen">
    <div class="max-w-md w-full bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl mb-6 text-center">Create Post</h2>

        Current text <span x-text="$wire.title"></span>
        <button wire:click="clearFields" class="py-2 px-4 bg-blue-500">Clear Fields</button>

        <form wire:submit.prevent="save">
            <div class="mb-4">
                <label for="title" class="block text-gray-600">Title</label>
                <input wire:model="title" type="text" name="title" id="title" class="border-2 border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:border-blue-400">
                @error('title')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-600">Content</label>
                <textarea wire:model="content" name="content" id="content" cols="30" rows="5" class="border-2 border-gray-300 rounded-lg px-4 py-2 w-full resize-none focus:outline-none focus:border-blue-400"></textarea>
                <small>Words
                    <span x-text="$wire.content.split(' ').length - 1"></span>
                </small>
                @error('content')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded-lg focus:outline-none hover:bg-blue-600">Save</button>
            </div>
        </form>
    </div>
</div>
