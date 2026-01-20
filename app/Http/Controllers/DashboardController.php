<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    // Replace your existing index() method with this:
    public function index()
    {
        $userId = Auth::id();
        
        // Get upcoming tasks due within 7 days (not completed)
        $upcomingTasks = Task::where('user_id', $userId)
            ->where('status', '!=', 'Completed')
            ->whereDate('deadline', '>=', today())
            ->whereDate('deadline', '<=', today()->addDays(7))
            ->orderBy('deadline', 'asc')
            ->get();

        $data = [
            'pending_count' => Task::where('user_id', $userId)->where('status', 'Pending')->count(),
            
            'priority_count' => Task::where('user_id', $userId)
                                    ->where('priority', 'high')
                                    ->where('status', 'Pending')
                                    ->count(),
                                    
            'completed_count' => Task::where('user_id', $userId)->where('status', 'Completed')->count(),
            
            'tasks' => Task::where('user_id', $userId)->latest()->take(5)->get(),
            
            // Add upcoming tasks to the data array
            'upcomingTasks' => $upcomingTasks
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
            'priority' => 'required|in:low,medium,high',
            'description' => 'nullable|string',
        ], [

            'title.required' => 'Title is required',
            'deadline.required' => 'Deadline is required',
        ]);

        // If validation passes, create the task
        $validated['user_id'] = Auth::id();
        
        Task::create($validated);

        return redirect()->route('tasks.index')->with('created', true);
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
            'priority' => 'required|in:low,medium,high',
            'status'   => 'required|in:Pending,Completed',
            'description' => 'nullable|string',
        ]);
    
        // 3. Update using the validated data
        $task->update($validated);
    
        // 4. Redirect - the index() method will now run and recalculate the counts
        return redirect()->route('tasks.index')->with('updated', true);
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

        // 2. Redirect back to My Assignments with the 'deleted' success message
        return redirect()->route('tasks.index')->with('deleted', true);
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