<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - EventApp</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-white shadow px-6 py-4 flex items-center justify-between">
        <a href="/" class="font-bold text-lg text-gray-800">EventApp</a>
        <div class="flex items-center gap-6">
            <a href="/" class="text-gray-600 hover:text-gray-900">Home</a>
            @auth
                <a href="/events" class="text-gray-600 hover:text-gray-900">Daftar Event</a>
                <a href="/dashboard" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                @if(auth()->user()->role === 'admin')
                    <a href="/admin/events" class="text-blue-600 font-medium hover:text-blue-800">Kelola Event</a>
                @endif
                <span class="text-gray-500 text-sm">{{ auth()->user()->name }}</span>
                <form method="POST" action="/logout" class="inline">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
                </form>
            @else
                <a href="/events" class="text-gray-600 hover:text-gray-900">Daftar Event</a>
                <a href="/login" class="text-gray-600 hover:text-gray-900">Login</a>
                <a href="/register" class="text-gray-600 hover:text-gray-900">Register</a>
            @endauth
        </div>
    </nav>

    <main class="container mx-auto px-6 py-8">
        @yield('content')
    </main>

</body>
</html>