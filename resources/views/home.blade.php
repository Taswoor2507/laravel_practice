@extends('layout.app')

@section('content')
<div class="relative overflow-hidden rounded-2xl border border-rose-200 bg-white shadow-sm">
    <div class="absolute inset-0 bg-gradient-to-br from-rose-100 via-white to-fuchsia-100"></div>
    <div class="relative px-6 py-10 sm:px-10">
        <div class="flex flex-col gap-6">
            <div class="max-w-2xl">
                <p class="inline-flex items-center rounded-full bg-white/70 px-3 py-1 text-xs font-semibold text-rose-800 ring-1 ring-rose-600/10">Student-friendly • Trainer-ready</p>
                <h1 class="mt-4 text-3xl font-semibold tracking-tight text-rose-950 sm:text-4xl">Track learning tasks with a cute, simple Todo App</h1>
                <p class="mt-3 text-sm leading-6 text-rose-800 sm:text-base">
                    This app helps students plan their daily learning tasks and helps trainers review progress in one place.
                    Create todos, mark them as done, and stay consistent.
                </p>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row">
                @auth
                    <a href="/todos" class="inline-flex items-center justify-center rounded-lg bg-rose-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-rose-700">
                        Go to My Todos
                    </a>
                    @if(auth()->user()->isAdmin())
                        <a href="/admin/todos" class="inline-flex items-center justify-center rounded-lg bg-white px-5 py-3 text-sm font-semibold text-rose-700 ring-1 ring-rose-200 hover:bg-rose-50">
                            Open Admin Panel
                        </a>
                    @endif
                @endauth

                @guest
                    <a href="/register" class="inline-flex items-center justify-center rounded-lg bg-rose-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-rose-700">
                        Create Account
                    </a>
                    <a href="/login" class="inline-flex items-center justify-center rounded-lg bg-white px-5 py-3 text-sm font-semibold text-rose-700 ring-1 ring-rose-200 hover:bg-rose-50">
                        Login
                    </a>
                @endguest
            </div>
        </div>
    </div>
</div>

<div class="mt-10 grid gap-6 lg:grid-cols-3">
    <div class="rounded-2xl border border-rose-200 bg-white p-6 shadow-sm">
        <h2 class="text-base font-semibold text-rose-950">For students</h2>
        <p class="mt-2 text-sm leading-6 text-rose-800">Write a daily plan, focus on small goals, and build consistency.</p>
        <ul class="mt-4 space-y-2 text-sm text-rose-800">
            <li class="flex gap-2"><span class="mt-1 h-2 w-2 rounded-full bg-rose-400"></span><span>Add your learning todos</span></li>
            <li class="flex gap-2"><span class="mt-1 h-2 w-2 rounded-full bg-fuchsia-400"></span><span>Keep your list clean and organized</span></li>
            <li class="flex gap-2"><span class="mt-1 h-2 w-2 rounded-full bg-rose-400"></span><span>Mark tasks as done to stay motivated</span></li>
        </ul>
    </div>

    <div class="rounded-2xl border border-rose-200 bg-white p-6 shadow-sm">
        <h2 class="text-base font-semibold text-rose-950">For trainers</h2>
        <p class="mt-2 text-sm leading-6 text-rose-800">See everyone’s tasks (admin) and quickly understand who needs help.</p>
        <ul class="mt-4 space-y-2 text-sm text-rose-800">
            <li class="flex gap-2"><span class="mt-1 h-2 w-2 rounded-full bg-rose-400"></span><span>Open Admin Todos page</span></li>
            <li class="flex gap-2"><span class="mt-1 h-2 w-2 rounded-full bg-fuchsia-400"></span><span>Review pending vs completed work</span></li>
            <li class="flex gap-2"><span class="mt-1 h-2 w-2 rounded-full bg-rose-400"></span><span>Give feedback and next steps</span></li>
        </ul>
    </div>

    <div class="rounded-2xl border border-rose-200 bg-white p-6 shadow-sm">
        <h2 class="text-base font-semibold text-rose-950">Why it’s useful</h2>
        <p class="mt-2 text-sm leading-6 text-rose-800">Simple, fast, and built for daily practice — no distractions.</p>
        <div class="mt-4 grid gap-2">
            <div class="rounded-xl bg-rose-50 p-3 text-sm text-rose-800 ring-1 ring-rose-100">Clear daily learning plan</div>
            <div class="rounded-xl bg-fuchsia-50 p-3 text-sm text-fuchsia-800 ring-1 ring-fuchsia-100">Better accountability</div>
            <div class="rounded-xl bg-rose-50 p-3 text-sm text-rose-800 ring-1 ring-rose-100">Progress you can see</div>
        </div>
    </div>
</div>

<div class="mt-10 rounded-2xl border border-rose-200 bg-white p-6 shadow-sm">
    <div class="flex flex-col gap-2">
        <h2 class="text-lg font-semibold text-rose-950">How to use</h2>
        <p class="text-sm text-rose-800">A simple flow for both students and trainers.</p>
    </div>

    <div class="mt-6 grid gap-4 lg:grid-cols-4">
        <div class="rounded-xl border border-rose-200 bg-rose-50 p-4">
            <p class="text-xs font-semibold text-rose-700">Step 1</p>
            <p class="mt-1 text-sm font-semibold text-rose-950">Register / Login</p>
            <p class="mt-1 text-sm text-rose-800">Create your account and sign in.</p>
        </div>
        <div class="rounded-xl border border-rose-200 bg-white p-4">
            <p class="text-xs font-semibold text-rose-700">Step 2</p>
            <p class="mt-1 text-sm font-semibold text-rose-950">Add todos</p>
            <p class="mt-1 text-sm text-rose-800">Write tasks like “Practice arrays” or “Complete assignment”.</p>
        </div>
        <div class="rounded-xl border border-rose-200 bg-rose-50 p-4">
            <p class="text-xs font-semibold text-rose-700">Step 3</p>
            <p class="mt-1 text-sm font-semibold text-rose-950">Complete tasks</p>
            <p class="mt-1 text-sm text-rose-800">Mark tasks as done to build momentum.</p>
        </div>
        <div class="rounded-xl border border-rose-200 bg-white p-4">
            <p class="text-xs font-semibold text-rose-700">Step 4</p>
            <p class="mt-1 text-sm font-semibold text-rose-950">Admin review</p>
            <p class="mt-1 text-sm text-rose-800">Trainers review all users’ todos and guide them.</p>
        </div>
    </div>

    <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <p class="text-sm text-rose-800">Ready to start? Keep it simple: one todo at a time.</p>
        <div class="flex gap-3">
            @guest
                <a href="/register" class="rounded-lg bg-rose-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-rose-700">Get started</a>
                <a href="/login" class="rounded-lg bg-white px-4 py-2 text-sm font-semibold text-rose-700 ring-1 ring-rose-200 hover:bg-rose-50">Login</a>
            @endguest
            @auth
                <a href="/todos" class="rounded-lg bg-rose-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-rose-700">Open Todos</a>
            @endauth
        </div>
    </div>
</div>

<div class="mt-10 text-center text-xs text-rose-700">
    Built for practice and progress.
</div>
@endsection
