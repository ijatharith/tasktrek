<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Assignment - TaskTrek</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#F3F4F6]">

    <header class="bg-white shadow-sm h-20 flex items-center justify-between px-8 z-10 relative">
        <div class="flex items-center">
            <button class="mr-6 text-gray-700 hover:text-black focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
            <div>
                <h1 class="text-xl font-semibold text-gray-800">Add New Assignment</h1>
                <p class="text-xs text-gray-500 mt-0.5">Here what's you want to add</p>
            </div>
        </div>
        <div class="flex items-center">
            <button class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg>
            </button>
        </div>
    </header>

    <main class="max-w-4xl mx-auto p-8">
        
        <p class="text-slate-500 font-medium mb-6 text-sm">Fill in the details below to track your academic progress</p>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('tasks.store') }}" method="POST" class="p-8">
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
                    <label class="block text-sm font-bold text-black mb-2">Priority Level</label>
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

                <div class="mb-8">
                    <label for="description" class="block text-sm font-bold text-black mb-2">Description/Notes</label>
                    <textarea id="description" name="description" rows="4" placeholder="Add any details about this task..." 
                        class="w-full bg-[#E8EEF5] text-gray-700 border-none rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-colors placeholder-slate-500 font-medium resize-none outline-none">{{ old('description') }}</textarea>
                </div>

                <div class="flex items-center justify-end pt-4 border-t border-gray-100 bg-[#E8EEF5] -mx-8 -mb-8 px-8 py-4">
                    <a href="{{ route('dashboard') }}" class="px-6 py-2 text-sm font-semibold text-gray-600 hover:text-gray-800 mr-4 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-8 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-transform active:scale-95">
                        Save Task
                    </button>
                </div>

            </form>
        </div>
    </main>

</body>
</html>