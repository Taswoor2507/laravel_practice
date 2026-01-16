@extends('layout.app')

@section('content')
<div class="mx-auto flex w-full max-w-md flex-col gap-6">
    <div>
        <h1 class="text-2xl font-semibold tracking-tight text-rose-950">Create your account</h1>
        <p class="mt-1 text-sm text-rose-700">Sign up to start tracking todos.</p>
    </div>

    <div class="rounded-xl border border-rose-200 bg-white p-6 shadow-sm">
        <form method="POST" action="/register" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-rose-800">Name</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    placeholder="Your name"
                    required
                    class="mt-1 w-full rounded-lg border border-rose-200 bg-white px-3 py-2 text-sm text-rose-950 placeholder:text-rose-300 shadow-sm focus:border-rose-600 focus:ring-2 focus:ring-rose-600/20"
                >
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-rose-800">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    placeholder="you@example.com"
                    required
                    class="mt-1 w-full rounded-lg border border-rose-200 bg-white px-3 py-2 text-sm text-rose-950 placeholder:text-rose-300 shadow-sm focus:border-rose-600 focus:ring-2 focus:ring-rose-600/20"
                >
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-rose-800">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Create a strong password"
                    required
                    class="mt-1 w-full rounded-lg border border-rose-200 bg-white px-3 py-2 text-sm text-rose-950 placeholder:text-rose-300 shadow-sm focus:border-rose-600 focus:ring-2 focus:ring-rose-600/20"
                >
            </div>

            <button type="submit" class="inline-flex w-full items-center justify-center rounded-lg bg-rose-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-rose-700">
                Register
            </button>
        </form>

        @if($errors->any())
            <div class="mt-4 rounded-lg border border-rose-200 bg-rose-50 p-3">
                <ul class="space-y-1 text-sm text-rose-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <p class="mt-5 text-center text-sm text-rose-700">
            Already have an account?
            <a href="/login" class="font-semibold text-rose-950 hover:underline">Login</a>
        </p>
    </div>
</div>
@endsection
