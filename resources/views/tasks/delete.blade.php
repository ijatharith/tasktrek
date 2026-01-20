<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Assignment - TaskTrek</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
    </style>
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
                    <h1 class="text-2xl font-bold text-black">Delete Assignment</h1>
                    <p class="text-red-500 text-sm mt-1 font-medium">Warning: This action cannot be undone. Please review details below.</p>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto p-6 md:p-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden w-full min-h-[calc(100%-80px)] flex flex-col">
                    
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="p-8 flex flex-col flex-1 h-full">
                        @csrf 
                        @method('DELETE')
                        
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-black mb-2">Task Title</label>
                            <input type="text" value="{{ $task->title }}" disabled
                                class="w-full bg-[#F3F4F6] text-gray-500 border border-transparent rounded-lg px-4 py-3 font-medium outline-none cursor-not-allowed select-none">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-bold text-black mb-2">Course/Subject</label>
                                <input type="text" value="{{ $task->course }}" disabled
                                    class="w-full bg-[#F3F4F6] text-gray-500 border-transparent rounded-lg px-4 py-3 font-medium outline-none cursor-not-allowed">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-black mb-2">Deadline</label>
                                <input type="text" value="{{ \Carbon\Carbon::parse($task->deadline)->format('d F Y') }}" disabled
                                    class="w-full bg-[#F3F4F6] text-gray-500 border-transparent rounded-lg px-4 py-3 font-medium outline-none cursor-not-allowed">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-bold text-black mb-2">Priority Level</label>
                                @php
                                    $pStyles = [
                                        'low' => 'bg-gray-100 text-gray-700 ring-gray-200',
                                        'medium' => 'bg-blue-50 text-blue-700 ring-blue-100',
                                        'high' => 'bg-red-50 text-red-700 ring-red-100',
                                    ];
                                    $dotStyles = [
                                        'low' => 'bg-gray-400',
                                        'medium' => 'bg-blue-500',
                                        'high' => 'bg-red-500',
                                    ];
                                    $priority = strtolower($task->priority);
                                @endphp
                                <div class="flex items-center px-4 py-3 rounded-lg border border-transparent {{ $pStyles[$priority] ?? 'bg-gray-100' }} cursor-not-allowed">
                                    <span class="w-3 h-3 rounded-full mr-2 {{ $dotStyles[$priority] ?? 'bg-gray-400' }}"></span>
                                    <span class="font-bold capitalize">{{ $task->priority }}</span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-black mb-2">Current Status</label>
                                <div class="flex items-center px-4 py-3 bg-[#F3F4F6] rounded-lg border border-transparent text-gray-600 font-bold capitalize cursor-not-allowed">
                                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $task->status ?? 'Pending' }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-8 flex-1 flex flex-col">
                            <label class="block text-sm font-bold text-black mb-2">Description/Notes</label>
                            <textarea disabled 
                                class="w-full flex-1 min-h-[150px] bg-[#F3F4F6] text-gray-500 border-transparent rounded-lg px-4 py-3 font-medium resize-none outline-none cursor-not-allowed">{{ $task->description }}</textarea>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-100 bg-[#E8EEF5] -mx-8 -mb-8 px-8 py-4 mt-auto">
                             <div class="text-xs text-gray-400 italic">
                                Created {{ $task->created_at->format('M d, Y') }}
                            </div>
                            
                            <div class="flex items-center">
                                <a href="{{ url()->previous() }}" class="px-6 py-2 text-sm font-semibold text-gray-600 hover:text-gray-800 mr-4 transition-colors">
                                    Cancel
                                </a>
                                <button type="submit" class="px-8 py-2 bg-red-600 text-white text-sm font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-transform active:scale-95 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    Delete Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>