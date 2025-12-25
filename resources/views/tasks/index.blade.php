<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Assignments - TaskTrek</title>
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
                <nav class="px-4 py-6 space-y-2">
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-400 hover:bg-gray-800 rounded-lg">Dashboard</a>
                    <a href="{{ route('tasks.index') }}" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg">My Assignments</a>
                </nav>
            </div>
        </aside>

        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white h-20 flex items-center justify-between px-8 border-b">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">My Assignments</h1>
                    <p class="text-xs text-gray-500">Manage your academic workload</p>
                </div>
                <a href="{{ route('tasks.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg text-sm font-semibold transition-colors flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"></path></svg>
                    New Assignment
                </a>
            </header>

            <div class="flex-1 overflow-y-auto p-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100">
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Task Title</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Course</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Deadline</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Priority</th>
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
                                        {{ $task->priority == 'high' ? 'bg-red-100 text-red-600' : ($task->priority == 'medium' ? 'bg-blue-100 text-blue-600' : 'bg-gray-100 text-gray-600') }}">
                                        {{ $task->priority }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 flex items-center space-x-3">
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500 hover:text-blue-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                                    <p class="text-lg font-medium">No assignments found</p>
                                    <p class="text-sm">Start by adding a new one above!</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>
</html>