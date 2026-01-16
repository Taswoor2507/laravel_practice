@extends('layout.app')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex flex-col gap-1">
        <h1 class="text-2xl font-semibold tracking-tight text-rose-950">Admin: User Overview</h1>
        <p class="text-sm text-rose-700">Click on any user card to view their todos.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @foreach($users as $user)
            <a href="{{ route('admin.user.todos', $user->id) }}" 
               class="block p-6 bg-white rounded-xl border border-rose-200 shadow-sm hover:shadow-md hover:border-rose-300 transition-all duration-200 hover:scale-[1.02]">
                <div class="flex flex-col gap-3">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-rose-100 rounded-full flex items-center justify-center">
                            <span class="text-rose-600 font-semibold text-lg">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-rose-950 truncate">
                                {{ $user->name }}
                            </h3>
                            <p class="text-sm text-rose-600 truncate">
                                {{ $user->email }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between pt-2 border-t border-rose-100">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                            <span class="text-sm font-medium text-rose-700">
                                {{ $user->todos_count }} {{ $user->todos_count == 1 ? 'Todo' : 'Todos' }}
                            </span>
                        </div>
                        
                        <div class="flex items-center gap-1">
                            @if($user->role === 'admin')
                                <span class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium bg-rose-50 text-rose-700 ring-1 ring-rose-600/20">
                                    Admin
                                </span>
                            @else
                                <span class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium bg-fuchsia-50 text-fuchsia-700 ring-1 ring-fuchsia-600/20">
                                    User
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    @if($users->isEmpty())
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-rose-900">No users found</h3>
            <p class="mt-1 text-sm text-rose-500">Get started by creating some users.</p>
        </div>
    @endif
</div>
@endsection
