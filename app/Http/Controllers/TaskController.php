<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use App\Models\Priority;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    private function validateTaskRequest(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'priority_id' => 'required|exists:priorities,id',
            'due_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);
    }

    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())
                     ->with(['categories', 'priority'])
                     ->orderByRaw('CASE WHEN due_date IS NULL THEN 1 ELSE 0 END')
                     ->orderBy('due_date', 'asc')
                     ->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $categories = Category::all();
        $priorities = Priority::all();

        return view('tasks.create', compact('categories', 'priorities'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateTaskRequest($request);

        $task = Task::create([
            'user_id' => Auth::id(),
            'title' => $validatedData['title'],
            'description' => $request->description,
            'priority_id' => $validatedData['priority_id'],
            'due_date' => $request->due_date,
            'is_done' => false, 
        ]);

        if ($request->categories) {
            $task->categories()->sync($request->categories);
        }

        return redirect()->route('tasks.index')->with('success', 'Task berhasil ditambahkan!');
    }

    public function edit(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::all();
        $priorities = Priority::all();

        return view('tasks.edit', compact('task', 'categories', 'priorities'));
    }

    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $this->validateTaskRequest($request);
        
        $is_done = $request->has('is_done') ? true : false; 

        $task->update([
            'title' => $validatedData['title'],
            'description' => $request->description,
            'priority_id' => $validatedData['priority_id'],
            'due_date' => $request->due_date,
            'is_done' => $is_done,
        ]);

        $task->categories()->sync($request->categories ?? []);

        return redirect()->route('tasks.index')->with('success', 'Task berhasil diperbarui!');
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $task->categories()->sync([]); 
        
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task berhasil dihapus!');
    }
}