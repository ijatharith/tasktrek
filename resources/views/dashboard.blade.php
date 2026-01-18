<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskTrek Dashboard</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">
    <style>
        [x-cloak] { display: none !important; }
    </style>

    @if(session('deleted') || session('created') || session('updated'))
    <div x-data="{ show: true }" 
         x-show="show" 
         x-init="setTimeout(() => show = false, 1500)" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[100] flex items-center justify-center bg-black/50">
    
        <div class="bg-[#4F75D1] text-white p-16 rounded-lg shadow-2xl text-center w-[450px]"
             @click.away="show = false">
            <h2 class="text-2xl font-bold mb-4 uppercase tracking-tight">
                {{ session('deleted') ? 'Delete Task' : (session('created') ? 'Create Task' : 'Update Task') }}
            </h2>
        
            <p class="text-3xl font-medium">
                {{ session('deleted') ? 'Task has been deleted' : (session('created') ? 'Task has been created' : 'Task has been updated') }}
            </p>
        </div>
    </div>
    @endif

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
                    <a href="#" class="flex items-center px-4 py-2 bg-gray-800 rounded-lg text-white group">
                        <svg class="w-5 h-5 mr-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('tasks.index') }}" class="flex items-center px-4 py-2 text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        My Assignments
                    </a>
                    <a href="{{ route('tasks.index', ['view' => 'calendar']) }}" class="flex items-center px-4 py-2 text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Calendar
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

        <div class="bg-[#0f182c] p-4 flex items-center border-t border-gray-800">
            <div class="h-10 w-10 rounded-full bg-gray-600 flex items-center justify-center overflow-hidden">
                <svg class="h-12 w-12 text-gray-300 relative top-1" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-500">Student &bull; Sem {{ Auth::user()->semester }}</p>
            </div>
        </div>
    </aside>

    <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <header class="bg-white shadow-sm h-20 flex items-center justify-between px-8 z-10">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
                <p class="text-sm text-gray-500 mt-1">Welcome back! Here what's due soon.</p>
            </div>
            <div class="flex items-center space-x-4">
                <button class="text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </button>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-xl p-6 shadow-sm flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Pending Tasks</p>
                        <h2 class="text-4xl font-bold text-gray-800 mt-4">{{ $pending_count ?? 0 }}</h2>
                    </div>
                    <div class="p-2 rounded-full border-2 border-orange-400 text-orange-400">
                         <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-sm flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">High Priority</p>
                        <h2 class="text-4xl font-bold mt-4 {{ $priority_count > 0 ? 'text-gray-800' : 'text-gray-800' }}">
                            {{ $priority_count ?? 0 }}
                        </h2>
                    </div>
                    <div class="p-2 rounded-full border-2 border-red-500 text-red-500">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-sm flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Completed</p>
                        <h2 class="text-4xl font-bold text-gray-800 mt-4">{{ $completed_count ?? 0 }}</h2>
                    </div>
                    <div class="p-2 rounded-full border-2 border-green-500 bg-green-500 text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col h-[500px]">
                <div class="p-6 flex justify-between items-center border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800">Current Tasks</h3>
                    <a href="{{ route('tasks.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-md shadow-sm transition">
                        Create New Task
                    </a>
                </div>

                <div class="grid grid-cols-5 bg-[#dfe6f1] text-xs font-bold text-gray-500 uppercase tracking-wider py-3 px-6">
                    <div class="text-left">Task Name</div>
                    <div class="text-left">Deadline</div>
                    <div class="text-left">Priority</div>
                    <div class="text-left">Status</div>
                    <div class="text-right">Option</div>
                </div>

                @if(isset($tasks) && count($tasks) > 0)
                    <div class="flex-1 overflow-y-auto">
                        @foreach($tasks as $task)
                            <div class="grid grid-cols-5 border-b border-gray-100 py-4 px-6 items-center hover:bg-gray-50 transition">
                                <div class="text-sm font-semibold text-gray-800 break-words min-w-0 pr-4">
                                    {{ $task->title }}
                                    <p class="text-xs text-gray-400 font-normal mt-1">{{ $task->description }}</p>
                                </div>
                                <div class="text-xs text-gray-600 uppercase">{{ $task->deadline }}</div>
                                <div>
                                   <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase
                                       {{ strtolower($task->priority) == 'high' 
                                           ? 'bg-red-100 text-red-600' 
                                           : (strtolower($task->priority) == 'medium' 
                                               ? 'bg-blue-100 text-blue-600' 
                                               : 'bg-gray-100 text-gray-600') 
                                       }}">
                                       {{ $task->priority }}
                                    </span>
                                </div>
                                <div>
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase 
                                        {{ $task->status == 'Completed' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                        {{ $task->status }}
                                    </span>
                                </div>
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="text-gray-600 hover:text-blue-600 transition-colors">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('tasks.delete.confirm', $task->id) }}" class="text-gray-600 hover:text-red-600 transition-colors">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="flex-1 flex flex-col items-center justify-center text-gray-400">
                        <span class="text-xl font-medium tracking-wide">NO TASK CREATE</span>
                    </div>
                @endif
                

                <div class="p-4 border-t border-gray-100 bg-gray-50 rounded-b-xl flex items-center justify-between">
                    <span class="text-xs text-gray-500">Showing 0 Tasks</span>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-xs border border-gray-300 rounded text-gray-500 hover:bg-gray-100 disabled:opacity-50" disabled>PREV</button>
                        <button class="px-3 py-1 text-xs border border-gray-300 rounded text-gray-500 hover:bg-gray-100 disabled:opacity-50" disabled>NEXT</button>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>

</body>
</html>