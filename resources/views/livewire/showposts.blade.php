<div>
    <table class="table-auto border-collapse w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Content</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
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
            <!-- More rows can be added here -->
        </tbody>
    </table>
</div>
