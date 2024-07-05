<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TodoList;
use App\Models\Todo;

class TodoListController extends Controller
{
    public function index(){
        $todos = Todo::get();
        $todolists = TodoList::join('todos', 'todos.id', '=', 'todo_lists.todo_id')
        ->join('users', 'users.id', '=', 'todo_lists.user_id')->get();
        // dd($todolists);
        return view('todolist.todolist', compact('todolists', 'todos'));
    }

    public function store(Request $request){
        $value = [
            'todo_id' => $request->todo_id,
            'user_id' => Auth::user()->id,
            'day' => $request->day,
            'status' => $request->status,
            'todo_date' => $request->todo_date,
        ];

        TodoList::create($value);
        return redirect('todolist');
    }
}
