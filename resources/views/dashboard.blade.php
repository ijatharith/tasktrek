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
                <p class="text-sm text-gray-500 mt-1">Welcome back! Here's what's due soon.</p>
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
                        <h2 class="text-4xl font-bold text-gray-800 mt-4">
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

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-bold text-gray-800">Upcoming Deadlines</h3>
        <span class="text-xs text-gray-500 bg-gray-100 px-3 py-1 rounded-full">Next 7 Days</span>
    </div>

    @if(isset($upcomingTasks) && count($upcomingTasks) > 0)
        <div class="space-y-3">
            @foreach($upcomingTasks as $task)
                @php
                    $deadline = \Carbon\Carbon::parse($task->deadline);
                    $now = \Carbon\Carbon::now();
                    $daysUntil = $now->diffInDays($deadline, false);
                    $isToday = $deadline->isToday();
                    $isTomorrow = $deadline->isTomorrow();
                    
                    // Determine urgency color
                    if ($daysUntil < 0) {
                        $bgColor = 'bg-red-50';
                        $borderColor = 'border-l-red-500';
                        $iconBg = 'bg-red-100';
                        $iconColor = 'text-red-600';
                    } elseif ($daysUntil <= 1) {
                        $bgColor = 'bg-orange-50';
                        $borderColor = 'border-l-orange-500';
                        $iconBg = 'bg-orange-100';
                        $iconColor = 'text-orange-600';
                    } elseif ($daysUntil <= 3) {
                        $bgColor = 'bg-yellow-50';
                        $borderColor = 'border-l-yellow-500';
                        $iconBg = 'bg-yellow-100';
                        $iconColor = 'text-yellow-600';
                    } else {
                        $bgColor = 'bg-blue-50';
                        $borderColor = 'border-l-blue-500';
                        $iconBg = 'bg-blue-100';
                        $iconColor = 'text-blue-600';
                    }
                @endphp
                
                <div class="flex items-start p-4 {{ $bgColor }} rounded-lg border-l-4 {{ $borderColor }} hover:shadow-md transition-shadow">
                    <!-- Icon -->
                    <div class="flex-shrink-0 w-12 h-12 {{ $iconBg }} rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 {{ $iconColor }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    
                    <!-- Task Details -->
                    <div class="flex-1 min-w-0">
                        <h4 class="text-sm font-bold text-gray-800 mb-1">{{ $task->title }}</h4>
                        @if($task->description)
                            <p class="text-xs text-gray-600 mb-2 line-clamp-1">{{ $task->description }}</p>
                        @endif
                        
                        <div class="flex items-center space-x-3 text-xs">
                            <!-- Date Display -->
                            <span class="text-gray-700 font-medium">
                                @if($isToday)
                                    Today
                                @elseif($isTomorrow)
                                    Tomorrow
                                @else
                                    {{ $deadline->format('D, d M Y') }}
                                @endif
                            </span>
                            
                            <!-- Priority Badge -->
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase
                                {{ strtolower($task->priority) == 'high' 
                                    ? 'bg-red-100 text-red-600' 
                                    : (strtolower($task->priority) == 'medium' 
                                        ? 'bg-blue-100 text-blue-600' 
                                        : 'bg-gray-100 text-gray-600') 
                                }}">
                                {{ $task->priority }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Action Button -->
                    <div class="flex-shrink-0 ml-4">
                        <a href="{{ route('tasks.edit', $task->id) }}" 
                           class="text-blue-600 hover:text-blue-800 text-xs font-semibold px-3 py-2 rounded-lg hover:bg-blue-100 transition-colors inline-block">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="flex flex-col items-center justify-center py-12 text-gray-400">
            <svg class="w-16 h-16 mb-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="text-sm font-medium">No upcoming deadlines in the next 7 days</span>
            <span class="text-xs mt-1">You're all caught up!</span>
        </div>
    @endif
</div>
        </div>
    </main>
</div>

</body>
</html>