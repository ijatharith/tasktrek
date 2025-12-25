<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    // 1. Shows the Dashboard (Image 1 & 3)
    public function index()
    {
        $data = [
            'pending_count' => Task::where('status', 'Pending')->count(),
            'priority_count' => Task::where('priority', 'High')->count(),
            'completed_count' => Task::where('status', 'Completed')->count(),
            'tasks' => Task::latest()->take(5)->get() // Only show recent tasks on dashboard
        ];
        return view('dashboard', $data);
    }


    public function create()
    {
        return view('tasks.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'course' => 'nullable',
            'deadline' => 'required|date',
            'priority' => 'required',
            'description' => 'nullable',
        ], [

            'title.required' => 'Title is required',
            'deadline.required' => 'Deadline is required',
        ]);

        // If validation passes, create the task
        Task::create($validated);

        return redirect()->route('dashboard')->with('created', true);
    }

    // Show the Edit Form
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }
    
    public function update(Request $request, $id)
    // Update the Task
    {
        $task = Task::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'course' => 'nullable|string|max:255',
            'deadline' => 'required|date',
            'priority' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|string'
        ]);
    
        // 1. Find and update the task
        $task = Task::findOrFail($id);
        $task->update($request->all());

        // 2. Redirect back to dashboard with the 'updated' success message
        return redirect()->route('dashboard')->with('updated', true);
    }
    // Show the Delete Confirmation Form (Image 6)
    public function deleteConfirm($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.delete', compact('task'));
    }
    
    // Actually remove the task from database
    public function destroy($id)
    {
        // 1. Find and delete the task
        $task = Task::findOrFail($id);
        $task->delete();

        // 2. Redirect back to dashboard with the 'deleted' success message
        return redirect()->route('dashboard')->with('deleted', true);
    }
    public function assignments()
    {
        $tasks = Task::orderBy('deadline', 'asc')->get();
        return view('tasks.index', compact('tasks'));
    }
}