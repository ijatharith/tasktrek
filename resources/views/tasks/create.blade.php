<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Assignment - TaskTrek</title>
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
                    <span class="text-xl font-bold tracking-wide">TaskTrek</span>
                </div>
                <div class="px-4 py-6">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Menu</p>
                    <nav class="space-y-2">
                        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            Dashboard
                        </a>
                        <a href="{{ route('tasks.index') }}" class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg transition-colors">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            My Assignments
                        </a>
                    </nav>

                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mt-8 mb-4">Settings</p>
                    <nav class="space-y-2">
                        <a href="{{ route('profile') }}" class="flex items-center px-4 py-2 text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center px-4 py-2 text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors w-full text-left">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Log Out
                            </button>
                        </form>
                    </nav>
                </div>
            </div>
            <div class="bg-[#0f182c] p-4 flex items-center border-t border-gray-800 mt-auto">
                <div class="h-10 w-10 rounded-full bg-gray-600 flex items-center justify-center overflow-hidden">
                    <svg class="h-12 w-12 text-gray-300 relative top-1" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500">Student &bull; Sem {{ Auth::user()->semester }}</p>
                </div>
            </div>
        </aside>

        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-sm h-20 flex items-center justify-between px-8 z-10">
                    <div>
                        <h1 class="text-2xl font-bold text-black">Add New Assignment</h1>
                        <p class="text-gray-500 text-sm mt-1">Fill in the details below to track your academic progress</p>
                    </div>
            </header>

            <div class="flex-1 overflow-y-auto p-6 md:p-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden w-full min-h-[calc(100%-80px)] flex flex-col">
                    
                    <form action="{{ route('tasks.store') }}" method="POST" class="p-8 flex flex-col flex-1 h-full">
                        @csrf 
                        
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-bold text-black mb-2">Task Title <span class="text-red-500">*</span></label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="e.g. Software Engineering Report" 
                                class="w-full text-gray-700 border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-colors placeholder-slate-500 font-medium outline-none
                                {{ $errors->has('title') ? 'bg-red-50 border-red-400 text-red-900 placeholder-red-300' : 'bg-[#E8EEF5] border-transparent' }}">
                            
                            @error('title')
                                <p class="text-red-500 text-xs mt-2 flex items-center font-semibold">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    Title is required
                                </p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="course" class="block text-sm font-bold text-black mb-2">Course/Subject</label>
                                <input type="text" id="course" name="course" value="{{ old('course') }}" placeholder="e.g. BICS 2306" 
                                    class="w-full bg-[#E8EEF5] text-gray-700 border-none rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-colors placeholder-slate-500 font-medium outline-none">
                            </div>

                            <div>
                                <label for="deadline" class="block text-sm font-bold text-black mb-2">Deadline <span class="text-red-500">*</span></label>
                                <input type="date" id="deadline" name="deadline" value="{{ old('deadline') }}"
                                    class="w-full text-gray-700 border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 transition-colors placeholder-slate-500 font-medium outline-none
                                    {{ $errors->has('deadline') ? 'bg-red-50 border-red-400 text-red-900' : 'bg-[#E8EEF5] border-transparent' }}">
                                
                                @error('deadline')
                                    <p class="text-red-500 text-xs mt-2 flex items-center font-semibold">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                        Deadline is required
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-bold text-black mb-2">Priority Level <span class="text-red-500">*</span></label>
                            <div class="flex space-x-4">
                                <div class="relative">
                                    <input type="radio" name="priority" id="low" value="low" {{ old('priority') == 'low' ? 'checked' : '' }} class="peer sr-only">
                                    <label for="low" class="flex items-center px-4 py-2 bg-[#E8EEF5] rounded-lg cursor-pointer hover:bg-gray-200 transition select-none peer-checked:bg-gray-200 peer-checked:ring-2 peer-checked:ring-gray-400">
                                        <span class="w-3 h-3 bg-[#A0AEC0] rounded-full mr-2 border border-black/10"></span>
                                        <span class="text-sm font-bold text-gray-600">Low</span>
                                    </label>
                                </div>

                                <div class="relative">
                                    <input type="radio" name="priority" id="medium" value="medium" {{ old('priority') == 'medium' ? 'checked' : '' }} class="peer sr-only">
                                    <label for="medium" class="flex items-center px-4 py-2 bg-[#E8EEF5] rounded-lg cursor-pointer hover:bg-blue-100 transition select-none peer-checked:bg-blue-100 peer-checked:ring-2 peer-checked:ring-blue-400">
                                        <span class="w-3 h-3 bg-[#4299E1] rounded-full mr-2 border border-black/10"></span>
                                        <span class="text-sm font-bold text-gray-600">Medium</span>
                                    </label>
                                </div>

                                <div class="relative">
                                    <input type="radio" name="priority" id="high" value="high" {{ old('priority') == 'high' ? 'checked' : '' }} class="peer sr-only">
                                    <label for="high" class="flex items-center px-4 py-2 bg-[#E8EEF5] rounded-lg cursor-pointer hover:bg-red-100 transition select-none peer-checked:bg-red-100 peer-checked:ring-2 peer-checked:ring-red-400">
                                        <span class="w-3 h-3 bg-[#F56565] rounded-full mr-2 border border-black/10"></span>
                                        <span class="text-sm font-bold text-gray-600">High</span>
                                    </label>
                                </div>
                            </div>
                            @error('priority')
                                <p class="text-red-500 text-xs mt-2 font-semibold italic">Please select a priority level.</p>
                            @enderror
                        </div>

                        <div class="mb-8 flex-1 flex flex-col">
                            <label for="description" class="block text-sm font-bold text-black mb-2">Description/Notes</label>
                            <textarea id="description" name="description" placeholder="Add any details about this task..." 
                                class="w-full flex-1 min-h-[150px] bg-[#E8EEF5] text-gray-700 border-none rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-colors placeholder-slate-500 font-medium resize-none outline-none">{{ old('description') }}</textarea>
                        </div>

                        <div class="flex items-center justify-end pt-4 border-t border-gray-100 bg-[#E8EEF5] -mx-8 -mb-8 px-8 py-4 mt-auto">
                            <a href="{{ url()->previous() }}" class="px-6 py-2 text-sm font-semibold text-gray-600 hover:text-gray-800 mr-4 transition-colors">
                                Cancel
                            </a>
                            <button type="submit" class="px-8 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-transform active:scale-95">
                                Save Task
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>