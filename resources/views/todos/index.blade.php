@extends('layout.app')

@section('content')
<h2>My Todos</h2>

<form method="POST" action="/todos">
    @csrf
    <input type="text" name="title" placeholder="New Todo" required>
    <button type="submit">Add</button>
</form>

<ul>
@foreach($todos as $todo)
    <li>
        {{ $todo->title }}
        @if($todo->completed)
            ✔
        @endif
    </li>
@endforeach
</ul>
@endsection
