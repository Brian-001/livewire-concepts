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
                <tr>
                    <td class="px-4 py-2">John Doe</td>
                    <td class="px-4 py-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Suscipit ipsum labore numquam. Eaque, ratione mollitia voluptate provident
                        veniam soluta voluptatum minus doloribus quo dolorum magnam nobis
                        repudiandae asperiores ex ut?
                    </td>
                    <td class="px-4 py-2">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </td>
                </tr>
            @endforeach
            <!-- More rows can be added here -->
        </tbody>
    </table>
</div>
