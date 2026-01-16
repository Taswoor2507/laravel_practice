<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{

    //   get user todos
      public function index(){
        $todos=Todo::where('user_id' , Auth::id())->get();
        return view("todos.index" , compact('todos'));
      }

    // add todos

      public function store(Request $request){
        Todo::create([
         'title'=>$request->input('title'),
         'user_id'=>Auth::id()
        ]);
        return back();
      }

      


}
