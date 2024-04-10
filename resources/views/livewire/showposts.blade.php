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
                <livewire:post-row :key="$post->id" :$post>
            @endforeach
        </tbody>
    </table>
</div>
