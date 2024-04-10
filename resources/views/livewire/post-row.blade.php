<tr @class(['archived'=> $post->is_archived])>
    <td class="px-4 py-2">{{ $post->title }}</td>
    <!-- truncate word length to 8 words -->
    <td class="px-4 py-2">{{ str($post->content)->words(8) }}</td>
    <td class="px-4 py-2 inline-flex">
        @unless ($post->is_archived)
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2" type="button" wire:click="archive" wire:confirm="Are you sure you want to archive this post?">
                Archive
            </button>
        @endunless

        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" type="button" wire:click="$parent.delete({{ $post->id }})" wire:confirm="Are you sure you want to delete this post?">

            Delete
        </button>
    </td>
</tr>
