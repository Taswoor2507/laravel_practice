<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-rose-50 text-rose-950">

<header class="border-b border-rose-200 bg-white/80 backdrop-blur">
    <div class="mx-auto max-w-5xl px-4 py-3">
        <div class="flex items-center justify-between gap-4">
            <a href="/" class="font-semibold tracking-tight text-rose-950">Todo App</a>

            <nav class="flex items-center gap-2">
                @auth
                    <a href="/todos" class="rounded-md px-3 py-2 text-sm font-medium text-rose-800 hover:bg-rose-100 hover:text-rose-950">My Todos</a>

                    @if(auth()->user()->isAdmin())
                        <a href="/admin/todos" class="rounded-md px-3 py-2 text-sm font-medium text-rose-800 hover:bg-rose-100 hover:text-rose-950">Admin</a>
                    @endif

                    <div class="hidden sm:block h-6 w-px bg-rose-200"></div>

                    <div class="hidden sm:flex items-center gap-2">
                        <span class="text-sm text-rose-700">{{ auth()->user()->name }}</span>
                        <span class="inline-flex items-center rounded-full bg-rose-100 px-2 py-0.5 text-xs font-medium text-rose-800 ring-1 ring-rose-600/10">{{ auth()->user()->role ?? 'user' }}</span>
                    </div>

                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="rounded-md bg-rose-600 px-3 py-2 text-sm font-medium text-white hover:bg-rose-700">Logout</button>
                    </form>
                @endauth

                @guest
                    <a href="/login" class="rounded-md px-3 py-2 text-sm font-medium text-rose-800 hover:bg-rose-100 hover:text-rose-950">Login</a>
                    <a href="/register" class="rounded-md bg-rose-600 px-3 py-2 text-sm font-medium text-white hover:bg-rose-700">Register</a>
                @endguest
            </nav>
        </div>
    </div>
</header>

<main class="mx-auto max-w-5xl px-4 py-8">
    @yield('content')
</main>

</body>
</html>
