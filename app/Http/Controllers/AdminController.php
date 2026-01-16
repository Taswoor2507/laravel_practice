<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;


class AdminController extends Controller
{
    // Show all users with their todos count as cards
    public function allTodos(){
        $users = User::withCount('todos')->get();
        return view('admin.todos' , compact("users"));
    }

    // Show specific user's todos in table format
    public function userTodos($userId){
        $user = User::with('todos')->findOrFail($userId);
        return view('admin.user-todos', compact('user'));
    }
}
