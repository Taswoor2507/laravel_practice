@extends('layout.app')

@section('content')
<div class="flex flex-col gap-4 sm:gap-6">
    <div class="flex flex-col gap-2 sm:gap-3">
        <h1 class="text-xl sm:text-2xl font-semibold tracking-tight text-rose-950">Admin: User Overview</h1>
        <p class="text-sm text-rose-700">Click on any user card to view their todos.</p>
    </div>

    <!-- Recent Todos Section -->
    @if($recentTodos->isNotEmpty())
        <div class="overflow-hidden rounded-xl border border-rose-200 bg-white shadow-sm">
            <div class="border-b border-rose-200 px-4 sm:px-5 py-3 sm:py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h2 class="text-sm font-semibold text-rose-950">Recent Todos (Last 10 minutes)</h2>
                    </div>
                    <span class="inline-flex items-center rounded-full px-2 py-0.5 sm:py-1 text-xs font-medium bg-rose-50 text-rose-700 ring-1 ring-rose-600/20">
                        {{ $recentTodos->count() }} {{ $recentTodos->count() == 1 ? 'Todo' : 'Todos' }}
                    </span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-rose-200">
                    <thead class="bg-rose-50">
                        <tr>
                            <th scope="col" class="px-3 sm:px-5 py-2 sm:py-3 text-left text-xs font-semibold uppercase tracking-wide text-rose-700">
                                <span class="hidden sm:inline">User</span>
                                <span class="sm:hidden">Name</span>
                            </th>
                            <th scope="col" class="px-3 sm:px-5 py-2 sm:py-3 text-left text-xs font-semibold uppercase tracking-wide text-rose-700">Todo</th>
                            <th scope="col" class="px-3 sm:px-5 py-2 sm:py-3 text-left text-xs font-semibold uppercase tracking-wide text-rose-700">
                                <span class="hidden sm:inline">Status</span>
                                <span class="sm:hidden">State</span>
                            </th>
                            <th scope="col" class="hidden sm:table-cell px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-rose-700">Added</th>
                            <th scope="col" class="text-center px-3 sm:px-5 py-2 sm:py-3 text-xs font-semibold uppercase tracking-wide text-rose-700">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-rose-100 bg-white">
                        @foreach($recentTodos as $todo)
                            <tr class="hover:bg-rose-50/60">
                                <td class="px-3 sm:px-5 py-3 sm:py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 sm:w-8 sm:h-8 bg-rose-100 rounded-full flex items-center justify-center flex-shrink-0">
                                            <span class="text-rose-600 font-semibold text-xs sm:text-sm">
                                                {{ strtoupper(substr($todo->user->name, 0, 1)) }}
                                            </span>
                                        </div>
                                        <div class="min-w-0">
                                            <div class="text-sm font-medium text-rose-950 truncate">{{ $todo->user->name }}</div>
                                            <div class="hidden sm:block text-xs text-rose-600 truncate">{{ $todo->user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 sm:px-5 py-3 sm:py-4 text-sm text-rose-950">
                                    <div class="max-w-xs sm:max-w-md">
                                        <span class="block truncate">{{ $todo->title }}</span>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-3 sm:px-5 py-3 sm:py-4">
                                    <span class="inline-flex items-center rounded-full px-2 py-0.5 sm:py-1 text-xs font-medium {{ $todo->completed ? 'bg-rose-50 text-rose-700 ring-1 ring-rose-600/20' : 'bg-fuchsia-50 text-fuchsia-700 ring-1 ring-fuchsia-600/20' }}">
                                        {{ $todo->completed ? 'Done' : 'Pending' }}
                                    </span>
                                </td>
                                <td class="hidden sm:table-cell whitespace-nowrap px-5 py-4 text-sm text-rose-700">
                                    <span class="hidden lg:inline">{{ $todo->created_at->diffForHumans() }}</span>
                                    <span class="lg:hidden">{{ $todo->created_at->format('H:i') }}</span>
                                </td>
                                <td class="text-center px-3 sm:px-5 py-3 sm:py-4">
                                    <a href="{{ route('admin.user.todos', $todo->user_id) }}" 
                                       class="inline-flex items-center justify-center w-8 h-8 rounded-md bg-rose-100 text-rose-700 hover:bg-rose-200 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <!-- User Cards Section -->
    <div class="flex flex-col gap-3">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <h2 class="text-lg font-semibold text-rose-950">All Users</h2>
        </div>

        <div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-4">
            @foreach($users as $user)
                <a href="{{ route('admin.user.todos', $user->id) }}" 
                   class="block p-4 sm:p-6 bg-white rounded-xl border border-rose-200 shadow-sm hover:shadow-md hover:border-rose-300 transition-all duration-200 hover:scale-[1.02]">
                    <div class="flex flex-col gap-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-rose-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-rose-600 font-semibold text-sm sm:text-lg">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-rose-950 truncate text-sm sm:text-base">
                                    {{ $user->name }}
                                </h3>
                                <p class="text-xs sm:text-sm text-rose-600 truncate">
                                    {{ $user->email }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 pt-2 border-t border-rose-100">
                            <div class="flex items-center gap-2">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 text-rose-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                </svg>
                                <span class="text-xs sm:text-sm font-medium text-rose-700">
                                    {{ $user->todos_count }} {{ $user->todos_count == 1 ? 'Todo' : 'Todos' }}
                                </span>
                            </div>
                            
                            <div class="flex items-center gap-1">
                                @if($user->role === 'admin')
                                    <span class="inline-flex items-center rounded-full px-2 py-0.5 sm:py-1 text-xs font-medium bg-rose-50 text-rose-700 ring-1 ring-rose-600/20">
                                        Admin
                                    </span>
                                @else
                                    <span class="inline-flex items-center rounded-full px-2 py-0.5 sm:py-1 text-xs font-medium bg-fuchsia-50 text-fuchsia-700 ring-1 ring-fuchsia-600/20">
                                        User
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    @if($users->isEmpty())
        <div class="text-center py-8 sm:py-12">
            <svg class="mx-auto h-10 w-10 sm:h-12 sm:w-12 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-rose-900">No users found</h3>
            <p class="mt-1 text-sm text-rose-500">Get started by creating some users.</p>
        </div>
    @endif
</div>
@endsection
