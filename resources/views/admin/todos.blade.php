@extends('layout.app')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex flex-col gap-1">
        <h1 class="text-2xl font-semibold tracking-tight text-rose-950">Admin: All Todos</h1>
        <p class="text-sm text-rose-700">A quick overview of everyone’s tasks.</p>
    </div>

    <div class="overflow-hidden rounded-xl border border-rose-200 bg-white shadow-sm">
        <div class="border-b border-rose-200 px-5 py-4">
            <h2 class="text-sm font-semibold text-rose-950">Todos</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-rose-200">
                <thead class="bg-rose-50">
                    <tr>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-rose-700">User</th>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-rose-700">Email</th>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-rose-700">Todo</th>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-rose-700">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-rose-100 bg-white">
                    @foreach($todos as $todo)
                        <tr class="hover:bg-rose-50/60">
                            <td class="whitespace-nowrap px-5 py-4 text-sm font-medium text-rose-950">
                                {{ $todo->user->name }}
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-sm text-rose-700">
                                {{ $todo->user->email }}
                            </td>
                            <td class="px-5 py-4 text-sm text-rose-950">
                                {{ $todo->title }}
                            </td>
                            <td class="whitespace-nowrap px-5 py-4">
                                <span class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium {{ $todo->completed ? 'bg-rose-50 text-rose-700 ring-1 ring-rose-600/20' : 'bg-fuchsia-50 text-fuchsia-700 ring-1 ring-fuchsia-600/20' }}">
                                    {{ $todo->completed ? 'Done' : 'Pending' }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
