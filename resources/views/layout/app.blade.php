<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<nav>
    @auth
        <a href="/todos">My Todos</a>

        @if(auth()->user()->isAdmin())
            | <a href="/admin/todos">Admin Todos</a>
        @endif

        | <form action="/logout" method="POST" style="display:inline">
            @csrf
            <button type="submit">Logout</button>
          </form>
    @endauth

    @guest
        <a href="/login">Login</a> |
        <a href="/register">Register</a>
    @endguest
</nav>

<hr>

@yield('content')

</body>
</html>
