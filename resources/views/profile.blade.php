<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - TaskTrek</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100">

    <div class="flex h-screen overflow-hidden">
        
        <!-- SIDEBAR -->
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
                        <a href="{{ route('profile') }}" class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg transition-colors">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Profile
                        </a>
                    </nav>
                </div> <!-- Close px-4 py-6 -->
            </div> <!-- Close top wrapper -->

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
                <header class="bg-white shadow-sm h-20 flex items-center justify-between px-8 z-10 border-b border-gray-200">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-800">Profile Settings</h1>
                        <p class="text-sm text-gray-500 mt-1">Manage your account information and preferences.</p>
                    </div>
                </header>

                <div class="flex-1 overflow-y-auto p-8">
                    
                    <div class="max-w-4xl mx-auto space-y-8">
                        
                        <!-- Profile Card -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                            <div class="px-8 py-8 relative">
                                <div class="flex flex-col md:flex-row items-center md:items-end mb-6">
                                    <div class="h-24 w-24 rounded-full bg-white p-1 shadow-md">
                                        <div class="h-full w-full rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                                            <svg class="h-20 w-20 text-gray-400 relative top-2" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                        </div>
                                    </div>
                                    <div class="mt-4 md:mt-0 md:ml-10 text-center md:text-left">
                                        <h2 class="text-2xl font-bold text-gray-800">Ahmad Abu</h2>
                                        <p class="text-gray-500 font-medium">Student</p>
                                    </div>
                                    <button class="ml-auto mt-4 md:mt-0 bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-lg text-sm font-semibold transition shadow-sm">
                                        Edit Profile
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Student ID</p>
                                        <p class="text-lg font-bold text-gray-800">2411234</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Semester</p>
                                        <p class="text-lg font-bold text-gray-800">Semester 1</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Level</p>
                                        <p class="text-lg font-bold text-black">2</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Academic Details Form (Read-only for demo) -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                            <h3 class="text-lg font-bold text-gray-800 mb-6 border-b border-gray-100 pb-4">Academic Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                    <input type="text" value="Ahmad Abu Bakar" disabled class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2 text-gray-600">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                    <input type="email" value="ahmad.abu@gmail.com" disabled class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2 text-gray-600">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Program</label>
                                    <input type="text" value="Bachelor of Computer Science (Hons)" disabled class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2 text-gray-600">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Faculty</label>
                                    <input type="text" value="Kulliyah of Computing and Information Technology" disabled class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2 text-gray-600">
                                </div>
                            </div>
                        </div>

                        <!-- Preferences -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                            <h3 class="text-lg font-bold text-gray-800 mb-6 border-b border-gray-100 pb-4">Preferences</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-800">Email Notifications</p>
                                        <p class="text-xs text-gray-500">Receive emails about upcoming deadlines.</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" checked class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-800">Dark Mode</p>
                                        <p class="text-xs text-gray-500">Toggle dark theme for the dashboard.</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </main>
    </div>

</body>
</html>
