@extends('layout.app')

@section('content')
<h2>Register</h2>

<form method="POST" action="/register">
    @csrf

    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>

    <button type="submit">Register</button>
</form>

@foreach ($errors->all() as $error)
    <p style="color:red">{{ $error }}</p>
@endforeach
@endsection
