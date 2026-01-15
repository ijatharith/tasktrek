<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Assignments - TaskTrek</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
        
        /* Calendar Grid Styles */
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 1px;
            background-color: #E5E7EB; /* Gray-200 for borders */
        }
        .calendar-cell {
            background-color: white;
            min-height: 120px;
            padding: 0.5rem;
        }
    </style>
</head>
<body class="bg-gray-100" x-data="{ view: new URLSearchParams(window.location.search).get('view') || 'list' }">

    <div class="flex h-screen overflow-hidden">
        
        <!-- SIDEBAR (Consistent with Dashboard) -->
        <aside class="w-64 bg-[#0B1120] text-white flex flex-col justify-between hidden md:flex">
            <div>
                <div class="h-16 flex items-center px-6 border-b border-gray-800">
                    <div class="bg-blue-500 p-1 rounded-md mr-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <span class="text-xl font-bold tracking-wide">TaskTrek</span>
                    <button class="ml-auto text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    </button>
                </div>

                <div class="px-4 py-6">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Menu</p>
                    <nav class="space-y-2">
                        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors group">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            Dashboard
                        </a>
                        <a href="{{ route('tasks.index') }}" class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg transition-colors">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            My Assignments
                        </a>
                        <!-- Calendar Link (Just points to this page for now, or could toggle view via param, but we use JS toggle) -->
                        <a href="#" @click.prevent="view = 'calendar'" :class="view === 'calendar' ? 'text-white' : 'text-gray-400'" class="flex items-center px-4 py-2 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
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
                    </nav>
                </div>
            </div>

            <div class="bg-[#0f182c] p-4 flex items-center border-t border-gray-800 mt-auto">
                <div class="h-10 w-10 rounded-full bg-gray-600 flex items-center justify-center overflow-hidden">
                    <svg class="h-12 w-12 text-gray-300 relative top-1" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-white">AHMAD ABU</p>
                    <p class="text-xs text-gray-500">Students &bull; Sem 1</p>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <header class="bg-white shadow-sm h-20 flex items-center justify-between px-8 z-10">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-800">My Assignments</h1>
                    <p class="text-sm text-gray-500 mt-1">Manage your academic workload and deadlines.</p>
                </div>
                <!-- View Toggler in Header -->
                <div class="flex bg-gray-100 p-1 rounded-lg">
                    <button @click="view = 'list'" :class="view === 'list' ? 'bg-white shadow-sm text-gray-800' : 'text-gray-500 hover:text-gray-700'" class="px-4 py-2 rounded-md text-sm font-medium transition-all">List View</button>
                    <button @click="view = 'calendar'" :class="view === 'calendar' ? 'bg-white shadow-sm text-gray-800' : 'text-gray-500 hover:text-gray-700'" class="px-4 py-2 rounded-md text-sm font-medium transition-all">Calendar</button>
                </div>
                
                <a href="{{ route('tasks.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors flex items-center ml-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"></path></svg>
                    New Assignment
                </a>
            </header>

            <div class="flex-1 overflow-y-auto p-8">
                
                <!-- LIST VIEW -->
                <div x-show="view === 'list'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-100">
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Task Title</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Course</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Deadline</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Priority</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse($tasks as $task)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-800">{{ $task->title }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $task->course ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($task->deadline)->format('d M, Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
                                            {{ strtolower($task->priority) == 'high' ? 'bg-red-100 text-red-600' : (strtolower($task->priority) == 'medium' ? 'bg-blue-100 text-blue-600' : 'bg-gray-100 text-gray-600') }}">
                                            {{ $task->priority }}
                                        </span>
                                    </td>
                                     <td class="px-6 py-4">
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase 
                                            {{ $task->status == 'Completed' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                            {{ $task->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 flex items-center space-x-3">
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500 hover:text-blue-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        </a>
                                        <a href="{{ route('tasks.delete.confirm', $task->id) }}" class="text-red-500 hover:text-red-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                                        <p class="text-lg font-medium">No assignments found</p>
                                        <p class="text-sm">Start by adding a new one above!</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- CALENDAR VIEW -->
                <div x-show="view === 'calendar'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                    
                    @for ($m = 1; $m <= 12; $m++)
                        @php
                            $currentMonth = \Carbon\Carbon::create(2026, $m, 1);
                        @endphp
                        
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8 break-inside-avoid">
                            
                            <!-- Month Header -->
                            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100 bg-[#dfe6f1]">
                                <h2 class="text-lg font-bold text-gray-700">{{ $currentMonth->format('F Y') }}</h2>
                            </div>

                            <!-- Days Header -->
                            <div class="grid grid-cols-7 bg-gray-50 border-b border-gray-100 text-center py-2">
                                <div class="text-xs font-semibold text-gray-500 uppercase">Mon</div>
                                <div class="text-xs font-semibold text-gray-500 uppercase">Tue</div>
                                <div class="text-xs font-semibold text-gray-500 uppercase">Wed</div>
                                <div class="text-xs font-semibold text-gray-500 uppercase">Thu</div>
                                <div class="text-xs font-semibold text-gray-500 uppercase">Fri</div>
                                <div class="text-xs font-semibold text-gray-500 uppercase">Sat</div>
                                <div class="text-xs font-semibold text-gray-500 uppercase">Sun</div>
                            </div>

                            <!-- Calendar Grid -->
                            <div class="calendar-grid">
                                @php
                                    $daysInMonth = $currentMonth->daysInMonth;
                                    $dayOfWeek = $currentMonth->copy()->startOfMonth()->dayOfWeek; // 0 (Sun) - 6 (Sat)
                                    // Adjust to Mon (0) - Sun (6)
                                    $dayOfWeek = ($dayOfWeek == 0) ? 6 : $dayOfWeek - 1;
                                @endphp

                                <!-- Empty cells for previous month -->
                                @for ($i = 0; $i < $dayOfWeek; $i++)
                                    <div class="calendar-cell bg-gray-50"></div>
                                @endfor

                                <!-- Days -->
                                @for ($day = 1; $day <= $daysInMonth; $day++)
                                    @php
                                        $loopDate = $currentMonth->copy()->day($day)->format('Y-m-d');
                                        // Find tasks for this day
                                        $dayTasks = $tasks->filter(function($task) use ($loopDate) {
                                            return \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') == $loopDate;
                                        });
                                        $isToday = $loopDate == now()->format('Y-m-d');
                                    @endphp
                                    <div class="calendar-cell hover:bg-gray-50 transition relative group min-h-[100px]">
                                        <span class="text-sm font-semibold text-gray-700 block mb-1 {{ $isToday ? 'bg-blue-600 text-white w-6 h-6 rounded-full flex items-center justify-center' : '' }}">
                                            {{ $day }}
                                        </span>
                                        
                                        <div class="space-y-1 overflow-y-auto max-h-[80px]">
                                            @foreach($dayTasks as $task)
                                                <a href="{{ route('tasks.edit', $task->id) }}" class="block px-2 py-1 rounded text-[10px] truncate
                                                    {{ strtolower($task->priority) == 'high' ? 'bg-red-100 text-red-700' : (strtolower($task->priority) == 'medium' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-700') }}
                                                    hover:opacity-80 transition" title="{{ $task->title }}">
                                                    {{ $task->title }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endfor
                                
                                <!-- Remaining empty cells to complete the week -->
                                @php
                                    $totalCells = $dayOfWeek + $daysInMonth;
                                    $remaining = 7 - ($totalCells % 7);
                                @endphp
                                @if($remaining < 7)
                                    @for($i = 0; $i < $remaining; $i++)
                                        <div class="calendar-cell bg-gray-50"></div>
                                    @endfor
                                @endif
                            </div>
                        </div>
                    @endfor
                </div>

            </div>
        </main>
    </div>

</body>
</html>