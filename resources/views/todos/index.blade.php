@extends('layout.app')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-rose-950">My Todos</h1>
            <p class="mt-1 text-sm text-rose-700">Stay on top of your tasks.</p>
        </div>
    </div>

    <div class="rounded-xl border border-rose-200 bg-white shadow-sm">
        <div class="border-b border-rose-200 px-5 py-4">
            <h2 class="text-sm font-semibold text-rose-950">Add a new todo</h2>
        </div>

        <div class="p-5">
            <form method="POST" action="/todos" class="flex flex-col gap-3 sm:flex-row sm:items-center">
                @csrf
                <div class="flex-1">
                    <label class="sr-only" for="title">Title</label>
                    <input
                        id="title"
                        type="text"
                        name="title"
                        placeholder="What do you want to get done?"
                        required
                        class="w-full rounded-lg border border-rose-200 bg-white px-3 py-2 text-sm text-rose-950 placeholder:text-rose-300 shadow-sm focus:border-rose-600 focus:ring-2 focus:ring-rose-600/20"
                    >
                </div>
                <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-rose-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-rose-700">
                    Add todo
                </button>
            </form>
        </div>
    </div>

    <div class="rounded-xl border border-rose-200 bg-white shadow-sm">
        <div class="border-b border-rose-200 px-5 py-4">
            <h2 class="text-sm font-semibold text-rose-950">Your list</h2>
        </div>

        <div class="p-2">
            <ul class="divide-y divide-rose-100">
                @foreach($todos as $todo)
                    <li class="flex items-center justify-between gap-3 px-3 py-3 sm:px-4">
                        <div class="min-w-0">
                            <p class="truncate text-sm font-medium text-rose-950">
                                {{ $todo->title }}
                            </p>
                            <p class="mt-1 text-xs text-rose-700">
                                {{ $todo->completed ? 'Completed' : 'Pending' }}
                            </p>
                        </div>

                        <span class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium {{ $todo->completed ? 'bg-rose-50 text-rose-700 ring-1 ring-rose-600/20' : 'bg-fuchsia-50 text-fuchsia-700 ring-1 ring-fuchsia-600/20' }}">
                            {{ $todo->completed ? 'Done' : 'Todo' }}
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
