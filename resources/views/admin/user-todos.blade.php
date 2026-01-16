@extends('layout.app')

@section('content')
<div class="flex flex-col gap-4 sm:gap-6">
    <div class="flex flex-col gap-2 sm:gap-3">
        <div class="flex items-center gap-2 sm:gap-3">
            <a href="{{ route('admin.todos') }}" class="text-rose-600 hover:text-rose-700 transition-colors p-1 hover:bg-rose-50 rounded-md">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h1 class="text-lg sm:text-2xl font-semibold tracking-tight text-rose-950 truncate">
                {{ $user->name }}'s Todos
            </h1>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
            <p class="text-sm text-rose-700 truncate">
                {{ $user->email }}
            </p>
            <span class="hidden sm:inline text-rose-400">•</span>
            <p class="text-sm text-rose-700">
                {{ $user->todos->count() }} {{ $user->todos->count() == 1 ? 'todo' : 'todos' }}
            </p>
        </div>
    </div>

    <div class="overflow-hidden rounded-xl border border-rose-200 bg-white shadow-sm">
        <div class="border-b border-rose-200 px-4 sm:px-5 py-3 sm:py-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                <h2 class="text-sm font-semibold text-rose-950">Todo List</h2>
                <div class="flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center rounded-full px-2 py-0.5 sm:py-1 text-xs font-medium bg-rose-50 text-rose-700 ring-1 ring-rose-600/20">
                        {{ $user->todos->where('completed', false)->count() }} Pending
                    </span>
                    <span class="inline-flex items-center rounded-full px-2 py-0.5 sm:py-1 text-xs font-medium bg-fuchsia-50 text-fuchsia-700 ring-1 ring-fuchsia-600/20">
                        {{ $user->todos->where('completed', true)->count() }} Completed
                    </span>
                </div>
            </div>
        </div>

        @if($user->todos->isNotEmpty())
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-rose-200">
                    <thead class="bg-rose-50">
                        <tr>
                            <th scope="col" class="px-3 sm:px-5 py-2 sm:py-3 text-left text-xs font-semibold uppercase tracking-wide text-rose-700">
                                <span class="hidden sm:inline">Title</span>
                                <span class="sm:hidden">Todo</span>
                            </th>
                            <th scope="col" class="px-3 sm:px-5 py-2 sm:py-3 text-left text-xs font-semibold uppercase tracking-wide text-rose-700">
                                <span class="hidden sm:inline">Status</span>
                                <span class="sm:hidden">State</span>
                            </th>
                            <th scope="col" class="hidden sm:table-cell px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-rose-700">Created</th>
                            <th scope="col" class="hidden lg:table-cell px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-rose-700">Updated</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-rose-100 bg-white">
                        @foreach($user->todos as $todo)
                            <tr class="hover:bg-rose-50/60">
                                <td class="px-3 sm:px-5 py-3 sm:py-4 text-sm text-rose-950">
                                    <div class="max-w-xs sm:max-w-md lg:max-w-lg">
                                        <span class="block truncate">{{ $todo->title }}</span>
                                        <div class="sm:hidden mt-1 text-xs text-rose-600">
                                            {{ $todo->created_at->format('M j, Y') }}
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-3 sm:px-5 py-3 sm:py-4">
                                    <span class="inline-flex items-center rounded-full px-2 py-0.5 sm:py-1 text-xs font-medium {{ $todo->completed ? 'bg-rose-50 text-rose-700 ring-1 ring-rose-600/20' : 'bg-fuchsia-50 text-fuchsia-700 ring-1 ring-fuchsia-600/20' }}">
                                        {{ $todo->completed ? 'Done' : 'Pending' }}
                                    </span>
                                </td>
                                <td class="hidden sm:table-cell whitespace-nowrap px-5 py-4 text-sm text-rose-700">
                                    <span class="hidden lg:inline">{{ $todo->created_at->format('M j, Y g:i A') }}</span>
                                    <span class="lg:hidden">{{ $todo->created_at->format('M j, Y') }}</span>
                                </td>
                                <td class="hidden lg:table-cell whitespace-nowrap px-5 py-4 text-sm text-rose-700">
                                    {{ $todo->updated_at->format('M j, Y g:i A') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-8 sm:py-12">
                <svg class="mx-auto h-10 w-10 sm:h-12 sm:w-12 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-rose-900">No todos found</h3>
                <p class="mt-1 text-sm text-rose-500">{{ $user->name }} hasn't created any todos yet.</p>
            </div>
        @endif
    </div>
</div>
@endsection
