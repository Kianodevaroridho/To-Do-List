<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    public function index()
    {
        $todos = TodoList::where('user_id', Auth::id())->get();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('todos.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $todoList = TodoList::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($request->categories) {
            $todoList->categories()->sync($request->categories);
        }

        return redirect()->route('todos.index');
    }

    
    public function edit(TodoList $todo)
    {
        $categories = Category::all();
        return view('todos.edit', compact('todo', 'categories'));
    }

    
    public function update(Request $request, TodoList $todo)
    {
        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_done' => $request->has('is_done'),
        ]);

        if ($request->categories) {
            $todo->categories()->sync($request->categories);
        }

        return redirect()->route('todos.index');
    }

    public function destroy(TodoList $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index');
    }
}
