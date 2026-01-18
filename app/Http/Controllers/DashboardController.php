<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    // 1. Shows the Dashboard (Image 1 & 3)
    public function index()
    {
        $userId = Auth::id();
        $data = [
            'pending_count' => Task::where('user_id', $userId)->where('status', 'Pending')->count(),
            
            // FIX: Only count High Priority tasks that are still Pending
            'priority_count' => Task::where('user_id', $userId)
                                    ->where('priority', 'High')
                                    ->where('status', 'Pending')
                                    ->count(),
                                    
            'completed_count' => Task::where('user_id', $userId)->where('status', 'Completed')->count(),
            'tasks' => Task::where('user_id', $userId)->latest()->take(5)->get()
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
        $validated['user_id'] = Auth::id();
        Task::create($validated);

        return redirect()->route('dashboard')->with('created', true);
    }

    // Show the Edit Form
    public function edit($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        return view('tasks.edit', compact('task'));
    }
    
    public function update(Request $request, $id)
    {
        // 1. Find the task once
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        
        // 2. Validate the incoming data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'course' => 'nullable|string|max:255',
            'deadline' => 'required|date',
            'priority' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|string'
        ]);
    
        // 3. Update using the validated data
        $task->update($validated);
    
        // 4. Redirect - the index() method will now run and recalculate the counts
        return redirect()->route('dashboard')->with('updated', true);
    }
    // Show the Delete Confirmation Form (Image 6)
    public function deleteConfirm($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        return view('tasks.delete', compact('task'));
    }
    
    // Actually remove the task from database
    public function destroy($id)
    {
        // 1. Find and delete the task
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        $task->delete();

        // 2. Redirect back to dashboard with the 'deleted' success message
        return redirect()->route('dashboard')->with('deleted', true);
    }
    public function assignments()
    {
        $tasks = Task::where('user_id', Auth::id())->orderBy('deadline', 'asc')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'semester' => 'required',
            'level' => 'required',
            'course' => 'required|string',
            'faculty' => 'required|string',
        ]);

        $user->update($validated);

        return redirect()->route('profile')->with('status', 'profile-updated');
    }
}