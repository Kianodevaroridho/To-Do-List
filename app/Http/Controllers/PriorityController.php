<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function index()
    {
        $priorities = Priority::all();
        return view('priorities.index', compact('priorities'));
    }

    public function create()
    {
        return view('priorities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required|integer',
        ]);

        Priority::create($request->all());

        return redirect()->route('priorities.index');
    }

    public function edit(Priority $priority)
    {
        return view('priorities.edit', compact('priority'));
    }

    public function update(Request $request, Priority $priority)
    {
        $priority->update($request->all());

        return redirect()->route('priorities.index');
    }

    public function destroy(Priority $priority)
    {
        $priority->delete();

        return redirect()->route('priorities.index');
    }
}
