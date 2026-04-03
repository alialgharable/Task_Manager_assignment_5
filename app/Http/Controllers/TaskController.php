<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())
            ->orderBy('due_date')
            ->get();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        $data['user_id'] = Auth::id();

        Task::create($data);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(string $id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);

        return view('tasks.show', ['task' => $task]);
    }

    public function edit(string $id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        $task->update($data);

        return redirect()->route('tasks.show', $task)->with('success', 'Task updated successfully.');
    }

    public function destroy(string $id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
