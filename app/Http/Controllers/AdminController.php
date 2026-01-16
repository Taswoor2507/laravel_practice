<?php

namespace App\Http\Controllers;

use App\Models\Todo;


class AdminController extends Controller
{
    //  get all todos 
    public function allTodos(){
        $todos = Todo::with('user')->get();
        return view('admin.todos' , compact("todos"));
    }
}
