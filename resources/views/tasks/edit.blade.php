<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task - TaskTrek</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#F3F4F6] font-['Inter']">
    <div class="flex h-screen overflow-hidden">
        <aside class="w-64 bg-[#0B1120] text-white flex flex-col justify-between hidden md:flex">
            <div>
                <div class="h-16 flex items-center px-6 border-b border-gray-800">
                    <div class="bg-blue-500 p-1 rounded-md mr-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <span class="text-xl font-bold tracking-wide">MyTasks</span>
                </div>
                <div class="px-4 py-6">
                    <nav class="space-y-2">
                        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-400 hover:bg-gray-800 rounded-lg">Dashboard</a>
                        <a href="#" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg"><span class="mr-2">+</span> Edit Task</a>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-400 hover:bg-gray-800 rounded-lg">Calendar</a>
                    </nav>
                </div>
            </div>
        </aside>

        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white h-12 flex items-center px-8 text-sm text-gray-500 border-b">
                Dashboard &nbsp;>&nbsp; {{ Str::limit($task->title, 20) }} &nbsp;>&nbsp; <span class="text-black font-semibold">Edit</span>
            </header>

            <div class="flex-1 overflow-y-auto p-8">
                <h1 class="text-2xl font-bold text-black mb-1">Edit Task Details</h1>
                <p class="text-gray-500 text-sm mb-6">Update the information below or change the task status</p>

                <div class="bg-white rounded-2xl shadow-sm border p-8 max-w-4xl">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                            <div class="mb-4 bg-red-50 text-red-600 p-4 rounded-lg">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-6">
                            <label class="block text-sm font-bold text-black mb-2">Task Title <span class="text-red-500">*</span></label>
                            <input type="text" name="title" value="{{ $task->title }}" class="w-full bg-[#E8EEF5] rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>

                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-bold text-black mb-2">Course/Subject</label>
                                <input type="text" name="course" value="{{ $task->course }}" class="w-full bg-[#E8EEF5] rounded-lg px-4 py-3 outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-black mb-2">Deadline <span class="text-red-500">*</span></label>
                                <input type="date" name="deadline" value="{{ $task->deadline }}" class="w-full bg-[#E8EEF5] rounded-lg px-4 py-3 outline-none">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-bold text-black mb-2">Description/Notes</label>
                            <textarea name="description" rows="3" class="w-full bg-[#E8EEF5] rounded-lg px-4 py-3 outline-none resize-none">{{ $task->description }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-8 mb-8">
                            <div>
                                <label class="block text-sm font-bold text-black mb-2">Priority Level</label>
                                <div class="space-y-2">
                                    <label class="flex items-center p-2 bg-[#E8EEF5] rounded-lg cursor-pointer">
                                        <input type="radio" name="priority" value="Low" {{ $task->priority == 'Low' ? 'checked' : '' }} class="mr-2">
                                        <span class="w-3 h-3 bg-gray-400 rounded-full mr-2"></span> Low
                                    </label>
                                    <label class="flex items-center p-2 bg-[#E8EEF5] rounded-lg cursor-pointer">
                                        <input type="radio" name="priority" value="Medium" {{ $task->priority == 'Medium' ? 'checked' : '' }} class="mr-2">
                                        <span class="w-3 h-3 bg-blue-500 rounded-full mr-2"></span> Medium
                                    </label>
                                    <label class="flex items-center p-2 bg-[#E8EEF5] rounded-lg cursor-pointer">
                                        <input type="radio" name="priority" value="High" {{ $task->priority == 'High' ? 'checked' : '' }} class="mr-2">
                                        <span class="w-3 h-3 bg-red-500 rounded-full mr-2"></span> High
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-black mb-2">Current Status</label>
                                <div class="space-y-2">
                                    <label class="flex items-center p-2 rounded-lg cursor-pointer mb-2" 
                                   style="background-color: {{ $task->status == 'Pending' ? '#FEF3C7' : '#E8EEF5' }}; border: 1px solid {{ $task->status == 'Pending' ? '#FDE68A' : 'transparent' }};">
                                <input type="radio" name="status" value="Pending" {{ $task->status == 'Pending' ? 'checked' : '' }} class="mr-2">
                                <span class="mr-2">🕒</span> <span style="color: #92400E; font-weight: bold;">Pending</span>
                            </label>
                            
                            <label class="flex items-center p-2 rounded-lg cursor-pointer" 
                                   style="background-color: {{ $task->status == 'Completed' ? '#DCFCE7' : '#E8EEF5' }}; border: 1px solid {{ $task->status == 'Completed' ? '#BBF7D0' : 'transparent' }};">
                                <input type="radio" name="status" value="Completed" {{ $task->status == 'Completed' ? 'checked' : '' }} class="mr-2">
                                <span class="mr-2">✅</span> <span style="color: #166534; font-weight: bold;">Completed</span>
                            </label>
                            </div>
                        </div>
                    </div>

                        <div class="flex justify-between items-center mt-8 pt-4 border-t">
                            <span class="text-xs text-gray-400 italic">Last Update {{ $task->updated_at->diffForHumans() }}</span>
                            <div class="space-x-4">
                                <a href="{{ route('dashboard') }}" class="px-6 py-2 text-sm font-semibold text-gray-600 bg-white border rounded-lg">Cancel</a>
                                <button type="submit" class="px-6 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow-md">Update Task</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>