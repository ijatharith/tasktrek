<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Task - TaskTrek</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#F3F4F6] font-['Inter']" x-data="{ open: false }">
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
                    <nav class="space-y-2">
                        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-400 hover:bg-gray-800 rounded-lg">Dashboard</a>
                        <a href="#" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Delete Task
                        </a>
                    </nav>
                </div>
            </div>

            <div class="bg-[#0f182c] p-4 flex items-center border-t border-gray-800">
                <div class="h-10 w-10 rounded-full bg-gray-600 flex items-center justify-center overflow-hidden">
                    <svg class="h-12 w-12 text-gray-300 relative top-1" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-white uppercase">AHMAD ABU</p>
                    <p class="text-xs text-gray-500">Students &bull; Sem 1</p>
                </div>
            </div>
        </aside>

        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white h-12 flex items-center px-8 text-sm text-gray-500 border-b">
                Dashboard &nbsp;>&nbsp; {{ Str::limit($task->title, 20) }} &nbsp;>&nbsp; <span class="text-black font-semibold uppercase">Delete</span>
            </header>

            <div class="flex-1 overflow-y-auto p-8">
                <h1 class="text-2xl font-bold text-black mb-1">Delete Task</h1>
                <p class="text-gray-500 text-sm mb-6">Delete the task that are wrong or has been completed</p>

                <div class="bg-white rounded-2xl shadow-sm border p-8 max-w-4xl">
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="mb-6">
                            <label class="block text-sm font-bold text-black mb-2">Task Title</label>
                            <input type="text" value="{{ $task->title }}" disabled class="w-full bg-[#E8EEF5] rounded-lg px-4 py-3 text-gray-500 cursor-not-allowed">
                        </div>

                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-bold text-black mb-2">Course/Subject</label>
                                <input type="text" value="{{ $task->course }}" disabled class="w-full bg-[#E8EEF5] rounded-lg px-4 py-3 text-gray-500 cursor-not-allowed">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-black mb-2">Deadline</label>
                                <input type="text" value="{{ \Carbon\Carbon::parse($task->deadline)->format('d/m/Y') }}" disabled class="w-full bg-[#E8EEF5] rounded-lg px-4 py-3 text-gray-300 cursor-not-allowed">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-bold text-black mb-2">Description/Notes</label>
                            <textarea disabled class="w-full bg-[#E8EEF5] rounded-lg px-4 py-3 text-gray-500 cursor-not-allowed resize-none" rows="3">{{ $task->description }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-8 mb-8">
                            <div>
                                <label class="block text-sm font-bold text-black mb-2">Priority Level</label>
                                <div class="flex items-center p-2 bg-[#E8EEF5] rounded-lg w-max pr-8">
                                    <span class="w-3 h-3 {{ $task->priority == 'High' ? 'bg-red-500' : 'bg-blue-500' }} rounded-full mr-2 ml-2"></span>
                                    <span class="text-sm font-medium">{{ $task->priority }}</span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-black mb-2">Current Status</label>
                                <div class="flex items-center p-2 px-6 bg-green-100 border border-green-200 rounded-lg w-max text-green-700 text-sm font-medium">
                                    {{ $task->status }}
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between items-center mt-8 pt-4 border-t">
                            <span class="text-xs text-gray-400 italic">Last Update {{ $task->updated_at->diffForHumans() }}</span>
                            
                            <div class="flex items-center space-x-4">
                                <a href="{{ route('dashboard') }}" class="px-6 py-2 text-sm font-semibold text-gray-600 bg-white border rounded-lg hover:bg-gray-50">
                                    Cancel
                                </a>
                                
                                <button type="button" @click="open = true" class="px-6 py-2 bg-blue-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg shadow-md transition-all">
                                    Delete Task
                                </button>
                            </div>
                        </div>

                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             x-cloak
                             class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
                            
                            <div class="bg-[#4F75D1] text-white p-10 rounded-lg shadow-2xl text-center w-[400px]" @click.away="open = false">
                                <h2 class="text-2xl font-bold mb-6 uppercase tracking-tight">Delete Task</h2>
                                <p class="text-xl mb-10">Are You Sure ?</p>
                                
                                <div class="flex justify-center space-x-4">
                                    <button type="button" @click="open = false" class="bg-white text-black px-8 py-2 rounded font-bold hover:bg-gray-100 transition-colors">
                                        Cancel
                                    </button>
                                    <button type="submit" class="bg-[#89A5E9] text-white px-8 py-2 rounded font-bold border border-white/30 hover:bg-blue-400 transition-colors">
                                        Delete Task
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </main>
    </div>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</body>
</html>