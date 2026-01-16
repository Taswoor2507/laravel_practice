@extends('layout.app')

@section('content')
<h2>All Users Todos (Admin)</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>User</th>
        <th>Email</th>
        <th>Todo</th>
        <th>Status</th>
    </tr>

    @foreach($todos as $todo)
    <tr>
        <td>{{ $todo->user->name }}</td>
        <td>{{ $todo->user->email }}</td>
        <td>{{ $todo->title }}</td>
        <td>{{ $todo->completed ? 'Done' : 'Pending' }}</td>
    </tr>
    @endforeach
</table>
@endsection
