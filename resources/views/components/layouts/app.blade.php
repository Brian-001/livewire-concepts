<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="grid grid-cols-1 md:grid-cols-3 h-screen">
        <!-- Sidebar -->
        <div class="col-span-1 md:col-span-1 bg-white border-r">
            <!-- Sidebar content goes here -->
            <div class="p-4">
                <h1 class="text-xl font-bold">Sidebar</h1>
                <nav class="mt-4">
                    <ul>
                        <!-- request()->is('/') checks if the current URL matches the root URL ("/"). If it does, it adds the bg-gray-200 class to the Home link -->
                        <li><a href="/" class="block py-2 px-4 text-gray-600  {{ request()->is('/') ? 'bg-gray-800 text-white' : '' }}">Todos</a></li>
                        <li><a href="/counter" class="block py-2 px-4 text-gray-600  {{ request()->is('counter') ? 'bg-gray-800 text-white' : '' }}">Counter</a></li>
                        <li><a href="/hello-world" class="block py-2 px-4 text-gray-600 {{ request()->is('hello-world') ? 'bg-gray-800 text-white' : '' }}">Hello</a></li>
                        <li><a href="/showposts" class="block py-2 px-4 text-gray-600 hover:bg-gray-200 {{ request()->is('showposts') ? 'bg-gray-800 text-white' : '' }}">Posts</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Content area -->
        <div class="col-span-1 md:col-span-2 p-8">
            <!-- Main content goes here -->
            {{ $slot }}
        </div>
    </div>
</body>

</html>
