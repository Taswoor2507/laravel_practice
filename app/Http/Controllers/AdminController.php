<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Carbon\Carbon;


class AdminController extends Controller
{
    // Show all users with their todos count as cards
    public function allTodos(){
        $users = User::withCount('todos')->get();
        
        // Get recent todos from the last 10 minutes
        $recentTodos = Todo::with('user')
            ->where('created_at', '>=', Carbon::now()->subMinutes(10))
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('admin.todos' , compact("users", "recentTodos"));
    }

    // Show specific user's todos in table format
    public function userTodos($userId){
        $user = User::with('todos')->findOrFail($userId);
        return view('admin.user-todos', compact('user'));
    }
}
